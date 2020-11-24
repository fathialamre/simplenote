@include('layouts.header')


<!-- Page Content -->
<div class="container">

    <div class="row">

        <!-- Post Content Column -->
        <div class="col-lg-12">
            <h1 class="mt-4">{{$ad->des}}</h1>

            <p class="lead">
                بواسطة
                <a href="#">{{$ad->company}}</a>
            </p>
            <hr>
            <p class="lead">
                القسم
                <a href="#">{{$ad->department->name}}</a>
            </p>
            <hr>
            <p>نٌشر بتاريخ : {{$ad->created_at}}</p>

            <hr>
            <img class="img-fluid rounded" src="{{$ad->getFirstMediaUrl("ads")}}" alt="">

            <hr>
            <p class="lead">
                {{$ad->des}}
            </p>
            رقم الهاتف
            <i class="fa fa-phone"></i> :
            <span>{{$ad->phone}}</span>
            <hr>

            <div class="card my-4">
                <h5 class="card-header">أكتب تعليق</h5>
                <div class="card-body">
                    {!! Form::open(['method' => 'POST', 'route' => ['comments.store']]) !!}
                    <div class="form-group">
                        <input type="hidden" name="ad_id" value="{{$ad->id}}">
                        <textarea name="body" class="form-control" rows="3"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">نشر</button>
                    {!! Form::close() !!}
                </div>
            </div>

            @foreach($ad->comments as $comment)
                <div class="media mb-4">
                    <img class="d-flex mr-3 rounded-circle" height="50"
                         src="{{$comment->user->getFirstMediaUrl("profile") != '' ? $comment->user->getFirstMediaUrl("profile") : asset('website/img/avatar.png')}} " alt="">



                    <div class="media-body">
                        <span class="mt-0">{{$comment->user->first_name . ' ' . $comment->user->last_name}}</span>
                        | <i class="fa fa-calendar"></i>
                        <span>{{$comment->created_at}}</span>
                        <br/>
                        {{$comment->body}}
                    </div>
                </div>
            @endforeach

        </div>
    </div>


@include('layouts.footer')
