<?php

return [
    /*
    |--------------------------------------------------------------------------
    | LaundryQu Business Configuration
    |--------------------------------------------------------------------------
    |
    | Seluruh data statis seperti nomor WhatsApp admin, alamat, jam operasional,
    | area pickup gratis, social media, serta daftar layanan dan harga dipusatkan
    | di sini agar mudah dikonfigurasi tanpa mengubah komponen frontend.
    |
    */

    'brand_name' => 'LaundryQu',
    'tagline' => 'Layanan Penjemputan Laundry Higienis & Cepat',

    // Nomor WhatsApp Admin (format internasional untuk link wa.me dan format lokal untuk display)
    'whatsapp_admin_number' => '6281234567890',
    'whatsapp_admin_display' => '0812-3456-7890',

    // Detail Lokasi & Workshop
    'lokasi' => [
        'nama_hub' => 'LaundryQu Hub Sukajadi',
        'alamat_lengkap' => 'Jl. Sukajadi No. 128, Bandung',
        'keterangan' => 'Pusat workshop higienis & hub kurir penjemputan kota Bandung.',
        'maps_url' => 'https://maps.google.com/?q=Sukajadi+Bandung',
    ],

    // Operasional & Layanan Pickup
    'jam_operasional' => '08.00 - 16.00 WIB setiap hari (termasuk akhir pekan)',
    'area_pickup_gratis' => 'Kecamatan Sukajadi dan Kecamatan Andir (Pickup Gratis)',
    'radius_layanan' => 'Radius s/d 5 km dari outlet utama',

    // Pilihan Jadwal Form Pickup (Sesuai PRD FRM-5 & FRM-6)
    'tanggal_options' => [
        'Hari Ini',
        'Besok',
    ],
    'jam_pickup_options' => [
        '10:00 - 12:00 WIB',
        '12:00 - 15:00 WIB',
    ],

    // Cara Kerja (4 Langkah)
    'cara_kerja' => [
        [
            'step' => 1,
            'title' => 'Pesan via Web',
            'desc' => 'Isi formulir online cepat tanpa ribet install aplikasi tambahan, cukup 1 menit.',
            'icon' => 'Smartphone',
        ],
        [
            'step' => 2,
            'title' => 'Kurir Menjemput',
            'desc' => 'Kurir kami datang tepat waktu ke titik lokasi penjemputan dengan timbangan digital transparan.',
            'icon' => 'Truck',
        ],
        [
            'step' => 3,
            'title' => 'Proses Cuci',
            'desc' => 'Dicuci higienis 1 mesin 1 pelanggan, disetrika uap rapi, dan wangi parfum premium.',
            'icon' => 'Waves',
        ],
        [
            'step' => 4,
            'title' => 'Pakaian Diantar',
            'desc' => 'Pakaian bersih rapi dipacking rapat diantar kembali ke depan pintu Anda dengan aman.',
            'icon' => 'PackageCheck',
        ],
    ],

    // Daftar Layanan & Harga (Sesuai Stitch & PRD LPG-1)
    'layanan' => [
        [
            'id' => 'cuci-komplit',
            'nama' => 'Cuci Komplit per Kg',
            'badge' => 'Reguler (2 Hari)',
            'harga' => 7000,
            'harga_display' => 'Rp 7.000',
            'unit' => '/ kg',
            'catatan_harga' => 'Minimal order 3 kg',
            'deskripsi' => 'Pilihan hemat ideal untuk pakaian santai dan kerja harian.',
            'is_populer' => false,
            'fitur' => [
                'Cuci bersih + Kering 100%',
                'Setrika uap rapi anti kusut',
                'Parfum premium tahan hingga 7 hari',
                '1 Mesin cuci 1 Pelanggan',
            ],
            'select_value' => 'Cuci Komplit (Rp 7.000/kg)',
        ],
        [
            'id' => 'express-24jam',
            'nama' => 'Layanan Express 24 Jam',
            'badge' => 'Cepat & Darurat',
            'harga' => 12000,
            'harga_display' => 'Rp 12.000',
            'unit' => '/ kg',
            'catatan_harga' => 'Garansi selesai dalam 24 jam',
            'deskripsi' => 'Selesai kilat untuk jadwal mendesak dan aktivitas padat.',
            'is_populer' => true,
            'populer_badge' => 'Paling Populer',
            'fitur' => [
                'Prioritas antrian pengerjaan kilat',
                'Cuci + Kering + Setrika Presisi',
                'Packing ziplock anti lembap',
                'Garansi uang kembali bila terlambat',
            ],
            'select_value' => 'Express 24 Jam (Rp 12.000/kg)',
        ],
        [
            'id' => 'cuci-satuan',
            'nama' => 'Cuci Satuan Premium',
            'badge' => 'Special Care',
            'harga' => 15000,
            'harga_display' => 'Rp 15.000',
            'unit' => '/ pcs',
            'catatan_harga' => 'Mulai harga satuan terendah',
            'deskripsi' => 'Perawatan eksklusif untuk bahan sensitif & berharga.',
            'is_populer' => false,
            'fitur' => [
                'Jas, Blazer, Gaun, & Kebaya pesta',
                'Bedcover, Selimut tebal, & Sprei King',
                'Perawatan bahan wol & sutra',
                'Cover gantung debu khusus gratis',
            ],
            'select_value' => 'Cuci Satuan Premium',
        ],
    ],

    // Media Sosial & Hak Cipta
    'social' => [
        'instagram' => [
            'name' => '@laundryqu.id',
            'url' => 'https://instagram.com/laundryqu.id',
        ],
        'tiktok' => [
            'name' => '@laundryqu.official',
            'url' => 'https://tiktok.com/@laundryqu.official',
        ],
    ],
    'copyright_year' => '2026',
];
