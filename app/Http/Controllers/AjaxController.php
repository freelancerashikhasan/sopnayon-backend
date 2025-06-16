<?php

namespace App\Http\Controllers;

use App\Models\Account;
use App\Models\ExpenseCategory;
use App\Models\Member;
use App\Models\ReceiveCategory;
use Illuminate\Http\Request;

class AjaxController extends Controller
{
    public function getAccounts(Request $request)
    {
        $query = Account::query();

        if ($request->has('search')) {
            $search = $request->get('search');
            $query->where('name', 'like', '%' . $search . '%');
        }

        $accounts = $query->limit(10)->get(['id', 'name']);

        return response()->json($accounts);
    }
    public function getReceiveCategory(Request $request)
    {
        $query = ReceiveCategory::query();

        if ($request->has('search')) {
            $search = $request->get('search');
            $query->where('name', 'like', '%' . $search . '%');
        }

        $accounts = $query->limit(10)->get(['id', 'name']);

        return response()->json($accounts);
    }
    public function getExpenseCategory(Request $request)
    {
        $query = ExpenseCategory::query();

        if ($request->has('search')) {
            $search = $request->get('search');
            $query->where('name', 'like', '%' . $search . '%');
        }

        $accounts = $query->limit(10)->get(['id', 'name']);

        return response()->json($accounts);
    }
    public function getMembers(Request $request)
    {
        $query = Member::query();

        if ($request->has('search')) {
            $search = $request->get('search');
            $query->where('name', 'like', '%' . $search . '%');
        }

        $accounts = $query->limit(10)->get(['id', 'name']);

        return response()->json($accounts);
    }
}
