<?php

/*
| Kolom tiap obat:
|   nama, dosis, frekuensi (1-4 kali sehari), aturan (opsional), fungsi,
|   warna (coral | sun | sea | violet)
*/

return [

    'demo' => [
        'sapaan' => 'Bu',
        'pemilik' => 'Sari Wulandari',
        'usia' => 67,

        // Opsional. Hapus blok 'kontak' jika tidak diperlukan.
        'kontak' => [
            'nama' => 'Rina (anak)',
            'telepon' => '081234567890',
        ],

        'obat' => [
            [
                'nama' => 'Metformin',
                'dosis' => '5 mg', // ganti sesuai resep
                'frekuensi' => 2,
                'aturan' => 'Sesudah makan',
                'fungsi' => 'Menurunkan kadar gula darah pada penderita diabetes (DM).',
                'warna' => 'coral',
            ],
            [
                'nama' => 'Semaglutide',
                'dosis' => '5 mg', // ganti sesuai resep
                'frekuensi' => 1,
                'aturan' => 'Sesuai anjuran dokter',
                'fungsi' => 'Membantu mengontrol kadar gula darah pada penderita diabetes (DM).',
                'warna' => 'sun',
            ],
            [
                'nama' => 'Atorvastatin',
                'dosis' => '5 mg', // ganti sesuai resep
                'frekuensi' => 1,
                'aturan' => 'Sesuai anjuran dokter',
                'fungsi' => 'Menurunkan kadar kolesterol dalam darah.',
                'warna' => 'sea',
            ],
            [
                'nama' => 'Lisinopril',
                'dosis' => '5 mg', // ganti sesuai resep
                'frekuensi' => 1,
                'aturan' => 'Setiap hari, di waktu yang sama',
                'fungsi' => 'Menurunkan tekanan darah tinggi (hipertensi).',
                'warna' => 'violet',
            ],
            [
                'nama' => 'Amlodipin',
                'dosis' => '5 mg', // ganti sesuai resep
                'frekuensi' => 1,
                'aturan' => 'Setiap hari, di waktu yang sama',
                'fungsi' => 'Menurunkan tekanan darah tinggi (hipertensi).',
                'warna' => 'coral',
            ],
            [
                'nama' => 'Amoxicillin (Antibiotik)',
                'dosis' => '5 mg', // ganti sesuai resep
                'frekuensi' => 3,
                'aturan' => 'Habiskan sesuai anjuran dokter',
                'fungsi' => 'Antibiotik untuk melawan infeksi akibat bakteri.',
                'warna' => 'sun',
            ],
        ],
    ],

];