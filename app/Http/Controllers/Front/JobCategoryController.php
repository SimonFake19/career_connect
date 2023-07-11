<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\JobCategory;
use App\Models\PageHomeItem;

class JobCategoryController extends Controller
{
    public function categories()
    {
        // $home_page_data = PageHomeItem::where('id', 1)->first();
        // return view('front.job_categories')->with([
        //     'home_page_data' => $home_page_data,
        // ]);
        return view('front.job_categories');
    }
}
