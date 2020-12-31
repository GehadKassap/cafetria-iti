jQuery(document).ready(function(){
  
   jQuery("img").click(function(){
      // let count = 0;
   let imgHolder = jQuery(this).attr("src");
   let imgDisplay = jQuery("#imgDisplay");

      
   let containerHolder = jQuery("#showContainer"); 
   containerHolder.css("display" , "block")
   imgDisplay.attr("src" , imgHolder);
   imgDisplay.css({"border-radius" :"3px"});
   
   /***********************************/

   let container = `
   <div class="col-md-12 mb-1" id="content">
   <span class="drinkName" name="name"></span>
   <span class="numsOfDrinks px-3 py-2">1</span>
   <span><i class="fas fa-plus mr-1" id="plus"></i></span>
   <span><i class="fas fa-minus mx-1" id="minus"></i></span>
   <span class="priceOfDrinks p-2"></span>
    <span> <i class="fas fa-times fa-2x ml-5" id="close"></i></span>
    </div>


   `;
   jQuery("#choise").after(container);




   /********************************** */

   //for name of drink to display in the order section
   let drinkNameHolder =jQuery(this).next().find("h5").text()  ; 
   jQuery(".drinkName").text(drinkNameHolder).text();
   /*****************************************/

   // the increment and decrement of the drink ::
     
     let plusHolder = jQuery("#plus") ; 
     let minusHolder = jQuery("#minus");
     let closeHolder = jQuery("#close"); 

   //   let ah = numsOfDrinks.text() ; 
   let numsOfDrinks = jQuery(".numsOfDrinks") ; 

     plusHolder.click(function(){
      let nums = Number(numsOfDrinks.text());
       numsOfDrinks.text( nums+1) ; 

       
     });
     minusHolder.click(function(){
      let nums = Number(numsOfDrinks.text());
      if(nums <= 0)
      {
         numsOfDrinks.text("0") ;
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
    priceOfDrinks.text(priceHolder );
   // count += priceHolder;
   // console.log(count);
  







      /************************************ sum of order */
   
      // let convertPrice = Number(priceHolder );
      // let numsDrinks =  jQuery(".numsOfDrinks") ;
      // let numberHolder =  Number(numsDrinks.text());
      // let total = convertPrice * numberHolder ;
      // console.log(typeof  priceHolder);
      // console.log( total) ;
      // console.log(  total) ;






   }) ;



   
   
   });