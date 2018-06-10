@extends('layouts.site')

@section('content')
    <h2>Таблица заказов</h2>
    <table style="text-align: center;">
        <tr>
            <th>Номер заказа</th>
            <th>Заказчик</th>
            <th>Стоимость заказа</th>
            <th></th>
        </tr>
        @foreach($orders as $order)
            <tr>
                {{--$order->id--}}
                <td>
                    <a href="{{ route('GetOrder', ['order_number' => $order->order_number, 'pdf' => 'no']) }}">{{$order->order_number}}</a>
                </td>
                <td>
                    {{$order->fio}}
                </td>
                <td>
                    {{$order->total_price}} грн.
                </td>
                <td>
                    <strong><a href="{{ route('GetOrder', ['order_number' => $order->order_number, 'pdf' => 'yes']) }}">PDF </a></strong>
                </td>
            </tr>
        @endforeach
    </table>
@endsection