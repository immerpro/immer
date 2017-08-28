<style>
    .redondo{
        width: 200px;
        height: 200px;
        border-radius: 150px;
        -moz-border-radius: 150px;
        -webkit-border-radius: 150px;

    }
</style>
<h1 class="h1-responsive text-center orange-text">Perfil Colaborador </h1>
<!-- ****** Team Section****** -->
<div class="container">
    <section class="section">
        <div class="row">
            <div class="col-md-5">
                <!--Card-->
                <div class="card testimonial-card">

                    <!--Bacground color-->
                    <div class="card-up indigo lighten-1">
                    </div>

                    <!--Avatar-->
                    <div class="avatar"><img src="<?PHP echo base_url(); ?>/public/img/ima.jpg" class="mx-auto d-block redondo" alt="img">
                    </div>

                    <div class="card-body">
                        <!--Name-->
                        <h4 class="card-title"></h4>
                        <hr>
                        <!--Quotation-->
                        <div class="row">
                            <div class="col-6">
                                <p class="badge badge-orange">Rol</p>  <p>Colaborador</p><br><br>
                                <p class="badge badge-green">Nombre Completo</p><p>Nombre Completo</p><br><br>
                                <p class="badge badge-green">Correo Electronico</p><p>email colaborador</p><br><br>
                    <button type="submit" class="btn btn-orange waves-effect orange" name="btnEditarPerfilColabora"><i class='fa fa-edit'> Actualizar Perfil Colaborador</i></button>

                            </div>

                        </div>

                    </div>

                </div>
                <!--/.Card-->

            </div>
           

        </div>


    </section>

</div>