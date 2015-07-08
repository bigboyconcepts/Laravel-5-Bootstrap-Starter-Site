@extends('...layouts.master')

@section('content')

    <!-- Page Content -->
    <div class="container">

        <!-- Page Heading/Breadcrumbs -->
        @section('breadcrumbs', Breadcrumbs::render('static', array('name'=>'Blog','link'=>'blog')))
        @include('...partials.title_breadcrumb')

        <!-- Blog Form-->
        <div class="row">
            <div class="col-lg-12">
                {!! Form::open(array('route' => 'blog.store', 'class' => 'form')) !!}
                <div class="form-group">
                {!! Form::label('Title') !!}
                {!! Form::text('title', null,
                array('required', 'class'=>'form-control',
                'placeholder'=>'Title')) !!}
                </div>
                <div class="form-group">
                {!! Form::label('Description') !!}
                {!! Form::text('description', null,
                array('required', 'class'=>'form-control',
                'placeholder'=>'Description of post')) !!}
                </div>
                <div class="form-group">
                {!! Form::label('Content') !!}
                {!! Form::textarea('content', null,
                array('required', 'class'=>'form-control')) !!}
                </div>
                <div class="form-group">
                {!! Form::submit('Create Post', array('class'=>'btn btn-primary')) !!}
                </div>
                {!! Form::close() !!}
            </div>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container -->
@endsection
