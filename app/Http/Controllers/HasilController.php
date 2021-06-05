<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HasilController extends Controller
{
    public function storeHasilUjian(Request $request)
    {
        $this->validate($request,[
            'hasil_id' => 'required',
            'tanggal' => 'required',
            'penyakit' => 'required',
            'gejala' => 'required',
            'hasil_id' => 'required',
            'hasil_nilai' => 'required',
        ]);
        http://cf.payahtidur.com/index.php?get=cf&noregister=NOREG-00040
        $soal_satuan = SoalSatuan::where('id',$request->soal_satuan_id)->first();
        $paket_soal_id = $soal_satuan->paket_soal_id;
        $semua_soal_satuan = SoalSatuan::where('paket_soal_id',$paket_soal_id)->get();
        $semua_soal_satuan->toArray();

        $soal_tk1_id = SoalTk1::where('soal_satuan_id',$request->soal_satuan_id)->value('id');
        $soal_tk2_id = SoalTk2::where('soal_satuan_id',$request->soal_satuan_id)->value('id');
        $soal_tk3_id = SoalTk3::where('soal_satuan_id',$request->soal_satuan_id)->value('id');
        $soal_tk4_id = SoalTk4::where('soal_satuan_id',$request->soal_satuan_id)->value('id');

        $hasil = hasi::where('soal_tk1_id',$soal_tk1_id)->where('peserta_ujian_id',$request->peserta_ujian_id)->first();
        
        if (!$jawaban_tk1) { $jawaban_tk1_kode = 0; $jawaban_tk1_id = null;} else {$jawaban_tk1_kode = $jawaban_tk1->kode; $jawaban_tk1_id = $jawaban_tk1->id; }
        if (!$jawaban_tk2) { $jawaban_tk2_kode = 0; $jawaban_tk2_id = null;} else {$jawaban_tk2_kode = $jawaban_tk2->kode; $jawaban_tk2_id = $jawaban_tk2->id;}
        if (!$jawaban_tk3) { $jawaban_tk3_kode = 0; $jawaban_tk3_id = null;} else {$jawaban_tk3_kode = $jawaban_tk3->kode; $jawaban_tk3_id = $jawaban_tk3->id;}
        if (!$jawaban_tk4) { $jawaban_tk4_kode = 0; $jawaban_tk4_id = null;} else {$jawaban_tk4_kode = $jawaban_tk4->kode; $jawaban_tk4_id = $jawaban_tk4->id;}

        if ($jawaban_tk1_kode == 1) {
            if ($jawaban_tk2_kode == 1) {
                if ($jawaban_tk3_kode == 1) {
                    if ($jawaban_tk4_kode == 1) {
                        $hasil = "SC";  $keterangan = "Scientific Conception" ;// 1111
                    } else {

                        $hasil = "LK";  $keterangan = "Lack of Knowledge" ;// 1110
                    }
                } else {
                    if ($jawaban_tk4_kode == 1) {
                        $hasil = "FP";  $keterangan = "False Positive" ;// 1101
                    } else {
                        $hasil = "LK";  $keterangan = "Lack of Knowledge" ;// 1100
                    }
                }
            } else {
                if ($jawaban_tk3_kode == 1) {
                    if ($jawaban_tk4_kode == 1) {
                        $hasil = "LK"; $keterangan = "Lack of Knowledge"; // 1011
                    } else {
                        $hasil = "LK";  $keterangan = "Lack of Knowledge"; // 1010
                    }
                } else {
                    if ($jawaban_tk4_kode == 1) {
                        $hasil = "LK";  $keterangan = "Lack of Knowledge" ;// 1001
                    } else {
                        $hasil = "LK";  $keterangan = "Lack of Knowledge"; // 1000
                    }
                }
            }
        } else {
            if ($jawaban_tk2_kode == 1) {
                if ($jawaban_tk3_kode == 1) {
                    if ($jawaban_tk4_kode == 1) {
                        $hasil = "FN";  $keterangan = "False Negative" ;// 0111
                    } else {
                        $hasil = "LK";  $keterangan = "Lack of Knowledge" ;// 0110
                    }
                } else {
                    if ($jawaban_tk4_kode == 1) {
                        foreach ($semua_soal_satuan as  $item) {
                            if ($semua_soal_satuan[0]['id'] == $request->soal_satuan_id) {
                                if ($jawaban_tk1->jawaban == 'B' && $jawaban_tk2->jawaban == 'A' && $jawaban_tk3->jawaban == 'A' && $jawaban_tk4->jawaban == 'A') {
                                    $miskonsepsi_id = 1;
                                    //M1
                                }elseif ($jawaban_tk1->jawaban == 'A' && $jawaban_tk2->jawaban == 'A' && $jawaban_tk3->jawaban == 'C' && $jawaban_tk4->jawaban == 'A') {
                                    $miskonsepsi_id = 2;
                                    //M2
                                }elseif ($jawaban_tk1->jawaban == 'C' && $jawaban_tk2->jawaban == 'A' && $jawaban_tk3->jawaban == 'B' && $jawaban_tk4->jawaban == 'A') {
                                    $miskonsepsi_id = 2;
                                    //M2
                                }

                            }elseif ($semua_soal_satuan[1]['id'] == $request->soal_satuan_id) {
                                if ($jawaban_tk1->jawaban == 'B' && $jawaban_tk2->jawaban == 'A' && $jawaban_tk3->jawaban == 'C' && $jawaban_tk4->jawaban == 'A') {
                                    $miskonsepsi_id = 3;
                                    //M3
                                }elseif ($jawaban_tk1->jawaban == 'A' && $jawaban_tk2->jawaban == 'A' && $jawaban_tk3->jawaban == 'B' && $jawaban_tk4->jawaban == 'A') {
                                    $miskonsepsi_id = 4;
                                    //M4
                                }elseif ($jawaban_tk1->jawaban == 'D' && $jawaban_tk2->jawaban == 'A' && $jawaban_tk3->jawaban == 'A' && $jawaban_tk4->jawaban == 'A') {
                                    $miskonsepsi_id = 4;
                                    //M4
                                }
                            }elseif ($semua_soal_satuan[2]['id'] == $request->soal_satuan_id) {
                                if ($jawaban_tk1->jawaban == 'C' && $jawaban_tk2->jawaban == 'A' && $jawaban_tk3->jawaban == 'C' && $jawaban_tk4->jawaban == 'A') {
                                    $miskonsepsi_id = 3;
                                    //M3
                                }elseif ($jawaban_tk1->jawaban == 'B' && $jawaban_tk2->jawaban == 'A' && $jawaban_tk3->jawaban == 'A' && $jawaban_tk4->jawaban == 'A') {
                                    $miskonsepsi_id = 4;
                                    //M4
                                }elseif ($jawaban_tk1->jawaban == 'A' && $jawaban_tk2->jawaban == 'A' && $jawaban_tk3->jawaban == 'A' && $jawaban_tk4->jawaban == 'A') {
                                    $miskonsepsi_id = 4;
                                    //M4
                                }
                            }elseif ($semua_soal_satuan[3]['id'] == $request->soal_satuan_id) {
                                if ($jawaban_tk1->jawaban == 'B' && $jawaban_tk2->jawaban == 'A' && $jawaban_tk3->jawaban == 'D' && $jawaban_tk4->jawaban == 'A') {
                                    $miskonsepsi_id = 5;
                                    //M5
                                }elseif ($jawaban_tk1->jawaban == 'D' && $jawaban_tk2->jawaban == 'A' && $jawaban_tk3->jawaban == 'C' && $jawaban_tk4->jawaban == 'A') {
                                    $miskonsepsi_id = 5;
                                    //M5
                                }elseif ($jawaban_tk1->jawaban == 'A' && $jawaban_tk2->jawaban == 'A' && $jawaban_tk3->jawaban == 'A' && $jawaban_tk4->jawaban == 'A') {
                                    $miskonsepsi_id = 6;
                                    //M6
                                }
                            }elseif ($semua_soal_satuan[4]['id'] == $request->soal_satuan_id) {
                                if ($jawaban_tk1->jawaban == 'B' && $jawaban_tk2->jawaban == 'A' && $jawaban_tk3->jawaban == 'C' && $jawaban_tk4->jawaban == 'A') {
                                    $miskonsepsi_id = 7;
                                    //M7
                                }elseif ($jawaban_tk1->jawaban == 'A' && $jawaban_tk2->jawaban == 'A' && $jawaban_tk3->jawaban == 'A' && $jawaban_tk4->jawaban == 'A') {
                                    $miskonsepsi_id = 7;
                                    //M7
                                }elseif ($jawaban_tk1->jawaban == 'D' && $jawaban_tk2->jawaban == 'A' && $jawaban_tk3->jawaban == 'B' && $jawaban_tk4->jawaban == 'A') {
                                    $miskonsepsi_id = 9;
                                    //M9
                                }
                            }elseif ($semua_soal_satuan[5]['id'] == $request->soal_satuan_id) {
                                if ($jawaban_tk1->jawaban == 'A' && $jawaban_tk2->jawaban == 'A' && $jawaban_tk3->jawaban == 'D' && $jawaban_tk4->jawaban == 'A') {
                                    $miskonsepsi_id = 8;
                                    //M8
                                }elseif ($jawaban_tk1->jawaban == 'B' && $jawaban_tk2->jawaban == 'A' && $jawaban_tk3->jawaban == 'B' && $jawaban_tk4->jawaban == 'A') {
                                    $miskonsepsi_id = 8;
                                    //M8
                                }elseif ($jawaban_tk1->jawaban == 'C' && $jawaban_tk2->jawaban == 'A' && $jawaban_tk3->jawaban == 'A' && $jawaban_tk4->jawaban == 'A') {
                                    $miskonsepsi_id = 8;
                                    //M8
                                }
                            }elseif ($semua_soal_satuan[6]['id'] == $request->soal_satuan_id) {
                                if ($jawaban_tk1->jawaban == 'A' && $jawaban_tk2->jawaban == 'A' && $jawaban_tk3->jawaban == 'B' && $jawaban_tk4->jawaban == 'A') {
                                    $miskonsepsi_id = 10;
                                    //M10
                                }elseif ($jawaban_tk1->jawaban == 'C' && $jawaban_tk2->jawaban == 'A' && $jawaban_tk3->jawaban == 'D' && $jawaban_tk4->jawaban == 'A') {
                                    $miskonsepsi_id = 10;
                                    //M10
                                }
                            }
                        }
                        $hasil = "MSC";  $keterangan = "Misconception" ;// 0101
                    } else {
                        $hasil = "LK";  $keterangan = "Lack of Knowledge" ;// 0100
                    }
                }
            } else {
                if ($jawaban_tk3_kode == 1) {
                    if ($jawaban_tk4->kode == 1) {
                        $hasil = "LK";  $keterangan = "Lack of Knowledge"; // 0011
                    } else {
                        $hasil = "LK";  $keterangan = "Lack of Knowledge"; // 0010
                    }
                } else {
                    if ($jawaban_tk4_kode == 1) {
                        $hasil = "LK";  $keterangan = "Lack of Knowledge"; // 0001
                    } else {
                        $hasil = "LK";  $keterangan = "Lack of Knowledge" ;// 0000
                    }
                }
            }
        }

        $check_hasil = HasilUjian::where('peserta_ujian_id', $request->peserta_ujian_id)
                        ->where('soal_satuan_id', $request->soal_satuan_id)->first();
        if (!isset($miskonsepsi_id)) {
            $miskonsepsi_id = null;
        }
        if (!$check_hasil) {
            $posts = HasilUjian::create([
                'peserta_ujian_id' => $request->peserta_ujian_id,
                'soal_satuan_id' => $request->soal_satuan_id,
                'jawaban_tk1_id' => $jawaban_tk1_id,
                'jawaban_tk2_id' => $jawaban_tk2_id,
                'jawaban_tk3_id' => $jawaban_tk3_id,
                'jawaban_tk4_id' => $jawaban_tk4_id,
                'hasil' => $hasil,
                'keterangan' => $keterangan,
                'miskonsepsi_id' => $miskonsepsi_id
            ]);

        } elseif ($check_hasil) {
            $update_hasil_ujian = [
                'peserta_ujian_id' => $request->peserta_ujian_id,
                'soal_satuan_id' => $request->soal_satuan_id,
                'jawaban_tk1_id' => $jawaban_tk1_id,
                'jawaban_tk2_id' => $jawaban_tk2_id,
                'jawaban_tk3_id' => $jawaban_tk3_id,
                'jawaban_tk4_id' => $jawaban_tk4_id,
                'hasil' => $hasil,
                'keterangan' => $keterangan,
                'miskonsepsi_id' => $miskonsepsi_id
            ];
        $posts = HasilUjian::where('peserta_ujian_id', $request->peserta_ujian_id)
                ->where('soal_satuan_id', $request->soal_satuan_id)->update($update_hasil_ujian);
        }
        return response()->json($posts);
    }
}
