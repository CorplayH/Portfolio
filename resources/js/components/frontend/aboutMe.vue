<template>
    <div>
        <div class="section-title-block">
            <h2 class="section-title">About Me</h2>
        </div>
        <div class="row">
            <div class="col-sm-6 col-md-6 subpage-block">
                <div class="general-info">
                    <h3>{{showGeneralInfo.title}}</h3>
                    <p>{{showGeneralInfo.detail}}
                    </p>
                </div>
            </div>

            <div class="col-sm-6 col-md-6 subpage-block">
                <div v-if="testimonials.length > 0">
                    <div class="blockC-title">
                        <h3>Testimonials</h3>
                    </div>
                    <div class="testimonials">
                        <!-- Testimonial 2 -->
                        <div class="testimonial-item" v-for="(v,k) in showTestimonials">
                            <!-- Testimonial Content -->
                            <div class="testimonial-content">
                                <div class="testimonial-text">
                                    <p>"{{v.detail}}"</p>
                                </div>
                            </div>
                            <!-- /Testimonial Content -->
                            <!-- Testimonial Author -->
                            <div class="testimonial-credits">
                                <!-- Picture -->
                                <div class="testimonial-picture">
                                    <!--<img src="{{asset('org/sunshine/images')}}/testimonials/testimonila_photo_2.png" alt="">-->
                                </div>
                                <!-- /Picture -->
                                <!-- Testimonial author information -->
                                <div class="testimonial-author-info">
                                    <p class="testimonial-author">{{v.name}}</p>
                                    <p class="testimonial-firm">From: {{v.company}}</p>
                                </div>
                            </div>
                            <!-- /Testimonial author information -->
                        </div>
                        <!-- End of Testimonial 2 -->

                    </div>
                </div>
            </div>
        </div>

        <!-- Services block -->
        <div class="block-title">
            <h3>Strength</h3>
        </div>

        <div class="row ">
            <div class="col-sm-6 col-md-3 fun-fact-block" v-for="(v,k) in showStrengths"
                 v-bind:class="[ (k+1)%2 === 0 ? '' : 'gray-bg']">
                <div class="service-block">
                    <div class="service-info">
                        <i class="pe-7s-icon " v-bind:class="v.icon"></i>
                        <h4>{{v.title}}</h4>
                        <p>{{v.content}}</p>
                    </div>
                </div>
            </div>
        </div>
        <!-- End of Services block -->

    </div>
</template>

<script>
    export default {
        name: "frontVueAboutMe.vue",
        data: function () {
            return {
                isActive: false,
                generalInfo: {},
                testimonials: [],
                strengths: [],
                showGeneralInfo: {},
                showTestimonials: [],
                showStrengths: []
            }
        },
        created() {
            this.getAboutMeInfo();
        },
        methods: {
            getAboutMeInfo() {
                axios.get('/getAboutMe/' + this.$uToken)
                    .then((res) => {
                        this.generalInfo = res.data.generalInfo;
                        this.testimonials = res.data.testimonials;
                        this.strengths = res.data.strengths;
                        this.setShowGeneralInfo(this.generalInfo);
                        this.setShowTestimonials(this.testimonials);
                        this.setShowStrengths(this.strengths);
                    })
            },
            /**
             * Set show Data
             */
            setShowGeneralInfo(arr) {
                // 赋值到不同的内存地址, 不会双向绑定
                this.showGeneralInfo = JSON.parse(JSON.stringify(arr));
            },
            setShowTestimonials(arr) {
                // 赋值到不同的内存地址, 不会双向绑定
                this.showTestimonials = JSON.parse(JSON.stringify(arr));
            },
            setShowStrengths(arr) {
                // 赋值到不同的内存地址, 不会双向绑定
                this.showStrengths = JSON.parse(JSON.stringify(arr));
            }
        }

    }
</script>
