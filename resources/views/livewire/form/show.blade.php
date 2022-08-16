<div class="shadow overflow-hidden sm:rounded-md">
            <div class="px-4 py-5 bg-white sm:p-6">
                <x-validation-errors class="mb-4" :errors="$errors"/>

                <div class="grid grid-cols-6 gap-6">
                    <div class="col-span-6 sm:col-span-3 space-y-5">
                        <div>
                            <x-label for="title" :value="__('form.title')"/>
                            <x-input wire:model="title" id="title"
                                     type="text"
                                     name="title"
                                     :value="old('title')" required/>
                        </div>
                        <div>
                            <x-label for="original_title" :value="__('form.original_title')"/>
                            <x-input wire:model="original_title" id="original_title"
                                     type="text"
                                     name="original_title"
                                     :value="old('original_title')" required/>
                        </div>
                        <div>
                            <x-label for="overview" :value="__('form.overview')"/>
                            <div class="mt-1">
                                <textarea rows="4" name="overview" wire:model="overview"
                                          class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md">{{$overview}}</textarea>
                            </div>

                        </div>
                        <label for="status"
                               class="block text-sm font-medium text-gray-700">{{__('form.status')}}</label>
                        <select id="status" name="status" wire:model="status"
                                class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                            <option value="rumored">{{__('show.status.rumored')}}</option>
                            <option value="planned">{{__('show.status.planned')}}</option>
                            <option value="production">{{__('show.status.production')}}</option>
                            <option value="post_production">{{__('show.status.post_production')}}</option>
                            <option value="released">{{__('show.status.released')}}</option>
                            <option value="canceled">{{__('show.status.canceled')}}</option>
                        </select>
                    </div>
                    <div class="col-span-6 sm:col-span-3">
                        <div class="mt-1 flex items-center space-y-5 flex-col">
                            <x-label for="poster_path" :value="__('form.poster_path')"/>

                            <span class="inline-block h-72 w-52 rounded-md shadow overflow-hidden bg-gray-100">
                                @if (isset($poster_path))
                                    <img class="h-full w-full object-cover" src="{{$poster_path}}">
                                @else
                                    <svg class="h-full w-full text-gray-300" fill="currentColor" viewBox="0 0 24 24">
                                        <path
                                            d="M24 20.993V24H0v-2.996A14.977 14.977 0 0112.004 15c4.904 0 9.26 2.354 11.996 5.993zM16.002 8.999a4 4 0 11-8 0 4 4 0 018 0z"></path>
                                    </svg>
                                @endif
                            </span>
                            <x-input
                                    wire:model="poster_path"
                                    id="poster_path"
                                    type="text"
                                    name="poster_path"
                                    :value="old('poster_path')" required/>
                        </div>
                    </div>
                </div>
            </div>
            <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                <button type="submit"
                        class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    Save
                </button>
            </div>
        </div>

