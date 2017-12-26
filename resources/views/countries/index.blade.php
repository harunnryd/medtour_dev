@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-xs-4">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <strong>Country</strong>
                </div>

                <div class="panel-body">

                <div class="table-responsive">
                    <table class="table">
                    <thead>
                        <th>Name</th>
                    </thead>
                        @foreach($country->countryRepository()->paginate(2) as $item)
                        <tr>
                            <td>
                                {!! Form::model($item, ['route' => ['admin.country.update', $item], 'method' => 'patch', 'class' => 'form-inline']) !!}
                                    {!! Form::text('name', $item->name, ['class' => 'form-control text-center']) !!}
                                    <i class="fa fa-refresh"></i>
                                    {!! Form::submit('Update', ['class' => 'btn btn-info btn-sm']) !!}
                                {!! Form::close() !!}
                            </td>
                        </tr>
                        @endforeach
                    </table>
                </div>
                    <div class="pull-left">
                        {{ $country->countryRepository()->paginate(2)->links() }}
                    <div>
                </div>
            </div>
        </div>
@endsection