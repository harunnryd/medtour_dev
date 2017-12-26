@extends('layouts.app')

@section('content')

{{-- variabel pengenal include form --}}
<div class="header-bg-admin"></div>

<div id="wrapper">
	        <nav class="navbar-default navbar-static-top" role="navigation">
             <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
			   </div>
			 <div class=" border-bottom">



       		<div class="clearfix">

     </div>

		    <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                		<ul class="nav nav-custom" id="side-menu">

                    <li>
                        <a href="#" class=" hvr-bounce-to-right"><i class="fa fa-dashboard nav_icon "></i><span class="nav-label">Dashboards</span> </a>
                    </li>
                      <li>
                        <a href="#" class=" hvr-bounce-to-right"><i class="fa fa-dashboard nav_icon "></i><span class="nav-label">Total User</span>
						   <span class="badge">{{ \App\User::all()->count() }}</span></a>
                    </li>
					 <li>
                        <a href="{{ url('admin?menu=doctor') }}" class=" hvr-bounce-to-right"><i class="fa fa-inbox nav_icon"></i> <span class="nav-label">Doctor</span> <span class="badge">{{ $doctors->doctorRepository()->all()->count() }}</span></a>
						 {{-- <a href="{{ route('admin.doctor.index') }}">Doctor</a> --}}


                    </li>

                    <li>
                        <a href="{{ url('admin?menu=hospital') }}" class=" hvr-bounce-to-right"><i class="fa fa-picture-o nav_icon"></i> <span class="nav-label">Hospital</span> <span class="badge">{{ $hospitals->hospitalRepository()->all()->count() }}</span></a>
                    </li>
                     <li>
                        <a href="{{ url('admin?menu=specialization') }}" class=" hvr-bounce-to-right"><i class="fa fa-th nav_icon"></i> <span class="nav-label">Specialization</span>  <span class="badge">{{ $specializations->specializationRepository()->all()->count() }}</span> </a>
                    </li>
				    <li>
                        <a href="{{ url('admin?menu=language') }}" class=" hvr-bounce-to-right"><i class="fa fa-th nav_icon"></i> <span class="nav-label">Language </span><span class="badge">{{ $languages->languageRepository()->all()->count() }}</span> </a>
                    </li>
                    <li>
                        <a href="{{ url('admin?menu=treatment') }}" class=" hvr-bounce-to-right"><i class="fa fa-th nav_icon"></i> <span class="nav-label">Treatment </span><span class="badge">{{ $treatments->treatmentRepository()->all()->count() }}</span> </a>
                    </li>

                    <li>
                        <a data-toggle="collapse" data-target="#demo" class=" hvr-bounce-to-right"><i class="fa fa-list nav_icon"></i> <span class="nav-label">Place </span><span class="fa fa-angle-down"></span></a>
                        <ul class="nav nav-second-level collapse" id="demo">
                            <li><a href="{{ url('/admin?menu=country') }}" class=" hvr-bounce-to-right"><i class="fa fa-align-left nav_icon"></i>Country <span class="badge">{{ $country->countryRepository()->all()->count() }}</span></a> </li>
                            <li><a href="{{ url('/admin?menu=province') }}" class=" hvr-bounce-to-right"><i class="fa fa-align-left nav_icon"></i>Province <span class="badge">{{ $province->provinceRepository()->all()->count() }}</span></a></li>
                            <li><a href="{{ url('/admin?menu=city') }}" class=" hvr-bounce-to-right"><i class="fa fa-align-left nav_icon"></i>City   <span class="badge">{{ $city->cityRepository()->all()->count() }}</span></a></li>

                        </ul>
                    </li>
                </ul>
            </div>
			</div>
        </nav>
	        <!-- Brand and toggle get grouped for better mobile display -->

		   <!-- Collect the nav links, forms, and other content for toggling -->

        {{--                                                                                                               --}}

	<div id="page-wrapper" class="gray-bg dashbard-1">
		<div class="content-main">
			<div class="banner">

				<h2>
				<a href="index.html">Home</a>
				<i class="fa fa-angle-right"></i>
				<span>Dashboard</span>
				</h2>
		    </div>
			<div class="content-top">
				<div class="col-md-12">
					<div class="content-top-1">
					 @includeIf('partials._load-view', ['menu' => $menu])
					</div>
				</div>
				<div class="clearfix"></div>
			</div>
			<div class="copy">
            <p> &copy; 2017. All Rights Reserved | Design by DryWebsite </p>
	    </div>
		</div>
		<div class="clearfix"></div>
	</div>

</div>

@endsection
