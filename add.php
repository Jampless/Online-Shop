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
<meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Dashboard</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>

        <style>
            .title{
                font-size: 50px;
            }

            .signupbox{
                max-width: 900px;
                width: 100%;
                background: #fff;
                padding: 25px 30px;
                border-radius: 10px;
            }

            .signupbox form .user-details{
                display: flex;
                flex-wrap: wrap;
            }

            form .user-details .input-box{
                margin: 10px 0 6px 0;
                width: calc(100% / 2 - 20px);
            }

            .user-details .input-box .details{
                display: block;
                font-weight: 650;
                margin-bottom: 5px;
            }

            .user-details .input-box input{
                height: 33px;
                width: 95%;
                outline: none;
                border-radius: 5px;
                border: 1px solid #ccc;
                padding-left: 10px;
            }

            form .button{
                border-radius: 50px;
                height: 45px;
                margin: 30px 0;
                
            }

            form .button input{
                height: 68%;
                width: 20%;
                color: #fff;
                border: none;
                font-size: 20px;
                font-weight: 650;
                letter-spacing: 1px;
                background-color: grey;
                background-size: center;
                background-position: center;
                border-radius: 50px;
            }

            form .button input:hover{
                color: white;
                background-color: black;
                stroke: black;
            }

        </style>
    </head>

<body>
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3" href="Admin.php">Shopped In</a>
            <!-- Sidebar Toggle-->
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
            <!-- Navbar Search-->
            <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">

            </form>
            <!-- Navbar-->
            <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item logout" href="view-home.html?logout='1'">Logout</a></li>
                    </ul>
                </li>
            </ul>
        </nav>

        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <a class="nav-link" href="Admin.php">Orders</a>
                            <a class="nav-link" href="products.php"> Products </a>
                            <div class="sb-sidenav-menu-heading">Users</div>
                            <a class="nav-link" href="user.php">Accounts</a>
                        </div>
                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
                <div class="signupbox mt-5">
                    <h1 class="text text-success" align="center">Product Added Successfully!</h1>
                    <form method="POST" action="action.php">
						<div class="button">
							<h4 align="center">
								<a href="products.php" class="btn btn-danger">View Product</a>
								<a href="addproduct.php" class="btn btn-danger">Add Product</a>
							<h4>
						</div>
                    </form>
                </div>
            </div>
        </div>
  		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>

        <script type="text/javascript">
  $(document).ready(function() {

    // Send product details in the server
    $(".addnow").click(function(e) {
      e.preventDefault();
      var $form = $(this).closest(".form-submit");
      var pid = $form.find(".pid").val();
      var pname = $form.find(".pname").val();
      var pprice = $form.find(".pprice").val();
      var pimage = $form.find(".pimage").val();
      var pcode = $form.find(".pcode").val();

      var pqty = $form.find(".pqty").val();

      $.ajax({
        url: 'action.php',
        method: 'post',
        data: {
          pid: pid,
          pname: pname,
          pprice: pprice,
          pqty: pqty,
          pimage: pimage,
          pcode: pcode
        },
        success: function(response) {
          $("#message").html(response);
          window.scrollTo(0, 0);
          load_cart_item_number();
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