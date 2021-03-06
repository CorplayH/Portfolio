<div class="home-page-block-bg">
    <div class="mask"></div>
</div>

<div class="home-page-block">
    <div class="v-align">
        <h2>Backend Smith</h2>
        <div id="rotate" class="text-rotate">
            <div>
                <p class="home-page-description">Web Designer</p>
            </div>
            <div>
                <p class="home-page-description">Frontend-developer</p>
            </div>
        </div>

        <div class="block end" v-show="detail != '' " style="text-align: center">
            <ul class="info-list edit-field" v-bind:class="{'edit-field-on': isActive }">
                <a class="edit-data" @click.prevent="openModal()" @mouseover="hover()" @mouseleave="hover()" id="info">
                </a>
                <li v-for="v in showData">
                    <span class="title">@{{v.title}}</span><span class="value">@{{v.value}}</span>
                </li>
            </ul>
        </div>
    </div>
</div>

<div  class="modal fade" id="home-modal" tabindex="-1" role="dialog" style="display: none;">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header block-title mb-3">
                <div class="block-title">
                    <h3 class="mb-0">Contact Form</h3>
                </div>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="col-xs-6 col-md-12 subpage-block">
                <form id="contact-form" method="post" action="contact_form/contact_form.php" novalidate="true">

                    <div class="row" v-for="(v,key) in detail">
                        <div class="col-lg-3 col-xs-12">
                            <div class="form-group p-0">
                                <input id="form_name" v-model="v.title" type="text" name="title" class="form-control "
                                       required="required" data-error="value" placeholder="Title">
                                <div class="form-control-border"></div>
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>

                        <div class="col-lg-7 col-xs-12">
                            <div class="form-group p-0">
                                <input id="form_name" v-model="v.value" type="text" name="value" class="form-control "
                                       required="required" data-error="value" value="v.value">
                                <div class="form-control-border"></div>
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                        <div class="col-lg-2 col-xs-12">
                            <div class="form-group p-0">
                                <button type="button" class="button btn-block mb-0" @click="del(key)">Delete</button>
                            </div>
                        </div>
                    </div>
                </form>
                <button type="button" class="btn-primary float-right" @click="addNew()">Add new</button>
            </div>

            <div class="modal-footer">
                <button type="button" class="button btn-send btn-secondary" data-dismiss="modal" @click="cancel()">Cancel</button>
                <button type="button" class="button btn-send" @click="save()">Save</button>
            </div>
        </div>
    </div>
</div>

<script>
    new Vue({
        el: '#vueHome',
        data: {
            isActive: false,
            detail: [
                {title: 'Age', value: 18},
                {title: 'Address', value: '88 Some Street, Some Town'},
                {title: 'E-mail', value: 'email@example.com'},
                {title: 'Phone', value: '+0123 123 456 789'},
                {title: 'Freelance', value: 'Available'}
            ],
            showData: []
        },
        // 加载页面时赋值, 给页面循环 v-for
        created() {
            this.setShowData(this.detail);
        },
        methods: {
            openModal() {
                $("#home-modal").modal('toggle');
            },
            hover() {
                this.isActive = !this.isActive;
            },
            addNew() {
                var item = {};
                this.detail.push(item);
            },
            cancel() {
                this.detail = JSON.parse(JSON.stringify(this.showData));
            },
            del(key) {
                this.detail.splice(key, 1);
            },
            save() {
                this.setShowData(this.detail);
                $('#home-modal').modal('toggle');
            },
            setShowData(arr) {
                // 赋值到不同的内存地址, 不会双向绑定
                this.showData = JSON.parse(JSON.stringify(arr));
            }
        }
    });
</script>
