<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\ExpenseCategoryDataTable;
use App\DataTables\MemberDataTable;
use App\DataTables\SiteKeywordDataTable;
use App\Helpers\FileManager;
use App\Http\Controllers\Controller;
use App\Models\ExpenseCategory;
use App\Models\Member;
use App\Models\SiteKeyword;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class SiteKeywordController extends Controller
{
    public function index(SiteKeywordDataTable $dataTable)
    {
        return $dataTable->render('admin.site-keyword.index');
    }
    public function store(Request $request)
    {
        $member = new SiteKeyword();

        $validatedData = $request->validate([
            'keyword' => 'required|string|max:255',
            'en' => 'required|string|max:255',
            'bn' => 'required|string|max:255',

        ]);

        $member->keyword = $validatedData['keyword'];
        $member->en = $validatedData['en'];
        $member->bn = $validatedData['bn'];
        $member->save();

        return response()->json(['success' => true, 'message' => ' Added successfully']);
    }
    public function update(Request $request, $id)
    {
        $member = SiteKeyword::findOrFail($id);
        $validatedData = $request->validate([
            'keyword' => 'required|string|max:255',
            'en' => 'required|string|max:255',
            'bn' => 'required|string|max:255',

        ]);

        $member->keyword = $validatedData['keyword'];
        $member->en = $validatedData['en'];
        $member->bn = $validatedData['bn'];
        $member->save();

        return response()->json(['success' => true, 'message' => ' Updated successfully']);
    }
    public function edit($id)
    {
        $member = SiteKeyword::findOrFail($id);
        return response()->json($member);
    }
    public function destroy($id)
    {
        $member = SiteKeyword::findOrFail($id);

        $member->delete();
        return response()->json(['success' => true, 'message' => 'Deleted successfully']);
    }
}
