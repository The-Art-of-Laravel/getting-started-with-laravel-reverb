<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center"
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Messages') }}
        </h2>

        <a href="{{ route('message.start') }}" class="inline-block py-2 px-4 rounded bg-indigo-950 text-white">Start a chat...</a>
    </x-slot>


    <div class="py-12">

        @forelse($messageGroups as $messageGroup)
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 pb-2">
            <a href="{{ route('message.group', ['messageGroup' => $messageGroup]) }}">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                        @foreach($messageGroup->users as $user)
                            @if($loop->last)
                                <span> {{ $user->name }}</span>
                            @else
                                <span> {{ $user->name }}, </span>
                            @endif
                        @endforeach

                </div>
            </div>
            </a>
        </div>

        @empty
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 pb-2  text-center">
                <div class="p-6 text-gray-400 text-2xl">
                    {{ __("Let's start talking...") }}

                </div>
                <a href="{{ route('message.start') }}" class="inline-block py-4 px-6 rounded my-8 bg-indigo-950 text-white">Start a chat...</a>
            </div>
        @endforelse
    </div>
</x-app-layout>
