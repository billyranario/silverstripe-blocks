## Installation

Install the module via Composer:

```bash
composer require thehustle/silverstripe-blocks
```

This command installs its dependencies as well, including the `dnadesign/silverstripe-elemental` module and `dnadesign/silverstripe-elemental-list` module so you don't have to install them separately.

## Run Composer Commands
```bash
composer vendor-expose
composer dump-autoload
```

Most importantly, don't forget to run `dev/build` or `dev/build?flush=all` after.


## Overriding Layouts

To override the layout of the template blocks, you can create a new template file in your theme's template directory.
Make sure to follow the Namespace and Directory structure of the original template file.
    
```bash
mkdir themes/your-theme/templates/TheHustle/Layout/
touch Accordion.ss
touch AccordionItem.ss
touch Tab.ss
touch TabItem.ss
```

Don't forget to run `dev/build` or `dev/build?flush=all` after creating the new template files.

```bash
http://yourdomain.com/dev/build

```

or 

```bash
http://yourdomain.com/dev/build?flush=all
```