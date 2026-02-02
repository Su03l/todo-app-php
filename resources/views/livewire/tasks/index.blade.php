<div class="pb-24 relative min-h-screen bg-white">
    <div class="pt-6 pb-6 px-4 flex justify-between items-end bg-white sticky top-0 z-30 border-b border-slate-50">
        <div>
            <h1 class="text-3xl font-black text-slate-900">مهامي</h1>
            <p class="text-slate-400 text-sm mt-1">لديك {{ $tasks->where('is_completed', false)->count() }} مهام متبقية اليوم</p>
        </div>
        <div class="flex items-center gap-3">
            <a href="{{ route('profile') }}" wire:navigate class="w-10 h-10 rounded-full overflow-hidden border-2 border-slate-100 hover:border-sky-500 transition-all">
                @if (Auth::user()->avatar)
                    <img src="{{ asset('storage/' . Auth::user()->avatar) }}" class="w-full h-full object-cover">
                @else
                    <div class="w-full h-full bg-slate-100 flex items-center justify-center text-slate-400">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                    </div>
                @endif
            </a>
            <form action="/logout" method="POST">
                @csrf
                <button type="submit" class="bg-slate-50 text-slate-400 rounded-xl p-2.5 hover:bg-red-50 hover:text-red-500 transition">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path></svg>
                </button>
            </form>
        </div>
    </div>

    <div class="px-4 space-y-3 mt-4">
        @forelse($tasks as $task)
            <div wire:key="{{ $task->id }}" class="group bg-white rounded-3xl p-5 border border-slate-100 shadow-[0_4px_20px_-10px_rgba(0,0,0,0.05)] flex items-start justify-between transition-all duration-300 {{ $task->is_completed ? 'opacity-50' : '' }}">

                <div class="flex items-start gap-4 overflow-hidden">
                    <button wire:click="toggle({{ $task->id }})" class="mt-1 min-w-[24px] h-6 w-6 rounded-full border-2 flex items-center justify-center transition-all {{ $task->is_completed ? 'bg-sky-500 border-sky-500' : 'border-slate-300' }}">
                        @if($task->is_completed)
                            <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                        @endif
                    </button>

                    <div class="flex-1 min-w-0">
                        <h3 class="font-bold text-lg text-slate-900 truncate {{ $task->is_completed ? 'line-through text-slate-400' : '' }}">
                            {{ $task->title }}
                        </h3>
                        @if($task->description)
                            <p class="text-sm text-slate-500 truncate mt-0.5">{{ $task->description }}</p>
                        @endif
                    </div>
                </div>

                <div class="flex items-center gap-2 mr-2">
                    <button wire:click="openEditModal({{ $task->id }})" class="text-slate-400 hover:text-sky-500 p-1">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
                    </button>
                    <button wire:confirm="هل أنت متأكد من الحذف؟" wire:click="delete({{ $task->id }})" class="text-slate-400 hover:text-red-500 p-1">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                    </button>
                </div>
            </div>
        @empty
            <div class="text-center py-10">
                <div class="w-20 h-20 bg-slate-50 rounded-full flex items-center justify-center mx-auto mb-4">
                    <svg class="w-10 h-10 text-slate-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                </div>
                <p class="text-slate-500">لا توجد مهام حالياً، أضف أول مهمة!</p>
            </div>
        @endforelse
    </div>

    <button wire:click="openCreateModal" class="fixed bottom-8 left-6 w-14 h-14 bg-slate-900 text-white rounded-2xl shadow-xl shadow-slate-400/30 flex items-center justify-center z-40 active:scale-90 transition-transform hover:bg-sky-500">
        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
    </button>

    @if($showModal)
        <div class="fixed inset-0 z-50 flex items-end justify-center sm:items-center p-4">
            <div wire:click="$set('showModal', false)" class="fixed inset-0 bg-slate-900/60 backdrop-blur-sm transition-opacity"></div>

            <div class="bg-white rounded-3xl w-full max-w-md p-6 relative z-10 shadow-2xl transform transition-all animate-[slideUp_0.3s_ease-out]">
                <h3 class="text-xl font-bold text-slate-900 mb-6">
                    {{ $isEditMode ? 'تعديل المهمة' : 'مهمة جديدة' }}
                </h3>

                <div class="space-y-4">
                    <div>
                        <input wire:model="title" type="text" placeholder="عنوان المهمة" class="w-full bg-slate-50 border-none rounded-xl px-4 py-4 text-slate-900 focus:ring-2 focus:ring-sky-500 placeholder-slate-400 text-lg font-medium">
                        @error('title') <span class="text-red-500 text-sm block mt-1">{{ $message }}</span> @enderror
                    </div>

                    <div>
                        <textarea wire:model="description" rows="3" placeholder="تفاصيل إضافية (اختياري)" class="w-full bg-slate-50 border-none rounded-xl px-4 py-4 text-slate-900 focus:ring-2 focus:ring-sky-500 placeholder-slate-400 resize-none"></textarea>
                    </div>

                    <div class="flex gap-3 pt-2">
                        <button wire:click="save" class="flex-1 bg-sky-500 text-white font-bold py-3.5 rounded-xl hover:bg-sky-600 transition">
                            حفظ
                        </button>
                        <button wire:click="$set('showModal', false)" class="flex-1 bg-slate-100 text-slate-700 font-bold py-3.5 rounded-xl hover:bg-slate-200 transition">
                            إلغاء
                        </button>
                    </div>
                </div>
            </div>
        </div>
    @endif
</div>
