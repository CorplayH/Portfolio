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
    <div id="vueMenu" v-cloak="">
        <vue-menu></vue-menu>
        {{--    @include('layouts.sideMenu')--}}
    </div>
    <!-- /Header + Mobile Header -->
    <!-- Main Content -->
    <div id="main" class="site-main">
        <!-- Page changer wrapper -->
        <div id="vueApp" class="pt-wrapper" v-cloak="">
            <!-- Subpages -->
            <div class="subpages">
                <!-- Home Subpage -->
                <section data-id="home" class="pt-page pt-page-1 section-with-bg section-paddings-0"
                         :style="{'background-image': 'url(' + backGround.url + ')'}">
                    <a class="edit-data" @click.prevent="openModal($event)"
                       id="home-background">
                    </a>
                    {{--@include('backend.home')--}}
                    <vue-home></vue-home>
                    <div class="modal fade" id="home-background-modal" tabindex="-1" role="dialog"
                         style="display: none;">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                                <div class="modal-header block-title mb-3">
                                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                    </button>
                                </div>
                                <div class="col-xs-6 col-md-12 subpage-block">

                                    <div style="margin-top:0px; margin-bottom: 0px; ">
                                        <button id="background" class="btn-primary col-12" name="background-button"
                                                @click.prevent="uploadImage()">Upload image
                                        </button>
                                        <img :src="backGround.url" alt="background">
                                        <div class="mask"></div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="button btn-send btn-secondary" data-dismiss="modal"
                                            @click="cancel()">
                                        Cancel
                                    </button>
                                    <button type="submit" class="button btn-send" data-dismiss="modal" @click="save()">
                                        Save
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- End of Home Subpage -->
                <!-- About Me Subpage -->
                <section class="pt-page pt-page-2" data-id="about_me">
                    {{--@include('backend.aboutMe')--}}
                    <vue-about-me></vue-about-me>
                </section>
                <!-- End of About Me Subpage -->
                <!-- Resume Subpage -->
                <section class="pt-page pt-page-3" data-id="resume">
                    {{--@include('backend.resume')--}}
                    <vue-resume></vue-resume>
                </section>
                <!-- End Resume Subpage -->
                <!-- Portfolio Subpage -->
                <section class="pt-page pt-page-4" data-id="portfolio">
                    <vue-portfolio></vue-portfolio>
                </section>
                <!-- /Portfolio Subpage -->
                <!-- Contact Subpage -->
                <section class="pt-page pt-page-5" data-id="contact">
                    @include('backend.contact')
                </section>
                <!-- End Contact Subpage -->
            </div>
        </div>
        <!-- /Page changer wrapper -->
        <!-- /Main Content -->
    </div>
</div>
@include('layouts.foot')
@include('util.message')
@stack('js')
</body>
</html>
