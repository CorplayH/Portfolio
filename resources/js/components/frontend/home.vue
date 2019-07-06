<template>
    <div>
        <div class="home-page-block-bg">
            <div class="mask"></div>
        </div>
        <div class="home-page-block">
            <div class="v-align">
                <h2>{{personal.name}}</h2>
                <div id="rotate" class="text-rotate">
                    <div v-for="(v,k) in personal.titles">
                        <p class="home-page-description">{{v.title}}</p>
                    </div>
                </div>

                <div class="block end" style="text-align: center">
                    <ul class="info-list">
                        <li v-for="v in showData">
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
            </div>
        </div>
    </div>
</template>
<script>
    export default {
        name: "frontVueHome.vue",
        data: function () {
            return {
                isActive: false,
                personal: {
                    name: 'onLoad',
                    titles: [
                        {title: 'onLoad'},
                        {title: 'onLoad'},
                        {title: 'onLoad'},
                        {title: 'onLoad'},
                    ],
                },
                detail: [
                    // fetch from back end
                    // {title: 'Age', value: 18},
                ],
                AllData: [],
                showData: [],
            }
        },
        // 加载页面时赋值, 给页面循环 v-for
        created() {
            // listen to the 'userDetail-update' event, then call an function
            this.$eventHub.$on('userDetail-update', this.userDetailUpdate);
            this.$eventHub.$on('initUserInfo', this.userDetailUpdate);
            // this.setShowData(this.detail);
        },
        methods: {
            /**
             * Response method for listening event
             * @param detail: Transferred from $emit event in Menu.vue
             */
            userDetailUpdate(detail) {
                this.personal = detail;
                this.detail = detail.basicInfo;
                this.setShowData(this.detail);
            },
            setShowData(arr) {
                // 赋值到不同的内存地址, 不会双向绑定
                this.showData = JSON.parse(JSON.stringify(arr));
            }
        },
        beforeDestroy() {
            this.$eventHub.$off('initUserInfo');
            this.$eventHub.$off('userDetail-update');
        },
    }
</script>
