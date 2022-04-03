<header class="bg-white">
    <div class="border-b">
        <div class="container mx-auto block sm:flex sm:justify-between sm:items-center py-4 px-4 sm:px-0 space-y-4 sm:space-y-0">
            <div class="flex justify-center">
                <span class="inline-block sm:inline">
                    <a href="/">Laravel Furniture</a>
                </span>
            </div>
            @if (Illuminate\Support\Facades\Auth::check())
                <x-panels.auth.auth />
            @else
                <x-panels.auth.notAuth />
            @endif
        </div>

    </div>
    <div class="border-b">
        <div class="container mx-auto block lg:flex justify-between items-center px-2 sm:px-0">
            <x-panels.menu.menu/>
        </div>
    </div>
</header>
