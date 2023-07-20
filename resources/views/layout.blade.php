<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Hospital</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/hospital.css') }}">
</head>
<body>
<div class="container">
	<header>
		<h1 id="title">HOSPITAL</h1>
	</header>
    <div class='flex'>
        <nav class="navbar bg-body-secondary">
            <h3>Menu opciones:</h3>
            <br>
            <a class="navbar-brand" href="{{ url('consulta') }}">Consulta pacientes</a>
            <a class="navbar-brand" href="{{ url('alta') }}">Alta paciente</a>
            <a class="navbar-brand" href=" {{ url('mantenimiento') }} ">Baja/modificación paciente</a>


        </nav>

        <section id='contenido'>
            <div>
                @yield('contenido')
            </div>
        </section>
    </div>
</div>
</body>
</html>
