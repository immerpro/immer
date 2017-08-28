<style>
    .redondo{
    width: 200px;
    height: 200px;
    border-radius: 150px;
    -moz-border-radius: 150px;
    -webkit-border-radius: 150px;
        
}
</style>
<h1 class="h1-responsive text-center orange-text">Bienvenido Administrador(a) <?= $this->session->userdata('apellidos') ?> </h1>
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
                    <div class="avatar"><img src="<?PHP echo base_url(); ?>/public/img/woman_market.jpg" class="mx-auto d-block redondo" alt="img">
                    </div>

                    <div class="card-body">
                        <!--Name-->
                        <h4 class="card-title">SubCategorìa</h4>
                        <hr>
                        <!--Quotation-->
                        <p><i class="fa fa-quote-left"></i> En este modulo se gestiona la parte de categorias de productos en donde el administrador podra crear, modificar, consultar </p>
                    </div>

                </div>
                <!--/.Card-->

            </div>
            <div class="col-md-5">
                <!--Card-->
                <div class="card testimonial-card">

                    <!--Bacground color-->
                    <div class="card-up indigo lighten-1">
                    </div>

                    <!--Avatar-->
                    <div class="avatar"><img src="<?PHP echo base_url(); ?>/public/img/cream.jpg" class="mx-auto d-block redondo" alt="img">
                    </div>

                    <div class="card-body">
                        <!--Name-->
                        <h4 class="card-title">Categorìa</h4>
                        <hr>
                        <!--Quotation-->
                        <p><i class="fa fa-quote-left"></i> En este modulo se gestiona la parte de categorias de productos en donde el administrador podra crear, modificar, consultar </p>
                    </div>

                </div>
                <!--/.Card-->

            </div>

        </div>


    </section>

</div>