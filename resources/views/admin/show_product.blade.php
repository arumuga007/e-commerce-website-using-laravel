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
        @include('admin.productHeader')
        <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper">
          <div class="add-category-container" >
                @if(session('message'))
                  
                  <div class="alert alert-success">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                    {{session('message')}}</div>
                @endif
            </div>
            <div class="show-product-container">
                <h1 class="show-product-header">All Products</h1>
                <table class="show-product-table">
                  <tr style="margin-bottom: 5px">
                    <th class="product-table-header">Product Title </th>
                    <th class="product-table-header">Description </th>
                    <th class="product-table-header">Quantity </th>
                    <th class="product-table-header">Category</th>
                    <th class="product-table-header">SubCategory</th>
                    <th class="product-table-header">Price </th>
                    <th class="product-table-header">Discount Price </th>
                    <th class="product-table-header">Product Image</th>
                    <th class="product-table-header">Action</th>
                  </tr>
                  @foreach($data as $data)
                  <tr>
                    <td class="product-table-data">{{$data->title}} </td>
                    <td class="product-table-data">{{$data->description}} </td>
                    <td class="product-table-data">{{$data->quantity}}</td>
                    <td class="product-table-data">{{$data->category}}</td>
                    <td class="product-table-data">{{$data->subcategory}}</td>
                    <td class="product-table-data">{{$data->price}} </td>
                    <td class="product-table-data">{{$data->discount_price}} </td>
                    <td class="product-table-data"><img src="uploads/{{$data->image}}" class="show-product-image"></td>
                    
                    <td><a href= "{{route('edit_product', $data->id)}}"><i class='far fa-edit' style="color:green;"></i></a><br>
                    <a onclick = "return confirm('Are you sure want to delete?')"href= "{{url('delete_product/'.$data->id)}}"><i class="fa fa-trash" style="color: red;font-s"></i></a></td>
                  </tr>
                  @endforeach
                </table>
            </div>
          </div>
        </div>
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    @include('admin.script')
    <script src="https://kit.fontawesome.com/42f8c3c6e9.js" crossorigin="anonymous"></script>
</body>
</html>
