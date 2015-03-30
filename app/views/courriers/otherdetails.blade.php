<div class="form-group required">
{{ Form::label('others', Lang::get('courriers.other_details'), ['class'=>'col-sm-3 control-label'])}}
<div>
  {{ Form::textarea( 'details', NULL,
  					['class'=>'string  required form-control',
  					'placeholder'=>'OTHER DETAILS',
  					'rows'=>5,
  					])}}
</div>
</div>