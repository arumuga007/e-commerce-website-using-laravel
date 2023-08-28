<div class="category-container">
    <div class="category-header">
        Popular Categories
    </div>
    <hr>
    <div class="category-body-container">
        <div class="category-item">
            <div class="category-img-container" onclick="getProducts('cloth')">
                <img src="home/images/tshirt.png" class="category-img">
            </div>
            <div class="category-name" onclick="getProducts('cloth')">
                    Clothes
            </div>
        </div>
        <div class="category-item">
            <div class="category-img-container" onclick="getProducts('mobile')">
            <img src="home/images/samsung-rm.png" class="category-img">
            </div>
            <div class="category-name" onclick="getProducts('mobile')">
                Mobiles
            </div>
        </div>
            <div class="category-item">
            <div class="category-img-container" onclick="getProducts('laptop')">
            <img src="home/images/laptops.png" class="category-img">
            </div>
            <div class="category-name" onclick="getProducts('laptop')">
                Laptops
            </div>
        </div>
        <div class="category-item">
            <div class="category-img-container">
            <img src="home/images/shoe.png" class="category-img" onclick="getProducts('shoe')">
            </div>
            <div class="category-name" onclick="getProducts('shoe')">
                Shoe
            </div>
        </div>
        <div class="category-item">
            <div class="category-img-container" onclick="getProducts('airbuds')">
            <img src="home/images/airbuds.png" class="category-img">
            </div>
            <div class="category-name" onclick="getProducts('airbuds')">
                Earphones
            </div>
        </div>
        
        <div class="category-item">
            <div class="category-img-container" onclick="getProducts('smartwatch')">
            <img src="home/images/smartwatch.png" class="category-img">
            </div>
            <div class="category-name" onclick="getProducts('smartwatch')">
                Smart Watches
            </div>
        </div>
        <div class="category-item">
            <div class="category-img-container" onclick="getProducts('bag')">
            <img src="home/images/bag.png" class="category-img">
            </div>
            <div class="category-name" onclick="getProducts('bag')">
                Bags
            </div>
        </div>
        <div class="category-item">
            <div class="category-img-container" onclick="getProducts('toys')">
            <img src="home/images/homeToy.png" class="category-img">
            </div>
            <div class="category-name" onclick="getProducts('toys')">
                Toys
            </div>
        </div>
    </div>
</div>

<script>
let categoryContainer = document.querySelectorAll('.category-img-container');

categoryContainer.forEach(container => {container.addEventListener('mouseenter', () => {
    let categoryImg = event.currentTarget.firstElementChild;
    categoryImg.style.transform = 'scale(1.1)';
});
container.addEventListener('mouseleave', () => {
    let categoryImg = event.currentTarget.firstElementChild;
    categoryImg.style.transform = 'scale(1)';
})

});
</script>