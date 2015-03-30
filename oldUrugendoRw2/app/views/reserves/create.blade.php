@extends('layouts.default')
@section('content')

   {{ Form::open(array('url'      => 'confirm',
                      'METHOD'   => 'POST',  
                      'class'    =>'form-horizontal')) }}
      <div class="row form-container">     
      <div class="span12">
        <h1>Saba itike y'urugendo wuzuza ibikurikira</h1>        
      </div>                   
        <div class="span6">
            <div class="form-group {{ ($errors->has('names')) ? 'has-error' : '' }}">
             <label for="names" class="control-label">Amazina</label>
                    <div class="col-sm-6">
                    {{ Form::text('names',(isset($old)==true)  ? $old['names']  : null, array('class' => 'form-control', 
                                                      'placeholder' => 'Amazina ')
                                                  ) }}
                    {{ $errors->first('names','<span class="error">:message</span>')}}                 
                    </div> 
            </div>
            
            <div class="form-group {{ ($errors->has('email')) ? 'has-error' : '' }}">
             <label for="email" class="control-label">E-mail</label>
                    <div class="col-sm-6">
                    {{ Form::text('email',(isset($old)==true)  ? $old['email']  : null, array('class' => 'form-control', 
                                                      'placeholder' => 'E-mail')
                                                  ) }}
                    {{ $errors->first('email','<span class="error">:message</span>')}}                 
                    </div> 
            </div>
            
            <div class="form-group {{ ($errors->has('telephone')) ? 'has-error' : '' }}">
             <label for="telephone" class="control-label">Telefone</label>
                    <div class="col-sm-6">
                    {{ Form::text('telephone',(isset($old)==true) ? $old['telephone'] : null, array('class' => 'form-control', 
                                                      'placeholder' => 'Telefone ')
                                                  ) }}
                    {{ $errors->first('telephone','<span class="error">:message</span>')}}                 
                    </div> 
            </div>

            <div class="form-group {{ ($errors->has('date')) ? 'has-error' : '' }}">
             <label for="date" class="control-label">Italiki</label>
                    <div class="col-sm-6">
                    {{ Form::text('date',(isset($old)==true) ? $old['date'] : null, array('class' => 'form-control', 
                                                      'placeholder' => 'Italiki ')
                                                  ) }}
                    {{ $errors->first('date','<span class="error">:message</span>')}}                 
                    </div>           
            </div>

            <div class="form-group {{ ($errors->has('time')) ? 'has-error' : '' }}">
             <label for="time" class="control-label">Isaha</label>
                    <div class="col-sm-6">
                    <select name="time" >
                      @foreach($times as $time)
                        <option> {{ $time->time}}</option>
                      @endforeach
                    </select>
                    {{ $errors->first('time','<span class="error">:message</span>')}}                 
                    </div>           
            </div>
        </div>
    
        <div class="span6">
            
            <div class="form-group {{ ($errors->has('start_route')) ? 'has-error' : '' }}">
             <label for="start_route" class="control-label">Aho uva</label>
                    <div class="col-sm-6">
                      <select name="start_route" >
                      @foreach($start_routes as $start_route)
                        <option> {{ $start_route->start_route}}</option>
                      @endforeach
                    </select>
                    {{ $errors->first('start_route','<span class="error">:message</span>')}}                 
                    </div> 
            </div>
            
            <div class="form-group {{ ($errors->has('end_route')) ? 'has-error' : '' }}">
             <label for="end_route" class="control-label">Aho ugiye</label>
                    <div class="col-sm-6">
                    <select name="end_route" >
                      @foreach($end_routes as $end_route)
                        <option> {{ $end_route->end_route}}</option>
                      @endforeach
                    </select>
                    {{ $errors->first('end_route','<span class="error">:message</span>')}}                 
                    </div> 
            </div>

            <div class="form-group {{ ($errors->has('travelling_company')) ? 'has-error' : '' }}">
             <label for="travelling_company" class="control-label">Companyi</label>
                    <div class="col-sm-6">
                     <select name="travelling_company" >
                      @foreach($company as $company)
                        <option> {{ $company->travelling_company}}</option>
                      @endforeach
                    </select>
                    {{ $errors->first('travelling_company','<span class="error">:message</span>')}}                 
                  </div>           
            </div>

            <div class="form-group {{ ($errors->has('count_seat')) ? 'has-error' : '' }}">
             <label for="count_seat" class="control-label">ingano yabagenda</label>
                    <div class="col-sm-6">
                    <select name="count_seat" >
                      @for($i=1;$i<=$count_seats;$i++)
                        <option> {{ $i }}</option>
                      @endfor
                    </select>
                    {{ $errors->first('count_seat','<span class="error">:message</span>')}}                 
                    </div>           
            </div>
        </div>

        <div class="span12">
            <div class="form-group">
                <input class="btn btn-primary btn-lg btn-block text-center" type="submit" value="Emeza itike ">
            </div>
        </div>
        </div> 
        {{ Form::close() }}

    @stop