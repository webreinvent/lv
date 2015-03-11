@extends('core::layout.coremaster')


@section('page_specific')
	{{HTML::style('assets/core/bootstrap-switch.min.css')}}
	{{HTML::script('assets/core/bootstrap-switch.min.js')}}
@stop



@section('core_header')
<!--header-->
<div class="container-fluid header-title">

	<div class="row">

		<div class="col-md-4 col-sm-4 col-ss-12 col-md-offset-0">
			<div class="title">{{$title}}</div>
		</div>



		<div class="col-md-6 col-sm-8 col-xs-12 pull-right">
			<div class="header-btn">

				{{ Form::open(array('method' => 'GET')) }}

					@include('core::layout.inc.daterange')

					<div class="input-group">

						<input type="text" class="form-control search_query" value="{{Input::get('q')}}" name="q">
						<div class="input-group-btn">
							<button id="search_query" type="submit" class="btn btn-sm btn-success"><i class="fa fa-search"></i></button>



							<button data-target="#myModal" data-toggle="modal" type="button" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i> Add</button>

						</div>
					</div>

					{{Form::hidden('start', null, array('class' => "start") )}}
					{{Form::hidden('end', null, array('class' => "end"))}}

					{{ Form::close() }}

				</div>

			<div class="modal fade"  id="myModal">
				{{ Form::open(array('route' => 'postPermission', 'class' =>'form', 'method' =>'POST')) }}

				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
							<h4 class="modal-title">Permission Details</h4>
						</div>
						<div class="modal-body">

							<div class="form-group">
								{{ Form::text('name', null, array('class' => 'form-control', 'placeholder' => 'Permission Name', 'required')) }}
							</div>
							

						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
							<button type="submit" class="btn btn-primary">Save</button>
						</div>
					</div><!-- /.modal-content -->
				</div><!-- /.modal-dialog -->

				{{ Form::close(); }}
			</div>
			<!-- /.modal -->

			</div>
		</div>
</div>
<!--/header-->
@stop


@section('core_content')

<br clear="all" />

<!--content-->
<div class="container">
	<table class="table table-striped table-hover table-bordered ">
		<thead>
			<tr>
				<th width="30">#</th>
				<th>Name</th>
				<th>Slug</th>
				<th style="width:100px;">Actions</th>
				<th style="width:50px;">Status</th>
				<th width="100">Updated</th>
				<th width="100">Created</th>
			</tr>
		</thead>
		<tbody>
			<?php $items = $data['list']; ?>
			@foreach ($items as $item)

			<tr>
				<td>{{$item->id}}</td>
				<td><a href="#" data-pk="{{$item->id}}" data-name="permissions|name" class="editable">{{$item->name}}</a></td>
				<td>{{$item->slug}}</td>
				<td>
					<a class="btn btn-danger btn-xs ajax_delete" data-toggle="tooltip" title="Delete" href="#" alt="Permission|{{$item->id}}" ><i class="fa fa-times"></i></a>
				</td>
				<td>


					@if ($item->active == 1)
					<input  class="switch-status" alt="permissions|{{$item->id}}" type="checkbox" checked>
					@else
					<input class="switch-status" alt="permissions|{{$item->id}}" type="checkbox">
					@endif


				</td>
				<td>{{Dates::showTimeAgo($item->updated_at)}}</td>
				<td>{{Dates::showTimeAgo($item->created_at)}}</td>
			</tr>

			@endforeach




		</tbody>

	</table>

	@include('core::layout.inc.pagination')

</div>
{{ View::make('core::layout.common')->with('block_name', 'ajax_toggle_status'); }}
{{ View::make('core::layout.common')->with('block_name', 'ajax_update_col'); }}
{{ View::make('core::layout.common')->with('block_name', 'ajax_delete'); }}
<!--/content-->


@stop