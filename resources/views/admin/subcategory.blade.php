<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin-Category</title>
    @include('admin.style')
</head>
<style>
  .container {
    width: 400px;
    padding: 20px;
    background-color: #222;
    border-radius: 10px;
    box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.3);
    color: #fff;
    margin-top: 5%;
  }
   .subcategory-heading {
    font-size: 1.5em;     
    margin:10px 0 ;
    text-align: center;
    }
  form {
    display: flex;
    flex-direction: column;
  }
  label {
    margin-bottom: 5px;
  }
  .subcategory-label {
    font-weight:500;
  }
  .subcategory-select {
    
    background-color: inherit;
  }
  input[type="text"] {
    padding: 10px;
    border: none;
    border-radius: 5px;
    margin-bottom: 15px;
    background-color: #333;
    color: #fff;
  }
  .btn-container {
    display: flex;
    justify-content: space-between;
  }
  .btn {
    padding: 10px 20px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    font-weight: bold;
    background-color: #007bff;
    transition: background-color 0.3s ease;
  }
  .btn-primary {
    background-color: #007bff;
    color: #fff;
  }
  .btn-primary:hover {
    background-color: #0056b3;
  }
  .btn-secondary {
    background-color: #444;
    color: #fff;
    margin-right: 10px;
  }
  .btn-secondary:hover {
    background-color: #555;
  }
  /* Style the select container */
  .custom-select {
    position: relative;
    display: inline-block;
    background-color: #222;
    color: #fff;
    border-radius: 5px;
    transition: box-shadow 0.3s ease;
    cursor: pointer;
  }
  .custom-select:focus-within {
    box-shadow: 0px 0px 5px rgba(0, 0, 0, 0.5);
  }
  /* Style the select arrow icon */
  .custom-select::after {
    content: "\25BC"; /* Downward-pointing arrow */
    position: absolute;
    top: 50%;
    right: 10px;
    transform: translateY(-50%);
  }

  /* Style the actual select element */
  .custom-select select {
    display: none; /* Hide the default select element */
  }

  /* Style the dropdown options */
  .custom-select select option {
    background-color: #333;
    color: #fff;
    padding: 10px;
  }

  /* Style the selected option */
  .custom-select select option:checked {
    background-color: #007bff; /* Highlight selected option */
  }
</style>
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
            
            @if(session('message'))
                    
                    <div class="alert alert-success subcategory-message">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                      {{session('message')}}</div>
                  @endif
          <div class="container">
    <h1 class="subcategory-heading">Add Subcategory</h1>
    <form action="/add_subcategory" method="post">
        @csrf
      <label for="subcategoryName " class="subcategory-label">Category:</label>
      <select id="subcategoryName" required class="subcategory-select custom-select" name="category">
        <option value="" selected="">Add Subcategory</option>
        @foreach($categories as $categories)
            <option value="{{$categories->id}}" id="subcategoryName" style="background-color:inherit">{{$categories->category_name}}</option>
        @endforeach
       </select>
      
      <label for="subcategoryDescription" class="subcategory-label">Name:</label>
      <input type="text" id="subcategoryDescription" name="subcategory_name" placeholder="Enter subcategory description" required class="subcategory-name">
      
      <div class="btn-container">
        <button type="button" class="btn btn-secondary" href="/view_category">Back</button>
        <button type="submit" class="btn btn-primary" style="background-color: #007bff;">Add Subcategory</button>
      </div>
    </form>
  </div>
                
          </div>
        </div>
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    @include('admin.script')

</body>
</html>
