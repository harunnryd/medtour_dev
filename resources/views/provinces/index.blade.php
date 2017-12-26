@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-xs-4">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <strong>Province</strong>
                </div>

                <div class="panel-body">

                <div class="table-responsive">
                    <table class="table">
                    <thead>
                        <th>Name</th>
                        @foreach($errors->all() as $err)
                            {{ $err }}
                        @endforeach
                    </thead>
                        @foreach($province->paginate(10) as $province)
                        <tr>
                            <td>
                                {!! Form::model($province, ['route' => ['admin.province.update', $province], 'method' => 'patch', 'class' => 'form-inline']) !!}
                                    {!! Form::hidden('country_id', $province->country_id) !!}
                                    {!! Form::text('name', $province->name, ['class' => 'form-control text-center']) !!}
                                    <i class="fa fa-refresh"></i>
                                    {!! Form::submit('Update', ['class' => 'btn btn-info btn-sm']) !!}
                                {!! Form::close() !!}
                            </td>
                        </tr>
                        @endforeach
                    </table>
                </div>
                    <div class="pull-left">
                        {{ $province->paginate(10)->links() }}
                    <div>
                </div>
            </div>
        </div>
@endsection