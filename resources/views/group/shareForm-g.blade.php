<x-layout>
    <x-slot name="title">
        TOP - LikeEvernote
    </x-slot>
        @if ($member)
        <x-list-g :lists="$lists" :group="$group" />
        {{-- <div class="memolist">
            <div class="memolist-top">
                <img src="https://img.icons8.com/cotton/344/create-new--v5.png" alt="" width="30px" height="30px">
                <span>ノート</span>
            </div>
            @foreach ($lists as $list)
            <div class="memo">
                <a href="{{ route('showGroupNote',  ['group' => $group, 'post' => $list]) }}">
                    <div>
                        {{ $list->title }}
                    </div>

                    <div>
                        {{ $list->body }}
                    </div>

                    <div>
                        {{ $list->created_at }}
                    </div>

                    <div>
                        名前：{{ $list->user->name }}
                    </div>
                </a>
            </div>
            @endforeach
        </div> --}}
        @endif
            <div class="right">
                <div class="right-menu">
                    {{-- <span>自分のみ</span> --}}
                    <div class="kyoyu">
                        <button>共有</button>
                    </div>
                    <div class="kyoyu">
                        <button form="edit">編集</button>
                    </div>
                </div>

                <div class="memo-show">
                    @if(session('send'))
                    <div class="flash_message">
                        {{ session('send') }}
                    </div>
                    @endif
                    <form action="{{ route('share', $post) }}" method="post" class="share-form">
                        @csrf
                        メールアドレス：<input type="text" name="email">
                        <button>共有する</button>
                    </form>
                    <div class="title">
                        {{ $post->title }}
                    </div>
                    <div class="memo-body">
                        {!! nl2br(e($post->body)) !!}
                    </div>

                </div>
            </div>

</x-layout>
