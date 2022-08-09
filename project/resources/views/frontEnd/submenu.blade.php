@if (($menu->parent_id != null))
    <li class="@if((count($menu->children) > 0)) submenu-item submenu-child-box @else submenu-child-item @endif">
        <a href="{{ url($menu->url) }}" class="btn nav-top-btn @if((count($menu->children) > 0)) dropleft @else submenu-child-btn @endif">
            {{ $menu->title }}
            @if(count($menu->children) > 0)
                <i class="fa fa-arrow-left"></i>
            @endif
        </a>
@else
    <li @if($menu->parent_id == null && count($menu->children) > 0)class="dropdownMenuItem nav-item li-nav-top-btn submenu-box" @elseif($menu->parent_id == null && count($menu->children) == 0)class=" nav-item" @endif>
        <a href="{{ url($menu->url) }}" class="nav-link text-white nav-top-btn rounded btn @if((count($menu->children) > 0)) dropdown-toggle @else text-center-sm @endif">
            {{ $menu->title }}
{{--            @if(count($menu->children) > 0)--}}
{{--                <i class="fa fa-caret-down"></i>--}}
{{--            @endif--}}
        </a>
        @endif
        @if (count($menu->children) > 0)
            <ul @if($menu->parent_id == null)  class=" row  submenu  news-submenu bg-light d-none" @else class="submenu-child" @endif>
                @foreach($menu->children as $menu)
                    @include('frontEnd.submenu', $menu)
                @endforeach
            </ul>
        @endif
    </li>
