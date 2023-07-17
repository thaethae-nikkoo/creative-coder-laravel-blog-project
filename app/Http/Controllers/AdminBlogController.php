<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Category;
use Illuminate\Validation\Rule;

class AdminBlogController extends Controller
{
    public function index()
    {
        return view('admin.blogs.index', [
            'blogs' => Blog::latest()->paginate(5),
        ]);
    }

    public function create()
    {
        return view('admin.blogs.create-blogs', [
            'title'=>'Create',
            'route'=>'store',
            'method'=>'POST',
            'categories' => Category::all(),
        ]);

    }

    public function store()
    {
        $blog =  request()->validate([
             'title' => ['required','min:10'],
             'slug' => [Rule::unique('blogs', 'slug'),'required','alpha_dash'],
             'intro' => ['required'],
            'category_id' => ['required', Rule::exists('categories', 'id')],
            'body' => ['required','min:10']
         ]);


        $blog['user_id'] = auth()->id();
        $image_name = request()->file('thumbnail')->getClientOriginalName();

        $blog['thumbnail'] = request()->file('thumbnail')->storeAs('thumbnails', $image_name) ;
        // return $blog['thumbnail'];
        Blog::create($blog);
        return redirect('/')->with('success', 'Blog has been stored.');

    }
    public function edit(Blog $blog)
    {

        return view('admin.blogs.edit-blogs', [
            'title'=>'Edit',
            'categories' => Category::all(),
             'route'=>'update',
             'method'=>'PUT',
            'blog' => Blog::find($blog->id),
        ]);

    }
    public function update(Blog $blog)
    {
        $b =  request()->validate([
                   'title' => ['required','min:10'],
                   'slug' => [Rule::unique('blogs', 'slug')->ignore($blog->id),'required','alpha_dash'],
                   'intro' => ['required'],
                  'category_id' => ['required', Rule::exists('categories', 'id')],
                  'body' => ['required','min:10']
               ]);


        $b['user_id'] = auth()->id();
        if(request()->file('thumbnail')) {
            $image_name = request()->file('thumbnail')->getClientOriginalName();
            $b['thumbnail'] = request()->file('thumbnail')->storeAs('thumbnails', $image_name) ;
        } else {
            $b['thumbnail'] = $blog->thumbnail;
        }
        Blog::find($blog->id)->update($b);

        return redirect('/admin/blogs/dashboard')->with('success', 'Blog has been updated');
    }
    public function destroy(Blog $blog)
    {
        Blog::find($blog->id)->delete();
        return back()->with('success', 'Blog has been successfully deleted.');
    }

}
