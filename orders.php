<?php
  session_start();

  if (isset($_GET['logout'])) {
  	session_destroy();
  	unset($_SESSION['username']);
  	header("location: view-home.html");
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Orders</title>

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
                    <a class="nav-link" href="Home.html">Home</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="Shop.php">Shop</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="about.html">About</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="contact.html">Contact Us</a>
                  </li>
                  <li class="nav-item">
                  <a class="nav-link active" href="cart.php">Cart <span id="cart-item" class="badge badge-danger"></span></a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="view-home.html?logout='1'">Logout</a>
                  </li>
                </ul> 
              </div>
            </div>
    </nav>
    
    <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-10">
        <div style="display:<?php if (isset($_SESSION['showAlert'])) {
          echo $_SESSION['showAlert'];
          } else {
              echo 'none';
          } unset($_SESSION['showAlert']); ?>" class="alert alert-success alert-dismissible mt-3">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <strong><?php if (isset($_SESSION['message'])) {
            echo $_SESSION['message'];
            } unset($_SESSION['showAlert']); ?></strong>
        </div>
        <div class="table-responsive mt-2">
          <table class="table table-bordered table-striped text-center">
            <thead>
              <tr>
                <td colspan="8">
                  <h4 class="text-center m-0">Your Orders!</h4>
                </td>
              </tr>
              <tr>
                <th>ID</th>
                <th>Products</th>
                <th>Type of Payment</th>
                <th>Status</th>
                <th>Total</th>
                <th>
                </th>
              </tr>
            </thead>
            <tbody>
              <?php
                require 'config.php';
                $stmt = $conn->prepare('SELECT * FROM orders');
                $stmt->execute();
                $result = $stmt->get_result();
                $grand_total = 0;
                while ($row = $result->fetch_assoc()):
              ?>
              <tr>
                <td><?= $row['id'] ?></td>
                <input type="hidden" class="pid" value="<?= $row['id'] ?>">
                <td><?= $row['products'] ?></td>
                <td><?= $row['pmode']?></td>
                <td>&#8369; <?= number_format($row['amount_paid'],2); ?></td>
                <td><?= $row['status']?></td>
                <td>
                  <a href="action.php?cancel=<?= $row['id'] ?>" class="text-danger lead" onclick="return confirm('Are you sure want to cancel this order?');">Cancel Order</a>
                </td>
              </tr>
              <?php endwhile; ?>
              
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>

  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js'></script>
  <script src='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/js/bootstrap.min.js'></script>


  <script type="text/javascript">
  $(document).ready(function() {

    // Change the item quantity
    $(".itemQty").on('change', function() {
      var $el = $(this).closest('tr');

      var pid = $el.find(".pid").val();
      var pprice = $el.find(".pprice").val();
      var qty = $el.find(".itemQty").val();
      location.reload(true);
      $.ajax({
        url: 'action.php',
        method: 'post',
        cache: false,
        data: {
          qty: qty,
          pid: pid,
          pprice: pprice
        },
        success: function(response) {
          console.log(response);
        }
      });
    });

    // Load total no.of items added in the cart and display in the navbar
    load_cart_item_number();

    function load_cart_item_number() {
      $.ajax({
        url: 'action.php',
        method: 'get',
        data: {
          cartItem: "cart_item"
        },
        success: function(response) {
          $("#cart-item").html(response);
        }
      });
    }
  });
  </script>
</body>
</html>