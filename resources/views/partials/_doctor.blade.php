
                    <a class="btn-add-admin-custom" onClick="openModal('#modal-create')" href="#">Add New Doctor</a>
                    <table class="table table-responsive">
                    <thead>
                        <th>Name</th>
                        <th>Gender</th>
                        <th>Specialization</th>
                        <th>Experience</th>
                        <th>Doctor</th>
                        <th>Action</th>
                    </thead>
                        @foreach($doctors->load()->all() as $doctor)
                        <tr>
                            <td>{{ $doctor['name'] }}</td>
                            <td style="text-align:center;">{{ $doctor['gender'] }}</td>
                            <td style="width:500px;">
                                @foreach($doctor['specializations']->all() as $specialization)
                                    {{ $specialization['type'] }} ,
                                @endforeach
                            </td>
                            <td>{{ $doctor['experience'] }}</td>
                            <td>
                                @if(is_null($doctor['entity_id']))
                                    <span>False</span>
                                @else
                                    <span>True</span>
                                @endif
                            </td>
                            <td>
                            <div class="dropdown">
								<button class="btn btn-default btn-sm dropdown-toggle" data-toggle="dropdown">Action
                                <i class="fa fa-caret-down"></i></button>
                                <ul class="dropdown-menu">
                                {{-- @if(is_null($doctor['entity_id']))
                                    <li><a href="{{ route('admin.doctor.entity-create', $doctor['slug']) }}">Add Entity</a></li>
                                @endif --}}
                                    <li><a href="{{ route('admin.doctor.treatment.prices.create', $doctor['slug']) }}"><i class="fa fa-eye"></i> Add prices for Treatment</a></li>
                                    <li><a href="{{ route('admin.doctor.show', $doctor['slug']) }}"><i class="fa fa-eye"></i> Show</a></li>
                                {{-- @if(!is_null($doctor['entity_id'])) --}}
                                    <li><a href="{{ route('admin.doctor.edit', $doctor['slug']) }}"><i class="fa fa-pencil-square-o"></i> Edit</a></li>
                                {{-- @endif --}}
                                  <li class="custom-delete-admin"><i class="fa fa-trash"></i>
                                        {!! Form::open(['route' => ['admin.doctor.destroy', $doctor['slug']], 'method' => 'delete']) !!}
                                        {!! Form::submit('Delete', ['class' => 'btn-delete-admin-custom']) !!}
                                        {!! Form::close() !!}
                                    </li>
                                </ul>
                            </div>
                            </td>
                        </tr>
                        @endforeach
                    </table>
                </div>

                <div class="pull-left">
                    {!! $doctors->load()->links() !!}
                <div>
                <script>
    				function openModal(form) {
    					$(form).modal('show');
    				}
    			</script>
				@include('doctors.create')
