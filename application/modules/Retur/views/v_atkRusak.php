<div class="container-fluid">

    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <a href="<?= base_url() ?>Retur/pdf" class="btn btn-rounded btn-md btn-primary mr-1"><i class="fas fa-print mr-1"></i>Cetak</a>
                    <button type="button" id="btn-pilihretur" class="btn btn-md btn-rounded btn-success" data-toggle="modal" data-target="#pilihRetur"><i class="fas fa-exchange-alt mr-1"></i>Retur</button>
                </div>
                <h4 class="page-title">Daftar Retur ATK</h4>
                <?= $this->session->flashdata('message') ?>
            </div>
        </div>
    </div>
    <!-- end page title -->


    <div class="row">
        <div class="col-lg-12">
            <div class="card-box pb-2">
                <div class="float-right d-none d-md-inline-block">
                    <div class="btn-group mb-2">
                    </div>
                </div>

                <h4 class="header-title mb-3">ATK Bermasalah</h4>
                <div class="table-responsive">
                    <table class="table table-borderless table-hover table-nowrap table-sm m-0" id="table-serverside">

                        <thead class="thead-light">
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Nama ATK</th>
                                <th>QTY</th>
                                <th>Alasan</th>
                                <th>Tgl Retur</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        </div> <!-- end col -->
    </div> <!-- end card-box -->
</div> <!-- end col-->


<!-- ADD RETUR MODAL -->
<div class="modal fade" id="pilihRetur" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="title" id="defaultModalLabel">Pilih Retur</h4>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('Retur/pilihRetur') ?>" method="POST">
                    <div class="row clearfix">
                        <div class="col-sm-8">
                            <label for="">No ATK</label>
                            <select name="no_ambilatk" class="form-control" id="select2" required>
                                <?php foreach ($pilih_no as $pn) : ?>
                                    <option value="<?= $pn['no_ambilatk'] ?>"><?= $pn['no_ambilatk'] ?></option>
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

<!-- EDIT ATK RETUR/RUSAK MODAL -->
<div class="modal fade" id="editReturModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="title" id="defaultModalLabel">Edit Retur</h4>
                <div class="text-right">
                    <!-- <h4 class="title" id="no_ambilatk">Keterangan Retur</h4> -->
                </div>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('Retur/editRetur') ?>" method="POST">
                    <div class="row clearfix mb-1">
                        <input type="hidden" id="id" name="id" class="form-control " placeholder="Nama Kategori">
                        <div class="col-sm-6">
                            <label for="">Nama ATK</label>
                            <div class="form-group">
                                <input type="text" id="nm_barang" name="nm_barang" class="form-control " placeholder="Nama Kategori">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <label for="">QTY</label>
                            <div class="form-group">
                                <input type="number" id="qty_rusak" name="qty_rusak" class="form-control " placeholder="Nama Kategori">
                            </div>
                        </div>
                    </div>
                    <div class="row clearfix mb-1">
                        <div class="col-sm-12">
                            <label for="">Alasan</label>
                            <div class="form-group">
                                <textarea type="text" id="alasan" name="alasan" class="form-control" placeholder="Masukkan Keterangan Retur" required></textarea>
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
                <form action="<?= base_url('Retur/deleteRetur') ?>" method="POST">
                    <input type="hidden" name="id" id="id_re">
            </div>
            <div class="modal-footer">
                <button class="btn" type="button" data-dismiss="modal">Batal</button>
                <button type="submit" id="btn-delete" class="btn btn-danger" href="#">Hapus</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    // $(document).ready(function() {
    //     $('#myTable').DataTable();
    // });
</script>

<script type="text/javascript">
    var table;
    $(document).ready(function() {

        //datatables
        table = $('#table-serverside').DataTable({

            "processing": true,
            "serverSide": true,
            "order": [],

            "ajax": {
                "url": "<?php echo site_url('Retur/get_data_retur') ?>",
                "type": "POST"
            },


            "columnDefs": [{
                "targets": [0],
                "orderable": false,
            }, ],

        });

    });
    $(document).ready(function() {
        $('#select2').select2();
    });

    $(document).ready(function() {
        $(document).on('click', '#editretur', function() {

            var id = $(this).data('id');
            var nm_barang = $(this).data('nm_barang');
            var alasan = $(this).data('alasan');
            var qty_rusak = $(this).data('qty_rusak');

            // alert(kd_inputatk);
            $('#id').val(id);
            $('#nm_barang').val(nm_barang);
            // $('#no_ambilatk').text(no_ambilatk);
            $('#qty_rusak').val(qty_rusak);
            $('textarea#alasan').val(alasan);

        });
    });
    $(document).ready(function() {
        $(document).on('click', '#delete-item', function() {

            var id = $(this).data('id_re');

            // alert(kd_inputatk);
            $('#id_re').val(id);
            $('#btn-delete').attr('href', '<?= base_url() ?>Retur/deleteRetur/' + id);

        });
    });
</script>