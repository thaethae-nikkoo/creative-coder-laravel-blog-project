@props(['blogs'])

@forelse ($blogs as $blog)
<div class="col-lg-4 col-md-6 col-sm-12 mb-4">
    <div class="post-entry-alt">
        <a href="/blogs/{{$blog->slug}}" class="img-link"><img
                src='{{$blog->thumbnail?asset("storage/$blog->thumbnail"):"/images/hero_5.jpg"}}' alt="Image"
                class="img-fluid"></a>
        <div class="excerpt">


            <h2><a href="/blogs/{{$blog->slug}}">{{$blog->title}}</a></h2>
            <div class="post-meta align-items-center text-left clearfix">
                <figure class="author-figure mb-0 me-3 float-start"><img src="/images/person_3.jpg" alt="Image"
                        class="img-fluid"></figure>
                <strong class="d-inline-block mt-1">By <a
                        href="/?author={{$blog->author->username}}{{request()->search?'&search='.request()->search:''}}{{request()->category?'&category='.request()->category:''}}">{{$blog->author->name}}</a></strong>
                <strong>&nbsp;-&nbsp; {{$blog->created_at->diffforHumans()}}</strong> <br>

            </div>

            <p>{!!$blog->intro!!}
            </p>
            <p class="category"><a href='/?category={{$blog->category->slug}}{{request()->search?"&search=".request()->search:""}}{{request()->author?"
                    &author=".request()->author:""}}'>
                    {{$blog->category->name}}</a></p>
            <p><a href="/blogs/{{$blog->slug}}" class="read-more">Continue Reading</a></p>
        </div>
    </div>
</div>
@empty
<p>No blog found.</p>
@endforelse