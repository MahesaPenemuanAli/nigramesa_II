<div {{ $attributes->merge(['class'=>'admin-card']) }}>
    @if(isset($title))
        <div class="admin-card__header">
            <h3 class="admin-card__title">{{ $title }}</h3>
            @if(isset($action))<div>{{ $action }}</div>@endif
        </div>
    @endif
    <div class="admin-card__body">
        {{ $slot }}
    </div>
</div>
