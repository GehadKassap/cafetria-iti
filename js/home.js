jQuery(document).ready(function(){

   jQuery("img").click(function(){
   let imgHolder = jQuery(this).attr("src");
   let imgDisplay = jQuery("#imgDisplay");
   let priceHolder = jQuery(this).next().text() ; 
   console.log(priceHolder);
   
   let containerHolder = jQuery("#showContainer"); 
   containerHolder.css("display" , "block")
   imgDisplay.attr("src" , imgHolder);
   imgDisplay.css({"border-radius" :"3px"});
   }) ;
   
   
   });