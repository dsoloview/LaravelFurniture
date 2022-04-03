@php
    $service = new App\Services\MenuActiveService($categoryRepository);
@endphp
<nav class="order-1">
    <ul class="block lg:flex">
        @foreach ($categories as $category)
                @if ($category->children->isEmpty())
                    <li class="group"><a class="inline-block p-4 font-bold hover:text-indigo-500 {{($service->isActive($category, Request()->path())) ? 'text-indigo-500'  : 'text-black' }}" href="{{route('category', ['category' => $category])}}">{{$category->name}}</a></li>
                @else
                    <li class="group">
                        <a class="inline-block p-4 {{($service->isActive($category, Request()->path())) ? 'text-indigo-500'  : 'text-black' }} font-bold border-l border-r border-transparent group-hover:text-indigo-500 group-hover:bg-gray-100 group-hover:border-l group-hover:border-r group-hover:border-gray-200 group-hover:shadow" href="{{route('category', ['category' => $category])}}">
                            {{$category->name}}
                            <svg xmlns="http://www.w3.org/2000/svg" class="inline-block h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                            </svg>
                        </a>
                        <ul class="dropdown-navigation-submenu absolute hidden group-hover:block bg-white shadow-lg">
                        @foreach ($category->children as $child)
                            @if ($child->parent_id == $category->id)
                                <li><a class="block py-2 px-4 {{(strstr(Request()->path(), $child->slug)) ? 'text-indigo-500'  : 'text-black' }} hover:text-indigo-500 hover:bg-gray-100" href="{{route('category', ['category' => $child])}}">{{$child->name}}</a></li>
                            @endif

                        @endforeach
                        </ul>
                    </li>
                @endif
        @endforeach
            <li class="group"><a class="inline-block {{(strstr(Request()->path(), 'newarrivals')) ? 'text-indigo-500'  : 'text-black' }} p-4 font-bold hover:text-indigo-500" href="{{route('newarrivals')}}">Новинки</a></li>
            <li class="group"><a class="inline-block {{(strstr(Request()->path(), 'sale')) ? 'text-indigo-500'  : 'text-black' }} p-4 font-bold hover:text-indigo-500" href="{{route('sale')}}">Распродажа</a></li>
</nav>
