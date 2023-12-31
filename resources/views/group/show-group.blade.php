<x-layout>
    <x-slot name="title">
        NOTE
    </x-slot>
    @if (!$member)
        <p>無効なリンクです。</p>
    @else
        <x-list-g :lists="$lists" :group="$group" />
        {{-- <div class="memolist">
                <div class="memolist-top">
                    <img src="https://img.icons8.com/cotton/344/create-new--v5.png" alt="" width="30px" height="30px">
                    <span>ノート</span>
                </div>
                @foreach ($posts as $post)
                <div class="memo">
                    <a href="{{ route('showGroupNote', ['group' => $group, 'post' => $post]) }}">
                        <div>
                            {{ $post->title }}
                        </div>

                        <div>
                            {{ $post->body }}
                        </div>

                        <div>
                            {{ $post->created_at }}
                        </div>

                        <div>
                            名前：{{ $post->user->name }}
                        </div>
                    </a>
                </div>
                @endforeach
            </div> --}}

        <div class="right">
            {{-- <div class="right-menu">
                    <span>{{ $group->group_name }}</span>
                    <div class="kyoyu">
                        <button>共有</button>
                    </div>

                 <div class="kyoyu">
                        <button form="create">編集</button>
                    </div>
                </div> --}}

            <div class="memo-show">
                @if (session('send'))
                    <div class="flash_message">
                        {{ session('send') }}
                    </div>
                @endif
                <div class="group_top">
                    <div class="create-g">
                        <a href="{{ route('showGroupFrom', $group) }}">
                            <span><i class="fa-solid fa-plus"></i></span>
                            新規グループノート作成
                        </a>
                    </div>
                    <p class="g_name">
                        <i class="fa-solid fa-earth-americas fa-2xl" style="color: #647696;"></i>
                        <span>グループ名：{{ $group->group_name }}</span>
                    </p>
                    <div class="invite">
                        <p>グループへ招待する</p>
                        <form action="{{ route('inviteGroup', $group) }}" method="post">
                            @csrf
                            メールアドレス<input type="text" name="email" required>
                            <button>招待メールを送信</button>
                        </form>
                    </div>
                    <i class="fa-solid fa-people-group" style="color: #667da4;"></i>
                    参加者：<br>
                    @foreach ($group->users as $user)
                        {{ $user->name }}<br>
                    @endforeach
                </div>

            </div>
            <div class="quit">
                <form action="{{ route('quitGroup', $group) }}" method="post" id="delete">
                    @csrf
                    <button>グループを脱退する。</button>
                </form>
            </div>
        </div>

    @endif
</x-layout>
