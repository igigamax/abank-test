@extends('layouts.site')

@section('content')
    @if(isset($done) && $done)
        <div class="row">
            Данные успешно добавлены
        </div>
    @endif
    <form action="/terminal/add" method="post" enctype="multipart/form-data">
        <div class="row">
            <label for="code_terminal">Код терминала</label>
            <input type="text" class="" id="code_terminal" name="code_terminal" value="">
        </div>
        <div class="row">
            <label for="id_employee">Ответственный</label>
            <select  class="id_employee" name="id_employee">
                @foreach(App\Employee::all() as $employee)
                    <option value="{{$employee->id}}">{{$employee->firstname}} {{$employee->lastname}}</option>
                @endforeach
            </select>
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
            <label for="id_manufacturer">Название производителя</label>
            <select  class="id_manufacturer" name="id_manufacturer">
                @foreach(App\Manufacturer::all() as $manufacturer)
                    <option value="{{$manufacturer->id}}">{{$manufacturer->name_manufacturer}}</option>
                @endforeach
            </select>
        </div>
        <div class="row">
            <label for="image">Изобрадение</label>
            <input type="file" class="" id="image" name="image">
        </div>
        <div class="row">
            <label for="id_status">Статус</label>
            <select  class="id_status" name="id_status">
                @foreach(App\Status::all() as $status)
                    <option value="{{$status->id}}">{{$status->name_status}}</option>
                @endforeach
            </select>
        </div>
        <div class="row">
            <label for="installation_date">Дата установки</label>
            <input type="text" class="" id="installation_date" name="installation_date" value="">
        </div>
        <div class="row">
            <label for="last_service_date">Дата последнего обслуживания</label>
            <input type="text" class="" id="last_service_date" name="last_service_date" value="">
        </div>
        <div class="row">
            <input type="submit" class="" id="submitTerminal" name="submitTerminal" value="Добавить">
            &nbsp;<a href="/">Назад</a>
        </div>
        {{csrf_field()}}
    </form>
@endsection
