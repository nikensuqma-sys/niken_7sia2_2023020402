<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hasil Ujian</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f4f6f8;
            margin: 0;
            padding: 30px;
        }

        .container {
            max-width: 700px;
            margin: auto;
        }

        .card {
            background: white;
            padding: 30px;
            border-radius: 12px;
            text-align: center;
            box-shadow: 0 2px 8px rgba(0,0,0,0.08);
        }

        h1 {
            margin-top: 0;
            color: #198754;
        }

        .nama {
            font-size: 18px;
            margin-bottom: 20px;
        }

        .nilai {
            font-size: 60px;
            font-weight: bold;
            margin: 20px 0;
            color: #198754;
        }

        .hasil {
            font-size: 18px;
            margin: 10px 0;
        }

        .btn {
            display: inline-block;
            margin-top: 25px;
            padding: 12px 25px;
            background: #198754;
            color: white;
            text-decoration: none;
            border-radius: 7px;
        }

        .btn:hover {
            background: #157347;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="card">
            <h1>Ujian Selesai</h1>

            <div class="nama">
                <strong>{{ $peserta->siswa->nama }}</strong>
            </div>

            <p>
                {{ $peserta->ujian->nama_ujian }}
            </p>

            <div class="nilai">
                {{ $nilai }}
            </div>

            <div class="hasil">
                Jawaban Benar:
                <strong>{{ $jumlahBenar }}</strong>
                dari
                <strong>{{ $jumlahSoal }}</strong>
                soal
            </div>

            <div class="hasil">
                Status:
                <strong>{{ $peserta->status }}</strong>
            </div>

            <a href="{{ route('ujian.index') }}" class="btn">
                Kembali ke Daftar Ujian
            </a>
        </div>
    </div>
</body>
</html>