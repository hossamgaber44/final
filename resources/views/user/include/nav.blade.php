<nav class="navbar">
    <div class="container">
        <div class="nav_content">
            <div class="nav_logo" style="display: flex;">
                {{-- <i class="fa-solid fa-graduation-cap"></i> --}}
                <img width="40px" height="40px" src="{{ asset('images/final_logo.png') }}">
                <h1>فاينال</h1>
            </div>
            <div class="nav_link">
                <a style="font-size: 23px;" href="{{ route('home') }}">المواد</a>
                <a style="font-size: 23px;" href="{{ route('user.Quize') }}">الاختبارات</a>
                {{-- <a href="">خروج</a> --}}
                <a style="font-size: 23px;" class="dropdown-item" href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                    خروج
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
                {{-- {{ Auth::user()->name }} --}}
            </div>
            <i onclick="toggleNavbar()" class="fa fa-bars Menu-hamburger MenuIcon"></i>
        </div>
    </div>
</nav>
