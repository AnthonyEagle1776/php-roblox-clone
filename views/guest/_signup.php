<div class="row">
    <div class="col-5" style="margin: auto;">
        <div class="card border-0">
            <div class="card-header bg-warning text-white">
                Sign-up
            </div>
            <div class="card-body">
                <form autocomplete="false" action="../logic/signup.php" method="post">
                    <div class="mb-3">
                      <label for="Username" class="form-label">Username</label>
                      <input name="username" type="text" class="form-control bg-secondary text-white" id="Username">
                    </div>
                    <div class="mb-3">
                        <label for="Email" class="form-label">Email address</label>
                        <input name="email" type="email" class="form-control bg-secondary text-white" id="Email">
                    </div>
                    <div class="mb-3">
                        <label for="Password" class="form-label">Password</label>
                        <input name="password" type="password" class="form-control bg-secondary text-white" id="Password">
                    </div>
                    <div class="mb-3">
                        <label for="passwordRepeat" class="form-label">Repeat Password</label>
                        <input name="passwordRepeat" type="password" class="form-control bg-secondary text-white" id="passwordRepeat">
                    </div>
                    <button type="submit" class="btn btn-warning" name="submit">Sign Up</button>
                </form>
            </div>
        </div>
    </div>
</div>
