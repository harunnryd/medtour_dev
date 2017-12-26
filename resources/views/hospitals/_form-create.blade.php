<div class="row">
	<div class="col-md-12">
		<div class="form_group{{ $errors->has('name') ? ' has-error' : '' }}">
                            {!! Form::label('name', 'Name', ['class' => 'col-md-4 control-label']) !!}
			<div class="custom_input_material">
				{!! Form::text('name', null, ['class' => 'form-control input-sm']) !!}

				@if ($errors->has('name'))
				<span 	class="help-block">
					<strong>{{ $errors->first('name') }}</strong>
				</span>
				@endif
			</div>
		</div>

	</div>
</div>
<div class="row">
	<div class="col-md-4">
		 <div class="form_group{{ $errors->has('beds') ? ' has-error' : '' }} custom_padding">
                            {!! Form::label('beds', 'Beds', ['class' => 'col-md-4 control-label']) !!}
			 <div class="custom_input_material">
				 {!! Form::number('beds', 0, ['class' => 'form-control input-sm']) !!}

				 @if ($errors->has('beds'))
				 <span class="help-block">
					 <strong>{{ $errors->first('beds') }}</strong>
				 </span>
				 @endif
			 </div>
		</div>
	</div>
	<div class="col-md-4">
		  <div class="form_group{{ $errors->has('inpatients') ? ' has-error' : '' }} custom_padding">
			  {!! Form::label('inpatients', 'Inpatients', ['class' => 'col-md-4 control-label']) !!}
			  <div class="custom_input_material">
				  {!! Form::number('inpatients', 0, ['class' => 'form-control input-sm']) !!}

				  @if ($errors->has('inpatients'))
				  <span class="help-block">
					  <strong>{{ 	$errors->first('inpatients') }}</strong>
				  </span>
				  @endif
			  </div>
		</div>
	</div>
	<div class="col-md-4">
		 <div class="form_group{{ $errors->has('outpatients') ? ' has-error' : '' }} custom_padding">
			 {!! Form::label('outpatients', 'Outpatients', ['class' => 'col-md-4 control-label']) !!}
			 <div class="custom_input_material">
				 {!! Form::number('outpatients', 0, ['class' => 'form-control input-sm']) !!}

				 @if ($errors->has('outpatients'))
				 <span class="help-block">
					 <strong>{{ $errors->first('outpatients') }}</strong>
				 </span>
				 @endif
			 </div>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-md-12">
		<div class="form_group{{ $errors->has('contact') ? ' has-error' : '' }}">
			{!! Form::label('contact', 'Contact', ['class' => 'col-md-4 control-label']) !!}
			<div class="custom_input_material">
				{!! Form::text('contact', null, ['class' => 'form-control input-sm']) !!}

				@if ($errors->has('contact'))
				<span class="help-block">
					<strong>{{ $errors->first('contact') }}</strong>
				</span>
				@endif
			</div>
		</div>
	</div>
	<div class="col-md-12">
		 <div class="form_group{{ $errors->has('address') ? ' has-error' : '' }}">
			 {!! Form::label('address', 'Address', ['class' => 'col-md-4 control-label']) !!}
			 <div class="custom_input_material">
				 {!! Form::text('address', null, ['class' => 'form-control input-sm']) !!}

				 @if ($errors->has('address'))
				 <span class="help-block">
					 <strong>{{ $errors->first('address') }}</strong>
				 </span>
				 @endif
			 </div>
		</div>
	</div>
	<div class="col-md-12">
		  <div class="form_group{{ $errors->has('city_id') ? ' has-error' : '' }}">
			  {!! Form::label('city_id', 'City', ['class' => 'col-md-4 control-label']) !!}
			  <div class="custom_input_material">
				  {!! Form::select('city_id', $city->pluck('name', 'id'), null, ['class' => 'form-control input-sm']) !!}
				  @if ($errors->has('city_id'))
				  <span class="help-block">
					  <strong>{{ $errors->first('city_id') }}</strong>
				  </span>

				  @endif


			  </div>
		</div>
	</div>
	<div class="col-md-12">
		<div class="form_group{{ $errors->has('photo') ? ' has-error' : '' }}">
			{!! Form::label('photo', 'Photo', ['class' => 'col-md-4 control-label']) !!}
			<div>
				{!! Form::file('photo', null, ['class' => 'from-control']) !!}

				@if ($errors->has('photo'))
				<span class="help-block">
					<strong>{{ $errors->first('photo') }}</strong>
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



