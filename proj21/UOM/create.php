<?php include "../common/session.php" ?>


<!DOCTYPE html>
<html lang="en">

    <meta charset="UTF-8">



<head>


    <?php include "../common/comHeader.html" ?>
    

    <script src="./scripts/create.js" type="text/javascript"></script>

</head>


<body>

<?php include "../common/nav.html" ?>
<?php include "../common/comSidebar.html" ?>

<?php include "../common/modal.html" ?>


<div id="mainContent">

            <h2 class="mt-5">Insert data</h2>


            <form class="was-validated" id="form1">
<div class="form-group row">
        
                    <label  for="UomCode" class="col-sm-2 col-form-label">Unit of Measure</label>
                    <div class="col-sm-10">
                    <input type="text" id="UomCode" class="form-control"   maxlength="5" required />
            
    <div class="invalid-feedback">Please enter Uom Code.</div>
                    </div>
                
</div>

<div class="form-group row" style="margin-top:5px;">
                <label  for="title" class="col-sm-2 col-form-label">UOM Desc</label>
                <div class="col-sm-10">
                    <input type="text" id="UOMDesc" class="form-control"  maxlength="25" required/>
                    <div class="invalid-feedback">Please enter Uom description.</div>
                    </div>
</div>
<div class="form-group row"  style="margin-top:5px;">
                    

<label  for="title" class="col-sm-2 col-form-label">Round?</label>
<div class="col-sm-10">
    

                    <input class="form-check-input" type="checkbox"  id="Round" >
                    
                    </div>
</div>

<div class="form-group row"  style="margin-top:5px;">
                <label  for="title" class="col-sm-2 col-form-label">Round Upto</label>
                    <div class="col-sm-10">
                    <input type="number" min="1" max="5" id="RoundUpto"  disabled  class="form-control" data-error="Please enter Item Type." />
                
                    </div>

                </div>





                <div class="container" style="margin-top:25px;">
  <div class="row">
    <div class="col-sm-3 ">
    <button id="submit_btn" name="submit_btn"  type="submit"  class="btn btn-success">Submit</button>

    </div>
    <div class="col-sm-3">
    
<button id="backbtn" reset class="btn btn-secondary" onclick="window.location.href='view.php'; return false;">Go Back</button>
    </div>

</div>


            </form>




        </div>
</div>

<?php include "../common/comScript.html" ?>





</body>

</html>