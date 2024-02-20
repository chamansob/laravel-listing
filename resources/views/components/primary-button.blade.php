<button {{ $attributes->merge(['type' => 'submit', 'class' => 'btn btn-secondary w-100 btn-lg _effect--ripple waves-effect waves-ligh' ]) }}>
    {{ $slot }}
</button>
