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
          <div class="content-wrapper" style="postion: relative;">

            <div class="add-category-container" >
                @if(session('message'))
                  
                  <div class="alert alert-success">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                    {{session('message')}}</div>
                @endif
                <div class="add-category-label">Add Category</div>
                <form action="{{url('/add_category')}}" class="category-form" method="post">
                    @csrf
                    <input type=text name="category_name" class="get-category" placeholder="Write a Category Name">
                    <input type=submit name="add-category-btn" class="add-category-btn" value="Add Category" style="background-color: blue;">
                </form>
            </div>
            
            
                <table class="show-category-table"> 
                  <tr > 
                    <th>Category</th>
                    <th style="text-align:center;">Action</th>
                  </tr>
                  @foreach($data as $data)
                  <tr style="margin-bottom: 10px;"> 
                    <td>{{$data->category_name}}</td>
                    <td><a href= "{{route('edit_category', $data->id)}}"><i class='far fa-edit' style="margin-right: 15px;color:green;"></i></a>
                    <a onclick = "return confirm('Are you sure want to delete?')"href= "{{url('delete_category/'.$data->id)}}"><i class="fa fa-trash" style="color: red;font-s"></i></a></td>
                  </tr>
                  @endforeach
                </table>
                
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
