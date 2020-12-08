

<label for="Nombre"> {{'Nombre'}}</label>
<input type="text" name="Nombre" id="Nombre"
value="{{ isset($producto->Nombre)?$producto->Nombre:''}}">

<br>
<label for="Codigo"> {{'Codigo Producto'}}</label>
<input type="text" name="SKU" id="SKU"
value="{{isset($producto->SKU)?$producto->SKU:''}}">

<br>
<label for="Descripcion"> {{'Descripcion'}}</label>
<textarea name="Descripcion" id="Descripcion" cols="30" rows="10">
    {{isset($producto->Descripcion)?$producto->Descripcion:''}}</textarea>

<br>

<label for="Imagen"> {{'Imagen'}}</label>
@if(isset($producto->Imagen))
<img src="{{asset('storage').'/'.$producto->Imagen}}" alt="No disponible" width="200">
@endif
<input type="file" name="Imagen" id="Imagen" value="">
<br>

<label for="Precio"> {{'Precio'}}</label>
<input type="text" name="Precio" id="Precio"
value="{{isset($producto->Precio)?$producto->Precio:''}}">
<br>

<label for="Disponbilidad"> {{'Disponibilidad'}}</label>
<input type="text" name="Disponibilidad" id="Disponibilidad"
value="{{isset($producto->Disponibilidad)?$producto->Disponibilidad:''}}">

<br>
<label for="rubros"> {{'rubros'}}</label>
<select name="idRubro" id="idRubro"
value="{{isset($producto->idRubro)?$producto->idRubro:''}}">

    <option selected="true" disabled="disabled" value=""> --Elija un Rubro-- </option>

    @foreach ($rubros as $rubro)
        <option value="{{ $rubro->id }}"> {{ $rubro->Nombre }} </option>
    @endforeach

</select>

<br>
<input type="submit" value="{{ $Modo=='crear' ? 'Agregar':'Modificar'}}">

<a href="{{url('productos')}}">Regresar</a>
