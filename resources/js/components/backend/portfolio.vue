<template>
    <div>
        <div class="section-title-block">
            <h2 class="section-title">Portfolio</h2>
        </div>

        <!-- Portfolio Content -->
        <div class="portfolio-content">
            <!-- Portfolio filter -->
            <ul id="portfolio_filters" class="portfolio-filters">
                <li v-for="(v,k) in showAllTags">
                    <a class="filter btn btn-sm btn-link" :data-group="v.name">{{v.name}}</a>
                </li>
            </ul>
            <!-- End of Portfolio filter -->
            <div class="row">
                <button class="btn btn-success col-xs-6 col-6 m-auto"
                        data-target="#addNew"
                        data-toggle="modal"
                        @click="addNewProject()">
                    Add new portfolio
                </button>
            </div>
            <!-- Portfolio Grid -->
            <div id="portfolio_grid" class="portfolio-grid portfolio-masonry masonry-grid-3">
                <!-- Portfolio Item 1 -->
                <figure class="item"
                        v-for="(v,k) in showDetails"
                        :data-groups="v.tag"
                >
                    <a v-bind:class=" v.type ==='Image' ? 'lightbox' : '' "
                       :target=" v.type === 'Image'?  '_self' : '_blank' "
                       :title="v.name"
                       :href="v.fileUrl"
                    >
                        <img :src="v.thumbUrl" :alt="v.name">
                        <div>
                            <h5 class="name">{{v.name}}</h5>
                            <small>{{v.type}}</small>
                            <i :class="v.type === 'Image' ? isImage.icon : (v.type ==='PDF'? isFile.icon : isUrl.icon)"></i>
                        </div>
                    </a>
                    <button class="col-12 btn-sm btn-secondary"
                            data-toggle="modal" :data-target="'#' + 'item' + k"

                    >
                        Edit
                    </button>
                </figure>

                <!--edit portfolio modal-->
                <div v-for="(v,k) in showDetails" class="modal fade" :id="'item'+ k" tabindex="-1" role="dialog"
                     style="display: none;">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header block-title mb-3">
                                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                            </div>
                            <div class="col-12 subpage-block">
                                <form method="post" action="contact_form/contact_form.php"
                                      novalidate="true">
                                    <div class="row">
                                        <div class="col-lg-6 col-xs-12">
                                            <div class="form-group p-0">
                                                <h5>Project name:</h5>
                                                <input type="text" name="name"
                                                       class="form-control "
                                                       v-model="v.name"
                                                       required="required" data-error="value"
                                                       placeholder="Project name">
                                                <div class="form-control-border"></div>
                                                <div class="help-block with-errors"></div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-xs-12">
                                            <div class="form-group p-0">
                                                <h5>Project tag:</h5>
                                                <select name="tag" class="custom-select form-control"
                                                        required="required" data-error="value"
                                                        ref="tagValue">
                                                    <option v-for="(v,TagsKey) in allTags" :value="v.name"
                                                            :selected="v.name === isSelected(k) "> {{v.name}}
                                                    </option>
                                                </select>
                                                <div class="form-control-border"></div>
                                                <div class="help-block with-errors"></div>
                                            </div>
                                        </div>
                                        <div class="col-lg-12 col-xs-12">
                                            <div class="form-group p-0">
                                                <div class="form-check form-check-inline"
                                                     v-for="(value,typesKey ) in allTypes">
                                                    <label class="form-check-label">
                                                        <input class="form-check-input" type="radio"
                                                               name="type"
                                                               :value="value.name "
                                                               v-model="v.type"
                                                        >
                                                        {{value.name}}
                                                    </label>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-12" v-if="v.type === 'Image' ">
                                            <button class="btn btn-success col-xs-6 col-6 mb-1"
                                                    @click="uploadImage()">
                                                Upload image
                                            </button>
                                            <img style="width: 230px; heigh:230px "
                                                 src="org/sunshine/images/portfolio/test.jpg">
                                        </div>

                                        <div class="col-12" v-if="v.type === 'PDF' ">
                                            <div class="row">
                                                <button class="btn btn-success col-xs-6 col-6 mb-1"
                                                        @click="uploadImage()">
                                                    Upload your pdf file
                                                </button>
                                                <button class="btn btn-primary col-xs-6 col-6 mb-1"
                                                        @click="uploadImage()">
                                                    Upload a thumbnail
                                                </button>
                                            </div>
                                            <div class="row">
                                                <div class="col-6">{{v.fileUrl}}</div>
                                                <img class="col-6" style="width: 230px; height:230px "
                                                     src="org/sunshine/images/portfolio/test.jpg">
                                            </div>
                                        </div>


                                        <div class="col-12" v-if="v.type === 'Website' ">
                                            <div class="form-group p-0">
                                                <h5>Website url:</h5>
                                                <input type="text" name="fileUrl"
                                                       class="form-control "
                                                       v-model="v.fileUrl"
                                                       required="required" data-error="value"
                                                       placeholder="Website Url">
                                                <div class="form-control-border"></div>
                                                <div class="help-block with-errors"></div>
                                            </div>
                                            <button class="btn btn-primary col-xs-6 col-6 mb-1"
                                                    @click="uploadImage()">
                                                Upload a thumbnail
                                            </button>

                                            <img class="col-6" style="width: 230px; height:230px "
                                                 :src="v.thumbUrl">
                                        </div>

                                    </div>
                                </form>

                            </div>
                            <div class="modal-footer">
                                <button type="button" class="button btn-send btn-secondary" data-dismiss="modal"
                                        @click="cancelEdit()">
                                    Cancel
                                </button>
                                <button type="button" class="button btn-send" data-dismiss="modal"
                                        @click="saveEdit($event)">Save
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <!--end portfolio modal-->
            </div>
            <!-- /Portfolio Grid -->
        </div>
        <!-- /Portfolio Content -->


        <!--add New modal-->
        <div class="modal fade" id="addNew" tabindex="-1" role="dialog" style="display: none;">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header block-title mb-3">
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="col-12 subpage-block">
                        <form method="post" action="contact_form/contact_form.php"
                              novalidate="true">
                            <div class="row">
                                <div class="col-lg-6 col-xs-12">
                                    <div class="form-group p-0">
                                        <h5>Project name:</h5>
                                        <input type="text" name="name"
                                               class="form-control "
                                               v-model="details[details.length -1].name"
                                               required="required" data-error="value"
                                               placeholder="Project name">
                                        <div class="form-control-border"></div>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-xs-12">
                                    <div class="form-group p-0">
                                        <h5>Project tag:</h5>
                                        <select name="tag" class="custom-select form-control"
                                                required="required" data-error="value"
                                                ref="newTagValue">
                                            <option v-for="(v,k) in allTags" :value="v.name">{{v.name}}</option>
                                        </select>
                                        <div class="form-control-border"></div>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-xs-12">
                                    <div class="form-group p-0">
                                        <div class="form-check form-check-inline"
                                             v-for="(v,k ) in allTypes">
                                            <label class="form-check-label">
                                                <input class="form-check-input" type="radio"
                                                       name="type"
                                                       :value="v.name "
                                                       v-model="details[details.length -1].type">
                                                {{v.name}}
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-12" v-if="details[details.length -1].type === 'Image' ">
                                    <div class="row">
                                        <button class="btn btn-success col-xs-6 col-6 mb-1"
                                                @click="uploadImage()">
                                            Upload image
                                        </button>
                                    </div>
                                    <div class="row">
                                        <img style="width: 230px; height:230px "
                                             src="org/sunshine/images/portfolio/test.jpg">
                                    </div>

                                </div>

                                <div class="col-12" v-if="details[details.length -1].type === 'PDF' ">
                                    <div class="row">
                                        <button class="btn btn-success col-xs-6 col-6 mb-1"
                                                @click="uploadImage()">
                                            Upload your pdf file
                                        </button>
                                        <button class="btn btn-primary col-xs-6 col-6 mb-1"
                                                @click="uploadImage()">
                                            Upload a thumbnail
                                        </button>
                                    </div>
                                    <div class="row">
                                        <div class="col-6">{{details[details.length -1].fileUrl}}</div>
                                        <img class="col-6" style="width: 230px; height:230px "
                                             src="org/sunshine/images/portfolio/test.jpg">
                                    </div>
                                </div>

                                <div class="col-12" v-if="details[details.length -1].type === 'Website' ">
                                    <div class="form-group p-0">
                                        <h5>Website url:</h5>
                                        <input type="text" name="fileUrl"
                                               class="form-control "
                                               v-model="details[details.length -1].fileUrl"
                                               required="required" data-error="value"
                                               placeholder="Website Url">
                                        <div class="form-control-border"></div>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                    <div class="row">
                                        <button class="btn btn-primary col-xs-6 col-6 mb-1"
                                                @click="uploadImage()">
                                            Upload a thumbnail
                                        </button>
                                    </div>

                                    <img class="col-6" style="width: 230px; height:230px "
                                         :src="details[details.length -1].thumbUrl">
                                </div>

                            </div>
                        </form>


                    </div>
                    <div class="modal-footer">
                        <button type="button" class="button btn-send btn-secondary" data-dismiss="modal"
                                @click="cancelAddNew()">
                            Cancel
                        </button>
                        <button type="button" class="button btn-send"
                                @click="saveAddNew()">Save
                        </button>
                        <!--data-dismiss="modal"-->
                    </div>
                </div>
            </div>
        </div>
        <!--end add New modal-->

    </div>
