<div class="form-group{{ $errors->has('treatment_id') ? ' has-error' : '' }}">
    {!! Form::label('treatment_id', 'Treatment', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        <div class="input-search">
            {!! Form::hidden('entity_id', $doctor->entity->id) !!}
            {!! Form::select('treatment_id', $treatments->pluck('name', 'id'), null, ['class' => ' ', 'placeholder' => 'Select Treatment']) !!}
        </div>
        @if ($errors->has('treatment_id'))
        <span class="help-block">
            <strong>{{ $errors->first('treatment_id') }}</strong>
        </span>
        @endif
    </div>
</div>

<div class="form-group{{ $errors->has('price') ? ' has-error' : '' }}">
    {!! Form::label('price', 'Price', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::number('price', null, ['class' => 'form-control input-sm', 'placeholder' => 'e.g: 1000']) !!}

        @if ($errors->has('price'))
        <span class="help-block">
            <strong>{{ $errors->first('price') }}</strong>
        </span>
        @endif
    </div>
</div>

<div class="form-group{{ $errors->has('desc') ? ' has-error' : '' }}">
    {!! Form::label('desc', 'Description', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::textArea('desc', null, ['class' => 'form-control input-sm', 'placeholder' => '...']) !!}

        @if ($errors->has('desc'))
        <span class="help-block">
            <strong>{{ $errors->first('desc') }}</strong>
        </span>
        @endif
    </div>
</div>

<div class="form-group">
    <div class="col-md-8 col-md-offset-4">
        {!! Form::submit('Save', ['class' => 'btn btn-primary btn-sm']) !!}
    </div>
</div>
