<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CategoryController extends Controller
{
    public function index(): View
    {
        $categories = Category::where(['status' => 1])->orderBy('id','DESC')->get();
        return view('category.list', compact('categories'));
    }
    public function form(): View
    {
        return view('category.form');
    }

    public function process(Request $request)
    {
        // Validate Data
        $request->validate([
           'category_name' => ['required'],
           'status' => 'required'
        ]);
        // Data Insert
        $category = new Category();
        $category->category_name = $request->category_name;
        $category->status = $request->status;
        $category->save();
        // Return Response
//        return redirect()->back();
        return to_route('category.index')->with('FlsMsg', 'You have created a category successfully');
//        return response()->json(['success' => true, 'message' => 'success'], 200);
    }
    public function category_edit($id){
        $category= category::find($id);
        // dd($category);
        return view('category.edit', compact('category','id'));
    }
    public function category_editt(Request $request, $id){

        $category = category::find($id);
        $category->category_name= $request->category_name;
        $category->status= $request->status;
      
        $category->save();
        // dd($data);
        return redirect()->route('category.index', $id)->with ('FlsMsg',"Category Update Successfully");

    }
    
    public function category_delete(Request $request, $id){
        $category = category::find($id)->delete();
        return redirect()->route('category.index', $id)->with ('FlsMsg',"Student Delete Successfully");
    }
}
