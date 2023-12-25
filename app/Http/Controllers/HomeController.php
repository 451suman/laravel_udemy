<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\File;
class HomeController extends Controller
{
    public function index(){
        return view('home');
    }
    
    public function add_product(Request $request){
        $request->validate([
            'title' => 'required|min:10|max:20',
            'description' => 'required|max:10',
            'image' => 'required|mimes:png,jpg,jpeg|max:2048',
            // 'email'=>'required|email|unique:product'
        ],
        [
            'title.required' => 'Title is required (custom message of requiored)',
            'description.required' => 'description is required',
            'image.required' => 'Title is required',
        ]
    
    
    );
        
        // Your logic to process the form data comes here if validation passes
        
        $data=new Product;
        $data->title=$request->title;
        $data->description=$request->description;
        //   -> database(column)=    -> form name
        $image= $request ->image;
        //up tp here request from form 
        if($image){

            $imagename=time().'.'.$image->getClientOriginalExtension();//change name
            $request->image->move('product', $imagename); //move
            $data->image=$imagename; //
            
        }
        $data->save();
        return redirect()->back();
    }




    public function show_product(){
        $data= Product::all(); //alla data of the product table will be store in $data

        return view ('product',compact('data'));
    }



    public function delete_product($id)
    {
        $data = Product::find($id);
    
        if (!$data) {
            return redirect()->back()->with('error', 'Product not found');
        }
        $oldImage = $data->image;
        if ($oldImage && file_exists(public_path('product/' . $oldImage))) {
            File::delete(public_path('product/' . $oldImage));
        }
        $data->delete();
    
        return redirect()->back()->with('success', 'Product deleted successfully');
    }
    public function update_product($id)
    {
        $data = Product::find($id);
    
        if (!$data) {
            return redirect()->back()->with('error', 'Product not found');
        }
    
        return view ('product_update',compact('data'));
    }
    

   public function edit_product(Request $request, $id)
{
    $data = Product::find($id);
    $data->title = $request->title;
    $data->description = $request->description;

    // Get the old image filename
    $oldImage = $data->image;

    $image = $request->image;

    if ($image) {
        // Generate a unique filename for the new image
        $imageName = time() . '.' . $image->getClientOriginalExtension();

        // Move the new image to the 'product' directory
        $request->image->move('product', $imageName);

        // Set the new image filename in the database
        $data->image = $imageName;

        // Delete the old image file
        if ($oldImage && file_exists(public_path('product/' . $oldImage))) {
            File::delete(public_path('product/' . $oldImage));
        }
    }

    $data->save();

    return redirect()->back()->with('success', 'Update successful');
}
}
