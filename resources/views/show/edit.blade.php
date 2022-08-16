<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{__('show.edit')}}
        </h2>
    </x-slot>

    <div class="bg-gray-100">
        <div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">

            <div class="mt-10 sm:mt-0">
                <div class="md:grid md:grid-cols-3 md:gap-6">
                    <div class="md:col-span-1">
                        <div class="px-4 sm:px-0">
                            <h3 class="text-lg font-medium leading-6 text-gray-900">{{__('show.details')}}</h3>
                            <p class="mt-1 text-sm text-gray-600">
                                {{__('show.create_description')}}
                            </p>

                            <!-- This example requires Tailwind CSS v2.0+ -->
                            <div class="shadow overflow-hidden sm:rounded-md mt-10">
                                <livewire:movie-api/>
                            </div>

                        </div>
                    </div>
                    <div class="mt-5 md:mt-0 md:col-span-2">
                        <form action="{{route('show.update', $show)}}" method="POST">
                            @csrf <!-- {{ csrf_field() }} -->
                            <input name="_method" type="hidden" value="put" />

                            <livewire:form.show
                                :poster_path="$show->poster_path"
                                :original_title="$show->original_title"
                                :title="$show->title"
                                :overview="$show->overview"
                                :status="$show->status"
                            />
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>
