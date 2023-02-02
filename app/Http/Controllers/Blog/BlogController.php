<?php

namespace App\Http\Controllers\Blog;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Blog;
use App\Models\BlogCategory; 
use Image;
use Illuminate\Support\Carbon;

class BlogController extends Controller
{
    public function AllBlog(){

        $blogs = Blog::latest()->get();
        $categories = BlogCategory::orderBy('blog_category','ASC')->get();
        return view('admin.blog.blogs',compact('blogs','categories'));
    } // End Method


    public function AddBlog(){
        $categories = BlogCategory::orderBy('blog_category','ASC')->get();
        return view('admin.blog.add_blog',compact('categories'));
    }// End Method


    public function StoreBlog(Request $request){

        $request->validate([
            'blog_category_id' => 'required|not_in:Select Category',
            'blog_title' => 'required',
            'blog_tags' => 'required',
            'blog_image' => 'required|max:500',
            'blog_description' => 'required',           

        ],[

            'blog_category_id.required' => 'Blog category is Required',
            'blog_title.required' => 'Blog title is Required',
            'blog_tags.required' => 'Blog tags are Required',
            'blog_image.required' => 'Blog image is Required',
            'blog_image.size' => 'Image must be 500kb or less in size',
        ]);

         $image = $request->file('blog_image');
         $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();  

            Image::make($image)->resize(430,327)->save('upload/blog/'.$name_gen);
            $save_url = 'upload/blog/'.$name_gen;

            Blog::insert([
                'blog_category_id' => $request->blog_category_id,
                'blog_title' => $request->blog_title,
                'blog_tags' => $request->blog_tags,
                'blog_description' => $request->blog_description,
                'blog_image' => $save_url,
                'created_at' => Carbon::now(),

            ]); 
            $notification = array(
            'message' => 'Blog Inserted Successfully', 
            'alert-type' => 'success'
        );

        return redirect()->route('all.blog')->with($notification);

    }// End Method


    public function EditBlog($id){

         $blogs = Blog::findOrFail($id);
         $categories = BlogCategory::orderBy('blog_category','ASC')->get();
        return view('admin.blog.edit_blog',compact('blogs','categories'));

    } // End Method



    public function UpdateBlog(Request $request){

        $request->validate([
            'blog_category_id' => 'required|not_in:Select Category',
            'blog_title' => 'required',
            'blog_tags' => 'required',
            'blog_image' => 'max:500',
            'blog_description' => 'required',           

        ],[

            'blog_category_id.required' => 'Blog category is Required',
            'blog_title.required' => 'Blog title is Required',
            'blog_tags.required' => 'Blog tags are Required',            
            'blog_image.size' => 'Image must be 500kb or less in size',
        ]);

         $blog_id = $request->id;

        if ($request->file('blog_image')) {
            $image = $request->file('blog_image');
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();  

             Image::make($image)->resize(430,327)->save('upload/blog/'.$name_gen);
            $save_url = 'upload/blog/'.$name_gen;

            Blog::findOrFail($blog_id)->update([
                'blog_category_id' => $request->blog_category_id,
                'blog_title' => $request->blog_title,
                'blog_tags' => $request->blog_tags,
                'blog_description' => $request->blog_description,
                'blog_image' => $save_url,

            ]); 
            $notification = array(
            'message' => 'Blog Updated with Image Successfully', 
            'alert-type' => 'success'
        );

        return redirect()->route('all.blog')->with($notification);

        } else{

            Blog::findOrFail($blog_id)->update([
                'blog_category_id' => $request->blog_category_id,
                'blog_title' => $request->blog_title,
                'blog_tags' => $request->blog_tags,
                'blog_description' => $request->blog_description, 

            ]); 

            $notification = array(
            'message' => 'Blog Updated without Image Successfully', 
            'alert-type' => 'success'
        );

       return redirect()->route('all.blog')->with($notification);

        } // end Else

    } // End Method



    public function DeleteBlog($id){

        $blogs = Blog::findOrFail($id);
        $img = $blogs->blog_image;
        unlink($img);

        Blog::findOrFail($id)->delete();

         $notification = array(
            'message' => 'Blog Deleted Successfully', 
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);       

     } // End Method 



     public function BlogDetails($id){

        $allblogs = Blog::latest()->limit(5)->get();
        $blogs = Blog::findOrFail($id);
        $categories = BlogCategory::orderBy('blog_category','ASC')->get();
        return view('frontend.blog.details',compact('blogs','allblogs','categories'));

     } // End Method 


     public function CategoryBlog($id){

        $blogpost = Blog::where('blog_category_id',$id)->orderBy('id','DESC')->get();
        $allblogs = Blog::latest()->limit(5)->get();
        $categories = BlogCategory::orderBy('blog_category','ASC')->get();
        $categoryname = BlogCategory::findOrFail($id);
        return view('frontend.blog.category',compact('blogpost','allblogs','categories','categoryname'));

     } // End Method 

     public function HomeBlog(){

        $categories = BlogCategory::orderBy('blog_category','ASC')->get();
        $allblogs = Blog::latest()->paginate(3);
        return view('frontend.blog.index',compact('allblogs','categories'));

     } // End Method 
}
