<x-layout>
    <x-slot name="title">
        TOP - LikeEvernote
    </x-slot>

            <div class="memolist">
                <div class="memolist-top">
                    <img src="https://img.icons8.com/cotton/344/create-new--v5.png" alt="" width="30px" height="30px">
                    <span>ノート</span>
                </div>
                @foreach ($posts as $post)
                <div class="memo">
                    <a href="{{ route('shownote', $post) }}">
                        <div>
                            {{ $post->title }}
                        </div>

                        <div>
                            {{ $post->body }}
                        </div>

                        <div>
                            {{ $post->created_at }}
                        </div>
                    </a>
                </div>
                @endforeach
            </div>
            <div class="right">
                <div class="right-menu">
                    {{-- <span>自分のみ</span> --}}
                    <div class="kyoyu">
                        <a href="{{ route('shareForm', $post) }}">共有</a>
                    </div>
                    <div class="kyoyu">
                        <button form="create">編集</button>
                    </div>
                </div>

                <div class="memo-show">
                    <div class="title">
                        @if(isset($first_post))
                            {{ $first_post->title }}
                        @endif
                    </div>
                    <div class="memo-body">
                        @if(isset($first_post))
                            {{ $first_post->body }}
                        @else
                            まだノートはありません。
                        @endif
                    </div>

                </div>
            </div>

</x-layout>
