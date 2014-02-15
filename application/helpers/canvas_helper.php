<?php if (! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Canvas_helper
 *
 * This class contains a class with a bunch of static functions which helps us managing the canvas configuration settings and the product images
 * Since the canvas is managed using the file system instead of a database (this being a more efficient way), a helper enables us to modulise the functions we need
 *
 * @package Dadu
 * @author Dushyant Kanungo <dushyantkanungo@yahoo.com>
 * @author Ben Argo <ben@benargo.com>
 * @copyright Copyright 2013 Dushyant Kanungo
 */
 
// Constants
define('CONFIG_PATH', APPPATH .'config/canvas.php');
define('PRODUCTS_PATH', BASEPATH .'images/canvas/products');
  
class Canvas_helper
{
	/**
	 * check_config_file()
	 *
	 * Checks to see if the configuration file exists. 
	 * If it doesn't, then we'll make it and make it writable.
	 * If we can't do that, we'll throw an error.
	 *
	 * This function should be run during the Dadu installer
	 *
	 * @access public
	 * @return true or \Exception
	 */
	public static function check_config_file()
	{
		// The file exists
		if(file_exists(CONFIG_PATH))
		{
			// The file isn't writable
			if(!is_writable(CONFIG_PATH))
			{
				// We can make the file writable
				if(chmod(CONFIG_PATH, 777))
				{
					return true;
				}
			}

			// The file isn't writable and we can't make it writable.
			show_error("<p>We can't write to your configuration directory. 
			Please refer to your hosting help (or utilise some of your own awesome brain power) to make this directory writable.</p>
			<p>Once this is done, please <a href=\"javascript:history.go(-1);\">go back and try again</a>.</p>", 500);
		}
		// If the configuration file doesn't exist
		elseif(!file_exists(CONFIG_PATH))
		{
			// The config folder isn't writable
			if(!is_writable(APPPATH .'config'))
			{
				// Try to make the folder writable
				if(!chmod(APPPATH .'config', 777))
				{
					// The folder isn't writable and we can't make it writable.
					show_error("<p>We can't write to your configuration directory. 
					Please refer to your hosting help (or utilise some of your own awesome brain power) to make this directory writable.</p>
					<p>Once this is done, please <a href=\"javascript:history.go(-1);\">go back and try again</a>.</p>", 500);
				}
			}

			// Create the file
			return self::reset();
		}

		// Finally, if all fails, blow it up.
		show_error("<p>We're not really sure with this one. All we know is something's gone wrong.</a>.</p>", 500);
	}

	/**
	 * save_config_file()
	 *
	 * Generates a new configuration file for the canvas and saves it to the file system
	 *
	 * @access public
	 * @return boolean
	 */
	public static function save_config_file()
	{
		if(is_writable(CONFIG_PATH))
		{
			$ci =& get_instance();
			
			$new_contents = "<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');\n\n";
			foreach($ci->config->item('canvas') as $key => $item)
			{
				$new_contents .= "\$config['canvas']['$key'] = ".(is_string($item) ? "'$item'" : $item).";\n";
			}	
			
			// Should return true
			return file_put_contents(CONFIG_PATH, $new_contents);	
		}

		return false;
	}

	/**
	 * get_product_images()
	 *
	 * Gets all of the product images from the file system and returns an array with their paths and names
	 *
	 * @access public
	 * @return array
	 */
	public static function get_product_images()
	{
		if(!is_dir(PRODUCTS_PATH))
		{
			mkdir(PRODUCTS_PATH, 0777, true);
		}

		// array(0 => 'champagne_bottle_1.png')
		if($files = scandir(PRODUCTS_PATH))
		{
			foreach($files as $key => $file)
			{
				$file_name = preg_replace('/\.(gif|png|jpe?g)$/', '', $file);

				// $files[champagne_bottle_1] = SITE_URL/images/canvas/products/champagne_bottle_1.png
				$files[$file_name] = site_url('images/canvas/products/'. $file);

				unset($files[$key]);
			}

			return $files;
		}

		return false;
	}

	/**
	 * reset()
	 *
	 * Creates the default configuration options and writes them to the configuration file
	 *
	 * @access public
	 * @return bool
	 */
	public static function reset()
	{
		// The config folder isn't writable
		if(!is_writable(APPPATH .'config'))
		{
			// Try to make the folder writable
			if(!chmod(APPPATH .'config', 777))
			{
				// The folder isn't writable and we can't make it writable.
				show_error("<p>We can't write to your configuration directory. 
				Please refer to your hosting help (or utilise some of your own awesome brain power) to make this directory writable.</p>
				<p>Once this is done, please <a href=\"javascript:history.go(-1);\">go back and try again</a>.</p>", 500);
			}
		}

		// Create the file
		$new_contents = "<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');\n\n

						\$config['canvas']['dimensions_width'] = 350;\n
						\$config['canvas']['dimensions_height'] = 400;\n
						\$config['canvas']['logo_url'] = '". site_url('images/canvas/brand_logo.png') ."';\n
						\$config['canvas']['logo_x'] = 0;\n
						\$config['canvas']['logo_y'] = 0;\n
						\$config['canvas']['product_x'] = 0;\n
						\$config['canvas']['product_y'] = 0;\n
						\$config['canvas']['text_box_0_x'] = 0;\n
						\$config['canvas']['text_box_0_y'] = 0;\n
						\$config['canvas']['text_box_1_x'] = 0;\n
						\$config['canvas']['text_box_1_y'] = 0;\n
						\$config['canvas']['text_colour'] = 0;\n
						\$config['canvas']['text_font'] = 0;\n
						\$config['canvas']['text_weight'] = 0;\n
						\$config['canvas']['text_size'] = 0;\n";

		return file_put_contents(CONFIG_PATH, $new_contents);
	}
}