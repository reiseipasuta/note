<x-layout>
    <x-slot name="title">
        NOTE
    </x-slot>

            <div class="right">
                <div class="right-menu">
                    <span>製作者：{{ $post->user->name }}</span>
                    {{-- <div class="menu_btn">
                        <a href="{{ route('shareForm', $post) }}">共有</a>
                    </div> --}}
                </div>

                <div class="memo-show">
                    <div class="title">
                        {{ $post->title }}
                    </div>
                    <div class="memo-body">
                        {!! nl2br(e($post->body)) !!}
                    </div>

                </div>
            </div>

</x-layout>
