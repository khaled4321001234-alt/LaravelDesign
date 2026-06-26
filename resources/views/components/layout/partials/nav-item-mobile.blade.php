@php($nav = $resolveNav($item))
@php($indent = max(0, $depth) * 4)

@if (! empty($item['children']))
    <div data-mobile-nav-dropdown>
        <button
            type="button"
            data-mobile-nav-dropdown-toggle
            @class([
                $depth === 0 ? 'mobile-nav-link' : 'mobile-nav-sublink',
                'w-full flex items-center justify-between',
                'mobile-nav-link-active' => $depth === 0 && $nav['isActive'],
                'mobile-nav-sublink-active' => $depth > 0 && $nav['isActive'],
            ])
            style="{{ $depth > 0 ? 'padding-inline-start: ' . (1 + $indent) . 'rem' : '' }}"
            aria-expanded="false"
        >
            <span>{{ $item['label'] }}</span>
            <x-icons.chevron-down class="mobile-nav-dropdown-chevron size-4 opacity-40" />
        </button>

        <div class="mobile-nav-submenu" hidden>
            @foreach ($item['children'] as $child)
                @include('components.layout.partials.nav-item-mobile', [
                    'item' => $child,
                    'depth' => $depth + 1,
                    'resolveNav' => $resolveNav,
                ])
            @endforeach
        </div>
    </div>
@else
  @if ($depth === 0)
    <a
        href="{{ $nav['href'] }}"
        data-mobile-nav-link
        @class([
            'mobile-nav-link',
            'mobile-nav-link-active' => $nav['isActive'],
        ])
    >
        <span>{{ $item['label'] }}</span>
        @if ($nav['isActive'])
            <span class="mobile-nav-link-dot" aria-hidden="true"></span>
        @else
            <x-icons.arrow-forward class="size-4 opacity-40" />
        @endif
    </a>
  @else
    <a
        href="{{ $nav['href'] }}"
        data-mobile-nav-link
        @class([
            'mobile-nav-sublink',
            'mobile-nav-sublink-active' => $nav['isActive'],
        ])
        style="padding-inline-start: {{ 1 + $indent }}rem"
    >
        {{ $item['label'] }}
    </a>
  @endif
@endif
