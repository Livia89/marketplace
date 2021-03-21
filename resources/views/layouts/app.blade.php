<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Marketplace l6</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('/css/layout/structure.css')}}?<?=rand(1,99999)?>">
    <link rel="stylesheet" href="{{asset('/css/layout/style.css')}}?<?=rand(1,99999)?>">
</head>
<body>
    <?/* Projeto marketplace, utilizador tem direito a criar uma loja com vários produtos pertencentes a n categorias */?>
    @include('layouts.structure.header')
    <main class="container">
        @include('flash::message')
        @yield('content') {{--  diretivas do blade--}}
    </main>
    @include('layouts.structure.footer')
</body>
</html>
