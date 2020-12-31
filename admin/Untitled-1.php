<!-- 
include 'Database.php';
$db = new Database(); -->

<?php

include "AddProductAction.php";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <style>
        .badge{
            font-size: 18px;
            color: rgb(71, 167, 212);
        }
      
        .container-lg{
        margin-top: 7rem;
        }
    
        td{
            font-weight: bold;
        }
        .FIcon{
            color: red;
        }
        .SIcon{
        color: rgb(236, 98, 34);
        }
    </style>
</head>
<body>


<div class="container">
  <h1 class="display-4 text-center mb-4">Bootstrap Modals</h1>
  
  <div class="row mb-4">
    <div class="col text-center">
      <h3>The Basic Modal</h3>
      <a href="#" class="btn btn-lg btn-success" data-toggle="modal" data-target="#basicModal">Click to open Modal</a>
    </div>
  </div>
  
  <div class="row mb-4">
    <div class="col text-center">
      <h3>The Large Modal</h3>
      <a href="#" class="btn btn-lg btn-primary" data-toggle="modal" data-target="#largeModal">Click to open Modal</a>
    </div>
  </div>
  
  <div class="row">
    <div class="col text-center">
      <h3>The Small Modal</h3>
      <a href="#" class="btn btn-lg btn-danger" data-toggle="modal" data-target="#smallModal">Click to open Modal</a>
    </div>
  </div>
</div>

<!-- basic modal -->
<div class="modal fade" id="basicModal" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="myModalLabel">Basic Modal</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <h3>Modal Body</h3>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>

<!-- large modal -->
<div class="modal fade" id="largeModal" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="myModalLabel">Large Modal</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <h3>Modal Body</h3>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>

<!-- small modal -->
<div class="modal fade" id="smallModal" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="myModalLabel">Small Modal</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <h3>Modal Body</h3>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
    <script  src="../js/jquery.js"></script>
    <script src='../js/bootstrap.bundle.min.js'></script>

</body>
</html>

