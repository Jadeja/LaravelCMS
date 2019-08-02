@extends("layouts.blog-post")



@section("content")

	 <h1> Post </h1>

    <!-- Title -->
    <h1>{{ $post->title}}</h1>

    <!-- Author -->
    <p class="lead">
        by <a href="#">{{ $post->user->name }}</a>
    </p>

    <hr>

    <!-- Date/Time -->
    <p><span class="glyphicon glyphicon-time"></span> Posted on {{ $post->created_at->diffForHumans() }}</p>

    <hr>

    <!-- Preview Image -->
    <img class="img-responsive" src="{{ $post->photo ? $post->photo->file : 'http://placehold.it/900x300' }}" alt="">

    <hr>

    <!-- Post Content -->
    <p class="lead">
        {{ $post->body }}
    </p>

    <hr>


    @if(Session::has('commented'))

        {{session('commented')}}

    @endif
    <!-- Blog Comments -->


    @if(Auth::check())
    <!-- Comments Form -->
    <div class="well">
        <h4>Leave a Comment:</h4>

        {!! Form::open(['method' => 'POST','action' => 'PostCommentsController@store'])!!}
            
            <input type="hidden" value="{{ $post->id}}" name="post_id">
            <div class="form-group">
                {!! Form::label('body','Body:') !!}
                {!! Form::textarea('body',null,['class' => 'form-control','rows' => '3']) !!}
            </div>

            <div class="form-group">
                {!! Form::submit('Comment',['class' => 'btn btn-primary']) !!}
            </div>

        {!! Form::close() !!}

    </div>
    <hr>

    @endif

    <!-- Posted Comments -->
@if(count($comments) > 0)

    @foreach($comments as $comment)
    <!-- Comment -->
    <div class="media">
        <a class="pull-left" href="#">
            <img height="64" class="media-object" src="{{ Auth::user()->gravatar}}" alt="">
        </a>
        <div class="media-body">
            <h4 class="media-heading">{{ $comment->author}}
                <small>{{$comment->created_at->diffForHumans()}}</small>
            </h4>
            <p>{{$comment->body}}</p>





        <!-- Nested Comment -->

            @if(count($comment->replies) > 0)

                @foreach($comment->replies as $cr)
                    
                    @if($cr->isActive == 1) 
                    <div class="nested-comment media">
                            <a class="pull-left" href="#">
                        <img height="50" class="media-object" src="{{$cr->photo? $cr->photo : 'http://placehold.it/64x64' }}" alt="">
                            </a>
                            <div class="media-body">
                                <h4 class="media-heading">{{$cr->author}}
                                    <small>{{$cr->created_at->diffForHumans()}}</small>
                                </h4>
                                <p>{{ $cr->body }}</p>
                            </div>

                        <div class="comment-reply-container">    
                            <button class="toggle-reply btn btn-primary pull-right"> Reply </button>

                            <div class="comment-reply col -sm-6">
                                {!! Form::open(['method' => 'POST','action' => 'PostCommentRepliesController@store'])!!}
                                    
                                    <input type="hidden" value="{{ $comment->id }}" name="comment_id">
                                    <div class="form-group">
                                        {!! Form::label('body','Reply:') !!}
                                        {!! Form::textarea('body',null,['class' => 'form-control','rows' => '1']) !!}
                                    </div>

                                    <div class="form-group">
                                        {!! Form::submit('Submit',['class' => 'btn btn-primary']) !!}
                                    </div>

                                {!! Form::close() !!}
                            </div>

                        </div>
                    </div>
                    @endif    
                @endforeach

            @endif

        <!-- End Nested Comment -->





        </div>
    </div>
    @endforeach
@endif

@section('scripts')
    <script type="text/javascript">
        $(".comment-reply-container button.toggle-reply").click(function(){
            $(this).next().slideToggle("slow");
        });
    </script>
@stop

            
@stop