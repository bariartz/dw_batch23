<?php
$conn = new mysqli("localhost", "root", "", "db_batch23");
if ($conn->connect_errno) {
    echo die("Gagal konek dengan MySQL: " . $conn->connect_error);
}
?>
<html>

<head>
    <title>DUMB LIBRARY</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
</head>

<div class="container">
    <div class="row justify-content-md-center">
        <div class="col">
            <h4>DUMB LIBRARY</h4>
        </div>
        <div class="col">
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addBook">Add Book</button>
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addWriter">Add Writer</button>
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addCategory">Add Category</button>
        </div>
    </div>

    <div class="row">
        <?php
        $getData = mysqli_query($conn, "SELECT * FROM `book_tb`");
        if (mysqli_num_rows($getData) > 0) {
            while ($book = mysqli_fetch_array($getData)) {
        ?>
                <div class="card" style="width: 18rem;">
                    <img src="<?php echo $book['img']; ?>" class="card-img-top">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $book['name']; ?></h5>
                        <button type="button" class="btn btn-primary" id="viewDetail">View Detail</button>
                    </div>
                </div>
        <?php }
        } ?>
    </div>
</div>

<div class="modal fade" id="addBook" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Buku</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="mb-3">
                        <label for="input1" class="form-label">Judul Buku</label>
                        <input type="text" class="form-control" id="input1" name="judulbuku">
                    </div>
                    <div class="mb-3">
                        <label for="input1" class="form-label">Penulis</label>
                        <input type="text" class="form-control" id="input1" name="penulis">
                    </div>
                    <div class="mb-3">
                        <label for="input1" class="form-label">Tahun Terbitan</label>
                        <input type="text" class="form-control" id="input1" name="publikyear">
                    </div>
                    <div class="mb-3">
                        <label for="input1" class="form-label">Judul Buku</label>
                        <input type="text" class="form-control" id="input1" name="input1">
                    </div>
                    <div class="mb-3">
                        <label for="input1" class="form-label">Kategori Buku</label>
                        <input type="text" class="form-control" id="input1" name="kategori">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Tambah</button>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="addCategory" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Kategori</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="mb-3">
                        <label for="input1" class="form-label">Kategori</label>
                        <input type="text" class="form-control" id="input1" name="kategori">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Tambah</button>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="addWriter" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Penulis</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="mb-3">
                        <label for="input1" class="form-label">Nama Penulis</label>
                        <input type="text" class="form-control" id="input1" name="judulbuku">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Tambah</button>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="detailBook" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Detail Buku</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <h5>Penulis :<div id="nama-penulis"></div>
                </h5>
                <h5>Tahun publis : <div id="tahun-publis"></div>
                </h5>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>

</html>