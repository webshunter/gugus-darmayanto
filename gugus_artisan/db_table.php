<?php

require_once 'fontawesome/fontFunc.php';
require_once 'table_opsi_set.php';
require_once 'table/page1.php';
require_once 'table/page2.php';


function crdb()
{

    // login sistem
    // --------------------------------------
        // coming soon

        // login sistem cant return data 
        /*
            [
                ......
                    "datalogin" => [
                        "id" => "value",
                        "username" => "value",
                        "position" => "",
                        "allconf can build from this" => "",
                    ]
                ......
            ]
        */

    // landing setting up
    // --------------------------------------

        // coming soon
    
    // -----------------------------------------------------------------------------------------------------------------------------------//

    // datatable setting up

    // #1. set all data on crude here 
    // create database name ------------------------- // 
    /*
        [
            ....
                "table" => "table name"
            ....
        ]
    */
    
    // #2. create table row
    /*
        [
            ....
                "data" => [
                    "row_name" => char(255)
                ]
            ....
        ]
        row setting data
        ai() -----> autoincrement row
        char(255) ------> VARCHAR 255 //number can custome 1 - 255
        textlong() ------> set for text long
        no(11) ------> integer data 
        timestamp() ------> set timestamp value for auto date
        timestampupdate() ------> timestamp auto update on update data
        relation(table, table_row, table_relation, table_relation_row) ----> relationship database setting
    */

    // dalam penggunaan metode ini user harus paham karakteristk dari array.
    // #4. form setting

        // comming soon

        /*
            -> no condition form tidak akan di tampilkan dalam kata lain form tidak akan dibuat untuk row table tersebut
            [
                ....
                    "form" => [
                        "id" => "no"
                    ],
                ....
            ]

            -> text condition digunakan untuk membuat text form format
            [
                ....
                    "form" => [
                        "username" => "text"
                    ],
                ....
            ]

            -> number condition digunakan untuk membuat number form format
            [
                ....
                    "form" => [
                        "total" => "number"
                    ],
                ....
            ]

            -> username condition digunakan untuk membuat username form format
            [
                ....
                    "form" => [
                        "total" => "username"
                    ],
                ....
            ]

            -> password condition digunakan untuk membuat password form format
            [
                ....
                    "form" => [
                        "total" => "password"
                    ],
                ....
            ]

            -> editor condition digunakan untuk membuat edito form format dalam hal ini summernote editor
            [
                ....
                    "form" => [
                        "total" => "number"
                    ],
                ....
            ] 

            -> select condition digunakan untuk membuat selection dalam hal ini selection membutuhkan database untuk menopangnya
            -> multiple condition yang digunakan untuk membuat multipple selection
            [
                ....
                    "category_id" => [ 
                        "type" => "select / multiple",  // type digunakan untuk menentukan tipe form
                        "data" => [                     // data merupakan setting dari selection 
                            "db" => "category",         // db disini anda akan memilih data dari table mana yang ingin anda ambil
                            "data" => "id",             // data merupakan setting untuk value yang akan digunakan pada option
                            "name" => "nama_kategori"   // name digunakan untuk tampilan dari option
                        ]
                    ],
                ....
            ] 

            -> login condition yang digunakan untuk membuat dengan nilai default id user yang aktif/ dan hidden form
            [
                ....
                    "user" => "login"
                ....
            ] 

        */ 


    // #4. array condition for join table for view
        // coming soon

    /*
        [
            ....
                "data" => [
                    "row_name" => char(255)
                ]
            ....
        ]
    */

    // #4. array condition for join table for view
        // coming soon


    // #5. set default nilai table
        
        // coming soon

    // #6 title page of admin crud sistem setting
    /*
        [
            ....
                "title" => [
                    "view" => "Customer", -> set for view page
                    "edit" => "Ubah Customer", -> set for edit page
                    "new" => "Tambahkan Customer" -> set for page create new data
                ],
            ....
        ]
    */
    
    // #6 commandAll digunakan untuk membuat command process for create all system
                // coming soon data setting like below
    /*
        [
            ....
               'command' => command("link_name", "table_name"),
               'commandAll' => true,
            ....
        ]
    */
    
    // #7 email setting confige page
        
        // coming soon
    
    

    // #8 table design automaticaly
        // coming soon


    // #9 selection icon with modal for font awesome

    // builder with database
    
$arr = []; 

// user
$arr[] = [ 
  'table' => 'user', 
  'data' => [ 
      'id' => ai(), 
      'foto' => char(255), 
      'username' => char(255), 
      'password' => char(255), 
      'nama' => char(255), 
      'hp' => char(255), 
      'status_id' => char(255, '0'), 
      'created_at' => timestamp(), 
      'updated_at' => timestampupdate(), 
      'delete_set' => char(255, '0'), 
  ], 
  'form' => [ 
      'id' => 'no', 
      'foto' => 'file', 
      'username' => 'username', 
      'password' => 'password', 
      'nama' => 'text', 
      'hp' => 'number', 
      "status_id" => [ 
            "type" => "select",  // type digunakan untuk menentukan tipe form
            "data" => [                     // data merupakan setting dari selection 
                "db" => "status",         // db disini anda akan memilih data dari table mana yang ingin anda ambil
                "data" => "id",             // data merupakan setting untuk value yang akan digunakan pada option
                "name" => "status"   // name digunakan untuk tampilan dari option
            ]
        ],
      'created_at' => 'no', 
      'updated_at' => 'no', 
      'delete_set' => 'no', 
  ], 
  'name' => [ 
      'no', 
      'foto', 
      'username', 
      'password', 
      'nama', 
      'hp', 
      'status', 
      'tanggal dibuat', 
      'tanggal diupdate', 
  ], 
  "title" => [
        "view" => "user",
        "edit" => "Ubah user",
        "new" => "Tambahkan user"
    ],
    "custome" => custome2("status_id","status", "'id'", "'status_id'", "status")
    .custome1('foto', "'foto'", "<img width='50px' src='\".base_url('').\"assets/gambar/user/{{foto}}' />")
    ,
  'command' => 'php gugus template user --crud user',
  'commandupdate' => 'false',
]; 


// mstatus
$arr[] = [ 
  'table' => 'status', 
  'data' => [ 
      'id' => ai(), 
      'status' => char(255), 
      'created_at' => timestamp(), 
      'updated_at' => timestampupdate(), 
      'delete_set' => char(255, '0'), 
  ], 
  'form' => [ 
      'id' => 'no',
      'status' => 'text', 
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
        "view" => "status",
        "edit" => "Ubah status",
        "new" => "Tambahkan status"
    ],
  'command' => 'php gugus template status --crud status',
  'commandupdate' => 'false',
];


$arr[] = [ 
  'table' => 'tipe_obat', 
  'data' => [ 
      'id' => ai(), 
      'tipe_obat' => char(255), 
      'created_at' => timestamp(), 
      'updated_at' => timestampupdate(), 
      'delete_set' => char(255, '0'), 
  ], 
  'form' => [ 
      'id' => 'no',
      'tipe_obat' => 'text', 
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
        "view" => "Tipe Obat",
        "edit" => "Ubah Tipe Obat",
        "new" => "Tambahkan Tipe Obat"
    ],
  'command' => 'php gugus template tipeobat --crud tipe_obat',
  'commandupdate' => 'false',
];

// Obat
$arr[] = [ 
  'table' => 'obat', 
  'data' => [ 
      'id' => ai(), 
      'foto' => char(255), 
      'obat' => char(255), 
      'tipe_obat_id' => char(255),
      'deskripsi' => textlong(), 
      'created_at' => timestamp(), 
      'updated_at' => timestampupdate(), 
      'delete_set' => char(255, '0'), 
  ], 
  'form' => [ 
      'id' => 'no',
      'foto' => 'file', 
      'obat' => 'text', 
      "tipe_obat_id" => [ 
            "type" => "select",  // type digunakan untuk menentukan tipe form
            "data" => [                     // data merupakan setting dari selection 
                "db" => "tipe_obat",         // db disini anda akan memilih data dari table mana yang ingin anda ambil
                "data" => "id",             // data merupakan setting untuk value yang akan digunakan pada option
                "name" => "tipe_obat"   // name digunakan untuk tampilan dari option
            ]
        ], 
      'deskripsi' => 'editor', 
      'created_at' => 'no', 
      'updated_at' => 'no', 
      'delete_set' => 'no', 
  ], 
  'name' => [ 
      'no', 
      'foto obat', 
      'nama obat', 
      'tipe obat', 
      'deskripsi', 
      'tanggal dibuat', 
      'tanggal diupdate', 
  ], 
  "title" => [
        "view" => "obat",
        "edit" => "Ubah obat",
        "new" => "Tambahkan obat"
    ],
    'custome' => custome1('deskripsi', "'id'", "
        <button id='id{{xxx}}' type='button' class='btn btn-primary'>detail</button>

        <script>
            \$('#id{{xxx}}').click(function(){
                \$('.modal').modal('show');
                \$.ajax({
                    url: '\".site_url('').\"admin/obat/detail/{{id}}',
                    success: function(result){
                        \$('#detail').html(result);
                    }
                })
            })
        </script>

        ")
    .custome1('foto', "'foto'", "<img width='80px' src='\".base_url('').\"assets/gambar/obat/{{foto}}' />")
    .custome2('tipe_obat_id', "tipe_obat", "'id'", "'tipe_obat_id'", "tipe_obat")
    ,'command' => 'php gugus template obat --crud obat',
  'commandupdate' => 'false',
];

// Obat
$arr[] = [ 
  'table' => 'stokobat', 
  'data' => [ 
      'id' => ai(), 
      'obat_id' => char(255), 
      'stok' => char(255), 
      'tanggal_beli' => char(255), 
      'harga_beli' => char(255),
      'harga_jual' => char(255), 
      'created_at' => timestamp(), 
      'updated_at' => timestampupdate(), 
      'delete_set' => char(255, '0'), 
  ], 
  'form' => [ 
      'id' => 'no',
      'obat_id' => 'text', 
      'stok' => 'text', 
      'tanggal_beli' => 'text', 
      'harga_beli' => 'text', 
      'harga_jual' => 'text', 
      'created_at' => 'no', 
      'updated_at' => 'no', 
      'delete_set' => 'no', 
  ], 
  'name' => [ 
      'no', 
      'obat', 
      'stok', 
      'tanggal beli', 
      'harga beli', 
      'harga jual', 
      'tanggal dibuat', 
      'tanggal diupdate', 
  ], 
  "title" => [
        "view" => "stok obat",
        "edit" => "Ubah stok obat",
        "new" => "Tambahkan stok obat"
  ],
  'command' => 'php gugus template stokobat --crud stokobat',
//   'commandupdate' => 'false',
];

$arr[] = [
  'table' => 'perusahaan',
  'data' => [
      'id' => ai(),
      'nama' => char(255),
      'alamat' => char(255),
      'email' => char(255),
      'tlpn' => char(255),
      'hp' => char(255),
      'ig' => char(255),
      'fb' => char(255),
      'tw' => char(255),
      'created_at' => timestamp(), 
      'updated_at' => timestampupdate(), 
      'delete_set' => char(255, '0'),
  ],
  'form' => [
      'id' => 'no',
      'nama' => 'text',
      'alamat' => 'text',
      'email' => 'text',
      'tlpn' => 'text',
      'hp' => 'text',
      'ig' => 'text',
      'fb' => 'text',
      'tw' => 'text',
      'created_at' => 'no', 
      'updated_at' => 'no', 
      'delete_set' => 'no', 
  ],
  'name' => [
      'no',
      'nama',
      'alamat',
      'email',
      'telephone',
      'handphone',
      'instagram',
      'facebook',
      'twitter',
      'tanggal daftar', 
      'tanggal update',
  ],
  "title" => [
        "view" => "Perusahaan",
        "edit" => "Ubah Perusahaan",
        "new" => "Tambahkan Perusahaan"
    ],
  'command' => 'php gugus template perusahaan --crud perusahaan',
  'commandupdate' => 'false',
];


$arr = array_merge($arr, page1());
$arr = array_merge($arr, page2());



// ----------------------------------------//
    return $arr;
}

