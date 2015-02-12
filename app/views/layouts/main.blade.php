<!DOCTYPE html>

<html lang="en">
	<head>
		<title>{{{ $pageTitle or 'Laravel Base With Twitter Bootstrap' }}}</title>

		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		@if (isset($metaDescription))
			<meta name="description" content="{{ $metaDescription }}" />
		@endif

		@if (isset($metaAuthor))
		    <meta name="author" content="{{ $metaAuthor }}" />
		@endif
		        
		@if (isset($metaGoogleVerify))
		    <meta name="google-site-verification" content="" />
		@endif

		<link href="/favicon.ico" rel="icon" type="image/x-icon" />     
		{{ HTML::style('css/bootstrap.min.css'); }}
		{{ HTML::style('css/bootstrap-theme.min.css'); }}
        {{ HTML::style('css/extras.min.css'); }}

		@yield('head')
	</head>
	<body>
		<nav class="navbar-inverse navbar-default navbar-fixed-top" role="navigation">
		    <div class="container-fluid">
                <div class="navbar-header">
    		        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#main-navbar-collapse-1">
    		            <span class="sr-only">Toggle navigation</span>
    		            <span class="icon-bar"></span>
    		            <span class="icon-bar"></span>
    		            <span class="icon-bar"></span>
    		        </button>
    		        <a href="/" class="navbar-brand">Laravel Base</a>
    		    </div>
    		    
    		    <div class="collapse navbar-collapse" id="main-navbar-collapse-1">
    		        <ul class="nav navbar-nav">
                        <li class="active">
                            <a href="#" target="_blank">Blog</a>
                        </li>
            		</ul>
                     <ul class="nav navbar-nav navbar-right">
                        @if(Auth::check())
                            <li>
                                {{ link_to_route('logout.get', 'Logout'); }}
                            </li>
                        @else
                            <li class="{{{ isset($active) && $active === 'login' ? 'active' : 'none' }}}">
                                {{ link_to_route('login.get', 'Login'); }}
                            </li>
                        @endif
                    </ul>1
        		</div><!--/.nav-collapse -->
            </div><!-- /.container-fluid -->
		</nav>

		<div class="container">
            <a href="#top" id="toTop"></a>

			@yield('sidebar')

        	@yield('content')
        
			<footer id="layout-footer">
	            <hr>
	            <div class="row">
	                <div class="col-lg-12 clearfix">
	                    <div>
	                        <a href="#" target="_blank"><small>Terms of Use</small></a>
	                        &nbsp;
	                        <a href="#" target="_blank"><small>Privacy Policy</small></a>
	                        &nbsp;
	                        <a href="#" class="pull-right"><small>Contact</small></a>
	                    </div>
	                </div>
	            </div>
	            
	            <div class="row">
	                <div class="col-lg-12 text-center">
	                    &copy; {{ date('Y') }} ChangeMe.com
	                </div>
	            </div>
	        </footer>
	    </div>

        {{ HTML::script('js/jquery-2.1.3.min.js') }}
        {{ HTML::script('js/bootstrap.min.js') }}
        {{ HTML::script('js/angular.min.js') }}
        {{ HTML::script('js/jquery.scrollToTop.min.js') }}

        <script type="text/javascript">
            $(function() {
                $("#toTop").scrollToTop(800);
            });
        </script>

        @yield('javascripts')
    </body>
</html>