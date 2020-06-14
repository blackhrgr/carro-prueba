<!DOCTYPE html>
    <html>
    <head>
    	    <title>Agregar Compras QR</title>
    	<link rel="icon" type="image/png" href="imagenes/icono.png" />
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>


    </head>

<style>
	


body{

background-image: url(imagenes/fondo.jpg);
background-size: 100%;

}

.contenedor{

width: 60%;
background-color: #D5D5D5;
margin-top: 70px;

margin-left: 20%;
margin-right: 20%;



}

</style>


    <body>

<div class="contenedor">
<?php    
echo "<BR>";
    echo "<center><h1><font color='black' face='Algerian'>QR DE LA COMPRA ONLINE</font></h1><hr/></center>";

    $PNG_TEMP_DIR = dirname(__FILE__).DIRECTORY_SEPARATOR.'temp'.DIRECTORY_SEPARATOR;
    

    $PNG_WEB_DIR = 'temp/';

    include "qrlib.php";    

    if (!file_exists($PNG_TEMP_DIR))
        mkdir($PNG_TEMP_DIR);
    
    
    $filename = $PNG_TEMP_DIR.'test.png';
    

    $errorCorrectionLevel = 'L';
    if (isset($_REQUEST['level']) && in_array($_REQUEST['level'], array('L','M','Q','H')))
        $errorCorrectionLevel = $_REQUEST['level'];    

    $matrixPointSize = 4;
    if (isset($_REQUEST['size']))
        $matrixPointSize = min(max((int)$_REQUEST['size'], 1), 10);


    if (isset($_REQUEST['data'])) { 
    
    
        if (trim($_REQUEST['data']) == '')
            die('data cannot be empty! <a href="?">back</a>');
            
    
        $filename = $PNG_TEMP_DIR.'test'.md5($_REQUEST['data'].'|'.$errorCorrectionLevel.'|'.$matrixPointSize).'.png';
        QRcode::png($_REQUEST['data'], $filename, $errorCorrectionLevel, $matrixPointSize, 2);    
        
    }  




    echo '<center><form action="qr.php" method="post">
        <font color="black" size="5" face="Algerian">Nombre Producto:&nbsp;</font><input name="data" value="'.(isset($_REQUEST['data'])?htmlspecialchars($_REQUEST['data']):'producto').'" />&nbsp;
        <font color="black" size="5" face="Algerian">TAMAÑO:&nbsp;</font><select name="size">';
        
    for($i=1;$i<=10;$i++)
        echo '<option value="'.$i.'"'.(($matrixPointSize==$i)?' selected':'').'>'.$i.'</option>';

    echo '</select>&nbsp;<BR><BR>
        <input class="btn btn-danger" type="submit" value="Crear qr de la compra"></form> ';

        ?>

<br>
   <a href="index.php"><button class="btn btn-danger">Volver</button></a>
<br>
<br>
        <?php

    
        

    echo '<center><img src="'.$PNG_WEB_DIR.basename($filename).' " /><br><hr/></center>';  
    

echo "<center><font color='#D5D5D5'>©2018 Chiphysi programación</font></center>";

    ?>

</div>
 
    </body>
    </html>

    