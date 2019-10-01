# Virtuoso Child Theme

## Features

This theme includes the following features:

1. [Genesis-powered](http://www.studiopress.com/features/)
2. Object Oriented architecture combining elements from Laravel.
3. [Sass-powered](https://github.com/KnowTheCode/KTC-Child-Theme/tree/master/assets/sass) styling
4. Ability to write all of your Javascript in es6.
5. [webpack](https://webpack.js.org/) for asset bundling
6. [Laravel Mix](https://github.com/JeffreyWay/laravel-mix) as an easy configuration wrapper for webpack
7. [PHP Unit Testing](https://phpunit.de/) for test driven developement


## Dependencies

This child theme is dependent upon the following:

1. The [Genesis](http://www.studiopress.com/features/) theming framework from [StudioPress](http://www.studiopress.com).
2. [Node](https://nodejs.org/en/)
3. [Composer](https://getcomposer.org/) 

## Instructions to install:

1. Open up terminal and navigate to the `themes` folder.
2. Then type: `git clone https://github.com/ErhardLabs/virtuoso.git`
3. Navigate into the new folder `virtuoso`
4. Run `npm install`
5. Run `composer install`
6. Run `npm run dev`

## Sass Files

To make styling changes, navigate to `assets/sass`.  There you will find each of the partial files which contain the CSS styling.

The variables are setup for our color scheme.  Therefore, you want to use the variables found in the `utilities/variables/_variables.scss` file.

## JS Files

Navigate to `assets/js/src`.  This is where you will add new JS files or make changes to existing files.

`/dist/js` is where the compiled JS will go. This is also the directory you will point to when enqueueing JS files.

## Contributions

Feedback, bug reports, and pull requests are welcome.

## Copyright and License

Virtuoso is licensed under the [GNU GPL](https://www.gnu.org/licenses/old-licenses/gpl-2.0.html), version 2 or later.

2019 © Erhard Labs
