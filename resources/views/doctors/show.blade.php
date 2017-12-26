@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row panel-default-padding">
		<div class="col-md-3">
			<img src="/img/{{ $doctor['entity']['photo'] }}" class="img-circle img-responsive" width="100%"/>
		</div>
		<div class="col-md-9">
			<div class="profile-doctor__">
				<h1>{{ $doctor['name'] }}</h1>
				<h2>
					@foreach($doctor['specializations'] as $specialization)
					<span>{{ $specialization['type'] }}, </span>
					@endforeach
				</h2>
				<h3>{{ \Carbon\Carbon::parse($doctor['experience'])->diff(\Carbon\Carbon::now())->format('%y Years %m Month') }}</h3>
			</div>
		</div>
		<div class="col-md-12">
			<div class="info-doctor__title">
				<h1>Info</h1>
			</div>
			<div class="info-doctor__content">
				<div class="col-md-4">
					<h3>Gender
						<label>
						{{ $doctor['gender'] }}
						</label>
					</h3>
					<h3>Certification
						@foreach($doctor['certifications'] as $certification)
					<label>{{ $certification['name'] }}</label>
                                    @endforeach
					</h3>
				<h3>Language                                      @foreach($doctor['languages'] as $language)
                                        <label>{{ $language['spoken'] }}</label>
                                    @endforeach</h3>
				</div>
				<div class="col-md-4">
					<h3>
						Kontak <label>{{ $doctor['entity']['contact'] }}</label>
					</h3>
					<h3>
						Alamat <label>{{ $doctor['entity']['address'] }} , {{ $doctor['entity']['city']['name'] }}, {{ $doctor['entity']['city']['province']['name'] }}, {{ $doctor['entity']['city']['province']['country']['name'] }}</label>
					</h3>
				</div>
				<div class="col-md-4">
					 <table>
                        <tr>
                            <thead>
                                <th>Name</th>
                                <th>Price</th>
                            </thead>
                                <td>
                                    @foreach($doctor['entity']['treatments'] as $treatment)
                                        <tr>
                                            <td>{{ $treatment['name'] }}</td>
                                            <td class="small">Rp. {{ $pricing->showPrice($doctor['entity']['id'], $treatment['id'])->price ? number_format($pricing->showPrice($doctor['entity']['id'], $treatment['id'])->price, 2, ',', '.') : number_format(0, ',', '.') }}</td>
                                        </tr>
                                    @endforeach
                                </td>
                            </tr>
                    </table>
				</div>
			</div>
		</div>
        @if(Auth::guard('web')->user())
            <a class="btn-add-admin-custom" onClick="openModal('#modal-create')" href="#">Add comment</a>
        @endif
        <hr/>

        <div class="row">
        @foreach($doctor['ratings'] as $review)
            {{-- {{dd($review)}} --}}

            <div class="col-sm-1">
            <div class="thumbnail">
            <img class="img-responsive user-photo" src="https://ssl.gstatic.com/accounts/ui/avatar_2x.png">
            </div><!-- /thumbnail -->
            </div><!-- /col-sm-1 -->

            <div class="col-sm-5">
            <div class="panel panel-default">
            <div class="panel-heading">
            <strong>{{ App\User::find($review['user_id'])->name }}</strong> <span class="text-muted">{{ \Carbon\Carbon::parse($review['created_at'])->diffForHumans() }}</span>
            </div>
            <div class="panel-body">
                {{ $review['comment'] }}
            </div><!-- /panel-body -->
            </div><!-- /panel panel-default -->
            </div><!-- /col-sm-5 -->
        @endforeach
        </div>
        <hr/>

<!--
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default panel-default-padding">
                <div class="panel-heading">Doctor - <button id="button" class="btn btn-warning btn-sm">Show <small>details..</small></button></div>
                <div class="panel-body">
                    <table class="table table-bordered table-condensed table-sm">
                        <tbody>
                            <tr>
                                <th>
                                    <img src="/img/{{ $doctor['entity']['photo'] }}" class="img-circle img-responsive" width="100" height="100"/>
                                </th>
                            </tr>
                            <tr>
                                <th>Name </th>
                                <td>{{ $doctor['name'] }}</td>
                            </tr>

                            <tr>
                                <th>Gender </th>
                                <td>{{ $doctor['gender'] }}</td>
                            </tr>

                            <tr>
                                <th>Experience </th>
                                <td>{{ \Carbon\Carbon::parse($doctor['experience'])->diff(\Carbon\Carbon::now())->format('%y Years %m Month') }}</td>
                            </tr>

                            <tr id="contact" style="display:none;">
                                <th>Kontak </th>
                                <td>{{ $doctor['entity']['contact'] }}</td>
                            </tr>
                            <tr id="address" style="display:none;">
                                <th>Alamat </th>
                                <td>{{ $doctor['entity']['address'] }}, {{ $doctor['entity']['city']['name'] }}, {{ $doctor['entity']['city']['province']['country']['name'] }}, {{ $doctor['entity']['city']['province']['name'] }}</td>
                            </tr>
                            <tr id="city" style="display:none;">
                                <th>City </th>
                                <td>{{ $doctor['entity']['city']['name'] }}</td>
                            </tr>
                            <tr id="province" style="display:none;">
                                <th>Province </th>
                                <td>{{ $doctor['entity']['city']['province']['name'] }}</td>
                            </tr>
                            <tr id="country" style="display:none;">
                                <th>Country </th>
                                <td>{{ $doctor['entity']['city']['province']['country']['name'] }}</td>
                            </tr>

                            <tr>
                                <th>Specializations </th>
                                <td>
                                    @foreach($doctor['specializations'] as $specialization)
                                        <label class="small">{{ $specialization['type'] }}</label>
                                    @endforeach
                                </td>
                            </tr>

                            <tr>
                                <th>Certification </th>
                                <td>
                                    @foreach($doctor['certifications'] as $certification)
                                        <label class="small">{{ $certification['name'] }}</label>
                                    @endforeach
                                </td>
                            </tr>
                            <tr>
                                <th>Language </th>
                                <td>
                                    @foreach($doctor['languages'] as $language)
                                        <label class="small">{{ $language['spoken'] }}</label>
                                    @endforeach
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <table>
                        <tr>
                            <thead>
                                <th>Name</th>
                                <th>Price</th>
                            </thead>
                                <td>
                                    @foreach($doctor['entity']['treatments'] as $treatment)
                                        <tr>
                                            <th>{{ $treatment['name'] }}</th>
                                            <td class="small">{{ $pricing->showPrice($doctor['entity']['id'], $treatment['id'])->price ? number_format($pricing->showPrice($doctor['entity']['id'], $treatment['id'])->price, 2, '.', ',') : number_format(0, '.', ',') }}</td>
                                        </tr>
                                    @endforeach
                                </td>
                            </tr>
                    </table>
                </div>
            </div>
        </div>

-->
    </div>
</div>
<script>
    function openModal(form) {
        $(form).modal('show');
    }
</script>
@include('partials._comment')
@include('footer')
@endsection
