<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8" />
    <title>Pengambilan ATK HRD</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
    <meta content="Coderthemes" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="<?= base_url() ?>/assets/images/msal.gif">

    <!-- SELECT2 -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

    <!-- third party css -->
    <link href="<?php echo base_url() ?>assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url() ?>assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url() ?>assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url() ?>assets/libs/datatables.net-select-bs4/css//select.bootstrap4.min.css" rel="stylesheet" type="text/css" />

    <!-- Sweet Alert-->
    <link href="<?= base_url() ?>/assets/libs/sweetalert2/sweetalert2.min.css" rel="stylesheet" type="text/css" />

    <!-- Plugins css -->
    <link href="<?= base_url() ?>/assets/libs/flatpickr/flatpickr.min.css" rel="stylesheet" type="text/css" />
    <link href="<?= base_url() ?>/assets/libs/selectize/css/selectize.bootstrap3.css" rel="stylesheet" type="text/css" />

    <!-- App css -->
    <link href="<?= base_url() ?>/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" id="bs-default-stylesheet" />
    <link href="<?= base_url() ?>/assets/css/app.min.css" rel="stylesheet" type="text/css" id="app-default-stylesheet" />

    <link href="<?= base_url() ?>/assets/css/bootstrap-dark.min.css" rel="stylesheet" type="text/css" id="bs-dark-stylesheet" />
    <link href="<?= base_url() ?>/assets/css/app-dark.min.css" rel="stylesheet" type="text/css" id="app-dark-stylesheet" />

    <!-- icons -->
    <link href="<?= base_url() ?>/assets/css/icons.min.css" rel="stylesheet" type="text/css" />


</head>

