{!! Form::open(['route' => 'doctor.compare', 'method' => 'post', 'class' => 'form-inline']) !!}
    {!! Form::hidden('doctor_slug', $doctor['doctor_slug']) !!}
    {!! Form::button('<span class="glyphicon glyphicon-plus compare-btn-icon" aria-hidden="true"></span> Compare Doctor', array('type' => 'submit', 'class' => 'compare-btn-custom', 'data-confirm-message' => 'Kamu mau menambahkan ' . $doctor['name'] . ' ke comparison.')) !!}
{!! Form::close() !!}