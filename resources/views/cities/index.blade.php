@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-xs-4">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <strong>City</strong>
                </div>

                <div class="panel-body">

                <div class="table-responsive">
                    <table class="table">
                    <thead>
                        <th>Name</th>
                    </thead>
                        @foreach($city->paginate(10) as $city)
                        <tr>
                            <td>
                                {!! Form::model($city, ['route' => ['admin.city.update', $city], 'method' => 'patch', 'class' => 'form-inline']) !!}
                                    {!! Form::hidden('province_id', $city->province_id) !!}
                                    {!! Form::text('name', $city->name, ['class' => 'form-control text-center']) !!}
                                    <i class="fa fa-refresh"></i>
                                    {!! Form::submit('Update', ['class' => 'btn btn-info btn-sm']) !!}
                                {!! Form::close() !!}
                            </td>
                        </tr>
                        @endforeach
                    </table>
                </div>
                    <div class="pull-left">
                        {{ $city->paginate(10)->links() }}
                    <div>
                </div>
            </div>
        </div>
@endsection