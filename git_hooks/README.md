# Git Hooks

## :bookmark_tabs: Contents

* [Git Hooks](#git-hooks)
  * [:bookmark_tabs: Contents](#bookmark_tabs-contents)
  * [ℹ Pre-Commit Hooks](#ℹ-pre-commit-hooks)
    * [⚙ Requirements](#-requirements)
    * [:hammer_and_wrench: Pre-Configure](#hammer_and_wrench-pre-configure)
    * [⚡ Usage](#-usage)
  * [Commit-msg hook](#commit-msg-hook)
  * [Pre-push hook](#pre-push-hook)

## ℹ Pre-Commit Hooks

### 👥 Audience

* Developers;
* TechLeads.

### ❔ Overview
Pre-commit hooks will check your code before commit to don’t let you commit code with coding standards violation. This
hook contains ESLint and PHPCS code checkers.

### ⚙ Requirements
The environment, where the pre-commit will be executed should have the following tools be installed:
 - php
 - composer
 - node
 - yarn or npm

The project's `composer.json` should have installed:
 - `drupal/coder` (for PHPCS)

All necessary tools are already being pre-installed with Docker image `wodby/drupal-php:x-dev` (be sure to use `-dev` suffix). In this image, the `yarn` is used for eslint.

### :hammer_and_wrench: Pre-Configure

#### Installation

In order to use the `pre-commit`, `pre-push` and `commit-msg` scripts, please, copy the content of each file to `$GIT_ROOT_DIR/.git/hooks`.

Be sure to copy `_config.sh` not depending on your configuration, the `pre-commit`, `pre-push` and `commit-msg` hooks can be downloaded depending on your needs.

Also, in order to automatically setup the hooks, please, update your `composer.json` section `scripts` to look like that:
```json
    "scripts": {
        "update-git-hooks": "cp git_hooks/* .git/hooks/",
        "post-install-cmd": ["@update-git-hooks"],
        "post-update-cmd": ["@update-git-hooks"]
    }
```

In case you already have some commands to be executed, create the `update-git-hooks` script and use `@update-git-hooks` command in appropriate scripts.

#### PHPCS
In order to use PHPCS lint the `drupal/coder` package should be installed in the project's git root folder. If it is already installed (which is preferable), be sure to execute composer install to download the packages.

In CLI:
```bash
composer install
```

If you are using Docker4Drupal, you should execute the `composer install` command to the `php` container:
```bash
docker compose exec php composer install
```

You’ll see next message if everything is ok:

![Composer Install OK](../../img/comp_ok.png)

After this you can use PHPCS to check your code.

#### ESLint

Depending on the environment you use, especially which package-manage tool you're using (npm or yarn) the installation various.

Using `npm` you can proceed with [Drupal official guide](https://www.drupal.org/docs/develop/standards/javascript-coding-standards/eslint-settings):
```bash
npm install eslint eslint-config-airbnb eslint-plugin-yml --save-dev
npm i eslint-config-drupal
```

In case, if you are using `wodby/drupal-php` image, the `npm` package is not installed by default. Please, install it using `sudo apk add npm`.

Using `yarn` tool, it can be harder to install the specific eslint version. If you are using default Drupal configuration, please, execute the following command:
```bash
yarn add eslint@8.57.1 eslint-config-airbnb@19.0.4 eslint-config-drupal@5.0.2 eslint-plugin-yml@1.17.0 eslint-plugin-prettier@4.2.1 prettier@2.8.0 eslint-config-prettier@8.5.0 eslint-plugin-import@2.25.3 --dev
```

This command will install every needed package for default Drupal configuration. In this case, the `eslint` version should be hard-coded to `8.57.1` as another plugins, to avoid compatibility issues.

You’ll see next messages if everything is ok:
![ESLint Install OK](../../img/eslint_ok.png)

After this you can use ESLint or `git` pre-commit hooks to check your code.

### ⚡ Usage
Be sure, you have downloaded necessary configs (`_config.sh` and `pre-commit`) to `$GIT_ROOT_DIR/.git/hooks`

The pre-commits are by default configured to work with default Drupal projects. The lints can be configured by changing the following variables in `_config.sh`:
 1. Find the section of lint you want to configure (pattern: `# --- LINT_NAME ---`)
 2. Variable `<LINT>`: the location of executable file of the lint
 3. Variable `<LINT>_FLAGS`: the flags, which should be added to execution command
 4. Variable `<LINT>_CHECK_DIRS`: the array of folder, which would be checked within this lint
 5. Variable `<LINT>_EXTENSIONS`: the array of extensions, which would be checked within this lint
 6. Variable `<LINT>_INSTALL_MSG`: the message, which shall be printed in case of `$<LINT>` executable does not exist

In common cases, you should be able to fully configure your lints by changing only `_config.sh`. Be sure to change `pre-commit` file only if:
 1. There is a need to disable/enable lint: go to file, comment/uncomment appropriate line after `#Run linters` comment
 2. There is a need to add lint: go to file, add lint run instruction after `#Run linters` comment:
    ```bash
    run_linter "<Lint name>" "$<LINT>" <LINT>_EXTENSIONS[@] "$<LINT>_FLAGS" "$<LINT>_INSTALL_MSG" "${<LINT>_CHECK_DIRS[@]}"
    ```
    Go to `_config.sh`, create section `# --- <LINT> ---`, add appropriate variables listed above using same name as in `run_linter` command
 3. Custom changes to pre-commit logic: should be done only if is realy necessary

The example of pre-commit script work:
![Code_Sniffing_Error](../../img/hook_msg.png)

## Commit-msg hook

### ❔ Overview

Commit-msg hook will check the commit messages of developers in accordance with syntax in `_config.sh` file. It helps to make commit messages more organized and understand for what task were made the commits.

### ⚡ Usage

Just copy and paste the `_config.sh` and `commit-msg` files into the `.git/hooks` directory of your project.

Open the `_config.sh` file and configure it according to your project needs: just uncomment ready-to-use solutions or make your own using samples from other projects that are shown in the file.

After this developers who will make not correct commits will have an error message with a request to make a commit according to the sample.

## Pre-push hook

### ❔ Overview

Pre-push hook will check a branch name in accordance with syntax in `_config.sh` file. It helps to organize project branches and understand what branch is for what task.

### ⚡ Usage

Just copy and paste the `_config.sh` and `pre-push` files into the `.git/hooks` directory of your project.

Open the `_config.sh` file and configure it according to your project needs: just uncomment ready-to-use solutions or make your own using samples from other projects that are shown in the file.

After this developers who will make not correct branch names will have an error message with a request to make a branch name according to the sample.
