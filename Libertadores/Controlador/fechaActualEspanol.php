<?php



// Crear un objeto DateTime con la fecha actual
$fecha = new DateTime();

// le resto un dia para quedar en hoy

$fechaCorregida = $fecha->modify('-1 day');



// Arreglo de traducción de inglés a español los dias
$dia_en_ingles = $fechaCorregida->format('l');
$dias_en_espanol = [
    'Monday'    => 'Lunes',
    'Tuesday'   => 'Martes',
    'Wednesday' => 'Miércoles',
    'Thursday'  => 'Jueves',
    'Friday'    => 'Viernes',
    'Saturday'  => 'Sábado',
    'Sunday'    => 'Domingo'
];




// Arreglo de traducción de inglés a español los meses

$mes = date("F");
$meses_en_espanol = [
    'January'    => 'Enero',
    'February'   => 'Febrero',
    'March' => 'Marzo',
    'April'  => 'Abril',
    'May'    => 'Mayo',
    'June'  => 'Junio',
    'July'    => 'Julio',
    'August'   => 'Agosto',
    'September' => 'Septiembre',
    'October' =>    'Octubre',
    'November ' =>  'Noviembre',
    'December'  =>  'Diciembre'
];

// Mostrar el día en español
echo "<h1>";

echo "Tabla de posiciones hoy ".$dias_en_espanol[$dia_en_ingles]." ".(date('d')-1)." de ".$meses_en_espanol[$mes]." ".date('Y');
echo "</h1>";
?>



