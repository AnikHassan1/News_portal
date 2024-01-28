<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    //__index Category__//
    public function index()
    {
        $category = DB::table('categories')->get();
        return view('backend.category.index', compact('category'));
    }
    public function home()
    {
        return view('layouts.app');
    }
    //__Category Store__//
    public function store(Request $request)
    {

        $validatedData = $request->validate([
            'category_bn' => 'required|unique:categories|max:255',
            'category_en' => 'required|unique:categories|max:255',
        ]);

        $data = array();
        $data['category_bn'] = $request->category_bn;
        $data['category_en'] = $request->category_en;

        DB::table('categories')->insert($data);

        $notification = array(
            'message' => 'Successfully Insert Category!',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }
    //__Category delete__//
    public function delete($id)
    {
        $delete = DB::table('categories')->where('id', $id)->delete();
        $notification = array(
            'message' => 'Successfully Delete Category!',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
    //__category Edit__//
    public function edit($id){
        $edit=DB::table('categories')->where('id',$id)->first();
        return view('backend.category.edit', compact('edit'));
    }
    //__Category Update__//
    public function update(Request $request,$id){
        $validatedData = $request->validate([
            'category_bn' => 'required|max:255',
            'category_en' => 'required|max:255',
        ]);
        $data = array();
        $data['category_bn'] = $request->category_bn;
        $data['category_en'] = $request->category_en;

        DB::table('categories')->where('id',$id)->update($data);
        $notification = array(
            'message' => 'Successfully Update Category!',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
}
