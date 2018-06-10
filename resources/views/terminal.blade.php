@extends('layouts.site')

@section('content')
    <div class="row">
        Код терминала: {{$terminal->code_subdivision}}-{{$terminal->code_terminal}}
    </div>
    <div class="row">
        Ответственный: {{$terminal->lastname}} {{$terminal->firstname}}
    </div>
    <div class="row">
        Подразделение: {{$terminal->code_subdivision}}
    </div>
    <div class="row">
        Название производителя: {{$terminal->name_manufacturer}}
    </div>
    <div class="row">
        Изобрадение :
        @if(isset($terminal->image) && !empty($terminal->image))
            <div class="row">
                <img src="{{asset('images/terminals/'.$terminal->image)}}">
            </div>
        @endif
    </div>
    <div class="row">
        Дата установки: {{$terminal->installation_date}}
    </div>
    <div class="row">
        Дата последнего обслуживания: {{$terminal->last_service_date}}
    </div>
    <form action="{{ route('changeStatus', ['id' => $terminal->id]) }}" method="post" enctype="multipart/form-data">
        <div class="row">
            <label for="id_status">Статус</label>
            <select  class="id_status" name="id_status">
                @foreach(App\Status::all() as $status)
                    <option value="{{$status->id}}" @if($status->id == $terminal->id_status) selected="selected" @endif>{{$status->name_status}}</option>
                @endforeach
            </select>
        </div>
        {{csrf_field()}}
        <div class="row">
            <input type="submit" class="" id="submitChangeStatus" name="submitChangeStatus" value="Изменить статус">
        </div>
    </form>
    <form action="{{ route('deleteTerminal', ['id' => $terminal->id]) }}" method="post">
        {{csrf_field()}}
        <div class="row">
            <input type="submit" class="" id="submitDeleteTerminal" name="submitDeleteTerminal" value="Удалить терминал">
        </div>
    </form>
    <a href="{{ URL::previous() }}">Назад</a>
@endsection
