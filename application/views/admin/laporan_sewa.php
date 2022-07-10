<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Print Lpaoran</title>

    <style type="text/css">
        * {
            font-family: Verdana, Arial, sans-serif;
        }

        table {
            font-size: small;
        }

        tfoot tr td {
            font-weight: bold;
            font-size: small;
        }

        .gray {
            background-color: lightgray
        }
    </style>

</head>

<body>

    <table width="100%">
        <tr>
            <td valign="top">
                <img src="<?= base_url() ?>/assets/images/sma.png" alt="" width="150" />
            </td>
            <td align="center">
                <h2>KEMENTRIAN PENDIDIKAN DAN KEBUDAYAAN</h2>
                <h2>SMA NEGERI 1 BARAT</h2>
                <p>JL. PASAR LEGI BARAT, BLARAN, Kec. Barat, Kab. Magetan Prov. Jawa Timur</p>
                <p>Telepon (0351869380) Kode Pos: 63393 Email:sma1barat@yahoo.co.id</p>
            </td>
        </tr>
    </table>
    <hr class="line-title">
    <p align="center">
        LAPORAN PEMINJAMAN RUANGAN DAN BARANG <br>
        <b>SMA Negeri 1 Barat</b>
    </p>
    <table width="50%">
        <tr>
            <td><strong>From:</strong><?= $tgl['tgl_mulai'] ?></td>
            <td><strong>To:</strong><?= $tgl['tgl_selesai'] ?></td>
        </tr>

    </table>

    <br />

    <table width="100%">
        <thead style="background-color: lightgray;">
            <tr>
                <th>No.</th>
                <th>Nama</th>
                <th>Item</th>
                <th>Harga</th>
                <th>Jumlah</th>
                <th>Tanggal Mulai</th>
                <th>Tanggal Selesai</th>
                <th>Tanggal Booking</th>
                <th>Sub Total</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $no = 1;
            foreach ($laporan as $lap) { ?>

                <tr>
                    <th scope="row"><?= $no ?></th>
                    <td><?= $lap['nama_penyewa'] ?></td>
                    <td align="right"><?= $lap['nama'] ?></td>
                    <td align="right"><?= $lap['harga'] ?></td>
                    <td align="right"><?= $lap['jumlah'] ?></td>
                    <td align="right"><?= date('d-m-Y H:i:s', strtotime($lap['tgl_mulai'])) ?></td>
                    <td align="right"><?= date('d-m-Y H:i:s', strtotime($lap['tgl_selesai'])) ?></td>
                    <td align="right"><?= $lap['tgl_booking'] ?></td>
                    <td align="right"><?= $lap['sub_total'] ?></td>
                </tr>
            <?php
                $no++;
            } ?>

        </tbody>

        <tfoot>
            <tr>
                <td colspan="7"></td>
                <td align="right">TOTAL</td>
                <td align="right" class="gray"><?= $total ?></td>
            </tr>
        </tfoot>
    </table>

</body>

</html>