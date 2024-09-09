<script src="{{ asset('asset/js/jquery/jquery-3.7.1.min.js') }}"></script>
<script>
    $(document).ready(function() {
        setTimeout(function() {
            $('#loader').hide();
            $('#content').show();
        }, 500);
    });
</script>