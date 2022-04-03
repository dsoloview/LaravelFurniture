<aside class="hidden sm:block col-span-1 border-r p-4">
    <nav>
        <ul class="text-sm">
            <li>
                <p class="text-xl text-black font-bold mb-4">Информация</p>
                <ul class="space-y-2">
                    <li><a class="{{Request()->routeis('about') ? 'text-indigo-500 cursor-default' : 'hover:text-indigo-500'}}" href="{{ route('about') }}">О компании</a></li>
                    <li><a class="{{Request()->routeis('contacts') ? 'text-indigo-500 cursor-default' : 'hover:text-indigo-500'}}" href="{{ route('contacts') }}">Контактная информация</a></li>
                    <li><a class="{{Request()->routeis('terms') ? 'text-indigo-500 cursor-default' : 'hover:text-indigo-500'}}" href="{{ route('terms') }}">Условия продаж</a></li>
                </ul>
            </li>
        </ul>
    </nav>
</aside>
