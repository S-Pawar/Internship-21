
      $(document).ready(function () {


        $('#tableData').dataTable({ "order": [0, "asc"] }, { "pagingType": "full_last_numbers" });
        
        $('.dataTables_length').addClass('bs-select');
        });
            $.ajax({
              url: "View_ajax.php",
              type: "GET",
              
            
              success: function(data) {
                //alert(data);
                $('#table').html(data);
              }
            });
        
        
        
          
          function updateRecord(id) {
          
                
        window.location = 'create.php?id=' + encodeURIComponent(id);
            
      }
                    
                
            
        
        