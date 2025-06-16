<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\MemberDataTable;
use App\DataTables\ExpenseDataTable;
use App\Helpers\FileManager;
use App\Http\Controllers\Controller;
use App\Models\Member;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class ExpenseController extends Controller
{
    public function index(ExpenseDataTable $dataTable)
    {
        return $dataTable->render('admin.expense.index');
    }
    public function store(Request $request)
    {
        $member = new Transaction();

        $validatedData = $request->validate([
            'account_id' => 'required|string|max:255',
            'category_id' => 'required|string|max:255',
            'amount' => 'required|string|max:255',
            'description' => 'nullable|string|max:255',

        ]);

        $member->type = 'cost';
        $member->account_id = $validatedData['account_id'];
        $member->debit = $validatedData['amount'];
        $member->date = now();
        $member->description = $validatedData['description'];
        $member->category_id = $validatedData['category_id'];
        $member->save();

        return response()->json(['success' => true, 'message' => 'Expense added successfully']);
    }
    public function update(Request $request, $id)
    {
        $member = Transaction::findOrFail($id);


        $validatedData = $request->validate([
            'account_id' => 'required|string|max:255',
            'amount' => 'required|string|max:255',
            'category_id' => 'required|string|max:255',
            'description' => 'nullable|string|max:255',

        ]);

        $member->type = 'cost';
        $member->account_id = $validatedData['account_id'];
        $member->debit = $validatedData['amount'];
        $member->description = $validatedData['description'];
        $member->category_id = $validatedData['category_id'];
        $member->save();

        return response()->json(['success' => true, 'message' => 'Expense added successfully']);
    }
    public function edit($id)
    {
        $member = Transaction::findOrFail($id);
        return response()->json($member);
    }
    public function destroy($id)
    {
        $member = Transaction::findOrFail($id);

        $member->delete();
        return response()->json(['success' => true, 'message' => 'Expense deleted successfully']);
    }
}
