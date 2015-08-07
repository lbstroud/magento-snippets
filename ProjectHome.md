This project is intended to help Magento developers by adding hints to their IDE (Eclipse PDT / Zend Studio / NetBeans) for most reusable pieces of code.

It contains XML templates for Configuration and layouts blocks in Magento.

### Requirements ###

  * Eclipse based PHP IDE ([PDT](http://eclipse.org/pdt) or [Zend Studio](http://www.zend.com/products/studio/))
  * [NetBeans IDE](http://netbeans.org/)


### Eclipse Installation ###

  1. open `Window > Preferences > XML > XML Files > Editor > Templates`
  1. click "Import" and choose `eclipse_xml_templates.xml`
  1. use by typing `mage_` in your XML files
  1. to install PHP snippets do the same operations in `Window > Preferences > PHP > Editor > Templates`, use file `eclipse_php_templates.xml`

### Eclipse Version Update ###

> In order to update XML or PHP snippets you need to remove all old snippets prefixed with "mage". If you don't remove old snippets, IDE will suggest the same snippet multiple times.

### NetBeans Installation and Version Update ###

  1. open `Tools > Options > Editor > Code Templates`
  1. Click `Import` button at the bottom of the window
  1. Browse package file `netbeans-magento-snippets.zip`, click `Ok`
  1. Check `All` checkbox, click `Ok`
  1. Confirm IDE restart with `Yes`
  1. To update Magento Snippets repeat the same process with new package




# Developer Reference #

### XML configs ###

  * **mage\_module** - create module definition in `app/etc/modules/<Vendor>_<Module>.xml`
  * **mage\_config** - create module configs in `app/code/local/<Vendor>/<Module>/etc/config.xml`
  * **mage\_config\_admin\_routers** - define a new admin router that handles controllers. Use in `config/admin` XML-path
  * **mage\_config\_admin\_routers\_override** - define an override admin router.
    * `overriden_module` - is alias of the overridden module,
    * `overrider_module` - is alias of your module,
    * `Mage_Adminhtml` - default controller class preffix (it is supposed that you override adminhtml module),
    * `base_class` - your module' controller preffix,
> > Magento-Snippets guides to create a `app/code/local/<Vendor>/<Module>/controllers/Adminhtml/` directory by default for your overrider controllers. Use in `config/admin/routers` XML-path
  * **mage\_config\_global\_events** - create an event observer for global scope. Use in `config/global` XML-path
  * **mage\_config\_global\_resources\_setup\_eav** - Add EAV class to use as context in module setup scripts. Use in `config/global/resources/<modulealias>_setup/setup` XML-path
  * **mage\_config\_global\_template\_email** - create sales email template definition. Use in `config/global` XML-path
  * **mage\_config\_crontab** - define and schedule cron job. Use in `config/global` XML-path
  * **mage\_config\_adminhtml\_layout** - define admin design layout file. Use in `config/adminhtml` XML-path
  * **mage\_config\_adminhtml\_menu** - add an item to admin menu. Use in `config/adminhtml/menu` or `config/adminhtml/menu/<root_item>/children/<some_child_item>/children` XML-paths
  * **mage\_config\_adminhtml\_translate** - define translation CSV for backend. Use in `config/adminhtml` XML-path
  * **mage\_config\_adminhtml\_acl** - Create Access control list for admin configuration page(s). Use in `config/adminhtml` XML-path
  * **mage\_config\_adminhtml\_events** - create an event observer for admin scope. Use in `config/adminhtml` XML-path
  * **mage\_config\_frontend\_events** - create an event observer for frontend scope. Use in `config/frontend` XML-path
  * **mage\_config\_frontend\_layout** - define frontend design layout file. Use in `config/frontend` XML-path
  * **mage\_config\_frontend\_routers\_standard** - define a new frontend router that handles controllers. Use in `config/frontend` XML-path
  * **mage\_config\_frontend\_routers\_override** - define an override frontend router.
    * `overriden_module` - is alias of the overridden module,
    * `overrider_module` - is alias of your module,
    * `module` - core module name for override. You can replace `Mage_` as well to override thirdpary modules
    * `base_class` - your module' controller preffix,
> > Use in `config/frontend/routers` XML-path
  * **mage\_config\_frontent\_translate** - define translation CSV for backend. Use in `config/frontend` XML-path
  * **mage\_config\_default\_email** - Required default values for email template configs. Use in `config/default/<system_section>/<system_group>` XML-path
  * **mage\_config\_global\_fieldsets\_address** _(repo only)_ - define custom customer address attribute to be copied from quote to order and from address book to quote
  * **mage\_config\_frontend\_secure\_url** _(repo only)_ - define URL paths that must be opened as secure

  * **mage\_system** - create system configs file structure in `app/code/local/<Vendor>/<Module>/etc/system.xml`
    * `section` - new section with configuration params (sidebar menu item on `System -> Configuration` page) Also can use already defined or core section, in this case you need to delete all children except `groups` tag.
    * `module` - module alias, only for newly created sections
    * `general_customer_catalog_sales` - choose one of predefined section groups
    * `label` - section menu label
    * `mage_system_group` - snippet hint for new group inside section
  * **mage\_system\_group** - Create system configs group. Also can use already defined or core group, in this case you need to delete all children except `fields` tag.
    * `group` - group code
    * `module` - module alias, only for newly created sections
    * `label` - group label
    * `mage_system_group_field` - snippet hint for new config field inside group. It will suggest to choose either `mage_system_group_field_select` or `mage_system_group_text`.
  * **mage\_system\_group\_field\_select** - drop-down field config definition
    * `field` - field alias
    * `label` - field label
    * `module` - module alias for source (field options values) and backend (field validation). For standard values use `adminhtml`.
    * `model` - model class suffix for custom validation and options.
    * `sort` - field oprder inside group
  * **mage\_system\_group\_field\_text** - text field config definition
    * `field` - field alias
    * `label` - field label
    * `module` - module alias for source (field options values) and backend (field validation). For standard values use `adminhtml`.
    * `model` - model class suffix for custom validation and options.
    * `sort` - field oprder inside group
  * **mage\_system\_sections\_groups\_email\_fields** - config fields for email template sending options. It requires two fields: sender identity and email template.
    * `email` - email template name

  * **mage\_layout\_block** - define a new root block with all possible attributes, block will be rendered directly into html root
  * **mage\_layout\_head\_action\_addCss** - load css file to head from appropriate skin directory. Use inside `<reference name="head" ></reference>`
  * **mage\_layout\_head\_action\_addJs** - load a file from `js` directory. Use inside `<reference name="head" ></reference>`
  * **mage\_layout\_head\_action\_addSkinJs** - load a file from appropriate skin directory. Use inside `<reference name="head" ></reference>`
  * **mage\_layout\_reference\_action\_insert** - insert already defined block by its name attribute in the end of blocks stack
  * **mage\_layout\_reference\_action\_insert\_after** - insert already defined block by its name attribute after appropriate block
  * **mage\_layout\_reference\_action\_insert\_before** - insert already defined block by its name attribute in the beginning of blocks stack
  * **mage\_layout\_reference\_action\_setTemplate** - set new template for reference block
  * **mage\_layout\_reference\_block** - define child block inside a reference block
  * **mage\_layout\_remove** - remove already defined block by it's name
  * **mage\_layout\_root\_action\_setTemplate** - change page layout defined in default handle
    * `template` - appropriate values: 1column, 2columns-left, 2columns-right, 3columns
  * **mage\_layout\_update** - use all values that are defined in another layout handle
    * `action` - another layout handle name


### PHP configs ###

  * **mage\_model** - model class with database table initialization
  * **mage\_model\_mysql4** - resource model class with database table initialization
  * **mage\_model\_mysql4\_collection** - collection model class with database table initialization
  * **mage\_admin\_grid\_container** - create a grid container class with button and controller definitions

  * **mage\_setup** - create structure for default module sql setup script
  * **mage\_setup\_eav** - create structure for module sql setup script that uses EAV.
  * **mage\_setup\_eav\_addAttribute** - define a new attribute in EAV structure
    * `customer__customer_address__catalog_category__catalog_product__order__invoice__creditmemo__shipment__rma_item` - attribute entity type, choose one of listed
    * `attribute_code` - new attribute code
    * `int_static_varchar_datetime_text_decimal` - backend EAV type (value type)
    * `select_text_date_hidden` - input type that is used to display attribute
    * `Label` - attribute label
  * **mage\_setup\_eav\_addAttribute\_customer** - define a new customer or customer\_address attribute in EAV structure
    * `customer__customer_address` - attribute entity type, choose one of listed
    * `attribute_code` - new attribute code
    * `int_static_varchar_datetime_text_decimal` - backend EAV type (value type)
    * `select_text_date_hidden` - input type that is used to display attribute
    * `Label` - attribute label
  * **mage\_setup\_eav\_addAttribute\_product** - define a new product attribute in EAV structure
    * `attribute_code` - new attribute code
    * `int_static_varchar_datetime_text_decimal` - backend EAV type (value type)
    * `select_text_date_hidden` - input type that is used to display attribute
    * `Label` - attribute label
    * `all_simple_configurable_virtual_grouped_bundle` - apply to types of products. Use comma to separate values
  * **mage\_setup\_eav\_addAttribute\_product\_yesno**  - define a new product attribute with yes/no type in EAV structure
    * `attribute_code` - new attribute code
    * `Label` - attribute label
    * `all_simple_configurable_virtual_grouped_bundle` - apply to types of products. Use comma to separate values
  * **mage\_setup\_eav\_addAttribute\_product\_select** - define a new dropdown product attribute in EAV structure
    * `attribute_code` - new attribute code
    * `Label` - attribute label
    * `all_simple_configurable_virtual_grouped_bundle` - apply to types of products. Use comma to separate values


  * **deb** - add debug statement `Zend_Debug::dump()`



### Is Magento Code Snippets helpful for you? ###
Support us: [Like on Facebook](http://www.facebook.com/widgento)