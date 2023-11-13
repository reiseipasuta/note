

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <title>{{ $title }}</title>
</head>
<body>
    <div class="container">


        <div class="main">
            <div class="sidemenu">
                    <a href="">{{ Auth::user()->name }}</a>
                    @auth
                    <form action="{{ route('logout') }}" method="post">
                        @csrf
                        <button class="logout">ログアウト</button>
                    </form>
                    @endauth
                    @guest
                        ログイン
                    @endguest
                    {{-- <img src="" alt="" width="30px" height="30px"> --}}
                    <div class="create">
                        <a href="{{ route('getCreate') }}"><span>+</span>新規ノート</a>
                    </div>
                    <div class="create">
                        <a href="{{ route('getCreateGroup') }}"><span>+</span>新規グループ</a>
                    </div>
                    <div class="note">
                        <img src="https://img.icons8.com/cotton/344/create-new--v5.png" alt="" width="20px" height="20px"><a href="{{ route('notetop') }}">ノート一覧</a>
                    </div>
                    <div class="group">
                        参加グループ一覧
                        <div class="group-lists">
                            @foreach ($groups as $group)
                            <div class="group-list">
                                <a href="{{ route('showGroup', $group) }}">{{ $group->group_name }}</a>
                            </div>
                            @endforeach
                        </div>

                    </div>
            </div>

            {{ $slot }}

        </div>


    </div>

</body>
</html>
