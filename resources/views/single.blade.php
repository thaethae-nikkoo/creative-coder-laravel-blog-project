@extends('layout')
@section('content')

<div class="site-cover site-cover-sm same-height overlay single-page"
    style="background-image: url('/images/hero_5.jpg');">
    <div class="container">
        @if (session('error'))
        <div class=" d-flex justify-content-center">

            <div class="col-lg-5 col-sm-12">
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>{{session('error')}} </strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            </div>
        </div>
        @endif
        <div class="row same-height justify-content-center">
            <div class="col-md-6">
                <div class="post-entry text-center">
                    <h1 class="mb-4">{{$blog->title}}</h1>
                    <div class="post-meta align-items-center text-center">
                        <figure class="author-figure mb-0 me-3 d-inline-block"><img src="/images/person_1.jpg"
                                alt="Image" class="img-fluid"></figure>
                        <span class="d-inline-block mt-1">By {{$blog->author->name}}</span>
                        <span>&nbsp;-&nbsp; {{$blog->created_at->format('d-m-Y') }}</span>
                    </div>
                    <div>
                        <form action="/blogs/{{$blog->slug}}/subscription" method="POST">
                            @csrf
                            @if ( !auth()->user() || auth()->user()->isSubscribed($blog))

                            <button class="btn btn-sm btn-danger">Unsubscribe</button>
                            @else

                            <button class="btn btn-sm btn-primary">Subscribe</button>
                            @endif
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<section class="section">
    <div class="container">

        <div class="row blog-entries element-animate">

            <div class="col-md-12  main-content">

                <div class="post-content-body">
                    {!!$blog->body!!}
                </div>


                <div class="pt-5">
                    <p>Category: <a href='/?category={{$blog->category->slug}}' {{request()->search?
                            "&search=".request()->search:" "}}{{request()->author?'
                            &author='.request()->author:''}}>{{$blog->category->name}}</a> /
                        Author: <a
                            href="/?author={{$blog->author->username}}{{request()->search?'&search='.request()->search:''}}{{request()->category?'&category='.request()->category:''}}">{{$blog->author->name}}
                            </>


                    </p>
                </div>

                <div class="row my-5">
                    <div class="col-sm-12">
                        <h2 class="posts-entry-title text-center">Blogs You May Like</h2>
                    </div>

                </div>

                <div class="row">

                    <x-blogCard :blogs="$blogs" />
                </div>

                @auth
                <div class="comment-form-wrap pt-2 my-4">
                    <div class="row">
                        <div class="col-sm-12">
                            <h2 class="posts-entry-title text-center">Leave a comment </h2>
                        </div>

                    </div>
                    <x-comment-form :blog="$blog" class="bg-light shadow-lg" />
                </div>
                @else
                <h5 class="posts-entry-title text-center"><a href="/login"
                        class="text-primary text-decoration-underline ">Login</a>
                    to participate this
                    discussion.</h5>
                @endauth


                @if ($blog->comments->count())
                <x-comments :comments="$blog->comments()->latest()->paginate(3)" />
                @endif
            </div>

            <!-- END main-content -->



        </div>
    </div>
</section>
{{--

<!-- Start posts-entry -->
<section class="section posts-entry posts-entry-sm bg-light">
    <div class="container">
        <div class="row mb-4">
            <div class="col-12 text-uppercase text-black">More Blog Posts</div>
        </div>
        <div class="row">
            <div class="col-md-6 col-lg-3">
                <div class="blog-entry">
                    <a href="single.html" class="img-link">
                        <img src="images/img_1_horizontal.jpg" alt="Image" class="img-fluid">
                    </a>
                    <span class="date">Apr. 14th, 2022</span>
                    <h2><a href="single.html">Thought you loved Python? Wait until you meet Rust</a></h2>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                    <p><a href="#" class="read-more">Continue Reading</a></p>
                </div>
            </div>
            <div class="col-md-6 col-lg-3">
                <div class="blog-entry">
                    <a href="single.html" class="img-link">
                        <img src="images/img_2_horizontal.jpg" alt="Image" class="img-fluid">
                    </a>
                    <span class="date">Apr. 14th, 2022</span>
                    <h2><a href="single.html">Startup vs corporate: What job suits you best?</a></h2>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                    <p><a href="#" class="read-more">Continue Reading</a></p>
                </div>
            </div>
            <div class="col-md-6 col-lg-3">
                <div class="blog-entry">
                    <a href="single.html" class="img-link">
                        <img src="images/img_3_horizontal.jpg" alt="Image" class="img-fluid">
                    </a>
                    <span class="date">Apr. 14th, 2022</span>
                    <h2><a href="single.html">UK sees highest inflation in 30 years</a></h2>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                    <p><a href="#" class="read-more">Continue Reading</a></p>
                </div>
            </div>
            <div class="col-md-6 col-lg-3">
                <div class="blog-entry">
                    <a href="single.html" class="img-link">
                        <img src="images/img_4_horizontal.jpg" alt="Image" class="img-fluid">
                    </a>
                    <span class="date">Apr. 14th, 2022</span>
                    <h2><a href="single.html">Don’t assume your user data in the cloud is safe</a></h2>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                    <p><a href="#" class="read-more">Continue Reading</a></p>
                </div>
            </div>
        </div>
    </div>
</section> --}}
<!-- End posts-entry -->
<x-footer />
@endsection