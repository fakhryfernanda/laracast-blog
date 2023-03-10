<div x-data="{ show : false }" @click.away="show = false">
    <button 
        @click="show = ! show" 
        class="py-2 pl-3 pr-9 text-sm font-semibold w-full lg:w-32 text-left flex lg:inline-flex"
    >
        {{ isset($currentCategory) ? ucwords($currentCategory->name) : 'Categories' }}

        <x-icon name="down-arrow" class="absolute pointer-events-none" style="right: 12px;"/>
    </button>
    
    <div x-show="show" class="py-2 absolute bg-gray-100 mt-2 rounded-xl w-full z-50 overflow-auto max-h-52">
        <x-dropdown-item href="/?{{ http_build_query(request()->except('category', 'page')) }}"
                    :active="request()->routeIs('home')">All
        </x-dropdown-item>

        @foreach ($categories as $category)
            <x-dropdown-item
                href="/?category={{ $category->slug }}&{{ http_build_query(request()->except('category', 'page')) }}"
                :active='request()->is("categories/{$category->slug}")'
            >
                {{ ucwords($category->name) }}
            </x-dropdown-item>
        @endforeach
    </div>
</div>