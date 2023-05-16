<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name') }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    @yield('css')
    @livewireStyles
    @livewireScripts
</head>

<body>
    @yield('content')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script>
        const nav = document.getElementsByClassName('nv')
        switch ('{{ getCurrentSection() }}') {
            case 'dashboard':
                nav[0].classList.add('active');
                break;
            case 'kriteria':
                nav[1].classList.add('active');
                break;
            case 'subkriteria':
                nav[2].classList.add('active');
                break;
            case 'obat':
                nav[3].classList.add('active');
                break;
            case 'smart':
                nav[4].classList.add('active');
                break;
        }
    </script>
    @yield('js')
</body>

</html>
