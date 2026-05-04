<x-app-layout>
    <div class="bg-gray-100 min-h-screen py-8">
        <div class="max-w-[1400px] mx-auto px-4 sm:px-6 lg:px-8">
            
            <div class="flex items-center gap-3 mb-6">
                <a href="{{ route('webinar.index') }}" class="w-10 h-10 bg-white rounded-full flex items-center justify-center text-gray-500 border border-gray-200 hover:bg-gray-50 transition-colors shadow-sm">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M15 19l-7-7 7-7"></path></svg>
                </a>
                <h1 class="text-xl font-black text-gray-800 line-clamp-1">Portal Interactive Streaming</h1>
            </div>

            <div class="flex flex-col lg:flex-row gap-6">
                
                <!-- Kiri: Video Area (70%) -->
                <div class="w-full lg:w-[70%]">
                    <!-- Video Embed -->
                    <div class="w-full aspect-video bg-black rounded-3xl overflow-hidden shadow-2xl relative border border-gray-800">
                        @if($webinar->link_streaming)
                            <iframe src="{{ $webinar->link_streaming }}" title="Live Streaming" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen class="w-full h-full absolute inset-0"></iframe>
                        @else
                            <div class="absolute inset-0 flex flex-col items-center justify-center bg-gray-900 border-[10px] border-black">
                                <svg class="w-20 h-20 text-gray-700 mb-6 animate-pulse" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z"></path></svg>
                                <h2 class="text-3xl font-black text-gray-500 tracking-widest uppercase">Streaming Belum Dimulai</h2>
                                <p class="text-gray-600 mt-2 font-medium">Harap tunggu aba-aba dari host/pembicara.</p>
                            </div>
                        @endif
                    </div>

                    <!-- Video Details -->
                    <div class="bg-white rounded-3xl p-8 mt-6 shadow-sm border border-gray-100">
                        <div class="flex flex-col md:flex-row justify-between md:items-start gap-4 mb-4">
                            <div>
                                <h2 class="text-3xl font-black text-gray-900 mb-3 leading-tight">{{ $webinar->judul }}</h2>
                                <div class="flex items-center gap-4 text-sm font-bold text-gray-500">
                                    <span class="flex items-center gap-2 text-emerald-600 bg-emerald-50 px-3 py-1.5 rounded-lg border border-emerald-100">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                                        {{ $webinar->pembicara }}
                                    </span>
                                    <span class="flex items-center gap-2">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                                        {{ \Carbon\Carbon::parse($webinar->waktu_mulai)->translatedFormat('d M Y') }}
                                    </span>
                                </div>
                            </div>
                            <!-- Status Badge -->
                            @if($webinar->status == 'live')
                                <div class="px-4 py-2 bg-red-100 text-red-600 border border-red-200 text-xs font-black rounded-xl uppercase tracking-widest flex items-center gap-2 shrink-0">
                                    <div class="w-2 h-2 rounded-full bg-red-500 animate-pulse"></div>LIVE STREAMING
                                </div>
                            @elseif($webinar->status == 'finished')
                                <div class="px-4 py-2 bg-gray-100 text-gray-500 border border-gray-200 text-xs font-black rounded-xl uppercase tracking-widest shrink-0">
                                    SELESAI
                                </div>
                            @endif
                        </div>
                        <hr class="border-gray-100 my-6">
                        <div class="prose max-w-none text-gray-600 font-medium leading-relaxed">
                            {!! nl2br(e($webinar->deskripsi)) !!}
                        </div>
                    </div>
                </div>

                <!-- Kanan: Live Chat Area (30%) -->
                <div class="w-full lg:w-[30%]">
                    <!-- Chat Box -->
                    <div class="h-[600px] lg:h-[calc(100vh-140px)] min-h-[600px] flex flex-col bg-white rounded-3xl shadow-xl border border-gray-200 overflow-hidden sticky top-6">
                        
                        <!-- Header -->
                        <div class="bg-gray-900 px-6 py-5 flex items-center gap-3 text-white border-b border-gray-800 shrink-0 shadow-sm relative z-10">
                            <svg class="w-6 h-6 text-emerald-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8h2a2 2 0 012 2v6a2 2 0 01-2 2h-2v4l-4-4H9a1.994 1.994 0 01-1.414-.586m0 0L11 14h4a2 2 0 002-2V6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2v4l.586-.586z"></path></svg>
                            <h3 class="font-black text-lg tracking-widest uppercase">Live Chat</h3>
                        </div>

                        <!-- Messages Area -->
                        <div class="flex-1 overflow-y-auto px-5 py-6 space-y-4 bg-gray-50/50" id="chat-container">
                            @forelse($chats as $chat)
                                @if($chat->user_id == Auth::id())
                                    <!-- Send by logged in user (Right) -->
                                    <div class="flex justify-end pl-10">
                                        <div class="flex flex-col items-end gap-1 w-full relative">
                                            <span class="text-[11px] font-bold text-gray-400">{{ $chat->user->name }} (Anda)</span>
                                            <div class="bg-emerald-600 text-white px-4 py-2.5 rounded-2xl rounded-tr-sm shadow-sm text-sm font-medium w-max max-w-full break-words">
                                                {{ $chat->pesan }}
                                            </div>
                                        </div>
                                    </div>
                                @else
                                    <!-- Received from others (Left) -->
                                    <div class="flex justify-start pr-10">
                                        <div class="flex items-start gap-3 w-full">
                                            <!-- Avatar initial fallback -->
                                            <div class="w-8 h-8 rounded-full bg-gray-200 flex items-center justify-center text-xs font-black text-gray-600 shrink-0 uppercase border border-gray-300">
                                                {{ substr($chat->user->name, 0, 1) }}
                                            </div>
                                            <div class="flex flex-col items-start gap-1 w-full relative">
                                                <span class="text-[11px] font-bold text-gray-500">{{ $chat->user->name }}</span>
                                                <div class="bg-white border border-gray-200 px-4 py-2.5 rounded-2xl rounded-tl-sm shadow-sm text-sm font-medium text-gray-800 w-max max-w-full break-words">
                                                    {{ $chat->pesan }}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            @empty
                                <div class="h-full flex flex-col items-center justify-center text-center opacity-50">
                                    <svg class="w-12 h-12 text-gray-400 mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path></svg>
                                    <p class="text-sm font-bold text-gray-500">Belum ada obrolan.<br>Jadilah yang pertama untuk menyapa!</p>
                                </div>
                            @endforelse
                        </div>

                        <!-- Chat Input Form -->
                        <div class="p-4 bg-white border-t border-gray-200 shrink-0 sticky bottom-0 z-20">
                            @if($webinar->status == 'live')
                                <form action="{{ route('webinar.chat', $webinar->id) }}" method="POST" class="flex gap-2 relative">
                                    @csrf
                                    <input type="text" name="pesan" required placeholder="Tuliskan pengalaman Anda..." autocomplete="off" 
                                        class="flex-1 bg-gray-50 border border-gray-200 rounded-xl focus:ring-2 focus:ring-emerald-500/20 focus:border-emerald-500 transition-all font-medium text-sm px-4 h-12">
                                    <button type="submit" class="w-12 h-12 rounded-xl bg-gray-900 hover:bg-emerald-600 text-white flex items-center justify-center transition-all shadow-md active:scale-95 shrink-0 group">
                                        <svg class="w-5 h-5 ml-1 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"></path></svg>
                                    </button>
                                </form>
                            @else
                                <div class="h-12 bg-gray-100 rounded-xl flex items-center justify-center text-xs font-bold text-gray-400 border border-gray-200 uppercase tracking-widest cursor-not-allowed">
                                    Chat Dinonaktifkan (Video Sesi OFFLINE)
                                </div>
                            @endif
                        </div>
                        
                    </div>
                </div>

            </div>
            
        </div>
    </div>

    <!-- Script to auto scroll chat to bottom -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var chatContainer = document.getElementById('chat-container');
            if(chatContainer) {
                chatContainer.scrollTop = chatContainer.scrollHeight;
            }
        });
    </script>
</x-app-layout>
