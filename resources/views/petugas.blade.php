<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Petugas') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <table class="table table-bordered text-center">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>No. Telp</th>
                                <th>Kategori</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                // $no = ($data->currentPage() - 1) * $data->perPage() + 1;
                                $no = 1;
                            @endphp
                            @foreach ($data as $petugas)
                                <tr>
                                    <td class="align-middle">{{ $no++ }}</td>
                                    <td class="align-middle">{{ $petugas->name }}</td>
                                    <td class="align-middle">{{ $petugas->email }}</td>
                                    <td class="align-middle">{{ $petugas->telp }}</td>
                                    <td class="align-middle">{{ $petugas->role }}</td>
                                    <td class="align-middle">
                                        <div style="display: flex; align-items: center; justify-content: center; margin-top: 15px;">
                                            <form action="{{ route('edit-petugas', ['id' => $petugas->id]) }}" method="GET">
                                                @csrf
                                                <button type="submit" class="btn btn-primary" style="background-color: #007bff; color: #fff;">Edit</button>
                                            </form>
                                            <form action="{{ route('delete-petugas', ['id' => $petugas->id]) }}" method="POST">
                                                @csrf
                                                <button type="submit" class="btn btn-danger ml-2" style="background-color: #FF0000; color: #fff;">Delete</button>
                                            </form>

                                        </div>
                                    </td>

                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>



</x-app-layout>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
