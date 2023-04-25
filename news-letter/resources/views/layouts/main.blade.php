<!DOCTYPE html>
<html lang="PT-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="./css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <title>@yield('title')</title>

</head>
<style>
    footer {
        text-align: center;
        background-color: #5e5e5e;
        color: #FFF;
        padding: 30px;
        /* position: absolute; */
        bottom: 0;
        width: 100%;
    }

    footer p {
        margin-bottom: 0;
        font-weight: 500;
    }
</style>
<body onLoad="onLoad()">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <main>
        <x-navbar />
        <div class="container-fluid">
            <div class="row">
                @yield('content')
            </div>
        </div>
    </main>
    <footer>
        <p>Newsletter &copy; 2023</p>
    </footer>

<script>   
function onLoad() {
  if (localStorage.selecionado == undefined) {
    localStorage.selecionado = 'home';
  }
  atualiza(localStorage.selecionado);
}
</script>
    
</body>
</html>