CREATE TABLE sitesettings (
    /* booleans*/
    alert_enabled BOOLEAN NOT NULL DEFAULT 0,
    site_maintenance BOOLEAN NOT NULL DEFAULT 0,
    /* alert stuff*/
    alert_message VARCHAR(255) DEFAULT (NULL),
    alert_color VARCHAR(8) DEFAULT 'primary'
);

/* The defualt settings template with a stock alert and site maintenance disabled. */
INSERT INTO `sitesettings` (`alert_enabled`, `site_maintenance`, `alert_message`, `alert_color`) VALUES
(1, 0, 'RobloxClone is in development!', 'primary');

/* For older users of this repository, if your sitesettings shipped with an ID run this SQL command */

ALTER TABLE `sitesettings` DROP `id`;