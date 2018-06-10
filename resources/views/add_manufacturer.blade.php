@extends('layouts.site')

@section('content')
    @if(isset($done) && $done)
        <div class="row">
            Данные успешно добавлены
        </div>
    @endif
    <form action="/manufacturer/add" method="post">
        <div class="row">
            <label for="name_manufacturer">Название производителя</label>
            <input type="text" class="" id="name_manufacturer" name="name_manufacturer" value="">
        </div>
        <div class="row">
            <input type="submit" class="button" id="submitManufacturer" name="submitManufacturer" value="Добавить">
            &nbsp;<a href="/">Назад</a>
        </div>
        {{csrf_field()}}
    </form>
@endsection
