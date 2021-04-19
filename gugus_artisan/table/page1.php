<?php


function page1()
{
    
$arr = [];

$arr[] = [ 
  'table' => 'service', 
  'data' => [ 
      'id' => ai(), 
      'icon' => char(255), 
      'title' => char(255), 
      'des' => textlong(), 
      'created_at' => timestamp(), 
      'updated_at' => timestampupdate(), 
      'delete_set' => char(255, '0'), 
  ], 
  'form' => [ 
      'id' => 'no',
      'icon' => 'file', 
      'title' => 'text', 
      'des' => 'editor', 
      'created_at' => 'no', 
      'updated_at' => 'no', 
      'delete_set' => 'no', 
  ], 
  'name' => [ 
      'No', 
      'Icon', 
      'Judul', 
      'Deskripsi', 
      'Tanggal Dibuat', 
      'Tanggal Diupdate', 
  ], 
  "title" => [
        "view" => "Layanan",
        "edit" => "Ubah Layanan",
        "new" => "Tambahkan Layanan"
    ],
  'command' => 'php gugus template layanan --crud service',
  'commandupdate' => 'false',
];

$arr[] = [ 
  'table' => 'artikel', 
  'data' => [ 
      'id' => ai(), 
      'foto' => char(255), 
      'judul' => char(255), 
      'slug' => char(255), 
      'content' => text(), 
      'des' => textlong(), 
      'created_at' => timestamp(), 
      'updated_at' => timestampupdate(), 
      'delete_set' => char(255, '0'), 
  ], 
  'form' => [ 
      'id' => 'no',
      'foto' => 'file', 
      'judul' => 'text', 
      'slug' => 'slug',
      'des' => 'editor', 
      'created_at' => 'no', 
      'updated_at' => 'no', 
      'delete_set' => 'no', 
  ], 
  'name' => [ 
      'No', 
      'Foto', 
      'Judul', 
      'Slug', 
      'Deskripsi', 
      'Tanggal dibuat', 
      'Tanggal diupdate', 
  ], 
  "title" => [
        "view" => "Artikel",
        "edit" => "Ubah Artikel",
        "new" => "Tambahkan Artikel"
    ],
  'command' => 'php gugus template artikel --crud artikel',
  'commandupdate' => 'false',
];

$arr[] = [ 
  'table' => 'sosmed', 
  'data' => [ 
      'id' => ai(), 
      'icon' => char(255), 
      'judul' => char(255), 
      'link' => char(255), 
      'created_at' => timestamp(), 
      'updated_at' => timestampupdate(), 
      'delete_set' => char(255, '0'), 
  ], 
  'form' => [ 
      'id' => 'no',
      'icon' => 'text', 
      'judul' => 'text', 
      'link' => 'text',
      'created_at' => 'no', 
      'updated_at' => 'no', 
      'delete_set' => 'no', 
  ], 
  'name' => [ 
      'No', 
      'Icon', 
      'Judul', 
      'Link', 
      'Tanggal dibuat', 
      'Tanggal diupdate', 
  ], 
  "title" => [
        "view" => "Sosial Media",
        "edit" => "Ubah Sosial Media",
        "new" => "Tambahkan Sosial Media"
    ],
  'command' => 'php gugus template sosmed --crud sosmed',
  'commandupdate' => 'false',
];


$arr[] = [ 
  'table' => 'jenis_penyakit', 
  'data' => [ 
      'id' => ai(), 
      'jenis_penyakit' => char(255), 
      'created_at' => timestamp(), 
      'updated_at' => timestampupdate(), 
      'delete_set' => char(255, '0'), 
  ], 
  'form' => [ 
      'id' => 'no',
      'jenis_penyakit' => 'text', 
      'created_at' => 'no', 
      'updated_at' => 'no', 
      'delete_set' => 'no', 
  ], 
  'name' => [ 
      'no', 
      'status', 
      'tanggal dibuat', 
      'tanggal diupdate', 
  ], 
  "title" => [
        "view" => "Jenis Penyakit",
        "edit" => "Ubah Jenis Penyakit",
        "new" => "Tambahkan Jenis Penyakit"
    ],
  'command' => 'php gugus template jenispenyakit --crud jenis_penyakit',
  'commandupdate' => 'false',
];


$arr[] = [ 
  'table' => 'obatpenyakit', 
  'data' => [ 
      'id' => ai(), 
      'penyakit_id' => char(255), 
      'obat_id' => char(255), 
      'aturan_pemakaian' => textlong(255), 
      'created_at' => timestamp(), 
      'updated_at' => timestampupdate(), 
      'delete_set' => char(255, '0'), 
  ],
  'form' => [ 
      'id' => 'no',
      'penyakit_id' => 'no', 
      'obat_id' => 'no', 
      'aturan_pemakaian' => 'text', 
      'created_at' => 'no', 
      'updated_at' => 'no', 
      'delete_set' => 'no', 
  ], 
  'name' => [ 
      'no', 
      'penyakit', 
      'obat', 
      'aturan pakai', 
      'tanggal dibuat', 
      'tanggal diupdate', 
  ], 
  "title" => [
        "view" => "Jenis Penyakit",
        "edit" => "Ubah Jenis Penyakit",
        "new" => "Tambahkan Jenis Penyakit"
    ],
  'command' => 'php gugus template obatpenyakit --crud obatpenyakit',
  'commandupdate' => 'false',
];

$arr[] = [ 
  'table' => 'penyakit', 
  'data' => [ 
      'id' => ai(), 
      'foto' => char(255), 
      'jenis_penyakit_id' => char(255), 
      'nama_penyakit' => char(255), 
      'deskripsi' => textlong(), 
      'created_at' => timestamp(), 
      'updated_at' => timestampupdate(), 
      'delete_set' => char(255, '0'), 
  ], 
  'form' => [ 
      'id' => 'no',
      'foto' => 'file', 
      "jenis_penyakit_id" => [ 
            "type" => "select",  // type digunakan untuk menentukan tipe form
            "data" => [                     // data merupakan setting dari selection 
                "db" => "jenis_penyakit",         // db disini anda akan memilih data dari table mana yang ingin anda ambil
                "data" => "id",             // data merupakan setting untuk value yang akan digunakan pada option
                "name" => "jenis_penyakit"   // name digunakan untuk tampilan dari option
            ]
        ], 
        'nama_penyakit' => 'text', 
        'deskripsi' => 'editor', 
        'created_at' => 'no', 
        'updated_at' => 'no', 
        'delete_set' => 'no', 
  ], 
  'name' => [ 
      'no', 
      'foto', 
      'jenis penyakit', 
      'nama penyakit', 
      'deskripsi', 
      'tanggal dibuat', 
      'tanggal diupdate', 
  ], 
  "title" => [
        "view" => "Penyakit",
        "edit" => "Ubah Penyakit",
        "new" => "Tambahkan Penyakit"
    ],
    "custome" => custome2("jenis_penyakit_id", "jenis_penyakit", "'id'", "'jenis_penyakit_id'", "jenis_penyakit")
    .custome1('deskripsi', "'id'", "
        <button id='id{{xxx}}' type='button' class='btn btn-primary'>detail</button>
        <script>
            \$('#id{{xxx}}').click(function(){
                \$('.modal').modal('show');
                \$.ajax({
                    url: '\".site_url('').\"admin/penyakit/detail/{{id}}',
                    success: function(result){
                        \$('#detail').html(result);
                    }
                })
            })
        </script>

        ")
  ,'command' => 'php gugus template penyakit --crud penyakit',
  'commandupdate' => 'false',
];


return $arr;

}