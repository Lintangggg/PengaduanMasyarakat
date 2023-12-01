<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Download PDF</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: center;
        }

        th {
            background-color: #f2f2f2;
        }


    </style>
</head>
<body>
    <h2 style="text-align: center;">Tanggapan</h2>

    <table>
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
                $no = 1;
            @endphp
            @foreach ($data as $tanggapan)
                <tr>
                    <td class="align-middle">{{ $no++ }}</td>
                    <td class="align-middle">{{ $tanggapan->pengaduan->nik }}</td>
                    <td class="align-middle">{{ $tanggapan->tgl_tanggapan }}</td>
                    <td class="align-middle">{{ $tanggapan->tanggapan }}</td>
                    <td class="align-middle">{{ $tanggapan->petugas->name }}</td>
                    <td class="align-middle">{{ $tanggapan->role }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

</body>
</html>
