                   <a class="btn-add-admin-custom" href="{{ route('admin.treatment.create') }}">Add New Treatment</a>
                    <table class="table table-responsive">
                    <thead>
                        <th>Name</th>
                        <th>Created at</th>
                        <th>Updated at</th>
                    </thead>
                        @foreach($treatments->load()->all() as $treatment)
                        <tr>
                            <td>{{ $treatment['name'] }}</td>
                            <td>{{ $treatment['created_at'] }}</td>
                            <td>{{ $treatment['updated_at'] }}</td>
                            <td>
                            <div class="dropdown">
                                <button class="btn btn-default btn-sm dropdown-toggle" data-toggle="dropdown">Action
                                <i class="fa fa-caret-down"></i></button>
                                <ul class="dropdown-menu">
                                    {{--  <li><a href="{{ route('admin.treatment.show', $treatment['slug']) }}"><i class="fa fa-eye"></i> Show</a></li>  --}}
                                    <li><a href="{{ route('admin.treatment.edit', $treatment['slug']) }}"><i class="fa fa-pencil-square-o"></i> Edit</a></li>

                                    <li class="custom-delete-admin"><i class="fa fa-trash"></i>
                                        {!! Form::open(['route' => ['admin.treatment.destroy', $treatment['slug']], 'method' => 'delete']) !!}
                                        {!! Form::submit('Delete',['class' => 'btn-delete-admin-custom js-submit-confirm']) !!}
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
                    {!! $treatments->load()->links() !!}
                <div>
