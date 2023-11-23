# Miles Out There

#### Author: Trevor Miles

#### Video Demo:  [https://www.youtube.com/watch?v=hORrwUs6xaw](https://www.youtube.com/watch?v=hORrwUs6xaw)

#### Live Website URL: [milesoutthere.com](https://milesoutthere.com/)

#### Description:
A custom WordPress theme to be used for my personal travel website. My wife and I are currently traveling around the USA attempting to visit all 63 national parks. This custom WordPress theme serves as the active theme on my live site at [milesoutthere.com](https://milesoutthere.com/).

### Tech Stack
Due to the nature of this project being a website that will require a lot of content management (creating posts, uploading images, managing pages, etc.), I decided to use WordPress for this project because of it's reputation as a leading content management system. WordPress is written in PHP, and this project utilizes MySQL for the database. The frontend uses HTML, CSS and JavaScript in the templates to display the content. There are plenty of pre-made WordPress themes I could have used that wouldn't require me to write any code, however with most themes there are limitations to how much you can customize the frontend appearance of the site. In order to increase my knowledge of WordPress and PHP, I decided to build my own custom theme from scratch for this project. Below I describe all the different files that make up the custom theme.

### Theme Make Up

#### Custom Post Types

In WordPress the concept of post types refers to different types of content that are stored in the database, such as pages and posts. Custom post types refers to special post types you set up through code that are unique to your theme. For this project, I set up a custom post type named "Adventures" that I use to manage all the different places that we have visited. This is similar to the default "Posts" type that WordPress gives you by default, but it has custom fields set up on it that are specific to what I want to display for the adventures. The file to register this custom post type is located in the `custom-post-types` folder, in the `adventures.php` file. The `post-types.php` requires `adventures.php`, and then `post-types.php` is required in the `functions.php`. The `functions.php` file is a core WordPress theme file that is used to include functionality or features in your WordPress theme.

#### Custom Fields

In order to add fields to a custom post type, or to add additional fields to default post types, custom fields can be registered and applied. For this, I used a composer package (more on Composer below) called [Carbon Fields](https://carbonfields.net/) which is a tool for creating custom fields. I have registered all the custom fields in the `functions.php` file in the `crb_attach_custom_fields()` function.

#### PHP Dependency Management

This project uses [Composer](https://getcomposer.org/) as a way of managing PHP package dependencies, such as the Carbon Fields package.

#### Webpack

[Webpack](https://webpack.js.org/) is used for bundling the project's frontend assets, such as the JavaScript and SCSS. It bundles all the JavaScript files used in the project into a single JavaScript file that is outputted in the `public/js` folder. It also compiles the SCSS (Syntactically Awesome Style Sheet) files into browser readable CSS, and then bundles it into a single file that is outputted in the `public/css`. These single asset files are then enqueued in the `functions.php` file. [Laravel Mix](https://laravel-mix.com/) is used a thin wrapper around webpack that makes getting started with webpack easier for general use cases.

#### Public Folder

In addition to the bundled JS and CSS assets, the `public` folder also serves as a place for storing publicly accessible assets such as static images and font files.

#### Resources Folder

The `resources` folder is where all the frontend assets are stored (before the webpack compiling and bundling occurs). The `js` folder contains the JavaScript assets for the site, such as the header navigation "hamburger menu" functionality which is found in the `components` folder. The `constants` and `utility` folders contain useful resources for building JavaScript components. The `scss` folder contains all the CSS assets for the site. The `abstracts` folder contains resources for establishing the colors, breakpoints, layouts, and functions used throughout the SCSS. The `front` folder contains the styles used for the buttons, components and typography throughout the site.

#### Templates

This section is dedicated to all the template files that are located throughout the root of the theme. The `header.php` and `footer.php` are aptly named template files used to display the header and footer that are displayed on all other templates. The `page_about.php`, `page_home.php`, `page_past.php`, and `page_upcoming.php` are all template files used for displaying the [about](https://www.milesoutthere.com/about/), [home](https://www.milesoutthere.com/), [past](https://www.milesoutthere.com/past/) and [upcoming](https://www.milesoutthere.com/upcoming/) pages. The `single-adventures.php` is the template file used to display an adventure, such as [Redwood National Park](https://www.milesoutthere.com/adventures/redwood-national-park/). The `404.php` template is used to show the 404 page.

#### Utility Functions

The `utility_functions.php` is used for storing functions that are often repeated or contain complex logic, such as retrieving past adventures from the database or formatting a date field into a specific date format.