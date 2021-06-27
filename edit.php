<?php 
include 'database.php';                             //menyertakan database pada proses ini
$db = new database();                               //inisialisasi class database kedalam $db
?>

<CENTER>
   <h1>Program Create Read Update Delete</h1>              
</CENTER>

<CENTER>
    <form action="proses.php?aksi=update" method="post">            
<?php
foreach($db->edit($_GET['id']) as $d){              //dilakukan perulangan nilai array untuk dilakukan edit berdasarkan id
?>
<table>
    <tr>
        <td>Judul Musik</td>
        <td>
            <input type="hidden" name="id" value="<?php echo $d['id'] ?>">          
            <input type="text" name="judul_musik" value="<?php echo $d['judul_musik']?>"> 
    </tr>
     <tr>
        <td>Nama Album</td>
        <td><input type="text" name="album" value="<?php echo $d['album'] ?>"></td>
    </tr>
     <tr>
        <td>Nama Artis</td>
        <td><input type="text" name="artis" value="<?php echo $d['artis'] ?>"></td>
    </tr>
     <tr>
        <td>Cover</td>
        <td><input type="text" name="cover" value="<?php echo $d['cover'] ?>"></td>
    </tr>
    <tr>
        <td></td>
        <td><input type="submit" value="Simpan"></td>
    </tr>
</table>
<?php } ?>
</form>

</CENTER>
