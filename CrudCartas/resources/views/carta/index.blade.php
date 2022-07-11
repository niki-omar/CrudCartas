Tabla de Colecciones
 
@if(Session::has('mensaje'))
    {{ Session::get('mensaje') }}
@endif

<a href="{{ url('/carta/create') }}" class="btn btn-primary">Nueva carta</a>

<table class="table">
    <thead>
        <tr>
            <th>ID</th>
            <th>Descripcion</th>
            <th>Foto</th>
            <th>Condición</th>
            <th>Cantidad</th>
            <th>Numeración</th>
            <th>Colección</th>
            <th>Rareza</th>
        </tr>
    </thead>

    <tbody>
        @foreach($cartas as $carta)
        <tr>
            <td>{{ $carta->id }}</td>
            <td>{{ $carta->descripcion }}</td>
            <td>
                <img src="{{ asset('storage').'/'.$carta->foto }}" alt="" width="100">
            </td> 
            <td>{{ $carta->condicion }}</td>
            <td>{{ $carta->cantidad }}</td>
            <td>{{ $carta->numeracion }}</td>
            <td>{{ $carta->coleccion }}</td>
            <td>{{ $carta->rareza }}</td>
            <td>
                <a href="{{ url('/carta/'.$carta->id.'/edit') }}">Editar</a>
                <span> | </span>
                <form action="{{ url('/carta/'.$carta->id) }}" method="POST">
                    @csrf
                    {{method_field('DELETE')}}
                    <input type="submit" value="Eliminar" onclick="return confirm('¿Seguro?')">
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>