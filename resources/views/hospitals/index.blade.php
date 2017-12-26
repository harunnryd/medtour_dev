@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-xs-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <strong>Hospital</strong>
                </div>

                <div class="panel-body">

                <div class="table-responsive">
                    <table class="table">
                    <thead>
                        <th>Name</th>
                        <th>Beds</th>
                        <th>Inpatients</th>
                        <th>Outpatients</th>
                        <th>Facilities</th>
                        <th>Action</th>
                    </thead>
                        @foreach($hospitals->hospitalRepository()->paginate(3) as $hospital)
                        <tr>
                            <td>{{ $hospital->name }}</td>
                            <td>{{ $hospital->beds }}</td>
                            <td>{{ $hospital->inpatients }}</td>
                            <td>{{ $hospital->outpatients }}</td>
                            <td>
                                @foreach($hospital->facilities as $facility)
                                    <label class="label label-default label-sm">{{ $facility->name }}</label>
                                @endforeach
                            </td>
                            <td>
                                @can('adminAccess', \Auth::user()->role)
                                    {!! Form::open(['route' => ['admin.hospital.destroy', $hospital], 'method' => 'delete', 'class' => 'form-inline']) !!}
                                    {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-sm js-submit-confirm']) !!}
                                    or <a href="{{ route('admin.hospital.edit', $hospital) }}" class="btn btn-primary btn-sm">Edit</a>
                                    {!! Form::close() !!}
                                @elsecan('userAccess', \Auth::user()->role)
                                    {!! Form::open(['route' => ['hospital.destroy', $hospital], 'method' => 'delete', 'class' => 'form-inline']) !!}
                                    {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-sm js-submit-confirm']) !!}
                                    or <a href="{{ route('hospital.edit', $hospital) }}" class="btn btn-primary btn-sm">Edit</a>
                                    {!! Form::close() !!}
                                @endcan

                            </td>
                        </tr>
                        @endforeach
                    </table>
                </div>
                    <div class="pull-left">
                        {{ $hospitals->hospitalRepository()->paginate(3)->links() }}
                    <div>
                </div>
            </div>
        </div>
@endsection