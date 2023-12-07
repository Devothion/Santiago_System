<?php 

function pago($tasa, $nper, $va) {
    $tasa = $tasa / 100;
    return ($va * $tasa) / (1 - pow(1 + $tasa, -$nper));
}

function porcentaje($porcentaje) {
    return ($porcentaje) / 100;
}

function realizar_calculo($pres, $sem) {
    $prestamo = $pres;
    $semanas = $sem;

    $tasa_semanal = 1.31;
    $tasa_semanal_porcentaje = porcentaje(1.31);

    switch ($semanas) {
        case 20:
            $tasa_interes = 1.28;
            break;
        case 18:
            $tasa_interes = 1.27;
            break;
        case 15:
            $tasa_interes = 1.25;
            break;
        case 12:
            $tasa_interes = 1.04;
            break;
        default:
            echo "No reconozco esos numeros";
            die();
            break;
    }

    $tasa_interes_semanal = round((pow(1+$tasa_interes,1/$semanas)-1)*100, 2);
    $tasa_interes_semanal_porcetaje = porcentaje($tasa_interes_semanal);

    $total_total = $prestamo*(1+$tasa_interes_semanal_porcetaje);

    $com_porcentaje = $tasa_interes_semanal_porcetaje - $tasa_semanal_porcentaje;
    $com = $tasa_interes_semanal - $tasa_semanal;

    $valor_cuota_correcto = number_format(round(pago($tasa_interes_semanal, $semanas, $prestamo), 2), 2);

    $interes = round(($prestamo*$tasa_semanal_porcentaje)/1.18, 2);
    $comision = round(($prestamo*$com_porcentaje)/1.18, 2);
    $igv = round(($interes+$comision)*0.18, 2);

    $pago_capital = $valor_cuota_correcto-$interes-$comision-$igv;

    $saldo_capital = round($prestamo-$pago_capital);

    return [
        'prestamo' => $prestamo,
        'semanas' => $semanas,
        'tasa_semanal' => $tasa_semanal,
        'tasa_semanal_porcentaje' => $tasa_semanal_porcentaje,
        'tasa_interes' => $tasa_interes,
        'tasa_interes_semanal' => $tasa_interes_semanal,
        'tasa_interes_semanal_porcetaje' => $tasa_interes_semanal_porcetaje,
        'com_porcentaje' => $com_porcentaje,
        'com' => $com,
        'valor_cuota_correcto' => $valor_cuota_correcto,
        'interes' => $interes,
        'comision' => $comision,
        'igv' => $igv,
        'pago_capital' => $pago_capital,
        'saldo_capital' => $saldo_capital
    ];
}

?>