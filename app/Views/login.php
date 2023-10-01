<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Admin Login</title>
</head>
<body  style="background-image: url('<?= base_url('assets/images/bg.jpg'); ?>'); background-size: cover;">
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h1 class="text-center">Admin Login</h1>
                    </div>
                    <div class="card-body">
                        <form method="post" action="<?= site_url('login') ?>">
                        <div class="form-group">
                                <label for="username">Email:</label>
                                <input type="text" class="form-control" id="email" name="email" required>
                            </div>
                          
                            <div class="form-group">
                                <label for="password">Password:</label>
                                <input type="password" class="form-control" id="password" name="password" required>
                            </div>
                            <div class="text-center">
    <button type="submit" class="btn btn-primary btn-block">Login</button>
</div>

<div style="margin-top: 10px;"> <!-- You can adjust the margin-top value as needed -->
    <a href="<?= base_url('userlogin') ?>" class="btn btn-secondary btn-block">Login as User</a>
</div>

                        </form>
                    </div>
                    <div class="card-footer text-center">
                        Don't have an account? <a href="<?= site_url('register') ?>">Register</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@
