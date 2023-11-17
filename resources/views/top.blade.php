{{-- <x-layout>
    <x-slot name="title">
        TOP - NOTE
    </x-slot>

    <div class="top-right">

    </div>

</x-layout> --}}


<x-layout>
    <x-slot name="title">
        TOP - NOTE
    </x-slot>
    @auth
    <x-list :lists="$lists" />
    @endauth
    <div class="top-right">
        {{-- <div class="right-menu">
                </div>

                <div class="memo-show">
                    <div class="memo-body">
                        @if (isset($first_post))

                        @else
                            まだノートはありません。
                        @endif
                    </div>

                </div> --}}
    </div>

</x-layout>
