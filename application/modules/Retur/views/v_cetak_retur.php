<style>
    table {
        border-collapse: collapse;
        border: 1px solid #f2f5f7;
    }

    table,
    th,
    td {
        border: 1px solid grey;
        font-size: x-small;
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

<h4>Laporan Retur ATK</h4>
<br>
<br>
<table>
    <tr>
        <th>
            No
        </th>
        <th>
            Nama
        </th>
        <th>
            Nama ATK
        </th>
        <th>
            Kategori
        </th>
        <th>
            QTY
        </th>
        <th>
            Alasan
        </th>
        <th>
            Tgl Retur
        </th>
    </tr>

    <?php $no = 1; ?>
    <?php foreach ($retur as $r) : ?>
        <tr>
            <td>
                <?php echo $no; ?>
            </td>
            <td>
                <?php echo $r['user_nama']; ?>
            </td>
            <td>
                <?php echo $r['nm_barang']; ?>
            </td>
            <td>
                <?php echo $r['kat_barang']; ?>
            </td>
            <td>
                <?php echo $r['qty_rusak']; ?>
            </td>
            <td>
                <?php echo $r['alasan']; ?>
            </td>
            <td>
                <?php echo $r['tgl_retur']; ?>
            </td>
        </tr>
        <?php $no++; ?>
    <?php endforeach; ?>
</table>