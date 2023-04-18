<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ $post->title }}
        </h2>
    </x-slot>

    <div class="flex flex-col justify-between">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mt-10 ">
            <div class="max-w-sm rounded overflow-hidden shadow-lg">
                <img src="{{ asset('/storage/'.$post->image) }}" alt="Image du post" class="w-full">
                <div class="px-6 py-4">
                    <div class="font-bold text-xl mb-2">{{ $post->title }}</div>
                    <p class="text-gray-700 text-base">
                        {{ $post->content }}
                    </p>
                </div>
                <div class="px-6 pt-4 pb-2">
                    <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">#photography</span>
                    <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">#travel</span>
                    <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">#winter</span>
                </div>
            </div>

    </div>

</x-app-layout>
