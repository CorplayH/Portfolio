layui.use('upload', function () {
    var upload = layui.upload;

    var uploadInst = upload.render({
        elem: '#avatar' //绑定元素
        , url: '/util/upload' //上传接口
        // , accept: 'images'
        , accept: 'file'
        , size: 100
        , multiple: false
        , done: function (res) {
            //上传完毕回调
            if (res.code == 'image') {
                console.log(res.savePath);
                $('#avatarImage').attr('src', res.savePath);
                $('#avatarInput').val(res.savePath);
            }
            if (res.code == 403) {
                swal({
                    type: "error",
                    text: res.message,
                    timer: 3000,
                })
            }
        },
        error: function (res) {
            console.log(res.code)
        },
    });


//执行实例
    var uploadInst = upload.render({
        elem: '#background' //绑定元素
        , url: '/util/upload' //上传接口
        // , accept: 'images'
        , accept: 'file'
        , size: 200
        , multiple: false
        , done: function (res) {
            //上传完毕回调
            if (res.code == 'image') {
                console.log(res);
                $('#homeSection').css('background-image', 'url(' + res.savePath + ')');
                $('#modalBackground').attr('src', res.savePath);
            }
            if (res.code == 403) {
                swal({
                    type: "error",
                    text: res.message,
                    timer: 3000,
                })
            }
        },
        error: function (res) {
            // console.log(res.code)
        },
    });


});
