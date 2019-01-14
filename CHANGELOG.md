## [Unreleased]
#### This Project uses Semantic Versioning

# 2.3.7 @2019-1-14
### Added
- Made a new view for posts. This should allow us to create different post markups in a more dynamic way.
- More style support for ninja forms
### Changed
- academy template markup to pull new post view
- Floating contact default styles to be larger


# 2.3.6 @2018-12-12
### Added
- Additional templates (unfinished at the moment)
- arrow key functionality to slick slider

## 2.3.5 @2018-11-21
### Fixed
- Fixed background image not displaying on mobile due to z-index.
- made floating contact button less transparent
- Made remove meta tag function in formatting

## 2.3.4 @2018-11-14
### Fixed
- Fixed background video bug that made other youtube videos play automatically 

## 2.3.3 @2018-11-13
### Added
- Background video youtube shortlinks don't break site anymore.
- ajax-loader.gif now included to suppress error

## 2.3.2 @2018-10-16
### Added
- Background video and photo feature working on posts
- Integrated Advanced Custom Fields and will be relying on this plugin for the foreseeable future
- Merged floating contact changes

## 2.3.0 @2018-10-16
### Added
- Background video feature in customizer debugged further and YouTube playlist feature integrated.
- Slide-out sidebar feature added.
- Slide-out sidebar now works with custom text widget. 


## 2.2.0 @2018-09-26
### Added
- Background video feature in customizer

## 2.1.8 @2018-09-8
### Added
- Footer configuration items
- Check to see if page is using Gutenberg

## 2.1.7 @2018-09-8
### Changed
- All /lib PHP files have been upgraded/refactored into an Object Oriented architecture 

## 1.1.7 @2018-08-10 
### Removed
- Gulp
### Added
- webpack support
### Changed
- enqueue only the style sheet in the dist folder

## 1.0.6 @2018-08-08 
### Added
- `add_cart_count_to_navigation` Adds the WooCommerce or Easy Digital Downloads cart icons/items to the top_nav menu area as the last item.
- `get_cart_count_menu_item` Get the cart count menu item
- `my_woocommerce_add_to_cart_fragments` Updates the Top Navigation WooCommerce cart link contents when an item is added via AJAX.

## 1.0.5 @2018-07-28 
### Added
- `get_configuration_parameters` grab the config file settings
- `get_project_settings_defaults` get the settings for the particular project
- `set_header_class` set the header design by adding a class to the body tag
- `add_file_types_to_uploads` add custom file types you'd like to upload. Not enabled by default

## 1.0.4 @2018-07-24
### Added
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