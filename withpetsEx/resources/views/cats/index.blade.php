<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Pet Index') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
              <div class="mt-4 mx-4">
                <p>ようこそ{{$user -> name}}さん</p>
              </div>
              <div class="flex flex-wrap gap-4 p-6 text-gray-900 dark:text-gray-100">
                  @foreach ($cats as $cat)
                    <div class="w-1/5 mb-4 p-4 bg-gray-100 dark:bg-gray-700 rounded-lg">
                      <img src="{{ asset('storage/' . $cat->image) }}" alt="{{ $cat->name }}" class="w-full h-40 object-cover rounded-lg">
                      <div class="pt-4">
                        <p class="text-gray-800 dark:text-gray-300">
                          名前： {{ $cat->name }}</p>
                          <p class="text-gray-600 dark:text-gray-400 text-sm">
                            保護日: {{ $cat->created_at->format('Y年m月d日') }}
                          </p>
                          <p class="text-gray-600 dark:text-gray-400 text-sm">
                            ステータス： {{ $cat->status->name }}
                          </p>
                          <a href="{{ route('cats.show', $cat) }}" class="mt-6 mr-4 inline-flex items-center justify-center w-1/3 h-8 font-bold bg-blue-500 text-white rounded hover:bg-blue-700 text-center">詳細</a>
                        </div>
                    </div>
                  @endforeach
              </div>
                {{-- <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("Test") }}
                </div> --}}
            </div>
        </div>
    </div>
</x-app-layout>