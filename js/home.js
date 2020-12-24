jQuery(document).ready(function(){

   jQuery("img").click(function(){
      let count = 0;
   let imgHolder = jQuery(this).attr("src");
   let imgDisplay = jQuery("#imgDisplay");
   
   /***********************************/

   //for name of drink to display in the order section
   let drinkNameHolder =jQuery(this).next().find("h5").text()  ; 
   jQuery(".drinkName").text(drinkNameHolder).text();
   /*****************************************/

   // the increment and decrement of the drink ::
     let numsOfDrinks = jQuery(".numsOfDrinks") ; 
     let plusHolder = jQuery("#plus") ; 
     let minusHolder = jQuery("#minus");
     let closeHolder = jQuery("#close"); 
     plusHolder.click(function(){
       let nums = Number(numsOfDrinks.text());
       numsOfDrinks.text( nums+1) ; 

       
     });
     minusHolder.click(function(){
      let nums = Number(numsOfDrinks.text());
      if(nums <= 0)
      {
         numsOfDrinks.text(" 0") ;
      }
      else{
         numsOfDrinks.text( nums-1) ;

      } 

      
    });
    closeHolder.click(function(){
    jQuery("#content").css("display" , "none")

      
    });
    /**************************************************/

    let priceHolder =jQuery(this).next().find("span").text() ;
    let priceOfDrinks = jQuery(".priceOfDrinks");
    priceOfDrinks.text(priceHolder + " L.E");
   // count += priceHolder;
   // console.log(count);
   // console.log(typeof priceHolder);

   
   let containerHolder = jQuery("#showContainer"); 
   containerHolder.css("display" , "block")
   imgDisplay.attr("src" , imgHolder);
   imgDisplay.css({"border-radius" :"3px"});
   }) ;
   
   
   });