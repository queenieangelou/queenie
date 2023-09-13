<!DOCTYPE html>
<html>
<head>
    <title>Sari-Sari Store Price Management</title>
    <style>
        /* CSS styles for the layout */
        body {
            font-family: Arial, sans-serif;
        }
        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
        }
        h1 {
            text-align: center;
        }
        /* CSS styles for the table */
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            padding: 10px;
            border: 1px solid #ddd;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        /* CSS styles for buttons and forms */
        .button {
            background-color: #4CAF50;
            color: white;
            border: none;
            padding: 10px 20px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin: 5px 2px;
            cursor: pointer;
        }
        .form-group {
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Sari-Sari Store Price Management</h1>
        <form action="javascript:void(0);" onsubmit="addProduct(); return false;" enctype="multipart/form-data">
            <div class="form-group">
                <label for="product_name">Product Name:</label>
                <input type="text" id="product_name" name="product_name" placeholder="Enter product name">
            </div>
            <div class="form-group">
                <label for="product_category">Product Category:</label>
                <input type="text" id="product_category" name="product_category" placeholder="Enter product category">
            </div>
            <div class="form-group">
                <label for="product_description">Product Description:</label>
                <textarea id="product_description" name="product_description" placeholder="Enter product description"></textarea>
            </div>
            <div class="form-group">
                <label for="product_price">Product Price:</label>
                <input type="number" id="product_price" name="product_price" placeholder="Enter product price">
            </div>
            <div class="form-group">
                <label for="product_photo">Product Photo:</label>
                <input type="file" id="product_photo" name="product_photo">
            </div>
            <button type="submit" class="button">Add Product</button>
        </form>
        <table>
            <thead>
                <tr>
                    <th>Product Name</th>
                    <th>Category</th>
                    <th>Description</th>
                    <th>Price</th>
                    <th>Product Photo</th>
                </tr>
            </thead>
            <tbody id="product_list">
                <!-- Product list will be displayed here -->
            </tbody>
        </table>
    </div>

    <script>
        // JavaScript code for adding products and displaying them in the table
        function addProduct() {
            var productName = document.getElementById('product_name').value;
            var productCategory = document.getElementById('product_category').value;
            var productDescription = document.getElementById('product_description').value;
            var productPrice = document.getElementById('product_price').value;
            var productPhoto = document.getElementById('product_photo').value;

            // Create a new table row with product details
            var newRow = document.createElement('tr');
            newRow.innerHTML = `
                <td>${productName}</td>
                <td>${productCategory}</td>
                <td>${productDescription}</td>
                <td>${productPrice}</td>
                <td>${productPhoto}</td>
            `;

            // Append the new row to the table
            document.getElementById('product_list').appendChild(newRow);

            // Clear input fields after adding a product
            document.getElementById('product_name').value = '';
            document.getElementById('product_category').value = '';
            document.getElementById('product_description').value = '';
            document.getElementById('product_price').value = '';
            document.getElementById('product_photo').value = '';
        }
    </script>
</body>
</html>
