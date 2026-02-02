<div class="min-h-screen bg-white pb-24">
    <!-- Header -->
    <div class="pt-6 pb-6 px-4 flex items-center gap-4 bg-white sticky top-0 z-30 border-b border-slate-50">
        <a href="{{ route('dashboard') }}" wire:navigate class="bg-slate-50 text-slate-500 rounded-xl p-3 hover:bg-slate-100 transition">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path></svg>
        </a>
        <h1 class="text-2xl font-black text-slate-900">الملف الشخصي</h1>
    </div>

    <div class="px-4 py-6 max-w-2xl mx-auto space-y-8">

        <!-- Avatar Section -->
        <div class="flex flex-col items-center">
            <div class="relative group">
                <div class="w-32 h-32 rounded-full overflow-hidden border-4 border-slate-50 shadow-xl shadow-slate-100">
                    @if ($new_avatar)
                        <img src="{{ $new_avatar->temporaryUrl() }}" class="w-full h-full object-cover">
                    @elseif ($avatar)
                        <img src="{{ asset('storage/' . $avatar) }}" class="w-full h-full object-cover">
                    @else
                        <div class="w-full h-full bg-slate-100 flex items-center justify-center text-slate-300">
                            <svg class="w-16 h-16" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                        </div>
                    @endif
                </div>
                <label for="avatar-upload" class="absolute bottom-0 right-0 bg-sky-500 text-white p-2.5 rounded-full shadow-lg cursor-pointer hover:bg-sky-600 transition-transform active:scale-90">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 13a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                </label>
                <input wire:model="new_avatar" id="avatar-upload" type="file" class="hidden" accept="image/*">
            </div>
            <p class="text-slate-400 text-sm mt-4 font-medium">{{ '@' . $username }}</p>
        </div>

        <!-- Personal Info Form -->
        <form wire:submit="updateProfile" class="space-y-6">
            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-bold text-slate-700 mb-2">الاسم الأول</label>
                    <input wire:model="first_name" type="text" class="w-full bg-slate-50 border-none rounded-2xl px-4 py-3.5 focus:ring-2 focus:ring-sky-500 text-slate-900 font-medium transition-all">
                    @error('first_name') <span class="text-red-500 text-xs px-2">{{ $message }}</span> @enderror
                </div>
                <div>
                    <label class="block text-sm font-bold text-slate-700 mb-2">الاسم الأخير</label>
                    <input wire:model="last_name" type="text" class="w-full bg-slate-50 border-none rounded-2xl px-4 py-3.5 focus:ring-2 focus:ring-sky-500 text-slate-900 font-medium transition-all">
                    @error('last_name') <span class="text-red-500 text-xs px-2">{{ $message }}</span> @enderror
                </div>
            </div>

            <div>
                <label class="block text-sm font-bold text-slate-700 mb-2">اسم المستخدم</label>
                <input wire:model="username" type="text" class="w-full bg-slate-50 border-none rounded-2xl px-4 py-3.5 focus:ring-2 focus:ring-sky-500 text-slate-900 font-medium transition-all">
                @error('username') <span class="text-red-500 text-xs px-2">{{ $message }}</span> @enderror
            </div>

            <div>
                <label class="block text-sm font-bold text-slate-700 mb-2">البريد الإلكتروني</label>
                <input wire:model="email" type="email" class="w-full bg-slate-50 border-none rounded-2xl px-4 py-3.5 focus:ring-2 focus:ring-sky-500 text-slate-900 font-medium transition-all">
                @error('email') <span class="text-red-500 text-xs px-2">{{ $message }}</span> @enderror
            </div>

            <button type="submit" class="w-full bg-slate-900 text-white font-bold py-4 rounded-2xl shadow-lg shadow-slate-200 active:scale-95 transition-all hover:bg-slate-800">
                حفظ التغييرات
            </button>

            @if (session('profile_success'))
                <div class="bg-green-50 text-green-600 px-4 py-3 rounded-xl text-sm font-bold text-center animate-pulse">
                    {{ session('profile_success') }}
                </div>
            @endif
        </form>

        <hr class="border-slate-100 my-8">

        <!-- Password Form -->
        <div class="space-y-6">
            <h3 class="text-xl font-bold text-slate-900">تغيير كلمة المرور</h3>

            <form wire:submit="updatePassword" class="space-y-4">
                <div>
                    <label class="block text-sm font-bold text-slate-700 mb-2">كلمة المرور الحالية</label>
                    <input wire:model="current_password" type="password" class="w-full bg-slate-50 border-none rounded-2xl px-4 py-3.5 focus:ring-2 focus:ring-sky-500 text-slate-900 transition-all">
                    @error('current_password') <span class="text-red-500 text-xs px-2">{{ $message }}</span> @enderror
                </div>

                <div>
                    <label class="block text-sm font-bold text-slate-700 mb-2">كلمة المرور الجديدة</label>
                    <input wire:model="new_password" type="password" class="w-full bg-slate-50 border-none rounded-2xl px-4 py-3.5 focus:ring-2 focus:ring-sky-500 text-slate-900 transition-all">
                    @error('new_password') <span class="text-red-500 text-xs px-2">{{ $message }}</span> @enderror
                </div>

                <div>
                    <label class="block text-sm font-bold text-slate-700 mb-2">تأكيد كلمة المرور الجديدة</label>
                    <input wire:model="new_password_confirmation" type="password" class="w-full bg-slate-50 border-none rounded-2xl px-4 py-3.5 focus:ring-2 focus:ring-sky-500 text-slate-900 transition-all">
                </div>

                <button type="submit" class="w-full bg-white border-2 border-slate-100 text-slate-900 font-bold py-4 rounded-2xl hover:bg-slate-50 active:scale-95 transition-all">
                    تحديث كلمة المرور
                </button>

                @if (session('password_success'))
                    <div class="bg-green-50 text-green-600 px-4 py-3 rounded-xl text-sm font-bold text-center animate-pulse">
                        {{ session('password_success') }}
                    </div>
                @endif
            </form>
        </div>
    </div>
</div>
