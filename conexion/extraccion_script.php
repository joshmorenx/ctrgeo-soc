<!DOCTYPE html>  
     <html>  
          <head>  
               <title>TESTEO DE CONEXION Y EXTRACCION DE DATOS</title>  
          </head>  
          <body>  
               <?php   
                    $connect = mysqli_connect("localhost", "root", "", "pruebas");  
                    $sql = "SELECT * FROM posts";  
                    $result = mysqli_query($connect, $sql);  
                    $json_array = array();  
                    while($row = mysqli_fetch_assoc($result))  
                    {  
                         $json_array[] = $row;  
                    }  
                    /*echo '<pre>';  
                    print_r(json_encode($json_array));  
                    echo '</pre>';*/  
                    echo json_encode($json_array);
                    $json_string = json_encode($json_array);
                    $file = 'extraccion_datos.json';
                    file_put_contents($file, $json_string);
               ?>  
          </body>  
     </html>