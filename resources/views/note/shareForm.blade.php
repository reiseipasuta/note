<x-layout>
    <x-slot name="title">
        NOTE
    </x-slot>
            <x-list :lists="$lists" />
            {{-- <div class="memolist">
                <div class="memolist-top">
                    <img src="https://img.icons8.com/cotton/344/create-new--v5.png" alt="" width="30px" height="30px">
                    <span>ノート</span>
                </div>
                @foreach ($lists as $list)
                <div class="memo">
                    <a href="{{ route('shownote', $list) }}">
                        <div>
                            {{ $list->title }}
                        </div>

                        <div>
                            {{ $list->body }}
                        </div>

                        <div>
                            {{ $list->created_at }}
                        </div>
                    </a>
                </div>
                @endforeach
            </div> --}}
            <div class="right">
                <div class="right-menu">
                    {{-- <span>自分のみ</span> --}}
                    <div class="menu_btn">
                        <button>共有</button>
                    </div>
                    <div class="menu_btn">
                        <button form="edit">編集</button>
                    </div>
                </div>

                <div class="memo-show">
                    @if(session('send'))
                    <div class="flash_message">
                        {{ session('send') }}
                    </div>
                    @endif
                    <form action="{{ route('share', $post) }}" method="post">
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
