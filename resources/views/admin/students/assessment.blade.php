<!doctype html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        .check.icon {
            color: #000;
            position: relative;
            margin: 0 auto 3px;
            width: 14px;
            height: 8px;
            border-bottom: solid 1.5px currentColor;
            border-left: solid 1.5px currentColor;
            -webkit-transform: rotate(-45deg);
            transform: rotate(-45deg);
        }

        .table-assessment, .table-assessment td, .table-assessment th {
            border: 1px solid black;
        }

        .table-assessment {
            border-collapse: collapse;
        }

        @media print {
            .page-break {
                page-break-after: always;
            }

        }

    </style>
</head>
<body>
<img src="{{ url('img/logo.png') }}" alt="" style="display: block; margin: 100px auto 50px;width: 150px">
<h1 style="text-align: center; font-size: 24px; font-weight: bold;">LAPORAN <br>PERKEMBANGAN ANAK DIDIK <br>KELOMPOK
    BERMAIN</h1>
<br>
<h2 style="text-align: center; font-size: 24px; font-weight: bold;">KB PAUD JATENG</h2>
<h3 style="text-align: center; font-size: 18px; font-weight: lighter; margin-top: -20px">KEL. KALIWIRU - KEC. SEMARANG
    TENGAH - KOTA SEMARANG</h3>
<h2 style="text-align: center; font-size: 18px; font-weight: bold;">TERDAFTAR</h2>
<br>
<br>
<h1 style="text-align: center; font-size: 40px; font-weight: bold;">RAPORT PAUD</h1>
<h1 style="text-align: center; font-size: 30px; font-weight: bold; margin-top: -20px">TAHUN
    AJARAN {{ \App\Models\PeriodSetting::getActivePeriod() }}</h1>
<br>
<div style="width: 400px; border: 3px solid black; margin: auto; border-radius: 15px">
    <h1 style="text-align: center; font-size: 24px; padding: 10px 0">{{ $student->name }} <br>{{ $student->nik }}</h1>
</div>
<div class="page-break"></div>
<h1 style="text-align: center; font-size: 20px; font-weight: bold; margin-top: 100px">PETUNJUK</h1>
<ol style="font-size: 18px; line-height: 32px; margin: 30px 60px">
    <li>
        Buku Raport PAUD dalam bentuk Laporan Perkembangan Anak
        Didik ini dipergunakan selama anak mengikuti pendidikan di
        sekolah KB PAUD JATENG SEMARANG
    </li>
    <li>
        Buku Raport PAUD Anak Didik ini diisi oleh wali kelas berkoordinasi
        dengan guru pendidik
    </li>
    <li>
        Buku Raport PAUD dilengkapi dengan pas foto ukuran 3 x 4 cm
        yang dipasang pada lembar idenitas siswa
    </li>
    <li>
        Buku Raport PAUD diberikan secara kualitatif dalam bentuk uraian
        (deskripsi) yang dikelompokkan dalam Standar Tingkat Pencapaian
        Program mengacu Peraturan Menteri Pendidikan dan Kebudayaan
        yang berlaku
    </li>
    <li>
        Penilaian dilakukan berdasarkan dengan kelompok usia
        perkembangan anak
    </li>
    <li>
        Penilaian tersebut dilakukan dengan menggunakan teknik-teknik
        penilaian yang berlaku di PAUD secara terus menerus
    </li>
</ol>
<div class="page-break"></div>
<style>
    .table-header {
        width: 100%;
        margin-top: -40px;
    }
</style>
<table class="table-header">
    <tr>
        <td>
            <img src="{{ url('img/logo.png') }}" alt="" style="width: 100%;">
        </td>
        <td style="text-align: center">
            <p style="font-size: 20px; font-weight: lighter;">YAYASAN PENGELOLA PENDIDIKAN BERMAIN</p>
            <p style="font-size: 20px; font-weight: bold; margin-top: -20px">KB PAUD JATENG SEMARANG</p>
            <p style="margin-top: -20px">Kelurahan Kaliwiru Kecamatan Semarang Tengah 50132
                <br>
                Jl. Pemuda No. 138 HP 08123456xxx
                <br>
                Email : paudjateng@yahoo.com - Website : http://paudjateng.xahzgs.com</p>
        </td>
    </tr>
