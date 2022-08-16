<div class="px-4 py-1 bg-white ">
    <div class="mb-6 mt-3">
        <div>
            <label for="email" class="block text-sm font-medium text-gray-700">Search Shows</label>
            <div class="mt-1 flex rounded-md shadow-sm">
                <div class="relative flex items-stretch flex-grow focus-within:z-10">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z" />
                        </svg>
                    </div>
                    <input
                        type="text"
                        name="query"
                        wire:model.lazy="query"
                        class="focus:ring-indigo-500 focus:border-indigo-500 block w-full rounded-none rounded-l-md pl-10 sm:text-sm border-gray-300"
                        placeholder="Matrix...">
                </div>
                <button
                    wire:click="search"
                    type="button" class="-ml-px relative inline-flex items-center space-x-2 px-4 py-2 border border-gray-300 text-sm font-medium rounded-r-md text-gray-700 bg-gray-50 hover:bg-gray-100 focus:outline-none focus:ring-1 focus:ring-indigo-500 focus:border-indigo-500">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                    </svg>
                    <span>Search</span>
                </button>
            </div>
        </div>
    </div>
    <div class="flow-root my-6">
        <ul role="list" class="-my-5 divide-y divide-gray-200 max-h-80 overflow-y-auto">
            @forelse ($items as $item)
                <li class="py-4">
                    <div class="flex items-center space-x-4">
                        <div class="flex-shrink-0">
                            @if (isset($item->poster_path))
                            <img class="h-8 w-8 rounded-full object-cover"
                                 src="https://image.tmdb.org/t/p/w200/{{ $item->poster_path }}"
                                 alt="">
                            @else
                                <img class="h-8 w-8 rounded-full"
                                     src="/No-image-available.png"
                                     alt="">
                            @endif
                        </div>
                        <div class="flex-1 min-w-0">
                            <p class="text-sm font-medium text-gray-900 truncate">{{ $item->title }}</p>
                            <p class="text-sm text-gray-500 truncate">{{ $item->title }}</p>
                        </div>
                        <div>
                            <a href="#"
                               wire:click="$emit('fetchMovie', @js($item->id))"
                               class="inline-flex items-center shadow-sm px-2.5 py-0.5 border border-gray-300 text-sm leading-5 font-medium rounded-full text-gray-700 bg-white hover:bg-gray-50">
                                Load Data </a>
                        </div>
                    </div>
                </li>
            @empty
                <li class="py-4 text-center">
                    {{__('show.search_movies')}}
                </li>
            @endforelse

        </ul>
    </div>

</div>
