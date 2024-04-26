<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">


    <title>Bincom</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <link rel="stylesheet" href="{{ asset('css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/responsive.bootstrap4.min.css') }}">


</head>

<body>

    <nav class="navbar navbar-expand-md bg-dark navbar-dark sticky-top border-bottom">
        <div class="container-fluid my-3">
            <a href="{{ route('pages.home') }}" class="navbar-brand">Bincom</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#myNavBar">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="myNavBar">
                <ul class="navbar-nav mx-auto">
                    <li class="nav-item">
                        <a href="{{ route('pages.home') }}" class="nav-link text-uppercase">home</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('pages.question1') }}" class="nav-link text-uppercase">question 1</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('pages.question2') }}" class="nav-link text-uppercase">question 2</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('pages.question3') }}" class="nav-link text-uppercase">question 3</a>
                    </li>

                </ul>

            </div>

        </div>
    </nav>

