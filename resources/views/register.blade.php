@extends('layout')
@section('content')
<div class="container col-sm-12 col-lg-7">
    <div class="row my-4">
        <div class="col-sm-12">
            <h2 class="posts-entry-title text-center">Register</h2>
        </div>

    </div>
    <div class="card shadow-lg">
        <div class="card-body p-5">
            <form action="/register" method="POST">
                @csrf
                <x-form.input-wrapper>
                    <x-form.label name="name" />

                    <x-form.input name="name" />
                    <x-form.error name="name" />
                </x-form.input-wrapper>

                <x-form.input-wrapper>
                    <x-form.label name="username" />
                    <x-form.input name="username" />
                    <x-form.error name="username" />
                </x-form.input-wrapper>

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

                <x-form.input-wrapper>
                    <x-form.label name="confirm_password" />
                    <x-form.password-input name="confirm_password" />
                    <x-form.error name="confirm_password" />
                </x-form.input-wrapper>

                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>

</div>
@endsection