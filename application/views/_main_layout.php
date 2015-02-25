<?php $this->load->view('components/page_head'); ?>
<body>
<div class="container">
	<section>
    	<h1><?php echo anchor('', config_item('site_name')); ?></h1>
    </section>
<nav class="navbar navbar-default" role="navigation">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
	  <?php echo get_menu($menu); ?>      
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>

<div class="row">
<?php $this->load->view('templates/' .$subview); ?>
    </div>
</div>
<?php $this->load->view('components/page_tail'); ?>