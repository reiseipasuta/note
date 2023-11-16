<x-layout>
    <x-slot name="title">
        NOTE
    </x-slot>

    <x-list :lists="$lists" />
            <div class="top-right light">
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
