@props(['blog'])
<form action="/blogs/{{$blog->slug}}/comments" method="post" {{$attributes->merge(['class'=>'p-5 text-primary'])}}>
    @csrf
    <div class="form-group bg-light">
        <label for="message">
            Message
        </label>
        <textarea name="body" id="message" cols="30" rows="5" class="form-control p-3"
            required>{{old('body')}}</textarea>
        @error('body')
        <small class="text-danger">{{ $message }}</small>
        @enderror
    </div>
    <div class="form-group">
        <input type="submit" value="Post Comment" class="btn btn-primary">
    </div>

</form>