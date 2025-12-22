<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Profil Saya') }}
            </h2>
            <div class="space-x-2">
                <a href="{{ route('profile.edit') }}" class="inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-700 focus:bg-blue-700 active:bg-blue-800 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                    </svg>
                    Edit Profil
                </a>
            </div>
        </div>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="md:flex">
                        <!-- Profile Picture -->
                        <div class="md:w-1/4 px-4 text-center">
                            @if($user->profile_picture)
                                <img src="{{ asset('storage/' . $user->profile_picture) }}" 
                                     alt="{{ $user->name }}" 
                                     class="w-48 h-48 rounded-full object-cover mx-auto mb-4 border-4 border-gray-200">
                            @else
                                <div class="w-48 h-48 rounded-full bg-gray-200 flex items-center justify-center text-6xl font-bold text-gray-400 mx-auto mb-4 border-4 border-gray-200">
                                    {{ strtoupper(substr($user->name, 0, 1)) }}
                                </div>
                            @endif
                            
                            <h3 class="text-lg font-medium text-gray-900">{{ $user->name }}</h3>
                            <p class="text-sm text-gray-500">{{ ucfirst($user->role->name) }}</p>
                            
                            @if($user->created_at)
                                <p class="text-xs text-gray-500 mt-2">
                                    Bergabung pada {{ $user->created_at->format('d M Y') }}
                                </p>
                            @endif
                        </div>
                        
                        <!-- Profile Details -->
                        <div class="md:w-3/4 px-4 md:border-l border-gray-200">
                            <h3 class="text-lg font-medium text-gray-900 mb-4">Informasi Profil</h3>
                            
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div>
                                    <h4 class="text-sm font-medium text-gray-500">Email</h4>
                                    <p class="mt-1 text-sm text-gray-900">{{ $user->email }}</p>
                                    @if($user->email_verified_at)
                                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                            Terverifikasi
                                        </span>
                                    @else
                                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-yellow-100 text-yellow-800">
                                            Belum Diverifikasi
                                        </span>
                                    @endif
                                </div>
                                
                                @if($user->phone)
                                <div>
                                    <h4 class="text-sm font-medium text-gray-500">Telepon</h4>
                                    <p class="mt-1 text-sm text-gray-900">{{ $user->phone }}</p>
                                </div>
                                @endif
                                
                                @if($user->birth_date)
                                <div>
                                    <h4 class="text-sm font-medium text-gray-500">Tanggal Lahir</h4>
                                    <p class="mt-1 text-sm text-gray-900">{{ \Carbon\Carbon::parse($user->birth_date)->format('d F Y') }}</p>
                                </div>
                                @endif
                                
                                @if($user->gender)
                                <div>
                                    <h4 class="text-sm font-medium text-gray-500">Jenis Kelamin</h4>
                                    <p class="mt-1 text-sm text-gray-900">
                                        @if($user->gender === 'male')
                                            Laki-laki
                                        @elseif($user->gender === 'female')
                                            Perempuan
                                        @else
                                            Lainnya
                                        @endif
                                    </p>
                                </div>
                                @endif
                                
                                @if($user->address)
                                <div class="md:col-span-2">
                                    <h4 class="text-sm font-medium text-gray-500">Alamat</h4>
                                    <p class="mt-1 text-sm text-gray-900">{{ $user->address }}</p>
                                </div>
                                @endif
                            </div>
                            
                            <!-- Account Status -->
                            <div class="mt-8 pt-6 border-t border-gray-200">
                                <h3 class="text-lg font-medium text-gray-900 mb-4">Status Akun</h3>
                                <div class="bg-gray-50 p-4 rounded-lg">
                                    <div class="flex">
                                        <div class="flex-shrink-0">
                                            <svg class="h-5 w-5 text-blue-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                                            </svg>
                                        </div>
                                        <div class="ml-3">
                                            <p class="text-sm text-gray-700">
                                                Email terverifikasi pada 
                                                <time datetime="{{ $user->email_verified_at->toIso8601String() }}">
                                                    {{ $user->email_verified_at->format('d F Y H:i') }}
                                                </time>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Password Update Section -->
            <div class="mt-6 bg-white shadow-sm rounded-lg overflow-hidden">
                <div class="p-6">
                    <h3 class="text-lg font-medium text-gray-900">Ubah Kata Sandi</h3>
                    <p class="mt-1 text-sm text-gray-600">Pastikan akun Anda menggunakan kata sandi yang panjang dan acak agar tetap aman.</p>
                    
                    <div class="mt-5">
                        <a href="{{ route('password.edit') }}" class="inline-flex items-center px-4 py-2 bg-white border border-gray-300 rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 disabled:opacity-25 transition ease-in-out duration-150">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 7a2 2 0 012 2m4 0a6 6 0 01-7.743 5.743L11 17H9v2H7v2H4a1 1 0 01-1-1v-2.586a1 1 0 01.293-.707l5.964-5.964A6 6 0 1121 9z" />
                            </svg>
                            Ubah Kata Sandi
                        </a>
                    </div>
                </div>
            </div>
            
            <!-- Account Deletion -->
            @if(Laravel\Jetstream\Jetstream::hasAccountDeletionFeatures())
            <div class="mt-6 bg-white shadow-sm rounded-lg overflow-hidden">
                <div class="p-6">
                    <h3 class="text-lg font-medium text-gray-900">Hapus Akun</h3>
                    <p class="mt-1 text-sm text-gray-600">Setelah akun Anda dihapus, semua sumber daya dan data akan dihapus secara permanen. Sebelum menghapus akun Anda, harap unduh data atau informasi apa pun yang ingin Anda simpan.</p>
                    
                    <div class="mt-5">
                        <button type="button" class="inline-flex items-center px-4 py-2 bg-red-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-500 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 transition ease-in-out duration-150"
                                x-data="{}"
                                x-on:click="window.dispatchEvent(new CustomEvent('open-modal', { detail: 'confirm-user-deletion' }))">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                            </svg>
                            Hapus Akun
                        </button>
                    </div>
                </div>
            </div>
            @endif
        </div>
    </div>
</x-app-layout>
