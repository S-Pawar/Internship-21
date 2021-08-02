

  
    
    
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
        if(data.RoundUpto==0){
            document.getElementById('RoundUpto').disabled  = true;
        }
            else  document.getElementById("RoundT").checked = true;
        
    }
    
    
    
    $( document ).ready(function() {
    
        $('input[type="checkbox"]').on('change', function(){
            this.value ^= 1;
            document.getElementById('RoundUpto').disabled = !this.checked ;
            document.getElementById('RoundUpto').value = (!this.checked ) ? "0":"1"; 
            console.log(document.getElementById('RoundUpto').value);
        });
        
        var $loading = $('#loadingDiv').hide();
        $(document)
        .ajaxStart(function () {
            $loading.show();
        })
        .ajaxStop(function () {
            $loading.hide();
        });
        
    blah=getID();
    //alert(blah);
    $.ajax({
                    url: "geteditdata.php",
                    type: "GET",
                
                    data: {
                    'uid': blah
                    },
                    success: function(data){
                        var obj = JSON.parse(data);
                        console.log(obj);
                   // alert(obj[0].UomCode);
                    popForm('#uform', $.parseJSON(data));
                    }
                });
    
        
    
    
        $('#uform').submit(function() {
        event.preventDefault();
        
        
         
                
                blah=getID();
                //var UID = $('#UomCode').val(JSON.parse(data.id));
                var UomCode = $('#UomCode').val();
                var UOMDesc = $('#UOMDesc').val();
                var Round = $('#RoundT').val();
                var RoundUpto = $('#RoundUpto').val();
                $.ajax({
                    url: 'update_func.php',
                    type: 'POST',
                    async: false,
                    timeout: 20000,
                    
                    data: {
                        'save': 1,
                        'UomID': blah,
                        'UomCode': UomCode,
                        'UOMDesc': UOMDesc,
    
                        'Round': Round,
                        'RoundUpto': RoundUpto,
                    },
                    success: function(data) {
                        var obj = JSON.parse(data);
                        if(obj.statusCode=="200")
                            alert("Data updated");
                            window.location.href =  "View.php";
                        
                    }
                });
            });
        });
    
    
    