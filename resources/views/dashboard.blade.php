<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Pengaduan') }}
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
                                <th>Tanggal Pengaduan</th>
                                <th>NIK</th>
                                <th>Isi Laporan</th>
                                <th>Foto</th>
                                <th>Kategori</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                // $no = ($data->currentPage() - 1) * $data->perPage() + 1;
                                $no = 1;
                            @endphp
                            @foreach ($data as $pengaduan)
                            @php
                                $role = Auth::user()->role;
                                $cate = $pengaduan->kategori;
                            @endphp
                            @if ($role == 'admin' || $role == $cate)
                                <tr>
                                    <td class="align-middle">{{ $no++ }}</td>
                                    <td class="align-middle">{{ $pengaduan->tgl_pengaduan }}</td>
                                    <td class="align-middle">{{ $pengaduan->nik }}</td>
                                    <td class="align-middle">{{ $pengaduan->isi_laporan }}</td>
                                    <td class="align-middle">
                                        @if($pengaduan->foto)
                                            <img src="{{ asset('storage/' . $pengaduan->foto) }}" alt="Pengaduan Photo" width="50">
                                        @else
                                            No Photo
                                        @endif
                                    </td>
                                    <td class="align-middle">{{ $pengaduan->kategori }}</td>
                                    <td class="align-middle" style="background-color:
                                        @if($pengaduan->status == 0)
                                            #ccccff;
                                        @elseif($pengaduan->status == 1)
                                            #F6FFCC;
                                        @elseif($pengaduan->status == 2)
                                            #ccffcc;
                                        @endif
                                        border-radius: 5%; padding: 5px;">
                                        @if($pengaduan->status == 0)
                                            Menunggu Permintaan
                                        @elseif($pengaduan->status == 1)
                                            Proses
                                        @elseif($pengaduan->status == 2)
                                            Tanggapan Diberikan
                                        @endif
                                    </td>
                                    @if($pengaduan->status == 0)
                                        <td class="align-middle">
                                            <form id="acceptForm{{ $pengaduan->id_pengaduan }}" action="/update-status/{{ $pengaduan->id_pengaduan }}" method="POST">
                                                @csrf
                                                <button type="button" class="btn btn-primary" style="background-color: #007bff; color: #fff;" onclick="showAcceptAlert({{ $pengaduan->id_pengaduan }})">Accept</button>
                                            </form>
                                        </td>
                                    @elseif($pengaduan->status == 1)
                                    <form action="{{ route('form.tanggapan', ['id' => $pengaduan->id_pengaduan]) }}" method="GET">
                                        @csrf
                                        <td class="align-middle"><button class="btn btn-warning text-white">Memberi Tanggapan</button></tdtd>
                                    </form>
                                    @elseif($pengaduan->status == 2)
                                        <td class="align-middle"><button class="btn btn-success" disabled>Selesai</button></td>
                                    @endif
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
