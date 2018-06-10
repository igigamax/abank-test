@extends('layouts.site')

@section('content')
    <div class="row">
        <a href="{{ url('/employees') }}" class="start_form">Сотрудники</a>
    </div>
    <div class="row">
        <a href="{{ url('/terminals') }}" class="start_form">Терминалы</a>
    </div>
    <div class="row">
        <a href="{{ url('/options') }}" class="start_form">Настройки</a>
    </div>
@endsection
