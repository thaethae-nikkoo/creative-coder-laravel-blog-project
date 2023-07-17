@props(['current_category','category'])
<a href="#">{{ $current_category? ucwords($current_category):'All'}} </a>
<ul class="dropdown">
    <li><a href="/">All</a></li>
    @foreach ($categories as $category)

    <li>
        <a
            href='/?category={{$category->slug}}{{request()->search?"&search=".request()->search:""}}{{request()->author?"&author=".request()->author:""}}'>{{$category->name}}
        </a>
    </li>
    @endforeach

</ul>