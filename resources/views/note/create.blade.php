<x-layout>
    <x-slot name="title">
        TOP - LikeEvernote
    </x-slot>
    <x-list :lists="$lists" />
            {{-- <div class="memolist">
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
            </div> --}}
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
                    <div class="kyoyu">
                        <button form="create">保存</button>
                    </div>
                </div>

                <form action="{{ route('create') }}" method="post" id="create">
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
