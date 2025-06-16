<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\ReceiveCategoryDataTable;
use App\DataTables\MemberDataTable;
use App\Helpers\FileManager;
use App\Http\Controllers\Controller;
use App\Models\ReceiveCategory;
use App\Models\Member;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class ReceiveCategoryController extends Controller
{
    public function index(ReceiveCategoryDataTable $dataTable)
    {
        return $dataTable->render('admin.receive-category.index');
    }
    public function store(Request $request)
    {
        $member = new ReceiveCategory();

        $validatedData = $request->validate([
            'name' => 'required|string|max:255',

        ]);

        $member->name = $validatedData['name'];
        $member->save();

        return response()->json(['success' => true, 'message' => ' Added successfully']);
    }
    public function update(Request $request, $id)
    {
        $member = ReceiveCategory::findOrFail($id);
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',

        ]);

        $member->name = $validatedData['name'];
        $member->save();

        return response()->json(['success' => true, 'message' => ' Updated successfully']);
    }
    public function edit($id)
    {
        $member = ReceiveCategory::findOrFail($id);
        return response()->json($member);
    }
    public function destroy($id)
    {
        $member = ReceiveCategory::findOrFail($id);

        $member->delete();
        return response()->json(['success' => true, 'message' => 'Member deleted successfully']);
    }
}
