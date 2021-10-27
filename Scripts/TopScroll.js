document.getElementById("topscroll").onclick = function () {
    window.scrollTo({
        top:0,
        left:0,
        behavior:'smooth'
});}



$(window).on('scroll', function () {
   if ($(this).scrollTop() > window.innerHeight / 0.5) {
      document.getElementById("topscroll").style.bottom = "25px";
   } else {
      document.getElementById("topscroll").style.bottom = "-100px"; 
   }
});




