; <?php exit; // DO NOT DELETE?>
; DO NOT DELETE THE ABOVE LINE!!!
; Doing so will expose this configuration file through your web site!
;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;

;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;
;
; config.TEMPLATE.inc.php
;
; Copyright (c) 2014-2024 Simon Fraser University
; Copyright (c) 2003-2024 John Willinsky
; Distributed under the GNU GPL v3. For full terms see the file docs/COPYING.
;
; OJS Configuration settings.
; Rename config.TEMPLATE.inc.php to config.inc.php to use.
;
;
;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;


;;;;;;;;;;;;;;;;;;;;
; General Settings ;
;;;;;;;;;;;;;;;;;;;;

[general]

; Set this to On once the system has been installed
; (This is generally done automatically by the installer)
installed = On

; The canonical URL to the OJS installation (excluding the trailing slash)
base_url = "https://win.joninstitute.org"

; Enable strict mode. This will more aggressively cause errors/warnings when
; deprecated behaviour exists in the codebase.
strict = Off

; Session cookie name
session_cookie_name = OJSSID

; Session cookie path; if not specified, defaults to the detected base path
; session_cookie_path = /

; Number of days to save login cookie for if user selects to remember
; (set to 0 to force expiration at end of current session)
session_lifetime = 30

; SameSite configuration for the cookie, see possible values and explanations
; at https://developer.mozilla.org/en-US/docs/Web/HTTP/Headers/Set-Cookie/SameSite
; To set the "Secure" attribute for the cookie see the setting force_ssl at the [security] group
session_samesite = Lax

; Enable support for running scheduled tasks
; Set this to On if you have set up the scheduled tasks script to
; execute periodically
scheduled_tasks = Off

; Scheduled tasks will send email about processing
; only in case of errors. Set to off to receive
; all other kind of notification, including success,
; warnings and notices.
scheduled_tasks_report_error_only = On

; Site time zone
; Please refer to https://www.php.net/timezones for a full list of supported
; time zones.
; I.e.: "Europe/Amsterdam"
; time_zone="Europe/Amsterdam"
time_zone = UTC

; Short and long date formats
date_format_short = "Y-m-d"
date_format_long = "F j, Y"
datetime_format_short = "Y-m-d h:i A"
datetime_format_long = "F j, Y - h:i A"
time_format = "h:i A"

; Use fopen(...) for URL-based reads. Modern versions of dspace
; will not accept requests using fopen, as it does not provide a
; User Agent, so this option is disabled by default. If this feature
; is disabled by PHP's configuration, this setting will be ignored.
allow_url_fopen = Off

; Base URL override settings: Entries like the following examples can
; be used to override the base URLs used by OJS. If you want to use a
; proxy to rewrite URLs to OJS, configure your proxy's URL with this format.
; Syntax: base_url[journal_path] = http://www.example.com
;
; Example1: URLs that aren't part of a particular journal.
;    Example1: base_url[index] = http://www.example.com
; Example2: URLs that map to a subdirectory.
;    Example2: base_url[myJournal] = http://www.example.com/myJournal
; Example3: URLs that map to a subdomain.
;    Example3: base_url[myOtherJournal] = http://myOtherJournal.example.com

; Generate RESTful URLs using mod_rewrite. This requires the
; rewrite directive to be enabled in your .htaccess or httpd.conf.
; See FAQ for more details.
restful_urls = Off

; Restrict the list of allowed hosts to prevent HOST header injection.
; See docs/README.md for more details. The list should be JSON-formatted.
; An empty string indicates that all hosts should be trusted (not recommended!)
; Example:
; allowed_hosts = '["myjournal.tld", "anotherjournal.tld", "mylibrary.tld"]'
allowed_hosts = "[\"win.joninstitute.org\"]"

; Allow the X_FORWARDED_FOR header to override the REMOTE_ADDR as the source IP
; Set this to "On" if you are behind a reverse proxy and you control the
; X_FORWARDED_FOR header.
; Warning: This defaults to "On" if unset for backwards compatibility.
trust_x_forwarded_for = Off

; Display a message on the site admin and journal manager user home pages if there is an upgrade available
show_upgrade_warning = On

; Set the following parameter to off if you want to work with the uncompiled (non-minified) JavaScript
; source for debugging or if you are working off a development branch without compiled JavaScript.
enable_minified = On

; Provide a unique site ID and OAI base URL to PKP for statistics and security
; alert purposes only.
enable_beacon = On

; Set this to "On" if you would like to only have a single, site-wide Privacy
; Statement, rather than a separate Privacy Statement for each journal. Setting
; this to "Off" will allow you to enter a site-wide Privacy Statement as well
; as separate Privacy Statements for each journal.
sitewide_privacy_statement = Off

; The number of days a new user has to validate their account.
; A new user account will be removed if this many days have passed since the user registered
; their account, and they have not validated their account or logged in. If set to 0,
; unvalidated accounts will never be removed. Use this setting to automatically remove bot registrations.
user_validation_period = 28

