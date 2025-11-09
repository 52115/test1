<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use App\Models\Category;
use Illuminate\Support\Facades\Response;

class AdminController extends Controller
{
    /**
     * 一覧画面
     */
    public function index(Request $request)
    {
        $query = Contact::with('category');

        // 🔍 検索条件の適用
        if ($request->filled('keyword')) {
            $keyword = $request->input('keyword');
            $query->where(function ($q) use ($keyword) {
                $q->where('first_name', 'like', "%{$keyword}%")
                  ->orWhere('last_name', 'like', "%{$keyword}%")
                  ->orWhere('email', 'like', "%{$keyword}%");
            });
        }

        if ($request->filled('gender')) {
            $query->where('gender', $request->input('gender'));
        }

        if ($request->filled('category_id')) {
            $query->where('category_id', $request->input('category_id'));
        }

        if ($request->filled('date')) {
            $query->whereDate('created_at', $request->input('date'));
        }

        $contacts = $query->orderBy('created_at', 'desc')->paginate(10);
        $categories = Category::all();

        return view('admin', compact('contacts', 'categories'));
    }

    /**
     * CSVエクスポート
     */
    public function export()
    {
        $contacts = Contact::with('category')->get();

        $csvHeader = [
            'お名前',
            '性別',
            'メールアドレス',
            '電話番号',
            '住所',
            '建物名',
            'お問い合わせの種類',
            'お問い合わせ内容',
            '登録日時',
        ];

        $csvData = $contacts->map(function ($contact) {
            return [
                "{$contact->last_name} {$contact->first_name}",
                $contact->gender === 1 ? '男性' : ($contact->gender === 2 ? '女性' : 'その他'),
                $contact->email,
                $contact->tel,
                $contact->address,
                $contact->building,
                $contact->category->content ?? '',
                $contact->detail,
                $contact->created_at->format('Y-m-d H:i:s'),
            ];
        });

        $filename = 'contacts_' . now()->format('Ymd_His') . '.csv';

        $handle = fopen('php://temp', 'r+');
        fputcsv($handle, $csvHeader);

        foreach ($csvData as $row) {
            fputcsv($handle, $row);
        }

        rewind($handle);
        $csv = stream_get_contents($handle);
        fclose($handle);

        return Response::make($csv, 200, [
            'Content-Type' => 'text/csv; charset=UTF-8',
            'Content-Disposition' => "attachment; filename={$filename}",
        ]);
    }

    /**
     * 削除（確認なし・即削除）
     */
    public function destroy($id)
    {
        $contact = Contact::findOrFail($id);
        $contact->delete();

        return redirect()->route('admin.index')
                         ->with('success', 'お問い合わせを削除しました。');
    }
}
