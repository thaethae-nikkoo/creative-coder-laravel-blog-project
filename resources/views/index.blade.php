@extends('layout')
@section('content')

<section class="section">
    <div class="container">
        @if (session('success'))
        <x-alert message='success' color='success' />
        @endif
        @if (session('loggedin'))
        <x-alert message='loggedin' color='warning' />
        @endif

        <div class="row mb-4">

            <div class="col-sm-4">
                <div class="sidebar-box search-form-wrap">
                    <form action="#" class="sidebar-search-form">
                        @if (request()->category)
                        <input type="hidden" name="category" value="{{request()->category}}">
                        @endif
                        @if (request()->author)
                        <input type="hidden" name="author" value="{{request()->author}}">
                        @endif

                        <input type="text" name="search" class="form-control" id="s" value="{{request()->search}}"
                            placeholder="Type a keyword and hit enter to search">
                    </form>
                </div>
            </div>

            <div class="col-sm-8 d-flex justify-content-end">
                {{ $blogs->links() }}
                {{-- <nav aria-label="Page navigation">
                    <ul class="pagination justify-content-end">
                        <li class="page-item">
                            <a class="page-link" href="#" aria-label="Previous">
                                <span aria-hidden="true">&laquo;</span>
                            </a>
                        </li>
                        <li class="page-item active"><a class="page-link" href="#">1</a></li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item">
                            <a class="page-link" href="#" aria-label="Next">
                                <span aria-hidden="true">&raquo;</span>
                            </a>
                        </li>
                    </ul>
                </nav> --}}
            </div>
        </div>


        <div class="row">

            <x-blogCard :blogs="$blogs" />

        </div>

    </div>
</section>

<x-footer />
<!-- Preloader -->
<div id="overlayer"></div>
<div class="loader">
    <div class="spinner-border text-primary" role="status">
        <span class="visually-hidden">Loading...</span>
    </div>
</div>

@endsection