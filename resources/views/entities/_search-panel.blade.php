    <div class="panel-body">
    <div class="row">
        {!! Form::open(['route' => 'guest.entity.search', 'method' => 'get']) !!}

            <div class="col-md-6 }}">
				<div class="input-search">
                {!! Form::select('specialization', $specializations->pluck('type'), null, ['class' => ' ', 'placeholder' => ' - General Practice - ']) !!}
				</div>
            </div>
            <div class="col-md-3">
				<div class="input-search">
                {!! Form::select('country', $country->pluck('name'), null, ['class' => ' ', 'placeholder' => ' - Country - ']) !!}
				</div>
            </div>

            {{-- Block
            @if(request()->exists('country'))
            <div class="col-md-{{ request()->exists('province') ? '2' : '3' }}">
				<div class="input-search">
					{!! Form::select('province',
                        $country->countryRepository()
                                ->findBy('slug', request('country'))
                                ->provinces
                                ->pluck('name', 'slug'), null,
                                [
                                    'class' => ' ',
                                    'placeholder' => ' - Province - ',
                                ])
                    !!}
				</div>
            </div>
            @endif

            @if(request()->exists('province'))
            <div class="col-xs-2">
				<div class="input-search">
                    {!! Form::select('city',
                        $province->provinceRepository()
                                 ->findBy('slug', request('province'))
                                 ->cities
                                 ->pluck('name', 'slug'), null,
                                 [
                                     'class' => ' ',
                                     'placeholder' => ' - City - ',
                                 ])
                    !!}
				</div>
            </div>
            @endif
            --}}

            <div class="col-md-2">
                <span class="button-search">
                    {!! Form::submit('Search', ['class' => 'btn btn-primary btn-sm']) !!}
                </span>
            </div>
        </div>
        {!! Form::close() !!}
    </div>

