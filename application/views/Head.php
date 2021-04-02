<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" href="<?php echo base_url('assets/logokancil.svg')?>">
        <title><?php echo $title?></title>
        <!-- Varela Round Font --> 
        <link href="<?php echo base_url('https://fonts.googleapis.com/css2?family=Varela+Round&display=swap')?>" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@500&display=swap" rel="stylesheet">
        <!-- Core Css -->
        <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/custom_bootstrap/bootstrap.css');?>">
        <!-- Content Css -->
        <link rel="stylesheet" href="<?php echo base_url('assets/jquery-ui-1.12.1/jquery-ui.min.css');?>">
        <!-- Kancil CSS -->
        <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/custom_css/kancil_css.css')?>"/>
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.css"/>
        <!-- jS-->
        <script src="<?php echo base_url('assets/js/jquery.min.js');?>"></script>
        <script src="<?php echo base_url('assets/js/bootstrap.min.js');?>"></script>
        <script src="<?php echo base_url('assets/jquery-ui-1.12.1/jquery-ui.min.js')?>"></script>
        <script type="text/javascript" src="<?php echo base_url('https://cdn.datatables.net/1.10.22/js/jquery.dataTables.js')?>"></script>
        <script type="text/javascript">
            $(document).ready( function () {
                $('#myTable').DataTable();
            } );
        </script>
      </head>
