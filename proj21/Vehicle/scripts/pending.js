
 

        function updateRecord(id) {
          
                
          window.location = 'create.php?id=' + encodeURIComponent(id);
              
        }
      
      $(document).ready(function () {


        $('#tableData').dataTable({  "order": [0, "asc"] }, { "pagingType": "full_last_numbers" });
        
        $('.dataTables_length').addClass('bs-select');
      
            $.ajax({
              url: "getpending.php",
              
              type: "GET",
              cache: false,
              success: function(data) {
                //alert(data);
                $('#table').html(data);
              }
            });
        
        
          
            $("#submit_btn").click(function() { 
              event.preventDefault();
              var mymodal = $('#targetModal');
              if (($("input[name*='pendingchk']:checked").length)<=0) {
               //0 alert("You must check at least 1 box");
              mymodal.find('.modal-body').text('You must check at least 1 box');
                
                
                        $("#targetModal").modal("show"); 
            return false;
            }
                if(! $('#inlineCheckbox2,#inlineCheckbox1').is(':checked')) 
                        { 
                         // alert("Select Approve or Cancel"); 
                        mymodal.find('.modal-body').text('Select Approve or Cancel');
                
                
                        $("#targetModal").modal("show");
                          return false;
                        } 
              var array1 =  $("input[name='pendingchk']:checked").map(function(){
                      return this.value;
              }).get()
        
        
              var result = {};
          
              for (var i = 0; i < array1.length; ++i){
                result["id" + (i+1)] = array1[i];
              }
              result.approve = $('input[name="exampleRadios"]:checked').val(); 
            //  console.log(result);
        
              var json_cb = JSON.stringify(result);            
              console.log( json_cb);       
              $.ajax({
                url: './pending_update.php',
                contentType: "application/json",
                type: 'POST',
              
              
                timeout: 20000,
                
                data: JSON.stringify(result),
                success: function(data) {
              
                  var modaltxt= (data.approve==="1") ? "Selected Vehicle Numbers Approved.":"Selected Vehicle Numbers Cancelled.";

                  mymodal.find('.modal-body').text(modaltxt);
                    
                  $('#targetModal').on('hidden.bs.modal', function () {
                      window.location.href = "pending.php"
                  })
                  $("#targetModal").modal("show");

                 // location.reload();
                }
            });
              
          });
        
        
                    
      
          
    
    }); 
  