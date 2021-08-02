

$(document).ready(function() {


    
  
    
$('input[type="checkbox"]').on('change', function(){
    this.value ^= 1;
    document.getElementById('RoundUpto').disabled = !this.checked ;
    document.getElementById('RoundUpto').value = (!this.checked ) ? "0":"1"; 
});

    $('#form1').submit(function() {
    event.preventDefault();
            var UomCode = $('#UomCode').val();
            var UOMDesc = $('#UOMDesc').val();
            var Round = $('#Round').val();
            
            var RoundUpto = $('#RoundUpto').val();
            $.ajax({
                url: 'create_func.php',
                type: 'POST',
                async: false,
                timeout: 20000,
                
                data: {
                    'save': 1,
                    'UomCode': UomCode,
                    'UOMDesc': UOMDesc,
                
                    'Round': Round,
                    'RoundUpto': RoundUpto,
                },
                success: function(data) {
                    var mymodal = $('#targetModal');
                var obj = JSON.parse(data);
                if(obj.statusCode=="200")
                {
                
                    mymodal.find('.modal-body').text('New UOM Added.');
                    
                    $('#targetModal').on('hidden.bs.modal', function () {
                        window.location.href = "View.php"
                    })
                    $("#targetModal").modal("show");
                }
                else{
                
                    mymodal.find('.modal-body').text('UOM already exists');
                
                
                    $("#targetModal").modal("show");
                }
                    
                }
            });
        })
    })