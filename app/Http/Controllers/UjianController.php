<?php

namespace App\Http\Controllers;

use App\Models\Pengerjaan;
use App\Models\PesertaUjian;
use Illuminate\Http\Request;

class UjianController extends Controller
{
    public function index()
    {
        $pesertaUjians = PesertaUjian::with([
            'ujian.mataPelajaran',
            'siswa'
        ])->get();

        return view('ujian.index', compact('pesertaUjians'));
    }

    public function mulai($id)
    {
        $peserta = PesertaUjian::with([
            'ujian.mataPelajaran',
            'ujian.ujianSoals.soal',
            'siswa'
        ])->findOrFail($id);

        if ($peserta->status === 'Belum Mulai') {
            $peserta->update([
                'status' => 'Sedang Mengerjakan',
                'mulai' => now(),
            ]);
        }

        $soals = $peserta->ujian->ujianSoals
            ->sortBy('urutan');

        return view('ujian.mulai', compact('peserta', 'soals'));
    }

    public function selesai(Request $request, $id)
    {
        $peserta = PesertaUjian::with([
            'ujian.ujianSoals.soal',
            'siswa'
        ])->findOrFail($id);

        $jawabanSiswa = $request->input('jawaban', []);

        $jumlahBenar = 0;
        $jumlahSoal = $peserta->ujian->ujianSoals->count();

        foreach ($peserta->ujian->ujianSoals as $ujianSoal) {
            $soal = $ujianSoal->soal;

            $jawaban = $jawabanSiswa[$soal->id] ?? null;

            $benar = $jawaban === $soal->jawaban_benar;

            if ($benar) {
                $jumlahBenar++;
            }

            Pengerjaan::updateOrCreate(
                [
                    'peserta_ujian_id' => $peserta->id,
                    'soal_id' => $soal->id,
                ],
                [
                    'jawaban' => $jawaban,
                    'benar' => $benar,
                    'nilai' => $benar ? $soal->bobot : 0,
                ]
            );
        }

        $nilai = $jumlahSoal > 0
            ? round(($jumlahBenar / $jumlahSoal) * 100)
            : 0;

        $peserta->update([
            'selesai' => now(),
            'nilai' => $nilai,
            'status' => 'Selesai',
        ]);

        return view('ujian.hasil', compact(
            'peserta',
            'jumlahBenar',
            'jumlahSoal',
            'nilai'
        ));
    }

    public function riwayat()
    {
        $pesertaUjians = PesertaUjian::with([
            'ujian.mataPelajaran',
            'siswa'
        ])
            ->where('status', 'Selesai')
            ->latest('selesai')
            ->get();

        return view('ujian.riwayat', compact('pesertaUjians'));
    }

    public function hasil($id)
    {
        $peserta = PesertaUjian::with([
            'ujian.ujianSoals.soal',
            'siswa'
        ])->findOrFail($id);

        $pengerjaans = Pengerjaan::with('soal')
            ->where('peserta_ujian_id', $peserta->id)
            ->get();

        $jumlahSoal = $pengerjaans->count();

        $jumlahBenar = $pengerjaans
            ->where('benar', true)
            ->count();

        $nilai = $peserta->nilai ?? 0;

        return view('ujian.hasil', compact(
            'peserta',
            'pengerjaans',
            'jumlahBenar',
            'jumlahSoal',
            'nilai'
        ));
    }
}