<body class="loading" data-layout='{"mode": "light", "width": "fluid", "menuPosition": "fixed", "sidebar": { "color": "light", "size": "default", "showuser": false}, "topbar": {"color": "dark"}, "showRightSidebarOnPageLoad": true}'>

    <!-- Begin page -->
    <div id="wrapper">

        <!-- Topbar Start -->
        <div class="navbar-custom">
            <div class="container-fluid">
                <ul class="list-unstyled topnav-menu float-right mb-0">

                    <li class="dropdown d-none d-lg-inline-block">
                        <a class="nav-link dropdown-toggle arrow-none waves-effect waves-light" data-toggle="fullscreen" href="#">
                            <i class="fe-maximize noti-icon"></i>
                        </a>
                    </li>

                    <li class="dropdown notification-list topbar-dropdown">
                        <a class="nav-link dropdown-toggle nav-user mr-0 waves-effect waves-light" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                            <img src="<?= base_url() ?>/assets/images/users/user-1.jpg" alt="user-image" class="rounded-circle">
                            <span class="pro-user-name ml-1">
                                <?= $this->session->userdata('userlogin'); ?> <i class="mdi mdi-chevron-down"></i>
                            </span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right profile-dropdown ">
                            <!-- item-->
                            <div class="dropdown-header noti-title">
                                <h6 class="text-overflow m-0">Welcome !</h6>
                            </div>

                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item notify-item">
                                <i class="fe-user"></i>
                                <span>My Account</span>
                            </a>

                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item notify-item">
                                <i class="fe-settings"></i>
                                <span>Settings</span>
                            </a>

                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item notify-item">
                                <i class="fe-lock"></i>
                                <span>Lock Screen</span>
                            </a>

                            <div class="dropdown-divider"></div>

                            <!-- item-->
                            <a href="<?= base_url('Dashboard/logout') ?>" class="dropdown-item notify-item">
                                <i class="fe-log-out"></i>
                                <span>Logout</span>
                            </a>

                        </div>
                    </li>


                </ul>

                <!-- LOGO -->
                <div class="logo-box">
                    <a href="<?= base_url('Dashboard') ?>" class="logo logo-dark text-center">
                        <span class="logo-sm">
                            <img src="<?= base_url() ?>/assets/images/msal.gif" alt="" height="22">
                            <!-- <span class="logo-lg-text-light">UBold</span> -->
                        </span>
                        <span class="logo-lg">
                            <img src="<?= base_url() ?>/assets/images/msal.gif" alt="" height="20">
                            <!-- <span class="logo-lg-text-light">U</span> -->
                        </span>
                    </a>

                    <a href="<?= base_url('Dashboard') ?>" class="logo logo-light text-center">
                        <span class="logo-sm">
                            <img src="<?= base_url() ?>/assets/images/msal.gif" alt="" width="20%">
                            <!-- <span class="logo-lg-text-light">UBold</span> -->
                        </span>
                        <span class="logo-lg">
                            <img src="<?= base_url() ?>/assets/images/msal.gif" alt="" width="20%">
                            <!-- <span class="logo-lg-text-light">U</span> -->
                        </span>
                    </a>
                </div>

                <ul class="list-unstyled topnav-menu topnav-menu-left m-0">
                    <li>
                        <button class="button-menu-mobile waves-effect waves-light">
                            <i class="fe-menu"></i>
                        </button>
                    </li>

                    <li>
                        <!-- Mobile menu toggle (Horizontal Layout)-->
                        <a class="navbar-toggle nav-link" data-toggle="collapse" data-target="#topnav-menu-content">
                            <div class="lines">
                                <span></span>
                                <span></span>
                                <span></span>
                            </div>
                        </a>
                        <!-- End mobile menu toggle-->
                    </li>




                </ul>
                <div class="clearfix"></div>
            </div>
        </div>
        <!-- end Topbar -->

        <!-- ========== Left Sidebar Start ========== -->
        <div class="left-side-menu">

            <div class="h-100" data-simplebar>

                <!-- User box -->
                <div class="user-box text-center">
                    <img src="<?= base_url() ?>/assets/images/users/user-1.jpg" alt="user-img" title="Mat Helme" class="rounded-circle avatar-md">
                    <div class="dropdown">
                        <a href="javascript: void(0);" class="text-dark dropdown-toggle h5 mt-2 mb-1 d-block" data-toggle="dropdown">Geneva Kennedy</a>
                        <div class="dropdown-menu user-pro-dropdown">

                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item notify-item">
                                <i class="fe-user mr-1"></i>
                                <span>My Account</span>
                            </a>

                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item notify-item">
                                <i class="fe-settings mr-1"></i>
                                <span>Settings</span>
                            </a>

                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item notify-item">
                                <i class="fe-lock mr-1"></i>
                                <span>Lock Screen</span>
                            </a>

                            <!-- item-->
                            <a href="<?= base_url('Dashboard/logout') ?>" class="dropdown-item notify-item">
                                <i class="fe-log-out mr-1"></i>
                                <span>Logout</span>
                            </a>

                        </div>
                    </div>
                    <p class="text-muted">Admin Head</p>
                </div>

                <!--- Sidemenu -->
                <div id="sidebar-menu">

                    <ul id="side-menu">

                        <li class="menu-title">Navigation</li>

                        <li>
                            <a href="<?= base_url('Dashboard') ?>">
                                <i data-feather="airplay"></i>
                                <span> Admin </span>
                            </a>
                        </li>



                    </ul>

                </div>
                <!-- End Sidebar -->

                <div class="clearfix"></div>

            </div>
            <!-- Sidebar -left -->

        </div>
        <!-- Left Sidebar End -->
        <!-- Vendor js -->
        <script src="<?= base_url() ?>/assets/js/vendor.min.js"></script>

        <!-- Plugins js-->
        <script src="<?= base_url() ?>/assets/libs/flatpickr/flatpickr.min.js"></script>
        <script src="<?= base_url() ?>/assets/libs/apexcharts/apexcharts.min.js"></script>

        <script src="<?= base_url() ?>/assets/libs/selectize/js/standalone/selectize.min.js"></script>

        <!-- Dashboar 1 init js-->
        <script src="<?= base_url() ?>/assets/js/pages/dashboard-1.init.js"></script>

        <!-- SELECT2 -->
        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>


        <!-- Sweet Alerts js -->
        <script src="<?= base_url() ?>/assets/libs/sweetalert2/sweetalert2.all.min.js"></script>

        <!-- Sweet alert init js-->
        <script src="<?= base_url() ?>/assets/js/pages/sweet-alerts.init.js"></script>

        <!-- JQUERY MASK FOR INPUT CURRENCY -->
        <script src="<?= base_url() ?>/assets/libs/jquery-mask-plugin/jquery.mask.min.js"></script>
        <script src="<?= base_url() ?>/assets/libs/autonumeric/autoNumeric-min.js"></script>
        <script src="<?= base_url() ?>/assets/js/pages/form-masks.init.js"></script>
        <!-- <script src="https://cdnjs.com/libraries/jquery.mask"></script> -->
        <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script> -->


        <!-- ============================================================== -->
        <!-- Start Page Content here -->
        <!-- ============================================================== -->

        <div class="content-page">
            <div class="content">

                <!-- Start Content-->
                <!-- <?= $contents ?> -->
                <!-- container -->
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box">
                            <div class="page-title-right">
                                <a href="<?= base_url('Permintaan/permintaanAtk') ?>" class="btn btn-primary btn-rounded mr-2"><i class="fas fa-hands mr-1"></i>Ajukan Permintaan ATK</a>
                                <button class="btn btn-success btn-rounded mr-2" onclick="printDiv('printableArea')"><i class="fas fa-print mr-1"></i>Cetak Bukti</button>
                                <button onclick="deleteConfirm('<?= base_url('Ambil_atk/deletePermintaan/' . $no_ambilatk) ?>')" href="#!" class="btn btn-rounded btn-danger"><i class="fas fa-trash mr-1"></i>Hapus Semua</button>
                            </div>
                            <h4 class="page-title">Pengambilan Detail ATK</h4>
                            <?= $this->session->flashdata('message') ?>
                        </div>
                    </div>
                </div>
                <!-- end page title -->

                <script language="javascript">
                    function printDiv(divName) {
                        var printContents = document.getElementById(divName).innerHTML;
                        var originalContents = document.body.innerHTML;

                        document.body.innerHTML = printContents;

                        window.print();

                        document.body.innerHTML = originalContents;
                    }
                </script>
                <div class="row">
                    <div class="col-12">
                        <div class="card-box">
                            <?php if ($status == 2) { ?>
                                <div class="alert alert-warning" role="alert">
                                    <i class="mdi mdi-alert-outline mr-2"></i> <strong>WAITING</strong> Cetak ATK ini sebagai bukti Anda meminta ATK
                                </div>
                            <?php } else if ($status == 4) { ?>
                                <div class="alert alert-info" role="alert">
                                    <i class="mdi mdi-information-outline mr-2"></i> <strong>APPROVED</strong> ATK ini menunggu User untuk diambil
                                </div>
                            <?php } else { ?>
                                <div class="text-right mb-1">
                                    <a href="<?= base_url('Ambil_atk') ?>" class="btn btn-outline-info btn-rounded waves-effect waves-light"><i class="fas fa-angle-left mr-2"></i>Kembali</a>
                                </div>
                            <?php } ?>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="">
                                        <h5 class="">Nama : <?= ucfirst($user_nama) ?></h5>
                                        <h5 class="">Jumlah Item ATK : <?= count($detail_ambilatk) ?></h5>
                                        <h5 class="">Tgl Permintaan&nbsp;: <span class="text-success"><?= $tgl_permintaan ?></span></h5>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <h5 class="">No&nbsp; : <span class="bg-light py-1 px-2"><?= $no_ambilatk ?></span></h5>
                                    <h5 class="">PT&nbsp; : <span class="px-2"><?= $nama_pt ?></span></h5>
                                </div>
                            </div>


                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="table-responsive mt-4">
                                        <table class="table table-bordered table-sm table-centered mb-0">
                                            <thead class="thead-light">
                                                <tr>
                                                    <th>No</th>
                                                    <th>Nama ATK</th>
                                                    <th>Kategori</th>
                                                    <th>Qty</th>
                                                    <!-- <th>Retur</th> -->
                                                    <th>Kode Barang</th>
                                                    <!-- <th>QTY sebelumnya</th> -->
                                                    <th>Satuan</th>
                                                    <th>Keperluan</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $no = 1; ?>
                                                <?php foreach ($detail_ambilatk as $da) { ?>
                                                    <?php $id_detail = $da['id_detail_ambilatk']; ?>
                                                    <?php $no_ambilatk = $da['no_ambilatk']; ?>
                                                    <?php $kd_inputatk = $da['kd_inputatk']; ?>
                                                    <?php
                                                    $row_retur = "SELECT SUM(qty_rusak) as qtyambil_rusak  FROM tb_atk_rusak where id_detail_ambilatk='$id_detail'  AND no_ambilatk ='$no_ambilatk'";
                                                    $result = $this->db->query($row_retur)->result_array();
                                                    foreach ($result as $row3) {
                                                        $qtyambilrusak = $row3['qtyambil_rusak'];
                                                    }

                                                    $total = $da['qty'] + $qtyambilrusak;


                                                    //MENGHITUNG SISA ATK YANG TERSEDIA
                                                    $row_atk = "SELECT SUM(qty) as qtyatk  FROM tb_barang where kd_inputatk='$kd_inputatk'";
                                                    $result_atk = $this->db->query($row_atk)->result_array();
                                                    foreach ($result_atk as $atk) {
                                                        $qtyatk = $atk['qtyatk'];
                                                    }

                                                    $row_atk = "SELECT SUM(qty) as qtyambil  FROM tb_detail_ambilatk where kd_inputatk='$kd_inputatk'";
                                                    $result_atk = $this->db->query($row_atk)->result_array();
                                                    foreach ($result_atk as $ambil) {
                                                        $qtyambil = $ambil['qtyambil'];
                                                    }

                                                    $row_rusak = "SELECT SUM(qty_rusak) as qtyambil_ret  FROM tb_atk_rusak where kd_inputatk='$kd_inputatk'";
                                                    $result_ret = $this->db->query($row_rusak)->result_array();
                                                    foreach ($result_ret as $ret) {
                                                        $qtyambil_ret = $ret['qtyambil_ret'];
                                                    }
                                                    $qtyambilretur = $qtyambil + $qtyambil_ret;
                                                    $sisa = $qtyatk - $qtyambilretur;
                                                    ?>
                                                    <tr>
                                                        <input type="hidden" name="" id="sisa<?= $no ?>" value="<?= $sisa ?>">
                                                        <td><?= $no++ ?></td>
                                                        <td><?= $da['nm_barang'] ?></td>
                                                        <td><?= $da['kat_barang'] ?></td>
                                                        <td><?= $da['qty'] ?></td>
                                                        <!-- <td><?= $qtyambilrusak == 0 ? 0 : $qtyambilrusak ?></td> -->
                                                        <!-- <td><?= $total ?></td> -->
                                                        <td><?php if ($da['kode_barang'] == null) { ?>
                                                                <span>Tidak ada</span>
                                                            <?php } else { ?>
                                                                <img src="<?= site_url('Atk/Barcode/' . $da['kode_barang']) ?>" alt="">
                                                            <?php } ?>
                                                        </td>
                                                        <td><?= $da['sat'] ?></td>
                                                        <td><?= $da['keperluan'] ?></td>
                                                        <td>
                                                            <button class="btn btn-xs btn-warning" id="editambil" data-no_ambilatk="<?= $da['no_ambilatk'] ?>" data-id="<?php echo $da['id_detail_ambilatk'] ?>" data-sisa=<?= $sisa ?> data-nm_barang="<?php echo $da['nm_barang'] ?>" data-qty="<?php echo $da['qty'] ?>" data-keperluan="<?php echo $da['keperluan'] ?>" href="javascript:;" data-toggle="modal" data-target="#editModal"><i class="fa fa-edit mr-1"></i>Edit</button>
                                                            <button id="delete-item" data-no_urut="<?= $da['no_ambilatk'] ?>" data-id="<?= $da['id_detail_ambilatk'] ?>" class="btn btn-xs btn-danger" data-toggle="modal" data-target="#deleteModal"><i class="mdi mdi-delete mr-1"></i>Hapus Item</button>
                                                        </td>
                                                    </tr>
                                                <?php } ?>
                                                <input type="hidden" name="count" id="count" value="<?= count($detail_ambilatk) ?>">
                                            </tbody>
                                        </table>
                                    </div>

                                </div> <!-- end card-->
                            </div> <!-- end col-->
                        </div>
                    </div>
                </div>
                <!-- end row-->

                <!-- //PRINT LAPORAN -->
                <div class="row" id="hiden">
                    <div class="col-12">
                        <div class="card-box">
                            <div class="text-right">
                                <a href="<?= base_url('Ambil_atk') ?>" class="btn btn-outline-info btn-rounded waves-effect waves-light"><i class="fas fa-angle-left mr-2"></i>Kembali</a>
                            </div>
                            <div id="printableArea">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="">
                                            <h5 class="">Nama : <?= ucfirst($user_nama) ?></h5>
                                            <h5 class="">Jumlah Item ATK : <?= count($detail_ambilatk) ?></h5>
                                            <h5 class="">Tgl Permintaan&nbsp;: <span class="text-success"><?= $tgl_permintaan ?></span></h5>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <h5 class="">No&nbsp; : <span class="bg-light py-1 px-2"><?= $no_ambilatk ?></span></h5>
                                        <h5 class="">PT&nbsp; : <span class="px-2"><?= $nama_pt ?></span></h5>
                                    </div>
                                </div>



                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="table-responsive mt-4">
                                            <table class="table table-bordered table-sm table-centered mb-0">
                                                <thead class="thead-light">
                                                    <tr>
                                                        <th>No</th>
                                                        <th>Nama ATK</th>
                                                        <th>Kategori</th>
                                                        <th>Qty</th>
                                                        <th>Kode Barang</th>
                                                        <!-- <th>Retur</th> -->
                                                        <!-- <th>QTY sebelumnya</th> -->
                                                        <th>Satuan</th>
                                                        <th>Keperluan</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php $no = 1; ?>
                                                    <?php foreach ($detail_ambilatk as $da) { ?>
                                                        <?php $id_detail = $da['id_detail_ambilatk']; ?>
                                                        <?php $no_ambilatk = $da['no_ambilatk']; ?>
                                                        <?php
                                                        $row_retur = "SELECT SUM(qty_rusak) as qtyambil_rusak  FROM tb_atk_rusak where id_detail_ambilatk='$id_detail' AND no_ambilatk ='$no_ambilatk'";
                                                        $result = $this->db->query($row_retur)->result_array();
                                                        foreach ($result as $row3) {
                                                            $qtyambilrusak = $row3['qtyambil_rusak'];
                                                        }

                                                        $total = $da['qty'] + $qtyambilrusak;

                                                        ?>
                                                        <tr>
                                                            <td><?= $no++ ?></td>
                                                            <td><?= $da['nm_barang'] ?></td>
                                                            <td><?= $da['kat_barang'] ?></td>
                                                            <td><?= $da['qty'] ?></td>
                                                            <!-- <td><?= $qtyambilrusak == 0 ? 0 : $qtyambilrusak ?></td> -->
                                                            <!-- <td><?= $total ?></td> -->
                                                            <td><?php if ($da['kode_barang'] == null) { ?>
                                                                    <span>Tidak ada</span>
                                                                <?php } else { ?>
                                                                    <img src="<?= site_url('Atk/Barcode/' . $da['kode_barang']) ?>" alt="">
                                                                <?php } ?>
                                                            </td>
                                                            <td><?= $da['sat'] ?></td>
                                                            <td><?= $da['keperluan'] ?></td>
                                                        </tr>
                                                    <?php } ?>
                                                </tbody>
                                            </table>
                                        </div>

                                    </div> <!-- end card-->
                                </div> <!-- end col-->
                            </div>
                        </div>
                    </div>
                </div>

                <!-- EDIT MODAL -->
                <div class="modal fade" id="editModal" tabindex="-1" role="dialog">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="title" id="defaultModalLabel">Edit Ambil ATK</h4>
                            </div>
                            <div class="modal-body">
                                <form action="<?= base_url('Ambil_atk/editAmbilAtkUserATK-20210604-009') ?>" method="POST">
                                    <input type="hidden" name="id_detail" id="id_detail" class="form-control" placeholder="Nama Barang" />
                                    <input type="hidden" name="no_ambilatk" id="no_ambilatk" class="form-control" placeholder="Nama Barang" />

                                    <div class="row clearfix">
                                        <div class="col-sm-12">
                                            <label for="">Nama Barang</label>
                                            <div class="form-group">
                                                <input type="text" name="nm_barang" id="nm_barang" class="form-control bg-light" placeholder="Kode Barang" disabled />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row clearfix">
                                        <div class="col-sm-12">
                                            <label for="">Jumlah Stok</label>
                                            <!-- (QTY Tersisa saat ini : <span id="sisa"></span>) -->
                                            <div class="form-group">
                                                <input type="number" name="qty" id="qty" class="form-control" placeholder="Jumlah Stok" required />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row clearfix">
                                        <div class="col-sm-12">
                                            <label for="">Keperluan</label>
                                            <div class="form-group">
                                                <textarea name="keperluan" id="keperluan" class="form-control" rows="2"></textarea>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row modal-footer">
                                        <button type="button" class="btn btn-danger btn-round waves-effect" data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary btn-round waves-effect">Save</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- DELETE MODAL -->
                <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Anda yakin?</h5>
                                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                Data yang dihapus tidak akan bisa dikembalikan.
                                <form action="<?= base_url('Ambil_atk/deleteItemUser') ?>" method="POST">
                                    <input type="hidden" name="no_ambilatk_del" id="no_ambilatk_del">
                                    <input type="hidden" name="id" id="id">
                            </div>
                            <div class="modal-footer">
                                <button class="btn" type="button" data-dismiss="modal">Batal</button>
                                <button type="submit" id="btn-delete" class="btn btn-danger" href="#">Hapus</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- DELETE MODAL SELURUH ATK -->
                <div class="modal fade" id="deleteModalAmbil" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Anda yakin?</h5>
                                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                            </div>
                            <div class="modal-body">Data yang dihapus tidak akan bisa dikembalikan.</div>
                            <div class="modal-footer">
                                <button class="btn" type="button" data-dismiss="modal">Batal</button>
                                <a id="btn-delete-atk" class="btn btn-danger" href="#">Hapus</a>
                            </div>
                        </div>
                    </div>
                </div>

                <script>
                    $('#hiden').hide();

                    function add() {
                        $('#addModal').modal('show');
                    }

                    function deleteConfirm(url) {
                        $('#btn-delete-atk').attr('href', url);
                        $('#deleteModalAmbil').modal();
                    }

                    $(document).ready(function() {
                        $(document).on('click', '#delete-item', function() {
                            var no_ambilatk = $(this).data('no_urut');
                            var id = $(this).data('id');
                            // alert(no_ambilatk);
                            $('#no_ambilatk_del').val(no_ambilatk);
                            $('#id').val(id);
                            // $('#btn-delete').attr('href', '<?= base_url() ?>Ambil_atk/deleteItemUser/' + id);
                        });
                    });

                    $(document).ready(function() {
                        $(document).on('click', '#editambil', function() {

                            var id = $(this).data('id');
                            var nm_barang = $(this).data('nm_barang');
                            var qty = $(this).data('qty');
                            var keperluan = $(this).data('keperluan');
                            var no_ambilatk = $(this).data('no_ambilatk');
                            var sisa = $(this).data('sisa');

                            $('#id_detail').val(id);
                            $('#nm_barang').val(nm_barang);
                            $('#qty').val(qty);
                            $('#no_ambilatk').val(no_ambilatk);
                            $('#sisa').text(sisa);
                            $('textarea#keperluan').val(keperluan);
                        });
                    });

                    // var count = $("#count").val();
                    // $(document).ready(function() {
                    //     $("#qty").keyup(function() {
                    //         var qty = $("#qty").val();
                    //         var sisa = $("#sisa").text();
                    //         var inp_1 = Number(qty);
                    //         var inp_2 = Number(sisa);

                    //         if (qty > sisa) {
                    //             // swal("QTY Melebihi sisa");
                    //             $("#qty").val("");
                    //         } else {
                    //             $("#qty").val(inp_1);
                    //         }
                    //     });
                    // });
                </script>

            </div> <!-- content -->

            <!-- Footer Start -->
            <footer class="footer">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-6">
                            <script>
                                document.write(new Date().getFullYear())
                            </script> &copy; Pengambilan ATK HRD <a href=""></a>
                        </div>
                        <div class="col-md-6">
                            <div class="text-md-right footer-links d-none d-sm-block">
                                <a href="javascript:void(0);">Management Information System</a>
                            </div>
                        </div>
                    </div>
                </div>
            </footer>
            <!-- end Footer -->

        </div>

        <!-- ============================================================== -->
        <!-- End Page content -->
        <!-- ============================================================== -->


    </div>
    <!-- END wrapper -->

    <!-- Right Sidebar -->
    <div class="right-bar">
        <div data-simplebar class="h-100">

            <!-- Nav tabs -->
            <ul class="nav nav-tabs nav-bordered nav-justified" role="tablist">
                <li class="nav-item">
                    <a class="nav-link py-2" data-toggle="tab" href="#chat-tab" role="tab">
                        <i class="mdi mdi-message-text d-block font-22 my-1"></i>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link py-2" data-toggle="tab" href="#tasks-tab" role="tab">
                        <i class="mdi mdi-format-list-checkbox d-block font-22 my-1"></i>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link py-2 active" data-toggle="tab" href="#settings-tab" role="tab">
                        <i class="mdi mdi-cog-outline d-block font-22 my-1"></i>
                    </a>
                </li>
            </ul>

            <!-- Tab panes -->
            <div class="tab-content pt-0">
                <div class="tab-pane" id="chat-tab" role="tabpanel">

                    <form class="search-bar p-3">
                        <div class="position-relative">
                            <input type="text" class="form-control" placeholder="Search...">
                            <span class="mdi mdi-magnify"></span>
                        </div>
                    </form>

                    <h6 class="font-weight-medium px-3 mt-2 text-uppercase">Group Chats</h6>

                    <div class="p-2">
                        <a href="javascript: void(0);" class="text-reset notification-item pl-3 mb-2 d-block">
                            <i class="mdi mdi-checkbox-blank-circle-outline mr-1 text-success"></i>
                            <span class="mb-0 mt-1">App Development</span>
                        </a>

                        <a href="javascript: void(0);" class="text-reset notification-item pl-3 mb-2 d-block">
                            <i class="mdi mdi-checkbox-blank-circle-outline mr-1 text-warning"></i>
                            <span class="mb-0 mt-1">Office Work</span>
                        </a>

                        <a href="javascript: void(0);" class="text-reset notification-item pl-3 mb-2 d-block">
                            <i class="mdi mdi-checkbox-blank-circle-outline mr-1 text-danger"></i>
                            <span class="mb-0 mt-1">Personal Group</span>
                        </a>

                        <a href="javascript: void(0);" class="text-reset notification-item pl-3 d-block">
                            <i class="mdi mdi-checkbox-blank-circle-outline mr-1"></i>
                            <span class="mb-0 mt-1">Freelance</span>
                        </a>
                    </div>

                    <h6 class="font-weight-medium px-3 mt-3 text-uppercase">Favourites <a href="javascript: void(0);" class="font-18 text-danger"><i class="float-right mdi mdi-plus-circle"></i></a></h6>

                    <div class="p-2">
                        <a href="javascript: void(0);" class="text-reset notification-item">
                            <div class="media">
                                <div class="position-relative mr-2">
                                    <img src="<?= base_url() ?>/assets/images/users/user-10.jpg" class="rounded-circle avatar-sm" alt="user-pic">
                                    <i class="mdi mdi-circle user-status online"></i>
                                </div>
                                <div class="media-body overflow-hidden">
                                    <h6 class="mt-0 mb-1 font-14">Andrew Mackie</h6>
                                    <div class="font-13 text-muted">
                                        <p class="mb-0 text-truncate">It will seem like simplified English.</p>
                                    </div>
                                </div>
                            </div>
                        </a>

                        <a href="javascript: void(0);" class="text-reset notification-item">
                            <div class="media">
                                <div class="position-relative mr-2">
                                    <img src="<?= base_url() ?>/assets/images/users/user-1.jpg" class="rounded-circle avatar-sm" alt="user-pic">
                                    <i class="mdi mdi-circle user-status away"></i>
                                </div>
                                <div class="media-body overflow-hidden">
                                    <h6 class="mt-0 mb-1 font-14">Rory Dalyell</h6>
                                    <div class="font-13 text-muted">
                                        <p class="mb-0 text-truncate">To an English person, it will seem like simplified</p>
                                    </div>
                                </div>
                            </div>
                        </a>

                        <a href="javascript: void(0);" class="text-reset notification-item">
                            <div class="media">
                                <div class="position-relative mr-2">
                                    <img src="<?= base_url() ?>/assets/images/users/user-9.jpg" class="rounded-circle avatar-sm" alt="user-pic">
                                    <i class="mdi mdi-circle user-status busy"></i>
                                </div>
                                <div class="media-body overflow-hidden">
                                    <h6 class="mt-0 mb-1 font-14">Jaxon Dunhill</h6>
                                    <div class="font-13 text-muted">
                                        <p class="mb-0 text-truncate">To achieve this, it would be necessary.</p>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>

                    <h6 class="font-weight-medium px-3 mt-3 text-uppercase">Other Chats <a href="javascript: void(0);" class="font-18 text-danger"><i class="float-right mdi mdi-plus-circle"></i></a></h6>

                    <div class="p-2 pb-4">
                        <a href="javascript: void(0);" class="text-reset notification-item">
                            <div class="media">
                                <div class="position-relative mr-2">
                                    <img src="<?= base_url() ?>/assets/images/users/user-2.jpg" class="rounded-circle avatar-sm" alt="user-pic">
                                    <i class="mdi mdi-circle user-status online"></i>
                                </div>
                                <div class="media-body overflow-hidden">
                                    <h6 class="mt-0 mb-1 font-14">Jackson Therry</h6>
                                    <div class="font-13 text-muted">
                                        <p class="mb-0 text-truncate">Everyone realizes why a new common language.</p>
                                    </div>
                                </div>
                            </div>
                        </a>

                        <a href="javascript: void(0);" class="text-reset notification-item">
                            <div class="media">
                                <div class="position-relative mr-2">
                                    <img src="<?= base_url() ?>/assets/images/users/user-4.jpg" class="rounded-circle avatar-sm" alt="user-pic">
                                    <i class="mdi mdi-circle user-status away"></i>
                                </div>
                                <div class="media-body overflow-hidden">
                                    <h6 class="mt-0 mb-1 font-14">Charles Deakin</h6>
                                    <div class="font-13 text-muted">
                                        <p class="mb-0 text-truncate">The languages only differ in their grammar.</p>
                                    </div>
                                </div>
                            </div>
                        </a>

                        <a href="javascript: void(0);" class="text-reset notification-item">
                            <div class="media">
                                <div class="position-relative mr-2">
                                    <img src="<?= base_url() ?>/assets/images/users/user-5.jpg" class="rounded-circle avatar-sm" alt="user-pic">
                                    <i class="mdi mdi-circle user-status online"></i>
                                </div>
                                <div class="media-body overflow-hidden">
                                    <h6 class="mt-0 mb-1 font-14">Ryan Salting</h6>
                                    <div class="font-13 text-muted">
                                        <p class="mb-0 text-truncate">If several languages coalesce the grammar of the resulting.</p>
                                    </div>
                                </div>
                            </div>
                        </a>

                        <a href="javascript: void(0);" class="text-reset notification-item">
                            <div class="media">
                                <div class="position-relative mr-2">
                                    <img src="<?= base_url() ?>/assets/images/users/user-6.jpg" class="rounded-circle avatar-sm" alt="user-pic">
                                    <i class="mdi mdi-circle user-status online"></i>
                                </div>
                                <div class="media-body overflow-hidden">
                                    <h6 class="mt-0 mb-1 font-14">Sean Howse</h6>
                                    <div class="font-13 text-muted">
                                        <p class="mb-0 text-truncate">It will seem like simplified English.</p>
                                    </div>
                                </div>
                            </div>
                        </a>

                        <a href="javascript: void(0);" class="text-reset notification-item">
                            <div class="media">
                                <div class="position-relative mr-2">
                                    <img src="<?= base_url() ?>/assets/images/users/user-7.jpg" class="rounded-circle avatar-sm" alt="user-pic">
                                    <i class="mdi mdi-circle user-status busy"></i>
                                </div>
                                <div class="media-body overflow-hidden">
                                    <h6 class="mt-0 mb-1 font-14">Dean Coward</h6>
                                    <div class="font-13 text-muted">
                                        <p class="mb-0 text-truncate">The new common language will be more simple.</p>
                                    </div>
                                </div>
                            </div>
                        </a>

                        <a href="javascript: void(0);" class="text-reset notification-item">
                            <div class="media">
                                <div class="position-relative mr-2">
                                    <img src="<?= base_url() ?>/assets/images/users/user-8.jpg" class="rounded-circle avatar-sm" alt="user-pic">
                                    <i class="mdi mdi-circle user-status away"></i>
                                </div>
                                <div class="media-body overflow-hidden">
                                    <h6 class="mt-0 mb-1 font-14">Hayley East</h6>
                                    <div class="font-13 text-muted">
                                        <p class="mb-0 text-truncate">One could refuse to pay expensive translators.</p>
                                    </div>
                                </div>
                            </div>
                        </a>

                        <div class="text-center mt-3">
                            <a href="javascript:void(0);" class="btn btn-sm btn-white">
                                <i class="mdi mdi-spin mdi-loading mr-2"></i>
                                Load more
                            </a>
                        </div>
                    </div>

                </div>

                <div class="tab-pane" id="tasks-tab" role="tabpanel">
                    <h6 class="font-weight-medium p-3 m-0 text-uppercase">Working Tasks</h6>
                    <div class="px-2">
                        <a href="javascript: void(0);" class="text-reset item-hovered d-block p-2">
                            <p class="text-muted mb-0">App Development<span class="float-right">75%</span></p>
                            <div class="progress mt-2" style="height: 4px;">
                                <div class="progress-bar bg-success" role="progressbar" style="width: 75%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </a>

                        <a href="javascript: void(0);" class="text-reset item-hovered d-block p-2">
                            <p class="text-muted mb-0">Database Repair<span class="float-right">37%</span></p>
                            <div class="progress mt-2" style="height: 4px;">
                                <div class="progress-bar bg-info" role="progressbar" style="width: 37%" aria-valuenow="37" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </a>

                        <a href="javascript: void(0);" class="text-reset item-hovered d-block p-2">
                            <p class="text-muted mb-0">Backup Create<span class="float-right">52%</span></p>
                            <div class="progress mt-2" style="height: 4px;">
                                <div class="progress-bar bg-warning" role="progressbar" style="width: 52%" aria-valuenow="52" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </a>
                    </div>

                    <h6 class="font-weight-medium px-3 mb-0 mt-4 text-uppercase">Upcoming Tasks</h6>

                    <div class="p-2">
                        <a href="javascript: void(0);" class="text-reset item-hovered d-block p-2">
                            <p class="text-muted mb-0">Sales Reporting<span class="float-right">12%</span></p>
                            <div class="progress mt-2" style="height: 4px;">
                                <div class="progress-bar bg-danger" role="progressbar" style="width: 12%" aria-valuenow="12" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </a>

                        <a href="javascript: void(0);" class="text-reset item-hovered d-block p-2">
                            <p class="text-muted mb-0">Redesign Website<span class="float-right">67%</span></p>
                            <div class="progress mt-2" style="height: 4px;">
                                <div class="progress-bar bg-primary" role="progressbar" style="width: 67%" aria-valuenow="67" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </a>

                        <a href="javascript: void(0);" class="text-reset item-hovered d-block p-2">
                            <p class="text-muted mb-0">New Admin Design<span class="float-right">84%</span></p>
                            <div class="progress mt-2" style="height: 4px;">
                                <div class="progress-bar bg-success" role="progressbar" style="width: 84%" aria-valuenow="84" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </a>
                    </div>

                    <div class="p-3 mt-2">
                        <a href="javascript: void(0);" class="btn btn-success btn-block waves-effect waves-light">Create Task</a>
                    </div>

                </div>
                <div class="tab-pane active" id="settings-tab" role="tabpanel">
                    <h6 class="font-weight-medium px-3 m-0 py-2 font-13 text-uppercase bg-light">
                        <span class="d-block py-1">Theme Settings</span>
                    </h6>

                    <div class="p-3">
                        <div class="alert alert-warning" role="alert">
                            <strong>Customize </strong> the overall color scheme, sidebar menu, etc.
                        </div>

                        <h6 class="font-weight-medium font-14 mt-4 mb-2 pb-1">Color Scheme</h6>
                        <div class="custom-control custom-switch mb-1">
                            <input type="radio" class="custom-control-input" name="color-scheme-mode" value="light" id="light-mode-check" checked />
                            <label class="custom-control-label" for="light-mode-check">Light Mode</label>
                        </div>

                        <div class="custom-control custom-switch mb-1">
                            <input type="radio" class="custom-control-input" name="color-scheme-mode" value="dark" id="dark-mode-check" />
                            <label class="custom-control-label" for="dark-mode-check">Dark Mode</label>
                        </div>

                        <!-- Width -->
                        <h6 class="font-weight-medium font-14 mt-4 mb-2 pb-1">Width</h6>
                        <div class="custom-control custom-switch mb-1">
                            <input type="radio" class="custom-control-input" name="width" value="fluid" id="fluid-check" checked />
                            <label class="custom-control-label" for="fluid-check">Fluid</label>
                        </div>
                        <div class="custom-control custom-switch mb-1">
                            <input type="radio" class="custom-control-input" name="width" value="boxed" id="boxed-check" />
                            <label class="custom-control-label" for="boxed-check">Boxed</label>
                        </div>

                        <!-- Menu positions -->
                        <h6 class="font-weight-medium font-14 mt-4 mb-2 pb-1">Menus (Leftsidebar and Topbar) Positon</h6>

                        <div class="custom-control custom-switch mb-1">
                            <input type="radio" class="custom-control-input" name="menus-position" value="fixed" id="fixed-check" checked />
                            <label class="custom-control-label" for="fixed-check">Fixed</label>
                        </div>

                        <div class="custom-control custom-switch mb-1">
                            <input type="radio" class="custom-control-input" name="menus-position" value="scrollable" id="scrollable-check" />
                            <label class="custom-control-label" for="scrollable-check">Scrollable</label>
                        </div>

                        <!-- Left Sidebar-->
                        <h6 class="font-weight-medium font-14 mt-4 mb-2 pb-1">Left Sidebar Color</h6>

                        <div class="custom-control custom-switch mb-1">
                            <input type="radio" class="custom-control-input" name="leftsidebar-color" value="light" id="light-check" checked />
                            <label class="custom-control-label" for="light-check">Light</label>
                        </div>

                        <div class="custom-control custom-switch mb-1">
                            <input type="radio" class="custom-control-input" name="leftsidebar-color" value="dark" id="dark-check" />
                            <label class="custom-control-label" for="dark-check">Dark</label>
                        </div>

                        <div class="custom-control custom-switch mb-1">
                            <input type="radio" class="custom-control-input" name="leftsidebar-color" value="brand" id="brand-check" />
                            <label class="custom-control-label" for="brand-check">Brand</label>
                        </div>

                        <div class="custom-control custom-switch mb-3">
                            <input type="radio" class="custom-control-input" name="leftsidebar-color" value="gradient" id="gradient-check" />
                            <label class="custom-control-label" for="gradient-check">Gradient</label>
                        </div>

                        <!-- size -->
                        <h6 class="font-weight-medium font-14 mt-4 mb-2 pb-1">Left Sidebar Size</h6>

                        <div class="custom-control custom-switch mb-1">
                            <input type="radio" class="custom-control-input" name="leftsidebar-size" value="default" id="default-size-check" checked />
                            <label class="custom-control-label" for="default-size-check">Default</label>
                        </div>

                        <div class="custom-control custom-switch mb-1">
                            <input type="radio" class="custom-control-input" name="leftsidebar-size" value="condensed" id="condensed-check" />
                            <label class="custom-control-label" for="condensed-check">Condensed <small>(Extra Small size)</small></label>
                        </div>

                        <div class="custom-control custom-switch mb-1">
                            <input type="radio" class="custom-control-input" name="leftsidebar-size" value="compact" id="compact-check" />
                            <label class="custom-control-label" for="compact-check">Compact <small>(Small size)</small></label>
                        </div>

                        <!-- User info -->
                        <h6 class="font-weight-medium font-14 mt-4 mb-2 pb-1">Sidebar User Info</h6>

                        <div class="custom-control custom-switch mb-1">
                            <input type="checkbox" class="custom-control-input" name="leftsidebar-user" value="fixed" id="sidebaruser-check" />
                            <label class="custom-control-label" for="sidebaruser-check">Enable</label>
                        </div>


                        <!-- Topbar -->
                        <h6 class="font-weight-medium font-14 mt-4 mb-2 pb-1">Topbar</h6>

                        <div class="custom-control custom-switch mb-1">
                            <input type="radio" class="custom-control-input" name="topbar-color" value="dark" id="darktopbar-check" checked />
                            <label class="custom-control-label" for="darktopbar-check">Dark</label>
                        </div>

                        <div class="custom-control custom-switch mb-1">
                            <input type="radio" class="custom-control-input" name="topbar-color" value="light" id="lighttopbar-check" />
                            <label class="custom-control-label" for="lighttopbar-check">Light</label>
                        </div>


                        <button class="btn btn-primary btn-block mt-4" id="resetBtn">Reset to Default</button>

                        <a href="https://1.envato.market/uboldadmin" class="btn btn-danger btn-block mt-3" target="_blank"><i class="mdi mdi-basket mr-1"></i> Purchase Now</a>

                    </div>

                </div>
            </div>

        </div> <!-- end slimscroll-menu-->
    </div>
    <!-- /Right-bar -->

    <!-- Right bar overlay-->
    <div class="rightbar-overlay"></div>

    <!-- third party js -->
    <script src="<?= base_url() ?>/assets/libs/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="<?= base_url() ?>/assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="<?= base_url() ?>/assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="<?= base_url() ?>/assets/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js"></script>
    <script src="<?= base_url() ?>/assets/libs/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="<?= base_url() ?>/assets/libs/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js"></script>
    <script src="<?= base_url() ?>/assets/libs/datatables.net-buttons/js/buttons.html5.min.js"></script>
    <script src="<?= base_url() ?>/assets/libs/datatables.net-buttons/js/buttons.flash.min.js"></script>
    <script src="<?= base_url() ?>/assets/libs/datatables.net-buttons/js/buttons.print.min.js"></script>
    <script src="<?= base_url() ?>/assets/libs/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
    <script src="<?= base_url() ?>/assets/libs/datatables.net-select/js/dataTables.select.min.js"></script>
    <script src="<?= base_url() ?>/assets/libs/pdfmake/build/pdfmake.min.js"></script>
    <script src="<?= base_url() ?>/assets/libs/pdfmake/build/vfs_fonts.js"></script>
    <!-- CHART -->
    <script src="<?= base_url() ?>/assets/libs/apexcharts/apexcharts.min.js"></script>
    <script src="https://apexcharts.com/samples/assets/irregular-data-series.js"></script>
    <script src="https://apexcharts.com/samples/assets/ohlc.js"></script>
    <script src="<?= base_url() ?>/assets/js/pages/apexcharts.init.js"></script>
    <!-- third party js ends -->

    <!-- Datatables init -->
    <script src="<?= base_url() ?>/assets/js/pages/datatables.init.js"></script>

    <!-- App js -->
    <script src="<?= base_url() ?>/assets/js/app.min.js"></script>



</body>

</html>