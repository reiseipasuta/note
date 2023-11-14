<x-layout>
    <x-slot name="title">
        グループ作成 - LikeEvernote
    </x-slot>

    <div class="top-right">
        <div class="flex">
            <div class="group-create">
                <p>新規グループ作成</p>
                <div class="">
                    <form action="{{ route('createGroup') }}" method="post">
                        @csrf
                        グループ名<input type="text" name="group_name">
                        <button>作成</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

</x-layout>
