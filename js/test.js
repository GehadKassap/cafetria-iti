// var imgHold  = document.getElementsByTagName("img");
// var select = document.querySelector("#choise");
// for( img of imgHold)
// {
//     let imgHolder = jQuery(this).attr("src");
//     let imgDisplay = jQuery("#imgDisplay");
//     let containerHolder = jQuery("#showContainer"); 
//    containerHolder.css("display" , "block")
//    imgDisplay.attr("src" , imgHolder);
//    imgDisplay.css({"border-radius" :"3px"});

//     img.addEventListener('click' , (e)=>{

//         var parent = e.target.parentNode ; 
//         var clone = parent.cloneNode(true);
//         select.appendChild(clone);
      
//     })
// }




var imgHolds = document.querySelectorAll(".allDrinks img");

for(var i = 0 ; i <imgHolds.length ; i++)
{

    imgHolds[i].addEventListener('click' , ()=>{
        console.log("asw")
    })
}