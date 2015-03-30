<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Urugendo</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css" />    
    <link rel="stylesheet" href="css/m-buttons.min.css" type="text/css" />   
    <link rel="stylesheet" href="css/m-icons.min.css" type="text/css" />    
    <link rel="stylesheet" href="css/styles.min.css" type="text/css" /> 
    <base href="/" />    	 
</head>
<body>    
    <div class="navbar">
        <div class="navbar-inner">
            <div class="container">            
                <a href="/" class="brand"><img src="urugendo.png"></a>       
                <ul class="nav">
                    <li class="active"><a href="/">Ahabanza </a></li>
                    <li><a href="#">Duhamagare kuri +250722000480</a></li>
                </ul>            
            </div>
        </div>
    </div>

    <header class="header">    
        <div class="container">   
            @include('partials.notifications')
            @yield('content')       
        </div>
    </header>
    

    <footer class="container">    
        <div class="row">       
            <div class="span2">
               
            </div>
   
        </div>
    </footer>
    
</body>
<script src="{{ asset('packages/rydurham/sentinel/js/jquery-2.0.2.min.js') }}"></script>
 <script src="{{ asset('packages/rydurham/sentinel/js/bootstrap.min.js') }}"></script>
<script src="{{ Url() .'/js/datepickr.js' }}"></script>
<script type="text/javascript">
			new datepickr('datepick2', {
				'dateFormat': 'Y-m-d'
			});
			
		</script>
</html>