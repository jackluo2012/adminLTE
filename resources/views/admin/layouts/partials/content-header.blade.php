@if(trans('admin/route_title.'.Route::currentRouteName().'.title') != 'admin/route_title.'.Route::currentRouteName().'.title')
<section class="content-header">
    <h1>
        @if(trans('admin/route_title.'.Route::currentRouteName().'.title') != 'admin/route_title.'.Route::currentRouteName().'.title'){{ trans('admin/route_title.'.Route::currentRouteName().'.title') }}@endif
        @if(trans('admin/route_title.'.Route::currentRouteName().'.desc') != 'admin/route_title.'.Route::currentRouteName().'.desc')<small>{{ trans('admin/route_title.'.Route::currentRouteName().'.desc') }}</small>@endif
    </h1>
    {{--<ol class="breadcrumb">--}}
        {{--<li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li>--}}
        {{--<li class="active">Here</li>--}}
    {{--</ol>--}}
</section>
@endif