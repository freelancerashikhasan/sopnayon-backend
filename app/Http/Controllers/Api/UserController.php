<?php

namespace App\Http\Controllers\Api;

use App\Helpers\FileManager;
use App\Http\Controllers\Controller;
use App\Models\Account;
use App\Models\DonorMember;
use App\Models\Member;
use App\Models\Transaction;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function dashboard()
    {
        $myCredit = Transaction::whereNull('deleted_at')
            ->where('member_id', Auth::guard('member_api')->user()->id)
            ->sum('credit') ?? '0';
        $myDebit = Transaction::whereNull('deleted_at')
            ->where('member_id', Auth::guard('member_api')->user()->id)
            ->sum('debit') ?? '0';
        $myBalance = $myCredit - $myDebit;

        $organizationCredit = Transaction::whereNull('deleted_at')
            ->sum('credit') ?? '0';
        $organizationDebit = Transaction::whereNull('deleted_at')
            ->sum('debit') ?? '0';

        $organizationBalance = $organizationCredit - $organizationDebit;

        $accounts = Account::where('deleted_at', null)->get();

        $accountCards = $accounts->map(function ($account) {
            $accountCredit = Transaction::whereNull('deleted_at')
                ->where('account_id', $account->id)
                ->sum('credit');
            $accountDebit = Transaction::whereNull('deleted_at')
                ->where('account_id', $account->id)
                ->sum('debit');

            $accountBalance = $accountCredit - $accountDebit;

            return [
                'title' => $account->name,
                'amount' => number_format($accountBalance, 2) . " Taka",
                'icon' => 'FaDollarSign',
            ];
        });

        $totalMembers = Member::whereNull('deleted_at')->count();
        $totalDonorMembers = DonorMember::whereNull('deleted_at')->count();

        // Base cards
        $baseCards = [
            ["title" => "My Balance", "amount" => number_format($myBalance, 2) . " Taka", "icon" => "FaWallet"],
            ["title" => "Organization Balance", "amount" => number_format($organizationBalance, 2) . " Taka", "icon" => "FaPiggyBank"],
            ["title" => "Total Member", "amount" => $totalMembers . " Members", "icon" => "FaBriefcase"],
            ["title" => "Donor Member", "amount" => $totalDonorMembers . " Members", "icon" => "FaBriefcase"],
        ];

        $data = array_merge($baseCards, $accountCards->toArray());

        return response()->json($data);
    }
    public function profileEdit(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'username' => 'required|string|max:255',
            'phone' => 'required|string|max:15',
            'email' => 'required|email|max:255|unique:members,email,' . auth()->id(),
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Optional image validation
        ]);

        try {
            // Get the authenticated user
            $member = Member::findOrFail(Auth::guard('member_api')->user()->id);

            // Update user details
            $member->name = $request->input('name');
            $member->username = $request->input('username');
            $member->phone = $request->input('phone');
            $member->email = $request->input('email');

            if ($request->hasFile('image')) {
                $file = new FileManager();
                if ($request->image) {
                    if (!empty($member->image)) {
                        Storage::disk('member')->delete($member->image);
                    }
                    $photo = $request->image;
                    $file->folder('member')->prefix('member')->upload($photo) ? $image = $file->getName() : null;
                } else {
                    $image = $member->image;
                }
            } else {
                $image = $member->image;
            }
            $member->image = $image;
            $member->save();
            $member['image'] = asset('storage/member/' . $member->image);

            return response()->json(['message' => 'Profile updated successfully', 'user' => $member]);
        } catch (\Exception $e) {
            return response()->json(['error' => 'An error occurred while updating your profile. Please try again later.'], 500);
        }
    }
    public function deposit()
    {
        $deposit = Transaction::with(['account', 'receive_category', 'expense_category'])->where('deleted_at', null)->where('member_id', Auth::guard('member_api')->user()->id)->get();
        return response()->json($deposit);
    }
    public function totalMember()
    {
        $members = Member::where('deleted_at', null)->whereNot('id', Auth::guard('member_api')->user()->id)->get();
        $members->transform(function ($member) {
            if ($member->image != null) {

                $member['image'] = asset('storage/member/' . $member->image);
            } else {
                $member['image'] = asset('storage/member/member.jpg');
            }
            unset($member->password);
            unset($member->show_password);
            return $member;
        });
        return response()->json($members);
    }
    public function donorMember()
    {
        $members = DonorMember::where('deleted_at', null)->get();

        return response()->json($members);
    }
}
