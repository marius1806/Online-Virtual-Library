<div class="header">
    <span class="header-element" id="first-header-element"><a href="{{ route('index') }}" class="fa fa-home"></a></span>
    @auth
        <span class="header-element"><a href="{{ route('search') }}" class="fa fa-search"></a></span>
        <span class="header-element"><a href="{{ route('borrowedBooks') }}">Borrowed Books</a></span>
        <span class="header-element"><a href="{{ route('news') }}">News</a></span>
        <span class="header-element"><a href="{{ route('about') }}">About Me</a></span>
        <span class="header-element">
            <a href="{{ route('logout') }}"
                onclick="event.preventDefault();
                document.getElementById('logout-form').submit();">
                {{ __('Logout') }}
            </a>
    
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
        </span>
    @else
    <span class="header-element"><a href="{{ route('news') }}">News</a></span>
    <span class="header-element"><a href="{{ route('about') }}">About Me</a></span>
    <span class="header-element"><a href="{{ route('login') }}">{{ __('Login') }}</a></span>
    <span class="header-element"><a href="{{ route('register') }}">{{ __('Register') }}</a></span>
    @endauth
    <hr class="header-border">
</div>