<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?php echo $meta_title; ?></title>

<!-- Bootstrap -->
<link href="<?php echo site_url('css/bootstrap.min.css');?>" rel="stylesheet">
<link href="<?php echo site_url('css/admin.css');?>" rel="stylesheet">

<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>

<?php if(isset($sortable) && $sortable === TRUE): ?>
	<script type="text/javascript" src="<?php echo site_url('js/jquery-ui-1.10.4.custom.min.js')?>"></script>
	<script type="text/javascript" src="<?php echo site_url('js/jquery.mjs.nestedSortable.js')?>"></script>
    <!-- https://github.com/mjsarfatti/nestedSortable -->
<?php endif; ?>

<script type="text/javascript" src="<?php echo site_url('js/tinymce/tinymce.min.js')?>"></script>
<script type="text/javascript">
tinymce.init({
        selector: "textarea",
        plugins: [
                "advlist autolink autosave link image lists charmap print preview hr anchor pagebreak spellchecker",
                "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
                "table contextmenu directionality emoticons template textcolor paste textcolor"
        ],

        toolbar1: "bold italic underline strikethrough | alignleft aligncenter alignright alignjustify | styleselect formatselect fontselect fontsizeselect",
        toolbar2: "cut copy paste | searchreplace | bullist numlist | outdent indent blockquote | undo redo | link unlink anchor image media code | inserttime preview | forecolor backcolor",
        toolbar3: "table | hr removeformat | subscript superscript | charmap emoticons | print fullscreen | ltr rtl | spellchecker | visualchars visualblocks nonbreaking restoredraft",

        menubar: false,
        toolbar_items_size: 'small',
		
});</script>

</head>
