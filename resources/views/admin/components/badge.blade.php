@props(['type'=>'default'])
@php
    $map = [
        'success' => 'badge-success',
        'warning' => 'badge-warning',
        'danger' => 'badge-danger',
        'info' => 'badge-info',
        'pending' => 'badge-pending',
        'default' => 'badge-default'
    ];
    $class = $map[$type] ?? $map['default'];
@endphp
<span {{ $attributes->merge(['class'=>'status-badge '.$class]) }}>{{ $slot }}</span>
