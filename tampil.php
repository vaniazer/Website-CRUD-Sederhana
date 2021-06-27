<?php 
include 'database.php';
$db = new database();
?>

<CENTER>
    <h1>Program Create Read Update Delete</h1>  
    <form action="proses.php?aksi=search" method="POST" align="center" style="margin-bottom: 25px;">
        <label>Search :</label>
        <input type="text" name="search">
        <input type="submit" value="Search">
    </form>

<a href="input.php">Input Data</a>
<table border="1">
    <tr>
        <th>No.</th>
        <th>Judul Musik</th>
        <th>Nama Album</th>
        <th>Nama Artis</th>
        <th>Cover</th>
    </tr>
    <?php
    $no = 1;

    if (isset($_GET['search'])) {
        $search = $_GET['search'];
        $query = $db->cari($search);
        while($row = mysqli_fetch_object($query)){ 
        ?>
            <tr>
                <td> <?= $no++; ?> </td>
                <td> <?= $row->judul_musik; ?> </td>
                <td> <?= $row->album; ?> </td>
                <td> <?= $row->artis; ?> </td>
                <td> <?= $row->cover; ?> </td>
                <td> <a href="edit.php?id=<?=$row->id?>"><button class="btn">Edit</button></a> <a href="proses.php?id=<?=$row->id?>&aksi=hapus"><button class="btn">Delete</button></a> </td>
            </tr>
        <?php
                $no++;
            }
        } 
        else {
            if($db->tampil_data() == null){
                die();
            }
            foreach($db->tampil_data() as $x):
            ?>
            <tr>
                <td><?php echo $no++; ?></td>
                <td><?php echo $x['judul_musik']; ?></td>
                <td><?php echo $x['album']; ?></td>
                <td><?php echo $x['artis']; ?></td>
                <td><?php echo $x['cover']; ?></td>
                <td>
                    <a href="edit.php?id=<?php echo $x['id']; ?>&aksi=edit">Edit</a>
                    <a href="proses.php?id=<?php echo $x['id']; ?>&aksi=hapus">Hapus</a>            
                </td>
            </tr>
            <?php
            $no++;
            endforeach;
        }
            ?>
</table>
</CENTER>
