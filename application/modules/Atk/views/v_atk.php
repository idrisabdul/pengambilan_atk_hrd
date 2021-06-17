<style>
    .table-filter-container {
        text-align: right;
    }
</style>

<div class="container-fluid">

    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <button class="btn btn-md btn-rounded btn-success mr-1" data-toggle="modal" data-target="#addModal"><i class="fas fa-plus mr-1"></i>Tambah Barang</button>
                    <a href="<?= base_url() ?>Atk/pdf" class="btn btn-rounded btn-md btn-primary"><i class="fas fa-print mr-1"></i>Cetak</a>
                </div>
                <h4 class="page-title">Total Barang-barang ATK</h4>
                <?= $this->session->flashdata('message') ?>
            </div>
        </div>
    </div>
    <!-- end page title -->
    <p id="table-filter" style="display:none">
        Search:
        <select>
            <option value="">All</option>
            <?php foreach ($atk as $a) { ?>
                <option><?= $a['nm_barang'] ?></option>
            <?php } ?>
        </select>
    </p>


    <div class="row">
        <div class="col-lg-12">
            <div class="card-box pb-2">
                <div class="float-right d-none d-md-inline-block">
                    <div class="btn-group mb-2">
                        <button type="button" id="btn-filter" class="btn btn-sm btn-info" data-toggle="modal" data-target="#filterModal">Filter</button>
                        <a href="<?= base_url('Atk') ?>" type="button" id="btn-filter" class="btn btn-sm btn-info">Show All</a>
                        <!-- <button type="button" id="btn-unfilter" class="btn btn-sm btn-info">-</button> -->
                    </div>
                </div>

                <!-- <div class="row">
                    <div class="col-lg-6">
                        <div class="input-group">
                            <input id="scanner_input" class="form-control" placeholder="Click the button to scan an EAN..." type="text" />
                            <span class="input-group-btn">
                                <button class="btn btn-default" type="button" data-toggle="modal" data-target="#livestream_scanner">
                                    <i class="fa fa-barcode"></i>
                                </button>
                            </span> -->
                <!-- </div>
                    </div>
                </div> -->

                <h4 class="header-title mb-3">Total ATK</h4>
                <div class="table-responsive">
                    <table class="table table-borderless table-hover table-sm table-centered m-0" id="example">

                        <!-- <thead class="pb-10 mb-10" id="filter">
                            <tr>
                                <th class="text-right">Nama Atk :</th>
                                <th></th>
                                <th class="text-right">Kategori :</th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                            </tr>
                        </thead> -->
                        <thead class="thead-light">
                            <tr>
                                <th>No</th>
                                <th>Nama Barang</th>
                                <th>Kode Atk</th>
                                <th>Kode Barang</th>
                                <th>Kategori</th>
                                <th>Satuan</th>
                                <th>Jumlah Stok</th>
                                <th>Tgl Masuk Barang</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1; ?>
                            <?php foreach ($atk_filt as $a) { ?>
                                <tr>
                                    <td>
                                        <?= $no++; ?>
                                    </td>
                                    <td>
                                        <?= $a['nm_barang'] ?>
                                    </td>

                                    <td>
                                        <?= $a['kodeatk_set'] ?>
                                    </td>
                                    <td>
                                        <?php if ($a['kode_barang'] == null) { ?>
                                            <span>Tidak ada</span>
                                        <?php } else { ?>
                                            <img src="<?= site_url('Atk/Barcode/' . $a['kode_barang']) ?>" alt="">
                                            <p style="font-size: 1px"><?= $a['kode_barang'] ?></p>
                                        <?php } ?>
                                    </td>

                                    <td>
                                        <?= $a['nm_kategori'] ?>
                                    </td>
                                    <td>
                                        <?= $a['satuan_set'] ?>
                                    </td>

                                    <td>
                                        <?= $a['qty'] ?>
                                    </td>
                                    <td>
                                        <?= $a['tgl_masuk_barang'] ?>
                                    </td>

                                    <td>
                                        <button class="btn btn-sm btn-rounded waves-effect waves-light btn-warning" data-toggle="modal" data-target="#editModal<?= $a['id_barang'] ?>"><i class="fa fa-edit mr-1"></i></button>
                                        <button onclick="deleteConfirm('<?= base_url('Atk/delete/' . $a['id_barang']) ?>')" href="#!" class="btn btn-sm  btn-rounded waves-effect waves-light btn-danger"><i class="mdi mdi-delete mr-1"></i></button>
                                    </td>
                                </tr>
                            <?php } ?>

                        </tbody>
                    </table>
                </div>
            </div>
        </div> <!-- end col -->
    </div> <!-- end card-box -->
