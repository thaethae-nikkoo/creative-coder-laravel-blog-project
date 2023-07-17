@props(['categories'])
{{-- <div class="site-mobile-menu site-navbar-target">
    <div class="site-mobile-menu-header">
        <div class="site-mobile-menu-close">
            <span class="icofont-close js-menu-toggle"></span>
        </div>
    </div>
    <div class="site-mobile-menu-body"></div>
</div> --}}
<nav class="site-nav">
    <div class="container">
        <div class="menu-bg-wrap">
            <div class="site-navigation">
                <div class="row g-0 align-items-center">
                    <div class="col-2">
                        <a href="/" class="logo m-0 float-start">Blogy<span class="text-primary">.</span></a>
                    </div>
                    <div class="col-8 text-center">
                        <form action="#" class="search-form d-inline-block d-lg-none">
                            <input type="text" class="form-control" placeholder="Search...">
                            <span class="bi-search"></span>
                        </form>

                        <ul class="js-clone-nav d-none d-lg-inline-block text-start site-menu mx-auto">
                            <li class="active"><a href="/">Home </a></li>

                            <li class="has-children">
                                <x-category-dropdown />
                            </li>


                            {{-- <li>
                                <a href="#" data-bs-toggle="modal" data-bs-target="#subscribe">Subscribe</a>
                            </li> --}}

                            <li>
                                <a href="/register">Register</a>
                            </li>

                            <li>
                                <a href="/login">Login</a>
                            </li>

                            @auth
                            <li class="has-children">
                                <a href="#"> <img src="{{auth()->user()->avatar}}" width="30" class="rounded-circle"
                                        height="30"> &nbsp;&nbsp; {{auth()->user()->name}}</a>
                                <ul class="dropdown">
                                    @can('admin')
                                    <li><a href="/admin/blogs/dashboard">Dashboard</a></li>
                                    @endcan
                                    <li><a href="/logout">Logout</a></li>

                                </ul>
                            </li>
                            @endauth

                        </ul>
                    </div>
                    {{-- <div class="col-2 text-end">
                        <a href="#"
                            class="burger ms-auto float-end site-menu-toggle js-menu-toggle d-inline-block d-lg-none light">
                            <span></span>
                        </a>
                        <form action="#" class="search-form d-none d-lg-inline-block">
                            <input type="text" class="form-control" placeholder="Search...">
                            <span class="bi-search"></span>
                        </form>
                    </div> --}}
                </div>
            </div>
        </div>
    </div>
</nav>


