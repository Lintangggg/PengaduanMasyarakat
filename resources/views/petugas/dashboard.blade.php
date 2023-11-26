<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard Petugas</title>
    <!-- Bootstrap CSS -->
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
                    <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">About</a>
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
                                    Menunggu Tanggapan
                                @elseif($pengaduan->status == 1)
                                    Proses
                                @elseif($pengaduan->status == 2)
                                    Tanggapan Diberikan
                                @endif
                            </td>
                            <td class="align-middle"><button class="btn btn-primary">Accept</button></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <!-- Bootstrap JS and Popper.js (if needed) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
