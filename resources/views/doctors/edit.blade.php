@extends('layouts.app')
{{-- <div class="modal" id="modal-edit"> --}}
    {{-- <div class="modal-dialog modal_custom hospital"> --}}
        {{-- <div class="modal-content"> --}}
            {{-- <div class="modal-header green_box_custom"> --}}
                {{-- <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button> --}}
                {{-- <h4 class="modal-title">Doctor</h4> --}}
            </div>
            <div class="modal_body">
                     {!! Form::model($doctor, ['route' => ['admin.doctor.update', $doctor], 'class' => 'form-horizontal', 'files' => true, 'method' => 'patch']) !!}
                        @include('doctors._form-edit')
                    {!! Form::close() !!}
            </div>
        {{-- </div> --}}
    {{-- </div> --}}
{{-- </div> --}}
