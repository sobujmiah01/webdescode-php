# webdescode-php WordPress Theme

## Description

The `webdescode-php` theme is a versatile and customizable WordPress theme designed to provide a seamless and engaging experience for websites. With a focus on flexibility and user-friendly customization, this theme offers various features and options to tailor your website according to your needs.

## Key Features

- **Custom Styles and Scripts:** Enqueue custom stylesheets, scripts, and Font Awesome for enhanced design and functionality.
- **Custom Logo Support:** Easily incorporate a custom logo with flexible dimensions and settings.
- **Navigation Menus:** Manage multiple navigation menus (header, main, footer) for better site navigation.
- **Customization Options:** Personalize your site with options for social media links, website slogans, and more.
- **Excerpt Customization:** Modify the length and styling of excerpts to improve content presentation.
- **Widgets and Sidebars:** Utilize custom widgets and sidebars to enhance content layout and organization.
- **Pagination Functionality:** Implement custom pagination for smoother navigation through content.
- **Custom Post Type - Services:** Introduce a custom post type 'Services' to highlight specific content types.
- **Related Post Functionality:** Display related posts based on categories for better user engagement.
- **Code Highlighting:** Highlight code snippets with a built-in solution for code display and styling.
- **Custom Copy Clipboard:** No need for an external clipboard plugin; we have added a custom clipboard feature for easy copying.

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
- [Portfolio](https://www.sobujmiah.com/)

## Additional Requirement

This theme requires the usage of the Font Awesome plugin to display social media icons.

## Breadcrumbs Customization

To replace the Yoast SEO breadcrumbs with custom breadcrumbs:

1. **Locate the `header.php` file** in your theme.
2. **Remove the following code** responsible for displaying Yoast SEO breadcrumbs:
## Do you want to use these three on block post web site?
If you want to use it as a block post website then remove the following code from the function file
```php
function enqueue_prism() {
    wp_enqueue_style('prism', get_template_directory_uri() . '/prism/prism.css');
    wp_enqueue_script('prism', get_template_directory_uri() . '/prism/prism.js', array(), null, true);
}
add_action('wp_enqueue_scripts', 'enqueue_prism');
```
or you want developer document website. follow me: 
```php
<code class="preformatted-text line-numbers language-js"></code>
```
**no need to copy clipborad plugin**. we are added custom copy clipboard.

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