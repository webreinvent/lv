@extends('core::layout.coremaster')


@section('page_specific')
@stop



@section('core_header')
    <!--header-->
    <div class="container-fluid header-title">

        <div class="row">

            <div class="col-md-4 col-sm-4 col-ss-12 col-md-offset-0">
                <div class="title">{{$title}}</div>
            </div>

            <div class="col-md-6 col-sm-8 col-xs-12 pull-right">
                Right


            </div>
        </div>
    </div>
    <!--/header-->
@stop


@section('core_content')

    <br clear="all" />

    <!--content-->
    <div class="container">
        <h1>Content</h1>

    </div>

    <!--/content-->




@stop