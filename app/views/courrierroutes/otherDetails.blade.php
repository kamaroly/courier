<!-- FROM -->
        <div class="form-group col-md-11">
            <label class="col-md-2 control-label">Other Details</label>

            <div class="col-md-4">
              {{ Form::label('courrier_type','Courrier Type:',['class'=>'control-label second-lebel'])}} 
              {{isset($routedata)?City::find($routedata['from_city'])->name:''}}
              {{Form::text('courrier_type',$courrierroute->courrier_type,['class' => 'form-control','id'=>'courrier_type'])}}

              {{ $errors->first('courrier_type','<span class="error">:message</span>')}}  

            </div>

            <div class="col-md-4">
              {{ Form::label('fees','Fees:',['class'=>'control-label second-lebel'])}}
              {{isset($routedata)?Area::find($routedata['from_area'])->name:''}}
               {{Form::text('fees',$courrierroute->fees,['class' => 'form-control','id'=>'fees'])}}

               {{ $errors->first('fees','<span class="has-error">:message</span>')}}  
            </div>

             
        </div>
        <div class="form-group col-md-11">
            <div class="col-md-4 pull-right">
              {{ Form::submit($button, ['class'=>'btn btn-success'])}}
            </div>
       </div>