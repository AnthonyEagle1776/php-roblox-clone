<div class="row">
    <div class="col-5" style="margin: auto;">
        <div class="card border-0">
            <div class="card-header bg-info text-white">
                Login
            </div>
            <div class="card-body">
                <?php
                // alert section
                if (isset($_GET["note"])) {
                ?>

                    <div class="alert alert-success text-center">
                        <?php echo $_GET["note"] ?>
                    </div>

                <?php
                }
                ?>
                <?php
                // alert section
                if (isset($_GET["error"])) {
                ?>

                    <div class="alert alert-danger text-center">
                        <?php echo $_GET["error"] ?>
                    </div>

                <?php
                }
                ?>
                <form method="POST" action="../logic/login.php">
                    <div class="mb-3">
                        <label for="Username" class="form-label">Email address</label>
                        <input type="text" class="form-control bg-secondary text-white" id="Username" name="username">
                    </div>
                    <div class="mb-3">
                        <label for="Password" class="form-label">Password</label>
                        <input name="password" type="password" class="form-control bg-secondary text-white" id="Pasword">
                    </div>
                    <button type="submit" name="submit" class="btn btn-info w-100">Login</button>
                </form>
            </div>
        </div>
    </div>
</div>