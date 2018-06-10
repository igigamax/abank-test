@extends('layouts.site')

@section('content')
    <h2>Таблица терминалов</h2>
    <table style="text-align: center;">
        <tr>
            <th>Код терминала</th>
            <th>Ответственный</th>
            <th>Подразделение</th>
            <th>Производитель</th>
            <th>Изобрадение</th>
            <th>Статус</th>
            <th>Дата установки</th>
            <th>Дата последнего обслуживания</th>
        </tr>
        @foreach($terminals as $terminal)
            <tr>
                <td>
                    <a href="{{ route('getTerminal', ['id' => $terminal->id]) }}">
                        {{$terminal->code_subdivision}}-{{$terminal->code_terminal}}
                    </a>
                </td>
                <td>
                    {{$terminal->lastname}} {{$terminal->firstname}}
                </td>
                <td>
                    {{$terminal->code_subdivision}}
                </td>
                <td>
                    {{$terminal->name_manufacturer}}
                </td>
                <td>
                    @if(isset($terminal->image) && !empty($terminal->image))
                        <div class="row">
                            <img src="{{asset('images/terminals/'.$terminal->image)}}">
                        </div>
                    @endif
                </td>
                <td>
                    {{$terminal->name_status}}
                </td>
                <td>
                    {{$terminal->installation_date}}
                </td>
                <td>
                    {{$terminal->last_service_date}}
                </td>
            </tr>
        @endforeach
    </table>
    {{$terminals->render()}}
    <a href="{{ URL::previous() }}">Назад</a>
@endsection