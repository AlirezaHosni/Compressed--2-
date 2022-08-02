<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class createRegisterRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            "name"=>"required|min:3|max:30|unique:users",
            "phoneNumber"=>"required|numeric|digits:11|unique:users",
            "email"=>"required|email",
            "password"=>"required|between:5,15",

        ];
    }
    public function messages(){
        return[
            "name.required"=>"نام کاربری خود را انتخاب کنید",
            "name.min"=>"تعداد کارکترهای انتخابی برای نام کاربری کمتر از حد مجاز است",
            "name.max"=>"تعداد کارکترهای انتخابی برای نام کاربری بیشتر از حد مجاز است",
            "name.unique"=>"نام کاربری تکراری است",
            "phoneNumber.required"=>"شماره تلفن خود را وارد کنید",
            "phoneNumber.numeric"=>"برای وارد کردن شماره تلفن همراه از عدد استفاده کنید",
            "phoneNumber.digits"=>"شماره تلفن شما معتبر نیست",
            "phoneNumber.unique"=>"قبلا با این نام کاربری ثبت نام کرده اید",
            "email.required"=>"ایمیل خود را وارد کنید",
            "email.email"=>"ایمیل خود را به شکل صحیح وارد کنید(test@gmail.com)",
            "password.required"=>"رمز عبور خود را انتخاب کنید",
            "password.between"=>"رمزعبور شما باید بیشتراز 5 کارکتر باشد"

        ];
    }
}
