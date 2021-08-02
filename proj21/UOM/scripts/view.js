
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
                            mymodal.find('.modal-body').text('Delete this UOM?');
                          //  mymodal.find('#targetbtn').text('Yes');
                            $('#targetbtn').click(function() {
                              
                              $.ajax({
                        url: "delete.php",
                        type: "POST",
                        data:'id='+id,
                        success: function(data){
        
            
        
                  location.reload();
        
                
                        }
              });
            })
                            $("#targetConFModal").modal("show");    
        
        
        
        
            
                    
                
            }
        
          function updateRecord(id) {
          
                
          window.location = 'update.php?id=' + encodeURIComponent(id);
          //     
                        }
                    
                
            
        
        