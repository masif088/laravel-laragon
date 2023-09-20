<nav
    class="relative flex flex-wrap items-center justify-between px-0 py-2 mx-6 transition-all ease-in shadow-none duration-250 rounded-2xl lg:flex-nowrap lg:justify-start"
    navbar-main x-bind:navbar-scroll="isFixedNavbar">
    <div class="flex items-center justify-between w-full px-4 py-1 mx-auto flex-wrap-inherit">
        <nav>
            <!-- breadcrumb -->
            <ol class="flex flex-wrap pt-1 mr-12 bg-transparent rounded-lg sm:mr-16">
                <li class="text-sm leading-normal">
                    <a class="text-white opacity-50" href="javascript:">{{ config('app.name', 'Argon') }}</a>
                </li>
                @isset($breadcrumbs)
                    @foreach(explode(';',$breadcrumbs) as $breadcrumb)
                        @php($link = explode('=>',$breadcrumb) )
                        @isset($link[1])
                            <li class="text-sm pl-2 capitalize leading-normal text-white before:float-left before:pr-2 before:text-white before:content-['/']"
                                aria-current="page"><a href="{{ $link[1] }}">{{ $link[0] }}</a>
                            </li>
                        @endisset
                    @endforeach
                @endisset
            </ol>
            <h6 class="mb-0 font-bold text-white capitalize">{{ isset($title) ? $title:'No title' }}</h6>
        </nav>

        <div class="flex items-center mt-2 grow sm:mt-0 sm:mr-6 md:mr-0 lg:flex lg:basis-auto">
            <div class="flex items-center md:ml-auto md:pr-4">
{{--                <div class="relative flex flex-wrap items-stretch w-full transition-all rounded-lg ease">--}}
{{--                <span--}}
{{--                    class="text-sm ease leading-5.6 absolute z-50 -ml-px flex h-full items-center whitespace-nowrap rounded-lg rounded-tr-none rounded-br-none border border-r-0 border-transparent bg-transparent py-2 px-2.5 text-center font-normal text-slate-500 transition-all">--}}
{{--                  <i class="fas fa-search"></i>--}}
{{--                </span>--}}
{{--                    <input type="text"--}}
{{--                           class="pl-9 text-sm focus:shadow-primary-outline ease w-1/100 leading-5.6 relative -ml-px block min-w-0 flex-auto rounded-lg border border-solid border-gray-300 dark:bg-slate-850 dark:text-white bg-white bg-clip-padding py-2 pr-3 transition-all  focus:border-blue-500 focus:outline-none focus:transition-shadow"--}}
{{--                           placeholder="Type here..."/>--}}
{{--                </div>--}}
            </div>
            <ul class="flex flex-row justify-end pl-0 mb-0 list-none md-max:w-full">


                <!-- notifications -->
                @if (Laravel\Jetstream\Jetstream::hasTeamFeatures())
                    <li class="relative flex items-center mx-4">
                        <p class="hidden transform-dropdown-show"></p>
                        <a href="javascript:" class="block p-0 text-sm text-white transition-all ease-nav-brand"
                           dropdown-trigger aria-expanded="false">
                            <i class="cursor-pointer fa fa-users"></i> {{ Auth::user()->currentTeam->name }}
                        </a>

                        <ul dropdown-menu
                            class="text-sm transform-dropdown before:font-awesome before:leading-default before:duration-350 before:ease lg:shadow-3xl duration-250 min-w-44 before:sm:right-8 before:text-5.5 pointer-events-none absolute right-0 top-0 z-50 origin-top list-none rounded-lg border-0 border-solid border-transparent dark:shadow-dark-xl dark:bg-slate-850 bg-white bg-clip-padding px-2 py-4 text-left text-slate-500 opacity-0 transition-all before:absolute before:right-2 before:left-auto before:top-0 before:z-50 before:inline-block before:font-normal before:text-white before:antialiased before:transition-all before:content-['\f0d8'] sm:-mr-6 lg:absolute lg:right-0 lg:left-auto lg:mt-2 lg:block lg:cursor-pointer">
                            <!-- add show class on dropdown open js -->
                            <li class="relative mb-2">
                                <div class="w-60">
                                    <!-- Team Management -->
                                    <div class="block px-4 py-2 text-xs dark:text-white">
                                        Manage Team
                                    </div>

                                    <!-- Team Settings -->
                                    <x-dropdown-link href="{{ route('teams.show', Auth::user()->currentTeam->id) }}">
                                        {{ __('Team Settings') }}
                                    </x-dropdown-link>

                                    @can('create', Laravel\Jetstream\Jetstream::newTeamModel())
                                        <x-dropdown-link href="{{ route('teams.create') }}">
                                            {{ __('Create New Team') }}
                                        </x-dropdown-link>
                                    @endcan

                                    <!-- Team Switcher -->
                                    @if (Auth::user()->allTeams()->count() > 1)
                                        <div class="border-t border-gray-200"></div>

                                        <div class="block px-4 py-2 text-xs dark:text-white">
                                            {{ __('Switch Teams') }}
                                        </div>

                                        @foreach (Auth::user()->allTeams() as $team)
                                            <x-switchable-team :team="$team" />
                                        @endforeach
                                    @endif
                                </div>
                            </li>
                        </ul>

                    </li>
                @endif

                <li class="flex items-center mx-4">
                    <a href="javascript:" class="p-0 text-sm text-white transition-all ease-nav-brand" fixed-plugin-button-nav>
                        <i  class="cursor-pointer fa fa-cog"></i>
                        Setting
                    </a>
                </li>

