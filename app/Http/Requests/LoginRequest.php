<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class LoginRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    // ユーザーがこのリクエストを実行できるかを制御
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    // 入力チェックのルールを定義
    public function rules(): array
    {
        return [
            'email' => [
                'required',
                'exists:users,email'
            ],
            'password' => [
                'required',
                function ($attribute, $value, $fail) {
                    $user = User::where('email', $this->email)->first();
                    if(!Hash::check($this->password, $user->password)){
                        $fail('パスワードが一致していません。');
                    }
                }
            ],
        ];
    }

    public function messages()
    {
        return [
            'email.required' => "メールアドレスは必須です！",
            'email.exists' => '選択されたメールアドレスは有効ではありません。',
            'password.required' => 'パスワードは必須です！',
        ];
    }
}
