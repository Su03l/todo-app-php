<div class="min-h-screen flex flex-col justify-center px-6 py-12 bg-gray-50 dark:bg-gray-900">
    <div class="sm:mx-auto sm:w-full sm:max-w-sm text-center mb-10">
        <div
            class="mx-auto h-16 w-16 bg-blue-600 rounded-2xl flex items-center justify-center shadow-lg shadow-blue-500/30">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-white" fill="none" viewBox="0 0 24 24"
                 stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/>
            </svg>
        </div>
        <h2 class="mt-6 text-2xl font-bold leading-9 tracking-tight text-gray-900 dark:text-white">
            مرحباً بك مجدداً 👋
        </h2>
        <p class="text-sm text-gray-500 mt-2">سجل دخولك لإدارة مهامك</p>
    </div>

    <div class="sm:mx-auto sm:w-full sm:max-w-sm">
        <form wire:submit="login" class="space-y-6">

            <div>
                <label for="login" class="block text-sm font-medium leading-6 text-gray-900 dark:text-gray-200">
                    البريد الإلكتروني أو اسم المستخدم
                </label>
                <div class="mt-2">
                    <input wire:model="login_field" id="login" name="login" type="text" autocomplete="username" required
                           class="block w-full rounded-xl border-0 py-3.5 px-4 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-600 sm:text-sm sm:leading-6 bg-white dark:bg-gray-800 dark:ring-gray-700 dark:text-white transition-all duration-200">
                </div>
                @error('login_field') <span class="text-red-500 text-xs mt-1">{{ $message }}</span> @enderror
            </div>

            <div>
                <div class="flex items-center justify-between">
                    <label for="password" class="block text-sm font-medium leading-6 text-gray-900 dark:text-gray-200">
                        كلمة المرور
                    </label>
                    <div class="text-sm">
                        <a href="#" class="font-semibold text-blue-600 hover:text-blue-500">نسيت كلمة المرور؟</a>
                    </div>
                </div>
                <div class="mt-2">
                    <input wire:model="password" id="password" name="password" type="password"
                           autocomplete="current-password" required
                           class="block w-full rounded-xl border-0 py-3.5 px-4 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-600 sm:text-sm sm:leading-6 bg-white dark:bg-gray-800 dark:ring-gray-700 dark:text-white transition-all duration-200">
                </div>
                @error('password') <span class="text-red-500 text-xs mt-1">{{ $message }}</span> @enderror
            </div>

            <div>
                <button type="submit"
                        class="flex w-full justify-center rounded-xl bg-blue-600 px-3 py-3.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-blue-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-blue-600 transition-transform active:scale-95 duration-150">
                    <span wire:loading.remove>تسجيل الدخول</span>
                    <span wire:loading class="animate-pulse">جاري التحقق...</span>
                </button>
            </div>
        </form>

        <p class="mt-10 text-center text-sm text-gray-500">
            ليس لديك حساب؟
            <a href="/register" class="font-semibold leading-6 text-blue-600 hover:text-blue-500">أنشئ حساباً جديداً</a>
        </p>
    </div>
</div>
