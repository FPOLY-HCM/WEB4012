<x-layouts.app>
    <div class="relative">
        <div class="absolute h-[400px] top-0 left-0 right-0 w-full bg-primary-100 dark:bg-neutral-800 bg-opacity-25 dark:bg-opacity-40"></div>
        <div class="max-w-7xl mx-auto relative pt-6 sm:pt-10 pb-16 lg:pt-20 lg:pb-28">
            <div class="px-6 lg:px-8 mx-auto bg-white rounded-xl sm:rounded-3xl lg:rounded-[40px] shadow-lg sm:p-10 lg:p-16 dark:bg-neutral-900">
                <div class="">
                    <header class="text-center max-w-2xl mx-auto - mb-14 sm:mb-16 lg:mb-24">
                        <h2 class="flex items-center text-3xl leading-[115%] md:text-5xl md:leading-[115%] font-semibold text-neutral-900 dark:text-neutral-100 justify-center">{{ $title }}</h2>
                        <span class="block text-sm mt-2 text-neutral-700 sm:text-base dark:text-neutral-200">{{ $description }}</span>
                    </header>
                    <div class="flex flex-col space-y-8 xl:space-y-0 xl:flex-row">
                        <div class="flex-shrink-0 max-w-xl xl:w-80 xl:pe-8">
                            <ul class="text-base space-y-1 text-neutral-700 dark:text-neutral-400">
                                <li>
                                    <a class="px-6 py-3 font-medium rounded-full flex items-center bg-neutral-100 dark:bg-neutral-800 text-neutral-900 dark:text-neutral-100" href="{{ route('profile.edit') }}">
                                        <span class="w-8 me-2 text-lg">🛠</span>
                                        <span>Cập nhật thông tin</span>
                                    </a>
                                </li>
                                <li>
                                    <a class="px-6 py-3 font-medium rounded-full flex items-center hover:text-neutral-800 hover:bg-neutral-100 dark:hover:bg-neutral-800 dark:hover:text-neutral-100" href="{{ route('change-password') }}">
                                        <span class="w-8 me-2 text-lg">📃</span>
                                        <span>Đổi mật hẩu</span>
                                    </a>
                                </li>
                                <li class="border-t border-neutral-200 dark:border-neutral-700"></li>
                                <li>
                                    <form action="{{ route('logout') }}" method="post">
                                        @csrf
                                        <button type="submit" class="flex items-center px-6 py-3 font-medium text-red-500" href="/">
                                            <span class="w-8 me-2 text-lg">💡</span>Đăng xuất
                                        </button>
                                    </form>
                                </li>
                            </ul>
                        </div>
                        <div class="border-t border-neutral-500 dark:border-neutral-300 md:hidden"></div>
                        <div class="flex-1">
                            <div class="rounded-xl md:border md:border-neutral-100 dark:border-neutral-800 md:p-6">
                                {{ $slot }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layouts.app>
