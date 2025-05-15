<!-- <html>
<div class="col-md-4 ">
  <label class="control-label">Nº de Expediente</label>
  <input type="text" maxlength="16" class="form-control" name="expediente" id="expediente" pattern="[0-9.]" placeholder="Expediente" required>
</div>

</html>
<script type="text/javascript">
  function alpha(e) { var k; document.all ? k = e.key : k = e.which; return ((k > 64 && k < 91) || (k > 96 && k < 123) || k == 45 || k == 8 || k == 32 || (k >= 48 && k <= 57)); }


</script>

<script>
  
  let correo: /^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$/,
</script> -->


<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <script type="text/javascript" src="js/fw/jquery.min.js"></script>
  <script type="text/javascript" src="js/fw/jquery.mask.js"></script>
  <title></title>
  <link rel="stylesheet" href="">
</head>
<body>
<!--   <div id="input1">

    <label for="input1">qlo</label>
    <input type="text">
  </div> -->
  <div class="col-md-4 ">
  <label class="control-label">Nº de Expediente</label>
  <input type="text" maxlength="16" class="form-control" name="expediente" id="expediente" placeholder="Expediente" required>

  <input type="text">
</div>
<script type="text/javascript"> 
  $('#expediente').mask('##0.00', {reverse: true});
  document.getElementById("expediente").addEventListener("input", (e) => {
  let value = e.target.value;
/*  /^[0-9.]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$/,*/
/*  e.target.value = value.replace(/[^a-zA-ZÀ-ÿ=¡_:;,"'@$%&¿°¬*+\-?^${}()|[\]\\/g, '']/g, "");*/
  e.target.value = value.replace(/[^0-9., '']/g, "");
});

</script>

</body>
</html>