<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Kartu Perpustakaan <?php echo $var->nama; ?></title>
    </head>
    <body>
        <div>
            <table style="">
                <tr>
                    <th width=""><img src="./assets/logo.png" alt="" style="width: 100px; margin-left: 25px;"></th>
                    <th>
                        <div style="margin-left: 50%; margin-right: 50%;">
                            <div style="width: 100%;" align="center">
                                <h2 style="font-size: 25px; width: 100%;"><?php echo $sekolah->nama_perpustakaan; ?></h2>
                                <p style="font-size: 12px; margin-top: -8px;" ><?php echo $sekolah->alamat_perpustakaan; ?></p>
                            </div>
                        </div>
                    </th>
                </tr>
            </table>
        </div>
        <hr style="margin-top: 10px;">
        <div style="text-transform: uppercase; padding: 10px 10px 50px 50px; font-size: 16px;">
            <h3 align="center">KARTU ANGGOTA PERPUSTAKAAN</h3>
            <p style="">
                <table>
                    <tr>
                        <td>
                            <strong>Nama</strong>
                        </td>
                        <td>
                            <div style="margin-left: 100px;">
                                :
                            </div>
                        </td>
                        <td>
                            <div style="margin-left: 20px;">
                                <?php echo $var->nama; ?>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <strong>Kelas</strong>
                        </td>
                        <td>
                            <div style="margin-left: 100px;">
                                :
                            </div>
                        </td>
                        <td>
                            <div style="margin-left: 20px;">
                                <?php echo $var->kelas; ?>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <strong>nisn</strong>
                        </td>
                        <td>
                            <div style="margin-left: 100px;">
                                :
                            </div>
                        </td>
                        <td>
                            <div style="margin-left: 20px;">
                                <?php echo $var->nisn; ?>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <strong>nomor seri perpus</strong>
                        </td>
                        <td>
                            <div style="margin-left: 100px;">
                                :
                            </div>
                        </td>
                        <td>
                            <div style="margin-left: 20px;">
                                <?php echo $var->nomor_seriperpus; ?>
                            </div>
                        </td>

                    </tr>
                    <tr>
                        <td>
                            <strong>email</strong>
                        </td>
                        <td>
                            <div style="margin-left: 100px;">
                                :
                            </div>
                        </td>
                        <td>
                            <div style="margin-left: 20px;">
                                <?php echo $var->email; ?>
                            </div>
                         </td>
                    </tr>
                </table>
            </p>
        </div>
        <table>
            <tr>
                <td>
                    <div style="margin-left: 50px; text-align: center;">
                        Tanda Tangan Pemilik
                        <br><br><br><br><br><br><br>
                        <hr>
                        <?php echo $var->nama ?>
                    </div>
                </td>
                <td>
                    <div style="margin-left: 350px; text-align: center;">
                        Tanda Kepala Sekolah
                        <br><br><br><br><br><br><br>
                        <hr>
                        <?php echo $sekolah->nama_kepsek; ?>
                    </div>
                </td>
            </tr>
        </table>
    </body>
</html>
