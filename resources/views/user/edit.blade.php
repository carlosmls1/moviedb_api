<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{__('user.create')}}
        </h2>
    </x-slot>

    <div class="bg-gray-100">
        <div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">

            <div class="mt-10 sm:mt-0">
                <div class="md:grid md:grid-cols-3 md:gap-6">
                    <div class="md:col-span-1">
                        <div class="px-4 sm:px-0">
                            <h3 class="text-lg font-medium leading-6 text-gray-900">{{__('user.details')}}</h3>
                            <p class="mt-1 text-sm text-gray-600">
                                {{__('user.create_description')}}
                            </p>
                            <p class="mt-3">
                                <x-validation-errors class="mb-4" :errors="$errors"/>
                            </p>
                        </div>
                    </div>
                    <div class="mt-5 md:mt-0 md:col-span-2">


                        <form action="{{route('user.update', $user)}}" method="POST">
                            @csrf <!-- {{ csrf_field() }} -->
                            <input name="_method" type="hidden" value="put" />

                            <div class="shadow overflow-hidden sm:rounded-md">
                                <div class="px-4 py-5 bg-white sm:p-6">
                                    <div class="grid grid-cols-6 gap-6">
                                        <div class="col-span-6 sm:col-span-6">
                                            <x-label for="name" :value="__('form.name')"/>

                                            <x-input id="name"
                                                     type="text"
                                                     name="name"
                                                     :value="old('name', $user->name)" />
                                        </div>
                                        <div class="col-span-6 sm:col-span-6">
                                            <x-label for="email" :value="__('form.email')"/>
                                            <x-input id="email"
                                                     type="email"
                                                     name="email"
                                                     :value="old('email', $user->email)" />
                                        </div>

                                        <div class="col-span-6 sm:col-span-3">
                                            <x-label for="password" :value="__('form.password')"/>
                                            <x-input id="password"
                                                     type="password"
                                                     name="password"/>
                                        </div>
                                        <div class="col-span-6 sm:col-span-3">
                                            <x-label for="password_confirmation" :value="__('form.password_confirmation')"/>
                                            <x-input id="password_confirmation"
                                                     type="password"
                                                     name="password_confirmation"/>
                                        </div>

                                    </div>
                                </div>
                                <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                                    <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                        Save
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>
