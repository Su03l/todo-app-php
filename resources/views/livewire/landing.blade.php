<div class="h-screen w-full bg-white selection:bg-sky-100 selection:text-sky-600 font-sans flex flex-col justify-between pt-safe pb-safe overflow-hidden relative">

    <!-- Background Elements -->
    <div class="absolute top-0 left-0 w-full h-full overflow-hidden pointer-events-none z-0">
        <div class="absolute -top-[20%] -right-[20%] w-[70%] h-[70%] bg-sky-50/50 rounded-full blur-3xl opacity-60"></div>
        <div class="absolute top-[40%] -left-[10%] w-[50%] h-[50%] bg-blue-50/30 rounded-full blur-3xl opacity-40"></div>
    </div>

    <!-- Navbar / Logo -->
    <header class="px-6 py-6 flex justify-center z-10">
        <div class="flex items-center gap-2 bg-white/50 backdrop-blur-sm px-4 py-2 rounded-full border border-slate-100 shadow-sm">
            <div class="w-8 h-8 bg-slate-900 rounded-lg flex items-center justify-center text-white">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
            </div>
            <span class="text-lg font-black tracking-tight text-slate-900">إنجاز</span>
        </div>
    </header>

    <!-- Main Content -->
    <main class="flex-1 flex flex-col items-center justify-center px-6 text-center z-10 w-full max-w-md mx-auto">

        <!-- Icon/Badge -->
        <div class="mb-8 relative">
            <div class="absolute inset-0 bg-sky-200 blur-xl opacity-30 rounded-full"></div>
            <div class="relative w-20 h-20 bg-gradient-to-br from-sky-400 to-blue-600 rounded-3xl flex items-center justify-center text-white shadow-xl shadow-sky-200 rotate-3 transform hover:rotate-6 transition-transform duration-500">
                <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>
            </div>
        </div>

        <h1 class="text-4xl md:text-5xl font-black text-slate-900 leading-tight mb-4 tracking-tight">
            نظم يومك <br>
            <span class="text-transparent bg-clip-text bg-gradient-to-r from-sky-500 to-blue-600">بذكاء وسهولة</span>
        </h1>

        <p class="text-slate-500 text-lg mb-10 leading-relaxed max-w-xs mx-auto">
            تطبيقك المفضل لإدارة المهام وزيادة الإنتاجية بتصميم عصري وبسيط.
        </p>

        <!-- Action Buttons -->
        <div class="w-full space-y-3">
            <!-- ❌ تمت إزالة wire:navigate لضمان العمل على المحاكي -->
            <a href="{{ route('register') }}" class="block w-full bg-slate-900 text-white py-4 rounded-2xl text-lg font-bold hover:bg-slate-800 transition-all shadow-lg shadow-slate-200 active:scale-[0.98] flex items-center justify-center gap-2">
                <span>ابدأ الآن مجاناً</span>
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"></path></svg>
            </a>

            <a href="{{ route('login') }}" class="block w-full bg-white text-slate-700 border-2 border-slate-100 py-4 rounded-2xl text-lg font-bold hover:bg-slate-50 hover:border-slate-200 transition-all active:scale-[0.98]">
                تسجيل الدخول
            </a>
        </div>
    </main>

    <!-- Footer -->
    <footer class="px-6 py-6 text-center z-10">
        <p class="text-slate-400 text-xs font-medium">جميع الحقوق محفوظة © {{ date('Y') }} إنجاز</p>
    </footer>
</div>
