<x-layout>
    <x-slot name="title">
        TOP - LikeEvernote
    </x-slot>
    <x-list :lists="$lists" />
    <div class="right">
        <div class="right-menu">
            <div class="menu_btn delete">
                <form method="POST" action="{{ route('destroy', $post) }}">
                    @csrf
                    @method('DELETE')
                    <button>削除</button>
                </form>
            </div>
            <div class="menu_btn">
                <button form="create">保存</button>
            </div>
        </div>

        <form action="{{ route('edit', $post) }}" method="post" id="create">
            @method('PATCH')
            @csrf
            <div class="memo-show-create">
                <label for="title">
                    <div class="title-create">
                        <textarea name="title" id="title" placeholder="題名" required>{{ $post->title }}</textarea>
                    </div>
                </label>
                <label for="body">
                    <div class="memo-body-create">
                        <textarea name="body" id="body" placeholder="本文" required>{{ $post->body }}</textarea>
                    </div>
                </label>
            </div>
        </form>
    </div>

</x-layout>
