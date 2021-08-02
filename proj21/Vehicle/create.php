

<?php include "../common/session.php" ?>

<!DOCTYPE html>
<html lang="en">

    <meta charset="UTF-8">



<head>


    <?php include "../common/comHeader.html" ?>
    

    <script src="./scripts/create.js" type="text/javascript"></script>

</head>
<style>
#loadingDiv{
    position: fixed;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
}
</style>

<body>

<?php include "../common/nav.html" ?>
<?php include "../common/comSidebar.html" ?>

<?php include "../common/modal.html" ?>
<?php include "../common/confModal.html" ?>



<div id="mainContent">

            <h2 id="headtitle" class="mt-5">Insert data</h2>


            <form class="was-validated" id="form2">
<div class="form-group row">
        
                    <label  for="VNumber" class="col-sm-2 col-form-label">Vehicle Number</label>
                    <div class="col-sm-10">
                    <input type="text" id="VNumber" name="VNumber" class="form-control"   maxlength="20" required />
                    <button type="button" style ="display: none;" name="delete" disabled id="delbtn" value="" class="btn btn-danger btn-xs delete" onclick="deleteRecord()" >
<i class="fa fa-trash"></i>        
    <div class="invalid-feedback">Please enter Vehicle Number.</div>
    
                    </div>
                
</div>

<div class="form-group row" style="margin-top:5px;">
                <label  for="VehicleType" id="VTypeLabelID" class="col-sm-2 col-form-label">Vehicle Type</label>
                <div class="col-sm-10">
                
                    <select id="VehicleTypeID"  name ="VehicleTypeID" class="form-control"  required name="">
</select>

                    <div class="invalid-feedback">Please Select Vehicle Type.</div>
                    </div>
</div>

<div class="form-group row" style="margin-top:10px; display: none;" id="statuschk" >

                <div class="col col-lg-2">
                
                <input class="form-check-input" type="checkbox" value="" id="pendingchk"disabled >
  <label class="form-check-label" for="pendingchk">
    Pending
  </label>
  </div>  <div class="col col-lg-2">
  <input class="form-check-input" type="checkbox" value="" id="approvedchk" disabled >
  <label class="form-check-label" for="approvedchk">
    Approved
  </label></div>  <div class="col col-lg-2">
  <input class="form-check-input" type="checkbox" value="" id="canceledchk" disabled>
  <label class="form-check-label" for="canceledchk">
    Canceled
  </label>
                    </div>
</div>


                <div class="container" style="margin-top:25px;">
<div class="row">
    <div class="col-sm-3 ">
    <button id="submit_btn" name="submit_btn"  type="submit"  class="btn btn-success">Submit</button>

    </div>
    <div class="col-sm-3">
    
    <button id="backbtn" reset class="btn btn-secondary" onclick="window.location.href='./view.php'; return false;">Go Back</button>
    </div>

</div>


            </form>
            <div id="loadingDiv" class="spinner-grow text-info" role="status">
<span class="sr-only">Loading...</span>
</div>




        </div>
</div>

<?php include "../common/comScript.html" ?>



</body>

</html>