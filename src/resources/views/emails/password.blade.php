@extends('emails.master')

@section('main')
    Beste admin,<br><br>

    Klik op onderstaande knop om uw wachtwoord te resetten.<br><br>

    {!! link_to(trim(config('component-skins.prefix'), '/') . '/login/reset/'.$token, 'Reset wachtwoord', ['style' => 'background-color: #f67a6e; color: #fff; display: block; width: 100%; text-align: center; line-height: 50px; text-decoration: none; font-weight: bold; font-size: 16px;']) !!}
@endsection
