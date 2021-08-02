
<?php include "../common/session.php" ?>

<!DOCTYPE html>
<html lang="en">

    <meta charset="UTF-8">



<head>


    <?php include "../common/comHeader.html" ?>
    
    <link rel="stylesheet" type="text/css" href="../common/datatables.min.css"/>

<script type="text/javascript" src="../common/datatables.min.js"></script>

    <script src="./scripts/view.js" type="text/javascript"></script>
</head>


<body>

<?php include "../common/nav.html" ?>
<?php include "../common/comSidebar.html" ?>

<?php include "../common/confModal.html" ?>
<?php include "../common/Modal.html" ?>


<div id="mainContent">
      <h2 class="mt-5">Vehicle Type</h2>
      
      <table class="table table-hover " style=" border: 1px" id="tableData">
        <thead>
          <tr>
            <th>Vehicle Type</th>
            <th>Description</th>
            <th>Max Volume</th>
            <th>Max Weight</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody id="table">


        </tbody>
      </table>


  

<div class="fab" onclick="location.href='./create.php'"> + </div>


    </div>



    <?php include "../common/comScript.html" ?>


</body>
</html>