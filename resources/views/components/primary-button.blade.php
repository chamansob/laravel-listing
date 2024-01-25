<button {{ $attributes->merge(['type' => 'submit', 'class' => 'btn btn-secondary w-100']) }}>
    {{ $slot }}
</button>
