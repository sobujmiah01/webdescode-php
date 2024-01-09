# webdescode-php WordPress Theme

## Description

The `webdescode-php` theme is a versatile and customizable WordPress theme designed to provide a seamless and engaging experience for websites. With a focus on flexibility and user-friendly customization, this theme offers various features and options to tailor your website according to your needs.

## Key Features

- **Custom Styles and Scripts:** Enqueue custom stylesheets, scripts, and Font Awesome for enhanced design and functionality.
- **Custom Logo Support:** Incorporate a custom logo effortlessly with flexible dimensions and settings.
- **Navigation Menus:** Easily manage multiple navigation menus (header, main, footer) for better site navigation.
- **Customization Options:** Personalize your site with options for social media links and website slogans.
- **Excerpt Customization:** Modify excerpt lengths and styling to improve content presentation.
- **Widgets and Sidebars:** Utilize custom widgets and sidebars for enhanced content layout and organization.
- **Pagination Functionality:** Implement custom pagination for smoother navigation through content.
- **Custom Post Type - Services:** Introduce a custom post type 'Services' to highlight specific content types.
- **Related Post Functionality:** Display related posts based on categories, offering users more content engagement.

## Usage

To use this theme:

1. **Download:** Clone or download the repository.
2. **Installation:** Upload the theme folder to your WordPress installation's `wp-content/themes/` directory.
3. **Activation:** Log in to your WordPress dashboard, navigate to Appearance > Themes, and activate the `webdescode-php` theme.

## Contributing

Contributions, bug reports, and feature requests are welcome! Feel free to submit issues or pull requests to help improve this theme.

## License

This project is licensed under the [GNU General Public License v3.0](https://github.com/sobujmiah01/webdescode-php/blob/master/LICENSE.txt).

## Contact and Social Media

Connect with us on social media and visit our website for more information:

- [LinkedIn](https://www.linkedin.com/in/fsobujmiah/)
- [Facebook](https://www.facebook.com/sobujmiah01/)
- [YouTube](https://www.youtube.com/@webdescode)
- [Website](https://www.webdescode.com/)

## Additional Requirement

This theme requires the usage of the Font Awesome plugin to display social media icons.

## Breadcrumbs Customization

To replace the Yoast SEO breadcrumbs with custom breadcrumbs:

1. **Locate the `header.php` file** in your theme.
2. **Remove the following code** responsible for displaying Yoast SEO breadcrumbs:

## Breadcrumbs Customization

To replace the Yoast SEO breadcrumbs with custom breadcrumbs:

1. **Locate the `header.php` file** in your theme.
2. **Remove the following code** responsible for displaying Yoast SEO breadcrumbs:

```php
<?php if ( function_exists('yoast_breadcrumb') ) {
    yoast_breadcrumb( '<p id="breadcrumbs">','</p>' );
} ?>
```
*This README section provides clear steps on how to replace the Yoast SEO breadcrumbs with custom breadcrumbs in your WordPress theme.*

If you're happy with our theme, don't forget to leave us a smile! 😊