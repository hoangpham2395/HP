
@if (count($breadcrumbs))

    <ol class="breadcrumb">
    @foreach ($breadcrumbs as $breadcrumb)
            @if ($breadcrumb->url && !$loop->last)
                <li>
                    @if($breadcrumb->icon)
                        {!! $breadcrumb->icon !!}
                    @endif
                    <a href="{{ isset($breadcrumb->allow_url) ? $breadcrumb->url : '#' }}">{{ getBreadcrumbText($breadcrumb->title) }}</a></li>
            @else
                <li class="active">{{ getBreadcrumbText($breadcrumb->title) }}</li>
            @endif

        @endforeach
    </ol>

@endif
