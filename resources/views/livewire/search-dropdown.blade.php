<div class="px-5 my-5 text-sm gap-3 m-auto w-full lg:w-4/5 min-h-screen">
    <h2 class="text-2xl font-semibold p-2 pl-0 m-4 ml-0">Livewire Search Dropdown</h2>
    <div class="p-0 w-full shadow-sm shadow-slate-200">
        <div class="grid grid-cols-2 justify-between">
            <div class="inline-flex justify-start items-center p-0 m-0">
                <h3 class="text-2xl font-semibold pb-1 pl-5">workflow</h3>
                <ul class="hidden md:inline-flex self-center space-x-3 md:space-x-5 px-3 md:px-5 font-medium">
                    <li class="py-5 border-b-2 border-b-indigo-500">Dashboard</li>
                    <li class="py-5 border-b-2 hover:border-b-indigo-500 border-b-transparent">Team</li>
                    <li class="py-5 border-b-2 hover:border-b-indigo-500 border-b-transparent">Projects</li>
                    <li class="py-5 border-b-2 hover:border-b-indigo-500 border-b-transparent">Calendar</li>
                </ul>
            </div>
            <div class="grid grid-cols-1 justify-self-end items-center py-3 pr-2 text-sm space-y-2">
                <label>
                    <input wire:model.debounce.300ms="search"
                        class="rounded-sm border-2 w-64 sm:w-72 form-input p-1 border-gray-200" type="text"
                        placeholder="Search for songs..." />
                </label>
                @if (strlen(trim($search)) > 0)
                    <div class="relative">
                        <ul class="absolute bg-white w-72 grid grid-cols-1 rounded-sm max-w-full border-gray-200 border-2 max-h-[50vh] overflow-y-scroll"
                            wire:model="searchResults">
                            @forelse($searchResults as $result)
                                <li class="p-2 inline-flex justify-start items-center hover:bg-slate-300">
                                    <div class="">
                                        <img src="{{ $result['artworkUrl100'] }}"
                                            class="w-[100px] h-[100px] object-contain" />
                                    </div>
                                    <div class="ml-2 w-full font-semibold">
                                        <p class="max-w-fit font-bold text-indigo-500">
                                            {{ $result['artistName'] ?? '---' }}</p>
                                        <p class="max-w-fit text-gray-800">{{ $result['trackName'] ?? '---' }}</p>
                                    </div>
                                </li>
                            @empty
                                <li class="p-2 inline-flex justify-center">
                                    "No results for {{ $search }}"
                                </li>
                            @endforelse
                        </ul>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
