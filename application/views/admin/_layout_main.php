<?php $this->load->view('admin/components/page_head'); ?>
<body>
<nav class="navbar navbar-static-top navbar-inverse" role="navigation">
  <div class="navbar-inner">
    <ul class="nav navbar-nav">
      <li><a class="navbar-brand" href="<?php echo site_url('admin/dashboard');?>"><img src="<?php echo site_url('images/dadu-logo-100.png');?>"></a></li>
      <li class="active"><a href="<?php echo site_url('admin/dashboard');?>">Dashboard</a></li>
      <li><?php echo anchor('admin/category', 'Categories')?></li>
      <li><?php echo anchor('admin/product', 'Products')?></li>
      <li><?php echo anchor('admin/page', 'Pages')?></li>
      <li><?php echo anchor('admin/page/order', 'Order Pages')?></li>
      <li><?php echo anchor('admin/user', 'Users')?></li>
      <li><?php echo anchor('admin/canvas', 'Canvas')?></li>
    </ul>
  </div>
</nav>
<div class="container-fluid">
	<!---Main Column---->
	<div class="col-md-9">
	    <?php $this->load->view($subview); ?>
    </div>
    <!---Sidebar---->
	<div class="col-md-3">
    	<section>
        	<?php echo mailto($this->session->userdata('email'), '<i class="glyphicon glyphicon-user"></i> '. $this->session->userdata('email'));?><br>
            <?php echo anchor('admin/user/logout', '<i class="glyphicon glyphicon-off"></i> Logout')?>
        </section>
    </div>
</div>
<?php $this->load->view('admin/components/page_tail'); ?>