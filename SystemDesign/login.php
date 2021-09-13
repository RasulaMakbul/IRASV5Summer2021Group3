<?php
    require 'php/middleware.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SPMS | IRASV5</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="style.css" rel="stylesheet">

</head>

<body>
    <div class="container" >
        <img src="iubLogo.png" alt="">
        
        
    </div>
    <div class="card-body">
        <form action="php/auth.php" method="post">
            <table >
                <tr>
                    <th>
                        <label for="lblUserID">User ID: </label>
                    </th>
                    <th>
                        <input type="text" name="email" id="email" placeholder="enter your ID">
                    </th>
                </tr>
                <tr>
                    <th>
                        <label for="lblPassword">Password : </label>
                    </th>
                    <th>
                        <input type="text" name="password" id="password" placeholder="enter password">
                    </th>
                </tr>
            </table>
            <button type="submit" class="login"  name=""  style="position: absolute; top: 120px; right: 60px; margin: 1px; color: #02BBED; background: border-box; padding: 6px 6px; font-size: 15px; border: none;">
                sign In
            </button>
        </form>
    </div>

    

    
</body>
    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

</body>

</html>