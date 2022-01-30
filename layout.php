<?php
include($_SERVER['DOCUMENT_ROOT'] . '/config/variables.php');
session_start();
if (UserIsAuthenticated()) {
    UpdateUser($conn);
}

?>


<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title . ' | ' . $APP_NAME ?></title>
    <link href="https://bootswatch.com/5/cyborg/bootstrap.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;400;500;600;700&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/0c5d709d90.js" crossorigin="anonymous"></script>

    <style>
        body {
            font-family: 'Montserrat', Roboto, -apple-system, BlinkMacSystemFont, "Segoe UI", "Helvetica Neue", Arial, sans-serif;
            font-weight: 500;
        }

        button {
            font-weight: 500 !important;
        }

        header i {
            margin-right: 2.5px;
        }

        .alert i {
            text-align: center;
            vertical-align: middle;
            line-height: 24px;
        }
    </style>
    <?php
    if (IsVariableSet(@$css)) {
        echo $css;
    } else {
        // css is not present and nothing will happen
    }
    ?>

</head>

<body>
    <header class="p-3 bg-info">
        <div class="container">
            <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
                <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                    <li><a class="nav-link px-2 text-white"><?php echo $APP_NAME ?></a></li>
                    <li><a <?php if (UserIsAuthenticated()) {
                                echo 'href="/dashboard"';
                            } else {
                                echo 'href="/"';
                            } ?> class="nav-link px-2 text-white"><i class="fas fa-home"></i>Home</a></li>
                    <li><a href="#" class="nav-link px-2 text-white"><i class="fa fa-comment"></i>Forum</a></li>
                    <li><a href="#" class="nav-link px-2 text-white"><i class="fas fa-users"></i>Users</a></li>
                    <li><a href="#" class="nav-link px-2 text-white">Updates <span class="badge bg-warning">New</span></a></li>
                </ul>

                <form class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3">
                    <input type="search" class="form-control form-control-dark" placeholder="Search <?php echo $APP_NAME ?>..." aria-label="Search">
                </form>

                <div class="text-end">
                    <?php
                    if (!UserIsAuthenticated()) {
                    ?>
                        <button type="button" class="btn btn-warning me-2" onclick="document.location.href='/login';">Login</button>
                        <button type="button" class="btn btn-warning" onclick="document.location.href='/signup';">Sign-up</button>
                    <?php
                    } else {
                    ?>
                        <button type="button" class="btn btn-warning" onclick="document.location.href='/logout';">Logout</button>
                    <?php
                    }
                    ?>
                </div>
            </div>
        </div>
    </header>


    <div class="container">
        <br>
        <?php
        if (IsEnabled($Alert)) {
        ?>
            <div class="alert bg-<?php echo $AlertColor; ?> text-center">
                <div class="row">
                    <div class="col-1">
                        <i class="fas fa-exclamation-circle"></i>
                    </div>
                    <div class="col-10">
                        <span><?php echo $AlertMessage ?></span>
                    </div>
                    <div class="col-1">
                        <i class="fas fa-exclamation-circle"></i>
                    </div>
                </div>
            </div>
        <?php
        }
        ?>
        <?php include($childView); ?>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>