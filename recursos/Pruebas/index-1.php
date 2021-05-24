<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
</head>
<body>

<div class="selector-pais">
     Elige un país
     <select></select>
</div>
          <script type="text/javascript">
                $(document).ready(function() {
                    $.ajax({
                            type: "POST",
                            url: "get_tipo_pago.php",
                            success: function(response)
                            {
                                $('.selector-pais select').html(response).fadeIn();
                            }
                    });

                });
            </script>
</body>
</html>