<div class="row">
    <div class="col-6" style="margin: auto">
        <div class="card">
            <div class="card-body">
                <a href="/admin/settings/" class="btn-warning btn w-100" style="margin-bottom: 15px">
                    Site Settings
                </a>
                <a href="#" class="btn-info btn w-100" style="margin-bottom: 15px">
                    Moderation
                </a>
                <a href="/admin/maintenance/" class="btn-danger btn w-100" style="margin-bottom: 15px">
                    Maintenance
                </a>
                <a href="#" class="btn-secondary btn w-100">
                    Banned Users
                </a>
                <?php
                if (IsSuperAdmin(GetUserAdmin())) {
                ?>
                    <a href="/phpmyadmin" class="btn-success btn w-100" style="margin-top: 15px">
                        Database Dashboard
                    </a>
                <?php
                }
                ?>
            </div>
        </div>
    </div>
</div>