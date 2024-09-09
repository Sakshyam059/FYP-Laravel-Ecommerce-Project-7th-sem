<style>
    #message {
        z-index: 1;
        color: white;
    }

    .success {
        background-color: rgb(0, 220, 15);
    }
    .error {
        background-color: rgb(220, 0, 0);
    }

    .alert-close {
        filter: brightness(0) invert(1);
    }
</style>
@if ($message = Session::get('success'))    
<div id="message" class="mb-0 alert success alert-dismissible fade show position-absolute end-0 me-3">
    {{ $message }}
    <button type="button" class="btn-close alert-close" data-bs-dismiss="alert"></button>
</div>
@endif
@if ($message = Session::get('error'))    
<div id="message" class="mb-0 alert error alert-dismissible fade show position-absolute end-0 me-3">
    {{ $message }}
    <button type="button" class="btn-close alert-close" data-bs-dismiss="alert"></button>
</div>
@endif
