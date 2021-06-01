
 <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <div class="Slides" style="width:100%">

     <div class=" mySlides " style="width:100%">
     <img src="https://media.balohanghieu.com/uploads/nhan-ngay-qua-tang-khi-mua-san-pham-simplecarry-1616031160.jpg" style="width:100%">

     </div>

     <div class=" mySlides">
     <img src="https://media.balohanghieu.com/uploads/balo-nang-luong-mat-troi-the-he-moi-1615883278.jpg" style="width:100%">
     
     </div>



     <button class="w3-button w3-display-left w3-black" onclick="plusDivs(-1)">&#10094;</button>
     <button class="w3-button w3-display-right w3-black" onclick="plusDivs(1)">&#10095;</button>

     </div>
     <script>
         var slideIndex = 1;
             showDivs(slideIndex);

         function plusDivs(n) {
             showDivs(slideIndex += n);
     
         };
         
         function showDivs(n) {
         var i;
         var x = document.getElementsByClassName("mySlides");
         if (n > x.length) {slideIndex = 1}
         if (n < 1) {slideIndex = x.length}
         for (i = 0; i < x.length; i++) {
             x[i].style.display = "none";  
         }
             x[slideIndex-1].style.display = "block";  
             
         }
     </script>
          
 