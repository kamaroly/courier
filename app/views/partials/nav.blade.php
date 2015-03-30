    <!-- ******HEADER****** --> 
    <header id="header" class="header navbar-fixed-top" style="background-color:{{ ((Request::is('courriers*') || Request::is('/'))?'#333':'#2b3e50') }}">  
        <div class="container">            
            <h1 class="logo pull-left" style="padding-right:20px;">
                <a  href="{{Url()}}">
                    <span class="logo-title">Urugendo.<span style="color:#c9c9c9">rw</span>
                </a>
            </h1><!--//logo-->              
            <nav id="main-nav" class="main-nav" role="navigation">
                <div class="navbar-header">
                    <button class="navbar-toggle" type="button" data-toggle="collapse" data-target="#navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button><!--//nav-toggle-->
                </div><!--//navbar-header-->            
                <div class="navbar-collapse collapse" id="navbar-collapse">
                    <ul class="nav navbar-nav" style="border-left:1px solid #eaeaea;padding-left:20px;">
                            
                        <li class="nav-item  {{ ((Request::is('courriers*') || Request::is('/')) ? 'active"style="background-color:#eaeaea"' : '"') }}" >
                            <a  href="/courriers">Courier</a>
                        </li>
                        <li class="nav-item {{ (Request::is('bus*') ? 'active"style="background-color:#eaeaea"' : '"') }}"><a  href="/bus">Bus</a></li>    
                        @if(Request::is('courriers*') || Request::is('/'))
                        <li class="nav-item" style="margin-right:0px;">
                        <a  href="{{route('language.select',['kin'])}}" style="font-size:14px;font-weight:200;margin-right:0px;">
                            <img src="{{ Url() }}/assets/images/flag_rw.gif"> Kinyarwanda</a>
                     </li>
                     <li class="nav-item" >
                        <a  href="{{route('language.select',['en'])}}" style="font-size:14px;font-weight:200;">
                            <img src="{{ Url() }}/assets/images/flag_en.gif"> English</a>
                     </li>
                     @endif
                    </ul><!--//nav-->

                    <ul class="nav navbar-nav navbar-right">
               
                       <li class="nav-item {{ (Request::is('abo-turibo*') ? 'active' : '') }}"><a  href="abo-turibo">{{ Lang::get('courriers.aboutus') }}</a></li>
                        <!-- <li class="nav-item {{ (Request::is('ubufasha*') ? 'active' : '') }}"><a  href="ubufasha">Ubufasha</a></li>                         -->
                        <li class="nav-item  {{ (Request::is('ubufasha*') ? 'active' : '') }}"><a  href="ubufasha">{{ Lang::get('courriers.support') }}</a></li>
                    </ul><!--//nav-->
                </div><!--//navabr-collapse-->
            </nav><!--//main-nav-->
        </div>
    </header><!--//header-->