{{--                <li class="flex items-center mx-4">--}}
{{--                    <a href="./pages/sign-in.html"--}}
{{--                       class="block px-0 py-2 text-sm font-semibold text-white transition-all ease-nav-brand">--}}
{{--                        <i class="fa fa-user sm:mr-1"></i>--}}
{{--                        <span class="hidden sm:inline">{{ auth()->user()->name }}</span>--}}
{{--                    </a>--}}
{{--                </li>--}}

                <li class="relative flex items-center mx-4">
                    <p class="hidden transform-dropdown-show"></p>
                    <a href="javascript:" class="block p-0 text-sm text-white transition-all ease-nav-brand"
                       dropdown-trigger aria-expanded="false">
                        <i class="cursor-pointer fa fa-user"></i> {{ auth()->user()->name }}
                    </a>

                    <ul dropdown-menu
                        class="text-sm transform-dropdown before:font-awesome before:leading-default before:duration-350 before:ease lg:shadow-3xl duration-250 min-w-44 before:sm:right-8 before:text-5.5 pointer-events-none absolute right-0 top-0 z-50 origin-top list-none rounded-lg border-0 border-solid border-transparent dark:shadow-dark-xl dark:bg-slate-850 bg-white bg-clip-padding px-2 py-4 text-left text-slate-500 opacity-0 transition-all before:absolute before:right-2 before:left-auto before:top-0 before:z-50 before:inline-block before:font-normal before:text-white before:antialiased before:transition-all before:content-['\f0d8'] sm:-mr-6 lg:absolute lg:right-0 lg:left-auto lg:mt-2 lg:block lg:cursor-pointer">
                        <!-- add show class on dropdown open js -->
                        <li class="relative mb-2">

                            <!-- Account Management -->
                            <div class="block px-4 py-2 text-xs text-gray-400">
                                {{ __('Manage Account') }}
                            </div>
                            <x-dropdown-link href="{{ route('profile.show') }}">
                                <i class="fa-solid fa-user"></i> {{ __('Profile') }}
                            </x-dropdown-link>

                            @if (Laravel\Jetstream\Jetstream::hasApiFeatures())
                                <x-dropdown-link href="{{ route('api-tokens.index') }}">
                                    {{ __('API Tokens') }}
                                </x-dropdown-link>
                            @endif
                            <div class="border-t border-gray-200"></div>
                            <form method="POST" action="{{ route('logout') }}" x-data>
                                @csrf

                                <x-dropdown-link href="{{ route('logout') }}"
                                                 @click.prevent="$root.submit();">
                                    <i class="fa-solid fa-power-off"></i> {{ __('Log Out') }}
                                </x-dropdown-link>
                            </form>

                        </li>
                    </ul>
                </li>


                <li class="flex items-center pl-4 xl:hidden">
                    <a href="javascript:" class="block p-0 text-sm text-white transition-all ease-nav-brand"
                       sidenav-trigger>
                        <div class="w-4.5 overflow-hidden">
                            <i class="ease mb-0.75 relative block h-0.5 rounded-sm bg-white transition-all"></i>
                            <i class="ease mb-0.75 relative block h-0.5 rounded-sm bg-white transition-all"></i>
                            <i class="ease relative block h-0.5 rounded-sm bg-white transition-all"></i>
                        </div>
                    </a>
                </li>


            </ul>
        </div>
    </div>
</nav>
