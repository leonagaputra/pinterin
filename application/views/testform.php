<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <form method="post" action="<?php echo $base_url;?>index.php/main/send_data" enctype="multipart/form-data">
            <input type="hidden" name="user_id" value="1">
            <table>
                <tr>
                    <td>Nama</td>
                    <td><input type="text" name="nama"></td>
                </tr>
                <tr>
                    <td>Usia</td>
                    <td><input type="text" name="usia"></td>
                </tr>                
                <tr>
                    <td>Jenis Kelamin</td>
                    <td><input type="text" name="kelamin"></td>
                </tr>
                <tr>
                    <td>Orang Tua</td>
                    <td><input type="text" name="ortu"></td>
                </tr>
                <tr>
                    <td>Masih Sekolah</td>
                    <td><input type="text" name="masihsekolah"></td>
                </tr>
                <tr>
                    <td>Pendidikan</td>
                    <td><input type="text" name="pendidikan"></td>
                </tr>
                <tr>
                    <td>Kelas</td>
                    <td><input type="text" name="kelas"></td>
                </tr>
                <tr>
                    <td>Lanjut Sekolah</td>
                    <td><input type="text" name="lanjutsekolah"></td>
                </tr>
                <tr>
                    <td>Pekerjaan</td>
                    <td><input type="text" name="pekerjaan"></td>
                </tr>
                <tr>
                    <td>Longitude</td>
                    <td><input type="text" name="longitude"></td>
                </tr>
                <tr>
                    <td>Latitude</td>
                    <td><input type="text" name="latitude"></td>
                </tr>
                
                <tr>
                    <td>foto</td>
                    <td><input type="file" name="foto" id="foto"></td>
                </tr>
                <tr>                    
                    <td><input type="submit" value="Submit"></td>
                </tr>
            </table>
        </form>
        
        <br><br>
        <form method="post" action="<?php echo $base_url;?>index.php/main/login" >
            <table>
                <tr>
                    <td>User</td>
                    <td><input type="text" name="user"></td>
                </tr>
                <tr>
                    <td>Password</td>
                    <td><input type="paswword" name="password"></td>
                </tr>                                
                <tr>                    
                    <td><input type="submit" value="Submit"></td>
                </tr>
            </table>
        </form>
    </body>
</html>
