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
                    <input type="hidden" name="id" value="<?=$mahasiswa['id'];?>" method="post">
                    <div class="form-group">
                        <label for="namaMahasiswa">Nama Mahasiswa</label>
                        <input type="text" name="mahasiswa" class="form-control" id="namaMahasiswa" value="<?=$mahasiswa['nama'];?>">
                    </div>
                    <div class="form-group">
                        <label for="nim">Nomor Induk Mahasiswa</label>
                        <input type="text" name="nim" class="form-control" id="nim" value="<?=$mahasiswa['nim'];?>">
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="text" name="email" class="form-control" id="email" value="<?=$mahasiswa['email'];?>">
                    </div>
                    <div class="form-group">
                        <label for="jurusan">Jurusan</label>
                        <select class="form-control" name="jurusan" id="jurusan">
                        <?php foreach($jurusan as $j) :?>
                            <?php if($j == $mahasiswa['jurusan']) : ?>
                                <option value="<?=$j?>"selected><?=$j?></option>
                            <?php else :?>
                                <option value="<?=$j?>"><?=$j?></option>
                            <?php endif; ?>
                        <?php endforeach;?>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary float-right">Submit</button>
                </form>
            </div>
        </div>

    </div>

</div>