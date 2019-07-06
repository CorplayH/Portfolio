<template>
    <div>
        <header id="site_header" class="header mobile-menu-hide">

                <div class="my-photo">
                    <img :src="showDetail.image" alt="image">
                    <div class="mask"></div>
                </div>

                <div class="site-title-block">
                    <h1 class="site-title">{{showDetail.name}}</h1>
                    <p class="site-description">{{showDetail.titles[0].title}}</p>
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
                        <a class="pt-trigger" href="#portfolio" data-animation="60" data-goto="4">Portfolio</a>
                    </li>
                    <li>
                        <a class="pt-trigger" href="#contact" data-animation="58" data-goto="5">Contact</a>
                    </li>
                </ul>
                <!-- /Main menu -->

                <!-- Social buttons -->
                <ul class="social-links">
                    <li><a class="tip social-button" target="_blank" :href="shareButton.twitter" title="Twitter"><i class="fa fa-twitter"></i></a></li>
                    <li><a class="tip social-button" target="_blank" :href="shareButton.facebook" title="Facebook"><i class="fa fa-facebook"></i></a></li>
                    <li><a class="tip social-button" target="_blank" :href="shareButton.linkedIn" title="fa-linkedIn"><i class="fa fa-linkedin"></i></a></li>
                </ul>
                <!-- /Social buttons -->

            </div>
            <!-- Navigation & Social buttons -->
        </header>
        <!-- /Header -->
        <!-- Mobile Header -->
        <div class="mobile-header mobile-visible">
            <div class="mobile-logo-container">
                <div class="mobile-site-title">{{detail.name}}</div>
            </div>
            <a class="menu-toggle mobile-visible">
                <i class="fa fa-bars"></i>
            </a>
        </div>
    </div>
</template>

<script>
    export default {
        name: "frontVueMenu.vue",
        data: function () {
            return {
                isActive: false,
                detail: {
                    // get in Created method
                    name: 'onLoad',
                    titles: [
                        {title: 'onLoad'},
                    ],
                },
                passwords: {
                    oldPassword: '',
                    newPassword: '',
                    newPassword_confirmation: '',
                },
                shareButton: {},
                AllData: [],
                showDetail: {}
            }
        },
        created() {
            this.getUserInfo();
            this.getShareButton();
            this.setShowDetail(this.detail);
        },
        methods: {
            getShareButton() {
                axios.get('/shareButton')
                    .then((res) => {
                        this.shareButton = res.data;
                    });
            },
            getUserInfo() {
                axios.get('/getUserInfo/' + this.$uToken)
                    .then((res) => {
                        this.detail = res.data;
                        // Assign uToken to user
                        this.detail.uToken = this.$uToken;
                        // emit Event Bus for global user
                        this.$eventHub.$emit('initUserInfo', this.detail);
                        this.setShowDetail(this.detail);
                    });
            },
            setShowDetail(arr) {
                // 赋值到不同的内存地址, 不会双向绑定
                this.showDetail = JSON.parse(JSON.stringify(arr));
            }
        }
    }
</script>

