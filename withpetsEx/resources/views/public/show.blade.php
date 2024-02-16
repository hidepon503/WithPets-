<x-layout>
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
            <div class="w-1/5 mx-12">
              <p class="text-gray-800 dark:text-gray-300">
                名前: {{ $cat->name }}
              </p>
              <p class="text-gray-600 dark:text-gray-400 text-sm">種類: {{ $cat->kind->name }}</p>
              <p class="text-gray-600 dark:text-gray-400 text-sm">年齢: {{ $cat->age }}歳</p>
              <p class="text-gray-600 dark:text-gray-400 text-sm">
                性別: {{ $cat->gender->name }}
              </p>
              <p class="text-gray-600 dark:text-gray-400 text-sm">
                保護日: {{ $cat->created_at->format('Y年m月d日') }}
              <p class="text-gray-600 dark:text-gray-400 text-sm">
                紹介文: {{ $cat->desc }}
              </p>
            </div>
            <div class="w-1/3">
              <img src="{{ asset('storage/' . $cat->user->image) }}" alt="保護団体イメージ" class=" w-full  rounded-lg">
              <p class="text-gray-800 dark:text-gray-300">
                保護団体: {{ $cat->user->name }}
              </p>
              {{-- 代表者の写真を挿入 --}}
              <img src="{{ asset('storage/' . $cat->user->owner_image) }}" alt="代表者イメージ" class=" w-full  rounded-lg">
              <p class="text-gray-600 dark:text-gray-400 text-sm">
                代表: {{ $cat->user->owner_name }}
              </p>
              <p class="text-gray-600 dark:text-gray-400 text-sm">
                住所:{{ $cat->user->prefecture }}{{ $cat->user->address }}
              </p>
              <p class="text-gray-600 dark:text-gray-400 text-sm">
                電話番号: {{ $cat->user->tel }}
              </p>
              <p class="text-gray-600 dark:text-gray-400 text-sm">
                Email: {{ $cat->user->email }}
              </p>
              {{-- url --}}
              <p>
                公式URL:
                <a href="{{ $cat->user->url }}" class="text-blue-500 dark:text-blue-300 text-sm">
                  {{ $cat->user->url }}
                </a>
              </p>




              


          </div>
        </div>
      </div>
    </div>
    

</x-app-layout>