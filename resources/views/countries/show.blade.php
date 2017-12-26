@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-xs-12">
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="[ col-xs-12 col-sm-offset-2 col-sm-8 text-center]">
                    <h2 class="text-center"><small>List Hospital In</small> {{ $country->first()['country'] }}</h2>
                    @foreach($country->all() as $data)
                            <div class="row equipo-item">
                                <div class="col-md-9">
                                    <div class="col-md-2 separador-vertical"><img src="/img/{{ $data['photo'] }}" class="img-responsive center-block"></div>
                                        <div class="col-md-9">
                                            <h2 class="titulo-equipo">
                                            {{ $data['name'] }}
                                            <a class="btn btn-primary btn-sm" href="{{ route('hospital.show', $data['hospital_slug']) }}">View..</a>
                                            </h2>
                                            <small>
                                                <p class="texto-equipo">Country : {{ $data['country'] }}</p>
                                                <p class="texto-equipo">Province : {{ $data['province']['name'] }}</p>
                                                <p>City : <a href="{{ route('city.show', $data['city']['slug']) }}">{{ $data['city']['name'] }}</a></p>                                            </small>
                                        </div>
                                </div>
                            </div>
                    @endforeach
                    </div>
                </div>
                <div class="pull-left">
                    {{ $country->links() }}
                <div>
            </div>
        </div>
    </div>
</div>
@endsection