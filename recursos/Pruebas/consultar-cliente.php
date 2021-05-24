<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Consultar Usuario</title>
  <link rel="stylesheet" href="../../view/assets/clnt/css/jquery.flexdatalist.min.css">
</head>
<body>
  <form action="#">
  <input type='text'
       placeholder='Write your country name'
       class='my-flexdatalist'
       data-url='consultar-cliente-data.php'
       data-search-in='nombre'
       data-search-by-word='true'
       data-visible-properties='["nombre","id_tipo_pago","ID"]'
       data-value-property='*'
       data-min-length='1'
       name='country_multiple_by_word_id'>
     <p class="input-value text-muted"><small>Value</small> <span><code></code></span></p>
  </form>
  <script src="../../public/dataTables/js/jquery-3.3.1.js"></script>
  <script src="../../view/assets/clnt/js/jquery.flexdatalist.min.js"></script>
  <script>
    $('.my-flexdatalist').flexdatalist({
      minLength: 1,
      valueProperty: '*',
      searchIn: 'nombre',
      textProperty: 'nombre',
      url: 'consultar-cliente-data.php'
    });

    $('input.flexdatalist').on('select:flexdatalist', function(event, set, options) {
        console.log(set.ID + "\n");
        console.log(set.nombre);
    });
  </script>
</body>
</html>