@extends('layouts.master')

@section('content')

    <!-- Page Content -->
    <div class="container">

        <!-- Page Heading/Breadcrumbs -->
        @section('breadcrumbs', Breadcrumbs::render('static', array('name'=>'Blog','link'=>'blog')))
        @include('partials.title_breadcrumb')

        <div class="row">

             <!-- Blog Post Content Column -->
            <div class="col-lg-8">

                <!-- Blog Post -->

                <hr>

                <!-- Date/Time -->
                <p><i class="fa fa-clock-o"></i> Posted by {{$post->user->name}} on August 24, 2013 at 9:00 PM</p>

                <hr>

                {{$post->content}}

                <hr>

                <!-- Blog Comments -->

                <!-- Comments Form -->
                <div class="well">
                    <h4>Leave a Comment:</h4>
                    {!! Form::open(array('route' => array('blog.comment.store', $post->id), 'class' => 'form')) !!}

                    @if (count($errors) > 0)
                        <div class="alert alert-danger">
                            There were some problems with your input.<br />
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <div class="form-group">
                        {!! Form::label('Comment') !!}
                        {!! Form::text('content', null, array('class'=>'form-control', 'placeholder'=>'Comment here...')) !!}
                    </div>
                </div>

                <hr>

                <!-- Posted Comments -->
                @foreach($post->comments as $comment)
                <!-- Comment -->
                <div class="media">
                    <div class="media-body">
                        <h4 class="media-heading">{{$comment->user->name}}
                            <small>{{$comment->created_at}}</small>
                        </h4>
                        {{$comment->content}}
                    </div>
                </div>
                @endforeach

            </div>

            <!-- Blog Sidebar Widgets Column -->
            <div class="col-md-4">

                <!-- Side Widget Well -->
                <div class="well">
                    <h4>Side Widget Well</h4>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Inventore, perspiciatis adipisci accusamus laudantium odit aliquam repellat tempore quos aspernatur vero.</p>
                </div>

            </div>

        </div>
        <!-- /.row -->
    </div>
    <!-- /.container -->
@endsection
