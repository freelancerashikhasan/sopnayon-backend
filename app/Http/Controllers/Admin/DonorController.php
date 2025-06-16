<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\DonorDataTable;
use App\DataTables\MemberDataTable;
use App\Helpers\FileManager;
use App\Http\Controllers\Controller;
use App\Models\DonorMember;
use App\Models\Member;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class DonorController extends Controller
{
    public function index(DonorDataTable $dataTable)
    {
        return $dataTable->render('admin.donor-member.index');
    }
    public function store(Request $request)
    {
        $member = new DonorMember();

        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'phone' => 'required|string|max:20',
            'address' => 'required|string|max:255',
        ]);

        $member->name = $validatedData['name'];
        $member->email = $validatedData['email'];
        $member->phone = $validatedData['phone'];
        $member->address = $validatedData['address'];

        $member->save();

        return response()->json(['success' => true, 'message' => 'Member added successfully']);
    }
    public function update(Request $request, $id)
    {
        $member = DonorMember::findOrFail($id);

        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'phone' => 'required|string|max:20',
            'address' => 'required|string|max:255',
        ]);

        $member->name = $validatedData['name'];
        $member->email = $validatedData['email'];
        $member->phone = $validatedData['phone'];
        $member->address = $validatedData['address'];

        $member->save();

        return response()->json(['success' => true, 'message' => 'Member updated successfully']);
    }
    public function edit($id)
    {
        $member = DonorMember::findOrFail($id);
        return response()->json($member);
    }
    public function destroy($id)
    {
        $member = DonorMember::findOrFail($id);
        $member->delete();
        return response()->json(['success' => true, 'message' => 'Member deleted successfully']);
    }
}
