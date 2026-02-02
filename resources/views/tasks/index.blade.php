@extends('layouts.app')

@section('content')
<div class="pb-24 relative min-h-screen bg-slate-50/50 pt-safe">
    <!-- Header -->
    <div class="px-6 py-6 flex justify-between items-end bg-white sticky top-0 z-30 border-b border-slate-100 shadow-sm">
        <div>
            <h1 class="text-3xl font-black text-slate-900 tracking-tight">مهامي</h1>
            <p class="text-slate-400 text-sm mt-1 font-medium flex items-center gap-1">
                <span class="w-2 h-2 rounded-full bg-sky-500 animate-pulse"></span>
                لديك {{ $tasks->where('is_completed', false)->count() }} مهام متبقية
            </p>
        </div>
        <div class="flex items-center gap-3">
            <a href="{{ route('profile') }}" class="w-11 h-11 rounded-full overflow-hidden border-2 border-white shadow-md hover:border-sky-500 transition-all ring-2 ring-slate-50">
                @if (Auth::user()->avatar)
                    <img src="{{ asset('storage/' . Auth::user()->avatar) }}" class="w-full h-full object-cover">
                @else
                    <div class="w-full h-full bg-slate-100 flex items-center justify-center text-slate-400">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                    </div>
                @endif
            </a>
            <form action="/logout" method="POST">
                @csrf
                <button type="submit" class="bg-white text-slate-400 rounded-xl p-3 hover:bg-red-50 hover:text-red-500 transition shadow-sm border border-slate-100">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path></svg>
                </button>
            </form>
        </div>
    </div>

    <!-- Success Message -->
    @if(session('success'))
        <div class="px-4 mt-6">
            <div class="bg-green-50 text-green-600 px-4 py-3 rounded-2xl text-sm font-bold text-center border border-green-100 shadow-sm flex items-center justify-center gap-2">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                {{ session('success') }}
            </div>
        </div>
    @endif

    <!-- Tasks List -->
    <div class="px-4 space-y-4 mt-6">
        @forelse($tasks as $task)
            <div class="group bg-white rounded-[1.5rem] p-5 border border-slate-100 shadow-sm hover:shadow-md transition-all duration-300 {{ $task->is_completed ? 'opacity-60 bg-slate-50' : '' }}">

                <div class="flex items-start gap-4 overflow-hidden">
                    <!-- Toggle Form -->
                    <form action="{{ route('tasks.toggle', $task->id) }}" method="POST">
                        @csrf
                        @method('PATCH')
                        <button type="submit" class="mt-1 min-w-[28px] h-7 w-7 rounded-full border-2 flex items-center justify-center transition-all {{ $task->is_completed ? 'bg-sky-500 border-sky-500 shadow-lg shadow-sky-200' : 'border-slate-200 hover:border-sky-500 bg-white' }}">
                            @if($task->is_completed)
                                <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"></path></svg>
                            @endif
                        </button>
                    </form>

                    <div class="flex-1 min-w-0 pt-0.5">
                        <h3 class="font-bold text-lg text-slate-900 truncate transition-all {{ $task->is_completed ? 'line-through text-slate-400' : '' }}">
                            {{ $task->title }}
                        </h3>
                        @if($task->description)
                            <p class="text-sm text-slate-500 truncate mt-1 font-medium">{{ $task->description }}</p>
                        @endif
                    </div>
                </div>

                <div class="flex items-center justify-end gap-2 mt-4 pt-4 border-t border-slate-50">
                    <!-- Edit Button -->
                    <button onclick="openEditModal('{{ $task->id }}', '{{ $task->title }}', '{{ $task->description }}')" class="flex items-center gap-1 px-3 py-1.5 rounded-lg text-xs font-bold text-slate-500 bg-slate-50 hover:bg-sky-50 hover:text-sky-600 transition-colors">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
                        تعديل
                    </button>

                    <!-- Delete Form -->
                    <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" onsubmit="return confirm('هل أنت متأكد؟')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="flex items-center gap-1 px-3 py-1.5 rounded-lg text-xs font-bold text-slate-500 bg-slate-50 hover:bg-red-50 hover:text-red-600 transition-colors">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                            حذف
                        </button>
                    </form>
                </div>
            </div>
        @empty
            <div class="text-center py-16">
                <div class="w-24 h-24 bg-slate-100 rounded-full flex items-center justify-center mx-auto mb-6 shadow-inner">
                    <svg class="w-12 h-12 text-slate-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path></svg>
                </div>
                <h3 class="text-xl font-bold text-slate-900 mb-2">لا توجد مهام حالياً</h3>
                <p class="text-slate-500 font-medium">ابدأ بإضافة أول مهمة لك واستمتع بالإنجاز!</p>
            </div>
        @endforelse
    </div>

    <!-- FAB (Floating Action Button) -->
    <button onclick="openCreateModal()" class="fixed bottom-8 left-6 w-16 h-16 bg-slate-900 text-white rounded-2xl shadow-xl shadow-slate-900/30 flex items-center justify-center z-40 active:scale-90 transition-transform hover:bg-sky-500 hover:shadow-sky-500/40 group">
        <svg class="w-8 h-8 group-hover:rotate-90 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
    </button>

    <!-- Modal -->
    <div id="taskModal" class="fixed inset-0 z-50 hidden flex items-end justify-center sm:items-center p-4 pb-safe">
        <div onclick="closeModal()" class="fixed inset-0 bg-slate-900/60 backdrop-blur-md transition-opacity"></div>

        <div class="bg-white rounded-[2rem] w-full max-w-md p-6 relative z-10 shadow-2xl transform transition-all animate-[slideUp_0.3s_ease-out] mb-4 sm:mb-0">
            <div class="w-12 h-1.5 bg-slate-200 rounded-full mx-auto mb-6"></div>

            <h3 id="modalTitle" class="text-2xl font-black text-slate-900 mb-6 text-center">مهمة جديدة</h3>

            <form id="taskForm" action="{{ route('tasks.store') }}" method="POST" class="space-y-5">
                @csrf
                <input type="hidden" name="_method" id="formMethod" value="POST">

                <div>
                    <label class="block text-sm font-bold text-slate-700 mb-2 mr-1">عنوان المهمة</label>
                    <input type="text" name="title" id="taskTitleInput" placeholder="مثلاً: شراء القهوة" required class="w-full bg-slate-50 border-2 border-transparent focus:border-sky-500 rounded-2xl px-5 py-4 text-slate-900 placeholder-slate-400 text-lg font-bold transition-all outline-none">
                </div>

                <div>
                    <label class="block text-sm font-bold text-slate-700 mb-2 mr-1">تفاصيل إضافية</label>
                    <textarea name="description" id="taskDescInput" rows="3" placeholder="أي ملاحظات إضافية..." class="w-full bg-slate-50 border-2 border-transparent focus:border-sky-500 rounded-2xl px-5 py-4 text-slate-900 placeholder-slate-400 font-medium resize-none transition-all outline-none"></textarea>
                </div>

                <div class="flex gap-3 pt-4">
                    <button type="submit" class="flex-1 bg-sky-500 text-white font-bold py-4 rounded-2xl hover:bg-sky-600 transition shadow-lg shadow-sky-200 active:scale-95">
                        حفظ
                    </button>
                    <button type="button" onclick="closeModal()" class="flex-1 bg-slate-100 text-slate-700 font-bold py-4 rounded-2xl hover:bg-slate-200 transition active:scale-95">
                        إلغاء
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    function openCreateModal() {
        document.getElementById('taskModal').classList.remove('hidden');
        document.getElementById('modalTitle').innerText = 'مهمة جديدة';
        document.getElementById('taskForm').action = "{{ route('tasks.store') }}";
        document.getElementById('formMethod').value = "POST";
        document.getElementById('taskTitleInput').value = "";
        document.getElementById('taskDescInput').value = "";
    }

    function openEditModal(id, title, description) {
        document.getElementById('taskModal').classList.remove('hidden');
        document.getElementById('modalTitle').innerText = 'تعديل المهمة';
        document.getElementById('taskForm').action = "/tasks/" + id;
        document.getElementById('formMethod').value = "PUT";
        document.getElementById('taskTitleInput').value = title;
        document.getElementById('taskDescInput').value = description;
    }

    function closeModal() {
        document.getElementById('taskModal').classList.add('hidden');
    }
</script>
@endsection
