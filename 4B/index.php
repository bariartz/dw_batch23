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
            <button type="button" class="btn btn-primary" id="addBook">Add Book</button>
            <button type="button" class="btn btn-primary" id="addWriter">Add Writer</button>
            <button type="button" class="btn btn-primary" id="addCategory">Add Category</button>
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

</html>