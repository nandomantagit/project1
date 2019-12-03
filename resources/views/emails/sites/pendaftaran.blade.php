@component('mail::message')
# Pendaftaran Siswa Sukses

Selamat anda telah terdaftar di SMA 59 Jakarta.
Silahkan klik tombol dibawah untuk login.

@component('mail::button', ['url' => 'http://127.0.0.1:8000/login'])
Klik disini
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
