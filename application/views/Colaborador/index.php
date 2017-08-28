<style>
    .imagencard{
        width: 350px;
        height: 250px;
    }
</style>
<h1 class="h1-responsive text-center orange-text">Bienvenido <?=$this->session->userdata('usuario')?></h1>
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
                    <div class="avatar"><img src="<?PHP echo base_url(); ?>/public/img/ima.jpg" class="mx-auto d-block imagencard" alt="img">
                    </div>

                    <div class="card-body">
                        <!--Name-->
                        <h4 class="card-title">Producto</h4>
                        <hr>
                        <!--Quotation-->
                        <p><i class="fa fa-quote-left"></i> permite el registrar los productos</p>
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
                    <div class="avatar"><img src="<?PHP echo base_url(); ?>/public/img/ima.jpg" class="mx-auto d-block imagencard" alt="img">
                    </div>

                    <div class="card-body">
                        <!--Name-->
                        <h4 class="card-title">Orden Salida</h4>
                        <hr>
                        <!--Quotation-->
                        <p><i class="fa fa-quote-left"></i> podra registrar la orden de salida </p>
                    </div>

                </div>
                <!--/.Card-->

            </div>

        </div>


    </section>

</div>

    
    
