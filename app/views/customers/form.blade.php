
<div class="form-group required">
                      {{ Form::label('name', Lang::get('courriers.names'), ['class'=>'col-sm-3 control-label'])}}
                      
                      <div class="col-sm-9">
                          {{ Form::text( $type.'names', $customer->names, 
                                         ['class'=>'string required form-control',
                                          'placeholder'=>'Names'
                                          ])}}
                      </div>
                  </div>

                  <div class="form-group required">
                      {{ Form::label('phone', Lang::get('courriers.telephone'), ['class'=>'col-sm-3 control-label'])}}
                      <div class="col-sm-9">
                          {{ Form::text( $type.'telephone', $customer->telephone, 
                                         ['class'=>'string  required form-control',
                                         'placeholder'=>'phone'

                                         ])}}
                      </div>
                  </div>
                  
                  <div class="form-group required">
                      {{ Form::label('email', Lang::get('courriers.email'), ['class'=>'col-sm-3 control-label'])}}
                      <div class="col-sm-9">
                          {{ Form::text( $type.'email', $customer->email,
                                         ['class'=>'string  required form-control',
                                         'placeholder'=>'email'
                                         ])}}
                      </div>
                  </div>
                  
                  <div class="form-group required">
                      {{ Form::label('street_number', Lang::get('courriers.street_number'), ['class'=>'col-sm-3 control-label'])}}
                      <div class="col-sm-9">
                          {{ Form::text( $type.'street_number', $customer->street_number, ['class'=>'string  required form-control','placeholder'=>'Street Number'])}}
                      </div>
</div>  