@extends('layouts.admin')

@section('content')
<div class="mb-8">
    <div class="flex items-center justify-between">
        <div>
            <h1 class="text-3xl font-extrabold text-[#1E3A8A] mb-2 tracking-tight">Manajemen Pendaftar</h1>
            <p class="text-sm text-gray-500 font-medium">Kelola data calon mahasiswa, nilai ujian, kelulusan, dan status daftar ulang.</p>
        </div>
    </div>
</div>

<div class="bg-white rounded-2xl border border-gray-100 shadow-sm overflow-hidden">
    <div class="overflow-x-auto">
        <table class="w-full text-sm text-left">
            <thead class="bg-gray-50/50 border-b border-gray-100 text-gray-500 uppercase tracking-wider text-xs font-bold">
                <tr>
                    <th scope="col" class="px-6 py-4">Data Peserta</th>
                    <th scope="col" class="px-6 py-4">Status Ujian</th>
                    <th scope="col" class="px-6 py-4">Kelulusan</th>
                    <th scope="col" class="px-6 py-4">Daftar Ulang & Berkas</th>
                    <th scope="col" class="px-6 py-4">Aksi Eksekusi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-50">
                @forelse($users as $user)
                <tr class="hover:bg-blue-50/50 transition-colors group">
                    <!-- Data Peserta -->
                    <td class="px-6 py-5 whitespace-nowrap">
                        <div class="flex items-center">
                            <div class="flex-shrink-0 h-10 w-10">
                                <div class="h-10 w-10 rounded-full bg-gradient-to-tr from-[#1E3A8A] to-[#2563EB] text-white flex items-center justify-center font-bold text-sm shadow-sm ring-2 ring-white">
                                    {{ strtoupper(substr($user->name, 0, 2)) }}
                                </div>
                            </div>
                            <div class="ml-4">
                                <div class="text-sm font-extrabold text-[#0F172A]">{{ $user->name }}</div>
                                <div class="text-xs text-gray-500 mt-0.5">{{ $user->email }}</div>
                                @if(isset($user->profile->test_number))
                                <div class="text-[10px] font-mono bg-gray-100 text-gray-600 px-1.5 py-0.5 rounded mt-1 inline-block border border-gray-200">
                                    No. {{ $user->profile->test_number }}
                                </div>
                                @endif
                            </div>
                        </div>
                    </td>

                    <!-- Status Ujian -->
                    <td class="px-6 py-5 whitespace-nowrap">
                        @if($user->profile->test_status === 'SELESAI')
                            <div class="flex items-center space-x-2">
                                <span class="bg-blue-100 text-blue-800 text-xs font-bold px-2.5 py-1 rounded-full border border-blue-200">
                                    Selesai
                                </span>
                                <span class="text-sm font-extrabold text-[#0F172A]">Nilai: {{ $user->result->total_score ?? 0 }}</span>
                            </div>
                        @else
                            <span class="inline-flex items-center gap-1.5 bg-yellow-50 text-yellow-700 text-xs font-bold px-2.5 py-1 rounded-full border border-yellow-200">
                                <span class="w-1.5 h-1.5 rounded-full bg-yellow-400"></span>
                                Belum/Sedang Ujian
                            </span>
                        @endif
                    </td>

                    <!-- Kelulusan -->
                    <td class="px-6 py-5 whitespace-nowrap">
                        <form action="{{ route('admin.users.evaluate', $user->id) }}" method="POST" class="flex items-center space-x-2">
                            @csrf
                            <select name="status" class="bg-gray-50 border border-gray-200 text-gray-700 text-xs rounded-lg focus:ring-[#2563EB] focus:border-[#2563EB] block w-full p-2" {{ $user->profile->test_status !== 'SELESAI' ? 'disabled' : '' }}>
                                <option value="PENDING" {{ ($user->result->is_passed ?? '') === 'PENDING' ? 'selected' : '' }}>Menunggu Review</option>
                                <option value="LULUS" {{ ($user->result->is_passed ?? '') === 'LULUS' ? 'selected' : '' }}>✅ Lulus</option>
                                <option value="TIDAK LULUS" {{ ($user->result->is_passed ?? '') === 'TIDAK LULUS' ? 'selected' : '' }}>❌ Tidak Lulus</option>
                            </select>
                            <button type="submit" class="text-white bg-[#1E3A8A] hover:bg-[#172e6b] focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-xs px-3 py-2 disabled:opacity-50 disabled:cursor-not-allowed transition-colors" {{ $user->profile->test_status !== 'SELESAI' ? 'disabled' : '' }}>
                                Set
                            </button>
                        </form>
                    </td>

                    <!-- Daftar Ulang -->
                    <td class="px-6 py-5 whitespace-nowrap">
                        @if($user->reRegistration)
                            <div class="flex flex-col space-y-2">
                                <div class="flex items-center justify-between space-x-2">
                                    @php
                                        $statusClass = match($user->reRegistration->status) {
                                            'DISETUJUI' => 'bg-green-100 text-green-800 border-green-200',
                                            'DITOLAK' => 'bg-red-100 text-red-800 border-red-200',
                                            default => 'bg-purple-100 text-purple-800 border-purple-200'
                                        };
                                    @endphp
                                    <span class="text-[10px] font-bold px-2 py-0.5 rounded border {{ $statusClass }}">
                                        {{ $user->reRegistration->status }}
                                    </span>
                                    
                                    @if($user->reRegistration->payment_proof)
                                        <a href="{{ Storage::url($user->reRegistration->payment_proof) }}" target="_blank" class="text-xs font-medium text-[#2563EB] hover:underline flex items-center">
                                            <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.172 7l-6.586 6.586a2 2 0 102.828 2.828l6.414-6.586a4 4 0 00-5.656-5.656l-6.415 6.585a6 6 0 108.486 8.486L20.5 13"></path></svg>
                                            Bukti Transfer
                                        </a>
                                    @endif
                                </div>
                                <form action="{{ route('admin.users.approve_re_registration', $user->id) }}" method="POST" class="flex items-center space-x-2">
                                    @csrf
                                    <select name="status" class="bg-gray-50 border border-gray-200 text-gray-700 text-xs rounded-lg focus:ring-[#2563EB] focus:border-[#2563EB] block w-full p-2">
                                        <option value="MENUNGGU" {{ $user->reRegistration->status === 'MENUNGGU' ? 'selected' : '' }}>🔍 Evaluasi</option>
                                        <option value="DISETUJUI" {{ $user->reRegistration->status === 'DISETUJUI' ? 'selected' : '' }}>✅ Sahkan</option>
                                        <option value="DITOLAK" {{ $user->reRegistration->status === 'DITOLAK' ? 'selected' : '' }}>❌ Tolak</option>
                                    </select>
                                    <button type="submit" class="text-white bg-[#F59E0B] hover:bg-yellow-600 focus:ring-4 focus:ring-yellow-300 font-medium rounded-lg text-xs px-3 py-2 transition-colors">
                                        Update
                                    </button>
                                </form>
                            </div>
                        @else
                            <span class="text-gray-400 text-xs italic">Belum daftar ulang</span>
                        @endif
                    </td>

                    <!-- Aksi & NIM -->
                    <td class="px-6 py-5 whitespace-nowrap">
                        <div class="flex flex-col space-y-2">
                            @if($user->studentId)
                                <div class="bg-indigo-50 border border-indigo-100 p-2 rounded-lg text-center">
                                    <span class="text-[10px] text-gray-500 block uppercase font-bold tracking-wider">Nomor Induk / NIM</span>
                                    <span class="font-mono font-black text-[#1E3A8A] text-sm">{{ $user->studentId->nim }}</span>
                                </div>
                            @elseif($user->reRegistration && $user->reRegistration->status === 'DISETUJUI')
                                <form action="{{ route('admin.users.generate_nim', $user->id) }}" method="POST" class="w-full">
                                    @csrf
                                    <button type="submit" class="w-full bg-emerald-500 hover:bg-emerald-600 text-white font-bold py-2 px-3 rounded-lg text-xs shadow-sm shadow-emerald-200 transition-colors flex items-center justify-center">
                                        <svg class="w-3.5 h-3.5 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path></svg>
                                        Generate NIM
                                    </button>
                                </form>
                            @endif

                            <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST" onsubmit="return confirm('PERINGATAN! Anda akan menghapus data pendaftar ini secara permanen. Lanjutkan?');" class="w-full">
                                @csrf @method('DELETE')
                                <button type="submit" class="w-full text-red-600 bg-red-50 hover:bg-red-100 hover:text-red-700 font-bold py-2 px-3 rounded-lg text-xs border border-red-100 transition-colors flex items-center justify-center">
                                    <svg class="w-3.5 h-3.5 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                                    Hapus Data
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="px-6 py-10 text-center text-gray-500">
                        Belum ada data pendaftar di dalam sistem.
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    
    @if($users->hasPages())
    <div class="px-6 py-4 border-t border-gray-100 bg-gray-50">
        {{ $users->links() }}
    </div>
    @endif
</div>
@endsection
