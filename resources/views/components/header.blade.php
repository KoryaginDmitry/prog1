@section('header')
<header>
    <div class="header" id="header">
        <div class="logo">
            <img src="{{ 'icon/logo.png' }}" alt="logo">
        </div>
        <nav class="navigation">
            <ul class="nav-list">
                <li class="nav-list__item">
                    <a class="nav-list__link" href="{{route('day')}}">Внести данные</a>
                </li>
                <li class="nav-list__item">
                    <a class="nav-list__link" href="{{route('info')}}">Моя статистика</a>
                </li>
                <li class="nav-list__item">
                    <a class="nav-list__link" href="{{route('settings')}}">Настройки</a>
                </li>
                <li class="nav-list__item">
                <a class="nav-list__link" href="{{route('logout')}}" onclick="
                        event.preventDefault();
                        document.getElementById('logout-form').submit();
                        ">
                    Выход</a>
                    <form id="logout-form" action="{{ route('logout') }}" method="post" style="display: none;">
                        @csrf
                    </form>
                </li>
            </ul>
        </nav>
        <div class="header-buttons">
            <button class="header-burger">
              <span></span>
            </button>
          </div>
    </div>
    <div class="mobile-menu">
        <nav class="navigation-mob">
            <ul class="nav-list-mob">
                <li class="nav-list__item-mob">
                    <a class="nav-list__link-mob" href="{{route('day')}}">Внести данные</a>
                </li>
                <li class="nav-list__item-mob">
                    <a class="nav-list__link-mob" href="{{route('info')}}">Моя статистика</a>
                </li>
                <li class="nav-list__item-mob">
                    <a class="nav-list__link-mob" href="{{route('settings')}}">Настройки</a>
                </li>
                <li class="nav-list__item-mob">
                    <a class="nav-list__link-mob" href="{{route('logout')}}" onclick="
                        event.preventDefault();
                        document.getElementById('logout-form').submit();
                        ">
                    Выход</a>
                    <form id="logout-form" action="{{ route('logout') }}" method="post" style="display: none;">
                        @csrf
                    </form>
                </li>
            </ul>
        </nav>
    </div>
</header>
@endsection