@extends('layouts.site')

@section('content')
    @if(isset($done) && $done)
        <div class="row">
            Данные успешно добавлены
        </div>
    @endif
    <form action="/employee/add" method="post">
        <div class="row">
            <label for="firstname">Имя</label>
            <input type="text" class="" id="firstname" name="firstname" value="">
        </div>
        <div class="row">
            <label for="lastname">Фамилия</label>
            <input type="text" class="" id="lastname" name="lastname" value="">
        </div>
        <div class="row">
            <label for="id_subdivision">Подразделение</label>
            <select  class="id_subdivision" name="id_subdivision">
                @foreach(App\Subdivision::all() as $subdivision)
                    <option value="{{$subdivision->id}}">{{$subdivision->code_subdivision}}</option>
                @endforeach
            </select>
        </div>
        <div class="row">
            <input type="submit" class="" id="submitEmployee" name="submitEmployee" value="Добавить">
            &nbsp;<a href="/">Назад</a>
        </div>
        {{csrf_field()}}
    </form>
@endsection
