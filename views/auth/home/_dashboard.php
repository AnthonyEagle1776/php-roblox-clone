<div class="row">
    <div class="col-5">
        <?php

        ?>
        <div class="card">
            <div class="card-header bg-info text-white d-flex">
                <div>Hey there, <?php echo GetUsername(); ?>.</div>
            </div>
            <div class="card-body">
                <h4>
                    Status
                </h4>
                <form method="POST" action="../../../logic/status.php">
                    <div class="input-group mb-3">
                        <input type="text" name="status" class="form-control bg-secondary text-white" placeholder="How are you today?">
                        <button type="submit" name="submit" class="btn btn-info"><i class="fas fa-user-edit" style="margin-right: 2.5px"></i>Post</button>
                    </div>
                </form>
                <hr>
                <h4>Recent Updates</h4>
                <p>This feature is still in development!</p>
            </div>
        </div>
    </div>
    <div class="col-7">
        <div class="card">
            <div class="card-header bg-warning text-white">
                Status
            </div>
            <div class="card-body">
                <?php
                $result = GetAllStatus($conn);

                DisplayStatus($result);
                ?>
            </div>
        </div>
    </div>
</div>