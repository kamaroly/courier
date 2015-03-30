<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->  
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->  
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->  
<head>
    <title>@yield('title')</title>
    <!-- Meta -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Urugendo.rw ni urubuga rwashyiriyeho abanyarwanda murwego rwo kuborohereza kugura amatike ya bus ya agense zirenze 20 aho bari hose">
    <meta name="author" content="Kamaro Lambert, Sharif Banamwana">   
    <link rel="shortcut icon" type="image/x-icon" href="/favicon.ico" /> 
    <link rel="shortcut icon" href="favicon.ico">  
<!--     <link href='http://fonts.googleapis.com/css?family=Lato:300,400,300italic,400italic' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'> 
 -->    <!-- Global CSS -->
    <link rel="stylesheet" href="{{Url()}}/assets/plugins/bootstrap/css/bootstrap.min.css">
    <!-- Plugins CSS -->    
    <link rel="stylesheet" href="{{Url()}}/assets/plugins/font-awesome/css/font-awesome.css">
    <link rel="stylesheet" href="{{Url()}}/assets/plugins/prism/prism.css">
    <!-- Theme CSS -->  
    <link id="theme-style" rel="stylesheet" href="{{Url()}}/assets/css/styles.css">
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head> 

<body data-spy="scroll">
    
    <!---//Facebook button code-->
    <div id="fb-root"></div>
    <script>(function(d, s, id) {
      var js, fjs = d.getElementsByTagName(s)[0];
      if (d.getElementById(id)) return;
      js = d.createElement(s); js.id = id;
      js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.0";
      fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>
    
   @include('partials.nav')
    
    <!-- ******PROMO****** -->
    <section id="promo" class="promo section offset-header">
        <div class="container text-center">
          @include('partials.notifications')

        @yield('content')
        
        </div><!--//container-->
        <div class="social-media" style="background-color:{{ ((Request::is('courriers*') || Request::is('/'))?'#333':'#2b3e50') }}">
            <div class="social-media-inner container text-center">
                <ul class="list-inline">
                <li><a href="{{Url()}}/privacy-conditions">Privacy Conditions</a></li>
                  <li><a href="{{Url()}}/terms-conditions"> Terms and Conditions </a></li>
                    <li class="twitter-follow"><a href="https://twitter.com/UrugendoRw" class="twitter-follow-button" data-show-count="false">Follow @UrugendoRw</a>
<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>
                    </li><!--//twitter-follow-->
                    <li class="twitter-tweet">
                        <a href="https://twitter.com/share" class="twitter-share-button" data-via="kamaroly" data-hashtags="urugendo">Tweet</a>
    <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>
                    </li><!--//twitter-tweet-->
                    <li class="facebook-like">
                         <div class="fb-like" data-href="https://www.facebook.com/pages/Urugendorw/1552910574947720?ref=br_tf" data-layout="button_count" data-action="like" 
                         data-show-faces="false" data-share="true"></div>
                    </li><!--//facebook-like-->

                </ul>
            </div>
        </div>
    </section><!--//promo-->
    

    <!-- Javascript -->          
    <script type="text/javascript" src="{{Url()}}/assets/plugins/jquery-1.11.1.min.js"></script>
    <script type="text/javascript" src="{{Url()}}/assets/plugins/jquery-migrate-1.2.1.min.js"></script>    
    <script type="text/javascript" src="{{Url()}}/assets/plugins/jquery.easing.1.3.js"></script>   
    <script type="text/javascript" src="{{Url()}}/assets/plugins/bootstrap/js/bootstrap.min.js"></script>     
    <script type="text/javascript" src="{{Url()}}/assets/plugins/prism/prism.js"></script>    
    <script type="text/javascript" src="{{Url()}}/assets/js/main.js"></script>   

    <script type="text/javascript" src="{{Url()}}/assets/js/jquery-1.4.1.min.js"></script>
    <script type="text/javascript" src="{{Url()}}/assets/js/app.js"></script>

    <script src="{{Url()}}/assets/js/datepickr.js"></script>  
    <script type="text/javascript">
            new datepickr('date', {
                'dateFormat': 'Y-m-d'
            });
            
        </script>  
<!-- ADROLL -->
<script type="text/javascript">
adroll_adv_id = "DYVC5QLNAVERTKIDCK3XML";
adroll_pix_id = "F6SLVGIIJ5CJDIV2HW4OMI";
(function () {
var oldonload = window.onload;
window.onload = function(){
   __adroll_loaded=true;
   var scr = document.createElement("script");
   var host = (("https:" == document.location.protocol) ? "https://s.adroll.com" : "http://a.adroll.com");
   scr.setAttribute('async', 'true');
   scr.type = "text/javascript";
   scr.src = host + "/j/roundtrip.js";
   ((document.getElementsByTagName('head') || [null])[0] ||
    document.getElementsByTagName('script')[0].parentNode).appendChild(scr);
   if(oldonload){oldonload()}};
}());
</script>
<!-- GOOGLE ANALYTICS -->
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-60492125-1', 'auto');
  ga('send', 'pageview');

</script>

</body>
</html> 