@if (!empty($title) && !isset($showBreadcrumbs))
<div class="row">
    <div class="col-lg-12">
        @if (!empty($title))
        <h1 class="page-header">
            {{$title}}
            @if (!empty($subTitle))
            <small>{{$subTitle}}</small>
            @endif
        </h1>
        @endif
        @yield('breadcrumbs')
    </div>
</div>
@endif