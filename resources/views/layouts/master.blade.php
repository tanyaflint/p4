<!doctype html>
<html lang="en">
<head>
    <title>{{'Schedule Editions'}}</title>
    <meta charset='utf-8'>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href='/css/main.css' type='text/css' rel='stylesheet'>
    @stack('head')
</head>
<body>
<div class='container'>
    <header class='mt-5'>

    </header>

    <section>
        @yield('content')
    </section>

    <footer>
        &copy; {{ date('Y') }}
    </footer>
</div>


@stack('body')
</body>
</html>