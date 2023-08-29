<div class='our-product' id="home-product-place">
    <div class="our-product-header">
        Our Products
    </div>
    <hr width="100%">
    <div class="our-product-body" id="productContainer" style="overflow: hidden;">
    </div>
</div>
<div id="illustration-container">

</div>
<script>
         let container = document.getElementById('productContainer');
         let illustrationContainer = document.getElementById('illustration-container');
         let loading = false;
         let hasMoreData = false;
         let offset = 0;
         let limit = 4;
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
                  let productDate = new Date(product.created_at);
                  var dayBeforeYesterday = new Date();
                  dayBeforeYesterday.setDate(dayBeforeYesterday.getDate() - 2);
                  let actualPrices = product.price - product.discount_price;
                  let discountPercent = Math.floor((product.discount_price * 100) / product.price);
                  const encodedData = encodeURIComponent(JSON.stringify(product));
                 container.innerHTML += `<div class="our-product-each" onclick="nothing('${encodedData}')" style="cursor:pointer;">
            <div class="our-product-image-container">
            <div class="new-product" style="visibility:${(dayBeforeYesterday < productDate) ? 'visible' : 'hidden'}">new</div>
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
   if (window.innerHeight + window.scrollY + 1000 >= document.body.offsetHeight - 10) { 
      loadMoreProducts();
   }
   }
      </script>