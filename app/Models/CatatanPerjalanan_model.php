<?php

namespace App\Models;

class CatatanPerjalanan_model extends BaseModel  {
    public static function tambah($tanggal,$waktu,$lokasi,$suhu,$nik) {
        $data = BaseModel::csvFileToJson("catatan_perjalanan.csv");
        file_put_contents("catatan_perjalanan.csv","\r\n".$tanggal.",".$waktu.",".$lokasi.",".$suhu.",".$nik,FILE_APPEND);
        return true;
    }

    public static function getAll() {
        $data = BaseModel::csvFileToJson("catatan_perjalanan.csv");
        return $data;
    }

    public static function getByNIK($nik) {
        $data = BaseModel::csvFileToJson("catatan_perjalanan.csv");
        $userdata = [];
        foreach ($data as $k=>$v) {
            if ($v["nik"] == $nik) {
                array_push($userdata, $v);
            }
        }

        return $userdata;
    }
}