<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\Products;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function add_category()
    {
        return view('admin.categories.add_categories');
    }
    public function post_category(Request $request)
    {
            $request->validate([
                'category_name' => 'required',
                'title' => 'required',
                'category_content' => 'required',
            'image' => 'required|image|mimes:jpeg,jpg,gif,png|max:2048',
                
            ]);
            $category = new Category();
            $category->category_name = $request->category_name;
            $category->title = $request->title;
            $category->category_content = $request->category_content;
            if($request->hasFile('image'))
            {
                $image = $request->image;
                $imageName = time() . '.' . $image->getClientOriginalExtension();
                $request->image->move('uploadCategory' , $imageName);
                $category->image = $imageName;            
                $category->save();

            }

            return redirect()->back()->with('success' , 'Category Data Added Successfully!');
    }
     


    public function viewCategory()
    {
        $viewData = Category::all();
        return view('admin.categories.viewCategory' , ['viewData' => $viewData]);
    }
    public function delete($id)
    {
        $view = Category::find($id);
        $view->delete();
        return redirect()->back()->with('Success' , 'Category Delete successfully!');
    }
    public function editCategory($id)
    {
        $view = Category::find($id);
        return view('admin.categories.edit_categories' , ['view' => $view]);
    }
    public function updateCategory(Request $request , $id)
    {
        $view = Category::find($id);
        $view->category_name = $request->category_name;
        $view->title  = $request->title;
        $view->category_content = $request->category_content;
        $view->update();

        return redirect()->back()->with('Success' , 'Category Data Updated Successfully');
    }   
    public function addPro()
    {
        
        $category = Category::all();
        return view('admin.products.add_products' , compact('category'));      
    }
    // Add Product
    public function postProduct(Request $request , $id)
    {
        // $request->validate([
        //     'title' => 'required|string|max:255',
        //     'description' => 'nullable|string',
        //     'category' => 'required',
        //     'quantity' => 'numeric|required',
        //     'price' => 'required|numeric|min:0',
        //     'discount_price' => 'required|numeric|min:0',
        //     'image' => 'required|image|mimes:jpeg,jpg,gif,png|max:2048',
        // ]);
        
        $categories = Category::where('id' , $id)->get()->first();
        $product = new Products();
        $product->title = $request->title;
        $product->description = $request->description;
        $product->category = $request->category;
        $product->quantity = $request->quantity;
        $product->price = $request->price;
        $product->discount_price = $request->discount_price;
        $product->category_id = $categories->id;
       if($request->hasFile('image'))
       {
        $image = $request->image;
        $imageName = time() . '.' . $image->getClientOriginalExtension();
        $request->image->move('uploadProduct' ,  $imageName);
        $product->image = $imageName;
       }
        $product->save();
        return redirect()->back()->with('Success' , 'Product Has Successfully Added!');
    }

    public function viewProduct(Request $request)
    {
        $products = Products::all();
        return view('admin.products.viewProduct' , compact('products'));
    }
    public function editProduct($id)
    {
        $product = Products::find($id);
        $category = Category::all();
        //dd($product);
        return view('admin.products.updateProducts' , compact('product' , 'category'));
    }

    public function updateProduct(Request $request , $id)
    {
        $product = Products::find($id);

        $product->title = $request->title;
        $product->description =  $request->description;
        $product->category  =   $request->category;
        $product->quantity = $request->quantity;
        $product->price = $request->price;
        $product->discount_price = $request->discount_price;

        if($request->hasFile('image'))
        {
            $image = $request->image;
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $request->image->move('uploadProduct', $imageName);
            $product->image = $imageName;


            $product->update();
        }

        return redirect()->back()->with('success' , 'ProductData Updated SUccessfully!');
    }
    

    public function deleteProduct($id)
    {
        $product = Products::find($id);
        $product->delete();
        return redirect()->back()->with('message' , 'Delete product Successfully');
    }
}
