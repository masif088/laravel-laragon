<!DOCTYPE html>
<html :class="{'dark': isDark}" x-data="setup()">
<head>
    <script src="https://<hostname.tld>/tinymce.min.js" referrerpolicy="origin"></script>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link rel="apple-touch-icon" sizes="76x76" href="./assets/img/apple-icon.png"/>
    <link rel="icon" type="image/png" href="{{ asset('frontpage/Assets/icon.png') }}"/>
    <title>Ragil.net @isset($header)
            | {{ $header }}
        @endisset</title>
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet"/>
    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <!-- Nucleo Icons -->
    <link href="{{ asset('assets/css/nucleo-icons.css') }}" rel="stylesheet"/>
    <link href="{{ asset('assets/css/nucleo-svg.css') }}" rel="stylesheet"/>
    <!-- Popper -->
    <script src="https://unpkg.com/@popperjs/core@2"></script>
    <!-- Main Styling -->
    {{--    <link href="{{ asset('assets/css/argon-dashboard-tailwind.css') }}" rel="stylesheet"/>--}}

    <script src="https://cdn.jsdelivr.net/gh/alpine-collective/alpine-magic-helpers@0.5.x/dist/component.min.js"></script>

    <link crossorigin="anonymous" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
          integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
          referrerpolicy="no-referrer" rel="stylesheet"/>
    @vite(['resources/css/app.css','resources/js/app.js'])
{{--    <link href="{{ asset('build/assets/app-3ca961df.css') }}" rel="stylesheet">--}}
{{--    <script src="{{ asset('build/assets/app-4a08c204.js') }}"></script>--}}

    <!-- Styles -->
    @livewireStyles
    <script src="https://cdn.tiny.cloud/1/cdy7uy0kp3sps4cksg5twt8j1dbz75v48yog5k9ype8x9oo3/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
</head>

<body
    class="m-0 font-sans text-base antialiased font-normal dark:bg-slate-900 leading-default bg-gray-50 text-slate-500">
<div class="absolute w-full dark:hidden min-h-75 bg-red-primary"></div>
<!-- sidenav  -->
@include('layouts.argon.sidenav')
<!-- end sidenav -->

<main class="relative h-full max-h-screen transition-all duration-200 ease-in-out xl:ml-68 rounded-xl dark:text-white text-black">
    <!-- Navbar -->
    @include('layouts.argon.navbar')
    <!-- end Navbar -->

    <!-- cards -->
    <div class="w-full px-6 py-6 mx-auto">
        {{ $slot }}
        @include('layouts.argon.footer')
    </div>
    <!-- end cards -->
</main>
@include('layouts.argon.fixed-plugin')

