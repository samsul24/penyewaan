<!DOCTYPE html>
<html>

<head>
    <style type="text/css">
        .kop-surat {
            line-height: 50%;
        }

        table {
            margin: auto;
        }
    </style>
</head>

<body>
    <table>
        <tr>
            <td>
                <!-- <img src="<?php echo base_url('assets/images/logo.png') ?>" style="margin-left:-50px;" alt="logo" width=30%> -->
            </td>
            <td>
                <div class="kop-surat">
                    <center>
                        <h1><b>Gor Tombro</b></h1>
                        <p>
                            <a>Jl. Ikan Tombro, Mojolangu,<br><br> Kec. Lowokwaru, Kota Malang, Jawa Timur 65142</a>
                        <p>
                            <a>Telp : 0857-9077-6163</a>
                        <p>
                            <a>Email : -</a>
                        <p>
                    </center>
                </div>
            </td>
        </tr>
    </table>
    <hr>



    <b>
        <p style="text-align:center;margin:0;padding:0">Data Sewa </p>
    </b>
    <center>
        <b>
            <?php echo $title ?> <br>
            <?php echo $subtitle ?> <br>
        </b>
    </center>
    <br>
    <table width="100%" cellspacing="0" border="1">
        <thead>
            <tr>
                <th class="text-primary">No</th>
                <th class="text-primary">Nama Lapangan</th>
                <th class="text-primary">Nama Pemesan</th>
                <th class="text-primary">Tanggal</th>
                <th class="text-primary">Waktu</th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 1;
            foreach ($sewa as $row) : ?>
                <tr>
                    <td style=" text-align: center;"><?= $no++ ?></td>
                    <td style=" text-align: center;"><?= $row->nama_lapangan ?></td>
                    <td style=" text-align: center;"><?= $row->nama ?></td>
                    <td style=" text-align: center;"> <?= date('d-m-Y H:i:s', strtotime($row->tanggal)); ?></td>
                    <td style=" text-align: center;"> <?= "(" . $row->jam_mulai . ") - (" . $row->jam_selesai . ")" ?></td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>

</body>

</html>