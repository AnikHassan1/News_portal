<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class subDistrickController extends Controller
{
    //__Sub District Index__//
    public function index()
    {
        $sub = DB::table('subdistrick')
            ->join('districk', 'subdistrick.district_id', 'districk.id')
            ->select('districk.District_bn', 'districk.District_en', 'subdistrick.*')
            ->get();
        $dis = DB::table('districk')->get();
        return view('backend.subDistrict.index', compact('sub', 'dis'));
    }
    //__SubDistrict Store__//
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'subDistrict_bn' => 'required|unique:subdistrick|max:255',
            'subDistrict_en' => 'required|unique:subdistrick|max:255',
            'district_id' => 'required|max:25',
        ]);
        $data = array();
        $data['subDistrict_bn'] = $request->subDistrict_bn;
        $data['subDistrict_en'] = $request->subDistrict_en;
        $data['district_id'] = $request->district_id;

        DB::table('subdistrick')->insert($data);

        $notification = array(
            'message' => 'Successfully Insert sub district!',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }
    //__SubDistrict delete__//
    public function delete($id)
    {
       DB::table('subdistrick')->where('id', $id)->delete();
        $notification = array(
            'message' => 'Successfully Delete SubDistrict!',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
     //__SubDistrict Edit__//
     public function edit($id){
        $edit=DB::table('subdistrick')->where('id',$id)->first();
        $dis= DB::table('districk')->get();
        return view('backend.subDistrict.edit', compact('edit','dis'));
    }
    //____SubDistrict Update__//
    public function update(Request $request,$id){
        $validatedData = $request->validate([
            'subDistrict_bn' => 'required|max:255',
            'subDistrict_en' => 'required|max:255',
            'district_id' => 'required|max:25',
        ]);
        $data = array();
        $data['subDistrict_bn'] = $request->subDistrict_bn;
        $data['subDistrict_en'] = $request->subDistrict_en;
        $data['district_id'] = $request->district_id;

        DB::table('subdistrick')->where('id',$id)->update($data);
        $notification = array(
            'message' => 'Successfully Update Sub Category!',
            'alert-type' => 'success'
        );
        return redirect()->route("subDistrict.index")->with($notification);
    }
}
