<?php

namespace App\Filament\Ujian\Pages;

use App\Models\Student;
use Filament\Notifications\Notification;
use Filament\Pages\Page;
use Illuminate\Support\Facades\Auth;

class StudentLogin extends Page
{
    protected static bool $shouldRegisterNavigation = false;

    protected string $view = 'filament.ujian.pages.student-login';

    public string $nis = '';

    public function login(): void
    {
        $student = Student::where('nis', $this->nis)->first();

        if (! $student) {
            Notification::make()
                ->title('Login gagal')
                ->body('NIS tidak ditemukan.')
                ->danger()
                ->send();

            return;
        }

        Auth::guard('student')->login($student);

        $this->redirect('/panel-ujian');
    }
}