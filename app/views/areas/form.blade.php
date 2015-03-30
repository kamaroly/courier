           <div class="col-md-4">
              {{ Form::label('name','Select City',['class'=>'control-label second-lebel'])}} 
            
              {{ Form::select('city_id', $cities, $area->city_id, ['class' => 'form-control'])}}

              {{ $errors->first('city_id','<span class="error">:message</span>')}}  

            </div>
            <div class="col-md-4">
              {{ Form::label('name','Name',['class'=>'control-label second-lebel'])}} 
            
              {{ Form::text('name', $area->name,['class' => 'form-control'])}}

              {{ $errors->first('name','<span class="error">:message</span>')}}  

            </div>

            <div class="col-md-4">
              {{ Form::submit($button, ['class' => 'btn btn-success']) }}
            </div>

    