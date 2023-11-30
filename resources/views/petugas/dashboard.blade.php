<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard Petugas</title>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="/dashboard-petugas">Dashboard Petugas</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="#">Pengaduan <span class="sr-only"></span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Tanggapan</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/">Log Out</a>
                </li>
            </ul>
        </div>
    </nav>
    <div class="container mt-5">
        <div style="overflow: auto; max-height: 600px;">
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
                                        <button type="button" class="btn btn-primary" onclick="showAcceptAlert({{ $pengaduan->id_pengaduan }})">Accept</button>
                                    </form>
                                </td>
                            @elseif($pengaduan->status == 1)
                                <td class="align-middle"><button class="btn btn-warning text-white">Memberi Tanggapan</button></td>
                            @elseif($pengaduan->status == 2)
                                <td class="align-middle"><button class="btn btn-success" disabled>Selesai</button></td>
                            @endif
                        </tr>
                        @endif

                    @endforeach
                </tbody>
            </table>
        </div>
        {{-- <div class="mt-3">
            {{ $data->links() }}
        </div> --}}
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

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
