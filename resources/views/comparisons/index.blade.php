@extends('layouts.app')
@section('content')
<div class="sub-hero-content-comparison text-center">
	 <div class="panel-heading-hero-custom">
		 <h1>Doctor</h1>
	</div>
</div>
<div class="row margin-comparison-small">
	<div class="col-md-12">
		<div class="panel-heading">
<!--
			<a href="{{ url('/search') }}" class="btn-add-doctor-comparison"><i class="fa fa-angle-right"></i> Tambah Dokter Lagi</a>
			<hr>
-->
		</div>
	</div>
    {{-- @if($comparisons->isEmpty())
			<div class="text-center">
				<h1>:|</h1>
				<p>Tidak Ada Yang Dibandingkan.</p>
				<p><a href="{{ route('guest.entity.search') }}">Lihat Semua Dokter<i class="fa fa-arrow-right"></i></a></p>
			</div>
	@else --}}
		<div class="col-md-3" style="margin-top: 3em;">
		<div class="card-comparisons_custom text-center icon-comparisons-add-doc" style="border: 1px dashed #d7d7d7; box-shadow: none;">
			<div class="link-add-comparisons" >
				<a href="{{ url('/search') }}">
					<div class="icon-add-comparisons-btn">
						<i class="glyphicon glyphicon-plus"></i>
					</div>
					<div class="text-add-comparisons-btn ">
						<h3 style="text-align:center;">
							Pilih Dokter..
						</h3>
					</div>
				</a>
			</div>
		</div>
	</div>

		@foreach($comparisons->details() as $doctor)
		<div class="col-md-3" style="margin-top: 3em;">
			<div class="card-comparisons_custom">
				<img src="/img/{{ !is_null($doctor['entity']['photo']) ? $doctor['entity']['photo'] : 'default.jpg' }}" class="d-block mx-auto rounded-circle img-fluid my-3">
				<h3><a href="{{route('doctor.show', $doctor['detail']['slug'])}}">{{ $doctor['detail']['name'] }}
				<p>Doctor In {{ $doctor['country']['name'] }}</p>
					</a></h3>
				<hr class="custom_hr"/>

				<div class="text-xs-center text-content-card-comparisons">
					<h4>Experience: <span class="value_treatment_comparison">{{ $doctor['experience'] }}</span></h4>
				</div>
				@if (count($doctor['entity']['treatments']) > 0)
					<div class="spesialization_btn_bug">
						<h4>Spesialiazation: <button data-toggle="collapse" data-target="#{{$doctor['detail']['slug']}}">Click here..</button></h4>
					</div>
					<div id="{{$doctor['detail']['slug']}}" class="collapse">
						<div class="treatment_comparison">
									@foreach($doctor['entity']['treatments'] as $treatment)
									{{-- <li class="list-group-item small"> --}}
										<h4>Treatment: <span class="value_treatment_comparison">{{ $treatment['name'] }}</span></h4>
										<h4 style="margin-top:5px;">Harga:<span class="value_treatment_comparison"> <b>Rp. {{ $pricing->showPrice($doctor['entity']['id'], $treatment['id'])->price ? number_format($pricing->showPrice($doctor['entity']['id'], $treatment['id'])->price, 2, ',', '.') : number_format(0, ',', '.') }}</b></span></h4>
									{{-- </li> --}}
									@endforeach
						</div>
					</div>



				@endif
				  <div class="card-block text-center">
					  {!! Form::open(['route' => ['doctor.remove', $doctor['detail']['id']], 'method'=>'delete', 'class' => 'form-inline']) !!}
					  {!! Form::button('Delete', array('type' => 'submit', 'class' => 'button-remove-comparisons  js-submit-confirm', 'data-confirm-message' => 'Kamu akan menghapus ' . $doctor['detail']['name'] . ' dari comparison.')) !!}
					  {!! Form::close() !!}
				</div>
			</div>
		</div>
	@endforeach
{{-- @endif --}}


</div>

@include('footer')
  @endsection
