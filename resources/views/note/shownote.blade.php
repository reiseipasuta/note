<x-layout>
    <x-slot name="title">
        TOP - LikeEvernote
    </x-slot>

            <div class="memolist">
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
            </div>
            <div class="right">
                <div class="right-menu">
                    @if ($group)
                        <span>グループ共有</span>
                    @else
                        <span>自分のみ</span>
                    @endif
                    <div class="kyoyu">
                        <a href="{{ route('shareForm', $post) }}">共有</a>
                    </div>
                    {{-- <div class="kyoyu">
                        <button form="create">保存</button>
                    </div> --}}
                </div>

                <div class="memo-show">
                    <div class="title">
                        {{ $post->title }}
                    </div>
                    <div class="memo-body">
                        {{ $post->body }}
                    </div>

                </div>
            </div>

</x-layout>
