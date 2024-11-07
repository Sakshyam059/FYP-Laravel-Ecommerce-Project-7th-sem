<script src="{{ asset('asset/js/jquery/jquery-3.7.1.min.js') }}"></script>
<script>
    $(document).ready(function() {
        setTimeout(function() {
            $('#loader').hide();
            $('#content').show();
        }, 500);
    });
</script>
<script>
    const closeButton = document.getElementById('close-button');
    const message = document.getElementById('message');

    const hideMessage = () => {
        message.classList.remove('slide-in'); 
        message.classList.add('fade-out'); 
        setTimeout(() => {
            message.style.display = 'none'; 
        }, 500); 
    };

    if (closeButton) {
        closeButton.addEventListener('click', hideMessage);
    }
    setTimeout(() => {
        if (message) {
            hideMessage(); 
        }
    }, 3000);
</script>