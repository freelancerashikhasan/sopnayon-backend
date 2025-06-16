<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Gallary;
use App\Models\Member;
use App\Models\SiteKeyword;
use App\Models\SiteSetting;
use Carbon\Carbon;
use Illuminate\Http\Request;

class CompanyInformationController extends Controller
{
    public function index()
    {
        $companyInfo = SiteSetting::first();
        $companyInfo['logo'] = asset('storage/company/' . $companyInfo->logo);
        $companyInfo['chairman_image'] = asset('storage/company/' . $companyInfo->chairman_image);
        $companyInfo['secretary_image'] = asset('storage/company/' . $companyInfo->secretary_image);
        return response()->json($companyInfo, 200);
    }
    public function siteKeyword()
    {
        $companyInfo = SiteKeyword::get();

        return response()->json($companyInfo, 200);
    }
    public function blogs()
    {
        $blogs = Blog::orderBy('created_at', 'desc')->get();
        $blogs->each(function ($blog) {

            $blog->image = asset('storage/blog/' . basename($blog->image));
            $blog->date = Carbon::parse($blog->date)->format('D, d M Y');
        });

        return response()->json($blogs, 200);
    }
    public function gallary()
    {
        $blogs = Gallary::orderBy('created_at', 'desc')->get();
        $blogs->each(function ($blog) {

            $blog->image = asset('storage/blog/' . basename($blog->image));
        });

        return response()->json($blogs, 200);
    }
    public function member()
    {
        $blogs = Member::select(['id', 'name', 'designation', 'image'])->orderBy('created_at', 'asc')->get();
        $blogs->each(function ($blog) {

            if ($blog->image != null) {
                $blog->image = asset('storage/member/' . basename($blog->image));
            } else {
                $blog->image = asset('storage/member/member.jpg');
            }
        });

        return response()->json($blogs, 200);
    }
}
