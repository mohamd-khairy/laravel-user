<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\ChangePasswordRequest;
use App\Http\Requests\ContactUsRequest;
use App\Http\Requests\RegisterRequest;
use App\CustomerUser as CustomerUser;
use App\Http\Requests\ChangeEmailRequest;
use App\Http\Requests\UpdateCustomerDataRequest;
use App\Http\Requests\VerifyRequest;
use App\Http\Resources\UserData;
use App\Models\ContactUs;
use App\Models\provider as Provider;
use Carbon\Carbon;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;
use Validator;
use App\Mail\RegisterEmail;
use Illuminate\Support\Facades\File;
use Intervention\Image\ImageManagerStatic as Image;

class CustomerUserController extends Controller
{
    /**
     * login api
     *
     * @return \Illuminate\Http\Response
     */
    public function login()
    {
        if (Auth::attempt(['email' => request('email'), 'password' => request('password')])) {
            $user = Auth::user();
            $success['token'] =  $user->createToken('MyApp')->accessToken;
            $data = new \stdClass();
            $data->token = $success['token'];
            $data->default_lang = $user->default_lang;
            $data->email_verified_at = $user->email_verified_at;

            return response()->json([
                "status" => 200,
                "data"  => $data,
            ], 200);
        } else {
            return response()->json(['error' => 'Unauthorised'], 401);
        }
    }
    /**
     * Register api
     *
     * @param Register $request
     * @return \Illuminate\Http\Response
     */
    public function register(RegisterRequest $request)
    {

        $validated = $request->validated();

        $input = $request->all();
        $user_data = implode(',', [$request->email]);
        $code = encrypted($user_data); //Str::random(8);
        // Mail::to($request->email)->send(new RegisterEmail($request->email , $code));
        $input['password'] = bcrypt($input['password']);
        $input['remember_token'] = $code;
        $customer = CustomerUser::create($input);
        // $success['token'] =  $customer->createToken('MyApp')->accessToken;
        $success['id'] =  $customer->id;
        return response()->json([
            "status" => 200,
            "message"  => "Verifiy your new email",
            "data"  => $success,
        ], 200);
    }

    /**
     * Verify api
     *
     * @param Register $request
     * @return \Illuminate\Http\Response
     */
    public function verify(VerifyRequest $request)
    {
        try {
            $data = explode(',', decrypted($request->code));
            if (empty($data)) {
                return responseFail('some thing wrong');
            }
        } catch (\Throwable $th) {
            return responseFail('some thing wrong');
        }

        $oldEmail = $data[0];
        $newEmail = $data[1] ?? null;

        /** get user with this email and this code */
        $customer = CustomerUser::where(['email' => $oldEmail, 'remember_token' => $request->code])->first();

        if ($customer) {

            /** clear code and set verified date */
            $customer->email = $newEmail ?? $oldEmail;
            $customer->remember_token = null;
            $customer->email_verified_at = Carbon::now();
            $customer->save();
            /** generate token for this user */
            $success['token'] =  $customer->createToken('MyApp')->accessToken;
            $success['id'] =  $customer->id;

            return response()->json([
                "status" => 200,
                "message" => "success , email verified successfully .",
                "data"  => $success,
            ], 200);
        } else {

            return response()->json([
                "status" => 406,
                "message" => "Sorry , some thing wrong !",
                "data"  => [],
            ], 406);
        }
    }

    public function logout()
    {
        $accessToken = Auth::user()->token();
        $accessToken->revoke();
        /*DB::table('oauth_refresh_tokens')
            ->where('access_token_id', $accessToken->id)
            ->update([
                'revoked' => true
            ]);*/

        return response()->json(null, 204);
    }

    /**
     * @param UpdateCustomerDataRequest $request
     * @return \Illuminate\Http\JsonResponse
     *
     *Update Cusomer Data
     *
     *
     */
    public function UpdateCustomerData(UpdateCustomerDataRequest $request)
    {
        $user = Auth::user();
        $validated = $request->validated();

        if (!empty($request->personal_image) && File::exists(public_path($user->personal_image))) {
            File::delete(public_path($user->personal_image));
        }
        if ($request->personal_image) {
            $imageName = 'user' . time() . '.' . $request->personal_image->getClientOriginalExtension();
            $image_resize = Image::make($request->personal_image->getRealPath());
            $image_resize->resize(300, 300);
            $path = $image_resize->save(env("CDN_write_path", "../../CDN/") . 'images/' . $imageName);
            $validated['personal_image'] = 'images/' . $imageName;
        }
        $customer = CustomerUser::where('id', $user->id)->update($validated);

        return response()->json([
            "status" => 200,
            "message" => 'Customer Data Updated  Successfully ',
            "data"  => $customer,
        ], 200);
    }
    /**
     *
     *
     * Change User Email
     */

    public function changeUserEmail(ChangeEmailRequest $request)
    {
        $user = Auth::user();
        $user_data = implode(',', [$user->email, $request->email]);
        $code = encrypted($user_data); // Str::random(8);
        // Mail::to($request->email)->send(new RegisterEmail($request->email , $code));
        $input['remember_token'] = $code;
        $user->update($input);

        return response()->json([
            "status" => 200,
            "message"  => "Verifiy your new email",
        ], 200);
    }


    /**
     * Get User Data
     */
    public function CustomerData()
    {
        $user = Auth::user();
        //        $user = CustomerUser::find(auth()->user()->id);

        $final_data = CustomerUser::select(
            'id',
            'first_name',
            'last_name',
            'gender',
            'email',
            'personal_phone',
            'date_of_birth'
        )

            ->where('id', $user->id)->get();

        return response()->json(
            [
                "status" => 200,
                "data"  => UserData::collection($final_data),
            ],
            200
        );
    }
    /**
     *
     * Change User Password
     */
    public function changePassword(ChangePasswordRequest $request)
    {
        $data = $request->all();
        $user = auth('api')->user();
        //        $user = CustomerUser::find(auth()->user()->id);

        $validated = $request->validated();

        if (isset($data['oldpassword'])) {
            //checking the old password first
            $check = Hash::check($data['oldpassword'], $user->password);

            if (
                $check && isset($data['newpassword']) && !empty($data['newpassword']) && $data['newpassword']
                !== "" && $data['newpassword'] !== 'undefined'
            ) {

                $user->password = bcrypt($data['newpassword']);
                //create new token
                //  $token = $user->createToken('newToken')->accessToken;
                $user->save();
                return response()->json([
                    "status" => 200,
                    "message" => 'Password Changed successfully',
                    "data"  => [], //sending the new token
                ], 200);
            } else {
                return   response()->json([
                    "status" => 406,
                    "message" => 'Wrong password information',
                ], 406);
            }
        }
        return   response()->json([
            "status" => 406,
            "message" => 'Wrong password information',
        ], 406);
    }
    /**
     * Contact_Us
     */
    public function contact_us(ContactUsRequest $request)
    {
        $validated = $request->validated();
        $input = $request->all();

        $customer = ContactUs::create($input);


//        Mail::send('emails\contact_email',
//            array(
//                'name' => $request->get('name'),
//                'email' => $request->get('email'),
//                'mobile' => $request->get('mobile'),
//                'message_title' => $request->get('message_title'),
//                'message' => $request->get('message')
//            ),
//             function($message) use ($request)
//            {
//                $message->from($request->email);
//                $message->to('admin@admin.com');
//            });

        return response()->json([
            "status" => 200,
            "message"  => "Thanks for contacting us!",

        ], 200);
    }

}
