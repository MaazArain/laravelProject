<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
    public function checkCategory()
    {
        if(Auth::check())
        {
           $usertype = Auth::user()->usertype;
           if($usertype == '0')
           {
            $category = Category::all();
            return view('website.showCategory' , compact('category')); 
           }
           else{
            return redirect()->back();
           }
        }
    }
    // View Categories with there Products
    public function viewCategories()
    {
        
    }
}
