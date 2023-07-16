<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\JobCategory;
use App\Models\PageHomeItem;
use App\Models\PageJobCategoryItem;

class JobCategoryController extends Controller
{
    public function categories()
    {
        // $home_page_data = PageHomeItem::where('id', 1)->first();
        // return view('front.job_categories')->with([
        //     'home_page_data' => $home_page_data,
        // ]);
        $job_category_page_item = PageJobCategoryItem::where('id', 1)->first();
        $job_categories = JobCategory::orderBy('name','asc')->get();
        return view('front.job_categories',compact('job_categories', 'job_category_page_item'));
    }

    
}
