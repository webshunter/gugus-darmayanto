<br>
<div class="form-element-area">
  <div class="container">
    <div class="row">
      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="form-element-list">
          <h1 class="m-0 text-dark">Ubah stok obat</h1>
        </div>
      </div>
    </div>
  </div>
</div>
<br>

<div class="form-element-area">
  <div class="container">
    <div class="row">
      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="form-element-list">

          <form action="<?= site_url('admin/stokobat/update') ?>" method="post" enctype="multipart/form-data">
              
        <?=
            form::input([
                "type" => "hidden",
                "fc" => "id",
                "value" => $form_data->id,
            ])
        ?>
    
                <?=
                    form::input([
                        "title" => "obat",
                        "type" => "text",
                        "fc" => "obat_id",
                        "placeholder" => "tambahkan obat_id",
                        "value" => $form_data->obat_id,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "stok",
                        "type" => "text",
                        "fc" => "stok",
                        "placeholder" => "tambahkan stok",
                        "value" => $form_data->stok,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "tanggal beli",
                        "type" => "text",
                        "fc" => "tanggal_beli",
                        "placeholder" => "tambahkan tanggal_beli",
                        "value" => $form_data->tanggal_beli,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "harga beli",
                        "type" => "text",
                        "fc" => "harga_beli",
                        "placeholder" => "tambahkan harga_beli",
                        "value" => $form_data->harga_beli,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "harga jual",
                        "type" => "text",
                        "fc" => "harga_jual",
                        "placeholder" => "tambahkan harga_jual",
                        "value" => $form_data->harga_jual,
                    ])
                ?>
            
              <div class="form-group">
                <button type="submit" class="btn btn-primary">Simpan</button>
                <a class="btn btn-default" href="<?= site_url('admin/stokobat'); ?>">Back</a>
              </div>
          </form>

				</div>
			</div>
		</div>
	</div>
</div>
</section>