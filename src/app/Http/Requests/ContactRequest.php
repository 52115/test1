<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
{
    /**
     * 認可設定（今回は誰でも送信可）
     */
    public function authorize()
    {
        return true;
    }

    /**
     * バリデーションルール
     */
    public function rules()
    {
        return [
            'last_name'         => ['required', 'string', 'max:8'],
            'first_name'        => ['required', 'string', 'max:8'],
            'gender'            => ['required', 'integer', 'in:1,2,3'],
            'email'             => ['required', 'email'],
            'tel1'              => ['required', 'digits_between:1,5', 'regex:/^[0-9]+$/'],
            'tel2'              => ['required', 'digits_between:1,5', 'regex:/^[0-9]+$/'],
            'tel3'              => ['required', 'digits_between:1,5', 'regex:/^[0-9]+$/'],
            'address'           => ['required', 'string'],
            'building'          => ['nullable', 'string'],
            'category_id'       => ['required', 'exists:categories,id'],
            'detail'            => ['required', 'string', 'max:120'],
        ];
    }

    public function withValidator($validator)
    {
    $validator->after(function ($validator) {
        // --- 名前チェック ---
        if (empty($this->last_name) && empty($this->first_name)) {
            $validator->errors()->add('name_both', '名前を入力してください。');
        }

        // --- 電話番号チェック ---
        if (empty($this->tel1) && empty($this->tel2) && empty($this->tel3)) {
            $validator->errors()->add('tel_all', '電話番号を入力してください。');
        }
    });
    }
    /**
     * 日本語のカスタムメッセージ
     */
    public function messages()
    {
        return [
            'last_name.required'    => '姓を入力してください。',
            'first_name.required'   => '名を入力してください。',
            'gender.required'       => '性別を選択してください。',
            'gender.in'             => '性別を選択してください。',
            'email.required'        => 'メールアドレスを入力してください。',
            'email.email'           => 'メールアドレスはメール形式で入力してください。',
            'tel1.required'         => '電話番号を入力してください。',
            'tel2.required'         => '電話番号を入力してください。',
            'tel3.required'         => '電話番号を入力してください。',
            'tel1.regex'            => '電話番号は半角英数字で入力してください。',
            'tel2.regex'            => '電話番号は半角英数字で入力してください。',
            'tel3.regex'            => '電話番号は半角英数字で入力してください。',
            'tel1.digits_between'   => '電話番号は5桁まで数字で入力してください。',
            'tel2.digits_between'   => '電話番号は5桁まで数字で入力してください。',
            'tel3.digits_between'   => '電話番号は5桁まで数字で入力してください。',
            'address.required'      => '住所を入力してください。',
            'category_id.required'      => 'お問い合わせの種類を選択してください。',
            'category_id.exists'        => 'お問い合わせの種類を選択してください。',
            'detail.required'       => 'お問い合わせ内容を入力してください。',
            'detail.max'            => 'お問い合わせ内容は120文字以内で入力してください。',
        ];
    }

    /**
     * 属性名（Bladeで表示する際の項目名）
     */
    public function attributes()
    {
        return [
            'last_name'     => '姓',
            'first_name'    => '名',
            'gender'        => '性別',
            'email'         => 'メールアドレス',
            'tel1'          => '電話番号1',
            'tel2'          => '電話番号2',
            'tel3'          => '電話番号3',
            'address'       => '住所',
            'building'      => '建物名',
            'content'       => 'お問い合わせの種類',
            'detail'        => 'お問い合わせ内容',
        ];
    }
}
