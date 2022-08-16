<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categories;

class CategoryController extends Controller
{
    public function set(Request $request)
    {
        $category = new Categories();
        $category->title = $request->title;
        $category->save();
    }

    public function index(){
        $categories = Categories::get();
        return $categories;
    }
}
