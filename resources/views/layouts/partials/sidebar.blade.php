<aside class="sidebar">
    <button type="button" class="sidebar-close-btn">
        <iconify-icon icon="radix-icons:cross-2"></iconify-icon>
    </button>
    <div>
        <a href="" class="sidebar-logo">
            <img src="{{asset('assets/media/logos/shiparcel_logo.png')}}" alt="site logo" class="light-logo">
            <img src="{{asset('assets/media/logos/shiparcel_logo.png')}}" alt="site logo" class="dark-logo">
            <img src="{{asset('assets/media/logos/shiparcel_logo.png')}}" alt="site logo" class="logo-icon">
        </a>
    </div>
    <div class="sidebar-menu-area">
        <ul class="sidebar-menu" id="sidebar-menu">
            <li class="">
                <a href="{{route('dashboard')}}">
                    <iconify-icon icon="solar:home-smile-angle-outline" class="menu-icon"></iconify-icon>
                    <span>Dashboard</span>
                </a>
            </li>
        </ul>
    </div>
</aside>