<div class="min-h-screen bg-white px-6 py-8 flex flex-col pt-safe">
    <div class="mb-8 text-center">
        <div class="inline-flex items-center justify-center w-16 h-16 rounded-3xl bg-sky-50 text-sky-500 mb-6 shadow-lg shadow-sky-100">
            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"></path></svg>
        </div>
        <h2 class="text-3xl font-black text-slate-900">حساب جديد</h2>
        <p class="text-slate-400 mt-2 font-medium">ابدأ رحلة الإنجاز اليوم 🚀</p>
    </div>

    <form wire:submit.prevent="register" class="space-y-5 flex-1">

        <div class="grid grid-cols-2 gap-4">
            <div>
                <label class="block text-sm font-bold text-slate-700 mb-2">الاسم الأول</label>
                <div class="relative">
                    <div class="absolute inset-y-0 right-0 pr-4 flex items-center pointer-events-none">
                        <svg class="h-5 w-5 text-slate-400" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" /></svg>
                    </div>
                    <input wire:model.blur="first_name" type="text" class="w-full bg-slate-50 border-2 border-transparent focus:border-sky-500 rounded-2xl pr-11 pl-4 py-3.5 text-slate-900 placeholder-slate-400 transition-all font-medium focus:bg-white focus:shadow-lg focus:shadow-sky-100/50 outline-none" placeholder="أحمد">
                </div>
                @error('first_name') <span class="text-red-500 text-xs px-2 block mt-1 font-bold">{{ $message }}</span> @enderror
            </div>
            <div>
                <label class="block text-sm font-bold text-slate-700 mb-2">الاسم الأخير</label>
                <div class="relative">
                    <div class="absolute inset-y-0 right-0 pr-4 flex items-center pointer-events-none">
                        <svg class="h-5 w-5 text-slate-400" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" /></svg>
                    </div>
                    <input wire:model.blur="last_name" type="text" class="w-full bg-slate-50 border-2 border-transparent focus:border-sky-500 rounded-2xl pr-11 pl-4 py-3.5 text-slate-900 placeholder-slate-400 transition-all font-medium focus:bg-white focus:shadow-lg focus:shadow-sky-100/50 outline-none" placeholder="علي">
                </div>
                @error('last_name') <span class="text-red-500 text-xs px-2 block mt-1 font-bold">{{ $message }}</span> @enderror
            </div>
        </div>

        <div>
            <label class="block text-sm font-bold text-slate-700 mb-2">اسم المستخدم</label>
            <div class="relative">
                <div class="absolute inset-y-0 right-0 pr-4 flex items-center pointer-events-none">
                    <svg class="h-5 w-5 text-slate-400" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207" /></svg>
                </div>
                <input wire:model.blur="username" type="text" class="w-full bg-slate-50 border-2 border-transparent focus:border-sky-500 rounded-2xl pr-11 pl-4 py-3.5 text-slate-900 placeholder-slate-400 transition-all font-medium focus:bg-white focus:shadow-lg focus:shadow-sky-100/50 outline-none" placeholder="ahmed_ali">
            </div>
            @error('username') <span class="text-red-500 text-xs px-2 block mt-1 font-bold">{{ $message }}</span> @enderror
        </div>

        <div>
            <label class="block text-sm font-bold text-slate-700 mb-2">البريد الإلكتروني</label>
            <div class="relative">
                <div class="absolute inset-y-0 right-0 pr-4 flex items-center pointer-events-none">
                    <svg class="h-5 w-5 text-slate-400" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" /></svg>
                </div>
                <input wire:model.blur="email" type="email" class="w-full bg-slate-50 border-2 border-transparent focus:border-sky-500 rounded-2xl pr-11 pl-4 py-3.5 text-slate-900 placeholder-slate-400 transition-all font-medium focus:bg-white focus:shadow-lg focus:shadow-sky-100/50 outline-none" placeholder="example@mail.com">
            </div>
            @error('email') <span class="text-red-500 text-xs px-2 block mt-1 font-bold">{{ $message }}</span> @enderror
        </div>

        <div>
            <label class="block text-sm font-bold text-slate-700 mb-2">كلمة المرور</label>
            <div class="relative" x-data="{ show: false }">
                <div class="absolute inset-y-0 right-0 pr-4 flex items-center pointer-events-none">
                    <svg class="h-5 w-5 text-slate-400" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" /></svg>
                </div>
                <input wire:model.blur="password" :type="show ? 'text' : 'password'" class="w-full bg-slate-50 border-2 border-transparent focus:border-sky-500 rounded-2xl pr-11 pl-12 py-3.5 text-slate-900 placeholder-slate-400 transition-all font-medium focus:bg-white focus:shadow-lg focus:shadow-sky-100/50 outline-none" placeholder="••••••••">
                <button type="button" @click="show = !show" class="absolute inset-y-0 left-0 pl-4 flex items-center text-slate-400 hover:text-sky-500">
                    <svg x-show="!show" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" /><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" /></svg>
                    <svg x-show="show" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" style="display: none;"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21" /></svg>
                </button>
            </div>
            @error('password') <span class="text-red-500 text-xs px-2 block mt-1 font-bold">{{ $message }}</span> @enderror
        </div>

        <div>
            <label class="block text-sm font-bold text-slate-700 mb-2">تأكيد كلمة المرور</label>
            <div class="relative">
                <div class="absolute inset-y-0 right-0 pr-4 flex items-center pointer-events-none">
                    <svg class="h-5 w-5 text-slate-400" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                </div>
                <input wire:model.blur="password_confirmation" type="password" class="w-full bg-slate-50 border-2 border-transparent focus:border-sky-500 rounded-2xl pr-11 pl-12 py-3.5 text-slate-900 placeholder-slate-400 transition-all font-medium focus:bg-white focus:shadow-lg focus:shadow-sky-100/50 outline-none" placeholder="••••••••">
            </div>
        </div>

        <div class="pt-4">
            <button type="submit" class="w-full bg-sky-500 text-white font-bold py-4 rounded-2xl shadow-lg shadow-sky-200 active:scale-95 transition-all hover:bg-sky-600 flex items-center justify-center gap-2">
                <span wire:loading.remove>إنشاء الحساب</span>
                <span wire:loading class="animate-pulse">جاري المعالجة...</span>
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"></path></svg>
            </button>
        </div>
    </form>

    <div class="mt-8 text-center text-sm text-slate-500 font-medium">
        لديك حساب بالفعل؟ <a href="/login" wire:navigate class="text-sky-500 font-bold hover:underline">تسجيل الدخول</a>
    </div>
</div>
