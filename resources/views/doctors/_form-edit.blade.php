                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            {!! Form::label('name', 'Name', ['class' => 'col-md-4 control-label']) !!}
                            <div class="col-md-6">
                                {!! Form::hidden('id', !is_null($doctor->entity_id) ? $doctor->entity_id : null) !!}
                                {!! Form::text('name', !is_null($doctor->name) ? $doctor->name : null, ['class' => 'form-control input-sm']) !!}

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('gender') ? ' has-error' : '' }}">
                            {!! Form::label('gender', 'Gender', ['class' => 'col-md-4 control-label']) !!}
                            <div class="col-md-6">
                                {!! Form::radio('gender', 'L', null) !!} Laki Laki
                                {!! Form::radio('gender', 'P', null) !!} Perempuan

                                @if ($errors->has('gender'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('gender') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('experience') ? ' has-error' : '' }}">
                            {!! Form::label('experience', 'Experience', ['class' => 'col-md-4 control-label']) !!}
                            <div class="col-md-6">
                                {!! Form::text('experience', !is_null($doctor->experience) ? $doctor->experience->format('d/m/Y') : null, ['class' => 'form-control input-sm date', 'id' => 'datepicker', 'style' => 'height: 20%']) !!}

                                @if ($errors->has('experience'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('experience') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('contact') ? ' has-error' : '' }}">
                            {!! Form::label('contact', 'Contact', ['class' => 'col-md-4 control-label']) !!}
                            <div class="col-md-6">
                                {!! Form::text('contact', !is_null($doctor->entity_id) ? $doctor->entity->contact : null, ['class' => 'form-control input-sm']) !!}

                                @if ($errors->has('contact'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('contact') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
                            {!! Form::label('address', 'Address', ['class' => 'col-md-4 control-label']) !!}
                            <div class="col-md-6">
                                {!! Form::text('address', !is_null($doctor->entity_id) ? $doctor->entity->address : null, ['class' => 'form-control input-sm']) !!}

                                @if ($errors->has('address'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('address') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('city_id') ? ' has-error' : '' }}">
                            {!! Form::label('city_id', 'City', ['class' => 'col-md-4 control-label']) !!}
                            <div class="col-md-6">
                                {!! Form::select('city_id', $city->pluck('name', 'id'), !is_null($doctor->entity_id) ? $doctor->entity->city_id : null, ['class' => 'form-control input-sm', 'placeholder' => 'Select City']) !!}

                                @if ($errors->has('city_id'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('city_id') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('specializations') ? ' has-error' : '' }}">
                            {!! Form::label('specializations', 'Specializations', ['class' => 'col-md-4 control-label']) !!}
                            <div class="col-md-6">
                                {!! Form::select('specializations[]', $specializations->pluck('type', 'id'), is_null($doctor->specializations) ? $doctor->specializations->pluck('type', 'id') : null, ['class' => 'form-control input-sm', 'multiple', 'id' => 'matching-star-specialization']) !!}

                                @if ($errors->has('specializations'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('specializations') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('languages') ? ' has-error' : '' }}">
                            {!! Form::label('languages', 'Languages', ['class' => 'col-md-4 control-label']) !!}
                            <div class="col-md-6">
                                {!! Form::select('languages[]', $languages->pluck('spoken', 'id'), is_null($doctor->languages) ? $doctor->languages->pluck('name', 'id') : null, ['class' => 'form-control input-sm', 'multiple', 'id' => 'matching-star-language']) !!}

                                @if ($errors->has('languages'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('languages') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('photo') ? ' has-error' : '' }}">
                            {!! Form::label('photo', 'Photo', ['class' => 'col-md-4 control-label']) !!}
                            <div class="col-md-6">
                                {!! Form::file('photo', null, ['class' => 'from-control input-sm']) !!}

                                @if ($errors->has('photo'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('photo') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                                {!! Form::submit('Update', ['class' => 'btn btn-primary']) !!}
                            </div>
                        </div>

                        @if($errors->any())
                            @foreach($errors->all() as $item)
                                {{ $item }}
                            @endforeach
                        @endif