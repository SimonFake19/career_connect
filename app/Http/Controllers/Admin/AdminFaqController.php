<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Faq;

class AdminFaqController extends Controller
{
    public function index()
    {
        $faqs = Faq::get();
        return view('admin.faq', compact('faqs'));
    }

    public function create()
    {
        return view('admin.faq_create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'question' => 'required',
            'answer' => 'required'

        ]);

        $obj = new Faq();
        $obj->question = $request->question;
        $obj->answer = $request->answer;
        $obj->save();

        return redirect()->route('admin_faq')->with('success', 'Data is saved successfully.');
    }

    public function edit($id)
    {
        $faq_single = Faq::where('id', $id)->first();
        return view('admin.faq_edit', compact('faq_single'));
    }
    public function update(Request $request, $id)
    {
        $obj = Faq::where('id', $id)->first();
        $request->validate([
            'name' => 'required',
            'designation' => 'required',
            'comment' => 'required',

        ]);
        if ($request->hasFile('photo')) {
            $request->validate([
                'photo' => 'image|mimes:jpg,jpeg,png,gif'

            ]);

            unlink(public_path('uploads/' . $obj->photo));

            $ext = $request->file('photo')->extension();
            $final_name = 'testimonial_' . time() . '.' . $ext;

            $request->file('photo')->move(public_path('uploads/'), $final_name);

            $obj->photo = $final_name;
        }

        $obj->name = $request->name;
        $obj->designation = $request->designation;
        $obj->comment = $request->comment;

        $obj->update();

        return redirect()->route('admin_testimonial')->with('success', 'Data is updated successfully.');
    }
    public function delete($id)
    {
        $testimonial_single = Faq::where('id', $id)->first();
        unlink(public_path('uploads/' . $testimonial_single->photo));
        Faq::where('id', $id)->delete();
        return redirect()->route('admin_testimonial')->with('success', 'Data is deleted successfully.');
    }

}
