@props(['message','color'])
<div class=" d-flex justify-content-center">

    <div class="col-lg-5 col-sm-12">
        <div class="alert alert-{{$color}} alert-dismissible fade show" role="alert">
            <strong>{{session("$message")}} </strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    </div>
</div>