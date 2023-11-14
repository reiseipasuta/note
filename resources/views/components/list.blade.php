<div class="memolist">
    <div class="memolist-top">
        <i class="fa-regular fa-pen-to-square fa-xl" style="color: #435370;"></i>
        <span>ノート</span>
    </div>
    @foreach ($lists as $list)
    <div class="memo">
        <a href="{{ route('shownote', $list) }}">
            <div>
                {{ $list->title }}
            </div>

            <div>
                {{ Str::limit($list->body, 100, '...') }}
            </div>

            <div>
                {{ $list->created_at }}
            </div>
        </a>
    </div>
    @endforeach
</div>
