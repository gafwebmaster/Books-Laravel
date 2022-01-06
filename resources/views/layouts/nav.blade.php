<nav>
    @guest
    @if (Route::has('register'))

    @endif
@else

    <a href="{{ route('logout') }}"
        onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
        {{ Auth::user()->name }} - {{ __('Logout') }}
    </a>

    <form id="logout-form" action="{{ route('logout') }}" method="POST">
        @csrf
    </form>

@endguest
</nav>
