@extends('layouts.site')

@section('content')
    @if(isset($done) && $done)
        <div class="row">
            Данные успешно добавлены
        </div>
    @endif
    <form action="/subdivision/add" method="post">
        <div class="row">
            <label for="code_subdivision">Код подразделения</label>
            <input type="text" class="" id="code_subdivision" name="code_subdivision" value="">
        </div>
        <div class="row">
            <label for="name_subdivision">Регион</label>
            <input type="text" class="" id="name_subdivision" name="name_subdivision" value="">
        </div>
        <div class="row">
            <input type="submit" class="button" id="submitSubdivision" name="submitSubdivision" value="Добавить">
            &nbsp;<a href="/">Назад</a>
        </div>
        {{csrf_field()}}
    </form>
@endsection