<script>
    const setup = () => {
        this.livewire.on('redirect', data => {
            setTimeout(function () {
                window.location.href = data;
            }, 2000);
        })
        this.livewire.on('redirect:new', data => {
            let a = document.createElement('a');
            a.target = '_blank';
            a.href = data;
            a.click();
        })

        var sidenav = document.querySelector("aside");
        var whiteBtn = document.querySelector("[transparent-style-btn]");
        var darkBtn = document.querySelector("[white-style-btn]");

        var non_active_style = ["bg-none", "bg-transparent", "text-blue-500", "border-blue-500"];
        var active_style = ["bg-gradient-to-tl", "from-blue-500", "to-violet-500", "bg-blue-500", "text-white", "border-transparent"];

        var white_sidenav_classes = ["bg-white", "shadow-xl"];

        var black_sidenav_classes = ["bg-slate-850", "shadow-none"];


        const callback = function (entries) {
            entries.forEach((entry) => {
                console.log(entry);
                if (entry.isIntersecting) {
                    entry.target.classList.add("animate-fadeIn");
                } else {
                    entry.target.classList.remove("animate-fadeIn");
                }
            });
        };

        const observer = new IntersectionObserver(callback);

        const targets = document.querySelectorAll(".js-show-on-scroll");
        targets.forEach(function (target) {
            target.classList.add("opacity-0");
            observer.observe(target);
        });


        const getTheme = () => {
            if (window.localStorage.getItem('dark') === "true") {
                var buttonNavbarFixed = document.querySelector("[dark-toggle]");
                buttonNavbarFixed.setAttribute("checked", "true")
            }
            if (window.localStorage.getItem('dark')) {
                return JSON.parse(window.localStorage.getItem('dark'))
            }
            return !!window.matchMedia && window.matchMedia('(prefers-color-scheme: dark)').matches
        }

        const getIsFixedNavbar = () => {
            if (window.localStorage.getItem('isFixedNavbar')) {
                return JSON.parse(window.localStorage.getItem('isFixedNavbar'))
            }
            return !!window.matchMedia
        }

        const getSidebarColor = () => {
            if (window.localStorage.getItem('sidebarColor') === "false") {
                const active_style_attr = document.createAttribute("active-style");
                if (!darkBtn.hasAttribute(active_style_attr)) {
                    darkBtn.setAttributeNode(active_style_attr);
                    non_active_style.forEach((style_class) => {
                        darkBtn.classList.remove(style_class);
                    });
                    active_style.forEach((style_class) => {
                        darkBtn.classList.add(style_class);
                    });

                    whiteBtn.removeAttribute(active_style_attr);
                    active_style.forEach((style_class) => {
                        whiteBtn.classList.remove(style_class);
                    });
                    non_active_style.forEach((style_class) => {
                        whiteBtn.classList.add(style_class);
                    });

                    white_sidenav_classes.forEach((style_class) => {
                        sidenav.classList.remove(style_class);
                    });
                    black_sidenav_classes.forEach((style_class) => {
                        sidenav.classList.add(style_class);
                    });
                    sidenav.classList.add("dark");
                }
            } else {
                const active_style_attr = document.createAttribute("active-style");
                if (!whiteBtn.hasAttribute(active_style_attr)) {
                    //
                    whiteBtn.setAttributeNode(active_style_attr);

                    non_active_style.forEach((style_class) => {
                        whiteBtn.classList.remove(style_class);
                    });

                    active_style.forEach((style_class) => {
                        whiteBtn.classList.add(style_class);
                    });

                    darkBtn.removeAttribute(active_style_attr);

                    active_style.forEach((style_class) => {
                        darkBtn.classList.remove(style_class);
                    });

                    non_active_style.forEach((style_class) => {
                        darkBtn.classList.add(style_class);
                    });

                    black_sidenav_classes.forEach((style_class) => {
                        sidenav.classList.remove(style_class);
                    });
                    white_sidenav_classes.forEach((style_class) => {
                        sidenav.classList.add(style_class);
                    });
                    sidenav.classList.remove("dark");
                }
            }
            return window.localStorage.getItem('sidebarColor')
        }

        const setTheme = (value) => {
            window.localStorage.setItem('dark', value)
        }
        const setFixedNavbar = (value) => {

            window.localStorage.setItem('isFixedNavbar', value)
        }
        const setSidebarColor = (value) => {
            window.localStorage.setItem('sidebarColor', value)
        }

        return {
            isFixedNavbar: getIsFixedNavbar(),
            sidebarColor: getSidebarColor(),
            loading: true,
            sidebarOpen: true,
            isDark: getTheme(),
            toggleTheme() {
                this.isDark = !this.isDark
                setTheme(this.isDark)
            },
            toggleIsFixedNavbar() {
                this.isFixedNavbar = !this.isFixedNavbar
                setFixedNavbar(this.isFixedNavbar)
            },
            toggleSidebarDark() {
                this.sidebarColor = false
                setSidebarColor(this.sidebarColor)
            },
            toggleSidebarLight() {
                this.sidebarColor = true
                setSidebarColor(this.sidebarColor)
            },
            setLightTheme() {
                this.isDark = false
                setTheme(this.isDark)
            },
            setDarkTheme() {
                this.isDark = true
                setTheme(this.isDark)
            },

        }
    }
</script>

<!-- plugin for charts  -->

@livewireScripts
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.32/dist/sweetalert2.all.min.js"></script>

<x-livewire-alert::scripts />

<script src="{{ asset('vendor/livewire-alert/livewire-alert.js') }}"></script>
<x-livewire-alert::flash />
</body>
<script src="{{ asset('assets/js/plugins/chartjs.min.js') }}"></script>
{{--<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/4.3.3/chart.min.js" integrity="sha512-fMPPLjF/Xr7Ga0679WgtqoSyfUoQgdt8IIxJymStR5zV3Fyb6B3u/8DcaZ6R6sXexk5Z64bCgo2TYyn760EdcQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>--}}
<!-- plugin for scrollbar  -->
<script src="{{ asset('assets/js/plugins/perfect-scrollbar.min.js') }}" async></script>
<!-- main script file  -->
<script src="{{ asset('assets/js/argon-dashboard-tailwind.js') }}" async></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

</html>
