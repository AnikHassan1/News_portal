<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class districkController extends Controller
{
     //__index Category__//
     public function index()
     {
         $district = DB::table('districk')->get();
         return view('backend.district.index', compact('district'));
     }

     //__District Store__//
     public function store(Request $request)
     {

         $validatedData = $request->validate([
             'District_bn' => 'required|unique:districk|max:255',
             'District_en' => 'required|unique:districk|max:255',
         ]);

         $data = array();
         $data['District_bn'] = $request->District_bn;
         $data['District_en'] = $request->District_en;

         DB::table('districk')->insert($data);

         $notification = array(
             'message' => 'Successfully Insert district!',
             'alert-type' => 'success'
         );

         return redirect()->back()->with($notification);
     }
     //District_bn delete__//
     public function delete($id)
     {
         $delete = DB::table('districk')->where('id', $id)->delete();
         $notification = array(
             'message' => 'Successfully Delete district!',
             'alert-type' => 'success'
         );
         return redirect()->back()->with($notification);
     }
     //District_bn Edit__//
     public function edit($id){
         $edit=DB::table('districk')->where('id',$id)->first();
         return view('backend.district.edit', compact('edit'));
     }
     //District_bn Update__//
     public function update(Request $request,$id){
         $validatedData = $request->validate([
             'District_bn' => 'required|max:255',
             'District_en' => 'required|max:255',
         ]);
         $data = array();
         $data['District_bn'] = $request->District_bn;
         $data['District_en'] = $request->District_en;

         DB::table('districk')->where('id',$id)->update($data);
         $notification = array(
             'message' => 'Successfully Update district!',
             'alert-type' => 'success'
         );
         return redirect()->route('district.index ')->with($notification);
     }
}
