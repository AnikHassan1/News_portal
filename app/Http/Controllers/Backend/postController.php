<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;
use Illuminate\Support\Facades\Auth;
use URL;
use Illuminate\Support\Facades\File;

class postController extends Controller
{
    //__post Index__//
    public function index()
    {
        // $post=DB::table('posts')
        // ->join('categories','posts.cat_id','categories.id')
        // ->join('subcategories','posts.sub_cat_id','subcategories.id')
        // ->join('districk','posts.dis_id','districk.id')
        // ->join('subdistrick','posts.sub_dis_id','subdistrick.id')
        // ->get();
        $post = DB::table('posts')
            ->join('categories', 'posts.cat_id', 'categories.id')
            ->join('subcategories', 'posts.sub_cat_id', 'subcategories.id')
            ->select('posts.*', 'categories.category_bn', 'subcategories.subcategory_bn')
            ->get();

        return view('backend.post.index', compact('post'));
    }
    //__post Index__//
    public function create()
    {
        $category = DB::table('categories')->get();
        $district = DB::table('districk')->get();

        return view('backend.post.create', compact('category', 'district'));
    }
    //__Json Format Data Sub Category__//
    public function ajax($cat_id)
    {
        $data = DB::table('subcategories')->where('category_id', $cat_id)->get();
        return response()->json($data);
    }
    //__Json Format Data Sub District__//
    public function ajaxDistrict($dis_id)
    {
        $data = DB::table('subdistrick')->where('district_id', $dis_id)->get();
        return response()->json($data);
    }
    //__Post Store__//
    public function store(Request $request)
    {

        $request->validate([
            'title_bn' => 'required|unique:posts|max:255',
            'title_en' => 'required|unique:posts|max:255',
            'cat_id' => 'required',
            'sub_cat_id' => 'required',
            'dis_id' => 'required',
            'sub_dis_id' => 'required',
            'image' => 'required|max:255',
            'tags_bn' => 'required|max:255',
            'tags_en' => 'required|max:255',
            'details_bn' => 'required|max:255',
            'details_en' => 'required|max:255',

        ]);
        $data = array();
        $data['title_bn'] = $request->title_bn;
        $data['title_en'] = $request->title_en;

        $slug = str::of($request->title_en)->slug('-');

        $data['cat_id'] = $request->cat_id;
        $data['sub_cat_id'] = $request->sub_cat_id;

        $data['dis_id'] = $request->dis_id;
        $data['sub_dis_id'] = $request->sub_dis_id;
        $data['user_id'] = Auth::user()->id;

        $data['tags_bn'] = $request->tags_bn;
        $data['tags_en'] = $request->tags_en;

        $data['details_bn'] = $request->details_bn;
        $data['details_en'] = $request->details_en;

        $data['headline'] = $request->headline;
        $data['bigthumnail'] = $request->bigthumnail;
        $data['first_section'] = $request->first_section;
        $data['first_section_thumnail'] = $request->first_section_thumnail;

        $data['post_date'] = date('d-m-y');
        $data['post_month'] = date('F');

        $image = $request->image;
        if ($image) {

            $manager = new ImageManager(new Driver());
            $photoname = time() . $image->getClientOriginalExtension(); //slugname
            $image = $manager->read($image);
            $image->scale(width: 300);
            $image->toJpeg(80)->save(base_path('public/postimage/' . $photoname));
            $data['image'] = '/postimage/' . $photoname;

            DB::table('posts')->insert($data);

            $notification = array(
                'message' => 'Successfully Update Post!',
                'alert-type' => 'success'
            );
            return redirect()->back()->with($notification);
        } else {
            return redirect()->back();
        }
    }
    //__post Delete__//
    public function delete($id)
    {
        $post = DB::table("posts")->where('id', $id)->first();
        $path = public_path($post->image);

        if (file_exists($path)) {
            unlink($path);
            DB::table("posts")->where('id', $id)->delete();
            $notification = array(
                'message' => 'Successfully Delete Post!',
                'alert-type' => 'success'
            );
            return redirect()->back()->with($notification);
        }
    }
    public function edit($id)
    {
        $category = DB::table('categories')->get();
        $district = DB::table('districk')->get();
        $post = DB::table("posts")->where('id', $id)->first();
        return view('backend.post.edit', compact('post', 'category', 'district'));
    }
    //__UpDate Post__//
    public function update(Request $request, $id)
    {
        //dd($request->all());

        $data = array();
        $data['title_bn'] = $request->title_bn;
        $data['title_en'] = $request->title_en;

        $data['cat_id'] = $request->cat_id;
        $data['sub_cat_id'] = $request->sub_cat_id;

        $data['dis_id'] = $request->dis_id;
        $data['sub_dis_id'] = $request->sub_dis_id;
        $data['user_id'] = Auth::user()->id;

        $data['tags_bn'] = $request->tags_bn;
        $data['tags_en'] = $request->tags_en;

        $data['details_bn'] = $request->details_bn;
        $data['details_en'] = $request->details_en;

        $data['headline'] = $request->headline;
        $data['bigthumnail'] = $request->bigthumnail;
        $data['first_section'] = $request->first_section;
        $data['first_section_thumnail'] = $request->first_section_thumnail;

        $image = $request->image;
       // dd($image);
        $oldimage=public_path($request->oldimage);
        //dd($oldimage);
        if ($image){

            $manager = new ImageManager(new Driver());
            $photoname = time() . $image->getClientOriginalExtension(); //slugname
            $image = $manager->read($image);
            $image->scale(width: 300);
            $image->toJpeg(80)->save(base_path('public/postimage/' . $photoname));
            $data['image'] = '/postimage/' . $photoname;

            DB::table('posts')->where('id',$id)->update($data);
           if(file_exists( $oldimage)){
            unlink($oldimage);
           }
            $notification = array(
                'message' => 'Successfully Update Post!',
                'alert-type' => 'success'
            );
            return redirect()->back()->with($notification);
        } else {
            $data['image']=$oldimage;
            DB::table('posts')->where('id',$id)->update($data);
            $notification = array(
                'message' => 'Successfully Update Post!',
                'alert-type' => 'success'
            );
            return redirect()->back()->with($notification);
        }
    }
}
