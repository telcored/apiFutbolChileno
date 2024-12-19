<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <title>Toneo nacional - temporada 2024</title>
</head>

<body>


    <?php require_once "fechaActualEspanol.php";?>

    <br>
    <br>
    <hr>



    <?php

    function datos()
    {



        // Especificamos la ruta del archivo JSON en la carpeta 'jsonDiarios'
        $folder = 'jsonDiarios';
        $dia = date('d');

        $filename = $folder . '/libertadores_' . ($dia - 1) . '.json'; // Archivo con la fecha actual

        // Verificamos si el archivo existe
        if (file_exists($filename)) {
            // Cargamos el contenido del archivo JSON
            $jsonContent = file_get_contents($filename);

            // Decodificamos el JSON en un array de PHP
            $data = json_decode($jsonContent, true);
            return $data;
        } else {
            // Si el archivo no existe, mostramos un mensaje de error
            echo "El archivo $filename no existe.";
        }
    }; 
    ?>

    <!--GRUPO A-->

    <?php echo "<p>" . datos()['response'][0]['league']['standings'][0][0]['group'] . "</p>"; ?>

    <table class="table table-dark table-striped table-hover  table-sm table-responsive">

        <thead>
            <tr>
                <th style='text-align:center'>Posicion</th>
                <th></th>
                <th>Club</th>
                <th>Puntos</th>
                <th>PJ</th>
                <th>PG</th>
                <th>PE</th>
                <th>PP</th>
                <th>GF</th>
                <th>GC</th>
                <th>DIF</th>
            </tr>

        </thead>

        <tbody>



            <?php
        
                     
                for ($i=0 ; $i<=3; $i++){
                    $rutaLogo= datos()['response'][0]['league']['standings'][0][$i]['team']['logo']; 

                    echo "<tr> <td style='text-align:center'>". datos()['response'][0]['league']['standings'][0][$i]['rank'] 
                    ."<td style='width:90px;'>". "<img src='$rutaLogo' style='width:50px;' >" ."</td>" 
                    ."<td>". datos()['response'][0]['league']['standings'][0][$i]['team']['name']."</td>"
                    ."<td>". datos()['response'][0]['league']['standings'][0][$i]['points'] ."</td>"  
                     ."<td>". datos()['response'][0]['league']['standings'][0][$i]['all']['played'] ."</td>" 
                    ."<td>". datos()['response'][0]['league']['standings'][0][$i]['all']['win'] ."</td>"
                    ."<td>". datos()['response'][0]['league']['standings'][0][$i]['all']['draw'] ."</td>"  
                    ."<td>". datos()['response'][0]['league']['standings'][0][$i]['all']['lose']."</td>"  
                    ."<td>". datos()['response'][0]['league']['standings'][0][$i]['all']['goals']['for'] ."</td>"
                    ."<td>". datos()['response'][0]['league']['standings'][0][$i]['all']['goals']['against'] ."</td>" 
                    ."<td>". (datos()['response'][0]['league']['standings'][0][$i]['all']['goals']['for'])-(datos()['response'][0]['league']['standings'][0][$i]['all']['goals']['against']) ."</td>" 

                    . "</td> </tr>";
                }
                    
            


            ?>
        </tbody>

    </table>



     <!--GRUPO B-->

     <?php echo "<p>" . datos()['response'][0]['league']['standings'][1][0]['group'] . "</p>"; ?>

<table class="table table-dark table-striped table-hover  table-sm table-responsive">

    <thead>
        <tr>
            <th style='text-align:center'>Posicion</th>
            <th></th>
            <th>Club</th>
            <th>Puntos</th>
            <th>PJ</th>
            <th>PG</th>
            <th>PE</th>
            <th>PP</th>
            <th>GF</th>
            <th>GC</th>
            <th>DIF</th>
        </tr>

    </thead>

    <tbody>



        <?php
        // Especificamos la ruta del archivo JSON en la carpeta 'jsonDiarios'
        $folder = 'jsonDiarios';
        $dia = date('d');

        $filename = $folder . '/libertadores_' . ($dia - 1) . '.json'; // Archivo con la fecha actual

        // Verificamos si el archivo existe
        if (file_exists($filename)) {
            // Cargamos el contenido del archivo JSON
            $jsonContent = file_get_contents($filename);

            // Decodificamos el JSON en un array de PHP
            $data = json_decode($jsonContent, true);

            // Mostrar el contenido del archivo 
                 
            for ($i=0 ; $i<=3; $i++){
                $rutaLogo= datos()['response'][0]['league']['standings'][1][$i]['team']['logo'] ; 

                echo "<tr> <td style='text-align:center'>". datos()['response'][0]['league']['standings'][0][$i]['rank'] 
                ."<td style='width:90px;'>". "<img src='$rutaLogo' style='width:50px;' >" ."</td>" 
                ."<td>". datos()['response'][0]['league']['standings'][$i][$i]['team']['name']."</td>"
                ."<td>". datos()['response'][0]['league']['standings'][0][$i]['points'] ."</td>"  
                 ."<td>". datos()['response'][0]['league']['standings'][0][$i]['all']['played'] ."</td>" 
                ."<td>". datos()['response'][0]['league']['standings'][0][$i]['all']['win'] ."</td>"
                ."<td>". datos()['response'][0]['league']['standings'][0][$i]['all']['draw'] ."</td>"  
                ."<td>". datos()['response'][0]['league']['standings'][0][$i]['all']['lose']."</td>"  
                ."<td>". datos()['response'][0]['league']['standings'][0][$i]['all']['goals']['for'] ."</td>"
                ."<td>". datos()['response'][0]['league']['standings'][0][$i]['all']['goals']['against'] ."</td>" 
                ."<td>". (datos()['response'][0]['league']['standings'][0][$i]['all']['goals']['for'])-(datos()['response'][0]['league']['standings'][0][$i]['all']['goals']['against']) ."</td>" 
               
                
                
                . "</td> </tr>";
            }
                
        } else {
            // Si el archivo no existe, mostramos un mensaje de error
            echo "El archivo $filename no existe.";
        }


        ?>
    </tbody>

</table>






    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>

</html>