</table>
<div style="border: 1px solid #1f1f1f;"></div>
<div style="border: 2px solid black; margin-top: 2px;"></div>
<p style="text-align: center; font-size: 20px; font-weight: bold;">PERKEMBANGAN ANAK DIDIK <br>
    USIA 4 - 5 TAHUN</p>
<br>
<table>
    <tr>
        <td>NAMA ANAK</td>
        <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: {{ $student->name }}</td>
    </tr>
    <tr>
        <td>NOMOR INDUK</td>
        <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: {{ $student->nik }}</td>
    </tr>
    <tr>
        <td>BERAT BADAN</td>
        <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: {{ $student->weight }}KG</td>
    </tr>
    <tr>
        <td>TINGGI BADAN</td>
        <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: {{ $student->height }}CM</td>
    </tr>
</table>
<br>
<table class="table-assessment">
    <thead style="background: #eaeaea">
    <tr>
        <th rowspan="2" style="width: 20px">NO</th>
        <th rowspan="2" colspan="3">ASPEK PERKEMBANGAN</th>
        <th colspan="3">HASIL PENILAIAN</th>
    </tr>
    <tr>
        <th style="width: 80px">BAIK</th>
        <th style="width: 80px">CUKUP</th>
        <th style="width: 150px">PERLU DILATIH</th>
    </tr>
    </thead>
    @php
        $number = 0;
    @endphp
    @foreach($data as $category => $child)
        <tr>
            <td style="width: 20px; text-align: center; font-weight: bold">{{ App\Helpers\Helper::numberToRomanRepresentation($loop->iteration) }}</td>
            <td colspan="3" style="font-weight: bold">{{ $category }}</td>
            <td></td>
            <td></td>
            <td></td>
        </tr>

        @php
            $total_child2 = 0;
            $number += $loop->iteration;

        @endphp
        @foreach($child as $subcategory => $child2)
            @php
                $total_child2 += count($child2) + 1;
            @endphp
        @endforeach
        @foreach($child as $subcategory => $child2)
            @if(!is_string($subcategory))
                @if($loop->first)
                    <tr>
                        <td rowspan="{{ count($child) }}"></td>
                        <td style="width: 20px; text-align: center">{{ $loop->iteration }}</td>
                        <td colspan="2">{{ $child2['aspect'] }}</td>
                        {!! \App\Helpers\Helper::renderResultAssessment($child2['value']) !!}
                    </tr>
                @else
                    <tr>
                        <td style="width: 20px; text-align: center">{{ $loop->iteration }}</td>
                        <td colspan="2">{{ $child2['aspect'] }}</td>
                        {!! \App\Helpers\Helper::renderResultAssessment($child2['value']) !!}
                    </tr>
                @endif
            @else
                @php

                    @endphp
                @if($loop->first)
                    <tr>
                        <td rowspan="{{ $total_child2 }}"></td>
                        <td style="width: 20px; text-align: center">{{ $loop->iteration }}</td>
                        <td colspan="2">{{ $subcategory }}</td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    @foreach($child2 as $item)
                        @if($loop->first)
                            <tr>
                                <td rowspan="{{ count($child2) }}"></td>
                                <td style="width: 20px; text-align: center">-</td>
                                <td>{{ $item['aspect'] }}</td>
                                {!! \App\Helpers\Helper::renderResultAssessment($item['value']) !!}
                            </tr>
                        @else
                            <tr>
                                <td style="width: 20px; text-align: center">-</td>
                                <td>{{ $item['aspect'] }}</td>
                                {!! \App\Helpers\Helper::renderResultAssessment($item['value']) !!}
                            </tr>
                        @endif
                    @endforeach
                @else
                    <tr>
                        <td style="width: 20px; text-align: center">{{ $loop->iteration }}</td>
                        <td colspan="2">{{ $subcategory }}</td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    @foreach($child2 as $item)
                        @if($loop->first)
                            <tr>
                                <td rowspan="{{ count($child2) }}"></td>
                                <td style="width: 20px; text-align: center">-</td>
                                <td>{{ $item['aspect'] }}</td>
                                {!! \App\Helpers\Helper::renderResultAssessment($item['value']) !!}
                            </tr>
                        @else
                            <tr>
                                <td style="width: 20px; text-align: center">-</td>
                                <td>{{ $item['aspect'] }}</td>
                                {!! \App\Helpers\Helper::renderResultAssessment($item['value']) !!}
                            </tr>
                        @endif
                    @endforeach
                @endif
            @endif
        @endforeach
    @endforeach
    <tr>
        <td style="width: 20px; text-align: center; font-weight: bold">{{ App\Helpers\Helper::numberToRomanRepresentation($number + 1) }}</td>
        <td colspan="6" style="font-weight: bold">KESIMPULAN PERKEMBANGAN ANAK</td>
    </tr>
    <tr>
        <td style="width: 20px; text-align: center; "></td>
        <td colspan="6">
            <ul style="list-style: circle">
                <li>Tingkat Pencapaian Perkembangan BAIK{!! str_repeat("&nbsp;", 22) !!}: {{ $baik }}/{{ $total_data }}
                    ( {{ !empty($baik) && !empty($total_data) ? number_format($baik/$total_data*100, 2) : '0' }}% )
                </li>
                <li>Tingkat Pencapaian Perkembangan CUKUP{!! str_repeat("&nbsp;", 18) !!}: {{ $cukup }}
                    /{{ $total_data }} ( {{ !empty($cukup) && !empty($total_data) ? number_format($cukup/$total_data*100, 2) : '0' }}% )
                </li>
                <li>Tingkat Pencapaian Perkembangan PERLU DILATIH{!! str_repeat("&nbsp;", 2) !!}: {{ $perlu_dilatih }}
                    /{{ $total_data }}
                    ( {{ !empty($perlu_dilatih) && !empty($total_data) ? number_format($perlu_dilatih/$total_data*100, 2) : '0' }}% )
                </li>
            </ul>
            <p>Deskripsi :<br>Perkembangan dicapai maksimal test kesimpulan 1 untuk usia 4-5 tahun</p>
        </td>
    </tr>
    @if(count($student->noteAssessments) > 0)
    <tr>
        <td style="width: 20px; text-align: center; font-weight: bold">{{ App\Helpers\Helper::numberToRomanRepresentation($number + 2) }}</td>
        <td colspan="6" style="font-weight: bold">CATATAN DAN REKOMENDASI PENDIDIK</td>
    </tr>
    <tr>
        <td style="width: 20px; text-align: center; "></td>
        <td colspan="6">
            @foreach($student->noteAssessments as $note)
                {!! $note->note !!}
            @endforeach
        </td>
    </tr>
    @endif
</table>
<br><br><br><br>
<table style="width: 100%">
    <tr>
        <td style="text-align: center">Mengetahui, <br>Kepala Sekolah</td>
        <td style="text-align: center">
            Semarang, {{ \Illuminate\Support\Carbon::now()->locale('id')->format('d M Y') }}</td>
    </tr>
    {!! str_repeat("<tr><td></td><td></td></tr>", 20) !!}
    <tr>
        <td style="text-align: center; font-weight: bold; text-decoration: underline;text-transform: capitalize">
            NURKHIKMAH UMAMI, S.Psi
        </td>
        <td style="text-align: center; font-weight: bold; text-decoration: underline;text-transform: capitalize">META
            NUGRAHENI, S.Pd.AUD
        </td>
    </tr>
</table>
<script>
    window.print();
</script>
</body>
</html>
