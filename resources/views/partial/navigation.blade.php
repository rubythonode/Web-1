<header class="navbar navbar-inverse white" role="banner">
      <div class="container">
        <div class="navbar-header">
            <button class="navbar-toggle" type="button" data-toggle="collapse" data-target=".bs-navbar-collapse">
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a href="index.html" class="navbar-brand">React</a>
        </div>
        
    <nav class="collapse navbar-collapse bs-navbar-collapse" role="navigation">
        <ul class="nav navbar-nav navbar-right">

            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                Home alts 
                <i class="fa fa-chevron-down"></i>
                </a>
                <ul class="dropdown-menu">
                <li><a href="index.html">Home 1 (Static)</a></li>
                <li><a href="index2.html">Home 2 (Current)</a></li>
                <li><a href="index3.html">Home 3 (Off-canvas menu)</a></li>
                </ul>
            </li>

            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                Showcase 
                <i class="fa fa-chevron-down"></i>
                </a>
                <ul class="dropdown-menu">
                <li><a href="features.html">Features</a></li>
                <li><a href="services.html">Services</a></li>
                </ul>
            </li>

            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                Pricing 
                <i class="fa fa-chevron-down"></i>
                </a>
                <ul class="dropdown-menu">
                <li><a href="pricing.html">Pricing charts</a></li>
                <li><a href="charts.html">Comparison tables</a></li>
                </ul>
            </li>

            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                More pages 
                <i class="fa fa-chevron-down"></i>
                </a>
                <ul class="dropdown-menu">
                <li><a href="aboutus.html">About us</a></li>
                <li><a href="contactus.html">Contact us</a></li>
                <li><a href="gallery.html">Gallery</a></li>
                <li><a href="portfolio.html">Portfolio</a></li>
                <li><a href="portfolio-item.html">Portfolio Item</a></li>
                <li><a href="invoice.html">Invoice page</a></li>
                <li><a href="timeline.html">Timeline Page</a></li>
                <li><a href="docs.html">API Documentation</a></li>
                <li><a href="support.html">Support</a></li>
                <li><a href="coming-soon.html">Coming Soon</a></li>
                <li><a href="status.html">Status</a></li>
                <li><a href="signup.html">Sign Up & Sign In</a></li>
                <li><a href="signup-rotate.html">Sign Up Miscellaneous</a></li>
                <li><a href="404.html">404 Page</a></li>
                </ul>
            </li>

            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                Blog 
                <i class="fa fa-chevron-down"></i>
                </a>
                <ul class="dropdown-menu">
                <li><a href="blog.html">Blog</a></li>
                <li><a href="blogpost.html">Blog Post</a></li>
                </ul>
            </li>

            @if (!Auth::user())
                <li>
                    <a href="/auth/login" class="signup visible-lg">{{ trans('globals.sign_in_label') }}</a>
                    <a href="/auth/login" class="visible-md visible-xs visible-sm">{{ trans('globals.sign_in_label') }}</a>
                </li>

                <li>
                    <a href="/auth/register" class="signup visible-lg">{{ trans('globals.sign_up_label') }}</a>
                    <a href="/auth/register" class="visible-md visible-sm visible-xs">{{ trans('globals.sign_up_label') }}</a>
                </li>
            @else
                <li>
                    <a href="/auth/logout" class="signup visible-lg">{{ trans('globals.sign_out_label') }}</a>
                    <a href="/auth/logout" class="visible-md visible-sm visible-xs">{{ trans('globals.sign_out_label') }}</a>
                </li>
            @endif

        </ul>
    </nav>


      </div>
  </header>