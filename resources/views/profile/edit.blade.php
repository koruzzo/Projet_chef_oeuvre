<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Profile') }}
        </h2>
    </x-slot>

    <ul class="text-gray-600 hidden md:flex">
        <li class="nav-item">
            @if(auth()->user()->biography)
                <a href="{{ route('biographies.edit', auth()->user()->biography->id) }}" class="ml-6 font-medium text-indigo-600 hover:text-indigo-500">Modifier Biographie</a>
            @else
                <a href="{{ route('biographies.create') }}" class="ml-6 font-medium text-indigo-600 hover:text-indigo-500">Créer Biographie</a>
            @endif
        </li>
    </ul>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.update-password-form')
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.delete-user-form')
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
