<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\AddFaqCategoryRequest;
use App\Http\Requests\AddFaqRequest;
use App\Http\Requests\GetFaqRequest;
use App\Http\Resources\FaqResource;
use App\Models\AskCategory;
use App\Models\Faq;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FaqController extends Controller
{
    public function index(GetFaqRequest $request)
    {
        $faq = Faq::select('id', 'ask_category_id')->with('category:id');

        /** Keyword */
        if (!empty($request->text)) {
            $faq = $faq->search($request->text, 10, true);
        }

        /** category */
        if (!empty($request->ask_category_id)) {
            $faq = $faq->where('ask_category_id', $request->ask_category_id);
        }

        $faq = $faq->where('status', 1)
            ->orderBy('created_at', 'desc')
            ->get()
            ->groupBy('category.name')->map(function ($q) {
                return $q->take(5);
            });

        return responseSuccess(FaqResource::collection($faq), 'data returned successfully');
    }

    public function get_ask_category()
    {
        $faq = AskCategory::select('id')->get();

        return responseSuccess($faq, 'data returned successfully');
    }


    public function store(AddFaqRequest $request)
    {
        $faq = Faq::create($request->all());
        $faq->fill([
            'ask:en'   =>  $request->ask_en,
            'ask:ar'   =>  $request->ask_ar,

            'answer:en'   => $request->answer_en,
            'answer:ar'   => $request->answer_ar,
        ]);
        $faq->save();

        if ($faq) {
            return responseSuccess($faq, 'data saved successfully');
        }
        return responseFail('some thing wrong');
    }

    public function store_ask_category(AddFaqCategoryRequest $request)
    {
        $faq = AskCategory::create($request->all());
        $faq->fill([
            'name:en'   =>  $request->name_en,
            'name:ar'   =>  $request->name_ar
        ]);
        $faq->save();

        if ($faq) {
            return responseSuccess($faq, 'data saved successfully');
        }
        return responseFail('some thing wrong');
    }
}
