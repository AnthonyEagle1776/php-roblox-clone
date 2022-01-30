<div class="card">
    <div class="card-header bg-warning text-white">
        Users
    </div>
    <div class="card-body">
        <?php
        $result = GetAllStatus($conn);

        DisplayUser($result);
        ?>
    </div>
</div>