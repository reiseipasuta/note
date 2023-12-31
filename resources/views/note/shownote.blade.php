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
                    @if (isset($group))
                        <span>グループ【{{ $group->group_name }}】で共有されているノート</span>
                    @else
                        <span>自分のみ</span>
                    @endif
                    <div class="menu_btn">
                        <a href="{{ route('shareForm', $post) }}">共有</a>
                    </div>
                    @if ($post->user_id === Auth::id())
                    <div class="menu_btn">
                        <a href="{{ route('getEdit', $post) }}">編集</a>
                    </div>
                    @endif
                    {{-- <div class="kyoyu">
                        <button form="create">保存</button>
                    </div> --}}
                </div>

                <div class="memo-show">
                    <div class="title">
                        {{ $post->title }}
                    </div>
                    <div class="memo-body">
                        {!! nl2br(e($post->body)) !!}
                    </div>

                </div>
            </div>

</x-layout>
