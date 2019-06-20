<template>
    <div>
        <header id="site_header" class="header mobile-menu-hide">
            <div class=" edit-field"
                 v-bind:class="{'edit-field-on': isActive  == 'personal'}">
                <a class="edit-data" @click.prevent="openModal($event)" @mouseover="hover($event)"
                   @mouseleave="hover($event)"
                   id="personal">
                </a>
                <div class="my-photo">
                    <img :src="showDetail.image" alt="image">
                    <div class="mask"></div>
                </div>

                <div class="site-title-block">
                    <h1 class="site-title">{{showDetail.name}}</h1>
                    <p class="site-description">{{showDetail.titles[0].title}}</p>
                </div>
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
                    <li><a class="tip social-button" href="#" title="Twitter"><i class="fa fa-twitter"></i></a></li>
                    <!-- Full list of social icons: http://fontawesome.io/icons/#brand -->
                    <li><a class="tip social-button" href="#" title="Facebook"><i class="fa fa-facebook"></i></a></li>
                    <li><a class="tip social-button" href="#" title="Google Plus"><i class="fa fa-google-plus"></i></a>
                    </li>
                </ul>
                <!-- /Social buttons -->

                <ul class="site-main-menu">
                    <li>
                        <a class="mt-2" style="background: #157FFB"
                           data-toggle="modal"
                           @click.prevent="openModal($event)"
                           href="javascript:void(0)"
                           id="account"
                        >My account</a>
                    </li>
                    <li>
                        <a class="mt-2" style="background: #E45A5C" href="/logout">Logout</a>
                    </li>
                </ul>

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

        <div class="modal fade" id="personal-modal" tabindex="-1" role="dialog" style="display: none;">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header block-title mb-3">
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="col-xs-6 col-md-12 subpage-block">

                        <div class="my-photo" style="margin-top:0px; margin-bottom: 0px; ">
                            <a id="avatar-button" name="avatar-button" @click.prevent="uploadImage()"
                               class="edit-data"></a>
                            <img :src="showDetail.image" alt="avatar">
                            <div class="mask"></div>
                        </div>

                        <form id="userInfo"
                              novalidate="true">
                            <div class="row">
                                <div class="col-lg-12 col-xs-12">
                                    <div class="form-group p-0">
                                        <h5>Full name:</h5>
                                        <input type="text" name="name"
                                               class="form-control "
                                               v-model="detail.name"
                                               required="required" data-error="value" placeholder="Title">
                                        <div class="form-control-border"></div>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-lg-6" v-for="(v,key) in  detail.titles">
                                    <h5>Title {{key+1}}</h5>
                                    <div class="row">
                                        <div class="col-lg-8 col-xs-12">
                                            <div class="form-group p-0">
                                                <input type="text" name="title"
                                                       class="form-control "
                                                       v-model="v.title"
                                                       required="required" data-error="value">
                                                <div class="form-control-border"></div>
                                                <div class="help-block with-errors"></div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-xs-12">
                                            <div class="form-group p-0">
                                                <button type="button" class="button btn-block mb-0"
                                                        @click="delTitle(key)">
                                                    Delete
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <button type="button" class="btn-primary float-right" @click="addNewTitle()">Add new title
                        </button>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="button btn-send btn-secondary" data-dismiss="modal"
                                @click="cancel()">
                            Cancel
                        </button>
                        <button type="button" class="button btn-send" data-dismiss="modal" @click="save($event)">Save
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="account-modal" tabindex="-1" role="dialog" style="display: none;">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header block-title mb-3">
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="col-xs-6 col-md-12 subpage-block">

                        <form method="post" action="contact_form/contact_form.php"
                              novalidate="true">
                            <div class="row">
                                <div class="col-lg-12 col-xs-12">
                                    <h2 class="text-center">Change password:</h2>
                                    <div class="form-group p-0">
                                        <h5>Old password:</h5>
                                        <input type="password" name="oldPassword"
                                               class="form-control"
                                               v-model="passwords.oldPassword"
                                               required="required" data-error="value" placeholder="Old password">
                                        <div class="form-control-border"></div>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                    <div class="form-group p-0">
                                        <h5>New password:</h5>
                                        <input type="password" name="newPassword"
                                               class="form-control"
                                               v-model="passwords.newPassword"
                                               required="required" data-error="value" placeholder="New password">
                                        <div class="form-control-border"></div>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                    <div class="form-group p-0">
                                        <h5>Confirm your password:</h5>
                                        <input type="password" name="newPassword_confirmation"
                                               class="form-control"
                                               v-model="passwords.newPassword_confirmation"
                                               required="required" data-error="value"
                                               placeholder="Confirm your password">
                                        <div class="form-control-border"></div>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="button btn-send btn-secondary" data-dismiss="modal"
                        >
                            Cancel
                        </button>
                        <button type="submit" class="button btn-send" data-dismiss="modal"
                                @click="updatePassword($event)">Save
                        </button>
                    </div>
                </div>
            </div>
        </div>


    </div>
</template>

<script>
    export default {
        name: "vueMenu.vue",
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
                AllData: [],
                showDetail: {}
            }
        },
        created() {
            this.getUserInfo();
            this.setShowDetail(this.detail);
        },
        methods: {
            getUserInfo() {
                axios.get('/getUserInfo/' + this.$uToken)
                    .then((res) => {
                        this.detail = res.data;
                        this.$eventHub.$emit('initUserInfo', this.detail);
                        this.setShowDetail(this.detail);
                    });
            },
            /**
             * Change password
             */
            updatePassword() {
                axios.put('/admin/updateUserPassword', this.passwords)
                    .then((res) => {
                        this.messageAlert(res.data);
                    })
            },
            /**
             * Upload avatar image
             *
             */
            uploadImage() {
                console.log(this.detail.image);
            },
            /**
             *  Edit skills data
             *  @param key is the key of data 'skill'
             *  @param k is the key of data 'skill[key].skillDetail' key
             */
            delTitle(key) {
                this.detail.titles.splice(key, 1);
            },
            addNewTitle() {
                var item = {};
                this.detail.titles.push(item);
            },

            //! update userInfo data
            save() {
                // Because Form data is bind to this.detail,
                // so dont need to submit the form but pass the data
                axios.post('/admin/editUserInfo', this.detail)
                    .then((res) => {
                        // code 1 => success
                        if (res.data.code === 1) {
                            // submit an event to global bus for data on home.vue
                            // The 1st param is event bus name (自命名的事件名字)
                            // second is data want to pass, it will be the param for the handle method when listen to this event
                            this.$eventHub.$emit('userDetail-update', this.detail);
                            // Set show data on the page
                            this.setShowDetail(this.detail);
                        }
                        this.messageAlert(res.data);
                    });
            },
            cancel() {
                this.detail = JSON.parse(JSON.stringify(this.showDetail));
            },
            setShowDetail(arr) {
                // 赋值到不同的内存地址, 不会双向绑定
                this.showDetail = JSON.parse(JSON.stringify(arr));
            }
        }
    }
</script>

