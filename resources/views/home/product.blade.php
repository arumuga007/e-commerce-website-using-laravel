<section class="product_section layout_padding">
         <div class="container">
            <div class="heading_container heading_center">
               <h2>
                  Our <span>products</span>
               </h2>
            </div>
            <div class="row" id="productContainer" style="overflow: auto;">
                  </div>
               </div>
               
         </div>
      </section>
      <script>
         let container = document.getElementById('productContainer');
         let loading = false;
         let hasMoreData = false;
         let offset = 0;
         let limit = 3;
         function loadMoreProducts() {
    if (loading || hasMoreData) {
        return;
    }

    loading = true;
    
    fetch(`api/get-products?offset=${offset}&limit=${limit}`)
        .then(response => response.json())
        .then(data => {
            if (data.length > 0) {
                data.forEach(product => {
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
                });
                // Increment the offset by the limit for the next request
                offset += limit;
            }
            else {
               hasMoreData = true;
            }
            loading = false;
        })
        .catch(error => {
            console.error('Error loading products:');
            loading = false;
        });
}

window.addEventListener('scroll', () => {
    if (window.innerHeight + window.scrollY >= document.body.offsetHeight - 10) {
      
        loadMoreProducts();
    }
});
function nothing(encodedProduct) {
   const decodedProduct = JSON.parse(decodeURIComponent(encodedProduct));
      window.location.href =  `/product-details?product_id=${decodedProduct.id}`;
}
loadMoreProducts();
      </script>