        <div class="modal-header">
          <h3 class="modal-title">Log in</h3>
          <p>Please log in using your credentials</p>
        </div>
        <div class="modal-body">    
        <?php 		
			// Dushyant comment to remove
			//testing passwords with and without encryption:
			//$hash = hash('SHA512', $this->input->post('password'));
			//$nohash = $this->input->post('password');	
			//echo '<pre>' . print_r($this->session->userdata, TRUE) . ' Passwords: ' . $nohash . ' / ' . $hash . '</pre>';		
		?>
        <?php echo validation_errors();?>
        <?php echo form_open();?>
          	<table class="table">
  				<tr>
				    <td>Email</td>
			    	<td><?php echo form_input('email'); ?></td>
				</tr>
				<tr>
				    <td>Password</td>
				    <td><?php echo form_password('password'); ?></td>
				</tr>
				<tr>
				    <td></td>
				    <td><?php echo form_submit('submit', 'Log in', 'class="btn btn-primary"'); ?></td>
				</tr>
			</table>

          <?php echo form_close();?>
        </div>