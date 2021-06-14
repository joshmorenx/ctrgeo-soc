<div class="sarch" id="humoX">
                    <p style="background-color:#fdc473; width:30%; margin:auto;">Resultados de la busqueda</p>
                              <?php
#convierte la query en un archivo JSON
if (isset($_POST['search'])) {
	$keywords = $_POST['keywords'];
	$date1 = $_POST['date1'];
	$date2 = $_POST['date2'];
	$connect = mysqli_connect("localhost", "root", "", "dumb");
	$sql = "SELECT user_id,firstname,lastname,post.message,post.created_at FROM profile JOIN post ON post.created_by = profile.user_id WHERE post.message LIKE '%" . $keywords . "%' AND post.created_at BETWEEN '" . $date1 . "' AND '" . $date2 . "'";
	$result = mysqli_query($connect, $sql);
	$json_array = array();
	while ($row = mysqli_fetch_assoc($result)) {
		$json_array[] = $row;
	}
	/*echo "<pre>";
                                   print_r($json_array);  
                                   echo "</pre>";*/
										$json_string = json_encode($json_array);
	$file = 'extraccion_datos.json';
	file_put_contents($file, $json_string);
}
?>
                      <?php
#muestra la query en un div y la descarga de ambos archivos JSON y CSV en un div
if (isset($_POST['search'])) {                                
	$keywords = $_POST['keywords'];
	$date1 = $_POST['date1'];
	$date2 = $_POST['date2'];
	$conexion = mysqli_connect("localhost", "root", "", "dumb");
	$query = "SELECT * FROM `post` WHERE message LIKE '%" . $keywords . "%' AND created_at BETWEEN '" . $date1 . "' AND '" . $date2 . "'";
	mysqli_select_db($conexion, $query);

	$query_searched = mysqli_query($conexion, $query);

	$count_results = mysqli_num_rows($query_searched);

	if ($count_results > 0) {
		echo '<h3 style="color:gray;">Se han encontrado ' . $count_results . ' resultados.</h3>';

		echo '<ul style="background-color: #fbfd73;
                                             width: 50%;
                                             margin: auto;
                                             border-radius: 5px;
                                             text-align: left;
                                             visibility:none;">';
		while ($row_searched = mysqli_fetch_array($query_searched)) {
#se muestran los resultados
			echo $row_searched['message'] . '<br><br>';
		}
		echo '</ul>';
		echo '<br>';
#se muestran los botones de descarga
		echo '<style>
                                             a:link{background-color:black;color:white !important;}
                                             a:hover{background-color:white;color:black !important;}
											 a{display:inline-flex;}
                                        </style>
                                        <a class="desc" style="text-decoration:none; padding: 10px; border-radius: 5px;" href="extraccion_datos.json" download>Descargar JSON</a>
										<a class="desc" style="text-decoration:none; padding: 10px; border-radius: 5px;" href="data.csv" download>Descargar CSV</a>
										';
	} else {
                              //Si no hay registros encontrados
		echo '<h3 style="color:red;">Sin resultados,
                              por favor ingrese nuevamente los datos requeridos.</h3>';
	}
}
?>
<?php require 'jsonacsv.php';?>