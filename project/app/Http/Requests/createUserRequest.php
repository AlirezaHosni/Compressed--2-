<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\Nationalcode;

class createUserRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        return [
            "name"=>"required|min:3|max:30",
            "firstName"=>"nullable|min:3|max:30",
            "lastName"=>"nullable|min:3|max:30",
            "email"=>"required|email",
            "phoneNumber"=>"required|numeric|digits:11",
            "phone"=>"nullable|numeric",
            "nationalCode"=>["numeric","nullable",new Nationalcode],


        ];
    }
    public function messages(){
        return[
            "name.required"=>"نام کاربری خود را انتخاب کنید",
            "name.min"=>"تعداد کارکترهای انتخابی برای نام کاربری کمتر از حد مجاز است",
            "name.max"=>"تعداد کارکترهای انتخابی برای نام کاربری بیشتر از حد مجاز است",
            "firstName.min"=>"تعداد کارکترهای انتخابی برای نام کمتر از حد مجاز است",
            "firstName.max"=>"تعداد کارکترهای انتخابی برای نام بیشتر از حد مجاز است",
            "lastName.min"=>"تعداد کارکترهای انتخابی برای نام خانوادگی کمتر از حد مجاز است",
            "lastName.max"=>"تعداد کارکترهای انتخابی برای نام خانوادگی بیشتر از حد مجاز است",
            "email.required"=>"ایمیل خود را وارد کنید",
            "email.email"=>"ایمیل خود را به شکل صحیح وارد کنید(test@gmail.com)",
            "phoneNumber.numeric"=>"برای وارد کردن شماره تلفن همراه از عدد استفاده کنید",
            "phoneNumber.required"=>"شماره تلفن خود را وارد کنید",
            "phoneNumber.digits"=>"شماره تلفن شما معتبر نیست",
            "phone.numeric"=>"برای وارد کردن شماره ثابت خود از عدد استفاده کنید",


        ];
    }
}
