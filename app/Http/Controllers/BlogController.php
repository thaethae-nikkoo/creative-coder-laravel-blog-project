<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class BlogController extends Controller
{
    public function index()
    {
        return view('index', [
            'blogs' =>Blog::latest()
            ->filter(request(['search','category','author']))
            ->paginate(3)
            ->withQueryString(),
        ]);
    }
    public function show(Blog $blog)
    {
        return view('single', [
            'blog' => $blog,
            'blogs' => Blog::inRandomOrder()->take(3)->get(),

        ]);
    }
   
    public function subscriptionHandler(Blog $blog)
    {
        if(auth()->user()) {
            if(User::find(auth()->user()->id)->isSubscribed($blog)) {
                $blog->unSubscribe();
            } else {
                $blog->subscribe();
            }

        } else {
            return back()->with('error', 'Please login to subscribe this post.');
        }

        return back();
    }

}
