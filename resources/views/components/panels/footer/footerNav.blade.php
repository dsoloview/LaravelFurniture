    <ul class="list-group list-group-horizontal">
        <li class="ml-4" style="display:inline"><a class="{{Request()->routeis('about') ? 'text-indigo-500 cursor-default' : 'text-gray-600 hover:text-indigo-500'}}" href="{{ route('about') }}">О компании</a></li>
        <li class="ml-4"  style="display:inline"><a class="{{Request()->routeis('contacts') ? 'text-indigo-500 cursor-default' : 'text-gray-600 hover:text-indigo-500'}}"      href="{{ route('contacts') }}">Контактная информация</a></li>
        <li class="ml-4"  style="display:inline"><a class="{{Request()->routeis('terms') ? 'text-indigo-500 cursor-default' : 'text-gray-600 hover:text-indigo-500'}}" href="{{ route('terms') }}">Условия продаж</a></li>
    </ul>
