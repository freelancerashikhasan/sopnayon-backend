<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\MemberDataTable;
use App\Helpers\FileManager;
use App\Http\Controllers\Controller;
use App\Models\Member;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class MemberController extends Controller
{
    public function index(MemberDataTable $dataTable)
    {
        return $dataTable->render('admin.member.index');
    }
    public function store(Request $request)
    {
        $member = new Member();

        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'username' => 'required|string|max:255',
            'password' => 'required|string|max:255',
            'designation' => 'required|string|max:255',
            'email' => 'required|email',
            'phone' => 'required|string|max:20',
            'address' => 'required|string|max:255',
            'status' => 'required|in:1,2',
            'image' => 'required|image|max:2048',
        ]);

        $member->username = $validatedData['username'];
        $member->show_password = $validatedData['password'];
        $member->password = Hash::make($validatedData['password']);
        $member->designation = $validatedData['designation'];
        $member->name = $validatedData['name'];
        $member->email = $validatedData['email'];
        $member->phone = $validatedData['phone'];
        $member->address = $validatedData['address'];
        $member->status = $validatedData['status'];

        if ($request->hasFile('image')) {
            $file = new FileManager();
            if ($request->image) {

                $photo = $request->image;
                $file->folder('member')->prefix('member')->upload($photo) ? $image = $file->getName() : null;
            } else {
                $image = $member->image;
            }
        }
        $member->image = $image;
        $member->save();

        return response()->json(['success' => true, 'message' => 'Member added successfully']);
    }
    public function update(Request $request, $id)
    {
        $member = Member::findOrFail($id);

        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'username' => 'required|string|max:255',
            'password' => 'required|string|max:255',
            'designation' => 'required|string|max:255',
            'email' => 'required|email',
            'phone' => 'required|string|max:20',
            'address' => 'required|string|max:255',
            'status' => 'required|in:1,2',
            'image' => 'nullable|image|max:2048',
        ]);

        $member->name = $validatedData['name'];
        $member->username = $validatedData['username'];
        $member->show_password = $validatedData['password'];
        $member->password = Hash::make($validatedData['password']);
        $member->designation = $validatedData['designation'];
        $member->email = $validatedData['email'];
        $member->phone = $validatedData['phone'];
        $member->address = $validatedData['address'];
        $member->status = $validatedData['status'];

        if ($request->hasFile('image')) {
            $file = new FileManager();
            if ($request->image) {
                if (!empty($data->image)) {
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

        return response()->json(['success' => true, 'message' => 'Member updated successfully']);
    }
    public function edit($id)
    {
        $member = Member::findOrFail($id);
        return response()->json($member);
    }
    public function changeStatus($id)
    {
        $member = Member::findOrFail($id);
        $member->status = 0;
        $member->save();

        return response()->json($member);
    }
    public function destroy($id)
    {
        $member = Member::findOrFail($id);
        if (!empty($member->image)) {
            Storage::disk('member')->delete($member->image);
        }
        $member->delete();
        return response()->json(['success' => true, 'message' => 'Member deleted successfully']);
    }
}
