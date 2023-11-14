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
                    {{-- <div class="kyoyu">
                        <a href="{{ route('shareForm', $post) }}">共有</a>
                    </div> --}}
                    {{-- グループに共有する
                    @foreach ($groups as $group)
                        <input type="checkbox" name="" form="create">{{ $group->group_name }}
                    @endforeach --}}
                    <div class="menu_btn">
                        <button form="create">保存</button>
                    </div>
                </div>

                <form action="{{ route('createGroupNote', $group) }}" method="post" id="create">
                    @csrf
                    <div class="memo-show-create">
                        <label for="title">
                            <div class="title-create">
                                <textarea name="title" id="title" placeholder="題名" required></textarea>
                            </div>
                        </label>
                        <label for="body">
                            <div class="memo-body-create">
                                <textarea name="body" id="body" placeholder="本文" required></textarea>
                            </div>
                        </label>
                    </div>
                    {{-- <input type="hidden" name="user_id" value="{{ Auth::id() }}"> --}}
                </form>
            </div>

</x-layout>
