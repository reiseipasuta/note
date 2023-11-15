<x-layout>
    <x-slot name="title">
        TOP - LikeEvernote
    </x-slot>

    <x-list :lists="$lists" />
            <div class="top-right">
                {{-- <div class="right-menu">
                </div>

                <div class="memo-show">
                    <div class="memo-body">
                        @if(isset($first_post))

                        @else
                            まだノートはありません。
                        @endif
                    </div>

                </div> --}}
            </div>

</x-layout>
