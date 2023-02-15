<?php
require_once 'connect.php';
require_once 'header.php';

$id = $_GET['id'];
$querySelectById = "SELECT * FROM artikel WHERE id='$id'";
$result = $connect->query($querySelectById);
$row = $result->fetch_assoc();

$id = $row['id'];
$judul = $row['judul'];
$kategori = $row['kategori'];
$deskripsi = $row['deskripsi'];
$status = $row['status'];


?>


<div class="container">
    <div class="row mt-5 d-flex justify-content-center">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title d-flex justify-content-center">
                        From Edit Article
                    </h5>
                    <form class="row g-3 mt-2" action="" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="id" value="<?=$id?>">
                        <div class="col-md-6">
                            <label for="inputEmail4" class="form-label">Judul</label>
                            <input type="text" value="<?=$judul?>" name="judul" class="form-control" id="inputEmail4" required="true">
                        </div>
                        <div class="col-md-6">
                            <label for="inputPassword4" class="form-label">Kategori</label>
                            <input type="text" value="<?=$kategori?>" name="kategori" class="form-control" id="inputPassword4" required="true">
                        </div>
                        <div class="col-md-12">
                            <label for="inputPassword4" class="form-label">Image</label>
                            <input type="file" name="filename" class="form-control" id="inputPassword4" required="true">
                        </div>
                        <div class="col-12">
                            <label for="inputAddress" class="form-label">Deskripsi</label>
                            <textarea class="form-control" name="deskripsi" id="editor" placeholder="Deskripsi..." required="true"><?=$deskripsi?></textarea>
                        </div>
                        <div class="col-12">
                            <label for="inputAddress2" class="form-label">Status</label>
                            <select name="status" class="form-select" required="true">
                                <option value="">Choose</option>
                                <option value="published"
                                <?php if ($status == "published")
                                    echo "selected"; ?>
                                >Published</option>
                                <option value="Unpublished" <?php if ($status == "Unpublished")
                                    echo "selected"; ?>
                                    >Unpublished</option>
                            </select>
                        </div>
                        <div class="col-12 d-flex justify-content-between">
                            <a href="index.php" class="btn btn-danger">Back</a>
                            <button type="submit" name="submit" class="btn btn-primary">Update</button>
                        </div>
                    </form>
                </div>
            </div> 
        </div>
    </div>
</div>

<?php 
    if (isset($_POST['submit'])) {
    $judul = $_POST['judul'];
    $kategori = $_POST['kategori'];
    $deskripsi = $_POST['deskripsi'];
    $status = $_POST['status'];

    
    $image_name = $_FILES['filename']['name'];
    $image_tmp = $_FILES['filename']['tmp_name'];

    $queryInsert = "UPDATE artikel SET judul='$judul',kategori='$kategori',deskripsi='$deskripsi',status='$status',filename='$image_name'  WHERE id='$id'";

    move_uploaded_file($image_tmp, '' . $image_name);
    
    if ($connect->query($queryInsert)) {
        echo "<script> alert('sukses'); window.location.href='index.php'</script>";
    }
    }
    

?>


<?php
require_once 'footer.php';
?>