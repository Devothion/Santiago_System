<!DOCTYPE html>
<html lang="en">
<head>

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;400;600&family=Roboto:wght@400;700&display=swap" rel="stylesheet"  media="print">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <title>Calculo de Solicitud - APP</title>

</head>
<body>

    <style>
        *{
            margin: 0;
            padding: 0;
        }
        .logo_top_container{
            width: 100%;
        }
        .bgform{
            width: 100%;
        }
        .logo_foot_container{
            width: 100%;
            position: absolute;
            bottom: 0;
        }
        .credito_cont{
            padding: 20px;
            position: absolute;
            bottom: 110;
        }
        .credito_cont h3 {
            color: #004070;
            font-weight: 800;
            font-family: 'Roboto', sans-serif;
            margin: 5px 0 5px 0 !important;
            font-size: 13px;
        }
        .credito_cont p {
            font-size: 10px;
            margin-bottom: 0;
        }
        .credito_cont b {
            color: #004070;
            font-weight: 800;
        }
    </style>

    <div class="">
        <form>
            <div class="logo_top_container">
                <img class="bgform" src="{{ public_path('img/pdf/header.png') }}">
            </div>

            <div class="container-fluid">
                <div class="row" style="background: red">
                    <div class="col-2" style="background: rgb(0, 255, 98)">
                        <label for="Tutulo"></label>
                    </div>
                    
                    <div class="col-2" style="background: rgb(109, 26, 224)">
                        
                    </div>

                    <div class="col-2" style="background: rgb(180, 17, 125)">

                    </div>
                </div>
            </div>

            <div class="credito_cont">
                <h3>
                    CONDICIONES DEL CREDITO
                </h3>
                
                <p>
                    <b>1. </b> Realizar sus pagos solo en agentes de los bancos indicados, puede hacer sus pagos en agentes, cajeros deposito, transferencia de cuenta a cuenta y por internet o banca personal.
                </p>
                
                <p>
                    <b>2. </b> Esta prohibido pagar en la oficina del mismo banco, el cobro adicional por movimiento del banco es de S/9.00 soles, prohibido hacer sus pagos fuera de Lima, el cobro adicional por giro del banco es de S/7.50 soles.
                </p>
                
                <p>
                    <b>3. </b> El pago de la cuota no incluye la comisión cobrada por el banco, es decir son pagos diferentes, para no generar por parte de la entidad bancaria, respetemos los párrafos 1 y 2. conserve su voucher por seguridad.
                </p>
                
                <p>
                    <b>4. </b> Confirmar su deposito mediante la fotografía de su voucher vía WHATSAPP, 1ero  deberá escribir su nombre y sus apellidos en la parte superior del voucher sin tapar las letras impresas del mismo voucher.
                </p>
                
                <p class="fondo_credito">
                    <b>5. </b> Evite interés moratorio, el pago de las cuotas realizadas después del día de vencimiento, se le cobrara EL PAGO DE S/4.00 SOLES ADICIONALES POR CADA DIA DE ATRASO.
                </p>
            </div>

            <div class="logo_foot_container">
                <a href="https://wa.me/51999654321" target="_BLANK" >
                    <img class="bgform" src="{{ public_path('img/pdf/footer.png') }}">
                </a>
            </div>
                
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.6.3/js/bootstrap-select.min.js"></script>
</body>
</html>

