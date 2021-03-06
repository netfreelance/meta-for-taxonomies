# Meta for taxonomies #

## Description ##

Add meta for any taxonomies. 
Meta is attached to taxonomy context and not terms, this way allow to have metas different for the same term on 2 different taxonomies. 

## Important to know ##

**Contributors:** momo360modena
  
**Donate link:** http://www.beapi.fr/donate/
  
**Tags:** tags, taxonomies, custom taxonomies, termmeta, meta, term meta, taxonomy, meta taxonomy
  
**Requires at least:** 3.0
  
**Tested up to:** 4.0
  
**Stable tag:** 1.3.3
  
No UI ! This plugin implements the WP Meta API for terms. Metadatas is attached to taxonomy context and not terms, this way allow to have metas different for the same term on 2 different taxonomies !


**It's the better implementation for this feature.**

This plugin don't any interface on WordPress ! Only somes methods for developpers.

This plugin propose many functions for terms :

* `add_term_meta( $taxonomy = '', $term_id = 0, $meta_key = '', $meta_value = '', $unique = false )`
* `delete_term_meta( $taxonomy = '', $term_id = 0, $meta_key = '', $meta_value = '')`
* `get_term_meta( $taxonomy = '', $term_id = 0, $meta_key = '', $single = false )`
* `update_term_meta( $taxonomy = '', $term_id = 0, $meta_key, $meta_value, $prev_value = '' )`
	
And many others functions term taxonomy context :

* `add_term_taxonomy_meta( $term_taxonomy_id = 0, $meta_key = '', $meta_value = '', $unique = false )`
* `delete_term_taxonomy_meta( $term_taxonomy_id = 0, $meta_key = '', $meta_value = '')`
* `get_term_taxonomy_meta( $term_taxonomy_id = 0, $meta_key = '', $single = false )`
* `update_term_taxonomy_meta( $term_taxonomy_id = 0, $meta_key, $meta_value, $prev_value = '' )`
		
And many others...
	
For full info go the [Meta for taxonomies](https://github.com/herewithme/meta-for-taxonomies) Github page.

## Installation ##

1. Download, unzip and upload to your WordPress plugins directory
2. Activate the plugin within you WordPress Administration Backend
3. Develop your plugin for used it !

## Changelog ##

### 1.3.5
* 8 March 2017
* Always return value for the native table check
* Avoid enormous options for the migration

### 1.3.4
* 2 March 2017
* Check if the native table have been created before launching anything

### 1.3.3
* 16 February 2017
* Change get_term_taxonomy_custom internal to use get_metadata
* Update delete_term_meta_by_key sql queries to use new term meta table

### 1.3.2
* 28 October 2016
* Fix ambiguous sql query in get_term_taxonomy_id_from_meta function

### 1.3.1
* 28 May 2016
* Compat 4.4

### 1.2.2
* Fix cache_group key
* Add taxonomy arg for get_term_taxonomy_id_from_meta function

### 1.2.1
* Compat with WP 4.0.x
* Just improve description...

### 1.2
* Broken MAJ - No upgrade script available
* Change table name for allow multisite switching...

### 1.1.5
* Fix bug with hook delation, use right name field "term_taxo_id"

### 1.1.4
* Add tables in var class WPDB for multisite compatibility (thanks njuen)

### 1.1.3
* Improve format readme.txt
* Check compatibility WP 3.2

### 1.1.2
* Fix a bug with the meta key... (bis)

### 1.1.1
* Remove a conflict function with Simple Taxonomy

### 1.1
* Fix a bug with the meta key...

### 1.0.0
* Initial version
