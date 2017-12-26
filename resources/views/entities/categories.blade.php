@extends('layouts.app')
@section('content')
<div class="sub-hero-content">
	<div class="sub-hero-search">
		@include('entities._search-panel')
	</div>
</div>
<div class="container">
    <div class="row">
        <div class="col-xs-12">
            <div class="panel panel-default panel-default-no-border">


                <div class="panel-body">
					<div>
						<div class="panel-heading-custom">

						@if($collection->all())
							<div class="dropdown dropdown-custom">
								<h3>Filter</h3>
								<button class="btn btn-primary btn-sm dropdown-toggle hover-custom-dropdown" type="button" data-toggle="dropdown">Pilih
								<span class="caret"></span></button>
									<ul class="dropdown-menu">
										<li><a href="{{ route('guest.entity.search', array_merge(request()->all(), ['view' => 'doctor'])) }}">Doctor</a></li>
										<li><a href="{{ route('guest.entity.search', array_merge(request()->all(), ['view' => 'hospital'])) }}">Hospital</a></li>
									</ul>
							</div>

						@endif

						</div>

					</div>
                    <div class="[ row text-center]">
                        @if($collection->all())
                            @foreach($collection->all() as $item)
                            <div class="col-md-6">
								<div class="equipo-item card-equipo__">
									<div class="col-md-5 separador-vertical"><img src="/img/{{ $item['photo'] }}" class="img-responsive center-block">
									</div>
									<div class="col-md-7">
										<h2 class="titulo-equipo title-doc-titulo">{{ $item['name'] }}</h2>
										<small>
										@if(isset($item['doctor_slug']))
											  <div class="texto-equipo texto-equipo-padding-bot"><h3>Experience {{ $item['experience'] }}</h3></div>
											<div class="texto-equipo texto-equipo-lineheight-custome">
												<h3>Doctor in <b>{{ $item['country']['name'] }}</b></h3>
											</div>
											<div class="texto-equipo texto-equipo-lineheight-custome">
												<h3>City : <b>{{ $item['city']['name'] }}</b></h3>
											</div>

										@else
											<div class="texto-equipo-title"><h3>Hospital in</h3></div>
											<div class="texto-equipo"> <h3>Country : <a href="{{ route('country.show', $item['country_slug']) }}"><b>{{ $item['country']['name'] }}</b></a></h3></div>
											<div class="texto-equipo"><h3>City : <a href="{{ route('city.show', $item['city_slug']) }}"><b>{{ $item['city']['name'] }}</b></a></h3></div>
										@endif
											<div class="texto-equipo texto-equipo-lineheight-custome"><h3>Province : <b>{{ $item['province']['name'] }}</b></h3></div>
										@if(isset($item['doctor_slug']))
											@includeIf('partials._add-doctor-form', ['doctor' => $item])
											<a class="btn-details-st" href="{{ route('doctor.show', $item['doctor_slug']) }}">More details..</a>
										@else
											<a class="btn-details-st" href="{{ route('hospital.show', $item['hospital_slug']) }}">More details..</a>
										@endif
										</small>
									</div>
									</div>
                            </div>
                            @endforeach
                        @else
                            <div class="text-center">
                                <h1>:'(</h1>
                                <p><a href="{{ route('guest.entity.search') }}">Lihat Semua Dokter<i class="fa fa-arrow-right"></i></a></p>
                            </div>
                        @endif
                    </div>
                </div>
                    <div class="pull-left">
                        {{ $collection->links() }}
                    <div>
                </div>
            </div>
        </div>
		</div>
	</div>
</div>

			@include('footer')
@endsection
