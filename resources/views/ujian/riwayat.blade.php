<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Riwayat Ujian</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f4f6f8;
            margin: 0;
            padding: 30px;
        }

        .container {
            max-width: 900px;
            margin: auto;
        }

        h1 {
            margin-bottom: 25px;
        }

        .card {
            background: white;
            padding: 20px;
            margin-bottom: 15px;
            border-radius: 10px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.08);
        }

        .card h2 {
            margin-top: 0;
        }

        .info {
            margin: 8px 0;
            color: #555;
        }

        .nilai {
            font-size: 28px;
            font-weight: bold;
            color: #198754;
            margin: 15px 0;
        }

        .status {
            display: inline-block;
            padding: 6px 12px;
            background: #198754;
            color: white;
            border-radius: 5px;
        }

        .empty {
            background: white;
            padding: 30px;
            border-radius: 10px;
            text-align: center;
        }

        .btn {
            display: inline-block;
            margin-top: 15px;
            padding: 10px 18px;
            background: #198754;
            color: white;
            text-decoration: none;
            border-radius: 6px;
        }

        .btn:hover {
            background: #157347;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Riwayat Ujian</h1>

        @forelse ($pesertaUjians as $peserta)
            <div class="card">
                <h2>{{ $peserta->ujian->nama_ujian }}</h2>

                <div class="info">
                    <strong>Siswa:</strong>
                    {{ $peserta->siswa->nama }}
                </div>

                <div class="info">
                    <strong>Mata Pelajaran:</strong>
                    {{ $peserta->ujian->mataPelajaran->nama ?? '-' }}
                </div>

                <div class="info">
                    <strong>Selesai:</strong>
                    {{ $peserta->selesai?->format('d/m/Y H:i') ?? '-' }}
                </div>

                <div class="nilai">
                    Nilai: {{ $peserta->nilai ?? 0 }}
                </div>

                <span class="status">
                    {{ $peserta->status }}
                </span>
            </div>
        @empty
            <div class="empty">
                <h3>Belum Ada Riwayat</h3>
                <p>Belum ada ujian yang selesai dikerjakan.</p>
            </div>
        @endforelse

        <a href="{{ route('ujian.index') }}" class="btn">
            Kembali ke Daftar Ujian
        </a>
    </div>
</body>
</html>