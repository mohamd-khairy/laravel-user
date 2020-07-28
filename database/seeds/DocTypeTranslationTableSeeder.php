<?php

use Illuminate\Database\Seeder;

class DocTypeTranslationTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('document_type_translation')->insert([
            [
                'id' => '1',
                'document_type_id' => '1',
                'locale' => 'en',
                'name' => 'Commercial Register',
            ],
            [
                'id' => '2',
                'document_type_id' => '1',
                'locale' => 'ar',
                'name' => 'السجل التجاري  ',
            ],
            [
                'id' => '3',
                'document_type_id' => '2',
                'locale' => 'en',
                'name' => 'Tax card ',
            ],
            [
                'id' => '4',
                'document_type_id' => '2',
                'locale' => 'ar',
                'name' => 'البطاقة الضريبية  ',
            ],
            [
                'id' => '5',
                'document_type_id' => '3',
                'locale' => 'en',
                'name' => 'National ID ',
            ],
            [
                'id' => '6',
                'document_type_id' => '3',
                'locale' => 'ar',
                'name' => 'البطاقة الشخصبة ',
            ]
            ]);
        }
    }

