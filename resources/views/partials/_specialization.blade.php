
                    <a class="btn-add-admin-custom" onClick="openModal('#modal-create')" href="#">Add New Specialization</a>
                    <table class="table table-responsive">
                    <thead>
                        <th>Type</th>
                        <th>Action</th>
                    </thead>
                        @foreach($specializations->load()->all() as $specialization)
                        <tr>

                            <td>{{ $specialization['type'] }}
                            <td>
                            <div class="dropdown">
                                <button class="btn btn-default btn-sm dropdown-toggle" data-toggle="dropdown">Action <i class="fa fa-caret-down"></i></button>
                                <ul class="dropdown-menu">
                                    <li><a href="{{ route('admin.specialization.edit', $specialization['slug']) }}"><i class="fa fa-pencil-square-o"></i> Edit</a></li>
                                  
                                     <li class="custom-delete-admin"><i class="fa fa-trash"></i> 
                                        {!! Form::open(['route' => ['admin.specialization.destroy', $specialization['slug']], 'method' => 'delete']) !!}
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
                    {!! $specializations->load()->links() !!}
                <div>
				<script>
					function openModal(form) {
						$(form).modal('show');
					}
				</script>	
				@include('specializations.create')	