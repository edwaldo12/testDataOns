<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Pasien</title>
</head>

<body>
    <h1>
        Laporan Pasien
    </h1>
    <table border="1" cellpadding="5px" style="width:100%" class="table table-striped">
        <tr>
            <th>ID Pasien</th>
            <th>Nama Pasien</th>
            <th>Alamat</th>
            <th>No Hp</th>
            <th>Rt</th>
            <th>Rw</th>
            <th>Nama Kelurahan</th>
            <th>Tanggal Lahir</th>
            <th>Jenis Kelamin</th>
        </tr>
        <tr>
            <td>{{ $pasien->id }}</td>
            <td>{{ $pasien->nama_pasien }}</td>
            <td>{{ $pasien->alamat }}</td>
            <td>{{ $pasien->no_hp }}</td>
            <td>{{ $pasien->rt }}</td>
            <td>{{ $pasien->rw }}</td>
            <td>{{ $pasien->kelurahan->nama_kelurahan }}</td>
            <td>{{ $pasien->tanggal_lahir }}</td>
            <td>{{ $pasien->jenis_kelamin }}</td>
        </tr>
    </table>
</body>

<script>
    window.print();
</script>

</html>
