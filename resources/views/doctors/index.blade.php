@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-xs-12">
            <div class="panel panel-default panel-default-padding">
                <div class="panel-heading">
                    <strong>Doctor</strong>
                </div>

				<div class="panel-body">
                <div class="table-responsive">
                    <table class="table">
                    <thead>
                        <th>Name</th>
                        <th>Gender</th>
                        <th>Specialization</th>
                        @can('adminAccess', \Auth::guard('admin')->user()->role)
                        <th>Action</th>
                        @endcan
                    </thead>
                        @foreach($doctors->doctorRepository()->paginate(3) as $doc)
                        <tr>
                            <td><a href="{{ route('doctor.show', $doc) }}">{{ $doc->name }}</a></td>
                            <td>{{ $doc->gender }}</td>
                            <td>
                                @foreach($doc->specializations as $specialization)
                                    <label class="label label-default label-sm">{{ $specialization->type }}</label>
                                @endforeach
                            </td>
                            <td>
                                @can('adminAccess', \Auth::guard('admin')->user()->role)
                                    {!! Form::open(['route' => ['admin.doctor.destroy', $doc], 'method' => 'delete', 'class' => 'form-inline']) !!}
                                    {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-sm js-submit-confirm']) !!}
                                    <a href="{{ route('admin.doctor.edit', $doc) }}" class="btn btn-primary btn-sm">Edit</a>
                                    {!! Form::close() !!}
                                @endcan
                            </td>
                        </tr>
                        @endforeach
                    </table>
                </div>
                    <div class="pull-left">
                        {{ $doctors->doctorRepository()->paginate(3)->links() }}
                    <div>
                </div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection