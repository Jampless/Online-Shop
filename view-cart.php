<?php
  session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="author" content="Sahil Kumar">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Cart</title>
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.min.css' />
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.min.css' />

  <style>
    body{
      margin: 0;
      padding: 7%;
      background: url(img/bg1.jpg);
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
  </style>
</head>

<body>
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
                    <a class="nav-link" href="view-Shop.php">Shop</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="view-about.html">About</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="view-contact.html">Contact Us</a>
                  </li>
                  <li class="nav-item">
                  <a class="nav-link active" href="view-cart.php">Cart <span id="cart-item" class="badge badge-danger"></span></a>
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

  <div class="container mt-1">
    <div class="row justify-content-center">
      <div class="col-lg-10">
        
        <div class="table-responsive mt-2">
          <table class="table table-bordered table-striped text-center">
            <thead>
              <tr>
                <td colspan="7">
                  <h4 class="text-center m-0">Products in your cart!</h4>
                </td>
              </tr>
              <tr>
                <th>ID</th>
                <th>Image</th>
                <th>Product</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Total Price</th>
                <th>
                  <a href="view-cart.php?clear=all" class="badge-danger badge p-1" onclick="return confirm('Are you sure want to clear your cart?');"><i class="fas fa-trash"></i>&nbsp;&nbsp;Clear Cart</a>
                </th>
              </tr>
            </thead>
            <tbody>
              <?php
                require 'view-config.php';
                $stmt = $conn->prepare('SELECT * FROM cart');
                $stmt->execute();
                $result = $stmt->get_result();
                $grand_total = 0;
                while ($row = $result->fetch_assoc()):
              ?>
              <tr>
                <td><?= $row['id'] ?></td>
                <input type="hidden" class="pid" value="<?= $row['id'] ?>">
                <td><img src="<?= $row['product_image'] ?>" width="50"></td>
                <td><?= $row['product_name'] ?></td>
                <td>
                &#8369; <?= number_format($row['product_price'],2); ?>
                </td>
                <input type="hidden" class="pprice" value="<?= $row['product_price'] ?>">
                <td>
                  <input type="number" class="form-control itemQty" value="<?= $row['qty'] ?>" style="width:75px;">
                </td>
                <td>&#8369; <?= number_format($row['total_price'],2); ?></td>
                <td>
                  <a href="action.php?remove=<?= $row['id'] ?>" class="text-danger lead" onclick="return confirm('Are you sure want to remove this item?');"><i class="fas fa-trash-alt"></i></a>
                </td>
              </tr>
              <?php $grand_total += $row['total_price']; ?>
              <?php endwhile; ?>
              <tr>
                
                <td colspan="5" align="right"><b>Total</b></td>
                <td><b>&#8369; <?= number_format($grand_total,2); ?></b></td>
                <td>
                  <a href="checkout.php" class="btn btn-info <?= ($grand_total > 1) ? '' : 'disabled'; ?>"><i class="far fa-credit-card"></i>&nbsp;&nbsp;Checkout</a>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>

  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js'></script>
  <script src='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/js/bootstrap.min.js'></script>

  
</body>

</html>