<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Data Mahasiswa') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <form action="{{ route('mahasiswa.update', $mahasiswa->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="mb-4">
                        <label for="nim" class="block text-gray-700 text-sm font-bold mb-2">NIM:</label>
                        <input type="text" name="nim" id="nim" value="{{ old('nim', $mahasiswa->nim) }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                        @error('nim') <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p> @enderror
                    </div>

                    <div class="mb-4">
                        <label for="nama" class="block text-gray-700 text-sm font-bold mb-2">Nama Lengkap:</label>
                        <input type="text" name="nama" id="nama" value="{{ old('nama', $mahasiswa->nama) }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                        @error('nama') <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p> @enderror
                    </div>

                    <div class="mb-4">
                        <label for="program_studi" class="block text-gray-700 text-sm font-bold mb-2">Program Studi:</label>
                        <input type="text" name="program_studi" id="program_studi" value="{{ old('program_studi', $mahasiswa->program_studi) }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                        @error('program_studi') <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p> @enderror
                    </div>

                    <div class="mb-4">
                        <label for="email" class="block text-gray-700 text-sm font-bold mb-2">Email:</label>
                        <input type="email" name="email" id="email" value="{{ old('email', $mahasiswa->email) }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                        @error('email') <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p> @enderror
                    </div>

                    <div class="mb-6">
                        <label for="angkatan" class="block text-gray-700 text-sm font-bold mb-2">Angkatan:</label>
                        <input type="text" name="angkatan" id="angkatan" value="{{ old('angkatan', $mahasiswa->angkatan) }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                        @error('angkatan') <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p> @enderror
                    </div>

                    <div class="flex items-center justify-between">
                        <button type="submit" class="bg-indigo-600 hover:bg-indigo-800 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                            Update Data
                        </button>
                        <a href="{{ route('mahasiswa.index') }}" class="text-gray-600 hover:text-gray-900 text-sm">Batal</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>