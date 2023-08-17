<!DOCTYPE html>
<!-- Coding By CodingNepal - codingnepalweb.com -->
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!----======== CSS ======== -->
    <link rel="stylesheet" href="style.css">
     
    <!----===== Iconscout CSS ===== -->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">

   <title>Responsive Regisration Form </title>
</head>
<style>
/* ===== Google Font Import - Poppins ===== */
@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600&display=swap');
*{
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: 'Poppins', sans-serif;
}
body{
    min-height: 100vh;
    display: flex;
    align-items: center;
    justify-content: center;
    background: #4070f4;
}
.container{
    position: relative;
    max-width: 900px;
    width: 100%;
    border-radius: 6px;
    padding: 30px;
    margin: 0 15px;
    background-color: #fff;
    box-shadow: 0 5px 10px rgba(0,0,0,0.1);
    height: 70vh;
}
.container header{
    position: relative;
    font-size: 20px;
    font-weight: 600;
    color: #333;
}
.container header::before{
    content: "";
    position: absolute;
    left: 0;
    bottom: -2px;
    height: 3px;
    width: 27px;
    border-radius: 8px;
    background-color: #4070f4;
}
.container form{
    position: relative;
    margin-top: 16px;
    min-height: 250px;
    background-color: #fff;
    overflow: hidden;
}
.container form .form{
    position: absolute;
    background-color: #fff;
    transition: 0.3s ease;
}
.container form .form.second{
    opacity: 0;
    pointer-events: none;
    transform: translateX(100%);
}
form.secActive .form.second{
    opacity: 1;
    pointer-events: auto;
    transform: translateX(0);
}
form.secActive .form.first{
    opacity: 0;
    pointer-events: none;
    transform: translateX(-100%);
}
.container form .title{
    display: block;
    margin-bottom: 8px;
    font-size: 16px;
    font-weight: 500;
    margin: 6px 0;
    color: #333;
}
.container form .fields{
    display: flex;
    align-items: center;
    justify-content: space-between;
    flex-wrap: wrap;
}
form .fields .input-field{
    display: flex;
    width: calc(100% / 3 - 15px);
    flex-direction: column;
    margin: 4px 0;
}
.input-field label{
    font-size: 12px;
    font-weight: 500;
    color: #2e2e2e;
}
.input-field input, select{
    outline: none;
    font-size: 14px;
    font-weight: 400;
    color: #333;
    border-radius: 5px;
    border: 1px solid #aaa;
    padding: 0 15px;
    height: 42px;
    margin: 8px 0;
}
.input-field input :focus,
.input-field select:focus{
    box-shadow: 0 3px 6px rgba(0,0,0,0.13);
}
.container form button, .backBtn{
    display: flex;
    align-items: center;
    justify-content: center;
    height: 45px;
    max-width: 200px;
    width: 100%;
    border: none;
    outline: none;
    color: #fff;
    border-radius: 5px;
    background-color: #4070f4;
    transition: all 0.3s linear;
    cursor: pointer;
}
.container form .btnText{
    font-size: 14px;
    font-weight: 400;
}
form button:hover{
    background-color: #265df2;
}
form button i,
form .backBtn i{
    margin: 0 6px;
}
form .backBtn i{
    transform: rotate(180deg);
}
form .buttons{
    display: flex;
    align-items: center;
}
form .buttons button , .backBtn{
    margin-right: 14px;
}

@media (max-width: 750px) {
    .container form{
        overflow-y: scroll;
    }
    .container form::-webkit-scrollbar{
       display: none;
    }
    form .fields .input-field{
        width: calc(100% / 2 - 15px);
    }
}

@media (max-width: 550px) {
    form .fields .input-field{
        width: 100%;
    }
}
</style>
<body>
    <div class="container">
        <header>Edit Category</header>

        <form action="{{url('modify_product', ['id' => $data->id])}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form first">
                <div class="details personal">

                    <div class="fields">
                        <div class="input-field">
                            <label>Product Name:</label>
                            <input type="text" placeholder="Enter the name of product" required value='{{$data->title}}' name="title">
                        </div>

                        <div class="input-field">
                            <label>Product Description</label>
                            <input type="text" placeholder="Enter the description about product" required value='{{$data->description}}' name="description">
                        </div>

                        <div class="input-field">
                            <label>Product Quantity</label>
                            <input type="text" placeholder="Enter the amount of product" required value='{{$data->quantity}}' name="quantity">
                        </div>

                        <div class="input-field">
                            <label>Product Price</label>
                            <input type="number" placeholder="Enter the price of product" required value='{{$data->price}}' name="price">
                        </div>

                        <div class="input-field">
                            <label>Occupation</label>
                            <input type="text" placeholder="Enter the amount to discount" required value='{{$data->discount_price}}' name="discount_price">
                        </div>
                        
                        <div class="input-field">
                            <label>Product Category</label>
                            <select required style="color:black;" id="categorySelect" name="category">
                                <option disabled selected>Select Category</option>
                                @foreach($categories as $categories)
                                    @if($categories->category_name == $data->category)
                                    <option value='{{$categories->id}}' selected>{{$categories->category_name}}</option>
                                    @else
                                    <option value='{{$categories->id}}'>{{$categories->category_name}}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                        <div class="input-field">
                            <label>Product SubCategory</label>
                            <select required id="subcategorySelect" name="subcategory">
                                <option disabled selected >Select SubCategory</option>
                                @foreach($subcategories as $subcategories)
                                    @if($subcategories->subcategory_name == $data->subcategory)
                                    <option value='{{$subcategories->id}}' selected>{{$subcategories->subcategory_name}}</option>
                                    @else
                                    <option value='{{$subcategories->id}}'>{{$subcategories->subcategory_name}}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                        <div class="input-field">
                            <label>Product Image:</label>
                            <input type=file name="image" required>
                        </div>
                    <div class="input-field">
                    <button type="submit" class="nextBtn" style="margin-top:14px;">
                        <span class="btnText">Next</span>
                        <i class="uil uil-navigator"></i>
                    </button>
                </div>
                </div> 
            </div>
        </form>
    </div>
    <script>
    document.getElementById('categorySelect').addEventListener('change', function() {
        var selectedCategoryId = this.value;
        var subcategorySelect = document.getElementById('subcategorySelect');
        console.log(subcategorySelect)
        // Clear previous subcategory options
        subcategorySelect.innerHTML = '<option value="">Select Subcategory</option>';
        @foreach($sub_categories as $sub_categories)
        if ({{ $sub_categories->category_id }} == selectedCategoryId) {
        subcategorySelect.innerHTML += '<option value="{{ $sub_categories->id }}">{{ $sub_categories->subcategory_name }}</option>';
        }
        @endforeach
        
    });
</script>
</body>
</html>