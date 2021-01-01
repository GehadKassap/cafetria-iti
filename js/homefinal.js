jQuery(document).ready(function(){

    jQuery("button").click(function(){
      
       let container = `
       
       <tr class="content">
       <td class=" drinkName w-25" name="namedrink" id="namedrink" > </td>
       <td class="drinkPrice  w-25 "></td>
       <td class=" drinkQuantity  w-25">  <input type="text" id="numberDrink" name="numberDrink" placeHolder="QUANTITY?" class="form-control" > </td>
       </tr>
       
       `;

      jQuery("#close").prepend(container);
      // 1- find drink name : done#
      //2-find drink price : done#
      //3- find drink Quantity :
      // 4-for close this drinkorder : done#
      //5- calculate total price

      /**************************************** */
       // 1- find drink name :
         let drinkNameHolder =jQuery(this).prevUntil(".card-body").prev().text() ; //get val from drink
        jQuery(".drinkName").text(drinkNameHolder); //set value to order
        // console.log( drinkNameHolder);

   //2-find drink price :

       let drinkPriceHolder =jQuery(this).prevUntil("#drinkname").find("span").text() ; //get val from price drink
       jQuery(".drinkPrice").text(drinkPriceHolder); //set value to price of drink
         let convert = Number(jQuery(this).prevUntil("#drinkname").find("span").text());  //convert it into number 
            console.log( typeof convert);


          

    //3- find drink Quantity :
    /*3awza lma l user yktb rkm  #done 
    first : make sure it not negative ;  #done
    sec : take the value     #done 
  
     */
    let holder = 0 ;  // variable to set total 
 /*********hold total prices************ */
   let totalHolder = jQuery("#totalPrice").text();
    jQuery("#numberDrink").focusout(function(){
        let numberOfDrink = Number(jQuery(this).val());
        if(  numberOfDrink <= 0)
        {
           alert("please enter how much you want")
        }
        else
        {
            console.log("yesss") ;
            holder =  numberOfDrink *  convert; 
            jQuery("#totalPrice").text(holder);
       
        }

    })

    //  console.log(typeof numberOfDrink);
//     jQuery('insertForm').on('submit' ,function(event){
//       event.preventDefaults();
//       if(jQuery("#namedrink").text()== "")
//       {
//              alert("chose drink name");

//       }
//       else if(jQuery("#numberDrink").val()== "")
//       {
//              alert("chose Quantity");

//       }
      
//       else if(jQuery("#room").val()== "")
//       {
//              alert("chose Room");

//       }
//       else 
//       {
//         jQuery.ajax({
//           url:"",
//           method: "POST",
//           data:jQuery('#insertForm').serilize(),
//           success:function(data)
//           {
//             jQuery("#insertData")[0].reset()
//            jQuery("#DrinksData").html(data)
//           }

//         })
//       }


//  });

      // 4-for close this drinkorder :
      let closeHolder =  jQuery("#closeBtn");
      closeHolder.click(function(){
        jQuery(".content").css("display" , "none");
        jQuery("#totalPrice").text("0")
     });


      
    });



});

