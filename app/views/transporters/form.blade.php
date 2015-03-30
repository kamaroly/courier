    <div class="row">
       <!-- TYPE --> 
         <div class="form-group col-md-6">
            <label class="col-md-2 control-label">TYPE</label>

            <div class="col-md-9">
                 <div class="col-sm-12">
          {{ Form::select('type', ['Moto'=>'Moto','Normal'=>'Normal','Truck'=>'Truck'],$transporter->type,
                                  ['class'=>'form-control'])}}
            {{ $errors->first('type','<span class="error">:message</span>')}}  
            </div>
        </div>
        </div>

         <!--names -->
         <div class="form-group col-md-6">
            <label class="col-md-2 control-label">Names</label>

            <div class="col-md-9">
                 <div class="col-sm-12">
          {{ Form::text('name',$transporter->name,['class'=> 'form-control', 'placeholder' => 'Names '] )}}
            {{ $errors->first('name','<span class="error">:message</span>')}}  
            </div>
        </div>
        </div>
          <!-- NationAL ID -->
         <div class="form-group col-md-6">
            <label class="col-md-2 control-label">National ID </label>
            <div class="col-md-9">
                 <div class="col-sm-12">
            {{ Form::text('NID',$transporter->NID,['class' => 'form-control','placeholder' => 'National ID '])}}
            
            {{ $errors->first('NID','<span class="error">:message</span>')}}  
            </div>
        </div>
       </div>
    <!-- DRIVING LICENSE -->
      <div class="form-group col-md-6">
            <label class="col-md-2 control-label">Driving license </label>
            <div class="col-md-9">
                 <div class="col-sm-12">
            {{ Form::text('driving_license',$transporter->driving_license,['class' => 'form-control','placeholder' => 'Driving license '])}}
            
            {{ $errors->first('driving_license','<span class="error">:message</span>')}}  
            </div>
        </div>
         </div>
        <!-- JACKET NUMBER -->
        <div class="form-group col-md-6">
            <label class="col-md-2 control-label">Jacket Number </label>
            <div class="col-md-9">
                 <div class="col-sm-12">
            {{ Form::text('jacket_number',$transporter->jacket_number,['class' => 'form-control','placeholder' => 'Jacket Number'])}}
            
            {{ $errors->first('jacket_number','<span class="error">:message</span>')}}  
            </div>
        </div>
       </div>
          <!-- Phone -->
        <div class="form-group col-md-6">
            <label class="col-md-2 control-label">Telephone number </label>
            <div class="col-md-9">
                 <div class="col-sm-12">
            {{ Form::text('phone',$transporter->phone,['class' => 'form-control','placeholder' => 'Phone '])}}
            
            {{ $errors->first('phone','<span class="error">:message</span>')}}  
            </div>
        </div>
       </div>
          <!-- Alternative Phone -->
        <div class="form-group col-md-6">
            <label class="col-md-2 control-label">Alternative Phone </label>
            <div class="col-md-9">
                 <div class="col-sm-12">
            {{ Form::text('alternative_phone',$transporter->alternative_phone,['class' => 'form-control','placeholder' => 'Alternative Phone '])}}
            
            {{ $errors->first('alternative_phone','<span class="error">:message</span>')}}  
            </div>
        </div>
       </div>

        <!-- Location -->
        <div class="form-group col-md-6">
            <label class="col-md-2 control-label">Location </label>
            <div class="col-md-9">
                 <div class="col-sm-12">
            {{ Form::text('location',$transporter->location,['class' => 'form-control','placeholder' => 'Location'])}}
            
            {{ $errors->first('location','<span class="error">:message</span>')}}  
            </div>
        </div>
    </div>

        <!-- Button -->
        <div class="form-group col-md-6">
          {{ Form::submit($button, ['class'=>'btn btn-success'])}}
          </div>