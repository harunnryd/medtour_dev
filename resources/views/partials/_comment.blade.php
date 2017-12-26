<div class="modal" id="modal-create">
    <div class="modal-dialog modal_custom">
        <div class="modal-content">
            <div class="modal-header green_box_custom">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title">Comment</h4>
            </div>
            <div class="modal_body">
            {!! Form::open(['route' => 'user.rating.store', 'class' => 'form-horizontal']) !!}
                {!! Form::hidden('doctor_slug', $doctor['slug']) !!}
                <span class="rating sm">
                  <input id="rating5" type="radio" name="rating" value="5">
                  <label for="rating5">5</label>
                  <input id="rating4" type="radio" name="rating" value="4">
                  <label for="rating4">4</label>
                  <input id="rating3" type="radio" name="rating" value="3">
                  <label for="rating3">3</label>
                  <input id="rating2" type="radio" name="rating" value="2" checked>
                  <label for="rating2">2</label>
                  <input id="rating1" type="radio" name="rating" value="1">
                  <label for="rating1">1</label>
                </span>
                {!! Form::textarea('comment', null, ['class' => 'col-md-12 control-label']) !!}

                <div class="row">
                	<div class="box_btn_custom green_box_custom">
                		<div class="btn-save-admin_custom">
                			 {!! Form::submit('Send', ['class' => 'btn btn-primary']) !!}
                			<span>
                				<input type="submit" value="Cancel" class="btn btn-primary btn-sm" data-dismiss="modal" aria-hidden="true">
                			</span>


                		</div>

                	</div>
                </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>
</div>
