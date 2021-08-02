
      $(document).ready(function () {


        $('#tableData').dataTable({ "order": [0, "asc"] }, { "pagingType": "full_last_numbers" });
        
        $('.dataTables_length').addClass('bs-select');
        });
            $.ajax({
              url: "View_ajax.php",
              type: "POST",
              cache: false,
              success: function(data) {
                //alert(data);
                $('#table').html(data);
              }
            });
        
        
        
            function deleteRecord(id) {
        
              var mymodal = $('#targetConFModal');
                            mymodal.find('.modal-body').text('Delete this Vehicle Type?');
                          //  mymodal.find('#targetbtn').text('Yes');
                            $('#targetbtn').click(function() {
                              
                              $.ajax({
                        url: "delete.php",
                        type: "POST",
                        data:'id='+id,
                        success: function(data){
                          var mymodal = $('#targetModal');
                          var obj = JSON.parse(data);
                          if(obj.statusCode=="200")
                          {
                          
                              console.log("232");
                            location.reload();
                          }
                          else{
                            console.log("1111");
                            mymodal.find('.modal-body').text('Vehicle Type is used in Vehicles');
                        
                        
                            $("#targetModal").modal("show");
                        }
                        }
              });
            })
                            $("#targetConFModal").modal("show");    
        
        
        
        
            
                    
                
            }
        
          function updateRecord(id) {
          
                
        window.location = 'create.php?id=' + encodeURIComponent(id);
            
      }
                    
                
            
        
        