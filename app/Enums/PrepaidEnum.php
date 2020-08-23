<?php

namespace App\Enums;

use phpDocumentor\Reflection\Types\This;

class PrepaidEnum
{
    const RESPONSE = [
        [
            'rc' => '00',
            'message' => 'Transaksi Sukses',
            'status' => 'Sukses'
        ],
        [
            'rc' => '01',
            'message' => 'Timeout',
            'status' => 'Gagal'
        ],
        [
            'rc' => '02',
            'message' => 'Transaksi Gagal',
            'status' => 'Gagal'
        ],
        [
            'rc' => '03',
            'message' => 'Transaksi Pending',
            'status' => 'Pending'
        ],
        [
            'rc' => '40',
            'message' => 'Payload Error',
            'status' => 'Gagal'
        ],
        [
            'rc' => '41',
            'message' => 'Signature tidak valid',
            'status' => 'Gagal'
        ],
        [
            'rc' => '42',
            'message' => 'Gagal memproses API Buyer',
            'status' => 'Gagal'
        ],
        [
            'rc' => '43',
            'message' => 'SKU tidak di temukan atau Non-Aktif',
            'status' => 'Gagal'
        ],
        [
            'rc' => '44',
            'message' => 'Saldo tidak cukup',
            'status' => 'Gagal'
        ],
        [
            'rc' => '45',
            'message' => 'IP Anda tidak kami kenali',
            'status' => 'Gagal'
        ],
        [
            'rc' => '46',
            'message' => 'Transaksi sudah pernah terjadi sebelumnya',
            'status' => 'Gagal'
        ],
        [
            'rc' => '47',
            'message' => 'Transaksi sudah terjadi di buyer lain',
            'status' => 'Gagal'
        ],
        [
            'rc' => '49',
            'message' => 'Ref ID tidak unik',
            'status' => 'Gagal'
        ],
        [
            'rc' => '50',
            'message' => 'Transaksi Tidak Ditemukan',
            'status' => 'Gagal'
        ],
        [
            'rc' => '51',
            'message' => 'Nomor Tujuan Diblokir',
            'status' => 'Gagal'
        ],
        [
            'rc' => '52',
            'message' => 'Prefix Tidak Sesuai Dengan Operator',
            'status' => 'Gagal'
        ],
        [
            'rc' => '53',
            'message' => 'Produk Seller Sedang Tidak Tersedia',
            'status' => 'Gagal'
        ],
        [
            'rc' => '54',
            'message' => 'Nomor Tujuan Salah',
            'status' => 'Gagal'
        ],
        [
            'rc' => '55',
            'message' => 'Produk Sedang Gangguan',
            'status' => 'Gagal'
        ],
        [
            'rc' => '56',
            'message' => 'Saldo Seller Digiflazz Habis',
            'status' => 'Gagal'
        ],
        [
            'rc' => '57',
            'message' => 'Jumlah Digit Kurang Atau Lebih',
            'status' => 'Gagal'
        ],
        [
            'rc' => '58',
            'message' => 'Sedang Cut Off',
            'status' => 'Gagal'
        ],
        [
            'rc' => '59',
            'message' => 'Tujuan di Luar Wilayah/Cluster',
            'status' => 'Gagal'
        ],
        [
            'rc' => '60',
            'message' => 'Tagihan belum tersedia',
            'status' => 'Gagal'
        ],
        [
            'rc' => '61',
            'message' => 'Belum pernah melakukan deposit',
            'status' => 'Gagal'
        ],
        [
            'rc' => '62',
            'message' => 'Seller sedang mengalami gangguan',
            'status' => 'Gagal'
        ],
        [
            'rc' => '63',
            'message' => 'Tidak support transaksi multi',
            'status' => 'Gagal'
        ],
        [
            'rc' => '64',
            'message' => 'Tarik tiket gagal, coba nominal lain atau hubungi admin.',
            'status' => 'Gagal'
        ],
        [
            'rc' => '65',
            'message' => 'Limit transaksi multi',
            'status' => 'Gagal'
        ],
        [
            'rc' => '66',
            'message' => 'Cut Off (Perbaikan Sistem Seller)',
            'status' => 'Gagal'
        ],
        [
            'rc' => '67',
            'message' => 'Seller belum ter-verfikasi',
            'status' => 'Gagal'
        ],
        [
            'rc' => '68',
            'message' => 'Stok habis',
            'status' => 'Gagal'
        ],
        [
            'rc' => '70',
            'message' => 'Timeout Dari Biller',
            'status' => 'Gagal'
        ],
        [
            'rc' => '99',
            'message' => 'DF Router Issue',
            'status' => 'Pending'
        ]
    ];

    const STATUS = [
        [
            'code' => '1',
            'message' => 'Gagal'
        ],
        [
            'code' => '2',
            'message' => 'Proses'
        ],
        [
            'code' => '3',
            'message' => 'Sukses'
        ],
        [
            'code' => '4',
            'message' => 'Dibatalkan'
        ]
    ];

    const STATUS_FAILED = 1;
    const STATUS_PROCESS = 2;
    const STATUS_SUCCESS = 3;
    const STATUS_CANCEL = 4;

    public static function find($search = '00', $key = 'rc')
    {
//        // if invalid
//        if (($key != 'rc') || ($key != 'message') || ($key != 'status')) {
//            return [];
//        }

        // find by status
        if ($key == 'status') {
            $result = [];
            foreach (self::RESPONSE as $response) {
                if ($response[$key] == $search) {
                    $result[] = $response;
                }
            }

            return $result;
        }

        // find by rc & message
        foreach (self::RESPONSE as $response) {
            if ($response[$key] == $search) {
                return $response;
            }
        }

        return [];
    }

    public static function findByRc($search = '00')
    {
        return self::find($search, 'rc');
    }

    public static function findByMessage($search = 'Transaksi Sukses')
    {
        return self::find($search, 'message');
    }

    public static function findByStatus($search = 'Gagal')
    {
        return self::find($search, 'status');
    }


    public static function findStatus($search = '1', $key = 'code')
    {
//        foreach (self::RESPONSE as $response) {
        foreach (self::STATUS as $response) {
            if ($response[$key] == $search) {
                return $response['message'];
            }
        }

        return 'tidak diketahui [HARAP MENGHUBUNGI ADMIN]';
    }

    public static function isStatusEnum($searchRC, $searchStatus)
    {
        if (blank($searchRC)) {
            if ($searchStatus == 'Gagal') {
                return self::STATUS_FAILED;
            } else if ($searchStatus == 'Sukses') {
                return self::STATUS_SUCCESS;
            } else if ($searchStatus == 'Pending') {
                return self::STATUS_PROCESS;
            }

            return self::STATUS_CANCEL;
        }

        return self::isRCStatusEnum($searchRC);
    }

    // output dari kodingan ini adalah status yang sesuai sama enum
    // bisa dimasukan ke database secara langsung tanpa diolah
    public static function isRCStatusEnum($searchRC)
    {
        $result = self::find($searchRC, 'rc');
        if (!blank($result)) {
            if ($result['status'] == 'Gagal') {
                return self::STATUS_FAILED;
            }else if ($result['status'] == 'Sukses') {
                return self::STATUS_SUCCESS;
            }else if ($result['status'] == 'Pending') {
                return self::STATUS_PROCESS;
            }
        }

        return self::STATUS_CANCEL;
    }

}
