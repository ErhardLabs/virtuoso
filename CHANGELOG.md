## 1.0.5 @28.Jul.2018 
- `get_configuration_parameters` grab the config file settings
- `get_project_settings_defaults` get the settings for the particular project
- `set_header_class` set the header design by adding a class to the body tag
- `add_file_types_to_uploads` add custom file types you'd like to upload. Not enabled by default

## 1.0.4 @24.Jul.2018 
- Include sexy popup if it's available in header.php
- Enqueue .min file if the environment is Production and not a Development (e.g localhost, staging)
- `add_menu_items` Add addition menu items to navigation
- Added WooCommerce Theme Support

## 1.0.3

- Changed the `setup_child_theme()` callback priority number to 15 to ensure that Genesis' setups run first before the child theme.

## 1.0.2

- Fixed path for enqueuing `/assets/js/responsive-menu.js`

## 1.0.1

- Changed autoload.php to move Customizer loading into the nonadmin files.  Why?  The customizer action occurs before `admin_init`.  It wants to be loaded at the start independent of the admin area.

## 1.0.0

- Initial release.