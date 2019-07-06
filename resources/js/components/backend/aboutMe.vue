<template>
    <div>
        <div class="section-title-block">
            <h2 class="section-title">About Me</h2>
        </div>
        <div class="row">
            <div class="col-sm-6 col-md-6 subpage-block edit-field"
                 v-bind:class="{'edit-field-on': isActive  == 'abInfo'}">
                <a class="edit-data" @click.prevent="openModal($event)" @mouseover="hover($event)"
                   @mouseleave="hover($event)"
                   id="abInfo">
                </a>
                <div class="general-info">
                    <h3>{{showGeneralInfo.title}}</h3>
                    <p>{{showGeneralInfo.detail}}
                    </p>
                </div>
            </div>

            <div class="col-sm-6 col-md-6 subpage-block edit-field"
                 v-bind:class="{'edit-field-on': isActive  == 'testimonials'}">
                <a class="edit-data" @click.prevent="openModal($event)" @mouseover="hover($event)"
                   @mouseleave="hover($event)"
                   id="testimonials">
                </a>
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

        <div class="row edit-field"
             v-bind:class="{'edit-field-on': isActive  == 'strengths'}">
            <a class="edit-data" @click.prevent="openModal($event)" @mouseover="hover($event)"
               @mouseleave="hover($event)"
               id="strengths"></a>

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


        <div class="modal fade" id="abInfo-modal" tabindex="-1" role="dialog" style="display: none;">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header block-title mb-3">
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="col-xs-6 col-md-12 subpage-block">
                        <form name="abInfo-modal" method="post" action="contact_form/contact_form.php"
                              novalidate="true">

                            <div class="row">
                                <div class="col-lg-12 col-xs-12">
                                    <div class="form-group p-0">
                                        <input id="" v-model="generalInfo.title" type="text" name="title"
                                               class="form-control "
                                               required="required" data-error="value" placeholder="Title">
                                        <div class="form-control-border"></div>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>

                                <div class="col-lg-12 col-xs-12">
                                    <div class="form-group p-0">
                                        <textarea name="detail" v-model="generalInfo.detail" rows="4"
                                                  required="required" data-error="Please, leave me a message."
                                                  class="form-control"></textarea>
                                        <div class="form-control-border"></div>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                            </div>


                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="button btn-send btn-secondary" data-dismiss="modal"
                                @click="cancelGeneralInfo()">
                            Cancel
                        </button>
                        <button type="button" class="button btn-send" data-dismiss="modal"
                                @click="saveGeneralInfo($event)">Save
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="testimonials-modal" tabindex="-1" role="dialog" style="display: none;">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header block-title mb-3">
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="col-xs-6 col-md-12 subpage-block">
                        <form name="testimonials-modal" method="post" action=""
                              novalidate="true">
                            <div class="row" v-for="(v,key) in testimonials">
                                <div class="col-lg-12 col-xs-12">
                                    <div class="form-group p-0">
                                        <h5>Testimonial</h5>
                                        <textarea id="info_detail" name="detail" v-model="v.detail" rows="2"
                                                  required="required" data-error="Please, leave me a message."
                                                  class="form-control"></textarea>
                                        <div class="form-control-border"></div>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-xs-12">
                                    <div class="form-group p-0">
                                        <h5>Name</h5>
                                        <input v-model="v.name" type="text" name="value"
                                               class="form-control "
                                               required="required" data-error="value" value="v.value">
                                        <div class="form-control-border"></div>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-xs-12">
                                    <div class="form-group p-0">
                                        <h5>Company</h5>
                                        <input v-model="v.company" type="text" name="value"
                                               class="form-control "
                                               required="required" data-error="value" value="v.value">
                                        <div class="form-control-border"></div>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-xs-12">
                                    <div class="form-group p-0">
                                        <button type="button" class="button btn-block mb-0"
                                                @click="delTestimonials(key)">Delete
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <button type="button" class="btn-primary float-right" @click="addNewTestimonials()">Add new
                            testimonial
                        </button>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="button btn-send btn-secondary" data-dismiss="modal"
                                @click="cancelGeneralInfo()">
                            Cancel
                        </button>
                        <button type="button" class="button btn-send" data-dismiss="modal"
                                @click="saveTestimonials($event)">Save
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="strengths-modal" tabindex="-1" role="dialog" style="display: none;">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header block-title mb-3">
                        <h5 class="modal-title">
                            <a href="https://themes-pixeden.com/font-demos/7-stroke/"
                                                   target="_blank">Click here to find more Icon code</a></h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="col-xs-6 col-md-12 subpage-block">
                        <form method="post" action="contact_form/contact_form.php"
                              novalidate="true">
                            <div class="row" v-for="(v,key) in strengths">
                                <div class="col-lg-4 col-xs-12">
                                    <div class="form-group p-0">
                                        <h5>Icon</h5>
                                        <input v-model="v.icon" type="text" name="icon"
                                               class="form-control "
                                               required="required" data-error="value" placeholder="Title">
                                        <div class="form-control-border"></div>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>

                                <div class="col-lg-8 col-xs-12">
                                    <div class="form-group p-0">
                                        <h5>Title</h5>
                                        <input v-model="v.title" type="text" name="title"
                                               class="form-control "
                                               required="required" data-error="value" value="v.value">
                                        <div class="form-control-border"></div>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>

                                <div class="col-lg-12 col-xs-12">
                                    <div class="form-group p-0">
                                        <h5>Content</h5>
                                        <textarea name="detail" v-model="v.content" rows="2"
                                                  required="required" data-error="Please, leave me a message."
                                                  class="form-control"></textarea>
                                        <div class="form-control-border"></div>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>

                                <div class="col-lg-12 col-xs-12">
                                    <div class="form-group p-0">
                                        <button type="button" class="button btn-block mb-0"
                                                @click="delStrengths(key)">Delete
                                        </button>
                                    </div>
                                </div>

                            </div>
                        </form>

                        <button type="button" class="btn-primary float-right" @click="addNewStrengths()">Add new
                        </button>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="button btn-send btn-secondary" data-dismiss="modal"
                                @click="cancelStrengths()">
                            Cancel
                        </button>
                        <button type="button" class="button btn-send" data-dismiss="modal" @click="saveStrengths()">
                            Save
                        </button>
                    </div>
                </div>
            </div>
        </div>

    </div>
