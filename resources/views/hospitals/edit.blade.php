@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Hospital</div>
                <div class="panel-body">
                    {!! Form::model($hospital, ['route' => ['admin.hospital.update', $hospital], 'class' => 'form-horizontal', 'files' => true, 'method' => 'patch']) !!}
                        @include('hospitals._form-edit')
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
