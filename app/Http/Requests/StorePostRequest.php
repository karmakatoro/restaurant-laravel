<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        // if you use the same store request file
        // the imageRule variable, you'll pass it in the return array
        // if(request()->routeIs('posts.store')){
        //     $imageRule = 'image|required';
        // }elseif (request()->routeIs('posts.update')) {
        //     $imageRule = 'image|sometimes';
        // }

        return [
            'title' => 'required',
            'category' => 'required',
            'content' => 'required',
            'image' => 'image|required'
        ];
    }
    // check is image is required or not
    // it may be the same with the image rule validation
    // protected function prepareValidation(){
    //     if($this->image == null){
    //         $this->request->remove('image');
    //     }
    // }
}
