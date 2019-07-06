<template>
    <div>
        <div class="section-title-block">
            <h2 class="section-title">Contact</h2>
        </div>

        <div class="row">
            <div class="col-sm-6 col-md-6 subpage-block">
                <div class="block-title">
                    <h3>Get in Touch</h3>
                </div>
                <ul class="info-list">
                    <li class="col-12" v-for="(v,k) in showDetail ">
                        <div v-if="v.title == 'E-mail'">
                            <span class="title">{{v.title}}</span>
                            <a :href="'mailto:' + v.value">
                                {{v.value}}
                            </a>
                        </div>
                        <div v-else>
                            <span class="title">{{v.title}}</span>
                            <span class="value">{{v.value}}</span>
                        </div>

                    </li>
                </ul>
            </div>
            <div class="col-sm-6 col-md-6 subpage-block">
                <div class="block-title">
                    <h3>Contact Form</h3>
                </div>
                <form id="contact-form" method="post"  action="">
                    <div class="messages"></div>
                    <div class="controls">
                        <div class="form-group">
                            <input id="form_name" type="text"
                                   name="name" v-model="form.name"
                                   class="form-control" placeholder="Full Name"
                                   required="required" data-error="Name is required.">
                            <div class="form-control-border"></div>
                            <i class="form-control-icon fa fa-user"></i>
                            <div class="help-block with-errors"></div>
                        </div>

                        <div class="form-group">
                            <input id="form_email" type="email"
                                   name="email" v-model="form.email"
                                   class="form-control"
                                   placeholder="Email Address"
                                   required="required" data-error="Valid email is required.">
                            <div class="form-control-border"></div>
                            <i class="form-control-icon fa fa-envelope"></i>
                            <div class="help-block with-errors"></div>
                        </div>

                        <div class="form-group">
                    <textarea id="form_message"
                              name="message" v-model="form.content"
                              class="form-control" placeholder="Message for me"
                              rows="4" required="required" data-error="Please, leave me a message."></textarea>
                            <div class="form-control-border"></div>
                            <i class="form-control-icon fa fa-comment"></i>
                            <div class="help-block with-errors"></div>
                        </div>
                        <div class="g-recaptcha" data-sitekey="6LfUa6sUAAAAAGIwjkBxU1hKppy28Zxqiv5ITGe-"
                             data-callback="correctCaptcha"></div>

                        <input id="contactSubmit" type="submit" class="button btn-send" value="Send message">
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>
<script>
    export default {
        name: "vueContact.vue",
        data: function () {
            return {
                detail: [],
                form:{},
                showDetail: []
            }
        },
        // 加载页面时赋值, 给页面循环 v-for
        created() {
            this.$eventHub.$on('initUserInfo', this.userDetailUpdate);
            // this.setShowData(this.detail);
        },
        methods: {
            /**
             * ! init data
             * @param detail
             */
            userDetailUpdate(detail) {
                this.detail = detail.basicInfo;
                this.setShowData(this.detail);
            },
            setShowData(arr) {
                // 赋值到不同的内存地址, 不会双向绑定
                this.showDetail = JSON.parse(JSON.stringify(arr));
            }
        },
        beforeDestroy() {
            this.$eventHub.$off('initUserInfo');
        }
    }
</script>
