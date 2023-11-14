<x-layout>
    <x-slot name="title">
        TOP - LikeEvernote
    </x-slot>
    @if ($member)
    <x-list-g :lists="$lists" :group="$group" />
        @endif
            <div class="right">
                <div class="right-menu">
                    <div class="menu_btn">
                        <button form="edit">保存</button>
                    </div>
                </div>

                <form action="{{ route('editGroupNote', ['group' => $group, 'post' => $post]) }}" method="post" id="edit">
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
