<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Creer un post') }}
        </h2>
    </x-slot>

    <div class="flex flex-col justify-between">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mt-10 ">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight mb-3">
                Ajouter un post
            </h2>
            @if(session()->has('success'))
            <div class="my-5 bg-green-700">
                <h5>{{ session()->get('success') }}</h5>
            </div>
            @endif
            <form class="w-full max-w-lg" method="post" action="{{ route('posts.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="flex flex-wrap -mx-3 mb-6">
                    <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="title">
                            Titre du post
                        </label>
                        <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" name="title" id="title" type="text" placeholder="Titre du post">
                        @if($errors->has('title'))
                        <p class="text-red-500 text-xs italic">{{ $errors->first('title') }}</p>
                        @endif
                    </div>
                    <div class="w-full md:w-1/2 px-3">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="category">
                            Categorie du post
                        </label>
                        <div class="relative">
                            <select class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500" name="category" id="category">
                                @foreach ($categories as $category )
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('category'))
                            <p class="text-red-500 text-xs italic">{{ $errors->first('category') }}</p>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="flex flex-wrap -mx-3 mb-6">
                    <div class="w-full px-3">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="content">
                            Contenu du post
                        </label>
                        <textarea class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" name="content" id="content">
                </textarea>
                        @if($errors->has('content'))
                        <p class="text-red-500 text-xs italic">{{ $errors->first('content') }}</p>
                        @endif
                    </div>
                </div>
                <div class="flex flex-wrap -mx-3 mb-6">
                    <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                        <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" name="image" id="image" type="file">
                        @if($errors->has('image'))
                        <p class="text-red-500 text-xs italic">{{ $errors->first('image') }}</p>
                        @endif
                    </div>
                    <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                        <button type="submit" class="appearance-none block w-full bg-indigo-200 text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white">Ajouter</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

</x-app-layout>
