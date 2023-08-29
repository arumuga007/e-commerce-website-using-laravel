<section class="product_section layout_padding">
         <div class="container">
            <div class="heading_container heading_center" id="home-product-place">
               <h2 style="font-size: 2em;">
                  Our <span>products</span>
               </h2>
            </div>
            <div class="row" id="productContainer" style="overflow: auto;">
            
            </div>
               </div>
               
         </div>
      </section>
      <div id="illustration-container">
         
      </div>
      <script>
         let container = document.getElementById('productContainer');
         let illustrationContainer = document.getElementById('illustration-container');
         let loading = false;
         let hasMoreData = false;
         let offset = 0;
         let limit = 3;
         let eventFlag = 0;
   function loadMoreProducts() {
    if (loading || hasMoreData) {
        return;
    }

    loading = true;
    
    fetch(`api/get-products?offset=${offset}&limit=${limit}`)
        .then(response => response.json())
        .then(data => {
            if(eventFlag == 0) {
               window.addEventListener('scroll', loadMore);
               eventFlag = 1;
            }
            if (data.length > 0) {
                data.forEach(product => {
                  let actualPrices = product.price - product.discount_price;
                  let discountPercent = Math.floor((product.discount_price * 100) / product.price);
                  const encodedData = encodeURIComponent(JSON.stringify(product));
                 container.innerHTML += `<div class="col-sm-6 col-md-4 col-lg-4 product_container" >
                 
                  <div class="box each-product-box" onclick="nothing('${encodedData}')" style="cursor:pointer;">
                     
                     <div class="img-box" >
                        <img src="uploads/${product.image}" alt="">
                     </div>
                     <div class="product-title">
                        ${product.title}
                     </div>
                     
            <div class="details-rating">
            <i class="fa fa-star" aria-hidden="true" style="color: red; font-size: .8em;"></i>
            <i class="fa fa-star" aria-hidden="true" style="color: red; font-size: .8em;"></i>
            <i class="fa fa-star" aria-hidden="true" style="color: red; font-size: .8em;"></i>
            <i class="fa fa-star" aria-hidden="true" style="color: red; font-size: .8em;"></i>
            <i class="far fa-star" style="color: red; font-size: .8em;"></i>
             <span  style="font-size: .8em;">(20)</span>
            </div>
            <div class="product-price-container">
                  <div class="product-current-price">
                  ₹${actualPrices}
                  </div>
                  <div class="product-actual-price">
                  ₹${product.price}
                  </div>
                  <div class="product-discount-percent">
                     ${discountPercent}%
                  </div>
            </div>
                     `;
                });
                offset += limit;
            }
            else {
               hasMoreData = true;
               illustrationContainer.classList.add('illustration-container');
               illustrationContainer.innerHTML = `<img src="home/images/nomoreitem.jpg">
               <div class="illustration-body">
               <div class="illustration-header">
                     No More Item Left
                  </div>
                  <div class="illustration-btn">
                     Explore Now
                  </div>
               </div>`;
            }
            loading = false;
        })
        .catch(error => {
            console.error('Error loading products:');
            loading = false;
        });
}
function nothing(encodedProduct) {
   const decodedProduct = JSON.parse(decodeURIComponent(encodedProduct));
      window.location.href =  `/product-details?product_id=${decodedProduct.id}`;
}
loadMoreProducts();
function loadMore() {
   console.log(window.innerHeight);
   console.log(window.scrollY);
   console.log(window.innerHeight + window.scrollY);
   console.log(window.innerHeight + window.scrollY + 100000);
   console.log(document.body.offsetHeight);

   if ((window.innerHeight + window.scrollY + 1000) >= document.body.offsetHeight) { 
      console.log('reached the end of the page');
      loadMoreProducts();
   }
   }
      </script>