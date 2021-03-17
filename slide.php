<div style='margin: auto;'>
	<meta name="viewport" content="width=device-width, initial-scale=1"> 
<style>
.mySlides {display:none;}
</style>
<body>


 <div class='w3-content w3-section' style='max-width:100%;height: 100%;'>
  <img class='mySlides' src='banner.jpg' style='width:100%;height: 100%;'>
  <img class='mySlides' src='banner2.jpg' style='width:100%;height: 100%;'>
  <img class='mySlides' src='banner3.png' style='width:100%;height: 100%;'>
</div>


<script>
var myIndex = 0;
carousel();

function carousel() {
    var i;
    var x = document.getElementsByClassName("mySlides");
    for (i = 0; i < x.length; i++) {
       x[i].style.display = "none";  
    }
    myIndex++;
    if (myIndex > x.length) {myIndex = 1}    
    x[myIndex-1].style.display = "block";  
    setTimeout(carousel, 5000); 
}
</script>
</div>