</div> <!-- end col-->

<!-- ADD ITEM MODAL -->
<div class="modal fade" id="addModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="title" id="defaultModalLabel">Tambah ATK</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('Atk/addAtk') ?>" method="POST">
                    <div class="row clearfix">
                        <div class="col-sm-12">
                            <label for="">Nama PT</label>
                            <select name="nama_pt" class="form-control" required>
                                <option value="" selected disabled>- Select PT - </option>
                                <?php foreach ($pt as $p) : ?>
                                    <option value="<?= $p['id_pt'] ?>"><?= $p['alias'] ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <div class="row clearfix">
                        <div class="col-sm-12">
                            <label for="">Nama ATK</label>
                            <div class="form-group">
                                <input type="text" name="nama_bar" class="form-control" placeholder="Nama Barang" required />
                            </div>
                        </div>
                    </div>
                    <div class="row clearfix">
                        <div class="col-sm-6">
                            <label for="">Kode ATK</label>
                            <select name="kd_atk" class="form-control" required>
                                <option value="" selected disabled>- Select Kode ATK - </option>
                                <?php foreach ($kodeatk as $ka) : ?>
                                    <option value="<?= $ka['id_kodeatk'] ?>"><?= $ka['kode_atk'] ?> - <?= $ka['nm_barang'] ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="col-sm-6">
                            <label for="">Kode Barang (Opsional) </label>
                            <div class="form-group">
                                <input type="text" name="kode_barang" id="kode_barang" class="form-control" placeholder="Kode Barang" />
                                <div id="interactive" class="viewport"></div>
                                <div class="error"></div>
                                <!-- <video width="80%" id="preview"></video> -->
                            </div>
                        </div>
                    </div>
                    <div class="row clearfix mb-1">
                        <div class="col-sm-6">
                            <label for="">Kategori</label>
                            <select name="kat_bar" class="form-control" required>
                                <option value="" selected disabled>- Select Kategori - </option>
                                <?php foreach ($kategori_ as $kat) : ?>
                                    <option value="<?= $kat['id_kat'] ?>"><?= $kat['nm_kategori'] ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="col-sm-6">
                            <label for="">Satuan</label>
                            <select name="sat" class="form-control" required>
                                <option value="" selected disabled>- Select Satuan - </option>
                                <?php foreach ($sat as $s) : ?>
                                    <option value="<?= $s['id_sat'] ?>"><?= $s['satuan'] ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <div class="row clearfix">
                        <div class="col-sm-6">
                            <label for="">Harga</label>
                            <div class="form-group">
                                <input type="text" name="harga" class="form-control" placeholder="Harga" required />
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <label for="">Merek</label>
                            <div class="form-group">
                                <input type="text" name="merek" class="form-control" placeholder="Merek" required />
                            </div>
                        </div>
                    </div>
                    <div class="row clearfix">
                        <div class="col-sm-12">
                            <label for="">Jumlah Stok</label>
                            <div class="form-group">
                                <input type="number" name="jml_stok" class="form-control" placeholder="Jumlah Stok" required />
                            </div>
                        </div>
                    </div>
                    <div class="row clearfix">
                        <div class="col-sm-12">
                            <label for="">Keterangan</label>
                            <div class="form-group">
                                <textarea type="text" rows="1" name="keperluan" class="form-control"></textarea>
                            </div>
                        </div>
                    </div>

                    <div class="row modal-footer">
                        <!-- <label class="btn btn-default pull-left">
                            <i class="fa fa-camera"></i> Use camera app
                            <input type="file" accept="image/*;capture=camera" capture="camera" class="hidden" />
                        </label> -->
                        <button type="button" class="btn btn-danger btn-round waves-effect" onclick="batalCamera()" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary btn-round waves-effect">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- EDIT ITEM MODAL -->
