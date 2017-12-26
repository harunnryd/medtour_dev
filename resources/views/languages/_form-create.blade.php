                        <div class="form_group{{ $errors->has('spoken') ? ' has-error' : '' }}" style="    width: 400px;">
                            {!! Form::label('spoken', 'Spoken', ['class' => 'col-md-4 control-label']) !!}
                            <div class="custom_input_material">
                                {!! Form::text('spoken', null, ['class' => 'form-control input-sm']) !!}

                                @if ($errors->has('spoken'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('spoken') }}</strong>
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