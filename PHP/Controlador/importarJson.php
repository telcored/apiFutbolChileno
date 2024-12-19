<?php

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://v3.football.api-sports.io/standings?league=265&season=2024',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'GET',
  CURLOPT_HTTPHEADER => array(
    'x-rapidapi-key: a1212389ecfd9bbe3eb0b98c4fada740',
    'x-rapidapi-host: v3.football.api-sports.io'
  ),
));

$response = curl_exec($curl);

curl_close($curl);



//Variable $datos y $ranking, master Json

$datos = json_decode($response,true);
$ranking = $datos['response'][0]['league']['standings'][0];





echo "<pre>";
//echo var_export($response);
echo var_export($ranking);

echo "</pre>";



// Especificamos la ruta de la carpeta y el nombre del archivo
$folder = 'jsonDiarios'; // Carpeta donde se guardarán los archivos
$filename = $folder . '/ranking_' . date('d') . '.json'; // Archivo con la fecha actual

// Convertimos la variable a JSON
$jsonData = json_encode($ranking, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);

// Guardamos el archivo JSON en la carpeta 'jsonDiarios'
if (!file_exists($folder)) {
    // Si la carpeta no existe, la creamos
    mkdir($folder, 0777, true);
}

file_put_contents($filename, $jsonData);

echo "Archivo JSON guardado correctamente en $filename";
?>
