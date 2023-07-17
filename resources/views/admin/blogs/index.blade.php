@extends('adminlayout')
@section('content')
<div class="container col-sm-12 col-lg-12">
    <div class="row my-4">
        <div class="col-sm-12">
            <h2 class="posts-entry-title text-center">Blogs</h2>
        </div>

    </div>

    @if (session('success'))
    <x-alert message='success' color='success' />
    @endif

    <div class="card shadow-lg">
        <table class="table p-2">
            <thead>
                <tr>
                    <th scope="col">Title</th>
                    <th scope="col">Intro</th>
                    <th scope="col">Category</th>
                    <th scope="col">Thumbnail</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($blogs as $blog)
                <tr>
                    <th>{{$blog->title}}</th>
                    <th>{{$blog->intro}}</th>
                    <th>{{$blog->category->name}}</th>
                    <th><img src='{{asset("/storage/$blog->thumbnail")}}' width="200px" height="100px" alt="Thumbnail">
                    </th>
                    <th><a href="/admin/blogs/{{$blog->id}}/edit" type="button" class="btn-warning mx-2 shadow-none"
                            style="padding:10px; border:none; border-radius:5px; font-size:13px;">Edit</a>
                        <button type="button" data-bs-toggle="modal" data-bs-target="#destroy{{$blog->id}}"
                            class="mx-2 btn-danger shadow-none"
                            style="padding:10px; border:none; border-radius:5px; font-size:13px;">Delete</button>
                    </th>

                </tr>

                <!-- Modal -->
                <div class="modal fade" id="destroy{{$blog->id}}" tabindex="-1" aria-labelledby="subscribeLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="subscribeLabel">Are you sure want to delete?</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form action="/admin/blogs/{{$blog->id}}/destroy" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-primary">CONFIRM</button>
                                </form>
                            </div>
                            {{-- <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary">Save changes</button>
                            </div> --}}
                        </div>
                    </div>
                </div>
                @endforeach

            </tbody>
        </table>

        {{$blogs->links()}}
    </div>

</div>

@endsection
