<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

        <!-- Styles -->
        <style>
            /* ! tailwindcss v3.4.1 | MIT License | https://tailwindcss.com */*,::after,::before{box-sizing:border-box;border-width:0;border-style:solid;border-color:#e5e7eb}::after,::before{--tw-content:''}html{line-height:1.5;-webkit-text-size-adjust:100%;-moz-tab-size:4;tab-size:4;font-family:Figtree, sans-serif;font-feature-settings:normal;font-variation-settings:normal;-webkit-tap-highlight-color:transparent}body{margin:0;line-height:inherit}hr{height:0;color:inherit;border-top-width:1px}abbr:where([title]){text-decoration:underline dotted}h1,h2,h3,h4,h5,h6{font-size:inherit;font-weight:inherit}a{color:inherit;text-decoration:inherit}b,strong{font-weight:bolder}code,kbd,pre,samp{font-family:ui-monospace, SFMono-Regular, Menlo, Monaco, Consolas, "Liberation Mono", "Courier New", monospace;font-size:1em}small{font-size:80%}sub,sup{font-size:75%;line-height:0;position:relative;vertical-align:baseline}sub{bottom:-.25em}sup{top:-.5em}table{text-indent:0;border-color:inherit;border-collapse:collapse}button,input,optgroup,select,textarea{font-family:inherit;font-size:100%;font-weight:inherit;line-height:inherit;color:inherit;margin:0;padding:0}button,select{text-transform:none}[type=button],[type=reset],[type=submit],button{-webkit-appearance:button;background-color:transparent;background-image:none}:-moz-focusring{outline:auto}
            .absolute{position:absolute}.relative{position:relative}.-left-20{left:-5rem}.top-0{top:0}.z-0{z-index:0}.flex{display:flex}.h-full{height:100%}.w-full{width:100%}.max-w-\[877px\]{max-width:877px}.flex-col{flex-direction:column}.items-center{align-items:center}.justify-center{justify-content:center}.overflow-hidden{overflow:hidden}.text-black\/50{color:rgb(0 0 0 / 0.5)}.dark\:text-white\/50{color:rgb(255 255 255 / 0.5)}
            .min-h-screen{min-height:100vh}.selection\:bg-\[\#FF2D20\] *::selection{background-color:#ff2d20;color:#fff}.selection\:text-white *::selection{color:#fff}.bg-gray-50{--tw-bg-opacity:1;background-color:rgb(249 250 251 / var(--tw-bg-opacity))}.text-black{--tw-text-opacity:1;color:rgb(0 0 0 / var(--tw-text-opacity))}.dark\:bg-black{--tw-bg-opacity:1;background-color:rgb(0 0 0 / var(--tw-bg-opacity))}.dark\:text-white{--tw-text-opacity:1;color:rgb(255 255 255 / var(--tw-text-opacity))}
            .grid{display:grid}.gap-6{gap:1.5rem}.lg\:grid-cols-2{grid-template-columns:repeat(2,minmax(0,1fr))}.lg\:gap-8{gap:2rem}
            .rounded-lg{border-radius:0.5rem}.p-6{padding:1.5rem}.shadow-\[0px_14px_34px_0px_rgba\(0\,0\,0\,0\.08\)\]{box-shadow:0px 14px 34px 0px rgba(0,0,0,0.08)}.ring-1{--tw-ring-offset-shadow:var(--tw-ring-inset) 0 0 0 var(--tw-ring-offset-width) var(--tw-ring-offset-color);--tw-ring-shadow:var(--tw-ring-inset) 0 0 0 calc(1px + var(--tw-ring-offset-width)) var(--tw-ring-color);box-shadow:var(--tw-ring-offset-shadow),var(--tw-ring-shadow),var(--tw-shadow, 0 0 #0000)}.ring-white\/\[0\.05\]{--tw-ring-color:rgb(255 255 255 / 0.05)}.transition{transition-property:color,background-color,border-color,text-decoration-color,fill,stroke,opacity,box-shadow,transform,filter,backdrop-filter;transition-timing-function:cubic-bezier(0.4,0,0.2,1);transition-duration:150ms}.duration-300{transition-duration:300ms}.hover\:text-black\/70:hover{color:rgb(0 0 0 / 0.7)}.hover\:ring-black\/20:hover{--tw-ring-color:rgb(0 0 0 / 0.2)}.focus\:outline-none:focus{outline:2px solid transparent;outline-offset:2px}.dark\:bg-zinc-900{--tw-bg-opacity:1;background-color:rgb(24 24 27 / var(--tw-bg-opacity))}.dark\:ring-zinc-800{--tw-ring-color:rgb(39 39 42)}.dark\:hover\:text-white\/70:hover{color:rgb(255 255 255 / 0.7)}.dark\:hover\:ring-zinc-700:hover{--tw-ring-color:rgb(63 63 70)}.dark\:focus-visible\:ring-\[\#FF2D20\]:focus-visible{--tw-ring-color:#ff2d20}
            .pt-3{padding-top:0.75rem}.sm\:pt-5{padding-top:1.25rem}
            .h-12{height:3rem}.w-auto{width:auto}.self-center{align-self:center}
            .block{display:block}.h-5{height:1.25rem}.w-5{width:1.25rem}
            .text-xl{font-size:1.25rem;line-height:1.75rem}.font-semibold{font-weight:600}
            .mt-4{margin-top:1rem}.text-sm\/relaxed{font-size:0.875rem;line-height:1.625}
            .py-16{padding-top:4rem;padding-bottom:4rem}.text-center{text-align:center}.text-sm{font-size:0.875rem;line-height:1.25rem}
            @media (min-width: 640px){.sm\:block{display:block}.sm\:hidden{display:none}}
            @media (min-width: 1024px){.lg\:block{display:block}.lg\:hidden{display:none}}
            @media (prefers-color-scheme: dark){.dark\:block{display:block}.dark\:hidden{display:none}}
        </style>
    </head>
    <body class="font-sans antialiased dark:bg-black dark:text-white/50">
        <div class="bg-gray-50 text-black/50 dark:bg-black dark:text-white/50">
            <img id="background" class="absolute -left-20 top-0 max-w-[877px]" src="https://laravel.com/assets/img/welcome/background.svg" />
            <div class="relative min-h-screen flex flex-col items-center justify-center selection:bg-[#FF2D20] selection:text-white">
                <div class="relative w-full max-w-2xl px-6 lg:max-w-7xl">
                    <header class="grid grid-cols-2 items-center gap-2 py-10 lg:grid-cols-3">
                        <div class="flex lg:justify-center lg:col-start-2">
                            <svg class="h-12 w-auto text-white lg:h-16 lg:text-[#FF2D20]" viewBox="0 0 62 65" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M61.8548 14.6253C61.8778 14.7102 61.8895 14.7978 61.8897 14.8858V28.5615C61.8898 28.737 61.8434 28.9095 61.7554 29.0614C61.6675 29.2132 61.5409 29.3392 61.3887 29.4265L49.9104 36.0351V49.1337C49.9104 49.4902 49.7209 49.8192 49.4118 49.9987L25.4519 63.7916C25.3971 63.8227 25.3372 63.8427 25.2774 63.8639C25.255 63.8308 25.2338 63.7912 25.2138 63.7912C25.1938 63.7912 25.1726 63.8308 25.1502 63.8639C25.0905 63.8427 25.0306 63.8227 24.9758 63.7916L1.01592 49.9987C0.706814 49.8192 0.517334 49.4902 0.517334 49.1337V36.0351L-10.961 29.4265C-11.1132 29.3392 -11.2398 29.2132 -11.3277 29.0614C-11.4156 28.9095 -11.462 28.737 -11.4619 28.5615V14.8858C-11.4617 14.7978 -11.45 14.7102 -11.427 14.6253L-11.427 14.6253C-11.427 14.6253 -11.427 14.6253 -11.427 14.6253C-11.427 14.6253 -11.427 14.6253 -11.427 14.6253C-11.427 14.6253 -11.427 14.6253 -11.427 14.6253C-11.427 14.6253 -11.427 14.6253 -11.427 14.6253Z" fill="currentColor"/>
                            </svg>
                        </div>
                        @if (Route::has('login'))
                            <nav class="-mx-3 flex flex-1 justify-end">
                                @auth
                                    <a
                                        href="{{ url('/dashboard') }}"
                                        class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white"
                                    >
                                        Dashboard
                                    </a>
                                @else
                                    <a
                                        href="{{ route('login') }}"
                                        class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white"
                                    >
                                        Log in
                                    </a>

                                    @if (Route::has('register'))
                                        <a
                                            href="{{ route('register') }}"
                                            class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white"
                                        >
                                            Register
                                        </a>
                                    @endif
                                @endauth
                            </nav>
                        @endif
                    </header>

                    <main class="mt-6">
                        <div class="grid gap-6 lg:grid-cols-2 lg:gap-8">
                            <a href="https://laravel.com/docs" id="docs-card" class="flex flex-col items-start gap-6 overflow-hidden rounded-lg bg-white p-6 shadow-[0px_14px_34px_0px_rgba(0,0,0,0.08)] ring-1 ring-white/[0.05] transition duration-300 hover:text-black/70 hover:ring-black/20 focus:outline-none focus-visible:ring-[#FF2D20] md:row-span-3 lg:p-10 lg:pb-10 dark:bg-zinc-900 dark:ring-zinc-800 dark:hover:text-white/70 dark:hover:ring-zinc-700 dark:focus-visible:ring-[#FF2D20]">
                                <div id="screenshot-container" class="relative flex w-full flex-1 items-stretch">
                                    <img
                                        src="https://laravel.com/assets/img/welcome/docs-light.svg"
                                        alt="Laravel documentation screenshot"
                                        class="aspect-video h-full w-full flex-1 rounded-[10px] object-top object-cover drop-shadow-[0px_4px_34px_rgba(0,0,0,0.06)] dark:hidden"
                                    />
                                    <img
                                        src="https://laravel.com/assets/img/welcome/docs-dark.svg"
                                        alt="Laravel documentation screenshot"
                                        class="hidden aspect-video h-full w-full flex-1 rounded-[10px] object-top object-cover drop-shadow-[0px_4px_34px_rgba(0,0,0,0.25)] dark:block"
                                    />
                                    <div class="absolute -bottom-16 -left-16 h-40 w-[calc(100%+8rem)] bg-gradient-to-b from-transparent via-white to-white dark:via-zinc-900 dark:to-zinc-900"></div>
                                </div>

                                <div class="relative flex items-center gap-6 lg:items-end">
                                    <div id="docs-card-content" class="flex items-start gap-6 lg:flex-col">
                                        <div class="flex size-12 shrink-0 items-center justify-center rounded-full bg-[#FF2D20]/10 sm:size-16">
                                            <svg class="size-5 sm:size-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                                <path fill="#FF2D20" d="M3.75 3a.75.75 0 0 0-.75.75v6.75h1.5V4.5h15v15h-15v-6.75H3v6.75c0 .414.336.75.75.75h16.5a.75.75 0 0 0 .75-.75v-16.5a.75.75 0 0 0-.75-.75H3.75Z" />
                                                <path fill="#FF2D20" d="M3 12a.75.75 0 0 1 .75-.75H12a.75.75 0 0 1 0 1.5H3.75A.75.75 0 0 1 3 12Z" />
                                            </svg>
                                        </div>

                                        <div class="pt-3 sm:pt-5">
                                            <h2 class="text-xl font-semibold text-black dark:text-white">Documentation</h2>

                                            <p class="mt-4 text-sm/relaxed">
                                                Laravel has wonderful, thorough documentation covering every aspect of the framework. Whether you are new to the framework or have previous experience with Laravel, we recommend reading all of the documentation from beginning to end.
                                            </p>
                                        </div>
                                    </div>

                                    <svg class="size-6 shrink-0 self-center stroke-[#FF2D20]" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12h15m0 0l-6.75-6.75M19.5 12l-6.75 6.75" />
                                    </svg>
                                </div>
                            </a>

                            <a href="https://laracasts.com" class="flex items-start gap-4 rounded-lg bg-white p-6 shadow-[0px_14px_34px_0px_rgba(0,0,0,0.08)] ring-1 ring-white/[0.05] transition duration-300 hover:text-black/70 hover:ring-black/20 focus:outline-none focus-visible:ring-[#FF2D20] lg:pb-10 dark:bg-zinc-900 dark:ring-zinc-800 dark:hover:text-white/70 dark:hover:ring-zinc-700 dark:focus-visible:ring-[#FF2D20]">
                                <div class="flex size-12 shrink-0 items-center justify-center rounded-full bg-[#FF2D20]/10 sm:size-16">
                                    <svg class="size-5 sm:size-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                        <path fill="#FF2D20" d="M21 3.75a.75.75 0 0 0-.75-.75H3.75a.75.75 0 0 0-.75.75v16.5c0 .414.336.75.75.75h16.5a.75.75 0 0 0 .75-.75V3.75ZM3 12v-1.5h18V12H3Zm0 1.5h18v6.75H3V13.5Z" />
                                    </svg>
                                </div>

                                <div class="pt-3 sm:pt-5">
                                    <h2 class="text-xl font-semibold text-black dark:text-white">Laracasts</h2>

                                    <p class="mt-4 text-sm/relaxed">
                                        Laracasts offers thousands of video tutorials on Laravel, PHP, and JavaScript. Check them out, see for yourself, and massively level up your development skills in the process.
                                    </p>
                                </div>

                                <svg class="size-6 shrink-0 self-center stroke-[#FF2D20]" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12h15m0 0l-6.75-6.75M19.5 12l-6.75 6.75" />
                                </svg>
                            </a>

                            <a href="https://laravel-news.com" class="flex items-start gap-4 rounded-lg bg-white p-6 shadow-[0px_14px_34px_0px_rgba(0,0,0,0.08)] ring-1 ring-white/[0.05] transition duration-300 hover:text-black/70 hover:ring-black/20 focus:outline-none focus-visible:ring-[#FF2D20] lg:pb-10 dark:bg-zinc-900 dark:ring-zinc-800 dark:hover:text-white/70 dark:hover:ring-zinc-700 dark:focus-visible:ring-[#FF2D20]">
                                <div class="flex size-12 shrink-0 items-center justify-center rounded-full bg-[#FF2D20]/10 sm:size-16">
                                    <svg class="size-5 sm:size-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                        <path fill="#FF2D20" d="M12 3.75a.75.75 0 0 0-.75.75v15a.75.75 0 0 0 1.5 0v-15A.75.75 0 0 0 12 3.75Z" />
                                        <path fill="#FF2D20" d="M3.75 12a.75.75 0 0 0 .75.75h15a.75.75 0 0 0 0-1.5h-15a.75.75 0 0 0-.75.75Z" />
                                    </svg>
                                </div>

                                <div class="pt-3 sm:pt-5">
                                    <h2 class="text-xl font-semibold text-black dark:text-white">Laravel News</h2>

                                    <p class="mt-4 text-sm/relaxed">
                                        Laravel News is a community driven portal and newsletter aggregating all of the latest and most important news in the Laravel ecosystem, including new package releases and tutorials.
                                    </p>
                                </div>

                                <svg class="size-6 shrink-0 self-center stroke-[#FF2D20]" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12h15m0 0l-6.75-6.75M19.5 12l-6.75 6.75" />
                                </svg>
                            </a>

                            <div class="flex items-start gap-4 rounded-lg bg-white p-6 shadow-[0px_14px_34px_0px_rgba(0,0,0,0.08)] ring-1 ring-white/[0.05] transition duration-300 hover:text-black/70 hover:ring-black/20 focus:outline-none focus-visible:ring-[#FF2D20] lg:pb-10 dark:bg-zinc-900 dark:ring-zinc-800 dark:hover:text-white/70 dark:hover:ring-zinc-700 dark:focus-visible:ring-[#FF2D20]">
                                <div class="flex size-12 shrink-0 items-center justify-center rounded-full bg-[#FF2D20]/10 sm:size-16">
                                    <svg class="size-5 sm:size-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                        <path fill="#FF2D20" d="M12 3.75a.75.75 0 0 0-.75.75v15a.75.75 0 0 0 1.5 0v-15A.75.75 0 0 0 12 3.75Z" />
                                        <path fill="#FF2D20" d="M3.75 12a.75.75 0 0 0 .75.75h15a.75.75 0 0 0 0-1.5h-15a.75.75 0 0 0-.75.75Z" />
                                    </svg>
                                </div>

                                <div class="pt-3 sm:pt-5">
                                    <h2 class="text-xl font-semibold text-black dark:text-white">Vibrant Ecosystem</h2>

                                    <p class="mt-4 text-sm/relaxed">
                                        Laravel's robust library of first-party tools and libraries, such as <a href="https://forge.laravel.com" class="underline hover:text-black/70 dark:hover:text-white/70">Forge</a>, <a href="https://vapor.laravel.com" class="underline hover:text-black/70 dark:hover:text-white/70">Vapor</a>, <a href="https://nova.laravel.com" class="underline hover:text-black/70 dark:hover:text-white/70">Nova</a>, and <a href="https://envoyer.io" class="underline hover:text-black/70 dark:hover:text-white/70">Envoyer</a> help you take your projects to the next level. Pair them with powerful open source libraries like <a href="https://laravel.com/docs/billing" class="underline hover:text-black/70 dark:hover:text-white/70">Cashier</a>, <a href="https://laravel.com/docs/dusk" class="underline hover:text-black/70 dark:hover:text-white/70">Dusk</a>, <a href="https://laravel.com/docs/broadcasting" class="underline hover:text-black/70 dark:hover:text-white/70">Echo</a>, <a href="https://laravel.com/docs/horizon" class="underline hover:text-black/70 dark:hover:text-white/70">Horizon</a>, <a href="https://laravel.com/docs/sanctum" class="underline hover:text-black/70 dark:hover:text-white/70">Sanctum</a>, <a href="https://laravel.com/docs/telescope" class="underline hover:text-black/70 dark:hover:text-white/70">Telescope</a>, and more.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </main>

                    <footer class="py-16 text-center text-sm text-black dark:text-white/70">
                        Laravel v{{ Illuminate\Foundation\Application::VERSION }} (PHP v{{ PHP_VERSION }})
                    </footer>
                </div>
            </div>
        </div>
    </body>
</html>
