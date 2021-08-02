<?php include "../common/session.php" ?>


<!DOCTYPE html>
<html lang="en">

    <meta charset="UTF-8">



<head>


    <?php include "../common/comHeader.html" ?>
    <script src="https://cdn.anychart.com/releases/8.9.0/js/anychart-base.min.js"></script>

<style>
    #chartcontent {
    
    width: 40%;
    height: 60%;
    margin: 0;
    padding: 0;
    overflow:auto;
    position:absolute;
}
    </style>


</head>


<body style="  padding-top: 60px;">

<?php include "../common/nav.html" ?>
<?php include "../common/comSidebar.html" ?>
<div id="mainContent" style="display:flex; justify-content: center;">
<div id="chartcontent">
</div>
</div>
<?php include "../common/comScript.html" ?>
<script>
anychart.onDocumentReady(function () {

    var obj;


    $.ajax({
                url: 'vechchart.php',
                type: 'get',
                async: false,
                timeout: 20000,
                
            
                success: function(data) {
                
                obj = JSON.parse(data);
            
                    
                }
            });










    

// create a pie chart and set the data
var chart = anychart.pie(obj);

labels = chart.labels();
labels.width(40);
labels.height(40);
labels.background().enabled(true);
labels.background().fill("Black 0.4");
labels.vAlign("middle");
labels.hAlign("center");


/* set the inner radius
(to turn the pie chart into a doughnut chart)*/

chart.title("Vehicle Distribution");
// set the container id
chart.container("chartcontent");

// initiate drawing the chart
chart.draw();
});
</script>


        <!-- Page Content  -->
    


        </body>
</html>