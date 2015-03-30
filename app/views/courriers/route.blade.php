      @include('courrierroutes.form')

       <!--TYPE -->
         <div class="form-group col-md-12 row">
            <label class="col-md-2 control-label">{{ Lang::get('courriers.type') }} </label>
              <div class="col-md-9">
                         {{Form::select('type',CourrierRoute::lists('courrier_type','courrier_type'),
                                        isset($routedata)?$routedata['type']:NULL,
                                        ['class' => 'form-control col-md-12'])}}

                {{ $errors->first('type','<span class="error">:message</span>')}}  
              </div>
   
        </div>

         <!--Date -->
         <div class="form-group col-md-12 row">
            <label class="col-md-2 control-label">{{ Lang::get('courriers.pickup_date') }}</label>

            <div class="col-md-9">
                 <div class="col-sm-12">
        {{ Form::text('pickup_date',(isset($routedata)) ? $routedata['pickup_date'] : null, 
                                                  ['class'       => 'form-control', 
                                                  'id'          => 'date',
                                                  'placeholder' => 'Italiki '
                                                  ]
                                                  )}}
            {{ $errors->first('pickup_date','<span class="error">:message</span>')}}  
            </div>
        </div>
        </div>
         <!--Date -->
        <div class="form-group col-md-12 row">
            <label class="col-md-2 control-label">{{ Lang::get('courriers.pickup_time') }}</label>

             <div class="col-md-4">
              {{ Form::label('FromcityDropdown','Hours:',['class'=>'control-label second-lebel'])}}

              {{Form::select('time_hours',Courrier::getHours(),(isset($routedata)) ? $routedata['time_hours'] : null,
              ['class' =>'form-control'])}}
            </div>

            <div class="col-md-4">

              {{ Form::label('FromareasDropdown','Minutes:',['class'=>'control-label second-lebel'])}}

              {{Form::select('time_minutes',Courrier::$minutes,(isset($routedata)) ? $routedata['time_minutes'] : null,['class' => 'form-control'])}}

            </div>
           {{ $errors->first('pickup_time','<span class="error">:message</span>')}}  
        </div>