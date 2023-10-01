<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Information</title>
    <!-- Add Bootstrap CSS link here -->
    
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        /* Custom CSS styles */
        .container {
            max-width: 800px; /* Adjusted max-width for larger card */
        }

        .product-card {
            border: 1px solid #ddd;
            margin-top: 20px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.2);
        }

        .product-card .card-body {
            padding: 30px;
        }

        .product-card .card-title {
            font-size: 28px;
            font-weight: bold;
            margin-bottom: 20px;
        }

        /* Apply custom class for smaller font size */
        .smaller-font {
            font-size: 15px;
        }

        .action-links {
            margin-top: 20px;
        }

        .action-links a {
            margin-right: 10px;
        }

        .back-button {
            margin-top: 20px;
        }

        .product-image {
            max-width: 100%;
            height: auto;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center">Product Information</h1>
        <div class="mt-3 back-button">
            <a href="<?= site_url("test") ?>" class="btn btn-primary">Back</a>
        </div>
        <?php if ($student): ?>
        <div class="card product-card">
            <div class="row">
                <div class="col-md-6">
                    <img src="<?= base_url($student['image_data']) ?>" alt="<?= $student['image_name'] ?>" class="product-image" />
                </div>
                <div class="col-md-6">
                    <div class="card-body">
                        <h2 class="card-title"><?= $student['name'] ?></h2>
                        <p class="card-text">Category: <?= $student['category'] ?></p>
                        <p class="card-text">Description: <?= $student['description'] ?></p>
                        <p class="card-text">Price: <?= number_format($student['price'], 2) ?></p>
                        <p class="card-text">In Stock: <?= $student['quantity'] ?> units</p>
                        <!-- Update and Delete Links -->
                        <div class="action-links">
                            <a href="/update/<?= $student['id'] ?>" class="btn btn-primary">Update</a>
                            <a href="/delete/<?= $student['id'] ?>" class="btn btn-danger">Delete</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php else: ?>
        <p class="text-danger text-center mt-3">Product not found.</p>
        <?php endif; ?>
    </div>

    <!-- Bootstrap JS and jQuery scripts can be added here -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
