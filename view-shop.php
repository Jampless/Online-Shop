<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="author" content="Sahil Kumar">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Shop</title>
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.min.css' />
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.min.css' />
  
  <style>
    body{
                margin: 0;
                padding: 0;
                background: url(img/bglogin.jfif);
                background-size: cover;
                background-position: center;
            }

    .navbar{
    font-size: 18px;
    top: 0;
    left: 0;
    box-shadow: 0 5px 10px rgba(0, 0, 0, 0.1); 
    }

    .navbar-light .navbar-nav .nav-link{
        padding: 0 20px;
        color: black;
    }

    .navbar-light .navbar-nav .nav-link:hover,
    .navbar i:hover,
    .navbar-light .navbar-nav .nav-link.active,
    .navbar i.active{
        color: pink;
    }

    .navbar i{
        font-size: 1.2rem;
        padding: 0 7px;
        cursor: pointer;
        font-weight: 500;
        transition: 0.3s ease;
    }

    a{
			text-decoration: none;
			color: white;
		}
    a:hover{
			cursor: pointer;
      text-decoration: none;
      color: white;	
		}
  </style>
</head>

<body>
  <!-- Navbar start -->
          <nav class="navbar navbar-expand-lg navbar-light bg-white py-2 fixed-top">
            <div class="container">
              <i>Shopped In</i>
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span><i id="bar" class="fas fa-bars"></i></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto">
                  
                  <li class="nav-item">
                    <a class="nav-link" href="view-Home.html">Home</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link active" href="view-Shop.php">Shop</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="view-about.html">About</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="view-contact.html">Contact Us</a>
                  </li>
                  <li class="nav-item">
                  <a class="nav-link" href="view-cart.php">Cart <span id="cart-item" class="badge badge-danger"></span></a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="login.php">Login</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="register.php">Sign Up</a>
                  </li>
                </ul> 
              </div>
            </div>
        </nav>
  <!-- Navbar end -->

  <!-- Displaying Products Start -->
  <div class="container pt-5">
    <div id="message"></div>
    <div class="row mt-5 pb-5">
      <?php
  			include 'config.php';
  			$stmt = $conn->prepare('SELECT * FROM product');
  			$stmt->execute();
  			$result = $stmt->get_result();
  			while ($row = $result->fetch_assoc()):
  		?>
      <div class="col-sm-6 col-md-4 col-lg-3 mb-2">
        <div class="card-deck" >
          <div class="card p-2 border-secondary mb-2" style="background-color:pink;">
            <img src="<?= $row['product_image'] ?>" class="card-img-top" height="250">
            <div class="card-body p-1">
              <h5 class="card-title text-center text-info"><?= $row['product_name'] ?></h5>
              <h6 class="card-text text-center text-danger">&#8369; <?= number_format($row['product_price'],2) ?></h6>

            </div>
            <div class="card-footer p-1">
              <form action="" class="form-submit" >
                <div class="row p-2">
                  <div class="col-md-6 py-1 pl-4">
                    <b>Quantity : </b>
                  </div>
                  <div class="col-md-6">
                    <input type="number" class="form-control pqty" value="1">
                  </div>
                </div>
                <input type="hidden" class="pid" value="<?= $row['id'] ?>">
                <input type="hidden" class="pname" value="<?= $row['product_name'] ?>">
                <input type="hidden" class="pprice" value="<?= $row['product_price'] ?>">
                <input type="hidden" class="pimage" value="<?= $row['product_image'] ?>">
                <input type="hidden" class="pcode" value="<?= $row['product_code'] ?>">
                <button class="btn btn-info btn-block"><a href="login.php" ><i class="fas fa-cart-plus"></i>&nbsp;&nbsp;Add to cart</a></button>
              </form>
            </div>
          </div>
        </div>
      </div>
      <?php endwhile; ?>
    </div>
  </div>
  <!-- Displaying Products End -->

  
  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js'></script>
  <script src='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/js/bootstrap.min.js'></script>

  
</body>

</html>