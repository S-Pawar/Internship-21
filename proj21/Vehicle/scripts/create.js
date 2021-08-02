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

function deleteRecord(){


   // console.log(blah);
    var mymodal = $('#targetConFModal');
                            mymodal.find('.modal-body').text('Delete this Vehicle?');
                            $(document).on("click","#targetbtn",function(e){
                        
                            
                            $.ajax({
                        url: "delete.php",
                        type: "POST",
                        data:'id='+blah,
                    
                    
                        success: function(data){
        
            
        
                window.location.href = "view.php"
                
                        }
            });
            })
                            $("#targetConFModal").modal("show");    
        
        
        
        
            
                    
                
        
    }

function popForm(frm,data){
    
    // alert(data);
    
    $.each(data, function(key, value){
    $('[name='+key+']', frm).val(value);
    });


    (data.Approve=='1') ? $("#approvedchk").prop("checked", true) :
    (data.Approve=='0' ? $("#canceledchk").prop("checked", true) : $("#pendingchk").prop("checked", true));
    if(data.Approve==null) $( "#delbtn" ).prop( "disabled", false );

}


$(document).ready(function() {
    var $loading = $('#loadingDiv').hide();
    blah=getID();
    

    let dropdown = document.getElementById('VehicleTypeID');
    dropdown.length = 0;
    
    let defaultOption = document.createElement('option');
    defaultOption.text = '';
    
    dropdown.add(defaultOption);
    dropdown.selectedIndex = 0;
    

    $.ajax({
        url: "getdropdown.php",
        type: "GET",
        async: false,
        
    
        
        success: function(data){
            var obj = JSON.parse(data);
            let option;
    
            for (let i = 0; i < obj.length; i++) {
            option = document.createElement('option');
                option.text = obj[i].vehicletype;
                option.value = obj[i].vehicleid;
                dropdown.add(option);
            }    


     //   popDropDown('#form2', $.parseJSON(data));
        }
    });








    if(blah==null){
    $('#form2').submit(function() {
    event.preventDefault();
            var VNumber = $('#VNumber').val();
            var VehicleTypeID = $('#VehicleTypeID').val();
        
            
        
            $.ajax({
                url: 'create_func.php',
                type: 'POST',
                async: false,
                timeout: 20000,
                
                data: {
                    'save': 1,
                    'VNumber': VNumber,
                    'VehicleTypeID': VehicleTypeID,
                
                
                },
                success: function(data) {
                    var mymodal = $('#targetModal');
                var obj = JSON.parse(data);
                if(obj.statusCode=="200")
                {
                
                    mymodal.find('.modal-body').text('New Vehicle Number added.');
                    
                    $('#targetModal').on('hidden.bs.modal', function () {
                        window.location.href = "View.php"
                    })
                    $("#targetModal").modal("show");
                }
                else{
                
                    mymodal.find('.modal-body').text('Vehicle Number already exists');
                
                
                    $("#targetModal").modal("show");
                }
                    
                }
            });
        })
    }
        else
        {

            $("#VNumber").prop( "disabled", true );
            $("#statuschk").toggle();
            $("#headtitle").text("Update");
            $("#submit_btn").text("Update");
            $("#delbtn").toggle();
            $.ajax({
                url: "geteditdata.php",
                type: "GET",
                async:false,
                data: {
                'vid': blah
                },
                success: function(data){
                
                    var obj = JSON.parse(data);
                
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
            var VNumber = $('#VNumber').val();
            var VehicleTypeID = $('#VehicleTypeID').val();
        
            $.ajax({
                url: 'update_func.php',
                type: 'POST',
                async: false,
                timeout: 20000,
                
                data: {
                    'save': 1,
                    'VehicleID': blah,
                    'VNumber': VNumber,
                    'VehicleTypeID': VehicleTypeID,

                
                },
                success: function(data) {
        
                var mymodal = $('#targetModal');
                mymodal.find('.modal-body').text('Vehicle updated');
                
                $('#targetModal').on('hidden.bs.modal', function () {
                window.location.href = "View.php"
                })
                $("#targetModal").modal("show");
                }
                
            });
        });

        }


      
    })