<!-- FROM -->
        <div class="form-group col-md-11">
            <label class="col-md-2 control-label">{{ Lang::get('courriers.from')}}</label>

            <div class="col-md-4">
              {{ Form::label('FromcityDropdown',Lang::get('courriers.city'),['class'=>'control-label second-lebel'])}} 
              {{isset($routedata)?City::find($routedata['from_city'])->name:''}}
              {{Form::select('from.city',['Select city'],NULL,['class' => 'form-control','id'=>'FromcityDropdown'])}}

              {{ $errors->first('from_city','<span class="error">:message</span>')}}  

            </div>

            <div class="col-md-4">
              {{ Form::label('FromareasDropdown',Lang::get('courriers.area'),['class'=>'control-label second-lebel'])}}
              {{isset($routedata)?Area::find($routedata['from_area'])->name:''}}
               {{Form::select('from.area',['Select first area'],NULL,['class' => 'form-control','id'=>'FromareasDropdown'])}}

               {{ $errors->first('from_area','<span class="error">:message</span>')}}  
            </div>
        </div>

     <!--TO -->
         <div class="form-group col-md-11">
            <label class="col-md-2 control-label">{{Lang::get('courriers.to')}}</label>

            <div class="col-md-4 control-label">
              {{ Form::label('TocityDropdown',Lang::get('courriers.city'),['class'=>'control-label second-lebel'])}}
  
              {{isset($routedata)?City::find($routedata['to_city'])->name:''}}

              {{Form::select('to.city',['Select a City'],NULL,['class' => 'form-control','id'=>'TocityDropdown'])}}

               {{ $errors->first('to_city','<span class="error">:message</span>')}}  
            </div>

            <div class="col-md-4 control-label">
              {{ Form::label('from_city',Lang::get('courriers.area'),['class'=>'control-label second-lebel'])}}

              {{isset($routedata)?Area::find($routedata['to_area'])->name:''}}

              {{Form::select('to.area',['Select city first'],NULL,['class' => 'form-control','id'=>'ToareasDropdown'])}}

              {{ $errors->first('to_area','<span class="error">:message</span>')}}  
            </div>
        </div>