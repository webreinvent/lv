<!--modal-->
{{HtmlHelper::modal(array('title' => "Update Details", 'modal_id'=>"ModalUpdate"))}}

{{ Form::open(array('class' =>'form form-horizontal', 'route' => $data->prefix.'-update',
'id'=>'formUpdate' ,'method' =>'POST', 'data-parsley-validate')) }}
<!--modal body-->
<div class="modal-body">

    <div class="row">

        <div class="col-sm-12">
            <div class="form-group">
                <label class="col-md-3 control-label">Name:</label>
                <div class="col-md-9">
                    {{ Form::text('name', null, array('class' => 'form-control ',
                    'placeholder' => 'Name', 'required')) }}
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-3 col-sm-4 control-label">Choose Status:</label>

                <div class="col-md-9 col-sm-8">
                    <div class="radio">
                        <label>
                            <input type="radio" name="enable" value="1" data-parsley-required>
                            Active
                        </label>
                    </div>
                    <div class="radio">
                        <label>
                            <input type="radio" name="enable" value="0" data-parsley-required >
                            Deactive
                        </label>
                    </div>
                </div>

            </div>

        </div>


    </div>
</div>
<!--/modal body-->
<br clear="all"/>
<div class="modal-footer">

    <button type="submit" id="group_submit"
            class="btn btn-sm btn-success loader"><i class="fa fa-save"></i> Submit
    </button>

</div>
{{Form::hidden('format', 'json')}}
{{Form::hidden('id')}}
{{ Form::close() }}


{{HtmlHelper::modalClose()}}
<!--/modal-->
