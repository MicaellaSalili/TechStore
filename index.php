<?php
// Database connection
$con = mysqli_connect("localhost", "root");
mysqli_select_db($con, "techstore");

// Fetch featured products
$sql = "SELECT * FROM products WHERE featured=1";
$featured = $con->query($sql);

// Fetch unique categories for dropdown
$cat_sql = "SELECT DISTINCT category FROM products ORDER BY category ASC";
$cat_result = $con->query($cat_sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
<?php
$con = mysqli_connect("localhost", "root");
mysqli_select_db($con, "techstore");
$sql = "SELECT * FROM products WHERE featured=1";
$featured = $con->query($sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>TechStore</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@700;900&family=Roboto:wght@400;500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        html, body {
            padding-top: 40px;
            overflow-x: hidden;
            font-family: 'Roboto', Arial, sans-serif;
            background: #f4f6fa;
        }
        .navbar {
            background: #181c20 !important;
            padding-top: 1rem !important;
            padding-bottom: 1rem !important;
        }
        .navbar .navbar-brand {
            font-family: 'Montserrat', Arial, sans-serif;
            font-weight: 900;
            letter-spacing: 2px;
            color: #ffb300 !important;
            font-size: 2rem;
            margin-right: 3.5rem !important;
            margin-left: 0.2rem !important;
        }
        .navbar .nav-link, .navbar .dropdown-toggle {
            font-family: 'Montserrat', Arial, sans-serif;
            font-weight: 700;
            color: #fff !important;
            letter-spacing: 1px;
            transition: color 0.2s;
            margin-right: 0.5rem !important;
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
        .scrolling-row {
            display: flex;
            flex-direction: row;
            overflow-x: auto;
            gap: 2rem;
            padding-bottom: 1rem;
        }
        .scrolling-row::-webkit-scrollbar {
            height: 8px;
        }
        .scrolling-row::-webkit-scrollbar-thumb {
            background: #bdbdbd;
            border-radius: 4px;
        }
        .product-card {
            min-width: 320px;
            max-width: 370px;
            flex: 0 0 auto;
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
        .btn-primary {
            background: #ffb300;
            border: none;
            color: #181c20;
            font-family: 'Montserrat', Arial, sans-serif;
            font-weight: 700;
            letter-spacing: 1px;
            border-radius: 2rem;
            transition: background 0.2s, color 0.2s;
        }
        .btn-primary:hover {
            background: #181c20;
            color: #ffb300;
        }
        h2.text-primary {
            color: #ffb300 !important;
        }
    </style>
</head>
<body class="bg-light">
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary shadow-sm fixed-top" style="z-index: 1080;">
        <div class="d-flex align-items-center w-100" style="padding-left: 1.5rem; padding-right: 1.5rem;">
            <a class="navbar-brand fw-bold me-4">TechStore</a>
            <div class="collapse navbar-collapse show flex-grow-1" id="navbarSupportedContent">
                <ul class="navbar-nav flex-row ms-auto align-items-center mb-2 mb-lg-0" style="gap:2.5rem;">
                    <li class="nav-item active">
                        <a class="nav-link" href="index.php">Home</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-expanded="false">
                            Categories
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <?php while ($row = mysqli_fetch_assoc($cat_result)): ?>
                                <li><a class="dropdown-item" href="#"><?php echo htmlspecialchars($row['category']); ?></a></li>
                            <?php endwhile; ?>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <main class="my-5">
        <h2 class="text-center mb-3 text-primary" style="font-family: 'Montserrat', Arial, sans-serif; font-weight: 900; letter-spacing: 2px;">PRODUCTS</h2>
        <div class="scrolling-row px-3" id="product-list">
            <?php while ($product = mysqli_fetch_assoc($featured)): ?>
            <div class="product-card" data-category="<?= htmlspecialchars($product['category']); ?>">
                <div class="card shadow-sm h-100">
                    <div class="w-100 d-flex justify-content-center align-items-center" style="background: #fff;">
                        <img src="<?= htmlspecialchars($product['image']); ?>" alt="<?= htmlspecialchars($product['title']); ?>" style="width: 220px; height: 220px; object-fit: contain; border-radius: 1rem; background: #ffffffff; display: block;">
                    </div>
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title fw-bold text-dark mb-2"><?= htmlspecialchars($product['title']); ?></h5>
                        <p class="card-text mb-2 fw-bold">Price: <span class="fw-bold text-success">P <?= number_format($product['price'], 2); ?></span></p>
                        <button type="button" class="btn btn-primary fw-bold mt-auto"
                            style="background: #ffb300; color: #181c20; border: 2px solid #ffb300; box-shadow: none;"
                            data-toggle="modal" data-target="#productModal<?= $product['id']; ?>"
                            onfocus="this.style.borderColor='#181c20';"
                            onblur="this.style.borderColor='#ffb300';"
                        >View Details</button>
                    </div>
                </div>
            </div>
            <?php endwhile; ?>
            <?php mysqli_data_seek($featured, 0); while ($product = mysqli_fetch_assoc($featured)): ?>
            <!-- Product Details Modal -->
            <div class="modal fade" id="productModal<?= $product['id']; ?>" tabindex="-1" aria-labelledby="productModalLabel<?= $product['id']; ?>" aria-hidden="true">
                <div class="modal-dialog modal-lg modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title fw-bold" id="productModalLabel<?= $product['id']; ?>"> <?= htmlspecialchars($product['title']); ?> </h5>
                            <button type="button" class="close btn-close" data-dismiss="modal" aria-label="Close" style="box-shadow:none; background:none; border:none; font-size:1.5rem;">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-5 d-flex align-items-center justify-content-center">
                                    <img src="<?= htmlspecialchars($product['image']); ?>" class="img-fluid rounded p-3" alt="<?= htmlspecialchars($product['title']); ?>" style="object-fit:contain; max-height:300px; box-shadow: none;">
                                </div>
                                <div class="col-md-7">
                                    <p class="mb-2"><span class="fw-bold">Price:</span> <span class="text-success fw-bold">P <?= number_format($product['price'], 2); ?></span></p>
                                    <p class="mb-2"><span class="fw-bold">Brand:</span> <?= htmlspecialchars($product['brandname']); ?></p>
                                    <p class="text-muted small"> <?= htmlspecialchars($product['description']); ?> </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php endwhile; ?>
            <div id="no-products-message" class="w-100 text-center text-muted fw-bold mt-5" style="display:none; font-size:1.3rem;">No products available for this category.</div>
        </div>
        <script>
        // Category filter functionality with no products message
        document.querySelectorAll('.dropdown-item').forEach(function(el) {
            el.addEventListener('click', function(e) {
                e.preventDefault();
                var category = this.textContent.trim();
                var found = false;
                document.querySelectorAll('#product-list .product-card').forEach(function(card) {
                    if (card.getAttribute('data-category') === category) {
                        card.style.display = '';
                        found = true;
                    } else {
                        card.style.display = 'none';
                    }
                });
                document.getElementById('no-products-message').style.display = found ? 'none' : '';
            });
        });
        // Home nav resets filter
        document.querySelectorAll('.nav-link[href="index.php"]').forEach(function(el) {
            el.addEventListener('click', function() {
                document.querySelectorAll('#product-list .product-card').forEach(function(card) {
                    card.style.display = '';
                });
                document.getElementById('no-products-message').style.display = 'none';
            });
        });
        </script>
    </main>
 
</body>
</html>