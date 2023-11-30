<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Edit Masyarakat') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form action="{{ route('proses-edit-masyarakat', ['id' => $masyarakat->id]) }}" method="POST" class="form-container">
                        @csrf

                        <div class="form-group">
                            <label for="nik">NIK:</label>
                            <input type="text" class="form-control" id="nik" name="nik" value="{{ $masyarakat->nik }}" required>
                        </div>

                        <div class="form-group">
                            <label for="nama">Name:</label>
                            <input type="text" class="form-control" id="nama" name="nama" value="{{ $masyarakat->nama }}" required>
                        </div>

                        <div class="form-group">
                            <label for="username">Username:</label>
                            <input type="text" class="form-control" id="username" name="username" value="{{ $masyarakat->username }}" required>
                        </div>

                        <div class="form-group">
                            <label for="password">Password:</label>
                            <input type="password" class="form-control" id="password" name="password" value="{{ $masyarakat->password }}" required>
                        </div>

                        <div class="form-group">
                            <label for="telp">No. Telp:</label>
                            <input type="text" class="form-control" id="telp" name="telp" value="{{ $masyarakat->telp }}" required>
                        </div>

                        <input type="hidden" name="plain_password" value="1">

                        <button type="submit" class="btn btn-primary" style="background-color: #007bff; color: #fff;">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
