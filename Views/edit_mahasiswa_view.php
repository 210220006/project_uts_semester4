<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
	   <!-- Required meta tags -->
 
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <title>Edit Mahasiswa</title>
</head>
<body>
    <form action="/mahasiswa/edit" method="post">
        <input type="text" name="nama" value="<?= $mahasiswa->nama;?>">
		 <input type="text" name="nim" value="<?= $mahasiswa->nim;?>">
        <input type="text" name="semester" value="<?= $mahasiswa->semester?>">
        <input type="hidden" name="id_mahasiswa" value="<?= $mahasiswa->id_mahasiswa;?>">
        <button type="submit">Update</button>
    </form>
</body>
   <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</html>