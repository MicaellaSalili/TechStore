<?php
$con = mysqli_connect("localhost", "root");
mysqli_select_db($con, "techstore");
$sql = "SELECT * FROM products WHERE featured=1";
$featured = $con->query($sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Product Details - TechStore</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@700;900&family=Roboto:wght@400;500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="js/bootstrap.bundle.min.js"></script>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        html, body {
            padding-top: 70px;
            overflow-x: hidden;
            font-family: 'Roboto', Arial, sans-serif;
            background: #ffffff;
        }
        .navbar {
            background: #181c20 !important;
        }
        .navbar .navbar-brand {
            font-family: 'Montserrat', Arial, sans-serif;
            font-weight: 900;
            letter-spacing: 2px;
            color: #ffb300 !important;
            font-size: 2rem;
        }
        .navbar .nav-link, .navbar .dropdown-toggle {
            font-family: 'Montserrat', Arial, sans-serif;
            font-weight: 700;
            color: #fff !important;
            letter-spacing: 1px;
            transition: color 0.2s;
        }
        .navbar .nav-link:hover, .navbar .dropdown-toggle:hover {
            color: #ffb300 !important;
        }
        .dropdown-menu {
            background: #23272b;
        }
        .dropdown-item {
            color: #fff;
            font-weight: 500;
        }
        .dropdown-item:hover {
            background: #ffb300;
            color: #23272b;
        }
        .card {
            border-radius: 1.2rem;
            border: none;
            box-shadow: 0 4px 24px 0 rgba(24,28,32,0.08);
            transition: transform 0.2s, box-shadow 0.2s;
        }
        .card:hover {
            transform: translateY(-8px) scale(1.03);
            box-shadow: 0 8px 32px 0 rgba(24,28,32,0.16);
        }
        .card-title {
            font-family: 'Montserrat', Arial, sans-serif;
            font-weight: 900;
            font-size: 1.3rem;
            color: #181c20;
        }
        .card-text {
            font-size: 1.1rem;
        }
        .btn-primary, .btn-outline-primary {
            background: #ffb300;
            border: none;
            color: #181c20;
            font-family: 'Montserrat', Arial, sans-serif;
            font-weight: 700;
            letter-spacing: 1px;
            border-radius: 2rem;
            transition: background 0.2s, color 0.2s;
        }
        .btn-primary:hover, .btn-outline-primary:hover {
            background: #181c20;
            color: #ffb300;
        }
        h2.text-gold {
            color: #ffb300 !important;
            font-family: 'Montserrat', Arial, sans-serif;
            font-weight: 900;
            text-transform: uppercase;
            letter-spacing: 2px;
        }
    </style>
</head>
<body style="background:#ffffff;">
    <nav class="navbar navbar-expand-lg navbar-dark shadow-sm fixed-top" style="z-index: 1080;">
        <div class="container">
            <a class="navbar-brand fw-bold" href="index.php">TechStore</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item active">
                        <a class="nav-link" href="index.php">Home</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <main class="my-5">
        <h2 class="text-center mb-4 text-gold">Product Details</h2>
        <div class="row justify-content-center">
            <?php if (mysqli_num_rows($featured) === 0): ?>
                <div class="col-12">
                    <div class="alert alert-info text-center">No product details available.</div>
                </div>
            <?php endif; ?>
            <?php while ($product = mysqli_fetch_assoc($featured)): ?>
                <div class="col-lg-7 col-md-9 col-sm-12">
                    <div class="card shadow h-100 border-0 mb-4">
                        <div class="row g-0">
                            <div class="col-md-5 d-flex align-items-center justify-content-center rounded-start" style="background:#ffffff;">
                                <img src="<?= $product['image']; ?>" class="img-fluid rounded p-3" alt="<?= $product['title']; ?>" style="object-fit:contain; max-height:300px;  box-shadow: none;">
                            </div>
                            <div class="col-md-7">
                                <div class="card-body">
                                    <h4 class="card-title fw-bold mb-3" style="color: #000000ff;"> <?= $product['title']; ?> </h4>
                                    <p class="card-text mb-2"> <span class="fw-bold">Price:</span> <span class="text-success fw-bold">P <?= $product['price']; ?></span></p>
                                    <p class="card-text mb-2"> <span class="fw-bold">Brand:</span> <?= $product['brandname']; ?> </p>
                                    <p class="card-text text-muted small"> <?= $product['description']; ?> </p>
                                    <a href="index.php" class="btn btn-outline-primary mt-3" style="background: #ffb300; color: #181c20; border: none;">Back to Products</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endwhile; ?>
        </div>
    </main>
</body>
</html>