</template>

<script>
    export default {
        name: "vuePortfolio.vue",
        data: function () {
            return {
                isActive: false,
                isImage: {class: 'lightbox', icon: 'fa fa-image'},
                isFile: {class: '', icon: 'fa fa-file-text-o'},
                isUrl: {class: '', icon: 'fa fa-link'},
                allTags: [
                    {name: 'All'},
                    {name: 'Image'},
                    {name: 'PDF'},
                    {name: 'Website'}
                ],
                allTypes: [
                    {name: 'Image'},
                    {name: 'PDF'},
                    {name: 'Website'}
                ],
                details: [
                    {
                        name: 'web project',
                        tag: '["All","Image"]',
                        fileUrl: 'org/sunshine/images/portfolio/test.jpg',
                        thumbUrl: 'org/sunshine/images/portfolio/2.jpg',
                        type: 'Image',
                    },
                    {
                        name: 'file project',
                        tag: '["All","PDF"]',
                        fileUrl: 'org/sunshine/images/portfolio/2.jpg',
                        thumbUrl: 'org/sunshine/images/portfolio/2.jpg',
                        type: 'PDF',
                    },
                    {
                        name: 'Website project',
                        tag: '["All","PDF"]',
                        fileUrl: 'org/sunshine/file/William.pdf',
                        thumbUrl: 'org/sunshine/images/portfolio/2.jpg',
                        type: 'Website',
                    },
                    {
                        name: 'Website project',
                        tag: '["All","Website"]',
                        fileUrl: 'http://mall.corplayer.com',
                        thumbUrl: 'org/sunshine/images/portfolio/2.jpg',
                        type: 'Website',
                    }
                ],
                showAllTags: {},
                showDetails: {}
            }
        },
        created() {
            this.setShowDetails(this.details);
            this.setShowTags(this.allTags);
        },
        methods: {
            /**
             * edit functions
             */

            isSelected(k) {
                var tag = '';
                tag = this.showDetails[k].tag.substring(8, this.showDetails[k].tag.length - 2);
                return tag;
            },

            cancelEdit() {
                this.showDetails = JSON.parse(JSON.stringify(this.details));
            },
            saveEdit() {
                this.showDetails.tag = '["All", "' + this.$refs['tagValue'].value + '"] ';
                this.details = JSON.parse(JSON.stringify(this.showDetails));
            },


            /**
             * Add new project
             */
            addNewProject() {
                var item = {};
                this.details.push(item);
            },
            saveAddNew(e) {
                // todo
                // save data to sever
                // console.log(this.$refs['newTagValue'].value);
                this.details[this.details.length - 1].tag = '["All", "' + this.$refs['newTagValue'].value + '"] ';
                this.showDetails = JSON.parse(JSON.stringify(this.details));
                console.log(this.details[this.details.length - 1]);

                // location.reload();

            },
            cancelAddNew() {
                this.details = JSON.parse(JSON.stringify(this.showDetails));
            },

            /**
             * Upload avatar image
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
                this.details.titles.splice(key, 1);
            },
            addNewTitle() {
                var item = {};
                this.details.titles.push(item);
            },
            save(e) {
                console.log(this.detail);
                this.setShowDetail(this.detail);
            },
            cancel() {
                this.details = JSON.parse(JSON.stringify(this.showDetails));
            },
            setShowDetails(arr) {
                // 赋值到不同的内存地址, 不会双向绑定
                this.showDetails = JSON.parse(JSON.stringify(arr));
            },
            setShowTags(arr) {
                // 赋值到不同的内存地址, 不会双向绑定
                this.showAllTags = JSON.parse(JSON.stringify(arr));
            }
        }
    }
</script>

