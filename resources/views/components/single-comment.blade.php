<li class="comment">
    <div class="vcard">
        <img src="{{$comment->author->avatar}}" alt="Image placeholder">
    </div>
    <div class="comment-body">
        <h3>{{$comment->author->name}}</h3>
        <div class="meta">{{$comment->created_at->diffForHumans()}}</div>
        <p>{{$comment->body}}</p>
        <p><a href="#" class="reply rounded">Reply</a></p>
    </div>
</li>