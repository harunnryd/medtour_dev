                        <div class="form_group{{ $errors->has('province_id') ? ' has-error' : '' }}" style="    width: 400px;">
                            {!! Form::label('province_id', 'Province', ['class' => 'col-md-4 control-label']) !!}
                            <div class="custom_input_material">
                                {!! Form::select('province_id', $province->pluck('name', 'id'), null, ['class' => 'form-control input-sm']) !!}

                                @if ($errors->has('province_id'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('province_id') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form_group{{ $errors->has('name') ? ' has-error' : '' }}" style="width:400px;">
                            {!! Form::label('name', 'Name', ['class' => 'col-md-4 control-label']) !!}
                            <div class="custom_input_material">
                                {!! Form::text('name', null, ['class' => 'form-control input-sm']) !!}

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                      <div class="row">
	<div class="box_btn_custom">
		<div class="btn-save-admin_custom" style="margin-top: 0px;
    text-align: left;">
			 {!! Form::submit('Save', ['class' => 'btn btn-primary btn-sm']) !!}
			
		</div>
		
	</div>
</div>