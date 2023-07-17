@props(['comments'])
<div class="pt-2 comment-wrap">

    <!-- END comment-list -->


    <h3 class="my-5 heading">{{$comments->count()}} Comment(s)</h3>
    <ul class="comment-list">
        @foreach ($comments as $comment)
        <x-single-comment :comment="$comment" />
        @endforeach



    </ul>
    {{$comments->links()}}
</div>