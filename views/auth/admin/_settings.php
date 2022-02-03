<div class="row">
    <div class="col-4">
        <div class="card">
            <div class="card-header bg-info text-white">
                Alerts
            </div>
            <div class="card-body">
                <form action="/logic/alert.php" method="POST">
                    <label>Enable/Disable Alert</label>
                    <select class="form-select bg-secondary text-white" name="AlertEnabled">
                        <option class="bg-secondary text-white" selected value="0">Disabled</option>
                        <option class="bg-secondary text-white" value="1">Enabled</option>
                    </select>
                    <label>Alert Color</label>
                    <select class="form-select bg-secondary text-white" name="AlertColor">
                        <option class="bg-secondary text-white" selected value="info">Purple</option>
                        <option class="bg-secondary text-white" value="warning">Orange</option>
                        <option class="bg-secondary text-white" value="secondary">Gray</option>
                        <option class="bg-secondary text-white" value="primary">Blue</option>
                        <option class="bg-secondary text-white" value="danger">Red</option>
                    </select>
                    <label>Alert Message</label>
                    <input type="text" class="form-control bg-secondary text-white" name="AlertMessage">
                    <button type="submit" name="submit" class="btn btn-warning w-100" style="margin-top: 12px;">
                        Set Alert
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>