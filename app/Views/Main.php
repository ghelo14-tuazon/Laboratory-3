<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="image/x-icon" href="<?= base_url('assets/images/logo.png'); ?>">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        /* Custom CSS styles */
        body {
            background-color: #f4f4f4;
        }

        .navbar {
            background-color: #3498db;
        }

        .navbar-brand {
            color: #fff;
        }

        .container {
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            margin-top: 20px;
        }
        .navbar-nav {
            margin-left: auto;
        }

        h2 {
            text-align: center;
            color: #333;
        }

        .btn-primary, .btn-success, .btn-info {
            color: #fff;
        }

        .table {
            background-color: #fff;
        }

        .table thead th {
            background-color: #3498db;
            color: #fff;
            
        }


        .action-links a {
            margin-right: 10px;
        }

        .modal-dialog {
            max-width: 400px;
        }

        .modal-body ul {
            list-style: none;
            padding: 0;
        }

        .modal-body li {
            margin-bottom: 5px;
        }
        .table tbody a {
    text-decoration: underline;
}
    </style>
    <title>Admin Page</title>
  
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light">
    <div class="container">
        <a class="navbar-brand" href="#">Tuazon Shop</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                
                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url('logout') ?>">Logout</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<div class="collapse navbar-collapse" id="navbarNav">
            
        </div>
<div class="container mt-5">



    <h2 class="mb-4" style="text-align: center;">PRODUCT MANAGEMENT</h2>

    <a href="<?= base_url('create') ?>" class="btn btn-primary mb-3">Add Product</a>
    <a href="<?= base_url('add-category') ?>" class="btn btn-success mb-3">Add Category</a>

    <div class="mb-3 d-flex justify-content-between align-items-center">
        <form method="get" class="d-inline-block">
            <label for="categoryFilter" class="form-label">Filter by Category:</label>
            <select class="form-select" id="categoryFilter" name="categoryFilter">
                <option value="">All Categories</option>
                <?php foreach ($categories as $category): ?>
                    <option value="<?= $category['category_id'] ?>" <?= (isset($categoryFilter) && $category['category_id'] == $categoryFilter) ? 'selected' : '' ?>><?= $category['name'] ?></option>
                <?php endforeach; ?>
            </select>
            <button type="submit" class="btn btn-primary" id="applyFilter">Apply Filter</button>
        </form>

        <button type="button" class="btn btn-info" data-toggle="modal" data-target="#categoryModal">Show Categories</button>
    </div>

    <table class="table table-bordered table-striped">
        <thead class="bg-primary">
        <tr>
            <th>Product Information</th>
            <th>Category</th>
            
        </tr>
        </thead>
        <tbody>
        <?php foreach ($sk as $rider): ?>
            <tr>
                <td>
                <a href="<?= base_url('student/' . $rider['id']) ?>"><?= $rider['name'] ?></a>
                </td>
                <td><?= $rider['category'] ?></td>
                
            </tr>
        <?php endforeach ?>
        </tbody>
    </table>
</div>

<div class="modal fade" id="categoryModal" tabindex="-1" role="dialog" aria-labelledby="categoryModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="categoryModalLabel">Categories</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <ul>
                    <?php foreach ($categories as $category): ?>
                        <li><?= $category['name'] ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<script>
    document.getElementById('applyFilter').addEventListener('click', function() {
        const categoryFilter = document.getElementById('categoryFilter').value;
        const tableRows = document.querySelectorAll('tbody tr');

        tableRows.forEach(function(row) {
            const categoryValue = row.querySelector('td:nth-child(3)').textContent;

            if (categoryFilter === '' || categoryFilter === categoryValue) {
                row.style.display = '';
            } else {
                row.style.display = 'none';
            }
        });
    });
</script>
<!-- Admin -->
<script>
    // Check if the admin is logged out and trying to access an authenticated page
    window.addEventListener('pageshow', function (event) {
        var page = event.target;
        var adminSessionData = <?= json_encode(session()->get('admin_id')) ?>; // Check your admin session variable name

        if (!adminSessionData && page.location.pathname !== 'login') {
            // If the admin is logged out and not on the admin login page, redirect them to the admin login page
            window.location.href = 'login'; // Replace 'admin_login' with your actual admin login page URL
        }
    });
</script>



</body>
</html>
