<?php

Route::get('test',function()
    {
        Mail::send('emails.booking', [], function($message)
            {
                $message->to('kamaroly@gmail.com')
                        ->subject('Urugendo');
            });
    });

Route::get('/',['as'=>'home',function()
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


// Administrator routes 

Route::group(['prefix'  =>  'admin','before'=>'Sentinel\hasAccess:admin'],function()
    {
        Route::get('/','ReservesController@index');

        Route::get('reservations','ReservesController@index');

        Route::get('approve/{route}/{approve}','ReservesController@approve');

        // Route Controllers 
        Route::group(['prefix'  =>  'routes'],function(){

            Route::get('/',['as'    => 'routeshome','uses'  =>  'RoutesController@index']);

            Route::get('/modify/{routeid}','RoutesController@edit');

            Route::post('/modify/{routeid}','RoutesController@update');

            Route::get('/add','RoutesController@create');
            Route::post('/add','RoutesController@store');

            Route::get('/remove/{routeid}','RoutesController@destroy');

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
 /////////////
// ERRORS  //
/////////////
App::missing(function($exception)
{
    return Response::view('errors.404', array('url' => Request::url()), 404);
});