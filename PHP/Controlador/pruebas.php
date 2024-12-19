<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <title>Toneo nacional - temporada 2024</title>
</head>

<body>


    <?php 


    require_once "fechaActualEspanol.php";

    ?>

<br><br><hr>

    <table class="table table-dark table-striped table-hover  table-sm table-responsive" >

        <thead >
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
            $dia = date('d') ;

            $filename = $folder . '/ranking_' . ($dia -1). '.json'; // Archivo con la fecha actual

            // Verificamos si el archivo existe
            if (file_exists($filename)) {
                // Cargamos el contenido del archivo JSON
                $jsonContent = file_get_contents($filename);

                // Decodificamos el JSON en un array de PHP
                $data = json_decode($jsonContent, true);

                // Mostrar el contenido del archivo (por ejemplo, el ranking)

                /*
                        echo '<pre>';
                        print_r($data);
                        echo '</pre>';
                        */
                

               

                
                     
                for ($i=0 ; $i<=15; $i++){
                    $rutaLogo= $data[$i]['team']['logo']; 
                    echo "<tr> <td style='text-align:center'>". $data[$i]['rank'] 
                    ."<td style='width:90px;'>". "<img src='$rutaLogo' style='width:50px;' >" ."</td>" 
                    ."<td>".$data[$i]['team']['name'] ."</td>"
                    ."<td>".$data[$i]['points'] ."</td>"  
                    ."<td>".$data[$i]['all']['played'] ."</td>" 
                    ."<td>".$data[$i]['all']['win'] ."</td>"
                    ."<td>".$data[$i]['all']['draw'] ."</td>"  
                    ."<td>".$data[$i]['all']['lose'] ."</td>"  
                    ."<td>".$data[$i]['all']['goals']['for'] ."</td>"
                    ."<td>".$data[$i]['all']['goals']['against'] ."</td>" 
                    ."<td>". ($data[$i]['all']['goals']['for'])-($data[$i]['all']['goals']['against']) ."</td>" 
                   
                    
                    
                    . "</td> </tr>";
                }
                        


            } else {
                // Si el archivo no existe, mostramos un mensaje de error
                echo "El archivo $filename no existe.";
            }


            ?>






        </tbody>


        <tfoot>

        </tfoot>


    </table>




  


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>

</html>