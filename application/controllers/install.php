<?php
/*Written by Dushyant Kanungo on 03 Feb 2014*/
	class Install extends CI_Controller {
		
		public $data = array();
		
		/**
		 * __construct()
		 *
		 * Initialises the class, by running the parent constructor and performing a check to see
		 * if the installer has already been run on a seperate occasion
		 *
		 * @access public
		 * @return void
		 */
		public function __construct(){
			parent::__construct();
			
			// Check to see if the installer has already been run
			$this->load->database();
			if($this->db->version())
			{
				$this->load->helper('url');
				redirect('/');
			}
		}
		
		/**
		 * index()
		 *
		 * Load the first ever page for the installer. That's it.
		 *
		 * @access public
		 * @return void
		 */
		public function index()
		{
			$this->load->view('install/index');	
    	}
		
		
		public function terms()
		{
			$this->load->view('install/terms');	
    	}
		
		
		public function database()
		{
			// Helps if we load the library
			$this->load->library('form_validation');
			
			// Check to see if the form has been posted
			$this->form_validation->set_rules('db_name', 'Database Name', 'required');
			$this->form_validation->set_rules('db_user', 'MySQL Username', 'required');
			$this->form_validation->set_rules('db_password', 'MySQL Password', 'required');
			$this->form_validation->set_rules('db_host', 'Database Hostname', 'required');
			$this->form_validation->set_rules('db_prefix', 'Database Prefix', 'required');
			
			if ($this->form_validation->run() == TRUE)
			{
				// Form validates, fantastic!
				// Try and connect to this database.
				$test = new MySQLi($this->input->post('db_host'), $this->input->post('db_user'), $this->input->post('db_password'), $this->input->post('db_name'));
				
				// If the connection worked
				if($test->connect_error === NULL)
				{
					// Close the connection
					$test->close();
					
					// Write the database settings to the config file
					// First, create the file
					touch(APPPATH .'config/'. ENVIRONMENT .'/install.log');
										
					// If the file isn't writable
					if(!is_writable(APPPATH .'config/'. ENVIRONMENT .'/database.php'))
					{
						// Try and make the file writable
						try
						{
							if(!@chmod(APPPATH .'config/'. ENVIRONMENT .'/database.php', 777)) throw new Exception('Unable to make the configuration file writable');	
						}
						catch(Exception $e)
						{
							// Nope, we can't make it writable
							// Set the error message
							$this->data['error_message'] = '<p>It seems that the <code>application/config/'. ENVIRONMENT .'/database.php</code> is not writable. Please change the permissions for this file to be writable for the duration of this install.</p>';
							
							// load the page and exit
							return $this->load->view('install/database', $this->data);
						}
					}
					
					// The file must be writable
					// Prepare the config file
					$config['db_host'] = $this->input->post('db_host');
					$config['db_user'] = $this->input->post('db_user');
					$config['db_password'] = $this->input->post('db_password');
					$config['db_name'] = $this->input->post('db_name');
					$config['db_prefix'] = $this->input->post('db_prefix');
					
					$file_contents = '<?php '. $this->load->view('install/templates/database', $config, true);
					
					// Write the file
					file_put_contents(APPPATH .'config/'. ENVIRONMENT .'/database.php', $file_contents);
					
					// And... redirect!
					$this->load->helper('url');
					redirect('/install/status');
				}
				else
				{
					// We failed to connect with the database details provided
					$this->data['error_message'] = '<p>We failed to connect with the database details provided.</p>';
				}
			}
			
			// Load the view			
			$this->load->view('install/database', $this->data);
    	}
		
		
		public function status()
		{
			// First, create the file
			touch(APPPATH .'logs/install.log');
			
			// Second, check that the log file isn't writable
			if(!is_writable(APPPATH .'logs/install.log'))
			{
				// Try and make it writable
				@chmod(APPPATH .'logs/install.log', 777);
			}
			
			// Check again to see if the log file is writable
			if(is_writable(APPPATH .'logs/install.log'))
			{
				// Then we can record the details
				$this->install_log = fopen(APPPATH .'logs/install.log', 'w+');
				
				$this->_log('Log file is writable, begin installation');
			}
			
			$this->load->view('install/status');
									
			// Load the migration library
			$this->load->library('migration');
			$this->_log('Migration library loaded');
			
			// Load the migration config
			$this->config->load('migration');
			$this->_log('Loaded the Migration config');
			
			$this->_log('Latest Migration version is '. $this->config->item('migration_version'));
			
			// Loop through the latest migrations
			for($i = 1; $i <= $this->config->item('migration_version'); $i++)
			{
				$this->_log('Running Migration script '. $i .'...');
				if($this->migration->version($i))
				{
					$this->_log('Success!');
				}
				else
				{
					$this->_log('Migration failed to run!');	
				}
			}
			
			// Set the base URL
			// Touch the config file
			touch(APPPATH .'config/'. ENVIRONMENT .'/config.php');
			$this->_log('Created CMS config file in <code>application/config/'. ENVIRONMENT .'/config.php</code>');
			
			// If the file isn't writable
			if(!is_writable(APPPATH .'config/'. ENVIRONMENT .'/config.php'))
			{
				// Try and make the file writable
				try
				{
					if(!@chmod(APPPATH .'config/'. ENVIRONMENT .'/config.php', 777)) throw new Exception('Unable to make the configuration file writable');	
				}
				catch(Exception $e)
				{
					// Nope, we can't make it writable
					$this->_log('It seems that the <code>application/config/'. ENVIRONMENT .'/config.php</code> is not writable. Please change the permissions for this file to be writable for the duration of this install.');						
				}
			}
			
			$config['base_url'] = str_replace('install/status', '', 'http://'. $_SERVER['SERVER_NAME'] . $_SERVER['REDIRECT_URL']);
			
			$file_contents = '<?php '. $this->load->view('install/templates/config', $config, true);
					
			// Write the file
			file_put_contents(APPPATH .'config/'. ENVIRONMENT .'/config.php', $file_contents);
						
			// Log the result
			$this->_log('Base URL set to <code>'. $config['base_url'] .'</code>');
			
			$this->_log('Configuration complete');
    	}
		
		
		
		public function userdetails()
		{
			// validation libraty loaded
			$this->load->library('form_validation');
			
			// validation rules for the form
			$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|callback__unique_email|xss_clean');
			$this->form_validation->set_rules('name', 'Username', 'trim|required|xss_clean');
			$this->form_validation->set_rules('password', 'Password', 'trim|matches[password_confirm]');
			$this->form_validation->set_rules('password_confirm', 'Confirm Password', 'trim|matches[password]');

			
			// Process the form
			if ($this->form_validation->run() == TRUE) {
				$this->load->model('user_m');
				$data = $this->user_m->array_from_post(array('name', 'email', 'password'));
				$data['password'] = $this->user_m->hash($data['password']);
				$this->user_m->save($data);
				
				// Redirect
				$this->load->helper('url');
				redirect('/install/success');
			}
			
			// loading the view for user details page
			$this->load->view('install/userdetails');
			
    	}
		public function success()
		{
			$this->load->view('install/success');	
    	}
		
		/**
		 * progress()
		 *
		 * Implements COMET and returns an update every time there is an update in the Install log file
		 *
		 * @access public
		 * @return void
		 */
		public function progress()
		{
			$filename = APPPATH .'logs/install.log';
 
			// store new message in the file
			$msg = isset($_GET['msg']) ? $_GET['msg'] : '';
			if ($msg != '')
			{
				file_put_contents($filename,$msg);
				die();
			}
			 
			// infinite loop until the data file is not modified
			$lastmodif    = isset($_GET['timestamp']) ? $_GET['timestamp'] : 0;
			$currentmodif = filemtime($filename);
			while ($currentmodif <= $lastmodif) // check if the data file has been modified
			{
				usleep(10000); // sleep 10ms to unload the CPU
				clearstatcache();
				$currentmodif = filemtime($filename);
			}
			
			// return a json array
			$response = array();
			$response['msg']       = file_get_contents($filename);
			$response['timestamp'] = $currentmodif;
			echo json_encode($response);
			flush();	
		 }
		 
		 private function _log($message)
		 {
			if(isset($this->install_log))
			{
				fwrite($this->install_log, '<p>'. $message .'</p>');
			}
		 }
		 
		public function _unique_email ($str)
		{
			// Do NOT validate if email already exists
			// UNLESS it's the email for the current user
			$this->load->model('user_m');
			$id = $this->uri->segment(4);
			$this->db->where('email', $this->input->post('email'));
			!$id || $this->db->where('id !=', $id);
			$user = $this->user_m->get();
			
			if (count($user)) {
				$this->form_validation->set_message('_unique_email', '%s should be unique');
				return FALSE;
			}
			
			return TRUE;
		}
	}