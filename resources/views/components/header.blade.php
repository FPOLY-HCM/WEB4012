<header class="sticky top-0 w-full z-40">
    <div class="relative z-10 bg-white dark:bg-neutral-900 border-b border-slate-100 dark:border-slate-700">
        <div class="px-6 sm:px-8 mx-auto max-w-7xl">
            <nav class="h-20 flex items-center justify-between">
                <div class="flex flex-1 sm:hidden">
                    <button class="p-2.5 rounded-lg text-neutral-700 dark:text-neutral-300 focus:outline-none flex items-center justify-center">
                        <x-lineicons-menu class="w-5 h-5" />
                    </button>
                </div>

                <div class="flex sm:flex-1">
                    <a href="{{ route('home') }}" class="inline-block text-blue-500">
                        <svg width="59" height="41" viewBox="0 0 59 41" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M33.5224 9.69455C34.547 8.66632 35.1818 7.24829 35.1818 5.68181C35.1818 2.54402 32.6378 0 29.5 0C27.516 0 25.7721 1.01857 24.7559 2.55971C24.4868 2.83004 1.8706 30.7044 1.65941 31.0255C0.633591 32.0525 0 33.4705 0 35.037C0 38.1748 2.54281 40.7188 5.6806 40.7188C7.66464 40.7188 9.40853 39.7002 10.4247 38.1591C10.695 37.8888 33.3112 10.0144 33.5224 9.69455Z" fill="currentColor"></path><path d="M46.6081 22.9203C47.6363 21.8921 48.2723 20.4728 48.2723 18.904C48.2723 15.7662 45.7283 13.2221 42.5905 13.2221C40.6065 13.2221 38.8614 14.2419 37.8452 15.7831C37.5737 16.0558 25.6948 30.6972 25.4824 31.0206C24.4541 32.0489 23.8193 33.4681 23.8193 35.037C23.8193 38.1748 26.3621 40.7188 29.4999 40.7188C31.484 40.7188 33.2291 39.699 34.2452 38.1579C34.5168 37.8851 46.3957 23.2437 46.6081 22.9203Z" fill="currentColor"></path><path d="M59.0001 5.68181C59.0001 8.81959 56.4573 11.3636 53.3195 11.3636C50.1817 11.3636 47.6377 8.81959 47.6377 5.68181C47.6377 2.54402 50.1817 0 53.3195 0C56.4573 0 59.0001 2.54402 59.0001 5.68181Z" fill="currentColor"></path><path d="M11.3624 5.68181C11.3624 8.81959 8.81838 11.3636 5.6806 11.3636C2.54281 11.3636 0 8.81959 0 5.68181C0 2.54402 2.54281 0 5.6806 0C8.81838 0 11.3624 2.54402 11.3624 5.68181Z" fill="currentColor"></path>
                        </svg>
                    </a>
                </div>

                <div class="hidden sm:block">
                    <ul class="flex items-center gap-5">
                        <li>
                            <a href="{{ route('home') }}" class="inline-flex items-center text-sm lg:text-[15px] font-medium text-slate-700 dark:text-slate-300 py-2.5 px-4 xl:px-5 rounded-full hover:text-slate-900 hover:bg-slate-100 dark:hover:bg-slate-800 dark:hover:text-slate-200">Trang chủ</a>
                        </li>

                        <li>
                            <a href="" class="inline-flex items-center text-sm lg:text-[15px] font-medium text-slate-700 dark:text-slate-300 py-2.5 px-4 xl:px-5 rounded-full hover:text-slate-900 hover:bg-slate-100 dark:hover:bg-slate-800 dark:hover:text-slate-200">Blog</a>
                        </li>

                        <li>
                            <a href="" class="inline-flex items-center text-sm lg:text-[15px] font-medium text-slate-700 dark:text-slate-300 py-2.5 px-4 xl:px-5 rounded-full hover:text-slate-900 hover:bg-slate-100 dark:hover:bg-slate-800 dark:hover:text-slate-200">Trang chủ</a>
                        </li>

                        <li>
                            <a href="" class="inline-flex items-center text-sm lg:text-[15px] font-medium text-slate-700 dark:text-slate-300 py-2.5 px-4 xl:px-5 rounded-full hover:text-slate-900 hover:bg-slate-100 dark:hover:bg-slate-800 dark:hover:text-slate-200">Liên hệ</a>
                        </li>
                    </ul>
                </div>

                <div class="flex flex-1 justify-end items-center sm:gap-2">
                    <div>
                        <button class="p-3 hover:bg-gray-100 rounded-full">
                            <x-lineicons-search-alt class="w-5 h-5" />
                        </button>
                    </div>

                    <div class="hidden sm:block">
                        <button class="p-3 hover:bg-gray-100 rounded-full">
                            <x-lineicons-alarm class="w-5 h-5" />
                        </button>
                    </div>

                    <div>
                        <button class="p-3 hover:bg-gray-100 rounded-full">
                            <x-lineicons-user class="w-5 h-5" />
                        </button>
                    </div>
                </div>
            </nav>
        </div>
    </div>
</header>
