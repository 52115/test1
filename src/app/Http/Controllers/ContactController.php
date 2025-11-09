<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use App\Models\Contact;
use App\Models\Category;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    /**
     * フォーム入力ページ表示
     */
    public function index()
    {
        $categories = Category::all();
        return view('contact.form', compact('categories'));
    }

    /**
     * 確認ページ表示
     */
    public function confirm(ContactRequest $request)
    {
        // バリデーション済みデータ取得
        $validated = $request->validated();

        // カテゴリ名を取得
        $category = Category::find($validated['category_id']);
        $validated['category_content'] = $category ? $category->content : '';

        // 性別を文字列に変換
        $genderLabels = [1 => '男性', 2 => '女性', 3 => 'その他'];
        $validated['gender_label'] = $genderLabels[$validated['gender']] ?? '';

        // セッションに入力値を保持（確認ページから戻れるように）
        $request->session()->put('contact_data', $validated);

        return view('contact.confirm', ['data' => $validated]);
    }

    /**
     * データ保存処理 → Thanksページへ
     */
    public function store(Request $request)
    {
        // セッションからデータを取得
        $data = $request->session()->get('contact_data');

        if (!$data) {
            // セッションが切れていた場合、フォームに戻す
            return redirect('/')->with('error', '入力情報が見つかりません。');
        }

        // データ保存
        Contact::create($data);

        // セッション削除
        $request->session()->forget('contact_data');

        return redirect('/thanks');
    }

    /**
     * サンクスページ表示
     */
    public function thanks()
    {
        return view('contact.thanks');
    }
}
