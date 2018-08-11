# Virtuoso Child Theme

## Features 

This theme includes the following features:

1. [Genesis-powered](http://www.studiopress.com/features/)
2. ModularConfiguration architecture
3. [Sass-powered](https://github.com/KnowTheCode/KTC-Child-Theme/tree/master/assets/sass) styling
4. [webpack](https://webpack.js.org/) for asset bundling
5. [Laravel Mix](https://github.com/JeffreyWay/laravel-mix) as an easy configuration wrapper for webpack
5. Configurable header and footer designs through a theme config file


## Dependencies

This child theme is dependent upon the following:

1. The [Genesis](http://www.studiopress.com/features/) theming framework from [StudioPress](http://www.studiopress.com).
2. [Node](https://nodejs.org/en/)

## Instructions to install:

1. Open up terminal and navigate to the `themes` folder.
2. Then type: `git clone https://github.com/ErhardLabs/virtuoso.git`
3. Navigate into the new folder `virtuoso`
4. Run `npm install`

## Sass Files

To make styling changes, navigate to `assets/sass`.  There you will find each of the partial files which contain the CSS styling.

The variables are setup for our color scheme.  Therefore, you want to use the variables found in the `utilities/variables/_variables.scss` file.

## JS Files

Navigate to `assets/js/src`.  This is where you will add new JS files or make changes to existing files.

`/dist/js` is where the compiled JS will go. This is also the directory you will point to when enqueueing JS files.

## Contributions

Feedback, bug reports, and pull requests are welcome.