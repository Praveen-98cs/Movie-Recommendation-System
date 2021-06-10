<?php
//start session
@session_start();

//number of items in the shopping cart
$count=0;

//retrieve the cart content
if ( isset ( $_SESSION['cart'] ) ){
    $cart = $_SESSION['cart'];

    if  ( $cart ) {
        $items = explode(',', $cart);
        $count = count($items);
    }
}

//check to see if a user if logged in
$login = '';
$name = '';
$role = 0;

if (isset($_SESSION['login'])){
    $login = $_SESSION['login'];
}

if (isset($_SESSION['name'])) {
    $name = $_SESSION['name'];
}

if (isset($_SESSION['role'])){
    $role = $_SESSION['role'];
}

if (isset($_SESSION['id'])) {
    $session_id = $_SESSION['id'];
}

?>
<!DOCTYPE html>
<html>
<head>

    <title><?php echo $page_title; ?></title>

    <link rel="stylesheet" type="text/css" href="styles/style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

</head>
<body id="<?php echo $body_id ?>">

    <nav class="navbar navbar-expand-lg navbar-dark bg-light" id="nav1">
             <a class="navbar-brand" href="index.php">TMRS</a>
             <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#divlist"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
             <span class="navbar-toggler-icon"></span>
             </button>

        <div class="collapse navbar-collapse justify-content-end" id="divlist">
            <?php
                if ($role == 1) : ?>
                    <ul class="navbar-nav">
                            <li class="nav-item "><a href="#" class="nav-link">Hi, <?php echo $name; ?>!</a></li>
                            <li class="nav-item "><a class="nav-link" href="index.php">Home </a></li>
                            <li class="nav-item"><a href="community.php" class="nav-link">Community</a></li>
                            <li class="nav-item"><a href="logout.php" class="nav-link">Logout</a></li>

                    </ul>

         </div>
    </nav>
            <?php
            endif;
            if ($role == 2) : ?>
                    <ul class="navbar-nav">
                            <li class="nav-item "><a href="#" class="nav-link">Hi, <?php print_r($name); ?>!</a></li>
                            <li class="nav-item "><a class="nav-link" href="index.php">Home </a></li>
                            <li class="nav-item"><a href="community.php" class="nav-link">Community</a></li>
                            <li class="nav-item"><a href="logout.php" class="nav-link">Logout</a></li>
                     </ul>

        </div>
     </nav>
            <?php
            endif;
            if (empty($login)) : ?>
                    <ul class="navbar-nav">
                        <li class="nav-item "><a class="nav-link" href="index.php">Home </a></li>
                        <li class="nav-item"><a href="community.php" class="nav-link">Community</a></li>
                        <li class="nav-item"><a href="loginpage.php" class="nav-link">Login</a></li>
                        <li class="nav-item"><a href="registration.php" class="nav-link">Register</a></li>


                    </ul>

          </div>
    </nav>

            <?php endif; ?>
