<label for="descripcion">Descripcion</label>
        <input type="text" name="descripcion" value="{{isset($carta->descripcion)?$carta->descripcion:''}}" id="descripcion">
    <br>
        <label for="foto">Foto</label>
        <input type="file" name="foto" value="" id="foto">
        @if(isset($carta->foto))
            <img src="{{ asset('storage').'/'.$carta->foto }}" alt="" width="100">
        @endif
    <br>
        <label for="condicion">Condición</label>
        <input type="text" name="condicion" value="{{isset($carta->condicion)?$carta->condicion:''}}" class="form-control" id="condicion">
    <br>
        <label for="cantidad">Cantidad</label>
        <input type="text" name="cantidad" value="{{isset($carta->cantidad)?$carta->cantidad:''}}" class="form-control" id="condicion">
    <br>
        <label for="numeracion">Numeración</label>
        <input name="numeracion" value="{{isset($carta->numeracion)?$carta->numeracion:''}}" class="form-control" id="numeracion">
    <br>
        <label for="coleccion">Colección</label>
        <input name="coleccion" value="{{isset($carta->coleccion)?$carta->coleccion:''}}" class="form-control" id="coleccion">
    <br>
        <label for="rareza">Rareza</label>
        <input name="rareza" value="{{isset($carta->rareza)?$carta->rareza:''}}" class="form-control" id="rareza">
    <br>
    <input type="submit" value="Guardar datos">
    <a href="{{ url('/carta') }}" class="btn btn-primary">Regresar</a>
