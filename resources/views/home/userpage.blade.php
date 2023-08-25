<!DOCTYPE html>
<html>
   <head>
      <!-- Basic -->
      <meta charset="utf-8" />
      <meta http-equiv="X-UA-Compatible" content="IE=edge" />
      <meta name="csrf-token" content="{{ csrf_token() }}">
      
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=REM:wght@300;500&display=swap" rel="stylesheet">

      <!-- Mobile Metas -->
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
      <!-- Site Metas -->
      <meta name="keywords" content="" />
      <meta name="description" content="" />
      <meta name="author" content="" />
      <link rel="shortcut icon" href="images/favicon.png" type="">
      <title>Famms - Fashion HTML Template</title>
      <!-- bootstrap core css -->
      <link rel="stylesheet" type="text/css" href="home/css/bootstrap.css" />
      <!-- font awesome style -->
      <link href="home/css/font-awesome.min.css" rel="stylesheet" />
      <!-- Custom styles for this template -->
      <link href="home/css/style.css" rel="stylesheet" />
      <!-- responsive style -->
      <link href="home/css/responsive.css" rel="stylesheet" />
      <link href="home/css/categoryPage.css" rel="stylesheet" />
      <link href="home/css/stylehome.css" rel="stylesheet" />
      <link href="home/css/swiper-bundle.min.css" rel="stylesheet" />
   </head>
   <body>
      
   
      <div class="hero_area">
      @include('home.homepageHeader')
      @include('home.slider')
         <!-- end slider section -->
      </div>
      <!-- why section -->
        @include('home.why')
        @include('home.product')
      <!-- arrival section 
        
        @include('home.subscribe')
        @include('home.client')
        @include('home.footer') 
      <div class="cpy_">
         <p class="mx-auto">© 2021 All Rights Reserved By <a href="https://html.design/">Free Html Templates</a><br>
         
            Distributed By <a href="https://themewagon.com/" target="_blank">ThemeWagon</a>
         
         </p>
      </div> -->
      <!-- jQery -->
      <script src="home/js/jquery-3.4.1.min.js"></script>
      <script src="https://kit.fontawesome.com/42f8c3c6e9.js" crossorigin="anonymous"></script>
      <!-- popper js -->
      <script src="home/js/popper.min.js"></script>
      <!-- bootstrap js -->
      <script src="home/js/bootstrap.js"></script>
      <!-- custom js -->
      <script src="home/js/custom.js"></script>
      <script src="home/js/swiper-bundle.min.js"></script>
      <script>
        let inputField = document.getElementById('search-product-input');
        let getProductBtn = document.getElementById('search-product-btn');
        let productBtn = document.getElementById('home-product-head');
        let productPlace = document.getElementById('home-product-place');
        console.log(eventFlag);
    function getProductsUsingSearch() {
      productPlace.scrollIntoView({ behavior: "smooth" });
      fetch(`api/getproducts-using-search?searchValue=${inputField.value}`)
      .then(response => {
        return response.json();
      })
      .then(data => {
        if(eventFlag == 1) {
          eventFlag = 0;
          window.removeEventListener('scroll', loadMore)
        }
        products = data.result;
        container.innerHTML = '';
        products.forEach(product => {
          console.log(product);
          const encodedData = encodeURIComponent(JSON.stringify(product));
          container.innerHTML += `<div class="col-sm-6 col-md-4 col-lg-4 product_container" >
                 
                 <div class="box" onclick="nothing('${encodedData}')" style="cursor:pointer;">
                    
                    <div class="img-box">
                       <img src="uploads/${product.image}" alt="">
                    </div>
                    <div class="detail-box">
                       <h5>
                          ${product.title}
                       </h5>
                       <h6>
                       ₹${product.price}
                       </h6>
                    </div>`;
        })

      })
      .catch(error => {
        console.log('error occured during execution:', error);
      })
    }
        productBtn.addEventListener("click", () => {
          productPlace.scrollIntoView({ behavior: "smooth" });
        });
      function profileInformation() {
         let profile = document.getElementById('profile-info');
         profile.classList.toggle('show-profile-info');
      }
      var swiper = new Swiper(".mySwiper", {
        slidesPerView: 1,
        loop: true,
        pagination: {
          el: ".swiper-pagination",
          clickable: true,
        },
        navigation: {
          nextEl: ".swiper-button-next",
          prevEl: ".swiper-button-prev",
        },
      });
    </script>
   </body>
</html>