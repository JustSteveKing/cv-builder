@props(['name' => 'Demo User'])

<img
    src="https://ui-avatars.com/api/?name={{ urlencode($name) }}&color=7F9CF5&background=EBF4FF"
    {{ $attributes }}
/>
