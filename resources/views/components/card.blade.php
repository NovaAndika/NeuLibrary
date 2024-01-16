<div class="card">
    {{ $image ?? null }}
    <div class="card-header {{ $titleStyle }}">
        <h5 class="card-title m-0 py-1">{{ $title ?? null }}</h5>
    </div>
    <div class="card-body">
        <p class="card-text">{{ $text ?? null }}</p>
        {{ $slot }}
    </div>
</div>