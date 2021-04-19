<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>
      <?= cek(Perusahaans::get(),'nama_perusahaan'); ?> - Index
    </title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="<?= base_url(cek(Perusahaans::get(),'icon').'?v='.date('ymd')) ?>" rel="icon">
    <link href="<?= base_url('assets/front/') ?>assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Dosis:300,400,500,,600,700,700i|Lato:300,300i,400,400i,700,700i" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="<?= base_url('assets/front/') ?>assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?= base_url('assets/front/') ?>assets/vendor/icofont/icofont.min.css" rel="stylesheet">
    <link href="<?= base_url('assets/front/') ?>assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="<?= base_url('assets/front/') ?>assets/vendor/venobox/venobox.css" rel="stylesheet">
    <link href="<?= base_url('assets/front/') ?>assets/vendor/line-awesome/css/line-awesome.min.css" rel="stylesheet">
    <link href="<?= base_url('assets/front/') ?>assets/vendor/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link rel="stylesheet" href="<?= base_url('');?>assets/fontawesome-free/css/all.min.css">

    <!-- Template Main CSS File -->
    <link href="<?= base_url('assets/front/') ?>assets/css/style.css" rel="stylesheet">
    <script src="<?= base_url('')?>assets/notika/js/vendor/jquery-1.12.4.min.js"></script>
    <script src="<?= base_url('')?>assets/file.js"></script>

    <!-- =======================================================
  * Template Name: Butterfly - v2.2.1
  * Template URL: https://bootstrapmade.com/butterfly-free-bootstrap-theme/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>