<?php $no = 0; ?>
<?php foreach ($atk_filt as $a) : $no++; ?>
    <div class="modal fade" id="editModal<?= $a['id_barang'] ?>" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="title" id="defaultModalLabel">Edit ATK</h4>
                </div>
                <div class="modal-body">
                    <form action="<?= base_url('Atk/editAtk') ?>" method="POST">
                        <input type="hidden" name="id_barang" class="form-control" placeholder="Nama Barang" value="<?= $a['id_barang'] ?>" />

                        <div class="row clearfix mb-1">
                            <div class="col-sm-12">
                                <label for="">Nama PT</label>
                                <select name="nama_pt" class="form-control" required>
                                    <?php $idpt = $a['nama_pt'] ?>
                                    <?php $sql = "SELECT * FROM db_sso.tb_pt WHERE id_pt = $idpt " ?>
                                    <?php $tbpt = $this->db->query($sql)->row_array(); ?>
                                    <option value="<?= $idpt ?>" selected><?= $tbpt['alias'] ?></option>
                                    <?php foreach ($pt as $p) : ?>
                                        <option value="<?= $p['id_pt'] ?>"><?= $p['alias'] ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                        <div class="row clearfix mb-1">
                            <div class="col-sm-12">
                                <label for="">Nama ATK</label>
                                <div class="form-group">
                                    <input type="text" name="nm_barang" class="form-control" placeholder="Nama Barang" value="<?= $a['nm_barang'] ?>" required />
                                </div>
                            </div>
                        </div>
                        <div class="row clearfix">
                            <div class="col-sm-6">
                                <label for="">Kode ATK</label>
                                <select name="kd_atk" class="form-control" required>
                                    <option value="<?= $a['kode_atk'] ?>" selected><?= $a['kodeatk_set'] ?></option>
                                    <?php foreach ($kodeatk as $ka) : ?>
                                        <option value="<?= $ka['id_kodeatk'] ?>"><?= $ka['kode_atk'] ?> - <?= $ka['nm_barang'] ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="col-sm-6">
                                <label for="">Kode Barang</label>
                                <div class="form-group">
                                    <input type="text" name="kode_barang" class="form-control" placeholder="Kode Barang" value="<?= $a['kode_barang'] ?>" />
                                </div>
                            </div>
                        </div>
                        <div class="row clearfix mb-1">
                            <div class="col-sm-6">
                                <label for="">Kategori</label>
                                <select name="kat_barang" class="form-control" required>
                                    <option value="<?= $a['kat_barang'] ?>" selected><?= $a['nm_kategori'] ?></option>
                                    <?php foreach ($kategori_ as $kat) : ?>
                                        <option value="<?= $kat['id_kat'] ?>"><?= $kat['nm_kategori'] ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="col-sm-6">
                                <label for="">Satuan</label>
                                <select name="satuan" class="form-control" required>
                                    <option value="<?= $a['satuan'] ?>" selected><?= $a['satuan_set'] ?></option>
                                    <?php foreach ($sat as $s) : ?>
                                        <option value="<?= $s['id_sat'] ?>"><?= $s['satuan'] ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                        <div class="row clearfix">
                            <div class="col-sm-12">
                                <label for="">Jumlah Stok</label>
                                <div class="form-group">
                                    <input type="number" name="qty" class="form-control" placeholder="Jumlah Stok" value="<?= $a['qty'] ?>" required />
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
<?php endforeach;  ?>

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
            <div class="modal-body">Data yang dihapus tidak akan bisa dikembalikan.</div>
            <div class="modal-footer">
                <button class="btn" type="button" data-dismiss="modal">Batal</button>
                <a id="btn-delete" class="btn btn-danger" href="#">Hapus</a>
            </div>
        </div>
    </div>
