<x-layouts.app>
    <div class="relative">
        <div class="absolute h-[400px] top-0 left-0 right-0 w-full bg-blue-100 dark:bg-neutral-800 bg-opacity-25 dark:bg-opacity-40"></div>
        <div class="max-w-7xl mx-auto relative pt-6 sm:pt-10 pb-16 lg:pt-20 lg:pb-28">
            <div class="px-6 lg:px-8 mx-auto bg-white rounded-xl sm:rounded-3xl lg:rounded-[40px] shadow-lg sm:p-10 lg:p-16 dark:bg-neutral-900">
                <header class="text-center max-w-2xl mx-auto - mb-14 sm:mb-16 lg:mb-20">
                    <h2 class="flex items-center text-3xl leading-[115%] md:text-5xl md:leading-[115%] font-semibold text-neutral-900 dark:text-neutral-100 justify-center">Đăng ký</h2>
                    <span class="block text-sm mt-2 text-neutral-700 sm:text-base dark:text-neutral-200">Đăng ký tài khoản để bắt đầu sử dụng</span>
                </header>
                <div class="max-w-md mx-auto space-y-6">
                    <form class="grid grid-cols-1 gap-6" action="{{ route('register') }}" method="post">
                        @csrf

                        <label class="block">
                            <span class="text-neutral-800 dark:text-neutral-200">Họ tên</span>
                            <input
                                class="block w-full border-neutral-200 focus:border-blue-300 focus:ring focus:ring-blue-200/50 bg-white dark:border-neutral-500 dark:focus:ring-blue-500/30 dark:bg-neutral-900 rounded-full text-sm font-normal h-11 px-4 py-3 mt-1"
                                placeholder="Nhập họ tên"
                                type="text"
                                name="name"
                                autofocus
                                :value="old('name')"
                            />
                            <x-input-error :messages="$errors->get('name')" class="mt-2" />
                        </label>
                        <label class="block">
                            <span class="text-neutral-800 dark:text-neutral-200">Địa chỉ email</span>
                            <input
                                class="block w-full border-neutral-200 focus:border-blue-300 focus:ring focus:ring-blue-200/50 bg-white dark:border-neutral-500 dark:focus:ring-blue-500/30 dark:bg-neutral-900 rounded-full text-sm font-normal h-11 px-4 py-3 mt-1"
                                placeholder="example@example.com"
                                type="email"
                                name="email"
                                :value="old('email')"
                            />
                            <x-input-error :messages="$errors->get('email')" class="mt-2" />
                        </label>
                        <label class="block">
                            <span class="flex justify-between items-center text-neutral-800 dark:text-neutral-200">Mật khẩu</span>
                            <input
                                class="block w-full border-neutral-200 focus:border-blue-300 focus:ring focus:ring-blue-200/50 bg-white dark:border-neutral-500 dark:focus:ring-blue-500/30 dark:bg-neutral-900 rounded-full text-sm font-normal h-11 px-4 py-3 mt-1"
                                type="password"
                                name="password"
                            />
                            <x-input-error :messages="$errors->get('password')" class="mt-2" />
                        </label>
                        <span class="flex justify-between items-center text-neutral-800 dark:text-neutral-200">Nhập lại mật khẩu</span>
                        <input
                            class="block w-full border-neutral-200 focus:border-blue-300 focus:ring focus:ring-blue-200/50 bg-white dark:border-neutral-500 dark:focus:ring-blue-500/30 dark:bg-neutral-900 rounded-full text-sm font-normal h-11 px-4 py-3 mt-1"
                            type="password"
                            name="password_confirmation"
                        />
                        <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                        </label>
                        <button
                            class="flex-shrink-0 relative h-auto inline-flex items-center justify-center rounded-full transition-colors border-transparent bg-blue-700 hover:bg-blue-600 text-blue-50 text-sm sm:text-base font-medium py-3 px-4 sm:py-3.5 sm:px-6"
                            type="submit"
                        >
                            Đăng ký
                        </button>
                    </form>
                    <span class="block text-center text-neutral-700 dark:text-neutral-300">
                    Đã có tài khoản? <a class="text-blue-600 hover:text-blue-800 dark:text-blue-500 dark:hover:text-blue-600 font-medium" href="{{ route('login') }}">Đăng nhập</a>
                </span>
                </div>
            </div>
        </div>
    </div>
</x-layouts.app>
