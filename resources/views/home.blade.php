@extends('layouts.master')

@section('content')
<!-- Page Content -->
<div class="container">

    <!-- Page Heading/Breadcrumbs -->
    @section('breadcrumbs', Breadcrumbs::render('static', array('name'=>'About','link'=>'about')))
    @include('partials.title_breadcrumb')

    <!-- Intro Content -->
    <div class="row">

        <div class="panel-body">
            You are logged in!
        </div>
    </div>
    <!-- /.row -->
</div>
@endsection
