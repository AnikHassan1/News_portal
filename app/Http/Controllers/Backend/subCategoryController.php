<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class subCategoryController extends Controller
{
    //__subCategory Index__//
    public function index(){
       $subcat= DB::table('subcategories')
       ->join('categories','subcategories.category_id','categories.id')
       ->select('categories.category_bn','categories.category_en','subcategories.*')
       ->get();
       $cat= DB::table('categories')->get();
       return view('backend.subcategory.index',compact('subcat','cat'));
    }
    //__Subcategory Store__//
    public function store(Request $request){
        $validatedData = $request->validate([
            'subcategory_bn' => 'required|unique:subcategories|max:255',
            'subcategory_en' => 'required|unique:subcategories|max:255',
            'category_id' => 'required|max:255',
        ]);
        $data = array();
        $data['subcategory_bn'] = $request->subcategory_bn;
        $data['subcategory_en'] = $request->subcategory_en;
        $data['category_id'] = $request->category_id;

        DB::table('subcategories')->insert($data);

        $notification = array(
            'message' => 'Successfully Insert sub Category!',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }
    //__Sub Category delete__//
    public function delete($id)
    {
        $delete = DB::table('subcategories')->where('id', $id)->delete();
        $notification = array(
            'message' => 'Successfully Delete Sub Category!',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
      //__sub category Edit__//
      public function edit($id){
        $edit=DB::table('subcategories')->where('id',$id)->first();
        $cat= DB::table('categories')->get();
        return view('backend.subcategory.Edit', compact('edit','cat'));
    }
     //__Sub Category Update__//
     public function update(Request $request,$id){
        $validatedData = $request->validate([
            'subcategory_bn' => 'required|max:255',
            'subcategory_en' => 'required|max:255',
            'category_id' => 'required|max:255',
        ]);
        $data = array();
        $data['subcategory_bn'] = $request->subcategory_bn;
        $data['subcategory_en'] = $request->subcategory_en;
        $data['category_id'] = $request->category_id;

        DB::table('subcategories')->where('id',$id)->update($data);
        $notification = array(
            'message' => 'Successfully Update Sub Category!',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
}
