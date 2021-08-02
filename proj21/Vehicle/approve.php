


<?php include "../common/session.php" ?>


<!DOCTYPE html>
<html lang="en">

    <meta charset="UTF-8">



<head>


    <?php include "../common/comHeader.html" ?>
    
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.10.23/datatables.min.css"/>

    <script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.10.23/datatables.min.js"></script>
    
    <script src="./scripts/pending.js" type="text/javascript"></script>
</head>


<body>

<?php include "../common/nav.html" ?>
<?php include "../common/comSidebar.html" ?>




<div id="mainContent">
      <h2 class="mt-5">Vehicle</h2>
      
      <table class="table table-hover " style=" border: 1px" id="tableData">
        <thead>
          <tr>
            <th>Vehicle Number</th>
            <th>Vehicle Type</th>
            <th>Approved?</th>
            
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