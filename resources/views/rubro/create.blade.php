seccion para crear rubros
<form action="{{url('/rubto')}}" method="post" enctype="multipart/form-data">
{{ csrf_field() }}

<br>

<label for="Nombre"> {{'Nombre'}}</label>
<input type="text" name="Nombre" id="Nombre" value="">

<br>

<input type="submit" value="Agregar">

