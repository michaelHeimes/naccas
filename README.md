# AuCoyote v0.8.1b
#### Coyote with a lil' more gold in it...
I'll write more here later, prolly.

## Dependencies
You will need [Composer](https://getcomposer.org/) and [NPM](https://www.npmjs.com/get-npm) to install and management code dependencies. Out of the box, the Initialization instructions below will install the latest versions of **TGPMA, Bootstrap (and popper.js), WebPack, Babel,** and **jQuery**

The current "working versions" of required dependencies are:
- Composer 1.9.3
- NPM 6.14.3
- Node 8.10.0
- Docker 19.03.8

### Initialization
1. From theme root, run `composer install`
2. From `_src` run `npm install` and `npm run build`. If you get a bunch of errors when attempting to build the CSS files, running `npm rebuild node-sass` _should_ solve the issue(s).
3. You can also run `npm run dev` for webpack to watch your files (scss and js) and build them without minification.

I've bundled a `.zip` file of ACF Pro and WP Migrate DB Pro in this theme to make lives easier since, upon putting in our dev license, it can be upgraded easily. TGMPA prompts you to install if it is not found upon theme activation. You can manage required/suggested plugins from `library/check-plugins.php`.

## Local Environment
Although not required, AuCoyote comes with a template for a local environment powered by [Docker](https://www.docker.com/). You can, however, use whatever local environment setup you want--just install this theme like any other.

1. Copy the docker-compose.yml.default to docker-compose.yml
2. Update your docker-compose.yml as you see fit for you local environment
3. Start your Docker containers via `docker-compose up -d`, note the name of the WordPress container.
4. Navigate to localhost:xxxx (Depending on the port you assigned in your `docker-compose`) and install WordPress.
5. Run the following command from project root to fix the containers file permissions: `docker exec -it <CONTAINER_NAME> sh -c "chown -R www-data:www-data /var/www"`  
You can see your container name after running `docker-compose up -d` via `docker ps` or `docker container ls`

## Changelog
### v0.8.1
- Fixed Webpack source mapping
### v0.7.0
- Updated npm dependencies
- Updated composer and composer dependencies
- Added boilerplate `_forms.scss`, `_functions.scss`, and `_typography.scss`
- Updated how Bootstrap js is imported/compiled to improve modularity
### v0.6.0
- Updated list of required/recommended plugins
- Added archive for GravityForms on initial installation
- Added John's fix for ACF syncing
- Added filter to push Yoast metabox lower on Edit screen(s)
### v0.5.0
- Updated Composer and NPM packages
- Added "working versions" of Composer, NPM, and Node in the README
- Added `.zip` of WPMDBP
- Updated base theme package name and description in `composer.json`
### v0.4.0
- Fleshed out first-iteration of `\LightningFruit\AuCoyote\AcfFlexModule` (formerly ModBuilder)
- Revised the following templates to work as a functional example of the modbuilder:
  - `page.php`
  - `modules/prefix-example_module.php`
### v0.3.0
- Removed even more files that weren't in use
- Added the following template/placeholder files:
  - `modules/prefix_example-module.php`
  - `LightningFruit/AuCoyote/ModBuilder.class.php`
  - `_src/scss/module/_example-module.scss`
  - `_src/scss/_base.scss`
- Added template/placeholder comments to files:
  - `_src/scss/main.scss`
  - `_src/scss/_variables.scss`
  - `page.php`

### v0.2.0
- Removed more files and included dependencies that are no-longer used. Moving forward, dependencies like Sticky.js or Slick should be managed through NPM or included via CDN.
  - _I've removed the CDN version of jQuery from this version as Webpack/NPM provides it already. If this doesn't work in the long run, I'll figure out another way._
- Upgraded Composer and NPM dependencies
- Added the following plugins to `library/check-plugins.php`:
  - Yoast SEO (required, force-activated)
  - ACF Content Analysis for Yoast SEO (required, force-activated)
  - Classic Editor (optional)
  - TinyMCE Advanced (optional)