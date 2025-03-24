<?php
namespace App\Http\Request;

use Illuminate\Foundation\Http\FormRequest;

class Taskrequest extends FormRequest{

    public function authorize(){
    return true;
    }

public function rules(){
    return [
        'title'=>'required|max:255',
        'description'=>'required|min:3|max:255',
        'long_description'=> 'required|min:3|max:255'
    ];
}
}


















?>