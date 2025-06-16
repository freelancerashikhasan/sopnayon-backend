<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\BlogDataTable;
use App\DataTables\MemberDataTable;
use App\Helpers\FileManager;
use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Member;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class BlogController extends Controller
{
    public function index(BlogDataTable $dataTable)
    {
        return $dataTable->render('admin.blog.index');
    }
    public function store(Request $request)
    {
        $member = new Blog();

        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'title_bn' => 'required|string|max:255',
            'description' => 'required',
            'description_bn' => 'required',
            'date' => 'required',
            'image' => 'required|image',
        ]);

        $member->title = $validatedData['title'];
        $member->title_bn = $validatedData['title_bn'];
        $member->description = $validatedData['description'];
        $member->description_bn = $validatedData['description_bn'];
        $member->date = $validatedData['date'];
        if ($request->hasFile('image')) {
            $file = new FileManager();
            if ($request->image) {
                $photo = $request->image;
                $file->folder('blog')->prefix('blog')->upload($photo) ? $image = $file->getName() : null;
            } else {
                $image = $member->image;
            }
        }
        $member->image = $image;
        $member->save();

        return response()->json(['success' => true, 'message' => 'Blog added successfully']);
    }
    public function update(Request $request, $id)
    {
        $member = Blog::findOrFail($id);

        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'title_bn' => 'required|string|max:255',
            'description' => 'required',
            'description_bn' => 'required',
            'date' => 'required',
            'image' => 'nullable|image',
        ]);
        $member->title = $validatedData['title'];
        $member->title_bn = $validatedData['title_bn'];
        $member->description = $validatedData['description'];
        $member->description_bn = $validatedData['description_bn'];
        $member->date = $validatedData['date'];

        if ($request->hasFile('image')) {
            $file = new FileManager();
            if ($request->image) {
                if (!empty($data->image)) {
                    Storage::disk('blog')->delete($member->image);
                }
                $photo = $request->image;
                $file->folder('blog')->prefix('blog')->upload($photo) ? $image = $file->getName() : null;
            } else {
                $image = $member->image;
            }
        } else {
            $image = $member->image;
        }
        $member->image = $image;
        $member->save();

        return response()->json(['success' => true, 'message' => 'Blog updated successfully']);
    }
    public function edit($id)
    {
        $member = Blog::findOrFail($id);
        return response()->json($member);
    }
    public function destroy($id)
    {
        $member = Blog::findOrFail($id);
        if (!empty($member->image)) {
            Storage::disk('blog')->delete($member->image);
        }
        $member->delete();
        return response()->json(['success' => true, 'message' => 'Blog deleted successfully']);
    }
}
