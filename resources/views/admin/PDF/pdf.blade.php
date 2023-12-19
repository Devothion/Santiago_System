<!DOCTYPE html>
<html lang="en">
<head>

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;400;600&family=Roboto:wght@400;700&display=swap" rel="stylesheet"  media="print">
    {{-- <link rel="stylesheet" href="{{ public_path('css/bootstrap/bootstrap.min.css') }}"> --}}
    
    <title>Calculo de Solicitud - APP</title>

</head>
<body>

    <style>
        *{
            margin: 0;
            padding: 0;
        }
        .simulador {
            padding: 0;
            width: 100%;
        }
        .simulador form {
            padding: 0;
            border-radius: 0;
            margin-top: 0;
            margin-bottom: 0;
        }

        .simulador{
            width: 80px;
            margin: auto;
            display: block;
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

        .row {
            margin-right: -15px;
            margin-left: -15px;
        }

        .row:before {
            display: table;
            content: " ";
        }

        .col {
            padding: 0;
            float: left;
            position: relative;
            min-height: 1px;
        }

        .col1 {
            width: 8.33333333%;
        }
        .col2 {
            width: 16.66666667%;
        }
        .col3 {
            width: 16.66666667%;
        }
        .col4 {
            width: 16.66666667%;
        }
        .col5 {
            width: 16.66666667%;
        }
        .col6 {
            width: 25%;
        }

        .cuadra .form-group {
            margin-bottom: 5px;
        }

        .cuadro_a {
            background: #004070;
            color: #fff;
            text-align: center;
            border-bottom-left-radius: 10px;
            font-size: 25px;
            padding: 9px 0;
            font-weight: bold;
        }
        .cuadro_b {
            background: #004070;
            color: #fff;
            text-align: center;
            font-weight: bold;
            margin: 0 5px;
            padding: 5px 0px;
            font-size: 14px;
        }
        .cuadro_c {
            background: #d2d3d5;
            color: #000;
            text-align: center;
            font-weight: bold;
            margin: 0 5px;
            padding: 3px 0px;
            font-size: 14px;
        }
        .cuadro_d {
            background: #d2d3d5;
            color: #000;
            text-align: center;
            font-size: 25px;
            padding: 9px 0;
            font-weight: bold;
        }
        .label_c {
            padding-left: 10px;
        }
        .label_c label {
            font-size: 11px;
            margin-bottom: 0;
        }
        .label_c input {
            background-color: #fff;
            background-image: none;
            border: 1px solid #ccc;
            display: inline-block;
            width: 28%;
            height: 20px;
            margin: 0;
        }
        .l2 {
            padding-left: 0; 
        }
        .fechc {
            font-size: 11px;
            border: 1px solid #d2d3d5;
            border-radius: 5px;
            margin: 0 5px 5px 10px;
            padding: 4px 9px;
            color: #000;
        }
        .fechc span {
            color: #004070;
            font-weight: 800;
            font-size: 11px;
        }
        .simulador .content_simulador {
            padding: 20px 40px;
        }

    </style>

    <div class="">
        <form>
            <div class="logo_top_container">
                <img class="bgform" src="{{ public_path('img/pdf/header.png') }}">
            </div>

            <div class="">
                <div class="row">
                    <div class="col col1">
                        <div class="cuadro_a cuadra">
                            5
                        </div>
                    </div>
                    
                    <div class="col col2">
                        <div class="cuadro_b cuadra">
                            GB156
                        </div>

                        <div class="cuadro_c cuadra">
                            GB156
                        </div>
                    </div>

                    <div class="col col3">
                        <div class="label_c cuadra">
                            <div class="form-group">
                                <label>
                                    <span>NUEVO</span>
                                </label>
                            </div>
                            
                            <div class="form-group">
                                <label>
                                    <span>RENOV</span>
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="col col4">
                        <div class="label_c l2 cuadra">
                            <div class="form-group">
                                <label>
                                    <span>EFECTIVO</span>
                                </label>
                            </div>
                            
                            <div class="form-group">
                                <label>
                                    <span>TRANF. BANC</span>
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="col col5">
                        <div class="cuadro_d cuadra">
                            Julio Cesar
                        </div>
                    </div>
                    
                    <div class="col col6">
                        <div class="fechc cuadra">
                            F. Entr. <span>10/11/2023<span>
                        </div>

                        <div class="fechc cuadra">
                            F. Vcto. <span>
                                28/10/2023
                            <span>
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

            </div>



            <div class="logo_foot_container">
                <a href="https://wa.me/51999654321" target="_BLANK" >
                    <img class="bgform" src="{{ public_path('img/pdf/footer.png') }}">
                </a>
            </div>
                
        </form>
    </div>
    {{-- <script src="{{ public_path('js/bootstrap/bootstrap.min.js') }}"></script> --}}
</body>
</html>

