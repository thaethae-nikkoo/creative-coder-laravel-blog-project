@props(['name','rows','value'=>''])
<textarea name="{{$name}}" id="{{$name}}" cols="30" rows="{{$rows}}" class="form-control editor p-3"
    required>{{old($name,$value)}}</textarea>