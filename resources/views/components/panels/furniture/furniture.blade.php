@props(['furniture'])

<div class="bg-white w-full border border-gray-100 rounded overflow-hidden shadow-lg hover:shadow-2xl pt-4">
    <a class="block w-full h-40" href="{{route('detail', $furniture)}}"><img class="w-full h-full hover:opacity-90 object-cover" src="{{Storage::url($furniture->mainImage()->image)}}" alt="{{$furniture->name}}"></a>
    <div class="px-6 py-4">
        <div class="text-black font-bold text-xl mb-2"><a class="hover:text-indigo-500" href="{{route('detail', $furniture)}}">{{$furniture->name}}</a></div>
        <p class="text-grey-darker text-base">
            <span class="inline-block">{{number_format($furniture->price, 0, '.', ' ')}} ₽</span>
            @if ($furniture->old_price)
                <span class="inline-block line-through pl-6 text-gray-400">{{number_format($furniture->old_price, 0, '.', ' ')}} ₽</span>
            @endif
        </p>
    </div>
</div>
