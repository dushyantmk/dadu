<?php $this->load->view('admin/components/page_head'); ?>
<body style="background:#555;">
 <!-- Modal -->
  <div class="modal show" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
      
       <?php $this->load->view($subview); // Subview is set in controllers ?>
       
        <div class="modal-footer">
          <footer><small>&copy; 2014 <?php echo $meta_title; ?>.</small></footer>
        </div>
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div><!-- /.modal -->
<?php $this->load->view('admin/components/page_tail'); ?>
