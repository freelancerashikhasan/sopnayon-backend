<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\AccountDataTable;
use App\DataTables\AccountStatementDataTable;
use App\DataTables\ExpenseCategoryDataTable;
use App\DataTables\MemberDataTable;
use App\Helpers\FileManager;
use App\Http\Controllers\Controller;
use App\Models\Account;
use App\Models\ExpenseCategory;
use App\Models\Member;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class AccountController extends Controller
{

    public function index(AccountDataTable $dataTable)
    {
        return $dataTable->render('admin.account.index');
    }
    public function statement(AccountStatementDataTable $dataTable)
    {
        return $dataTable->render('admin.account.statement');
    }
    public function store(Request $request)
    {
        $member = new Account();

        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'initial_amount' => 'nullable|string|max:255',

        ]);

        $member->name = $validatedData['name'];
        $member->balance = $validatedData['initial_amount'] ?? '0';
        $member->save();

        return response()->json(['success' => true, 'message' => ' Added successfully']);
    }
    public function update(Request $request, $id)
    {
        $member = Account::findOrFail($id);
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'initial_amount' => 'nullable|string|max:255',
        ]);

        $member->name = $validatedData['name'];
        $member->balance = $validatedData['initial_amount'] ?? '0';
        $member->save();

        return response()->json(['success' => true, 'message' => ' Updated successfully']);
    }
    public function edit($id)
    {
        $member = Account::findOrFail($id);
        return response()->json($member);
    }
    public function destroy($id)
    {
        $member = Account::findOrFail($id);

        $member->delete();
        return response()->json(['success' => true, 'message' => 'Member deleted successfully']);
    }
}
