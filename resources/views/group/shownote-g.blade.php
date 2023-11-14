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
                    <span>グループ名：{{ $group->group_name }}</span>
                    <div class="kyoyu">
                        <a href="{{ route('shareForm_g', ['post' => $post, 'group' => $group]) }}">共有</a>
                    </div>
                    @if($member)
                    <div class="kyoyu">
                        <button form="edit">編集</button>
                    </div>
                    @endif
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
