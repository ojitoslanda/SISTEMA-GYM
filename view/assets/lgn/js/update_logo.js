let cod = "1";
$(document).ready(function() {
        $.ajax({
        url: '../controller/login/consultar_img_login.php',
        type: 'POST',
        data: {
            id:cod
            }
        }).done(
                function (respuestaServidor)
                {
                $('#cpanel_login').html(respuestaServidor);
                }         
            );
});


  
