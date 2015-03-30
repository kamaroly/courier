@extends('layouts.default')

@section('title')
Urugendo - Katisha itike y'urugendo
@stop
@section('content')
<p class="intro">Saba itike y'urugendo wuzuza ibikurikira</p>
   {{ Form::open(array('url'      => 'confirm',
                      'METHOD'   => 'POST')) }}

      <div class="btns row">
         <div class="hero-features">
          <div class="hero-features-left col-md-4">
           <p class="intro" style="font-size:22px;">Uko dukora</p>
           <img src="assets/images/steps-for-website.jpg" style="width:360px;padding-top:10px;">
          </div>
          <div class="hero-features-left col-md-4">
            <div class="form-group {{ ($errors->has('names')) ? 'has-error' : '' }}">
             <label for="names" class="control-label">Amazina</label>
                    <div>
                    {{ Form::text('names',(isset($old)==true)  ? $old['names']  : null, array('class' => 'form-control', 
                                                      'placeholder' => 'Amazina ')
                                                  ) }}
                    {{ $errors->first('names','<span class="error">:message</span>')}}                 
                    </div> 
            </div>
            
            <div class="form-group {{ ($errors->has('email')) ? 'has-error' : '' }}">
             <label for="email" class="control-label">E-mail</label>
                    <div>
                    {{ Form::text('email',(isset($old)==true)  ? $old['email']  : null, array('class' => 'form-control', 
                                                      'placeholder' => 'E-mail')
                                                  ) }}
                    {{ $errors->first('email','<span class="error">:message</span>')}}                 
                    </div> 
            </div>
            
            <div class="form-group {{ ($errors->has('telephone')) ? 'has-error' : '' }}">
             <label for="telephone" class="control-label">Telefone <i style="text-transform:capitalize;font-size:10px;font-weight:550;">(Igomba kuba iya TIGO, MTN cg Airtel itangizwa na 07)</i></label>
                    <div>
                    {{ Form::text('telephone',(isset($old)==true) ? $old['telephone'] : null, array('class' => 'form-control', 
                                                      'placeholder' => 'Telefone ')
                                                  ) }}

                    {{ $errors->first('telephone','<span class="error">:message</span>')}}                 
                    
                    </div> 
            </div>

            <div class="form-group {{ ($errors->has('date')) ? 'has-error' : '' }}">
             <label for="date" class="control-label">Italiki</label>
                    <div>
                    {{ Form::text('date',(isset($old)==true) ? $old['date'] : null, 
                                                 ['class'       => 'form-control', 
                                                  'id'          => 'date',
                                                  'placeholder' => 'Italiki '
                                                  ]
                                                  )}}
                    {{ $errors->first('date','<span class="error">:message</span>')}}                 
                    </div>           
            </div>
        </div>
       <div class="hero-features-right col-md-4">
         <div class="form-group {{ ($errors->has('time')) ? 'has-error' : '' }}">
             <label for="time" class="control-label">Isaha</label>
                    <div>
                    <select name="time" class="form-control">
                      @foreach($times as $time)
                        <option {{(Input::old('time')==$time->time)?'selected':''}}> {{ $time->time}}</option>
                      @endforeach
                    </select>
                    {{ $errors->first('time','<span class="error">:message</span>')}}                 
                    </div>           
            </div>
     
            <div class="form-group {{ ($errors->has('start_route')) ? 'has-error' : '' }}">
             <label for="start_route" class="control-label">Aho uva</label>
                    <div >
                      <select name="start_route" class="form-control">
                      @foreach($start_routes as $start_route)
                        <option> {{ $start_route->start_route}}</option>
                      @endforeach
                    </select>
                    {{ $errors->first('start_route','<span class="error">:message</span>')}}                 
                    </div> 
            </div>
            
            <div class="form-group {{ ($errors->has('end_route')) ? 'has-error' : '' }}">
             <label for="end_route" class="control-label">Aho ugiye</label>
                    <div >
                    <select name="end_route" class="form-control">
                      @foreach($end_routes as $end_route)
                        <option> {{ $end_route->end_route}}</option>
                      @endforeach
                    </select>
                    {{ $errors->first('end_route','<span class="error">:message</span>')}}                 
                    </div> 
            </div>

            <div class="form-group {{ ($errors->has('travelling_company')) ? 'has-error' : '' }}">
             <label for="travelling_company" class="control-label">Companyi</label>
                    <div >
                     <select name="travelling_company" class="form-control">
                        <option>Hitamo i kompanyi </option>
                      @foreach($company as $company)
                        <option  {{(Input::old('travelling_company')==$company->travelling_company)?'selected':''}}> {{ $company->travelling_company}}</option>
                      @endforeach
                    </select>
                    {{ $errors->first('travelling_company','<span class="error">:message</span>')}}                 
                  </div>           
            </div>
                 <input type="hidden" name="count_seat" value="1">
                </div>
            </div>
           <div class="hero-features-right col-md-4 col-md-offset-4">
                <input type="submit" class="btn btn-cta-secondary" value="Emeza itike">
           <br />
           </div>
        </div>
     {{ Form::close() }}
   
@stop