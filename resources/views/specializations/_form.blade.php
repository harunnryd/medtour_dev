<div class="row">
	<div class="col-md-12">
		<div class="form_group{{ $errors->has('type') ? ' has-error' : '' }}">
			{!! Form::label('type', 'Type', ['class' => 'col-md-4 control-label']) !!}
			<div class="custom_input_material">
				{!! Form::text('type', null, ['class' => 'form-control input-sm']) !!}

				@if ($errors->has('type'))
				<span class="help-block">
					<strong>{{ $errors->first('type') }}</strong>
				</span>
				@endif
			</div>
		</div>
	</div>
</div>                       
<div class="row">
	<div class="box_btn_custom green_box_custom">
		<div class="btn-save-admin_custom">
			 {!! Form::submit('Save', ['class' => 'btn btn-primary btn-sm']) !!}
			<span>
				<input type="submit" value="Cancel" class="btn btn-primary btn-sm" data-dismiss="modal" aria-hidden="true">
			</span>
			
			
		</div>
		
	</div>
</div>