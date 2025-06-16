<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\BlogDataTable;
use App\DataTables\GallaryDataTable;
use App\DataTables\MemberDataTable;
use App\Helpers\FileManager;
use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Gallary;
use App\Models\Member;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class GallaryController extends Controller
{
    public function index(GallaryDataTable $dataTable)
    {
        return $dataTable->render('admin.gallary.index');
    }
    public function store(Request $request)
    {
        $member = new Gallary();
        $validatedData = $request->validate([
            'image' => 'required|image',
        ]);

        if ($request->hasFile('image')) {
            $file = new FileManager();
            if ($request->image) {
                $photo = $request->image;
                $file->folder('blog')->prefix('gallary')->upload($photo) ? $image = $file->getName() : null;
            } else {
                $image = $member->image;
            }
        }
        $member->image = $image;
        $member->save();

        return response()->json(['success' => true, 'message' => 'Gallary added successfully']);
    }
    public function update(Request $request, $id)
    {
        $member = Gallary::findOrFail($id);

        $validatedData = $request->validate([
            'image' => 'required|image',
        ]);
        if ($request->hasFile('image')) {
            $file = new FileManager();
            if ($request->image) {
                if (!empty($data->image)) {
                    Storage::disk('blog')->delete($member->image);
                }
                $photo = $request->image;
                $file->folder('blog')->prefix('gallary')->upload($photo) ? $image = $file->getName() : null;
            } else {
                $image = $member->image;
            }
        } else {
            $image = $member->image;
        }
        $member->image = $image;
        $member->save();

        return response()->json(['success' => true, 'message' => 'Gallary updated successfully']);
    }
    public function edit($id)
    {
        $member = Gallary::findOrFail($id);
        return response()->json($member);
    }
    public function destroy($id)
    {
        $member = Gallary::findOrFail($id);
        if (!empty($member->image)) {
            Storage::disk('blog')->delete($member->image);
        }
        $member->delete();
        return response()->json(['success' => true, 'message' => 'Gallary deleted successfully']);
    }
}
