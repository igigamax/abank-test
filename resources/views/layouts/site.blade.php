<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Тестовое задание</title>
    <!-- Styles -->
    <style>
        a{
            text-decoration: none;
            color: blue;
        }
        ul{
            display: inline-flex;
        }
        li{
            list-style-type: none;
            margin-right: 10px;
        }
        table{
            border: 1px solid black;
            border-collapse: collapse;
        }
        th{
            border: 1px solid black;
        }
        td{
            border: 1px solid black;
        }
    </style>
</head>
<body>
    <div class="container">
        @yield('content')
    </div>
</body>
</html>