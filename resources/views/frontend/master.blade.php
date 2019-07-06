<!DOCTYPE html>
<html lang="en" class="no-js">
<!-- Head Links-->
@include('layouts.head')
<!-- Head Links-->
<body>
<!-- Loading animation -->
@include('layouts.loading')
<!-- /Loading animation -->
<div id="page" class="page">
    <!-- Header + Mobile Header -->
    <div id="frontMenu" v-cloak="">
        <front-vue-menu></front-vue-menu>
        {{--    @include('layouts.sideMenu')--}}
    </div>
{{--    @include('layouts.sideMenu')--}}
<!-- /Header + Mobile Header -->
    <!-- Main Content -->
    <div id="main" class="site-main">
        <!-- Page changer wrapper -->
        <div id="frontApp" class="pt-wrapper" v-cloak="">
            <!-- Subpages -->
            <div class="subpages">
                <!-- Home Subpage -->
                <section id="homeSection" data-id="home" class="pt-page pt-page-1 section-with-bg section-paddings-0"
                         :style="{'background-image': 'url(' + background.url + ')'}">
                    {{--@include('frontend.home')--}}
                    <front-vue-home></front-vue-home>

                </section>

                <!-- End of Home Subpage -->

                <!-- About Me Subpage -->
                <section class="pt-page pt-page-2" data-id="about_me">
                    <front-vue-about-me></front-vue-about-me>

                    {{--@include('frontend.aboutMe')--}}
                </section>
                <!-- End of About Me Subpage -->

                <!-- Resume Subpage -->
                <section class="pt-page pt-page-3" data-id="resume">
                    <front-vue-resume></front-vue-resume>
                    {{--@include('frontend.resume')--}}
                </section>
                <!-- End Resume Subpage -->

                <!-- Portfolio Subpage -->
                <section class="pt-page pt-page-4" data-id="portfolio">
                    @include('frontend.portfolio')
                </section>
                <!-- /Portfolio Subpage -->

                <!-- Contact Subpage -->
                <section class="pt-page pt-page-6" data-id="contact">
                    <front-vue-contact></front-vue-contact>

                </section>
                <!-- End Contact Subpage -->
            </div>
        </div>
        <!-- /Page changer wrapper -->
    </div>
    <!-- /Main Content -->
    <div id="vueMenu"></div>
    <div id="vueApp"></div>
</div>
@include('layouts.foot')
{{--@include('layout.message')--}}
@stack('js')
</body>
</html>
