<?php
// site settings check
$getSiteSettings = "SELECT * FROM sitesettings";
$result = mysqli_query($conn, $getSiteSettings);
// alert variables
$Alert;
$AlertMessage;
$AlertColor;
$MaintenanceMode;

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while ($row = mysqli_fetch_assoc($result)) {
        $Alert = $row['alert_enabled'];
        $AlertMessage = $row['alert_message'];
        $AlertColor = $row['alert_color'];
        $MaintenanceMode = $row['site_maintenance'];
    }
} else {
    echo "0 results";
}