</template>

<script>
    export default {
        name: "vueAboutMe.vue",
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
             * Strengths control
             */
            addNewStrengths() {
                var item = {};
                this.strengths.push(item);
            },
            delStrengths(key) {
                this.strengths.splice(key, 1);
            },
            cancelStrengths() {
                this.strengths = JSON.parse(JSON.stringify(this.showStrengths));
            },
            saveStrengths() {
                axios.put('/admin/updateStrength/' + this.$uToken, this.strengths)
                    .then((res) => {
                        this.setShowStrengths(this.strengths);
                    });
            },
            /**
             * Testimonials control
             */
            addNewTestimonials() {
                var item = {};
                this.testimonials.push(item);
            },
            delTestimonials(key) {
                this.testimonials.splice(key, 1);
            },
            cancelTestimonials() {
                this.testimonials = JSON.parse(JSON.stringify(this.showTestimonials));
            },
            saveTestimonials() {
                axios.put('/admin/updateTestimonials/' + this.$uToken, this.testimonials)
                    .then((res) => {
                        this.setShowTestimonials(this.testimonials);
                    });
            },
            /**
             * GeneralInfo control
             */
            cancelGeneralInfo() {
                this.generalInfo = JSON.parse(JSON.stringify(this.showGeneralInfo));
            },
            saveGeneralInfo() {
                axios.put('/admin/updateGeneralInfo/' + this.$uToken, this.generalInfo)
                    .then((res) => {
                        this.setShowGeneralInfo(this.generalInfo);
                    });
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
