<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin-Category</title>
    @include('admin.style')
</head>
<style>
.subctgry-container {
    height: 100%;
    width: 100%;
}
.subctgry-header {
    font-size: 1.5em;
    font-weight: 600;
    width: 100%;
    padding-bottom: 10px;
}
.new-subctgry {
    background-color: blue;
    color: white;
    text-align: center;
    padding: 10px 3px;
    border-radius: 4px;
    margin: 10px 0px;
    width: 15%;
    cursor: pointer;
}

.all-subctgry {
    border-collapse: collapse;
    margin-top: 20px;
    width: 90%;
    text-align:center;
    margin-left: auto;
    margin-right: auto;
}
.all-subctgry tr, .all-subctgry td, .all-subctgry th {
    border: 1px solid white;
    padding: 20px 10px;
}
.action-container {
    display: flex;
    flex-direction: row;
    justify-content: space-around;
}
.name-header {
    width: 50%;
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

          <div class="subctgry- container">
            <div class="subctgry-header">Subcategory Details</div>
            <hr color="red">
            <div class="new-subctgry" onclick="addNew()">+ Add New</div>
            <table class="all-subctgry" id="subcat-table">
                <tr class="category-header">
                <th class="name-header">Name</th>
                <th class="Parent-category">Parent Category</th>
                <th class="category-action">Action</th>
                </tr>
                @foreach($subcategory as $subcategory)
                    <tr class="category-value">
                    <td class="subctgry-name">{{$subcategory->subcategory_name}}</td>
                    <td class="subctgry-parent">{{$subcategory->category->category_name}}</td>
                    <td class="action-container">
                        <div class="action-edit"><i class='far fa-edit' style="margin-right: 15px;color:green;cursor: pointer;" onclick="editSubcategory({{$subcategory->id}})"></i></div>
                        <div class="action-delete" onclick="deleteSubCategory({{$subcategory->id}})"><i class="fa fa-trash" style="color: red;cursor: pointer;"></i></div>
                    </td>
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
    <script>
        const addNew = () => {
            window.location.href = '/view_subcategory';
        }
        const deleteSubCategory = (subCategoryId) => {
            fetch(`delete_subcategory?subcategory_id=${subCategoryId}`)
            .then(response => {
                if(response.ok) {
                    return response.json();
                }
            })
            
            .then(data => {
                showAllCategory(data[1]);
            })
        }
        const showAllCategory = (data) => {
            let table = document.getElementById('subcat-table');
            table.innerHTML = `<tr class="category-header">
                <th class="name-header">Name</th>
                <th class="Parent-category">Parent Category</th>
                <th class="category-action">Action</th>
                </tr>`;
            data.forEach(datum => {
                table.innerHTML += `<tr class="category-value">
                    <td class="subctgry-name">${datum.subcategory_name}</td>
                    <td class="subctgry-parent">${datum.category.category_name}</td>
                    <td class="action-container">
                        <div class="action-edit"><i class='far fa-edit' style="margin-right: 15px;color:green;cursor: pointer;" onclick="editSubcategory(${datum.id})"></i></div>
                        <div class="action-delete" onclick="deleteSubCategory(${datum.id})"><i class="fa fa-trash" style="color: red;cursor: pointer;"></i></div>
                    </td>
                    </tr>`;
            })
        }
        const editSubcategory = (subcategoryId) => {

            window.location.href=`edit_subcategory?subcategory_id=${subcategoryId}`;
            console.log('called');
        }
    </script>
</body>
</html>
