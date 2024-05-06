@extends('admin.layout.layout')
@section('main')
    <div class="flex flex-col flex-1 w-full">
        @include('admin.layout.header')
        <main class="h-full pb-16 overflow-y-auto">
            <div class="container grid px-6 mx-auto">
                <div class="flex items-center justify-between">
                    <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
                        Pengampu
                    </h2>

                    <button @click="openModal"
                        class="px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                        Tambah pengampu
                    </button>
                </div>
                <!-- Tables and pagination -->
                <div class="w-full overflow-hidden rounded-lg shadow-xs">
                    <div class="w-full overflow-x-auto">
                        <table class="w-full whitespace-no-wrap">
                            <thead>
                                <tr
                                    class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                                    <th class="px-4 py-3">Mapel</th>
                                    <th class="px-4 py-3">Guru</th>
                                    <th class="px-4 py-3">Kelas</th>
                                    <th class="px-4 py-3">Tahun akademik</th>
                                    <th class="px-4 py-3">Actions</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                                @foreach ($pengampu as $item)
                                    @php
                                        $nama_mapel = 'none';
                                        foreach ($mapels as $mapel) {
                                            if ($item->mata_pelajaran == $mapel->id_mp) {
                                                $nama_mapel = $mapel->nama_mp;
                                                break; // Menghentikan loop setelah menemukan guru yang cocok
                                            }
                                        }
                                        $nama_guru = 'none';
                                        foreach ($gurus as $guru) {
                                            if ($item->guru == $guru->id_guru) {
                                                $nama_guru = $guru->nama;
                                                break; // Menghentikan loop setelah menemukan guru yang cocok
                                            }
                                        }
                                        $nama_kelas = 'none';
                                        foreach ($kelases as $kelas) {
                                            if ($item->kelas == $kelas->id_kelas) {
                                                $nama_kelas =
                                                    $kelas->tingkatan .
                                                    ' ' .
                                                    $kelas->jurusan .
                                                    ' ' .
                                                    $kelas->nomor_kelas;
                                                break; // Menghentikan loop setelah menemukan kelas yang cocok
                                            }
                                        }
                                        $nama_tahun = 'none';
                                        foreach ($tahuns as $tahun) {
                                            if ($item->tahun_akademik == $tahun['id_ta']) {
                                                $nama_tahun = $tahun['tahun_mulai'] . '/' . $tahun['tahun_selesai'];
                                                break; // Menghentikan loop setelah menemukan kelas yang cocok
                                            }
                                        }
                                    @endphp
                                    <td class="px-4 py-3 text-sm dark:text-white">
                                        {{ $nama_mapel }}
                                    </td>
                                    <td class="px-4 py-3 text-sm dark:text-white">
                                        {{ $nama_guru }}
                                    </td>
                                    <td class="px-4 py-3 text-sm dark:text-white">
                                        {{ $nama_kelas }}
                                    </td>
                                    <td class="px-4 py-3 text-xs">
                                        <span
                                            class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-full dark:bg-green-700 dark:text-green-100">
                                            {{ $nama_tahun }}
                                        </span>
                                    </td>
                                    <td class="px-4 py-3">
                                        <div class="flex items-center space-x-4 text-sm">

                                            <form action="{{ route('hapus_jam', ['id' => $item->id_pengampu]) }}"
                                                method="post">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                    onclick="confirm('Apakah anda yakin ingin menghapus?')"
                                                    class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray"
                                                    aria-label="Delete">
                                                    <svg class="w-5 h-5" aria-hidden="true" fill="currentColor"
                                                        viewBox="0 0 20 20">
                                                        <path fill-rule="evenodd"
                                                            d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                                                            clip-rule="evenodd"></path>
                                                    </svg>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                    <!-- Pagination -->
                    <div
                        class="flex px-4 py-3 text-xs font-semibold tracking-wide text-gray-500 uppercase border-t dark:border-gray-700 bg-gray-50 sm:grid-cols-9 dark:text-gray-400 dark:bg-gray-800">
                        <span class="flex items-center  col-span-3">
                            Showing {{ $pengampu->firstItem() }}-{{ $pengampu->lastItem() }} of {{ $pengampu->total() }}
                        </span>
                        <div
                            class="flex px-4 py-3 text-xs font-semibold tracking-wide text-gray-500 uppercase border-t dark:border-gray-700 bg-gray-50 sm:grid-cols-9 dark:text-gray-400 dark:bg-gray-800">
                            <span class="flex col-span-4 mt-2 sm:mt-auto sm:justify-end">
                                {{ $pengampu->links() }}
                            </span>
                        </div>

                    </div>
                </div>
            </div>
        </main>

        <!-- Modal tambah pengampu-->
        <div x-show="isModalOpen" x-transition:enter="transition ease-out duration-150" x-transition:enter-start="opacity-0"
            x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in duration-150"
            x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"
            class="fixed inset-0 z-30 flex items-end bg-black bg-opacity-50 sm:items-center sm:justify-center">
            <!-- Modal -->
            <div x-show="isModalOpen" x-transition:enter="transition ease-out duration-150"
                x-transition:enter-start="opacity-0 transform translate-y-1/2" x-transition:enter-end="opacity-100"
                x-transition:leave="transition ease-in duration-150" x-transition:leave-start="opacity-100"
                x-transition:leave-end="opacity-0  transform translate-y-1/2" @click.away="closeModal"
                @keydown.escape="closeModal"
                class="w-full px-6 py-4 overflow-hidden bg-white rounded-t-lg dark:bg-gray-800 sm:rounded-lg sm:m-4 sm:max-w-xl"
                role="dialog" id="modal">
                <!-- Remove header if you don't want a close icon. Use modal body to place modal tile. -->
                <header class="flex justify-end">
                    <button
                        class="inline-flex items-center justify-center w-6 h-6 text-gray-400 transition-colors duration-150 rounded dark:hover:text-gray-200 hover: hover:text-gray-700"
                        aria-label="close" @click="closeModal">
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20" role="img" aria-hidden="true">
                            <path
                                d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                clip-rule="evenodd" fill-rule="evenodd"></path>
                        </svg>
                    </button>
                </header>
                <!-- Modal tambah pengampu -->
                <div class="mt-4 mb-6">
                    <!-- Modal title -->
                    <p class="mb-2 text-lg font-semibold text-gray-700 dark:text-gray-300  ">
                        Tambah pengampu
                    </p>
                    <!-- Modal description -->
                    <form class="grid grid-cols-2" action="{{ route('tambah_pengampu') }}" method="POST">
                        @csrf

                        <div class="px-4 py-3 mb-2 bg-white rounded-lg shadow-md dark:bg-gray-800">
                            <label class="block text-sm">
                                <span class="text-gray-700 dark:text-gray-400">Mata pelajaran</span>
                                <div
                                    class="relative text-gray-500 focus-within:text-purple-600 dark:focus-within:text-purple-400">
                                    <select name="mata_pelajaran"
                                        class="block w-full pl-10 mt-1 text-sm text-black dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray form-select">
                                        <option value="#" selected disabled>Pilih mata pelajaran</option>
                                        @foreach ($mapels as $mapel)
                                            <option value="{{ $mapel->id_mp }}" class="">
                                                {{ $mapel->nama_mp }}</option>
                                        @endforeach
                                    </select>


                                    <div class="absolute inset-y-0 flex items-center ml-3 pointer-events-none">
                                        <svg class="w-5 h-5" aria-hidden="true" fill="none" stroke-linecap="round"
                                            stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24"
                                            stroke="currentColor">
                                            <path
                                                d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z">
                                            </path>
                                        </svg>
                                    </div>
                                </div>
                            </label>
                        </div>
                        <div class="px-4 py-3 mb-2 bg-white rounded-lg shadow-md dark:bg-gray-800">
                            <label class="block text-sm">
                                <span class="text-gray-700 dark:text-gray-400">Guru</span>
                                <div
                                    class="relative text-gray-500 focus-within:text-purple-600 dark:focus-within:text-purple-400">
                                    <select name="guru"
                                        class="block w-full pl-10 mt-1 text-sm text-black dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray form-select">
                                        <option value="#" selected disabled>Pilih Guru</option>
                                        @foreach ($gurus as $guru)
                                            <option value="{{ $guru->id_guru }}" class="">
                                                {{ $guru->nama }}</option>
                                        @endforeach
                                    </select>


                                    <div class="absolute inset-y-0 flex items-center ml-3 pointer-events-none">
                                        <svg class="w-5 h-5" aria-hidden="true" fill="none" stroke-linecap="round"
                                            stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24"
                                            stroke="currentColor">
                                            <path
                                                d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z">
                                            </path>
                                        </svg>
                                    </div>
                                </div>
                            </label>
                        </div>
                        <div class="px-4 py-3 mb-2 bg-white rounded-lg shadow-md dark:bg-gray-800">
                            <label class="block text-sm">
                                <span class="text-gray-700 dark:text-gray-400">Kelas</span>
                                <div
                                    class="relative text-gray-500 focus-within:text-purple-600 dark:focus-within:text-purple-400">
                                    <select name="kelas"
                                        class="block w-full pl-10 mt-1 text-sm text-black dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray form-select">
                                        <option value="#" selected disabled>Pilih kelas</option>
                                        @foreach ($kelases as $kelas)
                                            <option value="{{ $kelas->id_kelas }}" class="">
                                                {{ $kelas->tingkatan }} {{ $kelas->jurusan }} {{ $kelas->nomor_kelas }}
                                            </option>
                                        @endforeach
                                    </select>


                                    <div class="absolute inset-y-0 flex items-center ml-3 pointer-events-none">
                                        <svg class="w-5 h-5" aria-hidden="true" fill="none" stroke-linecap="round"
                                            stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24"
                                            stroke="currentColor">
                                            <path
                                                d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z">
                                            </path>
                                        </svg>
                                    </div>
                                </div>
                            </label>
                        </div>
                        <div class="px-4 py-3 mb-2 bg-white rounded-lg shadow-md dark:bg-gray-800">
                            <label class="block text-sm">
                                <span class="text-gray-700 dark:text-gray-400">Periode akademik</span>
                                <div
                                    class="relative text-gray-500 focus-within:text-purple-600 dark:focus-within:text-purple-400">
                                    <select name="tahun_akademik"
                                        class="block w-full pl-10 mt-1 text-sm text-black dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray form-select">
                                        <option value="#" selected disabled>Pilih Periode akademik</option>
                                        @foreach ($tahuns as $tahun)
                                            <option value="{{ $tahun['id_ta'] }}" class="">
                                                {{ $tahun['tahun_mulai'] }} / {{ $tahun['tahun_selesai'] }}</option>
                                        @endforeach
                                    </select>

                                    <div class="absolute inset-y-0 flex items-center ml-3 pointer-events-none">
                                        <svg class="w-5 h-5" aria-hidden="true" fill="none" stroke-linecap="round"
                                            stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24"
                                            stroke="currentColor">
                                            <path
                                                d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z">
                                            </path>
                                        </svg>
                                    </div>
                                </div>
                            </label>
                        </div>


                        <button type="submit"
                            class="flex items-center justify-center p-3 text-sm font-semibold text-purple-100 bg-purple-600 rounded-lg shadow-md focus:outline-none focus:shadow-outline-purple">Simpan</button>
                    </form>
                </div>


            </div>
        </div>
        <!-- End of modal update hari  -->
    </div>
@endsection
