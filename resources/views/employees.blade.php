@extends('layouts.site')

@section('content')
    <h2>Таблица терминалов</h2>
    <table style="text-align: center;">
        <tr>
            <th>Фамилия</th>
            <th>Имя</th>
            <th>Подразделение</th>
            <th>Терминалы</th>
        </tr>
        @foreach($employees as $employee)
            <tr>
                <td>
                    {{$employee->lastname}}
                </td>
                <td>
                    {{$employee->firstname}}
                </td>
                <td>
                    <a href="{{ route('filterEmployees', ['id' => $employee->id_subdivision]) }}">
                        {{$employee->code_subdivision}}
                    </a>
                </td>
                <td>
                    @if(isset($terminals[$employee->id]) && !empty($terminals[$employee->id]))
                        @foreach($terminals[$employee->id] as $terminal)
                            <a href="{{ route('getTerminal', ['id' => $terminal['id_terminal']]) }}">
                                {{$terminal['code_terminal']}}
                            </a>
                        @endforeach
                    @endif
                </td>
            </tr>
        @endforeach
    </table>
    {{$employees->render()}}
    <a href="{{ URL::previous() }}">Назад</a>
@endsection