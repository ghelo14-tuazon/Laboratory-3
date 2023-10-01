<!DOCTYPE html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tuazon Shop</title>
    <link href="https://fonts.googleapis.com/css?family=Cairo:400,600,700&amp;display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Poppins:600&amp;display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Playfair+Display:400i,700i" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Ubuntu&amp;display=swap" rel="stylesheet">
    <link rel="shortcut icon" type="image/x-icon" href="<?= base_url('assets/images/logo.png'); ?>">
<link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/bootstrap.min.css'); ?>">
<link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/animate.min.css'); ?>">
<link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/font-awesome.min.css'); ?>">
<link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/nice-select.css'); ?>">
<link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/slick.min.css'); ?>">
<link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/style.css'); ?>">
<link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/main-color.css'); ?>">

</head>
<style>
    /* Add this CSS to your existing code */
    body {
        display: flex;
        flex-direction: column;
        min-height: 100vh; /* Set min-height to 100vh */
        margin: 0; /* Reset default margin */
        padding: 0; /* Reset default padding */
    }

    .biolife-sticky-object {
        margin-top: auto;
    }

    /* Add additional styling to your footer as needed */
    #footer {
        background-color: #f5f5f5;
        padding:10px; /* Adjust the padding as needed */
        position: absolute;
        bottom: 0;
        width: 100%;
        text-align: center;
    }
    .product-card {
    border: 1px solid #ddd;
    border-radius: 8px;
    margin: 20px auto;
    max-width: 800px; /* Increase the max-width as needed */
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
}

.product-content {
    display: flex;
    flex-direction: row; /* Ensure items are in a row */
    overflow: hidden; /* Hide content that overflows */
}

.product-info {
    flex: 1;
    padding: 30px; /* Increase the padding for more space */
    font-size: 18px; /* Increase the font size for larger text */
}

.product-image-container {
    flex: 1;
    text-align: center;
    background-color: white; /* Add a background color for separation */
}

.product-image {
    max-width: 100%;
    max-height: 100%;
    width: auto;
    height: auto;
}


</style>


<body class="biolife-body">

    <!-- Preloader -->
   

    <!-- HEADER -->
    <header id="header" class="header-area style-01 layout-03">
        <div class="header-top bg-main hidden-xs">
            <div class="container">
                <div class="top-bar left">
                    <ul class="horizontal-menu">
                        <li><a href="#"><i class="fa fa-envelope" aria-hidden="true"></i>your email here</a></li>
                        <li><a href="#">A good deal for you</a></li>
                    </ul>
                </div>
                <div class="top-bar right">
                    <ul class="social-list">
                        <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                    </ul>
                    <ul class="horizontal-menu">
                        <li class="horz-menu-item currency">
                            <select name="currency">
                                <option value="eur">€ EUR (Euro)</option>
                                <option value="usd" selected>$ USD (Dollar)</option>
                                <option value="usd">£ GBP (Pound)</option>
                                <option value="usd">¥ JPY (Yen)</option>
                            </select>
                        </li>
                        <li class="horz-menu-item lang">
                            <select name="language">
                                <option value="fr">French (EUR)</option>
                                <option value="en" selected>English (USD)</option>
                                <option value="ger">Germany (GBP)</option>
                                <option value="jp">Japan (JPY)</option>
                            </select>
                        </li>
                        <li><a href="<?= base_url('userlogout') ?>" class="login-link"><i class="biolife-icon icon-login"></i>Logout</a></li>


                    </ul>
                </div>
            </div>
        </div>
        <div class="header-middle biolife-sticky-object">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-md-2 col-md-6 col-xs-6">
                    <a class="biolife-logo"><img src="<?= base_url('assets/images/logo.png'); ?>" alt="biolife logo" width="135" height="34"></a>

                    </div>
                    <div class="col-lg-6 col-md-7 hidden-sm hidden-xs">
                        <div class="primary-menu">
                            <ul class="menu biolife-menu clone-main-menu clone-primary-menu" id="primary-menu" data-menuname="main menu">
                            <li class="menu-item"><a href="<?= base_url('index'); ?>">Home</a></li>

                               
                                <!-- Insert your footer here -->
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
<!-- Add this code in your "products_view.php" -->
<body class="biolife-body">
    <!-- ... (Your existing body content) ... -->
    
    <div class="container">
    <?php if ($student) : ?>
        <div class="product-card">
            <div class="product-content">
                <div class="product-info">
                    <h2><?= esc($student['name']); ?></h2>
                    <p><strong>Category:</strong> <?= esc($student['category']); ?></p>
                    <p><strong>Description:</strong> <?= esc($student['description']); ?></p>
                    <p><strong>Quantity:</strong> <?= $student['quantity']; ?></p>
                    <p><strong>Price:</strong> <?= number_format($student['price'], 2); ?> Pesos</p>
                </div>
                <div class="product-image-container">
                    <img src="<?= base_url('upload/' . $student['image_name']); ?>" alt="<?= esc($student['name']); ?>" class="product-image">
                </div>
            </div>
        </div>
    <?php else : ?>
        <p>Product not found.</p>
    <?php endif; ?>
</div>

<footer id="footer">
        <div class="container">
            <p>&copy; 2023 Tuazon Shop. All rights reserved.</p>
        </div>
    </footer>


</body>
</html>
