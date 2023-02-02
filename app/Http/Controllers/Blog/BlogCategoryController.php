<?php
namespace App\Http\Controllers\Blog;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BlogCategory;

class BlogCategoryController extends Controller
{
    public function AllBlogCategory(){

        $blogcategory = BlogCategory::latest()->get();
        return view('admin.blog.blog_category',compact('blogcategory'));

    } // End Method


    public function AddBlogCategory(){

        return view('admin.blog.add_blog_category');
    } // End Method


    public function StoreBlogCategory(Request $request){
        
            $request->validate([
                'blog_category' => 'required',           

            ],[

                'blog_category.required' => 'Blog Category is Required',
            ]);
         
            BlogCategory::insert([
                'blog_category' => $request->blog_category,               

            ]); 

            $notification = array(
            'message' => 'Blog Category Inserted Successfully', 
            'alert-type' => 'success'
        );

        return redirect()->route('all.blog.category')->with($notification);


    } // End Method


    public function EditBlogCategory($id){

        $blogcategory = BlogCategory::findOrFail($id);
        return view('admin.blog.edit_blog_category',compact('blogcategory'));

    } // End Method


    public function UpdateBlogCategory(Request $request,$id){

        $request->validate([
            'blog_category' => 'required',           

        ],[

            'blog_category.required' => 'Blog Category is Required, you cannot submit an empty category',
        ]);

         BlogCategory::findOrFail($id)->update([
                'blog_category' => $request->blog_category,               

            ]); 

            $notification = array(
            'message' => 'Blog Category Updated Successfully', 
            'alert-type' => 'success'
        );

        return redirect()->route('all.blog.category')->with($notification);

    } // End Method

    public function DeleteBlogCategory($id){

        BlogCategory::findOrFail($id)->delete();

         $notification = array(
            'message' => 'Blog Category Deleted Successfully', 
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);       

    } // End Method
}
