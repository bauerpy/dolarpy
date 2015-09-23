# dolarpy
Bot de telegram para obtener la cotización del dolar actualizado en Paraguay.

Utiliza la api de dolarpy http://dolar.melizeche.com/api/1.0/ creada por melizeche.


## Registrar el bot con la ayuda de @BotFather
* Utilizando algún cliente de mensajería telegram, buscamos a @BotFather y establecemos un nuevo chat con el.
* Una vez visto el listado de comandos proporcionados, enviamos /newbot
* Nos pide el nombre para el nuevo bot, debemos responder con el nombre con el cual queremos que se visualice el bot. Ej. DolarPy
* Y por último escribir el identificador del bot. Ej. dolarpybot (tiene que terminar con la palabra bot). Si el identificador ya esta registrado tendremos que buscar otro. En este punto el bot nos devuelve el token para utilizar con la API
* Existen otras configuraciones como descripción, about, etc. pero  no son obligatorios.
* Fijar los comandos que aceptara el bot con /setcommands

## Crear un demonio que reciba y conteste los mensajes con php
* Descargar el código fuente de github
* Configurar el token en el archivo dolarpy.php
* Dar permiso de escritura al archivo offset
* Ejecutar el demonio desde el CLI: php dolarpy.php

