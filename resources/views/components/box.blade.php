<div class="site-card clearfix mt-4" @if(!empty($style)) style="{{ $style }}" @endif>
    @if(!empty($title))
        <div class="site-card__header" @if(!empty($hstyle)) style="{{ $hstyle }}" @endif>
            <h4>{{ $title }}</h4>
        </div>
    @endif
    <div class="site-card__body">
        {{ $slot }}
    </div>
</div>