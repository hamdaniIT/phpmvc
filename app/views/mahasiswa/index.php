<div class="container mt-3">
    <div class="row">
        <div class="col-lg-6">
            <?php Flasher::flash() ?>
        </div>
    </div>
    <div class="row mb-3">
        <div class="col-lg-6">
            <button type="button" class="btn btn-primary" id="tambah-mhs" data-toggle="modal" data-target="#formodal">
                Tambah Data Mahasiswa
            </button>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-6">
            <form action="<?= BASEURL ?>/mahasiswa/cari" method="post">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Cari Mahasiswa .." name="keyword" autocomplete="off">
                    <div class="input-group-append">
                        <button class="btn btn-primary" type="submit" id="tombolCari">Cari..</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-6">

            <h3>Daftar Mahasiswa</h3>

            <ul class="list-group">
                <?php foreach ($data['mhs'] as $mhs) : ?>
                    <li class="list-group-item">
                        <?= $mhs['nama'] ?>
                        <a href="<?= BASEURL ?>/mahasiswa/hapus/<?= $mhs['id'] ?>"><span class="badge badge-danger float-right ml-2" onclick="return confirm('Apakah anda yakin?')">Hapus</span></a>
                        <a href="<?= BASEURL ?>/mahasiswa/ubah/<?= $mhs['id'] ?>" data-toggle="modal" data-target="#formodal" class="badge badge-success float-right ml-2 tampilModalUbah" data-id="<?= $mhs['id']; ?>">Ubah</a>
                        <a href="<?= BASEURL ?>/mahasiswa/detail/<?= $mhs['id'] ?>"><span class="badge badge-primary float-right">Detail</span></a>
                    </li>
                <?php endforeach; ?>
            </ul>

        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="formodal" tabindex="-1" role="dialog" aria-labelledby="judulmodal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="judulmodal">Tambah Data Mahasiswa</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= BASEURL ?>/mahasiswa/tambah" method="POST">
                    <input type="hidden" name="id" id="id">
                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <input type="text" class="form-control" id="nama" name="nama">
                    </div>
                    <div class="form-group">
                        <label for="nim">Nim</label>
                        <input type="number" class="form-control" id="nim" name="nim">
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" name="email">
                    </div>
                    <div class="form-group">
                        <label for="jurusan">Example select</label>
                        <select class="form-control" id="jurusan" name="jurusan">
                            <option value="Teknik Informatika">Teknik Informatika</option>
                            <option value="Teknik Komputer">Teknik Komputer</option>
                            <option value="Teknik Elektro">Teknik Elektro</option>
                            <option value="Teknik Pertanian">Teknik Pertanian </option>
                        </select>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Tambah Data</button>
                </form>
            </div>
        </div>
    </div>
</div>