<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Edit Profire') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form method="POST" action="{{ route('cats.update',['cat' => $cat->id]) }}" enctype="multipart/form-data" onsubmit="return confirm('本当に更新しますか？');">
                        @csrf
                        @method('PUT')
                        <div class="mb-4">
                            <label for="cat" class="block text-gray-700 dark:text-gray-300 text-sm font-bold mb-2">Cat Name</label>
                            <input type="text" name="name" id="cat" value="{{ $cat->name }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 dark:text-gray-300 dark:bg-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                            @error('name')
                                <span class="text-red-500 text-xs italic">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label for="age" class="block text-gray-700 dark:text-gray-300 text-sm font-bold mb-2">Age</label>
                            <select name="age" id="age" value="" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 dark:text-gray-300 dark:bg-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                                @foreach (range(0, 30) as $age)
                                    <option value="{{ $age }}" {{ $cat->age == $age ? 'selected' : '' }}>{{ $age }} <p>歳</p></option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-4">
                            <label for="kind" class="block text-gray-700 dark:text-gray-300 text-sm font-bold mb-2">Kind</label>
                            <select name="kind_id" id="kind" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 dark:text-gray-300 dark:bg-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                                @foreach ($kinds as $kind)
                                    <option value="{{ $kind->id }}" {{ $cat->kind_id == $kind->id ? 'selected' : '' }} >{{ $kind->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-4">
                            {{-- ラジオボタンを利用してgender_idを選択する --}}
                            <label class="block text-gray-700 dark:text-gray-300 text-sm font-bold mb-2">Gender</label>
                            <div class="flex  items-center mb-2">
                                @foreach ($genders as $gender)
                                    <input type="radio" id="gender_{{ $gender->id }}" name="gender_id" value="{{ $gender->id }}" value="{{ $gender->id }}" class="mr-2" {{ $cat->gender_id == $gender->id ? 'checked' : '' }}>
                                    <label for="gender_{{ $gender->id }}" class="text-gray-700 mr-8 dark:text-gray-300">{{ $gender->name }}</label>
                                    {{-- 上記のラジオボタンを横一列に並び替えてtaコードを記述してださい --}}
                                @endforeach
                            </div>
                        </div>
                        {{-- status --}}
                        <div class="mb-4">
                            <label for="status" class="block text-gray-700 dark:text-gray-300 text-sm font-bold mb-2">Status</label>
                            <select name="status_id" id="status" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 dark:text-gray-300 dark:bg-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                                @foreach ($statuses as $status)
                                    <option value="{{ $status->id }}">{{ $status->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-4">
                            <label for="desc" class="block text-gray-700 dark:text-gray-300 text-sm font-bold mb-2">Description</label>
                            <textarea name="desc" id="desc" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 dark:text-gray-300 dark:bg-gray-700 leading-tight focus:outline-none focus:shadow-outline" maxlength="200">{{ $cat->desc }}</textarea>
                        </div>
                        <!-- サムネイル画像の表示 -->
                        @if($cat->image)
                            <img src="{{ asset('storage/' . $cat->image) }}" alt="Current Image" id="preview" class="mb-4 w-20 h-20 object-cover">
                        @endif

                        <div class="mb-4">
                            <label for="image" class="block text-gray-700 dark:text-gray-300 text-sm font-bold mb-2">Image</label>
                            <!-- 画像アップロードのためのinputタグ -->
                            <input type="file" name="image" id="image" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 dark:text-gray-300 dark:bg-gray-700 leading-tight focus:outline-none focus:shadow-outline" onchange="previewImage(event)">
                        </div>
                        <button type="submit"  class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">更新</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

<script>
    function previewImage(event) {
        var reader = new FileReader();
        reader.onload = function(e) {
            var preview = document.getElementById('preview');
            preview.src = e.target.result; // 読み込まれたファイルの内容（データURL）をsrc属性に設定
            preview.style.display = 'block'; // 画像が選択されたら表示状態に変更
        };
        reader.readAsDataURL(event.target.files[0]); // 選択されたファイルの読み込みを開始
    }
</script>

</x-app-layout>