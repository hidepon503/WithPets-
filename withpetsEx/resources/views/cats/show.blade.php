<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Pet Profire') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="flex justify-self-auto p-6 text-gray-900 dark:text-gray-100">
                    <img src="{{ asset('storage/' . $cat->image) }}" alt="{{ $cat->name }}" class=" w-2/5  rounded-lg">
                    <div class="w-2/5 ml-12">
                    <p class="text-gray-800 dark:text-gray-300">
                        名前: {{ $cat->name }}
                    </p>
                    <p class="text-gray-600 dark:text-gray-400 text-sm">
                        年齢: {{ $cat->age }}歳
                    </p>
                    <p class="text-gray-600 dark:text-gray-400 text-sm">
                        種類: {{ $cat->kind->name }}
                    </p>
                    <p class="text-gray-600 dark:text-gray-400 text-sm">
                        性別: {{ $cat->gender->name }}
                    </p>
                    <p class="text-gray-600 dark:text-gray-400 text-sm">
                        ステータス: {{ $cat->status->name }}
                    </p>
                    <p class="text-gray-600 dark:text-gray-400 text-sm">
                        説明文: {{ $cat->desc }}
                    </p>
                    <div class="flex mt-4 ">
                        {{-- 編集ボタン --}}
                        <a href="{{ route('cats.edit', $cat) }}" class="mr-4 inline-flex items-center justify-center w-1/5 h-8 font-bold bg-blue-500 text-white rounded hover:bg-blue-700 text-center">編集</a>
                        {{-- 削除ボタン --}}
                        <form method="POST" action="{{ route('cats.destroy', $cat) }}" onsubmit="return confirm('本当に削除しますか？');" class="w-full">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="inline-flex items-center justify-center w-1/5 h-8 font-bold bg-red-500 text-white rounded hover:bg-red-700 text-center">削除</button>
                        </form>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>