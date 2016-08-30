# Vanilla Magento Decomposed

This repo is a vanill ainstall of magento but has core modules, design, skins, js, libs etc striopped out and composered in.

## Install

* Clone or fork the repo and play around.
  * Add a project socket and nginx config manually (use boxen if you can't do this)

-- OR --

* Boxen - `include projects::magento::decomposed::v1-14-2-2` in your puppet file
If you use boxen you might expect a `app/etc/local.xml` to be created but it will have been removed deliberately.

-- THEN --

* Run composer
  * `cd vanilla-decomposed-magento-1-14-2-2`
  * `composer install`
* Create database
  * `mysql -uroot -e 'create database vanilla_decomposed_magento_1_14_2_2'`
* Create writable `media` folder
  * `mkdir media`
  * `chmod 0777 media`
* Run install wizard
  * http://vanilla-decomposed-magento-1-14-2-2.dev
  * Fill in the wizard
    * Remember to use the db name you just created `vanilla_decomposed_magento_1_14_2_2`
    * DB Host - `127.0.0.1:13306`
    * DB User - `root`
    * DB Password - leave blank
    * Tick the Skip Base URL Validation Before the Next Step option
  * Create an admin user
    * Ignore the Encryption Key field


## Usage

Use this to play around with magento bugs or sandbox development 

**Don't** commit to this repository unless you find a bug in the vanilla magento install.
