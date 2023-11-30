<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Tanggapan') }}
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
                                <th>NIK</th>
                                <th>Tanggal Tanggapan</th>
                                <th>Tanggapan</th>
                                <th>Nama Petugas</th>
                                <th>Role</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                // $no = ($data->currentPage() - 1) * $data->perPage() + 1;
                                $no = 1;
                            @endphp
                            @foreach ($data as $tanggapan)
                            @php
                                $role = Auth::user()->role;
                                $cate = $tanggapan->role;
                            @endphp
                            @if ($role == 'admin' || $role == $cate)
                                <tr>
                                    <td class="align-middle">{{ $no++ }}</td>
                                    <td class="align-middle">{{ $tanggapan->pengaduan->nik }}</td>
                                    <td class="align-middle">{{ $tanggapan->tgl_tanggapan }}</td>
                                    <td class="align-middle">{{ $tanggapan->tanggapan }}</td>
                                    <td class="align-middle">{{ $tanggapan->petugas->name }}</td>
                                    <td class="align-middle">{{ $tanggapan->role }}</td>
                                </tr>
                                @endif
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <script>
        function showAcceptAlert(pengaduanId) {
            Swal.fire({
                title: 'Are you sure?',
                text: "You are about to accept this report. Confirm?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, accept it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Submit the form if the user clicks 'Yes'
                    document.getElementById('acceptForm' + pengaduanId).submit();
                }
            });
        }
    </script>
</x-app-layout>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
