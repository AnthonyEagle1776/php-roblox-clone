CREATE TABLE sitesettings (
    /* booleans*/
    alert_enabled NUMBER(1) NOT NULL DEFAULT 0,
    site_maintenance NUMBER(1) NOT NULL DEFAULT 0,
    /* alert stuff*/
    alert_message VARCHAR(255) DEFAULT (NULL),
    alert_color VARCHAR(8) DEFAULT 'primary',
);