# KASTERWEB Widget Products in Promotion
Module developed to display widget with products that are on sale



## Configure Magento use modman
Therefor you must configure Magento make use of symlinks.

Open Magento’s admin panel and goto Magento Admin Panel > System > Configuration > Advanced > Developer > Template Settings and set “Allow Symlinks” to “Yes”.

OR

Execute query,
"INSERT INTO core_config_data (scope,scope_id,path,value) VALUES ('default',0,'dev/template/allow_symlink',1)"