# Virtuoso Child Theme

## Features 

This theme includes the following features:

1. [Genesis-powered](http://www.studiopress.com/features/)
2. ModularConfiguration architecture
3. [Sass-powered](https://github.com/KnowTheCode/KTC-Child-Theme/tree/master/assets/sass) styling
4. [Gulp](https://gulpjs.com/) - gulp for task running lint, concatenation, optimization, and minification.
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

## Gulp and Sass

When you are actively making styling changes, you need to convert the Sass files into a compressed CSS file.  The first step is to make sure that you have all of the node modules installed, i.e. that are defined in the `package.json` file.  To install, you will need npm and node installed in your machine.

Once you've ran through the install instructions, you'll have access to several Gulp commands.
 
 `gulp watch` - changes to the Sass files and have them compiled into native CSS.  And changes to the JS files will be compiled with [Babel](https://babeljs.io/), linted, and minified. 
 `gulp styles` - changes to the Sass files and have them compiled into native CSS
 `gulp js` - changes to the JS files will be compiled with [Babel](https://babeljs.io/), linted, and minified. 

## Contributions

Feedback, bug reports, and pull requests are welcome.