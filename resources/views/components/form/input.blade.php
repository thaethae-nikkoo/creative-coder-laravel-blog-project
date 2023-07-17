@props(['name','type'=>'text','value'=>''])
<input type="{{$type}}" class="form-control" name="{{$name}}" value="{{old($name,$value)}}" id="{{$name}}" />