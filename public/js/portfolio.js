// // ajax header
// $.ajaxSetup({
//     headers: {
//         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
//     }
// });
// file upload
layui.use('upload', function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    var upload = layui.upload;
    //执行实例
    var uploadInst = upload.render({
        elem: '.uploadBtn' //绑定元素
        , url: '/util/upload' //上传接口
        , accept: 'file'
        , multiple: false
        , done: function (res) {
            //上传完毕回调
            if (res.code == 'image') {
                // 将返回的上传图片的地址,用img标签展示
                $('<div><img id="imageUrl" style="width: 230px; height:230px; margin-right: 10px" src="' + res.displayPath + '" />' +
                    '<input type="hidden" name="thumbUrl" value="' + res.savePath + '">' +
                    '<button type="button" id="deleteImage" onclick="deleteAttachment(this)" class="btn btn-danger">Delete this image</button></div>'
                ).appendTo('.imageTypePreview');
                // $('#imageUrl').attr('src', res.path)
            }
            if (res.code == 'pdf') {
                // 将返回的上传图片的地址,用img标签展示
                $('<div>' +
                    '<input  type="hidden" name="fileUrl" value="' + res.savePath + '">' +
                    '<span class="text-success">File successfully uploaded!</span>' +
                    '<button type="button" id="deletePDf" onclick="deleteAttachment(this)" class="btn btn-danger">Delete this file</button>' +
                    '</div>'
                ).appendTo('#pdfTypePreview');
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

function submit(obj) {
    $('#addNewForm').submit();
    obj.prop('disabled', true);
}

$('input[type=checkbox][name=defWebThumb]').change(function () {
    if (this.checked) {
        $('#defWebThumbBtn').prop('disabled', true)
    } else {
        $('#defWebThumbBtn').prop('disabled', false)
    }
});
$('input[type=checkbox][name=defPDFThumb]').change(function () {
    if (this.checked) {
        $('#defPDFThumbBtn').prop('disabled', true)
    } else {
        $('#defPDFThumbBtn').prop('disabled', false)
    }
});

function delPortfolio(obj) {
    swal({
        type: "question",
        title: "Are u sure you want to delete it?",
        text: "The data could not be recovered",
        cancelButtonColor: '#d33',
        confirmButtonColor: '#3085d6',
        confirmButtonText: 'Yes, just do it!',
        showCancelButton: true,
        reverseButtons: true
    }).then((result) => {
        if (result.value) {
            $(obj).next('form').trigger('submit');
        } else if (
            // Read more about handling dismissals
            result.dismiss === swal.DismissReason.cancel
        ) {
            swal(
                'Cancelled',
                'The data is safe :)',
                'error'
            )
        }
    });
}


// Delete file
function deleteAttachment(obj) {
    var data = '';
    var imageUrl = $(obj).siblings('input[type=hidden][name=thumbUrl]').val() ;
    var fileUrl = $(obj).siblings('input[type=hidden][name=fileUrl]').val() ;

    if ( fileUrl != null) {
        data =fileUrl ;
    }else {
        data =imageUrl;
        console.log(data);
    }
    $(obj).siblings('input[type=hidden][name=fileUrl]').val();
    swal({
        type: "question",
        title: "Are u sure you want to delete it?",
        text: "The data could not be recovered",
        cancelButtonColor: '#d33',
        confirmButtonColor: '#3085d6',
        confirmButtonText: 'Yes, just do it!',
        showCancelButton: true,
        reverseButtons: true
    }).then((result) => {
        if (result.value) {
            $.ajax({
                type: "POST",
                url: '/util/destroy',
                data: {data},
                success: function (res) {
                    // code == 1 : File type image
                    if (res.code == 1) {
                        // detele #imageTypePreview children nodes
                        $('.imageTypePreview').children().remove()
                        // code == 2 : File type pdf
                    } else if (res.code == 2) {
                        $('#pdfTypePreview').children().remove()
                    }
                },
                error: function () {
                    setTimeout(function () {
                        swal("whoops, somethings goes wrong");
                    }, 2000);
                }
            });
        } else if (
            // Read more about handling dismissals
            result.dismiss === swal.DismissReason.cancel
        ) {
            swal(
                'Cancelled',
                'The data is safe :)',
                'error'
            )
        }
    });
}

// Watch DOM change for #imageTypePreview 's children nodes
$('#pdfTypePreview').bind("DOMSubtreeModified", function (e) {
    if (e.target.innerHTML.length > 0) {
        // if pdf is added, disable pdf upload button
        $('#pdfType').prop('disabled', true)
    } else {
        $('#pdfType').prop('disabled', false)
    }
});
// Watch DOM change for #imageTypePreview 's children nodes
$('.imageTypePreview').bind("DOMSubtreeModified", function (e) {
    if (e.target.innerHTML.length > 0) {
        // if image is added, disable image upload button
        $('.imageType').prop('disabled', true)
    } else {
        $('.imageType').prop('disabled', false)
    }
});
// check the if category input, clear radio check
$('.categoryInput').bind("input propertychange", function () {
    if ($('.categoryInput').val()) {
        $('input[type=radio][name=category]').prop('checked', false)
    }
});
// check the if category radio is selected, clear category input value
$('input[type=radio][name=category]').change(function () {
    $('.categoryInput').val('')
});
// switch div
$('input[type=radio][name=type]').change(function () {
    if (this.value === 'Image') {
        $('.imageType').show().siblings('.pdfType').css("display", "none");
        $('.imageType').siblings('.websiteType').css("display", "none");
    }
    else if (this.value === 'PDF') {
        $('.pdfType').show().siblings('.imageType').css("display", "none");
        $('.pdfType').siblings('.websiteType').css("display", "none");
    } else if (this.value === 'Website') {
        $('.websiteType').show().siblings('.imageType').css("display", "none");
        $('.websiteType').siblings('.pdfType').css("display", "none");
    }
});