</div>

<!--  tes barcode reader -->
<div class="modal" id="livestream_scanner">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title">Barcode Scanner</h4>
            </div>
            <div class="modal-body" style="position: static">
                <div id="interactive" class="viewport"></div>
                <div class="error"></div>
            </div>
            <div class="modal-footer">
                <label class="btn btn-default pull-left">
                    <i class="fa fa-camera"></i> Use camera app
                    <input type="file" accept="image/*;capture=camera" capture="camera" class="hidden" />
                </label>
                <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<!-- FILTER MODAL -->
<div class="modal fade" id="filterModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="title" id="defaultModalLabel">Filter ATK</h4>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('Atk/filterAtk') ?>" method="POST">
                    <div class="row clearfix">
                        <div class="col-sm-4">
                            <label for="">Nama ATK</label>
                            <select name="nm_barang" class="form-control" required>
                                <?php foreach ($atkf as $a) : ?>
                                    <option value="<?= $a['nm_barang'] ?>"><?= $a['nm_barang'] ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="col-sm-4">
                            <label for="">Kategori</label>
                            <select name="kat_barang" class="form-control" required>
                                <?php foreach ($kategori_ as $k) : ?>
                                    <option value="<?= $k['id_kat'] ?>"><?= $k['nm_kategori'] ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="col-sm-4">
                            <label for="">Satuan</label>
                            <select name="satuan" class="form-control" required>
                                <?php foreach ($sat as $s) : ?>
                                    <option value="<?= $s['id_sat'] ?>"><?= $s['satuan'] ?></option>
                                <?php endforeach; ?>
                            </select>
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

<script>
    // $('#filter').hide();
    // $('#btn-filter').click(function() {
    //     $('#filter').show();
    // });
    // $('#unbtn-filter').click(function() {
    //     $('#filter').show();
    // });

    // function add() {
    //     $('#addModal').modal('show');
    // }

    function deleteConfirm(url) {
        $('#btn-delete').attr('href', url);
        $('#deleteModal').modal();
    }

    $(document).ready(function() {
        $('#example').DataTable({
            // initComplete: function() {
            //     this.api().columns([1, 3, 4]).every(function(d) {
            //         var column = this;
            //         var theadname = $("#example th").eq([d]).text();
            //         var select = $('<select class="form-control form-control-sm"><option value="">All</option></option></select>')
            //             .appendTo($(column.header()).empty())
            //             .on('change', function() {
            //                 var val = $.fn.dataTable.util.escapeRegex(
            //                     $(this).val()
            //                 );

            //                 column
            //                     .search(val ? '^' + val + '$' : '', true, false)
            //                     .draw();
            //             });

            //         column.data().unique().sort().each(function(d, j) {
            //             select.append('<option value="' + d + '">' + d + '</option>')
            //         });
            //     });
            // },
            // "aoColumnDefs": [{
            //     "bSortable": false,
            //     "aTargets": [0, 1, 2, 3, 5, 7]
            // }, ]
        });
    });
    $(document).ready(function() {

        // Format mata uang.
        $('.uang').mask('000.000.000', {
            reverse: true
        });

    })
</script>



<script type="text/javascript" src="assets/js/dist/quagga.min.js"></script>
<style>
    #interactive.viewport {
        position: relative;
        width: 100%;
        height: auto;
        overflow: hidden;
        text-align: center;
    }

    #interactive.viewport>canvas,
    #interactive.viewport>video {
        max-width: 100%;
        width: 100%;
    }

    canvas.drawing,
    canvas.drawingBuffer {
        position: absolute;
        left: 0;
        top: 0;
    }
</style>

