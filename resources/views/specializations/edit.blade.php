@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Specialization</div>
                <div class="panel-body">
                    {!! Form::model($specialization, ['route' => ['admin.specialization.update', $specialization], 'class' => 'form-horizontal', 'method' => 'patch']) !!}
                        @include('specializations._form')
                        {!! Form::hidden('id', $specialization->id) !!}
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
