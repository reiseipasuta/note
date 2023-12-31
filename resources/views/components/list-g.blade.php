<div class="memolist">
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
                {{ Str::limit($list->body, 100, '...') }}
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
</div>
