<div class="card">
    @if (isset($title) || isset($tool))
        <div class="card-header {{ isset($class) ? $class : '' }} p-3">
            <h5>{{ $title ?? '' }}</h5>
            <div class="card-header-right ">
                @if (isset($tool))
                    {!! $tool !!}
                @endif
            </div>
        </div>
    @endif
    @if (isset($content))
        <div class="card-body p-4" id="{{ isset($id) ? $id : '' }}">
            {!! $content !!}
        </div>
    @endif
</div>
