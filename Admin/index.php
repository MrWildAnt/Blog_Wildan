<?php
require_once "connect.php";
require_once "header.php";
?>

<!-- Main HTML -->
<div class="container">
    <div class="row mt-5 justify-content-center">
        <div class="col-lg-8">
            <a href="form_add.php" class="btn btn-success text-end mb-3 "> Add </a>
            <a href="delete_all.php" class="btn btn-danger text-end mb-3 "> Clear </a>
            <br>
            <table border="1" class="table table-dark table-hover">
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Judul</th>
                    <th scope="col">Kategori</th>
                    <th scope="col">Deskripsi</th>
                    <th scope="col">Status</th>
                    <th scope="col" >Created_time</th>
                    <th scope="col" >img</th>
                    <th scope="col" colspan="2">Action</th>
                </tr>
                <?php
                $querySelect = "SELECT * FROM artikel ";
                $result = $connect->query($querySelect);
                if ($result->num_rows > 0) :
                    while ($row = $result->fetch_assoc()) :
                ?>
                        <tr>
                            <td><?= $row['id'] ?></td>
                            <td><?= $row['judul'] ?></td>
                            <td><?= $row['kategori'] ?></td>
                            <td><?= $row['deskripsi'] ?></td>
                            <td><?= $row['status'] ?></td>
                            <td><?= $row['created_time'] ?></td>
                            <td><img src="<?= $row['filename'] ?>" style="width: 150px; height: 150px;"/></td>
                            <td>
                                <a href="form_edit.php?id=<?= $row['id'] ?>" class="btn btn-primary">edit</a>
                            </td>
                            <td>
                                <a href="delete.php?id=<?= $row['id'] ?>" class="btn btn-danger">delete</a>
                            </td>
                        </tr>
                <?php
                    endwhile;
                endif;
                ?>
            </table>
        </div>
    </div>
</div>

<?php
require_once "footer.php";
?>