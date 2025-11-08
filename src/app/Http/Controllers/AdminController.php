<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\ContactsExport;

class AdminController extends Controller
{
    // 一覧表示（検索含む）
    public function index(Request $request)
    {
        $query = Contact::query();

        if ($request->filled('keyword')) {
            $query->where('name', 'like', "%{$request->keyword}%")
                  ->orWhere('email', 'like', "%{$request->keyword}%");
        }

        $contacts = $query->orderBy('created_at', 'desc')->paginate(10);

        return view('admin', compact('contacts'));
    }

    // 削除処理
    public function destroy($id)
    {
        Contact::findOrFail($id)->delete();
        return redirect()->route('admin.index')->with('success', '削除しました。');
    }

    // CSVエクスポート
    public function export()
    {
        return Excel::download(new ContactsExport, 'contacts.csv');
    }
}
