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

                <div class="container-fluid">

                    <!-- start page title -->
                    <div class="row">
                        <div class="col-12">
                            <div class="page-title-box">
                                <div class="page-title-right">
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end page title -->


                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <h4 class="header-title col-md-6">Form Permintaan ATK (USER)</h4>
                                        <div class="text-right col-md-6">
                                            <h4 class="header-title" id="no_ambilatk_"><?= $no_ambilatk ?></h4>
                                        </div>
                                    </div>
                                    <input type="hidden" name="no_urut" id="no_urut" value="<?= $memberi_no ?>">
                                    <br>
                                    <input type="hidden" name="nama_pt" class="form-control" value="">
                                    <div class="row justify-content-md-center">
                                        <div class="col-md-3">
                                            <div class="form-group row mb-2">
                                                <div class="col">
                                                    <select name="nama_pt" id="nama_pt" class="form-control" required>
                                                        <option value="" selected disabled>-- Select PT --</option>
                                                        <?php foreach ($pt as $p) : ?>
                                                            <option value="<?= $p['nama_pt'] ?>"><?= $p['alias'] ?></option>
                                                        <?php endforeach; ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group row mb-2">
                                                <div class="col">
                                                    <select name="user_nama" id="user_nama" class="form-control" required>
                                                        <!-- <option value="<?= $this->session->userdata('userlogin') ?>"><?= $this->session->userdata('userlogin') ?></option> -->
                                                        <option value="" selected disabled>-- Select Name --</option>
                                                        <?php foreach ($user_nama as $un) : ?>
                                                            <option value="<?= $un['nama'] ?>"><?= $un['nama'] ?></option>
                                                        <?php endforeach; ?>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group row mb-2">
                                                <div class="col">
                                                    <div class="input-group">
                                                        <input type="text" id="getitematk" class="form-control" placeholder="Masukkan ATK" disabled>
                                                        <!-- <input type="text" class="form-control" placeholder="Recipient's username" aria-label="Recipient's username"> -->
                                                        <div class="input-group-append">
                                                            <button class="btn btn-primary waves-effect waves-light" type="button" data-toggle="modal" data-target="#modal-item">Pilih</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group row mb-2">
                                                <div class="col">
                                                    <div class="input-group mb-1">
                                                        <input type="number" class="form-control bg-light" id="getitemqty_info" id="inlineFormInputGroup" placeholder="Qty Yang Tersedia" disabled>
                                                        <div class="input-group-prepend">
                                                            <div class="input-group-text"><span id="satuan">Sat</span></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group row mb-2">
                                                <div class="col">
                                                    <div class="input-group">
                                                        <input type="number" class="form-control" min="1" max="10000" id="getitemqty" placeholder="Masukkan Qty">
                                                        <div class="input-group-prepend">
                                                            <div class="input-group-text"><span id="satuan_inp">Sat</span></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group row mb-2">
                                                <div class="col">
                                                    <input type="text" id="getitemkep" class="form-control" rows="1" placeholder="Keperluan">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group row mb-2">
                                                <div class="col">
                                                    <input type="hidden" id="kode_atk" class="form-control">
                                                    <input type="hidden" id="getuser" class="form-control">
                                                    <input type="hidden" id="getpt" class="form-control">
                                                    <input type="hidden" id="getitem_kdinput" class="form-control">
                                                    <input type="hidden" id="getitem_katatk" class="form-control">
                                                    <input type="hidden" id="getitem_sat" class="form-control">

                                                    <input type="hidden" id="getitemharga" class="form-control">


                                                    <!-- <input type="text" id="getitemqty" class="form-control mb-1" placeholder="Masukkan QTY"> -->
                                                    <!-- <button class="btn btn-md btn-rounded waves-effect btn-info mb-2 mr-1" type="button" data-toggle="modal" data-target="#modal-item">Pilih ATK&nbsp;&nbsp;</button> -->
                                                    <button class="btn btn-md btn-rounded waves-effect btn-success mb-2 mr-1" type="button" id="clickambilatk">Ambil ATK</button>
                                                </div>
                                                <!-- <div class="col-3">
                                                </div> -->
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                    <br>
                                    <!-- <span>Anda belum menyelesaikannya</span> -->
                                    <div class="table-responsive">
                                        <table class="table table-bordered w-60 table-sm" id="datatable">

                                            <thead class="thead-light">
                                                <tr>
                                                    <th>No</th>
                                                    <th>Nama ATK</th>
                                                    <th>Qty Input</th>
                                                    <th>Kode Input ATK</th>
                                                    <th>Kategori</th>
                                                    <th>Satuan</th>
                                                    <th>Harga perATK</th>
                                                    <th>Keperluan</th>
                                                </tr>
                                            </thead>
                                            <tbody id="atkterpilih">
                                                <!-- <tr>
                                    <td>1</td>
                                    <td>
                                        <span id="nm_barang"></span>
                                        <input type="text" name="nm_barang" id="nm_barang_input">
                                    </td>
                                    <td>
                                        <span id="qty"></span>
                                    </td>
                                </tr> -->


                                            </tbody>
                                        </table>
                                    </div>
                                    <!-- <div class="form-group row mb-6" id="addAtk">
                            <label class="col-2 col-form-label">Nama ATK</label>
                            <div class="col-2">
                                <input type="text" class="form-control" name="nm_barang" value="">
                            </div>
                            <label class="col-1 col-form-label">Stok Qty</label>
                            <div class="input-group col-2">
                                <input type="text" class="form-control bg-light" value="">
                                <div class="input-group-append">
                                    <button href="#" class="btn btn-dark waves-effect waves-light"></button>
                                </div>
                            </div>
                            <label class="col-1 col-form-label">Get Qty</label>
                            <div class="input-group col-2">
                                <input type="text" class="form-control" name="qty" value="">
                                <div class="input-group-append">
                                    <button href="#" class="btn btn-dark waves-effect waves-light"></button>
                                </div>
                            </div>
                            <input type="hidden" name="kat_barang" class="form-control" value="">
                            <input type="hidden" name="satuan" class="form-control" value="">
                            <button type="button" class="btn btn-success btn-rounded" id="clickAddAtk"><i class="fas fa-plus"></i></button>
                        </div>
                        <br>
                        <div class="form-group row">
                            <label class="col-2 col-form-label">Keperluan</label>
                            <div class="col-6">
                                <textarea type="text" name="keperluan" class="form-control"></textarea>
                            </div>
                            <div class="col-1"></div>
                        </div> -->
                                    <div class="form-group mb-0 justify-content-end row">
                                        <div class="col-2">
                                            <button onclick="deleteConfirm('<?= base_url('Ambil_atk/BatalAmbil/' . $no_ambilatk) ?>')" class="btn btn-danger waves-effect waves-light" id="batal">Batal</button>
                                            <button type="button" class="btn btn-primary waves-effect waves-light" id="save">Simpan</button>
                                        </div>
                                    </div>

                                    <hr>
                                    <h4 class="header-title mb-3">Total Booking ATK</h4>
                                    <div class="table-responsive">
                                        <table class="table table-borderless table-hover table-nowrap table-sm m-0" id="basic-datatable">

                                            <thead class="thead-light">
                                                <tr>
                                                    <th>No</th>
                                                    <th>No Ambil ATk</th>
                                                    <th>User</th>
                                                    <th>Jumlah Item</th>
                                                    <th>Tgl Pengambilan</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $no = 1; ?>
                                                <?php foreach ($ambil_atk as $aa) { ?>
                                                    <?php $jml = $aa['no_ambilatk'] ?>
                                                    <tr>
                                                        <td><?= $no++; ?>
                                                        </td>
                                                        <td>
                                                            <h5 class="m-0 font-weight-normal"><?= $aa['no_ambilatk'] ?></h5>
                                                        </td>

                                                        <td>
                                                            <?= strtoupper($aa['user_nama']); ?>
                                                        </td>

                                                        <td class="text-center">
                                                            <?= $this->db->query("SELECT * FROM tb_detail_ambilatk WHERE no_ambilatk = '$jml' ")->num_rows() ?>
                                                        </td>

                                                        <td>
                                                            <?= $aa['tgl_permintaan'] ?>
                                                        </td>
                                                        <td>
                                                            <!-- <button href="#!" data-no_ambilatk=<?= $jml ?> id="oke" class="btn btn-sm  btn-rounded waves-effect waves-light btn-success"><i class="mdi mdi-check mr-1"></i></button> -->
                                                            <?= anchor('Permintaan/lebihLanjut/' . $aa['no_ambilatk'], '<button class="btn btn-sm  btn-rounded waves-effect waves-light btn-info"><i class="mdi mdi-eye mr-1"></i></button>'); ?>
                                                            <!-- <button onclick="deleteConfirm('<?= base_url('Ambil_atk/deletePermintaan/' . $aa['no_ambilatk']) ?>')" href="#!" class="btn btn-sm  btn-rounded waves-effect waves-light btn-danger"><i class="mdi mdi-delete mr-1"></i></button> -->
                                                            <!-- <button class="btn btn-xs btn-info" data-toggle="modal" data-target="#editModal<?= $aa['id'] ?>"><i class="fas fa-angle-double-right mr-1"></i>Lebih lanjut</button> -->
                                                        </td>
                                                    </tr>
                                                <?php } ?>

                                            </tbody>
                                        </table>
                                    </div>

                                </div> <!-- end card-body -->
                            </div> <!-- end card -->
                        </div> <!-- end col -->

                        <!-- end card-box -->

                    </div>

                </div> <!-- end col-->


                <!-- SELECT MODAL -->
                <div class="modal fade bd-example-modal-lg" id="modal-item" tabindex="-1" aria-labelledby="myLargeModalLabel" role="dialog">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="title" id="defaultModalLabel">Pilih ATK</h4>
                            </div>
                            <div class="modal-body">
                                <table class="table table-sm nowrap table-bordered w-60" id="myTable">

                                    <thead class="thead-light">
                                        <tr>
                                            <th>No</th>
                                            <th>Nama ATK</th>
                                            <th>Qty</th>
                                            <th>Satuan</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 1; ?>
                                        <?php foreach ($stok_atk as $sa) { ?>

                                            <?php $nm_atk = $sa['kd_inputatk']; ?>
                                            <?php
                                            $query = "SELECT SUM(qty) as qtyatk from tb_barang where kd_inputatk='$nm_atk'";
                                            $qry = $this->db->query($query)->result_array();

                                            foreach ($qry as $data) {
                                                $qtyatk = $data['qtyatk'];
                                            }


                                            $row = "SELECT SUM(qty) as qtyambil  FROM tb_detail_ambilatk where kd_inputatk='$nm_atk'";
                                            $row1 = "SELECT SUM(qty_rusak) as qtyambil_rusak  FROM tb_atk_rusak where kd_inputatk='$nm_atk'";

                                            $result2 = $this->db->query($row)->result_array();
                                            foreach ($result2 as $row2) {
                                                $qtyambil = $row2['qtyambil'];
                                            }
                                            $result3 = $this->db->query($row1)->result_array();
                                            foreach ($result3 as $row3) {
                                                $qtyambilrusak = $row3['qtyambil_rusak'];
                                            }
                                            $qtytotal = $qtyambilrusak + $qtyambil;
                                            $saldo = $qtyatk - $qtytotal;

                                            if ($saldo > 0) : ?>

                                                <tr>
                                                    <td>
                                                        <?= $no++; ?>
                                                    </td>
                                                    <td>
                                                        <h5 class="m-0 font-weight-normal"><?= $sa['nm_barang'] ?></h5>
                                                    </td>

                                                    <td>
                                                        </i> <?= $saldo ?>
                                                    </td>

                                                    <td>
                                                        </i> <?= $sa['satuan'] ?>
                                                    </td>

                                                    <td>
                                                        <button type="button" class="btn btn-sm btn-info btn-rounded waves-effect waves-light" id="select" data-qty="<?php echo $saldo  ?>" data-ket="<?= $sa['keterangan'] ?>" data-kd_atk="<?= $sa['kd_barang'] ?>" data-harga="<?= $sa['harga'] ?>" data-satuan="<?php echo $sa['satuan']  ?>" data-kat_barang="<?php echo $sa['kat_barang']  ?>" data-kd_inputatk="<?php echo $sa['kd_inputatk']  ?>" data-nm_barang="<?php echo $sa['nm_barang'] ?>"><i class="fas fa-check mr-1"></i>Select</button>
                                                    </td>
                                                </tr>
                                            <?php endif; ?>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- DELETE MODAL SELURUH ATK -->
                <div class="modal fade" id="deleteModalAmbil" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Batal?</h5>
                                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                            </div>
                            <div class="modal-body">Anda yakin ingin membatalkannya?</div>
                            <div class="modal-footer">
                                <button class="btn" type="button" data-dismiss="modal">Tidak jadi</button>
                                <a id="btn-batal" class="btn btn-danger" href="#">Yaa</a>
                            </div>
                        </div>
                    </div>
                </div>

                <script>
                    $(document).ready(function() {
                        $('#getitemqty').keyup(function() {
                            var a = $('#getitemqty').val();
                            var b = $('#getitemqty_info').val();
                            var inp_1 = Number(a);
                            var inp_2 = Number(b);

                            // if (inp_1 == 0) {
                            //     swal("Min 1");
                            //     $('#getitemqty').val("1");
                            // } else {
                            //     $('#getitemqty').val(inp_1);
                            // }

                            if (inp_1 > inp_2) {
                                swal("QTY Melebihi stok");
                                $('#getitemqty').val("");
                            } else {
                                $('#getitemqty').val(inp_1);
                            }
                        });
                    });
                    $(document).ready(function() {
                        var no_ambilatk_ = $('#no_ambilatk_').text();
                        tabel_ambilatk(no_ambilatk_);

                        function tabel_ambilatk(no_ambilatk_) {
                            $.ajax({
                                type: 'GET',
                                url: '<?= base_url() ?>Permintaan/atkTerpilih',
                                dataType: 'JSON',
                                data: {
                                    no_ambilatk: no_ambilatk_
                                },
                                async: true,
                                success: function(data) {
                                    var html = '';
                                    var i;
                                    for (i = 0; i < data.length; i++) {
                                        var no = i + 1;
                                        html += '<tr>' +
                                            '<td>' + no + '</td>' +
                                            '<td>' + data[i].nm_barang + '</td>' +
                                            '<td>' + data[i].qty + '</td>' +
                                            '<td>' + data[i].kode_atk + '</td>' +
                                            '<td>' + data[i].kat_barang + '</td>' +
                                            '<td>' + data[i].sat + '</td>' +
                                            '<td>Rp. ' + data[i].harga + '</td>' +
                                            '<td>' + data[i].keperluan + '</td>' +
                                            '<td>' +
                                            '<a class="btn btn-sm btn-danger btn-rounded waves-effect waves-light" href="javascript:;" id="batal_ambil" data="' + data[i].id_detail_ambilatk + '">X</a>' +
                                            '</td>' +
                                            '</tr>';
                                    }
                                    $('#atkterpilih').html(html);
                                    if (data.length == 0) {
                                        $('#save').hide();
                                        $('#batal').hide();
                                        $('#getuser').val('');
                                        $('#nama_pt').prop('disabled', false);
                                        $('#user_nama').prop('disabled', false);
                                        $('#getitemharga').val('');
                                        $('#getitematk').val('');
                                        $('#getitemqty_info').val('');
                                        $('#getitemqty').val('');
                                        $('#getitemkep').val('');
                                        $('#satuan').text('');
                                    } else {
                                        $('#nama_pt').prop('disabled', true);
                                        $('#user_nama').prop('disabled', true);
                                        $('#batal').show();
                                        $('#save').show();

                                    }
                                }
                            });
                        }

                        $('#clickambilatk').click(function() {

                            var pt = $('#getpt').val();
                            var user = $('#getuser').val();
                            var qty = $('#getitemqty').val();
                            var kep = $('#getitemkep').val();

                            if (pt == '' && user == '') {
                                swal('Silahkan pilih PT dan Nama Anda');
                                $('#getitemharga').val('');
                                $('#getitematk').val('');
                                $('#getitemqty').val('');
                                $('#getitemkep').val('');
                                $('#satuan').text('');
                            } else if (pt == '') {
                                swal('Silahkan pilih PT');
                                $('#getitemharga').val('');
                                $('#getitematk').val('');
                                $('#getitemqty').val('');
                                $('#getitemkep').val('');
                                $('#satuan').text('');
                            } else if (user == '') {
                                swal('Silahkan pilih Nama Anda');
                                $('#getitemharga').val('');
                                $('#getitematk').val('');
                                $('#getitemqty').val('');
                                $('#getitemkep').val('');
                                $('#satuan').text('');
                            } else {
                                if (qty == '' || qty == 0) {
                                    swal('Maaf, QTY anda belum terisi');
                                } else if (kep == '') {
                                    swal('Mohon Masukkan Keperluan Anda');
                                } else {
                                    var no = $('#no').val();
                                    var no_ambilatk_ = $('#no_ambilatk_').text();
                                    var no_urut = $('#no_urut').val();
                                    var getitematk = $('#getitematk').val();
                                    var getitemqty = $('#getitemqty').val();
                                    var kodeatk = $('#kode_atk').val();
                                    var getuser = $('#getuser').val();
                                    var get_kdinput = $('#getitem_kdinput').val();
                                    var get_katatk = $('#getitem_katatk').val();
                                    var get_sat = $('#getitem_sat').val();
                                    var get_harga = $('#getitemharga').val();
                                    var get_kep = $('#getitemkep').val();

                                    $.ajax({
                                        url: "<?= base_url('Permintaan/insertAmbilAtk_sem'); ?>",
                                        type: "POST",
                                        data: {
                                            type: 1,
                                            no_urut: no_urut,
                                            no_ambilatk: no_ambilatk_,
                                            nm_barang: getitematk,
                                            kode_atk: kodeatk,
                                            qty: getitemqty,
                                            kd_inputatk: get_kdinput,
                                            kat_barang: get_katatk,
                                            sat: get_sat,
                                            harga: get_harga,
                                            keperluan: get_kep,
                                        },
                                        cache: false,
                                        success: function(data) {
                                            // alert('success');
                                            console.log(data);
                                            tabel_ambilatk(no_ambilatk_);
                                        }
                                    });
                                }
                            }

                            $(document).ready(function() {
                                $(document).on('click', '#select', function() {

                                    $('#getitemqty').val('');
                                    $('#getitemkep').val('');
                                    // $('#getitemkep').prop('disabled', false);

                                    var qty = $(this).data('qty');
                                    var nm_barang = $(this).data('nm_barang');
                                    var satuan = $(this).data('satuan');
                                    var kd_inputatk = $(this).data('kd_inputatk');
                                    var kd_atk = $(this).data('kd_atk');
                                    var kat_barang = $(this).data('kat_barang');
                                    var harga = $(this).data('harga');
                                    var keterangan = $(this).data('ket');
                                    var user = $('#user_nama').val();
                                    var pt = $('#nama_pt').val();

                                    // $('#qty').text(qty);
                                    // $('#qty_input').val(qty);
                                    // $('#nm_barang_input').val(nm_barang);
                                    // $('#nm_barang').text(nm_barang);
                                    // $('#modal-item').modal('hide');
                                    $('#getuser').val(user);
                                    $('#getpt').val(pt);
                                    $('#getitematk').val(nm_barang);
                                    $('#getitemqty_info').val(qty);
                                    $('#satuan').text(satuan);
                                    $('#satuan_inp').text(satuan);

                                    $('#getitem_kdinput').val(kd_inputatk);
                                    $('#getitem_katatk').val(kat_barang);

                                    $('#getitemharga').val(harga);
                                    $('#getitemket').val(keterangan);

                                    $('#getitem_sat').val(satuan);
                                    $('#kode_atk').val(kd_atk);



                                    $('#modal-item').modal('hide');
                                });
                            });

                        });

                        $('#atkterpilih').on('click', '#batal_ambil', function() {
                            // alert('batal');
                            var no_ambilatk_ = $('#no_ambilatk_').text();

                            var id = $(this).attr('data');
                            $.ajax({
                                dataType: 'JSON',
                                type: 'POST',
                                url: '<?= base_url('') ?>Ambil_atk/hapus_ambilatk_sem',
                                data: {
                                    id: id
                                },
                                success: function() {
                                    // alert('terbatal');
                                    tabel_ambilatk(no_ambilatk_);
                                }
                            });
                        });

                        //UPDATE STATUS 0 -> 1; WHERE no_ambilatk = ;
                        //INSERT KE HEADER
                        $('#save').click(function() {

                            swal({
                                title: "Ambil ATK?",
                                showCancelButton: true,
                                confirmButtonColor: "#1FAB45",
                                confirmButtonText: "Save",
                                cancelButtonText: "Cancel",
                                buttonsStyling: true
                            }).then(result => {
                                if (result.value) {
                                    // update status 0 -> 1
                                    var no_ambilatk = $('#no_ambilatk_').text();

                                    $.ajax({
                                        dataType: 'JSON',
                                        type: 'POST',
                                        data: {
                                            no_ambilatk: no_ambilatk
                                        },
                                        url: '<?= base_url() ?>Permintaan/updateStatus',
                                        cache: false,
                                        success: function() {
                                            insertHeader();
                                            swal({
                                                title: "Wow!",
                                                text: "Anda Berhasil Meminta ATK!",
                                                type: "success"
                                            }).then(function() {
                                                // window.location.href = '<?= base_url() ?>Ambil_atk/lebihLanjut/' + no_ambilatk;
                                                window.location.href = '<?= base_url() ?>Permintaan/lebihlanjut/' + no_ambilatk;
                                            });

                                        }
                                    });
                                    console.log(result.value)
                                } else {
                                    // handle dismiss, result.dismiss can be 'cancel', 'overlay', 'close', and 'timer'

                                    console.log(result.dismiss)
                                }
                            });
                        });

                        function insertHeader() {
                            //SAVE HEADER
                            var no_ambilatk = $('#no_ambilatk_').text();
                            var user_nama = $('#user_nama').val();
                            var nama_pt = $('#nama_pt').val();

                            $.ajax({
                                dataType: 'JSON',
                                type: 'POST',
                                data: {
                                    no_ambilatk: no_ambilatk,
                                    user_nama: user_nama,
                                    nama_pt: nama_pt,
                                },
                                url: '<?= base_url() ?>Permintaan/insertHeader',
                                cache: false,
                                success: function() {
                                    // alert('insert header suc');
                                }
                            });
                        }

                    });

                    function deleteConfirm(url) {
                        $('#btn-batal').attr('href', url);
                        $('#deleteModalAmbil').modal();
                    }
                </script>

                <script>
                    // function addAtk() {
                    //     $('#addAtk').append('<input type="text" class="form-control" name="nm_barang" value="">');
                    // }

                    $(document).ready(function() {
                        $(document).on('click', '#select', function() {

                            var qty = $(this).data('qty');
                            var nm_barang = $(this).data('nm_barang');
                            var satuan = $(this).data('satuan');
                            var kd_inputatk = $(this).data('kd_inputatk');
                            var kd_atk = $(this).data('kd_atk');
                            var kat_barang = $(this).data('kat_barang');
                            var harga = $(this).data('harga');
                            var keterangan = $(this).data('ket');
                            var user = $('#user_nama').val();
                            var pt = $('#nama_pt').val();

                            // $('#qty').text(qty);
                            // $('#qty_input').val(qty);
                            // $('#nm_barang_input').val(nm_barang);
                            // $('#nm_barang').text(nm_barang);
                            // $('#modal-item').modal('hide');
                            $('#getuser').val(user);
                            $('#getpt').val(pt);
                            $('#getitematk').val(nm_barang);
                            $('#getitemqty_info').val(qty);
                            $('#satuan').text(satuan);
                            $('#satuan_inp').text(satuan);

                            $('#getitem_kdinput').val(kd_inputatk);
                            $('#getitem_katatk').val(kat_barang);

                            $('#getitemharga').val(harga);
                            $('#getitemket').val(keterangan);

                            $('#getitem_sat').val(satuan);
                            $('#kode_atk').val(kd_atk);



                            $('#modal-item').modal('hide');
                        });
                    });


                    $(document).ready(function() {
                        $('#myTable').DataTable();
                    });
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