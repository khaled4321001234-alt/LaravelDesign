@php($nav = $resolveNav($item))

@if (! empty($item['children']))
    @if ($depth === 0)
        <div class="nav-dropdown" data-nav-dropdown>
            <button
                type="button"
                data-nav-dropdown-trigger
                @class([
                    'nav-link nav-dropdown-trigger',
                    'nav-link-active' => $nav['isActive'],
                ])
                aria-expanded="false"
                aria-haspopup="true"
            >
                {{ $item['label'] }}
                <x-icons.chevron-down class="nav-dropdown-chevron size-3.5" />
            </button>

            <div class="nav-dropdown-menu" role="menu">
                @foreach ($item['children'] as $child)
                    @include('components.layout.partials.nav-item-desktop', [
                        'item' => $child,
                        'depth' => 1,
                        'resolveNav' => $resolveNav,
                    ])
                @endforeach
            </div>
        </div>
    @else
        <div class="nav-dropdown-submenu" role="none">
            <div
                @class([
                    'nav-dropdown-item nav-dropdown-submenu-trigger',
                    'nav-dropdown-item-active' => $nav['isActive'],
                ])
                role="menuitem"
            >
                @if ($nav['href'] !== '#')
                    <a href="{{ $nav['href'] }}" class="nav-dropdown-submenu-label">
                        {{ $item['label'] }}
                    </a>
                @else
                    <span class="nav-dropdown-submenu-label">{{ $item['label'] }}</span>
                @endif
                <x-icons.chevron-down class="nav-dropdown-submenu-chevron size-3.5 shrink-0 opacity-50" />
            </div>

            <div class="nav-dropdown-menu nav-dropdown-submenu-menu" role="menu">
                @foreach ($item['children'] as $child)
                    @include('components.layout.partials.nav-item-desktop', [
                        'item' => $child,
                        'depth' => $depth + 1,
                        'resolveNav' => $resolveNav,
                    ])
                @endforeach
            </div>
        </div>
    @endif
@else
    @if ($depth === 0)
        <a href="{{ $nav['href'] }}" @class(['nav-link', 'nav-link-active' => $nav['isActive']])>
            {{ $item['label'] }}
        </a>
    @else
        <a
            href="{{ $nav['href'] }}"
            role="menuitem"
            @class(['nav-dropdown-item', 'nav-dropdown-item-active' => $nav['isActive']])
        >
            {{ $item['label'] }}
        </a>
    @endif
@endif
