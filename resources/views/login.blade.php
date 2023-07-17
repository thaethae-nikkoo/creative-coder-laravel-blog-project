@extends('layout')
@section('content')
<div class="container col-sm-12 col-lg-7">
    <div class="row my-4">
        <div class="col-sm-12">
            <h2 class="posts-entry-title text-center">Login</h2>
        </div>

    </div>
    <div class="card shadow-lg">
        @if (session('error'))
        <div class=" d-flex justify-content-center">

            <div class="col-lg-9 mt-3 col-sm-12">
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Try Again,</strong> {{session('error')}}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            </div>
        </div>
        @endif

        <div class="card-body p-5">
            <form action="/login" method="POST">
                @csrf
                <x-form.input-wrapper>
                    <x-form.label name="email" />
                    <x-form.input name="email" type="email" />
                    <x-form.error name="email" />
                </x-form.input-wrapper>

                <x-form.input-wrapper>
                    <x-form.label name="password" />
                    <x-form.password-input name="password" />
                    <x-form.error name="password" />
                </x-form.input-wrapper>

                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>

</div>
@endsection