; Turn sandbox mode to On in order to prevent the software from interacting with outside systems.
; Use this for development or testing purposes.
sandbox = Off


;;;;;;;;;;;;;;;;;;;;;
; Database Settings ;
;;;;;;;;;;;;;;;;;;;;;

[database]

driver = mysqli
host = localhost
username = u1527432_win
password = u1527432_win
name = u1527432_win

; Set the non-standard port and/or socket, if used
; port = 3306
; unix_socket = /var/run/mysqld/mysqld.sock

; Database collation
; collation = utf8_general_ci

; Enable database debug output (very verbose!)
debug = Off


;;;;;;;;;;;;;;;;;;
; Cache Settings ;
;;;;;;;;;;;;;;;;;;

[cache]

; Choose the type of object data caching to use. Options are:
; - memcache: Use the memcache server configured below
; - xcache: Use the xcache variable store
; - apc: Use the APC variable store
; - none: Use no caching.
object_cache = none

; Enable memcache support
memcache_hostname = localhost
memcache_port = 11211

; For site visitors who are not logged in, many pages are often entirely
; static (e.g. About, the home page, etc). If the option below is enabled,
; these pages will be cached in local flat files for the number of hours
; specified in the web_cache_hours option. This will cut down on server
; overhead for many requests, but should be used with caution because:
; 1) Things like journal metadata changes will not be reflected in cached
;    data until the cache expires or is cleared, and
; 2) This caching WILL NOT RESPECT DOMAIN-BASED SUBSCRIPTIONS.
; However, for situations like hosting high-volume open access journals, it's
; an easy way of decreasing server load.
;
; When using web_cache, configure a tool to periodically clear out cache files
; such as CRON. For example, configure it to run the following command:
; find .../ojs/cache -maxdepth 1 -name wc-\*.html -mtime +1 -exec rm "{}" ";"
web_cache = Off
web_cache_hours = 1


;;;;;;;;;;;;;;;;;;;;;;;;;
; Localization Settings ;
;;;;;;;;;;;;;;;;;;;;;;;;;

[i18n]

; Default locale
locale = en

; Database connection character set
connection_charset = utf8


;;;;;;;;;;;;;;;;;
; File Settings ;
;;;;;;;;;;;;;;;;;

[files]

; Complete path to directory to store uploaded files
; (This directory should not be directly web-accessible)
; Windows users should use forward slashes
files_dir = "/home/u1527432/win$files"

; Path to the directory to store public uploaded files
; (This directory should be web-accessible and the specified path
; should be relative to the base OJS directory)
; Windows users should use forward slashes
public_files_dir = public

; The maximum allowed size in kilobytes of each user's public files
; directory. This is where user's can upload images through the
; tinymce editor to their bio. Editors can upload images for
; some of the settings.
; Set this to 0 to disallow such uploads.
public_user_dir_size = 50000

; Permissions mask for created files and directories
umask = 0022


;;;;;;;;;;;;;;;;;;;;;;;;;;;;
; Fileinfo (MIME) Settings ;
;;;;;;;;;;;;;;;;;;;;;;;;;;;;

[finfo]
; mime_database_path = /etc/magic.mime


;;;;;;;;;;;;;;;;;;;;;
; Security Settings ;
;;;;;;;;;;;;;;;;;;;;;

[security]

; Force SSL connections site-wide and also sets the "Secure" flag for session cookies
; See https://developer.mozilla.org/en-US/docs/Web/HTTP/Headers/Set-Cookie#secure
force_ssl = Off

; Force SSL connections for login only
force_login_ssl = Off

; This check will invalidate a session if the user's IP address changes.
; Enabling this option provides some additional security, but may cause
; login problems for some users (e.g. if a user IP is changed frequently
; by a server or network configuration).
session_check_ip = On

; The encryption (hashing) algorithm to use for encrypting user passwords
; Valid values are: md5, sha1
; NOTE: This hashing method is deprecated, but necessary to permit gradual
; migration of old password hashes.
encryption = sha1

; The unique salt to use for generating password reset hashes
salt = "YouMustSetASecretKeyHere!!"

; The unique secret used for encoding and decoding API keys
api_key_secret = ""

; The number of seconds before a password reset hash expires (defaults to 7200 / 2 hours)
reset_seconds = 7200

; Allowed HTML tags for fields that permit restricted HTML.
; Use e.g. "img[src,alt],p" to allow "src" and "alt" attributes to the "img"
; tag, and also to permit the "p" paragraph tag. Unspecified attributes will be
; stripped.
allowed_html = "a[href|target|title],em,strong,cite,code,ul,ol,li[class],dl,dt,dd,b,i,u,img[src|alt],sup,sub,br,p"

; Allowed HTML tags for submission titles only
; Unspecified attributes will be stripped.
allowed_title_html
