<?php
       // Declaramos que la hora de envío de comentario se ponga en la hora de España
       date_default_timezone_set('America/Lima');
       // Declaramos las variables para guardar la fecha y hora de envío del comentario
       $fecha=date("Y/n/d");
       $hora=date("H:i:s");
       $total = strip_tags($_POST['ctotal']);
       // Hacemos la validación de los campos aquí, para que si entran en este archivo no manden un comentario en blanco
        if (empty($total))
        {
          echo "¡Tienes que completar todos los campos!";
        }else{}
          # Revisamos si existe la cookie "MiCookie"
          if(isset($_COOKIE["MiCookie"]))
          {
              # Leemos el contenido de la cookie (json) y lo pasamos a array
              $cookie = json_decode($_COOKIE["MiCookie"]);
              # Leemos los valores del array
              $caducidad = $cookie->caducidad;
              $data = $cookie->data;
            //  echo "El contenido de la cookie es: <strong>".$data."</strong> y caduca el <strong>".date("d/m/Y H:i:s A",$caducidad)."</strong>";
          }else{
              # Creamos la cookie...

              # Creamos una variable con la fecha de caducidad de la cookie, en este caso
              # es una hora (3600 segundos)
              $caducidad = time() + 72000;

              # Creamos una segunda variable con el contenido que deseamos guardar en el array
              # en este caso, el valor 1000
              $data = "1000";

              # Definimos un array asociativo que contiene nuevos valor 1000 y la fecha
              # de caducidad de la cookie
              $cookieData = array("data" => $data, "caducidad" => $caducidad);

              # Creamos la cookie guardando en su interior un JSON con nuestra información
              setcookie( "MiCookie", json_encode($cookieData), $caducidad);
              echo "La cookie se ha creado. Actualiza la pagina para ver su contenido y caducidad";
          }

          header("Location: example_02.php");




       ?>
