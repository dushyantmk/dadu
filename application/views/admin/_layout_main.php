<?php $this->load->view('admin/components/page_head'); ?>
<body>
<nav class="navbar navbar-static-top navbar-inverse" role="navigation">
  <div class="navbar-inner">
    <ul class="nav navbar-nav">
      <li><a class="navbar-brand" href="<?php echo site_url('admin/dashboard');?>"><?php echo $meta_title; ?></a></li>
      <li class="active"><a href="<?php echo site_url('admin/dashboard');?>">Dashboard</a></li>
      <li><?php echo anchor('admin/page', 'pages')?></li>
      <li><?php echo anchor('admin/user', 'users')?></li>
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
        	<?php echo mailto('dushyantkanungo@yahoo.com','<i class="glyphicon glyphicon-user"></i> dushyantkanungo@yahoo.com')?><br>
            <?php echo anchor('admin/user/logout', '<i class="glyphicon glyphicon-off"></i> Logout')?>
        </section>
    </div>
</div>
<?php $this->load->view('admin/components/page_tail'); ?>