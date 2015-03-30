            <div class="col-md-4">
              {{ Form::label('name','Name',['class'=>'control-label second-lebel'])}} 
            
              {{ Form::text('name', $city->name,['class' => 'form-control'])}}

              {{ $errors->first('name','<span class="error">:message</span>')}}  

            </div>

            <div class="col-md-4">
              {{ Form::submit($button, ['class' => 'btn btn-success']) }}
            </div>

    