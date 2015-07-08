@extends('layouts.master')

@section('content')

    <!-- Page Content -->
    <div class="container">

        <!-- Page Heading/Breadcrumbs -->
        @section('breadcrumbs', Breadcrumbs::render('static', array('name'=>'Blog','link'=>'blog')))
        @include('partials.title_breadcrumb')

        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-8">

                @foreach($posts as $post)
                <!-- First Blog Post -->
                <h2>
                    <a href="{{URL::to('blog/' . $post->id)}}">{{$post->title}}</a>
                </h2>
                <p class="lead">
                    by {{$post->user->name}}
                </p>
                <p><i class="fa fa-clock-o"></i> Posted on {{$post->created_at}}</p>
                <hr>
                <p>{{$post->content}}</p>
                <a class="btn btn-primary" href="{{URL::to('blog/' . $post->id)}}">Read More <i class="fa fa-angle-right"></i></a>

                <hr>

                @endforeach

                {!! $links !!}

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
