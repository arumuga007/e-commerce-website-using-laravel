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
  #success-message {
    
    margin-left: 17%;
    position: absolute;
    text-align: center;
    min-width: 40%;
    height: 40px;
    background-color: aqua;
    border-radius: 3px;
    opacity: 0;
    transition: all linear 0.5s;
    overflow: hidden;
  }
  #close {
    position:absolute;
    bottom: 2.7%;
    right: 3%;
    font-size: 1.5em;
    transition: all linear 0.5s;
  }
  
  .addcart-successful {
         position: fixed;
         background-color: #454545;
         color: #1ABE4D;
         text-align: center;
         padding: 10px 20px;
         border-radius: 5px;
         left: 45%;
         top:4vh;
         z-index: 10;
         opacity: 0;
      }
      .addcart-completed {
         animation-name: show-success;
         animation-duration: 5s;
      }
      @keyframes show-success {
         0% {
            opacity: 1;
         }
         10% {
            top:18vh;
         }
         75% {
            top:18vh;
            opacity: 1;
         }
         90% {
            opacity: 0;
         }
      }
</style>
<body>

<div class="addcart-successful" id='showsuccess'>
                  <i class="fa-solid fa-circle-check"></i> Delivery status Updated successfully
                  </div>
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
          <div id="success-message" class="alert alert-success">
          
          </div>
    <div class="container">
    <h1 class="subcategory-heading">Edit Subcategory</h1>
    <form id="subcategory_form" method="post">
      @csrf
      <label for="subcategoryName " class="subcategory-label">Category:</label>
      <select id="subcategoryName" required class="subcategory-select custom-select" name="category">
        <option value="" disabled>Add category</option>
        @foreach($categories as $categories)
            @if($categories->category_name == $subcategory->category->category_name)
            <option value="{{$categories->id}}" id="subcategoryName" style="background-color:inherit" selected="">{{$categories->category_name}}</option>
            @else
                <option value="{{$categories->id}}" id="subcategoryName" style="background-color:inherit">{{$categories->category_name}}</option>
            @endif
        @endforeach
       </select>
      
      <label for="subcategoryDescription" class="subcategory-label">Name:</label>
      <input type="text" id="subcategoryDescription" name="subcategory_name" placeholder="Enter subcategory description" required class="subcategory-name" value="{{$subcategory->subcategory_name}}">
      
      <div class="btn-container">
        <button type="button" class="btn btn-secondary" href="/view_category">Back</button>
        <button type="submit" class="btn btn-primary" style="background-color: #007bff;">Edit Subcategory</button>
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
    <script>
      let showSuccess = document.getElementById('showsuccess');
      let form = document.getElementById('subcategory_form').addEventListener('submit', (event) => {
    event.preventDefault();
    const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
    const Data = {
        subcategoryId: {{$subcategory->id}},
        category: event.target.category.value,
        subcategory: event.target.subcategory_name.value
    };
    fetch('/api/submit-edit-subcategory', {  // Corrected route name here
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': csrfToken
        },
        body: JSON.stringify(Data)
    })
    .then(response => {
        if (response.ok) {
                    showSuccess.classList.remove('addcart-completed');
                     void showSuccess.offsetWidth;
                     showSuccess.classList.add('addcart-completed');
        }
        return response.json();
    })
    .then(data => {
        
        // Handle response data
    })
    .catch(error => {
        console.error('Fetch error:', error);
    });
});

    </script>
    <script src="https://kit.fontawesome.com/42f8c3c6e9.js" crossorigin="anonymous"></script>

</body>
</html>
