<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Pesan Validasi Bahasa Indonesia
    |--------------------------------------------------------------------------
    |
    | Berikut adalah pesan validasi standar Laravel dalam Bahasa Indonesia.
    | Kamu bisa sesuaikan sesuai kebutuhan.
    |
    */

    'accepted'             => ':attribute harus diterima.',
    'active_url'           => ':attribute bukan URL yang valid.',
    'after'                => ':attribute harus tanggal setelah :date.',
    'after_or_equal'       => ':attribute harus tanggal setelah atau sama dengan :date.',
    'alpha'                => ':attribute hanya boleh berisi huruf.',
    'alpha_dash'           => ':attribute hanya boleh berisi huruf, angka, strip, dan underscore.',
    'alpha_num'            => ':attribute hanya boleh berisi huruf dan angka.',
    'array'                => ':attribute harus berupa array.',
    'before'               => ':attribute harus tanggal sebelum :date.',
    'before_or_equal'      => ':attribute harus tanggal sebelum atau sama dengan :date.',
    'between'              => [
        'numeric' => ':attribute harus antara :min dan :max.',
        'file'    => ':attribute harus antara :min dan :max kilobita.',
        'string'  => ':attribute harus antara :min dan :max karakter.',
        'array'   => ':attribute harus antara :min dan :max item.',
    ],
    'boolean'              => ':attribute harus berupa true atau false.',
    'confirmed'            => 'Konfirmasi :attribute tidak cocok.',
    'date'                 => ':attribute bukan tanggal yang valid.',
    'date_equals'          => ':attribute harus tanggal sama dengan :date.',
    'date_format'          => ':attribute tidak cocok dengan format :format.',
    'different'            => ':attribute dan :other harus berbeda.',
    'digits'               => ':attribute harus :digits digit.',
    'digits_between'       => ':attribute harus antara :min dan :max digit.',
    'dimensions'           => ':attribute memiliki dimensi gambar tidak valid.',
    'distinct'             => ':attribute memiliki nilai duplikat.',
    'email'                => ':attribute harus alamat email valid.',
    'ends_with'            => ':attribute harus diakhiri dengan salah satu dari: :values.',
    'exists'               => ':attribute yang dipilih tidak valid.',
    'file'                 => ':attribute harus berupa file.',
    'filled'               => ':attribute harus memiliki nilai.',
    'gt'                   => [
        'numeric' => ':attribute harus lebih besar dari :value.',
        'file'    => ':attribute harus lebih besar dari :value kilobita.',
        'string'  => ':attribute harus lebih besar dari :value karakter.',
        'array'   => ':attribute harus memiliki lebih dari :value item.',
    ],
    'gte'                  => [
        'numeric' => ':attribute harus lebih besar atau sama dengan :value.',
        'file'    => ':attribute harus lebih besar atau sama dengan :value kilobita.',
        'string'  => ':attribute harus lebih besar atau sama dengan :value karakter.',
        'array'   => ':attribute harus memiliki :value item atau lebih.',
    ],
    'image'                => ':attribute harus berupa gambar.',
    'in'                   => ':attribute yang dipilih tidak valid.',
    'in_array'             => ':attribute tidak ada di dalam :other.',
    'integer'              => ':attribute harus berupa angka bulat.',
    'ip'                   => ':attribute harus berupa alamat IP yang valid.',
    'ipv4'                 => ':attribute harus berupa alamat IPv4 yang valid.',
    'ipv6'                 => ':attribute harus berupa alamat IPv6 yang valid.',
    'json'                 => ':attribute harus berupa JSON yang valid.',
    'lt'                   => [
        'numeric' => ':attribute harus kurang dari :value.',
        'file'    => ':attribute harus kurang dari :value kilobita.',
        'string'  => ':attribute harus kurang dari :value karakter.',
        'array'   => ':attribute harus memiliki kurang dari :value item.',
    ],
    'lte'                  => [
        'numeric' => ':attribute harus kurang atau sama dengan :value.',
        'file'    => ':attribute harus kurang atau sama dengan :value kilobita.',
        'string'  => ':attribute harus kurang atau sama dengan :value karakter.',
        'array'   => ':attribute tidak boleh memiliki lebih dari :value item.',
    ],
    'max'                  => [
        'numeric' => ':attribute maksimal :max.',
        'file'    => ':attribute maksimal :max kilobita.',
        'string'  => ':attribute maksimal :max karakter.',
        'array'   => ':attribute maksimal :max item.',
    ],
    'mimes'                => ':attribute harus file dengan tipe: :values.',
    'mimetypes'            => ':attribute harus file dengan tipe: :values.',
    'min'                  => [
        'numeric' => ':attribute minimal :min.',
        'file'    => ':attribute minimal :min kilobita.',
        'string'  => ':attribute minimal :min karakter.',
        'array'   => ':attribute minimal :min item.',
    ],
    'not_in'               => ':attribute yang dipilih tidak valid.',
    'not_regex'            => ':attribute format tidak valid.',
    'numeric'              => ':attribute harus berupa angka.',
    'present'              => ':attribute harus ada.',
    'regex'                => ':attribute format tidak valid.',
    'required'             => ':attribute wajib diisi.',
    'required_if'          => ':attribute wajib diisi saat :other adalah :value.',
    'required_unless'      => ':attribute wajib diisi kecuali :other ada di :values.',
    'required_with'        => ':attribute wajib diisi saat :values ada.',
    'required_with_all'    => ':attribute wajib diisi saat :values ada.',
    'required_without'     => ':attribute wajib diisi saat :values tidak ada.',
    'required_without_all' => ':attribute wajib diisi saat tidak ada :values.',
    'same'                 => ':attribute dan :other harus sama.',
    'size'                 => [
        'numeric' => ':attribute harus :size.',
        'file'    => ':attribute harus :size kilobita.',
        'string'  => ':attribute harus :size karakter.',
        'array'   => ':attribute harus mengandung :size item.',
    ],
    'starts_with'          => ':attribute harus diawali salah satu dari: :values.',
    'string'               => ':attribute harus berupa teks.',
    'timezone'             => ':attribute harus zona waktu valid.',
    'unique'               => ':attribute sudah digunakan.',
    'uploaded'             => ':attribute gagal diunggah.',
    'url'                  => ':attribute format tidak valid.',
    'uuid'                 => ':attribute harus UUID yang valid.',

    /*
    |--------------------------------------------------------------------------
    | Nama Attribute Kustom
    |--------------------------------------------------------------------------
    |
    | Ganti nama field agar pesan error lebih mudah dimengerti.
    |
    */

    'attributes' => [
        'nama' => 'Nama',
        'nik' => 'NIK',
        'no_hp' => 'Nomor HP',
        'alamat' => 'Alamat',
        'tanggal_lahir' => 'Tanggal Lahir',
    ],

];
