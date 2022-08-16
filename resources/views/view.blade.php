<x-guest-layout>
    <div class="bg-white">
        <div class="pt-6">
            <!-- Product info -->
            <div class="max-w-2xl mx-auto pt-10 pb-16 px-4 sm:px-6 lg:max-w-7xl lg:pt-16 lg:pb-24 lg:px-8 lg:grid lg:grid-cols-3 lg:grid-rows-[auto,auto,1fr] lg:gap-x-8">
                <div class="lg:col-span-2 lg:border-r lg:border-gray-200 lg:pr-8">

                    <h1 class="text-2xl font-bold tracking-tight text-gray-900 sm:tracking-tight sm:text-3xl">{{ $show->title }} </h1>
                    <h3 class="text-sm font-medium text-gray-900">{{ $show->original_title }}</h3>

                </div>

                <!-- Options -->
                <div class="mt-4 lg:mt-0 lg:row-span-3 relative">
                    <span class="m-1 z-50 absolute inline-flex rounded-full items-center px-1 py-0.5 text-sm font-medium bg-indigo-100 text-indigo-700">
                      {{__("show.status.$show->status")}}
                    </span>
                    <div class="aspect-w-4 aspect-h-5 sm:rounded-lg sm:overflow-hidden lg:aspect-w-3 lg:aspect-h-4">
                        <img src="{{ $show->poster_path }}" alt="{{ $show->title }}" class="w-full h-full object-center object-cover">
                    </div>
                </div>

                <div class="py-10 lg:pt-6 lg:pb-16 lg:col-start-1 lg:col-span-2 lg:border-r lg:border-gray-200 lg:pr-8">
                    <!-- Description and details -->
                    <div>
                        <h3 class="sr-only">Description</h3>

                        <div class="space-y-6">
                            <p class="text-base text-gray-900">
                                {{ $show->overview }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



</x-guest-layout>
