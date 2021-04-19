<br>
<div class="form-element-area">
  <div class="container">
    <div class="row">
      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="form-element-list">
          <h1 class="m-0 text-dark">Tambahkan Penyakit</h1>
        </div><!-- /.col -->
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
<br>

<div class="form-element-area">
  <div class="container">
    <div class="row">
      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="form-element-list">
          
          <form action="<?= site_url('admin/penyakit/simpan') ?>" method="post" enctype="multipart/form-data">
              
                <?=
                    form::input([
                        "title" => "foto",
                        "type" => "file",
                        "fc" => "foto",
                        "placeholder" => "tambahkan foto",
                    ])
                ?>
            
                <?=
                    form::select_db([
                        "title" => "jenis penyakit",
                        "type" => "password",
                        "fc" => "jenis_penyakit_id",
                        "placeholder" => "tambahkan jenis_penyakit_id",
                        "db" => "jenis_penyakit",
                        "data" => "id",
                        "name" => "jenis_penyakit",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "nama penyakit",
                        "type" => "text",
                        "fc" => "nama_penyakit",
                        "placeholder" => "tambahkan nama_penyakit",
                    ])
                ?>
            
                <?=
                    form::editor([
                        "title" => "deskripsi",
                        "type" => "text",
                        "fc" => "deskripsi",
                        "placeholder" => "tambahkan deskripsi",
                    ])
                ?>
            
              <div class="form-group">
                <button type="submit" class="btn btn-primary">Simpan</button>
                <a class="btn btn-default" href="<?= site_url('admin/penyakit'); ?>">Back</a>
              </div>
          </form>

				</div>
			</div>
		</div>
	</div>
</div>
</section>