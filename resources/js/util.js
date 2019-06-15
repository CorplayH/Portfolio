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

        // Vue.prototype.portfolioChange = function () {
        //     var figureLen = $('#portfolio_grid').children('figure').length;
        //
        //     console.log(figureLen);
        // };

    }
}
