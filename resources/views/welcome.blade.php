@extends('layouts.app')

@section('content')
<div class="relative overflow-hidden">
    <!-- Navbar -->
    <nav class="flex items-center justify-between px-8 py-6 max-w-7xl mx-auto relative z-10">
        <div class="flex items-center gap-2">
            <div class="w-10 h-10 bg-black rounded-xl flex items-center justify-center">
                <svg class="w-6 h-6 text-cyan-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
            </div>
            <span class="text-xl font-bold tracking-tight">إنجاز</span>
        </div>
        <div class="hidden md:flex items-center gap-8 text-sm font-medium">
            <a href="#" class="hover:text-cyan-500 transition-colors">المميزات</a>
            <a href="#" class="hover:text-cyan-500 transition-colors">الأسعار</a>
            <a href="#" class="hover:text-cyan-500 transition-colors">عن التطبيق</a>
        </div>
        <div class="flex items-center gap-4">
            <a href="{{ route('login') }}" class="text-sm font-semibold hover:text-cyan-500 transition-colors">تسجيل الدخول</a>
            <a href="{{ route('register') }}" class="bg-black text-white px-6 py-2.5 rounded-full text-sm font-semibold hover:bg-gray-800 transition-all shadow-lg shadow-gray-200">ابدأ مجاناً</a>
        </div>
    </nav>

    <!-- Hero Section -->
    <main class="max-w-7xl mx-auto px-8 pt-20 pb-32 relative">
        <div class="grid lg:grid-cols-2 gap-16 items-center">
            <div>
                <div class="inline-flex items-center gap-2 bg-cyan-50 text-cyan-700 px-4 py-2 rounded-full text-sm font-medium mb-6">
                    <span class="relative flex h-2 w-2">
                        <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-cyan-400 opacity-75"></span>
                        <span class="relative inline-flex rounded-full h-2 w-2 bg-cyan-500"></span>
                    </span>
                    نظام إدارة المهام الأذكى
                </div>
                <h1 class="text-6xl lg:text-7xl font-extrabold leading-[1.1] mb-8">
                    نظم مهامك <br>
                    <span class="text-cyan-500">بلمسة عصرية</span>
                </h1>
                <p class="text-gray-500 text-xl leading-relaxed mb-10 max-w-lg">
                    تطبيق "إنجاز" يساعدك على ترتيب أولوياتك وزيادة إنتاجيتك بتصميم بسيط وقوي في آن واحد.
                </p>
                <div class="flex flex-col sm:flex-row gap-4">
                    <a href="{{ route('register') }}" class="bg-black text-white px-8 py-4 rounded-2xl text-lg font-bold hover:bg-gray-800 transition-all text-center shadow-xl shadow-gray-200">
                        ابدأ رحلة الإنجاز
                    </a>
                    <a href="#" class="flex items-center justify-center gap-2 px-8 py-4 rounded-2xl text-lg font-bold border-2 border-gray-100 hover:bg-gray-50 transition-all">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.752 11.168l-3.197-2.132A1 1 0 0010 9.87v4.263a1 1 0 001.555.832l3.197-2.132a1 1 0 000-1.664z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        شاهد الفيديو
                    </a>
                </div>
            </div>
            <div class="relative">
                <div class="absolute -top-20 -right-20 w-64 h-64 bg-cyan-100 rounded-full blur-3xl opacity-50"></div>
                <div class="absolute -bottom-20 -left-20 w-64 h-64 bg-blue-100 rounded-full blur-3xl opacity-50"></div>
                <div class="relative bg-white border border-gray-100 p-4 rounded-[2.5rem] shadow-2xl">
                    <div class="bg-gray-50 rounded-[2rem] p-8 aspect-square flex flex-col justify-center items-center text-center">
                        <div class="w-20 h-20 bg-cyan-500 rounded-3xl rotate-12 mb-6 flex items-center justify-center shadow-lg shadow-cyan-200">
                            <svg class="w-10 h-10 text-white -rotate-12" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path></svg>
                        </div>
                        <h3 class="text-2xl font-bold mb-2">بساطة في التنفيذ</h3>
                        <p class="text-gray-500">كل ما تحتاجه هو التركيز على ما يهم فعلاً.</p>
                    </div>
                </div>
            </div>
        </div>
    </main>
</div>
@endsection
