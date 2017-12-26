            @if($menu === 'doctor')
                @includeIf('partials._doctor')
            @elseif($menu === 'hospital')
                @includeIf('partials._hospital')
            @elseif($menu === 'specialization')
                @includeIf('partials._specialization')
            @elseif($menu === 'treatment')
                @includeIf('partials._treatment')
            @elseif($menu === 'language')
                {!! Form::open(['route' => 'admin.language.store', 'class' => 'form-horizontal']) !!}
                        @includeIf('languages._form-create')
                {!! Form::close() !!}
            @elseif($menu === 'country')
                {!! Form::open(['route' => 'admin.country.store', 'class' => 'form-horizontal']) !!}
                        @includeIf('countries._form-create')
                {!! Form::close() !!}
            @elseif($menu === 'province')
                {!! Form::open(['route' => 'admin.province.store', 'class' => 'form-horizontal']) !!}
                        @includeIf('provinces._form-create')
                {!! Form::close() !!}
            @elseif($menu === 'city')
                {!! Form::open(['route' => 'admin.city.store', 'class' => 'form-horizontal']) !!}
                        @includeIf('cities._form-create')
                {!! Form::close() !!}
            @endif