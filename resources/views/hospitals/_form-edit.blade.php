                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            {!! Form::label('name', 'Name', ['class' => 'col-md-4 control-label']) !!}
                            <div class="col-md-6">
                                {!! Form::hidden('id', $hospital->entity->id) !!}
                                {!! Form::text('name', null, ['class' => 'form-control input-sm']) !!}

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                       <div class="form-group{{ $errors->has('beds') ? ' has-error' : '' }}">
                            {!! Form::label('beds', 'Beds', ['class' => 'col-md-4 control-label']) !!}
                            <div class="col-md-6">
                                {!! Form::number('beds', null, ['class' => 'form-control input-sm']) !!}

                                @if ($errors->has('beds'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('beds') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('inpatients') ? ' has-error' : '' }}">
                            {!! Form::label('inpatients', 'Inpatients', ['class' => 'col-md-4 control-label']) !!}
                            <div class="col-md-6">
                                {!! Form::number('inpatients', null, ['class' => 'form-control input-sm']) !!}

                                @if ($errors->has('inpatients'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('inpatients') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('outpatients') ? ' has-error' : '' }}">
                            {!! Form::label('outpatients', 'Outpatients', ['class' => 'col-md-4 control-label']) !!}
                            <div class="col-md-6">
                                {!! Form::number('outpatients', null, ['class' => 'form-control input-sm']) !!}

                                @if ($errors->has('outpatients'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('outpatients') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('contact') ? ' has-error' : '' }}">
                            {!! Form::label('contact', 'Contact', ['class' => 'col-md-4 control-label']) !!}
                            <div class="col-md-6">
                                {!! Form::text('contact', $hospital->entity->contact, ['class' => 'form-control input-sm']) !!}

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
                                {!! Form::text('address', $hospital->entity->address, ['class' => 'form-control input-sm']) !!}

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
                                {!! Form::select('city_id', $city->pluck('name', 'id'), $hospital->entity->city->id, ['class' => 'form-control input-sm']) !!}

                                @if ($errors->has('city_id'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('city_id') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('photo') ? ' has-error' : '' }}">
                            {!! Form::label('photo', 'Photo', ['class' => 'col-md-4 control-label']) !!}
                            <div class="col-md-6">
                                {!! Form::file('photo', null, ['class' => 'from-control']) !!}

                                @if ($errors->has('photo'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('photo') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                                {!! Form::submit('Save', ['class' => 'btn btn-primary btn-sm']) !!}
                            </div>
                        </div>