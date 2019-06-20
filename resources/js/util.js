export default {
    install(Vue, options) {
        // 全局开模态框
        Vue.prototype.openModal = function (e) {
            var id = '#' + e.target.id + '-modal';
            $(id).modal('toggle');
        };
        // 全局加边框
        Vue.prototype.hover = function (e) {
            if (!this.isActive) {
                this.isActive = e.target.id;
            } else {
                this.isActive = false;
            }
        };
        // global message alert
        Vue.prototype.messageAlert = function(data){
                swal({
                    type: data.type,
                    text: data.message,
                    timer: 2000,
                });
        };
        // Set a token for each users / domain name on meta tag
        Vue.prototype.$uToken = document.querySelector("meta[name='uToken']").getAttribute('content');

        // global event bus for global data change event
        Vue.prototype.$eventHub = new Vue();

        // Vue.prototype.portfolioChange = function () {
        //     var figureLen = $('#portfolio_grid').children('figure').length;
        //
        //     console.log(figureLen);
        // };

    }
}
