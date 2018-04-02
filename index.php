<?php
require_once('controller/PolicyController.php');
$controller = new PolicyController(); 
?>
<!DOCTYPE html>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <script src="js/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/script.js"></script>
</head>
<body>

<nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">INSLY Developer Test</a>
    </div>
    <!-- <ul class="nav navbar-nav">
      <li class="active"><a href="#">Home</a></li>
      <li><a href="#">Page 1</a></li>
      <li><a href="#">Page 2</a></li>
      <li><a href="#">Page 3</a></li>
    </ul> -->
  </div>
</nav>

<div class="container-fluid">
  <h2>Policy Calculator</h2>
                                         
  
  <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">New Data</button>
  <div id="result">
The computed result will be dsiplayed below
</div>


<!-- Modal -->
<form name="frm">
<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Calculate New Policy</h4>
        </div>
        <div class="modal-body">

        <div class="form-group">
            <label for="carvalue">Car Value:</label>
            <input type="text" class="form-control" id="carvalue" name="carvalue" required>
        </div>

        <div class="form-group">
            <label for="tax">Tax(%):</label>
            <input type="text" class="form-control" id="tax" name="tax" required>
        </div>

         <div class="form-group">
            <label for="installments">Installments:</label>
            <input type="text" class="form-control" id="installments" name="installments" required>
        </div>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-primary" onclick="calculate()">Compute Policy</button>
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>

</form>

</div>




</body>
</html>