<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <script src="https://kit.fontawesome.com/b126c05739.js" crossorigin="anonymous"></script>
    <title>{{ $title }}</title>
</head>

<body>
    <div class="container">


        <div class="main">
            <div class="sidemenu">
                @auth
                    <a href="{{ route('notetop') }}">
                        <i class="fa-solid fa-dove fa-xl" style="color: #7887a1;"></i>
                        {{ Auth::user()->name }}
                    </a>
                    @if(Auth::id() === 1)
                    <div class="guest">
                        ゲスト用アカウントです。<br>
                        ご自由にお試し下さい。
                    </div>
                    @endif
                    <div class="create">
                        <a href="{{ route('getCreate') }}"><span><i class="fa-solid fa-plus"></i></span>新規ノート</a>
                    </div>
                    <div class="create">
                        <a href="{{ route('getCreateGroup') }}"><span><i class="fa-solid fa-plus"></i></span>新規グループ</a>
                    </div>
                    <div class="note">
                        <i class="fa-regular fa-pen-to-square fa-xl" style="color: #7a7a7a;"></i>
                        <a href="{{ route('notetop') }}">ノート一覧</a>
                    </div>
                    <div class="group">
                        <i class="fa-solid fa-people-group fa-xl" style="color: #bdd5ff;"></i>
                        参加グループ一覧
                        <div class="group-lists">
                            @foreach ($groups as $group)
                                <div class="group-list">
                                    <a href="{{ route('showGroup', $group) }}">{{ $group->group_name }}</a>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="logout_link">
                        <form action="{{ route('logout') }}" method="post">
                            @csrf
                            <i class="fa-solid fa-arrow-right-from-bracket" style="color: #696969;"></i>
                            <button class="logout">ログアウト</button>
                        </form>
                    </div>
                @endauth
                @guest
                    <div>
                        <a href="{{ route('guest') }}">
                            <button class="create">簡単ログイン</button>
                        </a>
                    </div>
                    <div>
                        <form action="{{ route('login') }}">
                            <button class="create">ログイン</button>
                        </form>
                    </div>
                    <div>
                        <form action="{{ route('register') }}">
                            <button class="create">新規登録</button>
                        </form>
                    </div>

                @endguest
            </div>

            {{ $slot }}

        </div>


    </div>

</body>

</html>
