<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>cafe</title>
    <link rel="stylesheet" href="../css/all.min.css">
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="stylesheet" href="../css/home.css">
</head>
<body>
  
<section class="container-fluid mt-5">
    <div class="row">
        <!------for choice of user------->
        <div class="col-md-5 " >
            <div id="showContainer">
            <!--this part for display drinks when user click on img-->
            <div class="displayDrinks p-3">
                <div class="row">
                    <div class="col-md-12" id="content">
                       <span class="drinkName"></span>
                       <span class="numsOfDrinks px-3 py-2">1</span>
                       <span><i class="fas fa-plus " id="plus"></i></span>
                       <span><i class="fas fa-minus" id="minus"></i></span>
                       <span class="priceOfDrinks p-2"></span>
                        <span> <i class="fas fa-times fa-2x " id="close"></i></span>
                        
                     </div>
              
            
            </div>
            <div class="mb-3 mt-1">
                <label for="exampleFormControlTextarea1" class="form-label"><b>Notes</b></label>
                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
              </div>

 
            <div class="dropdown">
                <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-expanded="false">
                Room
                </button>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                  <li><a class="dropdown-item" href="#">Room 1</a></li>
                  <li><a class="dropdown-item" href="#">Room 2</a></li>
                  <li><a class="dropdown-item" href="#">Room 3</a></li>
                </ul>
              </div>
        
            <img src="" id="imgDisplay"  alt="" class="w-50 my-2">
              <div class="forborder"></div>
              <p class="float-right mt-2">total is : EGP <span>321</span></p>
              <div class="clearfix"></div>

              <button class="btn btn-primary float-right">Confirm order</button>
              <div class="clearfix"></div>
           

            </div>
        </div>
        </div>
        <!-------------------------->
         <!------for display to user------->
         <div class="col-md-7">
        <div class="displayUsers">
            <h3>all user</h3>
        </div>

             <div class="allDrinks">
                <h2 class="pt-2" >All Drinks </h2>
                <div class="row">
                    <div class="col-md-4 mb-2">
                        <div class="card" >
                           <img src="../imgs/ColdDrinks/delicious-banana-milkshake.jpg" alt="" class="card-img-top">
                           <div class="card-body">
                               <h5 class="card-title">Banana with milk Juice</h5>
                               <p class="card-text"> Lorem ipsum dolor sit amet consectetur<span class="badge badge-danger ml-1 p-2">30</span></p>
                           </div>


                        </div>
                        
                    </div>
                    <div class="col-md-4 mb-2">
                        <div class="card">
                           <img src="../imgs/ColdDrinks/orange-juice-with-fruit-slices-spices-white-table.jpg" alt="" class="card-img-top">
                           <div class="card-body">
                               <h5 class="card-title">Orange Juice</h5>
                               <p class="card-text"> Lorem ipsum dolor sit amet consectetur.<span class="badge badge-danger ml-1 p-2" >50</span></p>
                           </div>


                        </div>
                        
                    </div>
                    <div class="col-md-4 mb-2">
                        <div class="card" >
                           <img src="../imgs/HotDrinks/dessert-tasty-liquid-dinnerware-saucer.jpg" alt="" class="card-img-top">
                           <div class="card-body">
                               <h5 class="card-title">Tea</h5>
                               <p class="card-text"> Lorem ipsum dolor sit amet consectetur<span class="badge badge-danger ml-1 p-2">30</span></p>
                           </div>


                        </div>
                        
                    </div>
                    <div class="col-md-4 mb-2">
                        <div class="card" >
                           <img src="../imgs//HotDrinks/joe-hepburn-EcWFOYOpkpY-unsplash.jpg" alt="" class="card-img-top">
                           <div class="card-body">
                               <h5 class="card-title">Cabatshinoe</h5>
                               <p class="card-text"> Lorem ipsum dolor sit amet consectetur<span class="badge badge-danger ml-1 p-2">30</span></p>
                           </div>


                        </div>
                        
                    </div>
              
                </div>
             </div>
         </div>
        


       
    </div>
    </section>

<script src="../js/jquery.js"></script>
<script src="../js/bootstrap.bundle.js"></script>
<script src="../js/home.js"></script>
</body>
</html>