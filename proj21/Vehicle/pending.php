

<?php include "../common/session.php" ?>
<!DOCTYPE html>
<html lang="en">

    <meta charset="UTF-8">



<head>


    <?php include "../common/comHeader.html" ?>
    
    <link rel="stylesheet" type="text/css" href="../common/datatables.min.css"/>

<script type="text/javascript" src="../common/datatables.min.js"></script>
    
    <script src="./scripts/pending.js" type="text/javascript"></script>
</head>


<body>

<?php include "../common/nav.html" ?>
<?php include "../common/comSidebar.html" ?>
<?php include "../common/Modal.html" ?>




<div id="mainContent">
      <h2 class="mt-5">Approve</h2>
      
      <table class="table table-hover " style=" border: 1px" id="tableData">
        <thead>
          <tr>
            <th>Vehicle Number</th>
            <th>Vehicle Type</th>
            <th>Approve?</th>
            
          
          </tr>
        </thead>
        <tbody id="table">


        </tbody>
      </table>
      <hr/>



      <div class="row" >
      
      <Label class="control-label"><b>Approve?</b><label>

      <div style="margin-left:30px;">
<div class="form-check form-check-inline">

  <input class="form-check-input" type="radio"  name="exampleRadios" id="inlineCheckbox1"   autocomplete="off" value="1" required>
  <label class="form-check-label" for="inlineCheckbox1">Yes</label>
</div>
<div class="form-check form-check-inline">
  <input class="form-check-input" type="radio"  name="exampleRadios" id="inlineCheckbox2"  autocomplete="off" value="0" required>
  <label class="form-check-label" for="inlineCheckbox1">Cancel</label>

    </div>
    </div>
    </div>

    <div class="container" style="margin-top:25px;">
<div class="row">
    <div class="col-sm-1 ">
    <button id="submit_btn" name="submit_btn"  type="submit"  class="btn btn-success">Submit</button>

    </div>
    <div class="col-sm-1">
    
<button id="backbtn" reset class="btn btn-secondary" onclick="location.reload(); return false;">Cancel</button>
    </div>

</div>




    </div>
    <?php include "../common/comScript.html" ?>


</body>
</html>