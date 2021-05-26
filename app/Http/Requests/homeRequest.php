<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class homeRequest extends FormRequest
{



    // ==================================================================
    public function rules()
    {
        return [

                  'file'         => 'required|image|mimes:jpg,png|max:7168|'
                  //dimensions:min_width=100,min_height=100,max_width=1000,max_height=500',

        ];
    }
    // =======================================================================
    public function messages()
    {

        return [

               'file.required' => 'you must submit the file',
               'file.image'   =>'just upload only image',
                'file.mimes' => 'image must in jpg or png fil',
                  'file.max' =>  'no maxium then 7mb',
                  'file.dimensions' => 'Dimension invalid (100*100 max)',

        ];

    }
}
