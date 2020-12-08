

@if (Session::has('Mensaje')){{
    Session::get('Mensaje')
}}
@endif

<a href="{{url('/productos/create')}}">Cargar Producto</a>

<table class="table table-light">

    <thead class="thead-light">
        <tr>
            <th></th>
            <th>SKU</th>
            <th>Nombre</th>
            <th>Descripcion</th>
            <th>Imagen</th>
            <th>Precio</th>
            <th>Disponibilidad</th>
            <th>Acciones</th>
        </tr>
    </thead>

    <tbody>
        @foreach ($productos as $producto)
            <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{$producto->Nombre}}</td>
                <td>{{$producto->Descripcion}}</td>
                <td>
                    <img src="{{ asset('storage').'/'.$producto->Imagen}}" alt="" width="200">
                </td>
                <td>{{$producto->Precio}}</td>
                <td>{{$producto->Disponibilidad}}</td>
                <td>
                    <a href="{{ url('/productos/'.$producto->id.'/edit')}}">
                        editar
                    </a>


                    <form method="post" action="{{ url('/productos/'.$producto->id)}}">
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}
                        <button type="submit" onclick="return confirm('¿Seguro que quiere eliminar?');">Borrar</button>

                    </form>

                </td>
            </tr>

        @endforeach
    </tbody>

</table>
