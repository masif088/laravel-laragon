<aside
    class="fixed inset-y-0 flex-wrap items-center justify-between block w-full p-0 my-4 overflow-y-auto antialiased transition-transform duration-200 -translate-x-full bg-white border-0 shadow-xl dark:shadow-none dark:bg-slate-850 max-w-64 ease-nav-brand z-990 xl:ml-6 rounded-2xl xl:left-0 xl:translate-x-0"
    aria-expanded="false">
    <div class="h-19">
        <i class="absolute top-0 right-0 p-4 opacity-50 cursor-pointer fas fa-times dark:text-white text-slate-400 xl:hidden"ml-20
           sidenav-close></i>
        <a class="block px-8 py-4 m-0 text-sm whitespace-nowrap dark:text-white text-slate-700"
           href="#" target="_blank">
            <img src="{{ asset('img.png') }}"
                 class="inline h-full  transition-all duration-200 dark:hidden ease-nav-brand max-h-10"
                 alt="main_logo"/>
            <img src="{{ asset('img.png') }}"
                 class="hidden h-full max-w-full transition-all duration-200 dark:inline ease-nav-brand max-h-10"
                 alt="main_logo"/>
            <span class="ml-1 font-semibold transition-all duration-200 ease-nav-brand"></span>
        </a>
    </div>
    <hr class="h-px mt-0 bg-transparent bg-gradient-to-r from-transparent via-black/40 to-transparent dark:bg-gradient-to-r dark:from-transparent dark:via-white dark:to-transparent"/>
    <div class="items-center block w-auto max-h-screen  grow basis-full">
        <ul class="flex flex-col pl-0 mb-0">
            @foreach($sidebars as $sidebar)
                @isset($sidebar['header'])
                    <li class="w-full mt-4">
                        <h6 class="pl-6 ml-2 text-xs font-bold leading-tight uppercase dark:text-white opacity-60">
                            {{ $sidebar['title'] }}
                        </h6>
                    </li>
                @else
                    <li class="mt-0.5 w-full">
                        <a class="{{ isset($sidebar['link']) && (Route::currentRouteName() == $sidebar['link']) ? 'bg-blue-500/10':'' }} py-2.7 dark:text-white dark:opacity-80 text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap rounded-lg px-4 font-semibold text-slate-700 transition-colors"
                           href="{{ $sidebar['link'] }}">
                            <div
                                class="mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center stroke-0 text-center xl:p-2.5">
                                <i class="relative top-0 text-lg leading-normal {{ isset($sidebar['icon-color'])?$sidebar['icon-color']:'' }} {{ $sidebar['icon'] }}"
                                style="color: {{ isset($sidebar['color'])?$sidebar['color']:'' }}"></i>
                            </div>
                            <span class="ml-1 duration-300 opacity-100 pointer-events-none ease">{{ $sidebar['title'] }}</span>
                        </a>
                    </li>
                @endisset
            @endforeach
        </ul>
    </div>


</aside>
