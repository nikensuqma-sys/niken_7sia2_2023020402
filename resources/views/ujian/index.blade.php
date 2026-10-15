<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Ujian</title>
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
        .btn {
            display: inline-block;
            margin-top: 15px;
            padding: 10px 18px;
            color: white;
            text-decoration: none;
            border-radius: 6px;
        }
        .btn-mulai {
            background: #198754;
        }
        .btn-mulai:hover {
            background: #157347;
        }
        .btn-lanjut {
            background: #0d6efd;
        }
        .btn-lanjut:hover {
            background: #0b5ed7;
        }
        .btn-hasil {
            background: #6f42c1;
        }
        .btn-hasil:hover {
            background: #59339d;
        }
        .status {
            display: inline-block;
            padding: 5px 10px;
            border-radius: 5px;
            color: white;
            font-size: 14px;
            margin-top: 10px;
        }
        .status-belum {
            background: #6c757d;
        }
        .status-proses {
            background: #0d6efd;
        }
        .status-selesai {
            background: #198754;
        }
        .empty {
            background: white;
            padding: 25px;
            border-radius: 10px;
            text-align: center;
        }
        .riwayat {
            display: inline-block;
            margin-bottom: 20px;
            padding: 10px 18px;
            background: #343a40;
            color: white;
            text-decoration: none;
            border-radius: 6px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Daftar Ujian</h1>

        <a href="{{ route('ujian.riwayat') }}" class="riwayat">
            Lihat Riwayat Ujian
        </a>

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
                    <strong>Tanggal:</strong>
                    {{ $peserta->ujian->tanggal_mulai->format('d/m/Y') }}
                    -
                    {{ $peserta->ujian->tanggal_selesai->format('d/m/Y') }}
                </div>

                <div class="info">
                    <strong>Jam:</strong>
                    {{ $peserta->ujian->jam_mulai }}
                    -
                    {{ $peserta->ujian->jam_selesai }}
                </div>

                <div class="info">
                    <strong>Durasi:</strong>
                    {{ $peserta->ujian->durasi }} menit
                </div>

                @if ($peserta->status === 'Belum Mulai')
                    <span class="status status-belum">
                        Belum Mulai
                    </span>

                    <br>

                    <a href="{{ route('ujian.mulai', $peserta->id) }}" class="btn btn-mulai">
                        Mulai Ujian
                    </a>

                @elseif ($peserta->status === 'Sedang Mengerjakan')
                    <span class="status status-proses">
                        Sedang Mengerjakan
                    </span>

                    <br>

                    <a href="{{ route('ujian.mulai', $peserta->id) }}" class="btn btn-lanjut">
                        Lanjut Ujian
                    </a>

                @elseif ($peserta->status === 'Selesai')
                    <span class="status status-selesai">
                        Selesai
                    </span>

                    <br>

                    <a href="{{ route('ujian.hasil', $peserta->id) }}" class="btn btn-hasil">
                        Lihat Hasil
                    </a>
                @endif
            </div>
        @empty
            <div class="empty">
                <h3>Tidak ada ujian</h3>
                <p>Belum ada ujian yang tersedia.</p>
            </div>
        @endforelse
    </div>
</body>
</html>