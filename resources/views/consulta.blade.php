@extends('layout')
@section('contenido')
<h2>Consulta de pacientes</h2>
<br>
<form action={{ route('consultaPacientes') }} method="get">
    <div class="mb-3">
        <label class="form-label">Pacientes a mostrar:</label>
        <select class="form-select" name="mostrar" onchange="this.form.submit()">
            <option value="5" <?php if (($mostrar ?? null) == 5) echo 'selected';?>>5</option>
            <option value="10" <?php if (($mostrar ?? null) == 10) echo 'selected';?>>10</option>
            <option value="20" <?php if (($mostrar ?? null) == 20) echo 'selected';?>>20</option>
            <option value="50" <?php if (($mostrar ?? null) == 50) echo 'selected';?>>50</option>
        </select>
        <br>
        <div>
            <label class="form-label">Buscar por apellido:</label>
            <input type="search" class="form-control" id="filtro" name="filtro" value="{{ $filtro ?? null}}" onkeyup="this.form.submit()">

        </div>
    </div>
</form>
<br>
<table id='pacientes' class="table table-striped">
    <tr>
        <th>NIF</th>
        <th>NOMBRE</th>
        <th>APELLIDOS</th>
        <th></th>
    </tr>
    @foreach ($pacientes as $paciente)
    <tr>
        <td>{{ $paciente->nif }}</td>
        <td>{{ $paciente->nombre }}</td>
        <td>{{ $paciente->apellidos }}</td>
        <td>
            <form action="{{ route('consultaPaciente',['idpaciente'=>$paciente['idpaciente']]) }}" method='GET'>

                <input type='submit' value='Detalle paciente'>
            </form>

        </td>


    </tr>
    @endforeach

</table>

@empty ($paciente)
<h4>No hay datos</h4>
@else
<table id='pacientes' class="table table-striped">
</table>
@endempty

</table>
{{-- {{ $pacientes->onEachSide(2)->links() }} --}}
{{ $pacientes->onEachSide(2)->links() }}


@endsection

