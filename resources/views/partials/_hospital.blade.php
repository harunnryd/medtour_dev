                   <a class="btn-add-admin-custom" href="{{ route('admin.hospital.create') }}">Add New Hospital</a>
                    <table class="table table-responsive">
                    <thead>
                        <th>Name</th>
                        <th>Beds</th>
                        <th>Inpatients</th>
                        <th>Outpatients</th>
                        <th>Facilities</th>
                        <th>Action</th>
                    </thead>
                        @foreach($hospitals->load()->all() as $hospital)
                        <tr>
                            <td>{{ $hospital['name'] }}</td>
                            <td>{{ $hospital['beds'] }}</td>
                            <td>{{ $hospital['inpatients'] }}</td>
                            <td>{{ $hospital['outpatients'] }}</td>
                            <td>
                                @foreach($hospital['facilities']->all() as $facility)
                                    <span class="label label-primary label-sm">{{ $facility['name'] }}</span>
                                @endforeach
                            </td>
                            <td>
                            <div class="dropdown">
                                <button class="btn btn-default btn-sm dropdown-toggle" data-toggle="dropdown">Action
                                <i class="fa fa-caret-down"></i></button>
                                <ul class="dropdown-menu">
                                    <li><a href="{{ route('admin.hospital.show', $hospital['slug']) }}"><i class="fa fa-eye"></i> Show</a></li>
                                    <li><a href="{{ route('admin.hospital.edit', $hospital['slug']) }}"><i class="fa fa-pencil-square-o"></i> Edit</a></li>

                                    <li class="custom-delete-admin"><i class="fa fa-trash"></i>
                                        {!! Form::open(['route' => ['admin.hospital.destroy', $hospital['slug']], 'method' => 'delete']) !!}
                                        {!! Form::submit( 'Delete',['class' => 'btn-delete-admin-custom js-submit-confirm']) !!}
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
                    {!! $hospitals->load()->links() !!}
                <div>
