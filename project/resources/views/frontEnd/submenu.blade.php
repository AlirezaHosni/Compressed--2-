@if ((count($menu->children) > 0) AND ($menu->parent_id != null))
    <li class="nav-item dropdown">
        <a href="{{ url($menu->url) }}" class="btn nav-top-btn" role="button" data-toggle="dropdown">
            {{ $menu->title }}
            @if(count($menu->children) > 0)
                <i class="fa fa-caret-right"></i>
            @endif
        </a>
@else
    <li class="nav-item @if($menu->parent_id == null && count($menu->children) > 0) dropdown @endif">
        <a href="{{ url($menu->url) }}" class="nav-link text-white nav-top-btn rounded text-center-sm btn">
            {{ $menu->title }}
            @if(count($menu->children) > 0)
                <i class="fa fa-caret-down"></i>
            @endif
        </a>
        @endif
        @if (count($menu->children) > 0)
            <ul class="@if($menu->parent_id != null && (count($menu->children) > 0)) submenu @endif dropdown-menu" aria-labelledby="dropdownBtn">
                @foreach($menu->children as $menu)
                    @include('frontEnd.submenu', $menu)
                @endforeach
            </ul>
        @endif
    </li>
