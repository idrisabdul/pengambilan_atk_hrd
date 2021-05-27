<style>
    table {
        border-collapse: collapse;
        border: 1px solid #f2f5f7;
    }

    table,
    th,
    td {
        border: 1px solid grey;
        padding: 2px 5px;
        text-align: center;
    }

    th,

    th {
        background-color: #867ae9;
        color: white;
        padding: 8px;
    }
</style>

<h4>Laporan Pemasukan Barang ATK</h4>
<br>
<br>
<table>
    <tr>
        <th>
            No
        </th>
        <th>
            Nama ATK
        </th>
        <th>
            Qty
        </th>
        <th>
            Satuan
        </th>
        <th>
            Harga
        </th>
        <th>
            Kategori
        </th>
        <th>
            Tgl Masuk ATK
        </th>
    </tr>

    <?php $no = 1; ?>
    <?php foreach ($atk as $a) : ?>
        <tr>
            <td>
                <?php echo $no; ?>
            </td>
            <td>
                <?php echo $a['nm_barang']; ?>
            </td>
            <td>
                <?php echo $a['qty']; ?>
            </td>
            <td>
                <?php echo $a['satuan']; ?>
            </td>
            <td>
                <?php echo 'Rp. ' . number_format($a['harga']); ?>
            </td>
            <td>
                <?php echo $a['kat_barang']; ?>
            </td>
            <td>
                <?php echo $a['tgl_masuk_barang']; ?>
            </td>
        </tr>
        <?php $no++; ?>
    <?php endforeach; ?>
</table>