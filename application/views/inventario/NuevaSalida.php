    <div class="container">
    <section class="section">
        <p class="h1 orange-text text-center">Orden Salida</p>
        <br>

        <div class="flex-center">
            <div class="row">

                <div class="col-md-6">
                    <div class="md-form">

                        <input type="text" id="snombP" class="form-control validate" name="txtSalidaPro">
                        <label for="snombP" data-error="wrong" data-success="right"><i class="fa fa-align-center"></i> Nombre Producto: </label>
                    </div>
                    <div class="md-form">

                        <input type="text" id="snombP" class="form-control validate" name="txtCantsalida">
                        <label for="snombP" data-error="wrong" data-success="right"><i class="fa fa-align-center"></i> Cantidad Salida:</label>
                    </div>

                </div>

                <div class="col-6">
                    <div class="md-form">

                        <input type="text" id="snombP" class="form-control validate" name="txtPreSalida">
                        <label for="snombP" data-error="wrong" data-success="right"><i class="fa fa-align-center"></i> Precio Salida</label>
                    </div>
                    <div >
                        <label for="snombP" data-error="wrong" data-success="right"><i class="fa fa-align-center"></i> Motivo Salida</label>

                        <select class="form-control">
                            <option value="merma">Merma</option>
                            <option value="devolucion"> devolucion proveedor</option>
                            <option value="venta">venta</option>
                            <option value="vencimiento">producto vencido</option>
                        </select>
                    </div>
                </div>
                <div class="flex-center">
                    <button type="submit" class="btn btn-orange waves-effect orange" name="btnNuevaSalida"  ><i class='fa fa-send'> Registrar Orden Salida</i></button>

                </div>

            </div>

        </div>



    </section>
</div>
