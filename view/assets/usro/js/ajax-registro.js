//No esta en funcionamiento

  function consultaUser(usuario)
    {
        $.ajax({
            url:'../controller/usuario/buscar-usuario.php',
            type: 'POST',
            data: {user:usuario},
            success: function() {
                $("#resultado").html("<img src='usuarios/assets/img/carga.gif'>");
            }
                  //alias:nombre
          }).done(function(respuesta){
            $('#resultado').html(respuesta);

            console.log(respuesta);
        });
    }