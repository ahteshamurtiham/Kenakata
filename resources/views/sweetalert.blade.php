<script src="{{ asset('vendor/sweetalert/sweetalert.all.js') }}"></script>
@if(Session::has('alert.config'))
<script>
    Swal.fire({!! Session::pull('alert.config') !!});
</script>
@endif
//ei code ta na rakhleo hbe kaj korbe
