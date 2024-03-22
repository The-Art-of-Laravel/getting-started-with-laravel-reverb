<div>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Start a message...
        </h2>
    </x-slot>
    <div class="relative max-w-2xl mx-auto p-4 ">
        <div class="flex justify-between items-center bg-white mb-2 p-4 rounded-full shadow">
            <div class="flex w-full">
                <x-text-input wire:model.live.debounce="search" type="text" class="w-full border-0 shadow-none focus:ring-none" placeholder="Who do you like to talk to?" />
            </div>
        </div>
        @isset($users)
            <div>
                @foreach($users as $user)
                    <span class="pr-2 underline">{{ $user->name }}</span>
                @endforeach
            </div>
        @endisset
        @if(!empty($search))
            <div>
                @foreach($searchUsers as $user)
                    <div wire:click="addUser({{ $user->id }})" class="bg-white mb-2 p-4 rounded-full shadow">
                        <div>{{ $user->name  }}</div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
    <div class="w-full fixed bottom-0">
        <div class="max-w-2xl mx-auto p-4 bg-white mb-2 rounded-full shadow">
            <div class="flex justify-between items-center">
                <div class="flex w-full">
                    <x-text-input wire:model.blur="message" type="text" id="message-input" class="w-full border-0 shadow-none focus:ring-none" placeholder="Your message here..." />
                </div>
                <div class=" flex justify-end">
                    <div wire:click="send" class="pl-4">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M17.25 8.25 21 12m0 0-3.75 3.75M21 12H3" />
                        </svg>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
