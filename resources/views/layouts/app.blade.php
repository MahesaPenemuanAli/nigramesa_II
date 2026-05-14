<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100">
            @include('layouts.navigation')

            <!-- Page Heading -->
            @isset($header)
                <header class="bg-white shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endisset

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>

            <!-- Global Footer -->
            <footer class="bg-gray-900 border-t border-gray-800 text-gray-400 pt-16 pb-8 mt-auto relative z-40">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                    <div class="grid grid-cols-1 md:grid-cols-12 gap-12 mb-16">
                        
                        <!-- Col 1: Branding -->
                        <div class="md:col-span-5 lg:col-span-4">
                            <div class="flex items-center gap-3 mb-6 relative">
                                <svg class="w-8 h-8 text-emerald-500" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-1 15v-4H8l4-7v4h3l-4 7z"></path></svg>
                                <span class="text-2xl font-black text-white tracking-tight">Nigramesa</span>
                            </div>
                            <p class="text-sm font-medium leading-relaxed mb-6 text-gray-400 pr-4">Gerakan revolusioner yang memformulasikan pertanian organik dan hortikultura ke dalam sentuhan kecerdasan digital masa kini.</p>
                            <!-- Socials mini -->
                            <div class="flex items-center gap-4">
                                <a href="#" class="w-10 h-10 bg-gray-800 hover:bg-emerald-600 text-gray-400 hover:text-white rounded-full flex items-center justify-center transition-all duration-300">
                                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M24 4.557c-.883.392-1.832.656-2.828.775 1.017-.609 1.798-1.574 2.165-2.724-.951.564-2.005.974-3.127 1.195-.897-.957-2.178-1.555-3.594-1.555-3.179 0-5.515 2.966-4.797 6.045-4.091-.205-7.719-2.165-10.148-5.144-1.29 2.213-.669 5.108 1.523 6.574-.806-.026-1.566-.247-2.229-.616-.054 2.281 1.581 4.415 3.949 4.89-.693.188-1.452.232-2.224.084.626 1.956 2.444 3.379 4.6 3.419-2.07 1.623-4.678 2.348-7.29 2.04 2.179 1.397 4.768 2.212 7.548 2.212 9.142 0 14.307-7.721 13.995-14.646.962-.695 1.797-1.562 2.457-2.549z"/></svg>
                                </a>
                                <a href="#" class="w-10 h-10 bg-gray-800 hover:bg-emerald-600 text-gray-400 hover:text-white rounded-full flex items-center justify-center transition-all duration-300">
                                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/></svg>
                                </a>
                            </div>
                        </div>
                        
                        <!-- Col 2: Peta Situs -->
                        <div class="md:col-span-3 lg:col-span-3">
                            <h4 class="text-white text-sm font-black tracking-widest uppercase mb-6 drop-shadow-sm border-l-4 border-emerald-500 pl-3">Tautan Singkat</h4>
                            <ul class="space-y-4 font-bold text-sm">
                                <li><a href="{{ route('dashboard') }}" class="hover:text-emerald-400 transition-colors flex items-center group"><span class="w-0 group-hover:w-3 transition-all duration-300 overflow-hidden text-emerald-500 mr-0 group-hover:mr-2">»</span> Beranda Utama</a></li>
                                <li><a href="{{ route('katalog') }}" class="hover:text-emerald-400 transition-colors flex items-center group"><span class="w-0 group-hover:w-3 transition-all duration-300 overflow-hidden text-emerald-500 mr-0 group-hover:mr-2">»</span> E-Commerce Botani</a></li>
                                <li><a href="{{ route('perawatan') }}" class="hover:text-emerald-400 transition-colors flex items-center group"><span class="w-0 group-hover:w-3 transition-all duration-300 overflow-hidden text-emerald-500 mr-0 group-hover:mr-2">»</span> Ensiklopedia Perawatan</a></li>
                                <li><a href="{{ route('perpustakaan') }}" class="hover:text-emerald-400 transition-colors flex items-center group"><span class="w-0 group-hover:w-3 transition-all duration-300 overflow-hidden text-emerald-500 mr-0 group-hover:mr-2">»</span> Pustaka Digital</a></li>
                                <li><a href="{{ route('tentang') }}" class="hover:text-emerald-400 transition-colors flex items-center group"><span class="w-0 group-hover:w-3 transition-all duration-300 overflow-hidden text-emerald-500 mr-0 group-hover:mr-2">»</span> Tentang Developer</a></li>
                            </ul>
                        </div>
                        
                        <!-- Col 3: Akses Komunikasi -->
                        <div class="md:col-span-4 lg:col-span-5">
                            <h4 class="text-white text-sm font-black tracking-widest uppercase mb-6 drop-shadow-sm border-l-4 border-emerald-500 pl-3">Akses Komunikasi</h4>
                            <ul class="space-y-5 text-sm font-medium">
                                <li class="flex items-start gap-4 p-3 bg-gray-800/50 rounded-xl hover:bg-gray-800 transition-colors border border-gray-800 backdrop-blur-sm">
                                    <div class="mt-0.5 text-emerald-500 shrink-0"><svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg></div>
                                    <span class="text-gray-300 leading-relaxed">Nigramesa Development Center<br>Plaza Kuningan, Lt 18, HR Rasuna Said, Jakarta.</span>
                                </li>
                                <li class="flex items-center gap-4 p-3 bg-gray-800/50 rounded-xl hover:bg-gray-800 transition-colors border border-gray-800 backdrop-blur-sm">
                                    <div class="text-emerald-500 shrink-0"><svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg></div>
                                    <span class="text-gray-300 font-bold">support@nigramesa.botany.id</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                    
                    <div class="border-t border-gray-800 pt-8 flex flex-col md:flex-row justify-between items-center gap-4 text-xs font-bold text-gray-500">
                        <div>&copy; {{ date('Y') }} PT. Nigramesa Botani Nusantara. All Rights Reserved.</div>
                        <div class="flex gap-8">
                            <a href="#" class="hover:text-emerald-400 transition-colors">Privacy Policy</a>
                            <a href="#" class="hover:text-emerald-400 transition-colors">Terms of Service</a>
                            <a href="#" class="hover:text-emerald-400 transition-colors border-l border-gray-700 pl-8">Cookie Policy</a>
                        </div>
                    </div>
                </div>
            </footer>

            <!-- Widget Floating Chatbot (Alpine.js + Gemini AI) -->
            <div x-data="nigraChat()" x-init="init()" class="fixed bottom-6 right-6 z-50">
                
                <!-- Chat Window Pop-up Box -->
                <div x-show="chatOpen" 
                     x-transition:enter="transition ease-out duration-300 transform origin-bottom-right"
                     x-transition:enter-start="opacity-0 scale-50 translate-y-10"
                     x-transition:enter-end="opacity-100 scale-100 translate-y-0"
                     x-transition:leave="transition ease-in duration-200 transform origin-bottom-right"
                     x-transition:leave-start="opacity-100 scale-100 translate-y-0"
                     x-transition:leave-end="opacity-0 scale-50 translate-y-10"
                     @click.outside="chatOpen = false"
                     class="absolute bottom-[4.5rem] right-0 w-[22rem] md:w-[24rem] bg-white rounded-[2rem] shadow-2xl shadow-emerald-900/10 border border-gray-100 overflow-hidden flex flex-col"
                     style="height: 550px; display: none;">
                    
                    <!-- Chat Header -->
                    <div class="bg-gradient-to-r from-emerald-600 to-emerald-800 px-6 py-5 flex justify-between items-center text-white relative">
                        <div class="absolute inset-0 bg-[url('https://www.transparenttextures.com/patterns/leaves-pattern.png')] opacity-10 mix-blend-overlay"></div>
                        <div class="flex items-center gap-4 relative z-10">
                            <div class="relative">
                                <div class="w-12 h-12 bg-white rounded-full flex items-center justify-center shadow-inner overflow-hidden border-2 border-emerald-400/50">
                                    <img src="https://ui-avatars.com/api/?name=Ai&background=fff&color=10b981&bold=true" class="w-full h-full object-cover">
                                </div>
                                <div class="absolute bottom-0 right-0 w-3.5 h-3.5 bg-green-400 rounded-full border-[2.5px] border-emerald-800 shadow-sm animate-pulse"></div>
                            </div>
                            <div>
                                <h3 class="font-black text-lg tracking-wide leading-none mb-1">NigraBot AI</h3>
                                <div class="flex items-center gap-1.5 text-xs text-emerald-100/90 font-bold">
                                    <div class="w-1.5 h-1.5 bg-green-400 rounded-full"></div>
                                    Bertenaga Gemini AI
                                </div>
                            </div>
                        </div>
                        <button @click="chatOpen = false" class="text-white/70 hover:text-white transition-transform hover:rotate-90 bg-black/10 hover:bg-black/20 p-2.5 rounded-full relative z-10">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M6 18L18 6M6 6l12 12"></path></svg>
                        </button>
                    </div>

                    <!-- Chat Body (Scrollable) -->
                    <div id="chat-body" class="flex-1 overflow-y-auto px-5 py-6 bg-[#f8fafc] flex flex-col gap-4">
                        <div class="text-center text-xs font-bold text-gray-400 my-1">NigraBot AI • Nigramesa</div>

                        <!-- Template: Bot Message (Awal) -->
                        <div class="flex gap-3">
                            <div class="w-9 h-9 rounded-full bg-emerald-100 text-emerald-600 flex items-center justify-center shrink-0 border border-emerald-200">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z"></path></svg>
                            </div>
                            <div class="bg-white px-4 py-3 rounded-2xl rounded-tl-sm shadow-sm border border-gray-100 text-[13px] text-gray-600 max-w-[85%] leading-relaxed">
                                Halo sahabat hijau! 👋 Saya NigraBot, asisten AI Nigramesa. Ada yang bisa saya bantu hari ini? 🌿
                            </div>
                        </div>

                        <!-- Dynamic messages are inserted here by JS -->
                    </div>

                    <!-- Chat Input Area -->
                    <div class="px-5 py-5 bg-white border-t border-gray-100 shadow-[0_-10px_20px_rgba(0,0,0,0.02)] relative z-20">
                        <form @submit.prevent="sendMessage()" class="flex items-center gap-2 bg-gray-50 border border-gray-200 hover:border-emerald-300 rounded-full pr-1.5 pl-5 py-1.5 focus-within:ring-4 focus-within:ring-emerald-500/10 focus-within:border-emerald-400 transition-all shadow-inner">
                            <input x-model="userInput" type="text" :disabled="isLoading"
                                   class="flex-1 bg-transparent border-0 focus:ring-0 text-sm font-medium text-gray-700 outline-none placeholder-gray-400 h-10 disabled:opacity-50" 
                                   placeholder="Ketik pesan...">
                            <button type="submit" :disabled="isLoading || !userInput.trim()"
                                    class="bg-emerald-600 hover:bg-emerald-700 disabled:opacity-50 disabled:cursor-not-allowed text-white w-10 h-10 rounded-full flex items-center justify-center transition-all hover:scale-110 active:scale-95 shadow-md shadow-emerald-600/30">
                                <svg x-show="!isLoading" class="w-4 h-4 translate-x-[1px] -translate-y-[1px] rotate-45" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"></path></svg>
                                <!-- Spinner -->
                                <svg x-show="isLoading" style="display:none" class="w-4 h-4 animate-spin" fill="none" viewBox="0 0 24 24"><circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle><path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4z"></path></svg>
                            </button>
                        </form>
                        <p class="text-center text-[10px] text-gray-300 mt-2 font-semibold tracking-wide">✦ Didukung oleh Google Gemini AI</p>
                    </div>
                </div>

                <!-- Bubble Notifikasi (Dihapus) -->

                <!-- Tombol Floating Main (FAB) -->
                <button @click="chatOpen = !chatOpen" 
                        class="w-16 h-16 bg-emerald-600 hover:bg-emerald-700 text-white rounded-full shadow-[0_8px_30px_rgb(16,185,129,0.3)] hover:shadow-[0_12px_40px_rgb(16,185,129,0.5)] hover:-translate-y-1.5 transition-all duration-300 flex items-center justify-center group relative border-[3px] border-emerald-50">
                    <div class="absolute inset-0 bg-emerald-400 rounded-full animate-ping opacity-25 group-hover:opacity-0 transition-opacity"></div>
                    <svg x-show="!chatOpen" class="w-7 h-7 relative z-10 transition-transform group-hover:scale-110" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z"></path></svg>
                    <svg x-show="chatOpen" style="display: none;" class="w-7 h-7 relative z-10 transition-transform group-hover:rotate-90" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M6 18L18 6M6 6l12 12"></path></svg>
                </button>
            </div>

            <script>
            function nigraChat() {
                return {
                    chatOpen: false,
                    userInput: '',
                    isLoading: false,

                    init() {},

                    scrollToBottom() {
                        const body = document.getElementById('chat-body');
                        if (body) body.scrollTop = body.scrollHeight;
                    },

                    appendMessage(type, text) {
                        const body = document.getElementById('chat-body');
                        const wrapper = document.createElement('div');
                        wrapper.className = type === 'user' 
                            ? 'flex justify-end gap-3'
                            : 'flex gap-3';

                        if (type === 'user') {
                            wrapper.innerHTML = `
                                <div class="bg-emerald-600 text-white px-4 py-3 rounded-2xl rounded-tr-sm shadow-sm text-[13px] max-w-[85%] leading-relaxed">${this.escapeHtml(text)}</div>
                            `;
                        } else {
                            wrapper.innerHTML = `
                                <div class="w-9 h-9 rounded-full bg-emerald-100 text-emerald-600 flex items-center justify-center shrink-0 border border-emerald-200">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z"></path></svg>
                                </div>
                                <div class="bg-white px-4 py-3 rounded-2xl rounded-tl-sm shadow-sm border border-gray-100 text-[13px] text-gray-600 max-w-[85%] leading-relaxed whitespace-pre-line">${this.escapeHtml(text)}</div>
                            `;
                        }

                        body.appendChild(wrapper);
                        this.scrollToBottom();
                        return wrapper;
                    },

                    appendTypingIndicator() {
                        const body = document.getElementById('chat-body');
                        const wrapper = document.createElement('div');
                        wrapper.id = 'typing-indicator';
                        wrapper.className = 'flex gap-3 items-end';
                        wrapper.innerHTML = `
                            <div class="w-9 h-9 rounded-full bg-emerald-100 text-emerald-600 flex items-center justify-center shrink-0 border border-emerald-200">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z"></path></svg>
                            </div>
                            <div class="bg-white px-5 py-4 rounded-2xl rounded-tl-sm shadow-sm border border-gray-100 flex items-center gap-2">
                                <span class="flex gap-1">
                                    <span class="w-2 h-2 bg-emerald-400 rounded-full animate-bounce" style="animation-delay:0ms"></span>
                                    <span class="w-2 h-2 bg-emerald-400 rounded-full animate-bounce" style="animation-delay:150ms"></span>
                                    <span class="w-2 h-2 bg-emerald-400 rounded-full animate-bounce" style="animation-delay:300ms"></span>
                                </span>
                            </div>
                        `;
                        body.appendChild(wrapper);
                        this.scrollToBottom();
                    },

                    removeTypingIndicator() {
                        const el = document.getElementById('typing-indicator');
                        if (el) el.remove();
                    },

                    escapeHtml(text) {
                        const div = document.createElement('div');
                        div.appendChild(document.createTextNode(text));
                        return div.innerHTML;
                    },

                    async sendMessage() {
                        const message = this.userInput.trim();
                        if (!message || this.isLoading) return;

                        this.userInput = '';
                        this.isLoading = true;

                        // Tampilkan pesan user
                        this.appendMessage('user', message);

                        // Tampilkan typing indicator
                        this.appendTypingIndicator();

                        try {
                            const csrfToken = document.querySelector('meta[name="csrf-token"]')?.content;

                            const response = await fetch('/chatbot/respond', {
                                method: 'POST',
                                headers: {
                                    'Content-Type': 'application/json',
                                    'Accept': 'application/json',
                                    'X-CSRF-TOKEN': csrfToken || '',
                                },
                                body: JSON.stringify({ message })
                            });

                            const data = await response.json();
                            this.removeTypingIndicator();
                            this.appendMessage('bot', data.reply || 'Maaf, saya tidak bisa menjawab saat ini.');
                        } catch (err) {
                            this.removeTypingIndicator();
                            this.appendMessage('bot', 'Maaf, koneksi ke server bermasalah. Silakan coba lagi. 🌿');
                        } finally {
                            this.isLoading = false;
                        }
                    }
                }
            }
            </script>

                
                <!-- Chat Window Pop-up Box -->
                <div x-show="chatOpen" 
                     x-transition:enter="transition ease-out duration-300 transform origin-bottom-right"
                     x-transition:enter-start="opacity-0 scale-50 translate-y-10"
                     x-transition:enter-end="opacity-100 scale-100 translate-y-0"
                     x-transition:leave="transition ease-in duration-200 transform origin-bottom-right"
                     x-transition:leave-start="opacity-100 scale-100 translate-y-0"
                     x-transition:leave-end="opacity-0 scale-50 translate-y-10"
                     @click.outside="chatOpen = false"
                     class="absolute bottom-[4.5rem] right-0 w-[22rem] md:w-[24rem] bg-white rounded-[2rem] shadow-2xl shadow-emerald-900/10 border border-gray-100 overflow-hidden flex flex-col"
                     style="height: 550px; display: none;">
                    
                    <!-- Chat Header -->
                    <div class="bg-gradient-to-r from-emerald-600 to-emerald-800 px-6 py-5 flex justify-between items-center text-white relative">
                        <!-- header pattern -->
                        <div class="absolute inset-0 bg-[url('https://www.transparenttextures.com/patterns/leaves-pattern.png')] opacity-10 mix-blend-overlay"></div>
                        <div class="flex items-center gap-4 relative z-10">
                            <div class="relative">
                                <div class="w-12 h-12 bg-white rounded-full flex items-center justify-center shadow-inner overflow-hidden border-2 border-emerald-400/50">
                                    <img src="https://ui-avatars.com/api/?name=Ai&background=fff&color=10b981&bold=true" class="w-full h-full object-cover">
                                </div>
                                <div class="absolute bottom-0 right-0 w-3.5 h-3.5 bg-green-400 rounded-full border-[2.5px] border-emerald-800 shadow-sm animate-pulse"></div>
                            </div>
                            <div>
                                <h3 class="font-black text-lg tracking-wide leading-none mb-1">NigraBot Bantuan</h3>
                                <div class="flex items-center gap-1.5 text-xs text-emerald-100/90 font-bold">
                                    <div class="w-1.5 h-1.5 bg-green-400 rounded-full"></div>
                                    Sedang Online
                                </div>
                            </div>
                        </div>
                        <button @click="chatOpen = false" class="text-white/70 hover:text-white transition-transform hover:rotate-90 bg-black/10 hover:bg-black/20 p-2.5 rounded-full relative z-10">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M6 18L18 6M6 6l12 12"></path></svg>
                        </button>
                    </div>

                    <!-- Riwayat Riwayat Body -->
                    <div class="flex-1 overflow-y-auto px-5 py-6 bg-[#f8fafc] flex flex-col gap-5">
                        <div class="text-center text-xs font-bold text-gray-400 my-2">Bantuan Live Chat Nigramesa <br> Hari ini</div>
    </body>
</html>
