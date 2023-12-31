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
      <link href="home/css/categoryPage.css" rel="stylesheet" />
      <link href="home/css/stylehome.css" rel="stylesheet" />
      <link href="home/css/bodyhome.css" rel="stylesheet" />
      <link href="home/css/product.css" rel="stylesheet" />
      <link href="home/css/homeResponsive.css" rel="stylesheet" />
      <link href="home/css/homefooter.css" rel="stylesheet" />
      <link href="home/css/swiper-bundle.min.css" rel="stylesheet" />
   </head>
   <body>
      @include('home.homepageHeader')
      @include('home.slider')
      @include('home.category')
      <!-- why section -->
        @include('home.why')
        @include('home.ourProduct')
        @include('home.footers')
      <script src="home/js/jquery-3.4.1.min.js"></script>
      <script src="https://kit.fontawesome.com/42f8c3c6e9.js" crossorigin="anonymous"></script>
      <!-- popper js -->
      <script src="home/js/popper.min.js"></script>
      <!-- bootstrap js -->
      <script src="home/js/bootstrap.js"></script>
      <!-- custom js -->
      <script src="home/js/custom.js"></script>
      <script src="home/js/responsive.js"></script>
      <script src="home/js/swiper-bundle.min.js"></script>
      <script>
        let inputField = document.getElementById('search-product-input');
        let getProductBtn = document.getElementById('search-product-btn');
        let productBtn = document.getElementById('home-product-head');
        let categoryBtn = document.querySelector('.category-in-header');
        let categoryPlace = document.querySelector('.category-header');
        let productPlace = document.getElementById('home-product-place');
      function getProductsUsingSearch() {
      productPlace.scrollIntoView({ behavior: "smooth" });
      fetch(`api/getproducts-using-search?searchValue=${inputField.value}`)
      .then(response => {
        return response.json();
      })
      .then(data => {
        if(eventFlag == 1) {
          eventFlag = 0;
          window.removeEventListener('scroll', loadMore);
        }
        products = data.result;
        container.innerHTML = '';
        products.forEach(product => {
          let actualPrices = product.price - product.discount_price;
          let discountPercent = Math.floor((product.discount_price * 100) / product.price);
          console.log(product);
          const encodedData = encodeURIComponent(JSON.stringify(product));
          container.innerHTML += `<div class="our-product-each" onclick="nothing('${encodedData}')" style="cursor:pointer;">
            <div class="our-product-image-container">
            <img src="uploads/${product.image}" alt="product-image" class="our-product-image">
            </div>
            <div class="our-product-details-container">
                <div class="our-product-details-header">
                    ${product.title}
                </div>
                <div class="our-products-details-rating">
            <i class="fa fa-star" aria-hidden="true" style="color: red; font-size: .6em;"></i>
            <i class="fa fa-star" aria-hidden="true" style="color: red; font-size: .6em;"></i>
            <i class="fa fa-star" aria-hidden="true" style="color: red; font-size: .6em;"></i>
            <i class="fa fa-star" aria-hidden="true" style="color: red; font-size: .6em;"></i>
            <i class="far fa-star" style="color: red; font-size: .6em;"></i>
             <span  style="font-size: .6em;">(20)</span>
            </div>
                <div class="our-product-price">
                    <span>₹${actualPrices}</span>
                    <span style="font-size: .8em; color: gray; text-decoration: line-through;align-self:end;">₹${product.price}</span>
                    <span style="font-size: .8em; color: green;">${discountPercent}%</span>
                </div>
            </div>
        </div>`;
        })

      })
      .catch(error => {
        console.log('error occured during execution:', error);
      })
    }
        productBtn.addEventListener("click", () => {
          console.log('product clicked');
          productPlace.scrollIntoView({ behavior: "smooth" });
          eventFlag = 0;
          container.innerHTML = '';
          offset = 0;
          loading = false;
          hasMoreData = false;
          illustrationContainer.classList.remove('illustration-container');
          illustrationContainer.innerHTML = '';
          loadMoreProducts();
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

      //below function is the get product method for the popular category section
      function getProducts(categoryName) {
      productPlace.scrollIntoView({ behavior: "smooth" });
      fetch(`api/getproducts-using-search?searchValue=${categoryName}`)
      .then(response => {
        return response.json();
      })
      .then(data => {
        if(eventFlag == 1) {
          eventFlag = 0;
          window.removeEventListener('scroll', loadMore);
        }
        products = data.result;
        container.innerHTML = '';
        products.forEach(product => {
          let actualPrices = product.price - product.discount_price;
          let discountPercent = Math.floor((product.discount_price * 100) / product.price);
          console.log(product);
          const encodedData = encodeURIComponent(JSON.stringify(product));
          container.innerHTML += `<div class="our-product-each" onclick="nothing('${encodedData}')" style="cursor:pointer;">
            <div class="our-product-image-container">
            <img src="uploads/${product.image}" alt="product-image" class="our-product-image">
            </div>
            <div class="our-product-details-container">
                <div class="our-product-details-header">
                    ${product.title}
                </div>
                <div class="our-products-details-rating">
            <i class="fa fa-star" aria-hidden="true" style="color: red; font-size: .6em;"></i>
            <i class="fa fa-star" aria-hidden="true" style="color: red; font-size: .6em;"></i>
            <i class="fa fa-star" aria-hidden="true" style="color: red; font-size: .6em;"></i>
            <i class="fa fa-star" aria-hidden="true" style="color: red; font-size: .6em;"></i>
            <i class="far fa-star" style="color: red; font-size: .6em;"></i>
             <span  style="font-size: .6em;">(20)</span>
            </div>
                <div class="our-product-price">
                    <span>₹${actualPrices}</span>
                    <span style="font-size: .8em; color: gray; text-decoration: line-through;align-self:end;">₹${product.price}</span>
                    <span style="font-size: .8em; color: green;">${discountPercent}%</span>
                </div>
            </div>
        </div>`;
        })

      })
      .catch(error => {
        console.log('error occured during execution:', error);
      })
    }

    categoryBtn.addEventListener('click', () => {
      categoryPlace.scrollIntoView({behavior:'smooth'});
    })
    </script>
   </body>
</html>