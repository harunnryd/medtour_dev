@extends('layouts.app')

@section('content')
<section class="container-bg">
	<div class="background-hero">
		<div class="row">
			<div class="medium-8 large-7 small-10 columns">
				<div class="content-hero">
					<h1>The ultimate technology enhancement for residential dementia care.</h1>
					<h3>CareBand combines cutting-edge location and activity monitoring technologies with brilliant design to empower people with dementia and their caregivers.</h3>
				</div>
			</div>

		</div>
	</div>
	<div class="row">
		{{-- --}}
		<div class="small-12 medium-12 columns">
			@include('entities._search-panel')</div>
		{{-- --}}
	</div>
</section>
 <section class="content-section-profile">
		<div class="row">
			<div class="small-12 medium-6 medium-push-4 columns">
				<div class="content-profile">
					<h1>
						THE PATIENT DECIDES WHEN IT'S BEST TO GO.
					</h1>
					<h3>Claritas est etiam processus dynamicus, qui sequitur mutationem consuetudium lectorum.Mirum est notare quam littera gothica, quam nunc putamus parumcclaram,anteposuerit litterarum formas humanitatis pe. Eodem modo typi, qui nunc nobis videntur parum clari, fiant sollemnes in futurum."</h3>
				</div>
			</div>
			<div class="small-12 medium-4 medium-pull-8 columns">
				<div class="img-profile-doc">
					<img src="./img/profile-doc.png">
				</div>
			</div>
		</div>
    </section>
	<section class="content-container-card">
		<div class="sub-content-card">
			<div class="title-content">
				<h1>Spesialisasi Populer</h1>
			</div>
			<div class="row">
				<div class="col-md-3 padding-columns">
					<a href="#">
						<div class="box_spesializations_home">
							<div class="img_spesializations_home">
								<img src="{{asset('./img/gigi.jpg')}}">
							</div>
							<div class="content_spesializations_home">
								<h1>Dokter Gigi</h1>
								<hr class="custom_hr"/>
								<h3>Implan gigi</h3>
								<h3>Kawat Gigi</h3>
								<h3>Rahang Atas</h3>
							</div>
						</div>
					</a>
				</div>
				<div class="col-md-3 padding-columns">
					<a href="#">
						<div class="box_spesializations_home">
						<div class="img_spesializations_home">
							<img src="{{asset('./img/kandungan.jpg')}}">
						</div>
						<div class="content_spesializations_home">
							<h1>Dokter Kandungan</h1>
							<hr class="custom_hr"/>
							<h3>Rencana persalinan</h3>
							<h3>Bedah sesar</h3>
							<h3>In-Vitro fertization</h3>
						</div>
					</div>
					</a>
				</div>
				<div class="col-md-3 padding-columns">
					<a href="#">
						<div class="box_spesializations_home">
							<div class="img_spesializations_home">
								<img src="{{asset('./img/kulit.jpg')}}">
							</div>
							<div class="content_spesializations_home">
								<h1>Dokter Kulit</h1>
								<hr class="custom_hr"/>
								<h3>Botox (Wrinkle Treatment)</h3>
								<h3>Thread Lifting</h3>
								<h3>Acne Scar Treatment (Er:YAG & CO2 FXL)</h3>
							</div>
						</div>
					</a>
				</div>
				<div class="col-md-3 padding-columns">
					<a href="#">
						<div class="box_spesializations_home">
							<div class="img_spesializations_home">
								<img src="{{asset('./img/mata.jpg')}}">
							</div>
							<div class="content_spesializations_home">
								<h1>Dokter Mata</h1>
								<hr class="custom_hr"/>
								<h3>Advances in Cornea Transplantation</h3>
								<h3>Cataract Screening and Treatment</h3>
								<h3>CustomVue Wavefront-Guided LASIK</h3>
							</div>
						</div>
					</a>
				</div>
			</div>
		</div>
	</section>
	<section class="content-section-profile">
		<div class="sub-content-card">
			<div class="title-content">
				<h1>Popular medical tourism destinations</h1>
			</div>
			<div class="row">
			@foreach($country->random() as $country)
				<div class="col-md-3 padding-columns">
					<a href="{{ route('country.show', $country['links']) }}">
						<div class="box_spesializations_home">
							<div class="img_spesializations_home">
								<img src="{{asset('./img/gigi.jpg')}}">
							</div>
							<div class="content_spesializations_home">
								<h1>{{ $country['name'] }}</h1>
							</div>
						</div>
					</a>
				</div>
			@endforeach
			</div>
		</div>
	</section>
	<section class="section-howitwork">
		<div class="title-content title-white">
			<h1>How It Works</h1>
		</div>
		<div class="howitwork-content">
		<div class="row">
			<div class="large-3 medium-6 columns">
				<div class="card-content-icon">
					<div class="card__icon">
						<img src="img/icon_step_1_blue.png">
						</div>
					<div class="card__content">
						<h3>1. Get informed</h3>
						<p>Research healthcare providers that offer medical, dental & aesthetic treatments as well as expert second opinions.</p>
					</div>
				</div>
			</div>
			<div class="large-3 medium-6 columns">
				<div class="card-content-icon">
					<div class="card__icon">
						<img src="img/icon_step_2_blue.png">
						</div>
					<div class="card__content">
						<h3>2. Get informed</h3>
						<p>Research healthcare providers that offer medical, dental & aesthetic treatments as well as expert second opinions.</p>
					</div>
				</div>
			</div>
			<div class="large-3 medium-6 columns">
				<div class="card-content-icon">
					<div class="card__icon">
						<img src="img/icon_step_3_blue.png">
						</div>
					<div class="card__content">
						<h3>3. Get informed</h3>
						<p>Research healthcare providers that offer medical, dental & aesthetic treatments as well as expert second opinions.</p>
					</div>
				</div>
			</div>
			<div class="large-3 medium-6 columns">
				<div class="card-content-icon">
					<div class="card__icon">
						<img src="img/icon_step_4_blue.png">
						</div>
					<div class="card__content">
						<h3>4. Get informed</h3>
						<p>Research healthcare providers that offer medical, dental & aesthetic treatments as well as expert second opinions.</p>
					</div>
				</div>
			</div>
		</div>
		</div>
	</section>
	<section class="our-story">
		<div class="row">
			<div class="small-12 medium-6 large-7 columns">
				<div class="title-content our-story-title">
					<h1>Our Story</h1>
				</div>
				<div class="content-story">
					Inspired by his father’s work in geriatric medicine and the power of smart technology, our founder, Adam Sobol, started this company with the vision of keeping seniors safe and providing peace of mind for families and caregivers. Careband is well supported by expert engineers, medical directors with years of clinical knowledge, and a team of  experienced entrepreneurs; a combination of minds which ensures that careband will change the world of senior care.
				</div>
			</div>
			<div class="small-12 medium-6 large-5 columns">
				<div class="images-story">
					<img src="img/banner-doctor.png">
				</div>
			</div>
		</div>
	</section>
	<section class="content-container-card">
		<div class="title-content">
			<h1>Our Selected Top Partner Hospitals</h1>
		</div>
		<div class="row">
			<div class="large-4 medium-4 small-4 columns">
				<div class="content-logo-partner">
					<img src="img/bangkokhospital-g.png">
				</div>
			</div>
			<div class="large-4 medium-4 small-4 columns">
				<div class="content-logo-partner">
					<img src="img/hirslanden-g.png">
				</div>
			</div>
			<div class="large-4 medium-4 small-4 columns">
				<div class="content-logo-partner">
					<img src="img/isarklinikum-g.png">
				</div>
			</div>
		</div>
			<div class="row">
			<div class="large-4 medium-4 small-4 columns">
				<div class="content-logo-partner">
					<img src="img/bangkokhospital-g.png">
				</div>
			</div>
			<div class="large-4 medium-4 small-4 columns">
				<div class="content-logo-partner">
					<img src="img/hirslanden-g.png">
				</div>
			</div>
			<div class="large-4 medium-4 small-4 columns">
				<div class="content-logo-partner">
					<img src="img/isarklinikum-g.png">
				</div>
			</div>
		</div>
			<div class="row">
			<div class="large-6 medium-4 small-4 columns">
				<div class="content-logo-partner">
					<img src="img/bangkokhospital-g.png">
				</div>
			</div>
			<div class="large-6 medium-4 small-4 columns">
				<div class="content-logo-partner">
					<img src="img/hirslanden-g.png">
				</div>
			</div>
		</div>
	</section>
    <section class="footer">
		<div class="row">
			<div class="small-12 columns">
				<div class="footer-content">
					<h1>MedTour</h1>
					<p>is your full-service global access point to high-quality medical travel. You can compare medical, dental, and aesthetic treatments and we'll book your appointments at verified specialized hospitals worldwide. </p>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="small-3 columns">
				<div class="footer-about">
					<h3>About</h3>
					<p>How it Work</p>
					<p>Testimonials</p>
					<p>Methodology</p>
					<p>Price Comparison</p>
					<p>Services</p>
				</div>
			</div>
			<div class="small-3 columns">
				<div class="footer-about">
					<h3>Important Locations</h3>
					<p>Hospital in Thailand</p>
					<p>Hospital in Turkey</p>
					<p>Hospital in Hungary</p>
					<p>Hospital in Germany</p>
					<p>Hospital in Switzerland</p>
				</div>
			</div>
			<div class="small-3 columns">
				<div class="footer-about">
					<h3>Important specialities</h3>
					<p>Plastic Sugery</p>
					<p>Hair Transplantation</p>
					<p>Neurosurgery</p>
					<p>IVF</p>
					<p>Dentistry</p>
				</div>
			</div>
			<div class="small-3 columns">
				<div class="footer-about">
					<h3>MedTour</h3>
					<p>63 Market Street #09-01</p>
					<p>Bank of Singapore Centre,</p>
					<p>Singapore 048942</p>
					<p>Registered under the Companies</p>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="small-12 columns">
				<div class="footer-border"></div>
				<div class="footer-about__">
					<h5>* Subject to review by our patient care team. A small fee may apply for cases requiring review by our medical doctors prior to obtaining a quotation. Caremondo does not provide medical advice or diagnosis</h5>
					<p>© 2017 DryWebsite</p>
				</div>
			</div>
		</div>
	</section>
@endsection
