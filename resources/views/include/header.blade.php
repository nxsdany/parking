<div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom shadow-sm">
    <a class="navbar-brand my-0 mr-md-auto font-weight-normal" href="/">{{ config('app.name') }}</a>
    <nav class="navbar navbar-expand-lg navbar-light justify-content-end">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="p-2 text-dark" href="{{ url('/client') }}">Клиенты</a>
                </li>
                <li class="nav-item">
                    <a class="p-2 text-dark" href="{{ url('/car') }}">Автомобили</a>
                </li>
            </ul>
{{--            @if (Auth::check())--}}
{{--            <div class="nav-item dropdown">--}}
{{--                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"--}}
{{--                    aria-haspopup="true" aria-expanded="false">--}}
{{--                    <i class="fa fa-user text-primary" aria-hidden="true"></i> {{ Auth::user()->name }}--}}
{{--                </a>--}}
{{--                <div class="dropdown-menu" aria-labelledby="navbarDropdown">--}}
{{--                    <a class="dropdown-item" href="{{ url('/profile') }}">Мой профиль</a>--}}
{{--                    <div class="dropdown-divider"></div>--}}
{{--                    <a href="/logout" class="dropdown-item"><i class="fa fa-btn fa-sign-out"></i>Выйти</a>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            @else--}}
{{--            <div class="nav-item">--}}
{{--                <a href="{{ route('login') }}" class="btn btn-outline-primary" role="button">Войти</a>--}}
{{--            </div>--}}
{{--            @endif--}}
        </div>
    </nav>
</div>
