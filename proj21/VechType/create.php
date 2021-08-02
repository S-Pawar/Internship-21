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


<div id="mainContent">

            <h2 id="headtitle" class="mt-5">Insert data</h2>


            <form class="was-validated" id="form2">
<div class="form-group row">
        
                    <label  for="VehicleType" class="col-sm-2 col-form-label">Vehicle Type</label>
                    <div class="col-sm-10">
                    <input type="text" id="VehicleType" name="VehicleType" class="form-control"   maxlength="10" required />
            
    <div class="invalid-feedback">Please enter Vehicle Type.</div>
                    </div>
                
</div>

<div class="form-group row" style="margin-top:5px;">
                <label  for="VehDes" class="col-sm-2 col-form-label">Vehicle Description</label>
                <div class="col-sm-10">
                    <input type="text" id="VehDes" name ="VehDesc" class="form-control"  maxlength="25" required/>
                    <div class="invalid-feedback">Please enter Vehicle description.</div>
                    </div>
</div>
<div class="form-group row"  style="margin-top:5px;">
                <label  for="VehMaxVol" class="col-sm-2 col-form-label">Max Volume</label>
                    <div class="col-sm-10">
                    <input type="number" min="1" max="99999999" id="VehMaxVol" name="VehMaxVol" step='0.001' value='0.000' required class="form-control" data-error="Please enter Max Volume." />
                    <div class="invalid-feedback">Please enter Max Volume.</div>
                    </div>

                </div>


<div class="form-group row"  style="margin-top:5px;">
                <label  for="VehMaxWeight" class="col-sm-2 col-form-label">Max Weight</label>
                    <div class="col-sm-10">
                    <input type="number" min="1" max="99999999"  name="VehMaxWeight" step='0.001' value='0.000' id="VehMaxWeight" required class="form-control" data-error="Please enter Max Weight." />
                    <div class="invalid-feedback">Please enter max Weight.</div>
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