<!-- BARCODE READER JS -->
<script type="text/javascript">
    $(function() {
        // Create the QuaggaJS config object for the live stream
        var liveStreamConfig = {
            inputStream: {
                type: "LiveStream",
                constraints: {
                    width: {
                        min: 640
                    },
                    height: {
                        min: 480
                    },
                    aspectRatio: {
                        min: 1,
                        max: 100
                    },
                    facingMode: "environment" // or "user" for the front camera
                }
            },
            locator: {
                patchSize: "medium",
                halfSample: true
            },
            numOfWorkers: (navigator.hardwareConcurrency ? navigator.hardwareConcurrency : 4),
            decoder: {
                readers: [
                    "code_128_reader",
                    // "ean_reader",
                    // "ean_8_reader",
                    // "code_39_reader",
                    // "code_39_vin_reader",
                    // "codabar_reader",
                    // "upc_reader",
                    // "upc_e_reader",
                    // "i2of5_reader",
                    // "2of5_reader",
                    // "code_93_reader"
                ]
            },
            locate: true
        };
        // The fallback to the file API requires a different inputStream option. 
        // The rest is the same 
        var fileConfig = $.extend({},
            liveStreamConfig, {
                inputStream: {
                    size: 800
                }
            }
        );
        // Start the live stream scanner when the modal opens
        $('#addModal').on('shown.bs.modal', function(e) {
            Quagga.init(
                liveStreamConfig,
                function(err) {
                    if (err) {
                        $('#addModal .modal-body .error').html('<div class="alert alert-danger"><strong><i class="fa fa-exclamation-triangle"></i> ' + err.name + '</strong>: ' + err.message + '</div>');
                        Quagga.stop();
                        return;
                    }
                    Quagga.start();
                }
            );
        });

        // Make sure, QuaggaJS draws frames an lines around possible 
        // barcodes on the live stream
        Quagga.onProcessed(function(result) {
            var drawingCtx = Quagga.canvas.ctx.overlay,
                drawingCanvas = Quagga.canvas.dom.overlay;

            if (result) {
                if (result.boxes) {
                    drawingCtx.clearRect(0, 0, parseInt(drawingCanvas.getAttribute("width")), parseInt(drawingCanvas.getAttribute("height")));
                    result.boxes.filter(function(box) {
                        return box !== result.box;
                    }).forEach(function(box) {
                        Quagga.ImageDebug.drawPath(box, {
                            x: 0,
                            y: 1
                        }, drawingCtx, {
                            color: "green",
                            lineWidth: 2
                        });
                    });
                }

                if (result.box) {
                    Quagga.ImageDebug.drawPath(result.box, {
                        x: 0,
                        y: 1
                    }, drawingCtx, {
                        color: "#00F",
                        lineWidth: 2
                    });
                }

                if (result.codeResult && result.codeResult.code) {
                    Quagga.ImageDebug.drawPath(result.line, {
                        x: 'x',
                        y: 'y'
                    }, drawingCtx, {
                        color: 'red',
                        lineWidth: 3
                    });
                }
            }
        });

        // Once a barcode had been read successfully, stop quagga and 
        // close the modal after a second to let the user notice where 
        // the barcode had actually been found.
        Quagga.onDetected(function(result) {
            if (result.codeResult.code) {
                $('#kode_barang').val(result.codeResult.code);
                $('#interactive').hide();
                Quagga.stop();
                // setTimeout(function() {
                //     $('#addModal').modal('hide');
                // }, 1000);
            }
        });

        // Stop quagga in any case, when the modal is closed
        $('#addModal').on('hide.bs.modal', function() {
            if (Quagga) {
                Quagga.stop();
            }
        });

        // Call Quagga.decodeSingle() for every file selected in the 
        // file input
        $("#addModal input:file").on("change", function(e) {
            if (e.target.files && e.target.files.length) {
                Quagga.decodeSingle($.extend({}, fileConfig, {
                    src: URL.createObjectURL(e.target.files[0])
                }), function(result) {
                    alert(result.codeResult.code);
                });
            }
        });
    });
</script>