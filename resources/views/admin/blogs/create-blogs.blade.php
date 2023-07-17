@extends('adminlayout')
@section('content')
<div class="container col-sm-12 col-lg-10">
    <div class="row my-4">
        <div class="col-sm-12">
            <h2 class="posts-entry-title text-center">{{$title}} Blog</h2>
        </div>

    </div>
    <div class="card shadow-lg">
        <div class="card-body p-5">
            <form action="/admin/blogs/store" method="POST" enctype="multipart/form-data">
                @csrf

                <x-form.input-wrapper>
                    <x-form.label name="title" />

                    <x-form.input name="title" />

                    <x-form.error name="title" />
                </x-form.input-wrapper>

                <x-form.input-wrapper>
                    <x-form.label name="slug" />

                    <x-form.input name="slug" />

                    <x-form.error name="slug" />
                </x-form.input-wrapper>

                <x-form.input-wrapper>

                    <x-form.label name="intro" />
                    <x-form.input name="intro" />
                    <x-form.error name="intro" />

                </x-form.input-wrapper>

                <x-form.input-wrapper>
                    <x-form.label name="category" />
                    <select name="category_id" class="form-control" id="category_id">
                        @foreach ($categories as $category)
                        <option {{$category->id == old('category') ? 'selected' : ''}}
                            value="{{$category->id}}">{{$category->name}}
                        </option>
                        @endforeach
                    </select>

                    <x-form.error name="category_id" />
                </x-form.input-wrapper>

                <x-form.input-wrapper>
                    <x-form.label name="body" />
                    <x-form.textarea name="body" rows="10" />
                    <x-form.error name="body" />
                </x-form.input-wrapper>

                <x-form.input-wrapper>
                    <x-form.label name="thumbnail" />
                    <x-form.input name="thumbnail" type="file" />

                </x-form.input-wrapper>
                <x-form.error name="thumbnail" />
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>

</div>
@endsection