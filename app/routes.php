<?php
Route::get('language/{lang}', 
           array(
                  'as' => 'language.select', 
                  'uses' => 'LanguageController@select'
                 )
          );
Route::get('/',['as' => 'home','uses'=>'CourrierBookController@welcome']);
Route::get('/bus',['as'=>'bus',function()
{   
    $start_routes	=	RoutesModel::select('start_route')->distinct()->get();
    $end_routes		=	RoutesModel::select('end_route')->distinct()->get();
    $times			= 	RoutesModel::select('time')->distinct()->get();
    $company		= 	RoutesModel::select('travelling_company')->distinct()->get();
    $count_seats	=	RoutesModel::max('numseats');

    return View::make('partials.promo')
                ->with('start_routes',$start_routes)
                ->with('end_routes',$end_routes)
                ->with('times',$times)
                ->with('company',$company)
                ->with('count_seats',$count_seats);
}]);

Route::post('confirm',['as'  =>  'confirmReserve','uses' =>  'ReservesController@confirm']);
Route::get('confirm',['as'  =>  'confirmReserve','uses' =>  'ReservesController@confirm']);

Route::get('book',['as'	=>	'booking','uses'	=>	'ReservesController@store']);


// Courrier Routes
Route::group(['prefix'=>'courriers'],function()
    {
            Route::get('/',['as' =>'courriers.index','uses'=>'CourrierBookController@welcome']);
            Route::post('/customer','CourrierBookController@registerCustomer');
            Route::post('/preconfirm','CourrierBookController@preConfirm');
            Route::get('/confirm',['as'=>'courriers.confirm','uses'=>'CourrierBookController@confirm']);
    });

// Administrator routes 
Route::group(['prefix'  =>  'admin','before'=>'Sentinel\hasAccess:admin'],function()
    {
        Route::get('/','ReservesController@index');

        Route::get('reservations','ReservesController@index');

        Route::get('approve/{route}/{approve}','ReservesController@approve');

        // Cities routes
        Route::resource('cities','CityController');
                // Cities routes
        Route::resource('areas','AreaController');

        // Route Controllers 
        Route::group(['prefix'  =>  'routes'],function(){

            Route::get('/',['as'    => 'routeshome','uses'  =>  'RoutesController@index']);

            Route::get('/modify/{routeid}','RoutesController@edit');

            Route::post('/modify/{routeid}','RoutesController@update');

            Route::get('/add','RoutesController@create');
            Route::post('/add','RoutesController@store');

            Route::get('/remove/{routeid}','RoutesController@destroy');

        });

        /////////////////////////////
        // courriers Admin routes  //
        /////////////////////////////
        Route::group(['prefix'=>'courriers'], function()
            {
                Route::resource('routes', 'CourrierRoutesController');

                Route::resource('transporters', 'TransportersController');

                Route::resource('customers', 'CustomersController');

            });
        
        Route::resource('courriers', 'CourriersController');
    });

////////////////
// API ROUTES //
////////////////
            Route::group(['prefix'=>'api'],function()
            {
                Route::get('cities', function()
                {
                 return  City::lists('name','id');
                });

                Route::get('/cities/{cityId}', function($cityId)
                {
                    return Area::where('city_id',$cityId)->lists('name','id');
                });
            });
            
//////////////////
// Other pages  //
//////////////////

Route::get('abo-turibo',function()
    {
        return View::make('partials.about');
    });
Route::get('ubufasha',function()
    {
        return View::make('partials.contact');
    });
Route::get('terms-conditions',function()
{
    return View::make('partials.termsconditions');
});
Route::get('privacy-conditions',function()
{
    return View::make('partials.privacy');
});


/////////////
// ERRORS  //
/////////////
App::missing(function($exception)
{
    return Response::view('errors.404', array('url' => Request::url()), 404);
});


// Other pages
 Route::get('/courrier',function()
    {
        return View::make('courriers.create');
    });