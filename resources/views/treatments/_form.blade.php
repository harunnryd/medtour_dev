                        {{-- <div class="form-group{{ $errors->has('specialization_id') ? ' has-error' : '' }}">
                           {!! Form::label('specialization_id', 'Specialization', ['class' => 'col-md-4 control-label']) !!}
                           <div class="col-md-6">
                               {!! Form::select('specialization_id', $specializations->pluck('type', 'id'), null, ['class' => 'form-control input-sm']) !!}

                               @if ($errors->has('specialization_id'))
                                   <span class="help-block">
                                       <strong>{{ $errors->first('specialization_id') }}</strong>
                                   </span>
                               @endif
                           </div>
                        </div> --}}

                         <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            {!! Form::label('name', 'Name', ['class' => 'col-md-4 control-label']) !!}
                            <div class="col-md-6">
                                {!! Form::text('name', null, ['class' => 'form-control input-sm']) !!}

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        @if($errors->any())
                            @foreach($errors->all() as $item)
                                {{ $item }}
                            @endforeach
                        @endif

                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                                {!! Form::submit('Save', ['class' => 'btn btn-primary btn-sm']) !!}
                            </div>
                        </div>
