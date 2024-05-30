<div
    x-init="setTimeout(function() {$refs.alert.remove()}, 5000)"
    x-data=""
    x-ref="alert"
>
    @if($flash = flash()->get())
        <div class="{{ $flash->classes() }} flash alert  alert-dismissible fade show text-center" role="alert">
            {{ $flash->message() }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
</div>



