<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if (session('success'))
                {{ sesion('success') }}
            @endif

            <div class="bg-white overflow-hidden show-sm sm:rounded-lg">
                @foreach ($posts as $post )
                <div class="flex items-center">
                    <a href="{{ route('posts.edit', $post) }}" class="bg-yellow-500 px-2 py-3 blocl">Editer</a>
                    <a href="{{ route('posts.destroy', $post) }}" class="bg-red-500 px-2 py-3 blocl">Supprimer</a>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</x-app-layout>
