<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Edit Category</title>
<style>
  body {
    margin: 0;
    padding: 0;
    font-family: Arial, sans-serif;
    background-color: #f2f2f2;
  }
  .container {
    width: 100%;
    height: 100vh;
    display: flex;
    justify-content: center;
    align-items: center;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
  }
  .content {
    text-align: center;
    padding: 20px;
    background-color: #ffffff;
    border-radius: 10px;
  }
  .heading {
    font-size: 24px;
    font-weight: bold;
    margin-bottom: 10px;
  }
  .subheading {
    font-size: 18px;
    color: #666666;
    margin-bottom: 20px;
  }
  form {
    display: flex;
    flex-direction: column;
  }
  label {
    font-size: 16px;
    margin-bottom: 5px;
  }
  input {
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
    margin-bottom: 15px;
    font-size: 14px;
  }
  button {
    background-color: #007bff;
    color: #ffffff;
    border: none;
    padding: 10px 20px;
    border-radius: 5px;
    font-size: 16px;
    cursor: pointer;
    transition: background-color 0.3s ease;
  }
  button:hover {
    background-color: #0056b3;
  }
</style>
</head>
<body>
  <div class="container">
    <div class="content">
      <div class="heading">Edit Category</div>
      <div class="subheading">Old Value: {{$data->category_name}}</div>
      <form action="{{url('modify_category', ['id' => $data->id])}}" method=post>
        @csrf
        <label for="newCategory">New Value:</label>
        <input type="text" id="newCategory" name="newCategory" placeholder="Enter new category...">
        <button type="submit">Add Category</button>
      </form>
    </div>
  </div>
</body>
</html>
