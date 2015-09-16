<?php
/*
 * @autor bauerpy
 * bot telegram que consulta la cotizacion del dia de la api de melizeche http://dolar.melizeche.com/
 */

$token = "";

$apiurl = "https://api.telegram.org/bot".$token;




while(true){
    $offset = file_get_contents("offset");
    $offset = empty($offset)?0:$offset;
    $offset++;
    $mensajes_json = file_get_contents($apiurl."/getupdates?offset=".$offset);

    $mensajes = json_decode($mensajes_json, true);
    if(count($mensajes["result"])){
	$cotizacion_json = file_get_contents("http://dolar.melizeche.com/api/1.0/");
	$cotizacion = json_decode($cotizacion_json);
    }
    foreach($mensajes["result"] as $mensaje){
        $texto = $mensaje["message"]["text"];
        $chat_id = $mensaje["message"]["chat"]["id"];
        $update_id = $mensaje["update_id"];
        $respuesta = "";
        //responder
        if(substr($texto,0,11) == '/cotizacion'){
            $respuesta .= "Cambios Alberdi: \n Compra: ".$cotizacion->dolarpy->cambiosalberdi->compra." Venta: ".$cotizacion->dolarpy->cambiosalberdi->venta;
            $respuesta .= "\n\nCambios Chaco: \n Compra: ".$cotizacion->dolarpy->cambioschaco->compra." Venta: ".$cotizacion->dolarpy->cambioschaco->venta;
            $respuesta .= "\n\nMaxi Cambios: \n Compra: ".$cotizacion->dolarpy->maxicambios->compra." Venta: ".$cotizacion->dolarpy->maxicambios->venta;
        }else{
            $respuesta = "Utilice el comando /cotizacion para obtener la cotización actualizada";
        }    
        file_get_contents($apiurl."/sendmessage?chat_id=$chat_id&text=".urlencode($respuesta));
    }
    if(count($mensajes["result"])){
	    $file = fopen("offset", "w");
	    fwrite($file, $update_id);
	    fclose($file);
	    sleep(1);        
    }
}
?>
