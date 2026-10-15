<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $peserta->ujian->nama_ujian }}</title>

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

        .header {
            background: white;
            padding: 25px;
            border-radius: 10px;
            margin-bottom: 20px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.08);
        }

        .header h1 {
            margin-top: 0;
        }

        .info {
            color: #555;
            margin: 6px 0;
        }

        .soal {
            background: white;
            padding: 25px;
            margin-bottom: 20px;
            border-radius: 10px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.08);
        }

        .nomor {
            font-weight: bold;
            color: #198754;
            margin-bottom: 10px;
        }

        .pertanyaan {
            font-size: 18px;
            font-weight: bold;
            margin-bottom: 20px;
        }

        .pilihan {
            display: block;
            padding: 12px;
            margin: 10px 0;
            border: 1px solid #ddd;
            border-radius: 7px;
            cursor: pointer;
        }

        .pilihan:hover {
            background: #f0f0f0;
        }

        .pilihan input {
            margin-right: 10px;
        }

        .btn {
            display: inline-block;
            padding: 12px 25px;
            background: #198754;
            color: white;
            border: none;
            border-radius: 7px;
            font-size: 16px;
            cursor: pointer;
        }

        .btn:hover {
            background: #157347;
        }

        .kosong {
            background: white;
            padding: 30px;
            text-align: center;
            border-radius: 10px;
        }
    </style>
</head>

<body>

<div class="container">

    <div class="header">
        <h1>{{ $peserta->ujian->nama_ujian }}</h1>

        <div class="info">
            <strong>Nama Siswa:</strong>
            {{ $peserta->siswa->nama }}
        </div>

        <div class="info">
            <strong>Mata Pelajaran:</strong>
            {{ $peserta->ujian->mataPelajaran->nama ?? '-' }}
        </div>

        <div class="info">
            <strong>Durasi:</strong>
            {{ $peserta->ujian->durasi }} menit
        </div>
    </div>

    @if ($soals->count() > 0)

        <form method="POST" action="{{ route('ujian.selesai', $peserta->id) }}">
            @csrf

            @foreach ($soals as $index => $ujianSoal)

                @php
                    $soal = $ujianSoal->soal;
                @endphp

                <div class="soal">

                    <div class="nomor">
                        Soal {{ $index + 1 }}
                    </div>

                    <div class="pertanyaan">
                        {{ $soal->pertanyaan }}
                    </div>

                    <label class="pilihan">
                        <input
                            type="radio"
                            name="jawaban[{{ $soal->id }}]"
                            value="A"
                        >
                        A. {{ $soal->pilihan_a }}
                    </label>

                    <label class="pilihan">
                        <input
                            type="radio"
                            name="jawaban[{{ $soal->id }}]"
                            value="B"
                        >
                        B. {{ $soal->pilihan_b }}
                    </label>

                    <label class="pilihan">
                        <input
                            type="radio"
                            name="jawaban[{{ $soal->id }}]"
                            value="C"
                        >
                        C. {{ $soal->pilihan_c }}
                    </label>

                    <label class="pilihan">
                        <input
                            type="radio"
                            name="jawaban[{{ $soal->id }}]"
                            value="D"
                        >
                        D. {{ $soal->pilihan_d }}
                    </label>

                </div>

            @endforeach

            <button type="submit" class="btn">
                Selesai Ujian
            </button>

        </form>

    @else

        <div class="kosong">
            <h2>Belum Ada Soal</h2>
            <p>Soal untuk ujian ini belum tersedia.</p>
        </div>

    @endif

</div>

</body>
</html>