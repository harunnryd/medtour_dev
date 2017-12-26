@extends('layouts.app')

<div class="modal" id="modal-create">
    <div class="modal-dialog modal_custom hospital">
        <div class="modal-content">
            <div class="modal-header green_box_custom">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title">Hopital</h4>
            </div>
            <div class="modal_body">

                    {!! Form::open(['route' => 'admin.hospital.store', 'class' => 'form-horizontal', 'files' => true]) !!}
                        @include('hospitals._form-create')
                    {!! Form::close() !!}

			</div>
        </div>
    </div>
</div>
@endsection
