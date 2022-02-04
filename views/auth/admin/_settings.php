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
                        <option class="bg-secondary text-white" value="null">Enable/Disable Alert</option>
                        <option class="bg-secondary text-white" value="0">Disabled</option>
                        <option class="bg-secondary text-white" value="1">Enabled</option>
                    </select>
                    <label>Alert Color</label>
                    <select class="form-select bg-secondary text-white" name="AlertColor">
                        <option class="bg-secondary text-white" value="0">Purple</option>
                        <option class="bg-secondary text-white" value="1">Orange</option>
                        <option class="bg-secondary text-white" value="2">Gray</option>
                        <option class="bg-secondary text-white" value="3">Blue</option>
                        <option class="bg-secondary text-white" value="4">Red</option>
                        <option class="bg-secondary text-white" value="5">Green</option>
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