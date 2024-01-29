<div id="search-box" class="my-4 flex flex-col items-center justify-center px-2">
    <div class="flex items-center justify-center">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
            stroke="currentColor" class="h-6 w-6">
            <path stroke-linecap="round" stroke-linejoin="round"
                d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" />
        </svg>

        {{-- the live is like onChange event and no need for btn to submit --}}
        {{-- but here it can send a lot of request to limit that --}}
        {{-- we can use deboundce for timing --}}
        <input wire:model.live.debounce.500ms='search' type="text" placeholder="Search..."
            class="ml-2 rounded bg-gray-100 px-4 py-2 hover:bg-gray-100" />
    </div>
    {{-- <span class="mt-2 block text-xs text-red-500">Error</span> --}}

</div>