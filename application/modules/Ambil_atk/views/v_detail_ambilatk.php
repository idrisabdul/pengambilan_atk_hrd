<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <div class="page-title-right">
                <!-- <button class="btn btn-success btn-rounded mr-2" onclick="add()"><i class="fas fa-print mr-1"></i>Cetak Bukti</button> -->
                <button onclick="deleteConfirm('<?= base_url('Ambil_atk/delete/' . $no_ambilatk) ?>')" href="#!" class="btn btn-rounded btn-danger"><i class="fas fa-trash mr-1"></i>Hapus Semua</button>
            </div>
            <h4 class="page-title">Pengambilan Detail ATK</h4>
            <?= $this->session->flashdata('message') ?>
        </div>
    </div>
</div>
<!-- end page title -->

<div class="row">
    <div class="col-12">
        <div class="card-box">
            <div class="text-right">
                <a href="<?= base_url('Ambil_atk') ?>" class="btn btn-outline-info btn-rounded waves-effect waves-light"><i class="fas fa-angle-left mr-2"></i>Kembali</a>
            </div>
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
                                    <th>Satuan</th>
                                    <th>Keperluan</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1; ?>
                                <?php foreach ($detail_ambilatk as $da) { ?>
                                    <tr>
                                        <td><?= $no++ ?></td>
                                        <td><?= $da['nm_barang'] ?></td>
                                        <td><?= $da['kat_barang'] ?></td>
                                        <td><?= $da['qty'] ?></td>
                                        <td><?= $da['sat'] ?></td>
                                        <td><?= $da['keperluan'] ?></td>
                                        <td>
                                            <button class="btn btn-xs btn-warning" id="editambil" data-no_ambilatk="<?= $da['no_ambilatk'] ?>" data-id="<?php echo $da['id_detail_ambilatk'] ?>" data-nm_barang="<?php echo $da['nm_barang'] ?>" data-qty="<?php echo $da['qty'] ?>" data-keperluan="<?php echo $da['keperluan'] ?>" href="javascript:;" data-toggle="modal" data-target="#editModal"><i class="fa fa-edit mr-1"></i>Edit</button>
                                            <button id="delete-item" data-no_urut="<?= $da['no_ambilatk'] ?>" data-id="<?= $da['id_detail_ambilatk'] ?>" class="btn btn-xs btn-danger" data-toggle="modal" data-target="#deleteModal"><i class="mdi mdi-delete mr-1"></i>Hapus Item</button>
                                        </td>
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
<!-- end row-->

<!-- EDIT MODAL -->
<div class="modal fade" id="editModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="title" id="defaultModalLabel">Edit Ambil ATK</h4>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('Ambil_atk/editAmbilAtk') ?>" method="POST">
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
                <form action="<?= base_url('Ambil_atk/deleteItem') ?>" method="POST">
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
            $('#btn-delete').attr('href', '<?= base_url() ?>Ambil_atk/deleteItem/' + id);
        });
    });

    $(document).ready(function() {
        $(document).on('click', '#editambil', function() {

            var id = $(this).data('id');
            var nm_barang = $(this).data('nm_barang');
            var qty = $(this).data('qty');
            var keperluan = $(this).data('keperluan');
            var no_ambilatk = $(this).data('no_ambilatk');

            $('#id_detail').val(id);
            $('#nm_barang').val(nm_barang);
            $('#qty').val(qty);
            $('#no_ambilatk').val(no_ambilatk);
            $('textarea#keperluan').val(keperluan);
        });
    });
</script>