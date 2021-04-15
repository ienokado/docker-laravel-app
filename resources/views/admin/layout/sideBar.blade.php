<div class="sidebar">
    <div class="sidebar-inner">
        <!-- ### $Sidebar Header ### -->
        <div class="sidebar-logo">
            <div class="peers ai-c fxw-nw">
                <div class="peer peer-greed">
                    <a class="sidebar-link td-n" href="index.html">
                        <div class="peers ai-c fxw-nw">
                            <div class="peer">
                                <div class="logo">
                                    <img src="{{ mix('favicon.ico')}}" alt="">
                                </div>
                            </div>
                            <div class="peer peer-greed">
                                <h5 class="lh-1 mB-0 logo-text">{{ config('app.name') }}</h5>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="peer">
                    <div class="mobile-toggle sidebar-toggle">
                        <a href="" class="td-n">
                            <i class="ti-arrow-circle-left"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- ### $Sidebar Menu ### -->
        <ul class="sidebar-menu scrollable pos-r">
            @foreach($AdminMenus->roots() as $item)
            {{-- {{ dd($item) }} --}}
                <li class="nav-item @if($item->hasChildren()) dropdown @endif">
                    @if($item->hasChildren())
                    <a class="dropdown-toggle" href="javascript:void(0);">
                    @else
                    <a class="sidebar-link" href="{{ $item->url() }}">
                    @endif
                        <span class="icon-holder">
                            <i class="{{ $item->attributes['icon-color'] }} {{ $item->attributes['icon'] }}"></i>
                        </span>
                        <span class="title">{{ $item->attributes['label'] }}</span>
                        @if($item->hasChildren())
                            <span class="arrow">
                                <i class="ti-angle-right"></i>
                            </span>
                        @endif
                    </a>
                    @if($item->hasChildren())
                        <ul class="dropdown-menu">
                            @foreach($item->children() as $child)
                                <li>
                                    <a class='sidebar-link' href="{{ $child->url() }}">{{ $child->attributes['label'] }}</a>
                                </li>
                            @endforeach
                        </ul>
                    @endif
                </li>
            @endforeach
        </ul>
    </div>
</div>
