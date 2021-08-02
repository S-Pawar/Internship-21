function getID(){
    
    $.urlParam = function(name){
    var results = new RegExp('[\?&]' + name + '=([^&#]*)').exec(window.location.href);
    if (results==null) {
    return null;
    }
    return decodeURI(results[1]) || 0;


}



return  $.urlParam('id'); 

}


function popForm(frm,data){
    
    // alert(data);
    
    $.each(data, function(key, value){
    $('[name='+key+']', frm).val(value);
    });

}





$(document).ready(function() {
    var $loading = $('#loadingDiv').hide();
    blah=getID();
    console.log(blah);
    if(blah==null){
    $('#form2').submit(function() {
    event.preventDefault();
            var VehicleType = $('#VehicleType').val();
            var VehDes = $('#VehDes').val();
            var VehMaxVol = $('#VehMaxVol').val();
            
            var VehMaxWeight = $('#VehMaxWeight').val();
            $.ajax({
                url: 'create_func.php',
                type: 'POST',
                async: false,
                timeout: 20000,
                
                data: {
                    'save': 1,
                    'VehicleType': VehicleType,
                    'VehDes': VehDes,
                
                    'VehMaxVol': VehMaxVol,
                    'VehMaxWeight': VehMaxWeight,
                },
                success: function(data) {
                    var mymodal = $('#targetModal');
                var obj = JSON.parse(data);
                if(obj.statusCode=="200")
                {
                
                    mymodal.find('.modal-body').text('New Vehicle added.');
                    
                    $('#targetModal').on('hidden.bs.modal', function () {
                        window.location.href = "View.php"
                    })
                    $("#targetModal").modal("show");
                }
                else{
                
                    mymodal.find('.modal-body').text('Vehicle already exists');
                
                
                    $("#targetModal").modal("show");
                }
                    
                }
            });
        })
    }
        else
        {

            $("#VehicleType").prop( "disabled", true );
            $("#headtitle").text("Update");
            $("#submit_btn").text("Update");
            $.ajax({
                url: "geteditdata.php",
                type: "GET",
            
                data: {
                'vid': blah
                },
                success: function(data){
                
                    var obj = JSON.parse(data);
                    console.log(obj);
               // alert(obj[0].UomCode);
                popForm('#form2', $.parseJSON(data));
                }
            });

    
            
            $(document)
            .ajaxStart(function () {
                $loading.show();
            })
            .ajaxStop(function () {
                $loading.hide();
            });
            

    $('#form2').submit(function() {
    event.preventDefault();
    

            
            blah=getID();
            //var UID = $('#UomCode').val(JSON.parse(data.id));
            var VehicleType = $('#VehicleType').val();
            var VehDes = $('#VehDes').val();
            var VehMaxWeight = $('#VehMaxWeight').val();
            var VehMaxVol = $('#VehMaxVol').val();
            $.ajax({
                url: 'update_func.php',
                type: 'POST',
                async: false,
                timeout: 20000,
                
                data: {
                    'save': 1,
                    'VechicleID': blah,
                    'VehicleType': VehicleType,
                    'VehDes': VehDes,

                    'VehMaxVol': VehMaxVol,
                    'VehMaxWeight': VehMaxWeight,
                },
                success: function(data) {
        
                var mymodal = $('#targetModal');
                mymodal.find('.modal-body').text('Vehicle Type updated');
                
                $('#targetModal').on('hidden.bs.modal', function () {
                window.location.href = "View.php"
                })
                $("#targetModal").modal("show");
                }
                
            });
        });

        }

    })