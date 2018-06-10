@extends('layouts.site')

@section('content')
    @if(isset($done) && $done)
        <div class="row">
            Данные успешно добавлены
        </div>
    @endif
    <form action="/status/add" method="post">
        <div class="row">
            <label for="name_status">Статус</label>
            <input type="text" class="" id="name_status" name="name_status" value="">
        </div>
        <div class="row">
            <input type="submit" class="button" id="submitStatus" name="submitStatus" value="Добавить">
            &nbsp;<a href="/">Назад</a>
        </div>
        {{csrf_field()}}
    </form>
@endsection
