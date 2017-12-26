@extends('layouts.app')
@section('content')
<div class="sub-hero-content-comparison text-center">
	 <div class="panel-heading-hero-custom">			<h1>Hospital</h1>
	</div>
</div>
<div class="container">
    <div class="row">
		<div class="col-md-12">
			<div class="hospital-title-heading">
				<h1>{{ $hospital['name'] }}</h1>
			</div>
		</div>
		<div class="col-md-6">
			<div class="hospital-image-heading">
				  <img src="/img/{{ $hospital['entity']['photo'] }}" class="img-responsive" width="500px" height="500px"/>
			</div>
		</div>
		<div class="col-md-6">
			<div class="content-hospital-subheading">
				<h2>All Doctor Specialization</h2>
				<h3>
					  @php($items = collect())
                                    @foreach($hospital['practices'] as $practice)
                                        @foreach($practice['specializations'] as $specialization)
                                            @php
                                                $items->push([
                                                    'id'   => $specialization['id'],
                                                    'type' => $specialization['type'],
                                                ]);

                                                $items = $items->unique('type');
                                            @endphp
                                        @endforeach
                                    @endforeach

                                    @foreach($items as $item)
                                         {{ $item['type'] }}
                                    @endforeach
				</h3>
			</div>
			
			<div class="content-hospital-subheading">
				<h2>Facilities</h2>
				<h3>@foreach($hospital['facilities'] as $facility)
				 {{ $facility['name'] }}
					@endforeach</h3>
			</div>
			
			<div class="content-hospital-subheading">
				<h2>Beds</h2>
				<h3>{{ $hospital['beds'] }}</h3>
			</div>
			
			<div class="content-hospital-subheading">
				<h2>Inpatients</h2>
				<h3>{{ $hospital['inpatients'] }}</h3>
			</div>
			
			<div class="content-hospital-subheading">
				<h2>Outpatients</h2>
				<h3>{{ $hospital['outpatients'] }}</h3>
			</div>
			
			<div class="content-hospital-subheading">
				<h2>Location</h2>
				<h3>
					 <p>City <a href="{{ route('city.show', $hospital['entity']['city']['slug']) }}">{{ $hospital['entity']['city']['name'] }}</a>, 
					Province {{ $hospital['entity']['city']['province']['name'] }}, 
					Country <a href="{{ route('city.show', $hospital['entity']['city']['slug']) }}">{{ $hospital['entity']['city']['province']['country']['name'] }}</a>
				</h3>
			</div>
			
		</div>
		
	</div>
	<div class="row">
		<div class="col-md-12">
		
		</div>
	</div>
</div>
@include('footer')
@endsection