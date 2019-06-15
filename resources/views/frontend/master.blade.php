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
    @include('layouts.sideMenu')
    <!-- /Header + Mobile Header -->
    <!-- Main Content -->
    <div id="main" class="site-main">
        <!-- Page changer wrapper -->
        <div class="pt-wrapper">
            <!-- Subpages -->
            <div class="subpages">
                <!-- Home Subpage -->
                <section class="pt-page pt-page-1 section-with-bg section-paddings-0" style="background-image: url({{asset('org/sunshine/images')}}/home_page_bg_1.jpg);" data-id="home">
                    @include('frontend.home')
                </section>
                <!-- End of Home Subpage -->

                <!-- About Me Subpage -->
                <section class="pt-page pt-page-2" data-id="about_me">
                    @include('frontend.aboutMe')
                </section>
                <!-- End of About Me Subpage -->

                <!-- Resume Subpage -->
                <section class="pt-page pt-page-3" data-id="resume">
                    @include('frontend.resume')
                </section>
                <!-- End Resume Subpage -->

                <!-- Portfolio Subpage -->
                <section class="pt-page pt-page-4" data-id="portfolio">
                    @include('frontend.portfolio')
                </section>
                <!-- /Portfolio Subpage -->

                <!-- Blog Subpage -->
                <section class="pt-page pt-page-5" data-id="blog">
                    <div class="section-title-block">
                        <h2 class="section-title">Blog</h2>
                        <h5 class="section-description">My Diary</h5>
                    </div>
                    <div class="blog-masonry">
                        <!-- Blog Post 1 -->
                        <div class="item">
                            <div class="blog-card">
                                <div class="media-block">
                                    <a href="blog-post-1.html">
                                        <img class="post-image img-responsive" src="{{asset('org/sunshine/images')}}/blog/blog_post_1.jpg" alt="blog-post-1" />
                                        <div class="mask"></div>
                                        <div class="post-date"><span class="day">6</span><span class="month">Dec</span><!--<span class="year">2016</span>--></div>
                                    </a>
                                </div>
                                <div class="post-info">
                                    <ul class="category">
                                        <li><a href="#">Travel</a></li>
                                    </ul>
                                    <a href="blog-post-1.html"><h4 class="blog-item-title">Bootstrap is the Most Popular Framework</h4></a>
                                </div>
                            </div>
                        </div>
                        <!-- End of Blog Post 1 -->

                        <!-- Blog Post 2 -->
                        <div class="item">
                            <div class="blog-card">
                                <div class="media-block">
                                    <a href="blog-post-1.html">
                                        <img class="post-image img-responsive" src="{{asset('org/sunshine/images')}}/blog/blog_post_2.jpg" alt="blog-post-2" />
                                        <div class="mask"></div>
                                        <div class="post-date"><span class="day">3</span><span class="month">Nov</span><!--<span class="year">2016</span>--></div>
                                    </a>
                                </div>
                                <div class="post-info">
                                    <ul class="category">
                                        <li><a href="#">jQuery</a></li>
                                    </ul>
                                    <a href="blog-post-1.html"><h4 class="blog-item-title">One Framework, Every Device</h4></a>
                                </div>
                            </div>
                        </div>
                        <!-- End of Blog Post 2 -->

                        <!-- Blog Post 3 -->
                        <div class="item">
                            <div class="blog-card">
                                <div class="media-block">
                                    <a href="blog-post-1.html">
                                        <img class="post-image img-responsive" src="{{asset('org/sunshine/images')}}/blog/blog_post_3.jpg" alt="blog-post-3" />
                                        <div class="mask"></div>
                                        <div class="post-date"><span class="day">12</span><span class="month">Oct</span><!--<span class="year">2016</span>--></div>
                                    </a>
                                </div>
                                <div class="post-info">
                                    <ul class="category">
                                        <li><a href="#">Sport</a></li>
                                    </ul>
                                    <a href="blog-post-1.html"><h4 class="blog-item-title">Designed for Everyone, Everywhere</h4></a>
                                </div>
                            </div>
                        </div>
                        <!-- End of Blog Post 3 -->

                        <!-- Blog Post 4 -->
                        <div class="item">
                            <div class="blog-card">
                                <div class="media-block">
                                    <a href="blog-post-1.html">
                                        <img class="post-image img-responsive" src="{{asset('org/sunshine/images')}}/blog/blog_post_4.jpg" alt="blog-post-4" />
                                        <div class="mask"></div>
                                        <div class="post-date"><span class="day">18</span><span class="month">Aug</span><!--<span class="year">2016</span>--></div>
                                    </a>
                                </div>
                                <div class="post-info">
                                    <ul class="category">
                                        <li><a href="#">CSS</a></li>
                                    </ul>
                                    <a href="blog-post-1.html"><h4 class="blog-item-title">An Introduction To PostCSS</h4></a>
                                </div>
                            </div>
                        </div>
                        <!-- End of Blog Post 4 -->

                        <!-- Blog Post 5 -->
                        <div class="item">
                            <div class="blog-card">
                                <div class="media-block">
                                    <a href="blog-post-1.html">
                                        <img class="post-image img-responsive" src="{{asset('org/sunshine/images')}}/blog/blog_post_5.jpg" alt="blog-post-5" />
                                        <div class="mask"></div>
                                        <div class="post-date"><span class="day">2</span><span class="month">Jul</span><!--<span class="year">2016</span>--></div>
                                    </a>
                                </div>
                                <div class="post-info">
                                    <ul class="category">
                                        <li><a href="#">CSS3</a></li>
                                    </ul>
                                    <a href="blog-post-1.html"><h4 class="blog-item-title">Original and Innovative Web Layouts</h4></a>
                                </div>
                            </div>
                        </div>
                        <!-- End of Blog Post 5 -->

                        <!-- Blog Post 6 -->
                        <div class="item">
                            <div class="blog-card">
                                <div class="media-block">
                                    <a href="blog-post-1.html">
                                        <img class="post-image img-responsive" src="{{asset('org/sunshine/images')}}/blog/blog_post_6.jpg" alt="blog-post-6" />
                                        <div class="mask"></div>
                                        <div class="post-date"><span class="day">8</span><span class="month">May</span><!--<span class="year">2016</span>--></div>
                                    </a>
                                </div>
                                <div class="post-info">
                                    <ul class="category">
                                        <li><a href="#">HTML5</a></li>
                                    </ul>
                                    <a href="blog-post-1.html"><h4 class="blog-item-title">Creative and Innovative Navigation Designs</h4></a>
                                </div>
                            </div>
                        </div>
                        <!-- End of Blog Post 6 -->

                        <!-- Blog Post 7 -->
                        <div class="item">
                            <div class="blog-card">
                                <div class="media-block">
                                    <a href="blog-post-1.html">
                                        <img class="post-image img-responsive" src="{{asset('org/sunshine/images')}}/blog/blog_post_7.jpg" alt="blog-post-7" />
                                        <div class="mask"></div>
                                        <div class="post-date"><span class="day">7</span><span class="month">Apr</span><!--<span class="year">2016</span>--></div>
                                    </a>
                                </div>
                                <div class="post-info">
                                    <ul class="category">
                                        <li><a href="#">Design</a></li>
                                    </ul>
                                    <a href="blog-post-1.html"><h4 class="blog-item-title">Navigation for Mega-Sites</h4></a>
                                </div>
                            </div>
                        </div>
                        <!-- End of Blog Post 7 -->

                        <!-- Blog Post 8 -->
                        <div class="item">
                            <div class="blog-card">
                                <div class="media-block">
                                    <a href="blog-post-1.html">
                                        <img class="post-image img-responsive" src="{{asset('org/sunshine/images')}}/blog/blog_post_8.jpg" alt="blog-post-8" />
                                        <div class="mask"></div>
                                        <div class="post-date"><span class="day">21</span><span class="month">Mar</span><!--<span class="year">2016</span>--></div>
                                    </a>
                                </div>
                                <div class="post-info">
                                    <ul class="category">
                                        <li><a href="#">CSS3</a></li>
                                    </ul>
                                    <a href="blog-post-1.html"><h4 class="blog-item-title">Front-End Challenge Accepted: CSS 3D Cube</h4></a>
                                </div>
                            </div>
                        </div>
                        <!-- End of Blog Post 8 -->
                    </div>
                </section>
                <!-- End Blog Subpage -->

                <!-- Contact Subpage -->
                <section class="pt-page pt-page-6" data-id="contact" >
                    @include('frontend.contact')
                </section>
                <!-- End Contact Subpage -->
            </div>
        </div>
        <!-- /Page changer wrapper -->
    </div>
    <!-- /Main Content -->
</div>
@include('layouts.foot')
{{--@include('layout.message')--}}
@stack('js')
</body>
</html>
