<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\Request;

class PositionRequest extends Request
{
    //если пользователь авторизирован то делаем Request
        public function authorize()
            {
            return true;
            }
        public function rules()
            {
            return [
                'name' => 'required|alpha',
                'description'=>'required'
        ];
    }
}