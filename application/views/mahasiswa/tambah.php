<div class="container">

    <div class="col-md-6">
    
    <div class="card mt-3">
        <div class="card-header">
            Tambah Data Mahasiswa
        </div>
        <div class="card-body">
        <?php if( validation_errors() ): ?>
            <div class="alert alert-danger" role="alert">
                <?= validation_errors(); ?>
            </div>
        <?php endif; ?> 
            <form action="" method="post">
                <div class="form-group">
                    <label for="namaMahasiswa">Nama Mahasiswa</label>
                    <input type="text" name="mahasiswa" class="form-control" id="namaMahasiswa" >
                </div>
                <div class="form-group">
                    <label for="nim">Nomor Induk Mahasiswa</label>
                    <input type="text" name="nim" class="form-control" id="nim" >
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="text" name="email" class="form-control" id="email" >
                </div>
                <div class="form-group">
                    <label for="jurusan">Jurusan</label>
                    <select class="form-control" name="jurusan" id="jurusan">
                    <option>Teknik Informatika</option>
                    <option>Kedokteran</option>
                    <option>Teknik Elekto</option>
                    <option>Teknik Sipil</option>
                    <option>Arsitektur</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary float-right">Submit</button>
            </form>
        </div>
    </div>

    </div>

</div>