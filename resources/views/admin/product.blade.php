<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin-Category</title>
    @include('admin.style')
</head>
<body>
<div class="container-scroller">
      <!-- partial:partials/_sidebar.html -->
      @include('admin.sidebar')
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_navbar.html -->
        @include('admin.header')
        <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper">
            <div class="add-product-container">
            @if(session('message'))
                  
                  <div class="alert alert-success" style="width:100%;">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">X</button>
                    {{session('message')}}</div>
                @endif
           <h1 style="font-size: 1.7em; margin-bottom: 2vh;">Add Products</h1>
           <form action="/add_product" method=post enctype="multipart/form-data">
            @csrf
                <div class='add-product-inputs-container'>
                <label class="add-product-label"> Product Name:
                <input type=text class="add-product-input" name="title" Required>
                </div>
                <div class='add-product-inputs-container'>
                <label class="add-product-label"> Product Description:
                <input type=text class="add-product-input" name="description" required>
                </div>
                <div class='add-product-inputs-container'>
                <label class="add-product-label"> Product Quantity:
                <input type=number class="add-product-input" name="quantity" required>
                </div>
                <div class='add-product-inputs-container'>
                <label class="add-product-label"> Product Price:
                <input type=number class="add-product-input" name="price" Required>
                </div>
                <div class='add-product-inputs-container'>
                <label class="add-product-label"> Product Discount:
                <input type=number class="add-product-input" name="discount_price" Required>
                </div>
                <div class='add-product-inputs-container'>
                <label class="add-product-label"> Product Category:
                <select name="category" class="add-product-input" Required>
                    <option  value =""selected="">Add a Category here</option>
                    <option>shirts</options>
                    @foreach($data as $data)
                        <option value={{$data->category_name}}>{{$data->category_name}}</option>
                    @endforeach
                </select>
                </div>
                <div class='add-product-inputs-container'>
                <label class="add-product-label"> Product Image:
                <input type=file class="add-product-input" name="image"  style="color:white;" required>
                </div>
                
                <input type=submit class="add-product-input btn btn-primary" name="submit">
                

            </form>
        </div>
      </div>
      <!-- page-body-wrapper ends -->
    </div>
</div>
</div>
    @include('admin.script')

</body>
</html>
