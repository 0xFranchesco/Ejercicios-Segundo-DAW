<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Aristóteles AI</title>

    <!-- Fonts -->
    <link rel="icon" href="/obluda-app.jpg" type="image/jpg">
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    <!-- Styles -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="antialiased font-sannns bg-gray-800">
    <header class="relative top-5 md:top-6 z-30 w-full">
        <div class="mx-auto max-w-6xl px-4 sm:px-6">
            <div
                class="relative flex min-w-0 h-16 md:h-14 items-center justify-between
            px-4 py-2 md:px-3 md:py-0
            gap-2 sm:gap-3 rounded-2xl bg-white/90 px-3 shadow-lg shadow-black/[0.03] backdrop-blur-xs before:pointer-events-none before:absolute before:inset-0 before:rounded-[inherit] before:border before:border-transparent before:[background:linear-gradient(var(--color-gray-100),var(--color-gray-200))_border-box] before:[mask-composite:exclude_!important] before:[mask:linear-gradient(white_0_0)_padding-box,_linear-gradient(white_0_0)]">
                <div class="flex flex-1 items-center"><a class="inline-flex" aria-label="Cruip"
                        href="/"><x-menu-logo class="fill-current" /></a></div>
                <ul class="flex flex-1 flex-wrap justify-end gap-2 sm:gap-3">
                    <li><a class="btn-sm bg-gray-100 text-gray-800 shadow-sm hover:bg-gray-50 p-2 rounded-md"
                            href="{{ route('login') }}">Login</a>
                    </li>
                    <li><a class="btn-sm bg-gray-800 text-gray-200 shadow-sm hover:bg-gray-700 p-2 rounded-md"
                            href="{{ route('register') }}">Register</a></li>
                </ul> 
            </div>
        </div>
    </header>
    <div class="mx-auto max-w-6xl px-4 sm:px-6">
        <div class="pb-12 mt-4 pt-12 md:pb-20 md:pt-40">
            <div class="pb-12 text-center md:pb-16">
                <h1 class="text-white mb-12 text-3xl sm:text-5xl font-bold md:text-6xl aos-init aos-animate hover:scale-15 hover:text-gray-200" data-aos="zoom-y-out"
                    data-aos-delay="150">Aristóteles the AI chat you're <br class="max-lg:hidden">looking for</h1>
                <div class="mx-auto max-w-3xl">
                    <p class="mb-20 text-base sm:text-lg text-gray-200/80 aos-init aos-animate" data-aos="zoom-y-out"
                        data-aos-delay="300">Aristóteles is a modern website builder powered by AI development by FCR.
                    </p>
                    <div class="relative before:absolute before:inset-0">
                        <div class=" mb-10 mx-auto max-w-xs sm:flex sm:max-w-none sm:justify-center aos-init aos-animate"
                            data-aos="zoom-y-out" data-aos-delay="450">
                            <a class=" relative z-10 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-8 mx-4 rounded-lg transition duration-300 ease-in-out transform hover:scale-105 hover:shadow-xl"
                                href="{{ route('info') }}">Learn More</a>
                                <a class=" relative z-10 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-8 mx-4 rounded-lg transition duration-300 ease-in-out transform hover:scale-105 hover:shadow-xl"
                                href="{{ route('chat') }}">Try it</a>
                        </div>
                    </div>
                    <div class="relative flex h-[240px] md:h-[324px] items-center justify-center scale-75 md:scale-100">
                        <div class="absolute -z-10"><svg class="fill-blue-500" xmlns="http://www.w3.org/2000/svg"
                                width="164" height="41" viewBox="0 0 164 41" fill="none">
                                <circle cx="1" cy="8" r="1" fill-opacity="0.24"></circle>
                                <circle cx="1" cy="1" r="1" fill-opacity="0.16"></circle>
                                <circle cx="1" cy="15" r="1"></circle>
                                <circle cx="1" cy="26" r="1" fill-opacity="0.64"></circle>
                                <circle cx="1" cy="33" r="1" fill-opacity="0.24"></circle>
                                <circle cx="8" cy="8" r="1"></circle>
                                <circle cx="8" cy="15" r="1"></circle>
                                <circle cx="8" cy="26" r="1" fill-opacity="0.24"></circle>
                                <circle cx="15" cy="15" r="1" fill-opacity="0.64"></circle>
                                <circle cx="15" cy="26" r="1" fill-opacity="0.16"></circle>
                                <circle cx="8" cy="33" r="1"></circle>
                                <circle cx="1" cy="40" r="1"></circle>
                                <circle cx="1" cy="1" r="1" transform="matrix(-1 0 0 1 164 7)"
                                    fill-opacity="0.24"></circle>
                                <circle cx="1" cy="1" r="1" transform="matrix(-1 0 0 1 164 0)"
                                    fill-opacity="0.16"></circle>
                                <circle cx="1" cy="1" r="1" transform="matrix(-1 0 0 1 164 14)">
                                </circle>
                                <circle cx="1" cy="1" r="1" transform="matrix(-1 0 0 1 164 25)"
                                    fill-opacity="0.64"></circle>
                                <circle cx="1" cy="1" r="1" transform="matrix(-1 0 0 1 164 32)"
                                    fill-opacity="0.24"></circle>
                                <circle cx="1" cy="1" r="1" transform="matrix(-1 0 0 1 157 7)"></circle>
                                <circle cx="1" cy="1" r="1" transform="matrix(-1 0 0 1 157 14)">
                                </circle>
                                <circle cx="1" cy="1" r="1" transform="matrix(-1 0 0 1 157 25)"
                                    fill-opacity="0.24"></circle>
                                <circle cx="1" cy="1" r="1" transform="matrix(-1 0 0 1 150 14)"
                                    fill-opacity="0.64"></circle>
                                <circle cx="1" cy="1" r="1" transform="matrix(-1 0 0 1 150 25)"
                                    fill-opacity="0.16"></circle>
                                <circle cx="1" cy="1" r="1" transform="matrix(-1 0 0 1 157 32)">
                                </circle>
                                <circle cx="1" cy="1" r="1" transform="matrix(-1 0 0 1 164 39)">
                                </circle>
                            </svg></div>
                        <div class="absolute -z-10"><svg xmlns="http://www.w3.org/2000/svg" width="432"
                                height="160" viewBox="0 0 432 160" fill="none">
                                <g opacity="0.6" filter="url(#filter0_f_2044_9)">
                                    <path class="fill-blue-500" fill-rule="evenodd" clip-rule="evenodd"
                                        d="M80 112C62.3269 112 48 97.6731 48 80C48 62.3269 62.3269 48 80 48C97.6731 48 171 62.3269 171 80C171 97.6731 97.6731 112 80 112ZM352 112C369.673 112 384 97.6731 384 80C384 62.3269 369.673 48 352 48C334.327 48 261 62.3269 261 80C261 97.6731 334.327 112 352 112Z">
                                    </path>
                                </g>
                                <defs>
                                    <filter id="filter0_f_2044_9" x="0" y="0" width="432" height="160"
                                        filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
                                        <feFlood flood-opacity="0" result="BackgroundImageFix"></feFlood>
                                        <feBlend mode="normal" in="SourceGraphic" in2="BackgroundImageFix"
                                            result="shape"></feBlend>
                                        <feGaussianBlur stdDeviation="32" result="effect1_foregroundBlur_2044_9">
                                        </feGaussianBlur>
                                    </filter>
                                </defs>
                            </svg></div>
                        <div
                            class="absolute inset-x-0 top-0 -z-10 h-px bg-linear-to-r from-transparent via-gray-200 to-transparent mix-blend-multiply">
                        </div>
                        <div
                            class="absolute inset-x-0 bottom-0 -z-10 h-px bg-linear-to-r from-transparent via-gray-200 to-transparent mix-blend-multiply">
                        </div>
                        <div
                            class="absolute inset-x-[200px] top-1/2 -z-10 h-px bg-linear-to-r from-transparent via-blue-500/60 to-transparent mix-blend-multiply">
                        </div>
                        <div
                            class="absolute inset-x-0 top-1/2 -z-10 h-px -translate-y-[82px] bg-linear-to-r from-transparent via-gray-200 to-transparent mix-blend-multiply before:absolute before:inset-y-0 before:w-24 before:animate-[line_10s_ease-in-out_infinite_both] before:bg-linear-to-r before:via-blue-500">
                        </div>
                        <div
                            class="absolute inset-x-0 top-1/2 -z-10 h-px translate-y-[82px] bg-linear-to-r from-transparent via-gray-200 to-transparent mix-blend-multiply before:absolute before:inset-y-0 before:w-24 before:animate-[line_10s_ease-in-out_infinite_5s_both] before:bg-linear-to-r before:via-blue-500">
                        </div>
                        <div
                            class="absolute inset-x-[300px] top-1/2 -z-10 h-px rotate-[20deg] bg-linear-to-r from-transparent via-gray-200 to-transparent mix-blend-multiply">
                        </div>
                        <div
                            class="absolute inset-x-[300px] top-1/2 -z-10 h-px -rotate-[20deg] bg-linear-to-r from-transparent via-gray-200 to-transparent mix-blend-multiply">
                        </div>
                        <div
                            class="absolute inset-y-0 left-1/2 -z-10 w-px -translate-x-[216px] bg-linear-to-b from-gray-200 to-transparent mix-blend-multiply">
                        </div>
                        <div
                            class="absolute inset-y-0 left-1/2 -z-10 w-px translate-x-[216px] bg-linear-to-t from-gray-200 to-transparent mix-blend-multiply">
                        </div>
                        <div
                            class="absolute before:absolute before:-inset-3 before:animate-[spin_3s_linear_infinite] before:rounded-full before:border before:border-transparent before:[mask-composite:exclude_!important] before:[mask:linear-gradient(white_0_0)_padding-box,_linear-gradient(white_0_0)] before:[background:conic-gradient(from_180deg,transparent,var(--color-blue-500))_border-box]">
                            <div class="animate-[breath_8s_ease-in-out_infinite_both]">
                                <div
                                    class="flex h-24 w-24 items-center justify-center rounded-full bg-white shadow-lg shadow-black/[0.03] before:absolute before:inset-0 before:m-[8.334%] before:rounded-[inherit] before:border before:border-gray-700/5 before:bg-gray-200/60 before:[mask-image:linear-gradient(to_bottom,black,transparent)] rounded transition duration-300 ease-in-out transform hover:scale-105 hover:shadow-xl">
                                    <img alt="Logo 01" loading="lazy" width="65" height="52"
                                        decoding="async" data-nimg="1" class="relative" style="color:transparent"
                                        src="obluda-menu.jpg"></div>
                            </div>
                        </div>
                        <div class="relative flex flex-col">
                            <article
                                class="flex h-full w-full items-center justify-center focus-visible:outline-hidden focus-visible:ring-3 focus-visible:ring-indigo-300">
                                <div class="absolute -translate-x-[136px]">
                                    <div class="animate-[breath_7s_ease-in-out_3s_infinite_both]">
                                        <div
                                            class="flex h-16 w-16 items-center justify-center rounded-full bg-white shadow-lg shadow-black/[0.03] before:absolute before:inset-0 before:m-[8.334%] before:rounded-[inherit] before:border before:border-gray-700/5 before:bg-gray-200/60 before:[mask-image:linear-gradient(to_bottom,black,transparent)]  rounded transition duration-300 ease-in-out transform hover:scale-105 hover:shadow-xl">
                                            <img alt="Logo 02" loading="lazy" width="55" height="22"
                                                decoding="async" data-nimg="1" class="relative"
                                                style="color:transparent"
                                                src="github.jpg"></div>
                                    </div>
                                </div>
                                <div class="absolute translate-x-[136px]">
                                    <div class="animate-[breath_7s_ease-in-out_3.5s_infinite_both]">
                                        <div
                                            class="flex h-16 w-16 items-center justify-center rounded-full bg-white shadow-lg shadow-black/[0.03] before:absolute before:inset-0 before:m-[8.334%] before:rounded-[inherit] before:border before:border-gray-700/5 before:bg-gray-200/60 before:[mask-image:linear-gradient(to_bottom,black,transparent)] rounded transition duration-300 ease-in-out transform hover:scale-105 hover:shadow-xl">
                                            <img alt="Logo 03" loading="lazy" width="22" height="22"
                                                decoding="async" data-nimg="1" class="relative"
                                                style="color:transparent"
                                                src="google.jpg"></div>
                                    </div>
                                </div>
                                <div class="absolute -translate-x-[216px] -translate-y-[82px]">
                                    <div class="animate-[breath_6s_ease-in-out_3.5s_infinite_both]">
                                        <div
                                            class="flex h-20 w-20 items-center justify-center rounded-full bg-white shadow-lg shadow-black/[0.03] before:absolute before:inset-0 before:m-[8.334%] before:rounded-[inherit] before:border before:border-gray-700/5 before:bg-gray-200/60 before:[mask-image:linear-gradient(to_bottom,black,transparent)] rounded transition duration-300 ease-in-out transform hover:scale-105 hover:shadow-xl">
                                            <img alt="Logo 04" loading="lazy" width="44" height="22"
                                                decoding="async" data-nimg="1" class="relative"
                                                style="color:transparent"
                                                src="claude.jpg"></div>
                                    </div>
                                </div>
                                <div class="absolute -translate-y-[82px] translate-x-[216px]">
                                    <div class="animate-[breath_6s_ease-in-out_1.5s_infinite_both]">
                                        <div
                                            class="flex h-20 w-20 items-center justify-center rounded-full bg-white shadow-lg shadow-black/[0.03] before:absolute before:inset-0 before:m-[8.334%] before:rounded-[inherit] before:border before:border-gray-700/5 before:bg-gray-200/60 before:[mask-image:linear-gradient(to_bottom,black,transparent)] rounded transition duration-300 ease-in-out transform hover:scale-105 hover:shadow-xl">
                                            <img alt="Logo 05" loading="lazy" width="55" height="25"
                                                decoding="async" data-nimg="1" class="relative"
                                                style="color:transparent"
                                                src="chatgpt.jpg"></div>
                                    </div>
                                </div>
                                <div class="absolute translate-x-[216px] translate-y-[82px]">
                                    <div class="animate-[breath_6s_ease-in-out_2s_infinite_both]">
                                        <div
                                            class="flex h-20 w-20 items-center justify-center rounded-full bg-white shadow-lg shadow-black/[0.03] before:absolute before:inset-0 before:m-[8.334%] before:rounded-[inherit] before:border before:border-gray-700/5 before:bg-gray-200/60 before:[mask-image:linear-gradient(to_bottom,black,transparent)] rounded transition duration-300 ease-in-out transform hover:scale-105 hover:shadow-xl">
                                            <img alt="Logo 06" loading="lazy" width="45" height="18"
                                                decoding="async" data-nimg="1" class="relative"
                                                style="color:transparent"
                                                src="stackoverflow.jpg"></div>
                                    </div>
                                </div>
                                <div class="absolute -translate-x-[216px] translate-y-[82px]">
                                    <div class="animate-[breath_6s_ease-in-out_2.5s_infinite_both]">
                                        <div
                                            class="flex h-20 w-20 items-center justify-center rounded-full bg-white shadow-lg shadow-black/[0.03] before:absolute before:inset-0 before:m-[8.334%] before:rounded-[inherit] before:border before:border-gray-700/5 before:bg-gray-200/60 before:[mask-image:linear-gradient(to_bottom,black,transparent)] rounded transition duration-300 ease-in-out transform hover:scale-105 hover:shadow-xl">
                                            <img alt="Logo 07" loading="lazy" width="45" height="25"
                                                decoding="async" data-nimg="1" class="relative"
                                                style="color:transparent"
                                                src="gemini.jpg"></div>
                                    </div>
                                </div>
                                <div class="absolute -translate-x-[292px] opacity-40">
                                    <div class="animate-[breath_6s_ease-in-out_2s_infinite_both]">
                                        <div
                                            class="flex h-12 w-12 items-center justify-center rounded-full border border-gray-200/60 bg-white shadow-lg  rounded transition duration-300 ease-in-out transform hover:scale-105 hover:shadow-xl">
                                            </div>
                                    </div>
                                </div>
                                <div class="absolute translate-x-[292px] opacity-40">
                                    <div class="animate-[breath_6s_ease-in-out_4s_infinite_both]">
                                        <div
                                            class="flex h-12 w-12 items-center justify-center rounded-full border border-gray-200/60 bg-white shadow-lg  rounded transition duration-500 ease-in-out transform hover:scale-105 hover:shadow-xl">
                                            </div>
                                    </div>
                                </div>
                            </article>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
