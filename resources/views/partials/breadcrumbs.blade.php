@if(!empty($breadcrumbs) && count($breadcrumbs))
<nav aria-label="Breadcrumb" class="text-sm">
    <ol class="flex items-center space-x-2">
        @foreach($breadcrumbs as $breadcrumb)
            <li class="flex items-center">
                @if(!empty($breadcrumb->url) && !$loop->last)
                    <a href="{{ $breadcrumb->url }}" class="text-slate-600 hover:text-slate-800">{{ $breadcrumb->title }}</a>
                @else
                    <span class="text-slate-800 font-medium">{{ $breadcrumb->title }}</span>
                @endif

                @if(!$loop->last)
                    <svg class="w-4 h-4 text-slate-400 mx-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                @endif
            </li>
        @endforeach
    </ol>
</nav>
@endif

