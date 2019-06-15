<header id="site_header" class="header mobile-menu-hide">

    <div class="my-photo">
        <img src="{{asset('org/sunshine/images')}}/my_photo.png" alt="image">
        <div class="mask"></div>
    </div>

    <div class="site-title-block">
        <h1 class="site-title">Alex Smith</h1>
        <p class="site-description">Web Designer</p>
    </div>
    <!-- Navigation & Social buttons -->
    <div class="site-nav">
        <!-- Main menu -->
        <ul id="nav" class="site-main-menu">
            <!-- About Me Subpage link -->
            <li>
                <a class="pt-trigger" href="#home" data-animation="58" data-goto="1">Home</a>
                <!-- href value = data-id without # of .pt-page. Data-goto is the number of section -->
            </li>
            <!-- /About Me Subpage link -->
            <!-- About Me Subpage link -->
            <li>
                <a class="pt-trigger" href="#about_me" data-animation="60" data-goto="2">About me</a>
            </li>
            <!-- /About Me Subpage link -->
            <li>
                <a class="pt-trigger" href="#resume" data-animation="59" data-goto="3">Resume</a>
            </li>
            <li>
                <a class="pt-trigger" href="#portfolio" data-animation="58" data-goto="4">Portfolio</a>
            </li>
            <li>
                <a class="pt-trigger" href="#contact" data-animation="60" data-goto="5">Contact</a>
            </li>
        </ul>
        <!-- /Main menu -->

        <!-- Social buttons -->
        <ul class="social-links">
            <li><a class="tip social-button" href="#" title="Twitter"><i class="fa fa-twitter"></i></a></li>
            <!-- Full list of social icons: http://fontawesome.io/icons/#brand -->
            <li><a class="tip social-button" href="#" title="Facebook"><i class="fa fa-facebook"></i></a></li>
            <li><a class="tip social-button" href="#" title="Google Plus"><i class="fa fa-google-plus"></i></a>
            </li>
            <!--<li><a class="tip social-button" href="#" title="Youtube"><i class="fa fa-youtube"></i></a></li>-->
            <!--<li><a class="tip social-button" href="#" title="last.fm"><i class="fa fa-lastfm"></i></a></li>-->
            <!--<li><a class="tip social-button" href="#" title="Dribbble"><i class="fa fa-dribbble"></i></a></li>-->
        </ul>
        <!-- /Social buttons -->
    </div>
    <!-- Navigation & Social buttons -->
</header>
<!-- /Header -->

<!-- Mobile Header -->
<div class="mobile-header mobile-visible">
    <div class="mobile-logo-container">
        <div class="mobile-site-title">Alex Smith</div>
    </div>

    <a class="menu-toggle mobile-visible">
        <i class="fa fa-bars"></i>
    </a>
</div>
