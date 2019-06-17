<script>
    @if (session()->has('error'))
    swal({
        type: "error",
        text: "{{session()->get('error')}}",
        timer: 3000,
        // reverseButtons: true
        // showConfirmButton: false,
    });
    {{--        swal("{{session()->get('error')}}", "", "warning");--}}
    @endif

    @if (session()->has('success'))
    swal({
    type: "success",
    text: "{{session()->get('success')}}",
    timer: 3000,
    showConfirmButton: true,
    });
{{--    swal("", "{{session()->get('success')}}", "success");--}}
{{--    toastr.success("{{session()->get('success')}}", "Success !", {"showMethod": "slideDown", "hideMethod": "slideUp", timeOut: 200000});--}}
    @endif

    @if ($errors->any())
    swal('', "@foreach ($errors->all() as $error){{ $error }}<br />@endforeach", "error");
    @endif

</script>


