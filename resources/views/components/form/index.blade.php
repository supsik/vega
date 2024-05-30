<div {{ $attributes->only('class')->class('contact-form') }}>

    @if(session()->has('success'))
        <div class="alert alert-success">
            {{ session()->get('success') }}
        </div>
    @endif


    <form {{ $attributes->except('class') }}>
        @csrf

        {{ $slot }}
    </form>
</div>
