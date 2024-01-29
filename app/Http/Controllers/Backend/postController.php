<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class postController extends Controller
{
    //__post Index__//
    public function index()
    {
        return view('backend.post.index');
    }
    //__post Index__//
    public function create()
    {
        $category = DB::table('categories')->get();
        $district = DB::table('districk')->get();

        return view('backend.post.create', compact('category', 'district'));
    }
    public function ajax($cat_id)
    {
        return $cat_id;
    }
}
