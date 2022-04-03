<div class="mt-8 max-w-md">
    <div class="grid grid-cols-1 gap-6">
        <div class="block">
            <label for="title" class="text-gray-700 font-bold">Название новости</label>
            <input id="title" type="text" name="title" value="{{old('title', $article->title)}}" class="mt-1 block w-full rounded-md {{ $errors->has('title') ? 'border-red-600' : 'border-gray-300'}} shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" placeholder="">
            @if ($errors->has('title'))
                <span class="text-xs italic text-red-600">{{ $errors->first('title')}}</span>
            @endif
        </div>
        <div class="block">
            <label for="description" class="text-gray-700 font-bold">Краткое описание новости</label>
            <input id="description" name="description" type="text" value="{{old('description', $article->description)}}" class="mt-1 block w-full rounded-md {{ $errors->has('description') ? 'border-red-600' : 'border-gray-300'}} shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" placeholder="">
            @if ($errors->has('description'))
                <span class="text-xs italic text-red-600">{{ $errors->first('description')}}</span>
            @endif
        </div>
        <div class="block">
            <label for="body" class="text-gray-700">Детальное описание</label>
            <textarea id="body" name="body" class="mt-1 block w-full rounded-md {{ $errors->has('body') ? 'border-red-600' : 'border-gray-300'}} shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" rows="3">{{old('body', $article->body)}}</textarea>
            @if ($errors->has('body'))
                <span class="text-xs italic text-red-600">{{ $errors->first('body')}}</span>
            @endif
        </div>
        <div class="block">
            <label for="tags" class="text-gray-700">Изображение</label>
            <input id="image" name="image" type="file" value="{{old('image', $article->image)}}" class="mt-1 block w-full rounded-md {{ $errors->has('tags') ? 'border-red-600' : 'border-gray-300'}} shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" placeholder="">
            @if ($errors->has('image'))
                <span class="text-xs italic text-red-600">{{ $errors->first('image')}}</span>
            @endif
        </div>
        <div class="block">
            <label for="tags" class="text-gray-700">Тэги</label>
            <input id="tags" name="tags" type="text" value="{{old('tags', $article->tags->implode('name', ','))}}" class="mt-1 block w-full rounded-md {{ $errors->has('tags') ? 'border-red-600' : 'border-gray-300'}} shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" placeholder="">
            @if ($errors->has('tags'))
                <span class="text-xs italic text-red-600">{{ $errors->first('tags')}}</span>
            @endif
        </div>
        <div class="block">
            <div class="mt-2">
                <div>
                    <label class="inline-flex items-center cursor-pointer">
                        <input type="checkbox" name="publicated" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-offset-0 focus:ring-indigo-200 focus:ring-opacity-50" {{$article->published_at ? 'checked' : ''}}>
                        <span class="ml-2">Опубликован</span>
                    </label>
                </div>
            </div>
        </div>
        <div class="block">
            <x-panels.form.buttons.submit/>
            <x-panels.form.buttons.cancel/>
        </div>
    </div>
</div>
