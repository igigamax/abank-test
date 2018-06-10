@extends('layouts.site')

@section('content')
    <div class="row">
        <form action="/option/paginate" method="post">
            <label for="paginate">Количество записей на странице</label>
            <input type="text" class="" id="paginate" name="paginate" value="{{App\Option::getOption('paginate')}}">
            <input type="submit" class="" id="submitPaginate" name="submitPaginate" value="Сохранить">
            {{csrf_field()}}
        </form>
    </div>
    <div class="row">
        <a href="{{ url('/subdivision/add') }}" class="start_form">Добавить подразделение</a>
    </div>
    <div class="row">
        <a href="{{ url('/employee/add') }}" class="start_form">Добавить сотрудника</a>
    </div>
    <div class="row">
        <a href="{{ url('/manufacturer/add') }}" class="start_form">Добавить производителя</a>
    </div>
    <div class="row">
        <a href="{{ url('/status/add') }}" class="start_form">Добавить статус</a>
    </div>
    <div class="row">
        <a href="{{ url('/terminal/add') }}" class="start_form">Добавить терминал</a>
    </div>
    <div class="row">
        <a href="/">Назад</a>
    </div>
@endsection
