<!doctype html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        .page-break {
            page-break-after: always;
        }
        .check.icon {
            color: #000;
            position: relative;
            /*margin-left: 3px;*/
            /*margin-top: 4px;*/
            margin: 0 auto 3px;
            width: 14px;
            height: 8px;
            border-bottom: solid 1.5px currentColor;
            border-left: solid 1.5px currentColor;
            -webkit-transform: rotate(-45deg);
            transform: rotate(-45deg);
        }


    </style>
</head>
<body>
    <div style="background-image: url({{ public_path('img/logo.png') }}); height: 150px; width: 150px; background-repeat: no-repeat;
        background-size: contain; margin: 150px auto -50px;"></div>
    <h1 style="text-align: center; font-size: 24px; font-weight: bold;">LAPORAN <br>PERKEMBANGAN ANAK DIDIK <br>KELOMPOK BERMAIN</h1>
    <br>
    <h2 style="text-align: center; font-size: 24px; font-weight: bold;">KB PAUD JATENG</h2>
    <h3 style="text-align: center; font-size: 18px; font-weight: lighter; margin-top: -20px">KEL. KALIWIRU - KEC. SEMARANG TENGAH - KOTA SEMARANG</h3>
    <h2 style="text-align: center; font-size: 18px; font-weight: bold;">TERDAFTAR</h2>
    <br>
    <br>
    <h1 style="text-align: center; font-size: 40px; font-weight: bold;">RAPORT PAUD</h1>
    <h1 style="text-align: center; font-size: 30px; font-weight: bold; margin-top: -20px">TAHUN AJARAN {{ \App\Models\PeriodSetting::getActivePeriod() }}</h1>
    <br>
    <div style="width: 400px; border: 3px solid black; margin: auto; border-radius: 15px">
        <h1 style="text-align: center; font-size: 24px; padding: 10px 0">{{ $student->name }} <br>{{ $student->nik }}</h1>
    </div>
    <div class="page-break"></div>
    <h1 style="text-align: center; font-size: 20px; font-weight: bold">PETUNJUK</h1>
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
            margin-top: -40px;
            width: 100%;
        }
    </style>
    <table class="table-header">
        <tr>
            <td>
                <div style="width: 100px; height: 100px; border: 1px solid black"> logo</div>
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
    <style>
        .table-assessment, .table-assessment td, .table-assessment th {
            border: 1px solid black;
        }
        .table-assessment {
            border-collapse: collapse;
        }
        .table-assessment td, .table-assessment th {
            width: 100%;
        }

    </style>
    <table class="table-assessment">
        <tr>
            <th rowspan="2" style="width: 20px">NO</th>
            <th rowspan="2" colspan="3">ASPEK PERKEMBANGAN</th>
            <th colspan="3" >HASIL PENILAIAN</th>
        </tr>
        <tr>
            <th style="width: 80px">BAIK</th>
            <th style="width: 80px">CUKUP</th>
            <th style="width: 150px">PERLU DILATIH</th>
        </tr>
{{--        <tr>--}}
{{--            <td style="width: 20px; text-align: center">I</td>--}}
{{--            <td colspan="3">NILAI-NILAI AGAMA DAN MORAL</td>--}}
{{--            <td>5</td>--}}
{{--            <td>6</td>--}}
{{--            <td>7</td>--}}
{{--        </tr>--}}
{{--        <tr>--}}
{{--            <td rowspan="2"></td>--}}
{{--            <td style="width: 20px; text-align: center">1</td>--}}
{{--            <td colspan="2">Mengetahui agama yang dianutnya</td>--}}
{{--            <td>5</td>--}}
{{--            <td><img src="https://img.icons8.com/external-becris-lineal-becris/20/000000/external-check-mintab-for-ios-becris-lineal-becris-1.png" alt=""/></td>--}}
{{--            <td>6</td>--}}
{{--            <td>7</td>--}}
{{--        </tr>--}}
{{--        <tr>--}}
{{--            <td style="width: 20px; text-align: center">2</td>--}}
{{--            <td colspan="2">Meniru gerakan beribadah dengan urutan yang benar</td>--}}
{{--            <td>5</td>--}}
{{--            <td>6</td>--}}
{{--            <td>7</td>--}}
{{--        </tr>--}}
{{--        <tr>--}}
{{--            <td style="width: 20px; text-align: center">II</td>--}}
{{--            <td colspan="3">FISIK MOTORIK</td>--}}
{{--            <td>5</td>--}}
{{--            <td>6</td>--}}
{{--            <td>7</td>--}}
{{--        </tr>--}}
{{--        <tr>--}}
{{--            <td rowspan="6"></td>--}}
{{--            <td style="width: 20px; text-align: center">1</td>--}}
{{--            <td colspan="2">Motorik Kasar</td>--}}
{{--            <td>5</td>--}}
{{--            <td>6</td>--}}
{{--            <td>7</td>--}}
{{--        </tr>--}}
{{--        <tr>--}}
{{--            <td rowspan="2"></td>--}}
{{--            <td style="width: 20px; text-align: center">-</td>--}}
{{--            <td>Menirukan gerakan binatang, pohon tertiup angin,--}}
{{--                pesawat terbang, dsb</td>--}}
{{--            <td>5</td>--}}
{{--            <td>6</td>--}}
{{--            <td>7</td>--}}
{{--        </tr>--}}
{{--        <tr>--}}
{{--            <td style="width: 20px; text-align: center">-</td>--}}
{{--            <td>Melakukan gerakan menggantung (bergelayut)</td>--}}
{{--            <td>5</td>--}}
{{--            <td>6</td>--}}
{{--            <td>7</td>--}}
{{--        </tr>--}}
{{--        <tr>--}}
{{--            <td style="width: 20px; text-align: center">2</td>--}}
{{--            <td colspan="2">Motorik Halus</td>--}}
{{--            <td>5</td>--}}
{{--            <td>6</td>--}}
{{--            <td>7</td>--}}
{{--        </tr>--}}
{{--        <tr>--}}
{{--            <td rowspan="2"></td>--}}
{{--            <td style="width: 20px; text-align: center">-</td>--}}
{{--            <td>Menirukan gerakan binatang, pohon tertiup angin,--}}
{{--                pesawat terbang, dsb</td>--}}
{{--            <td>5</td>--}}
{{--            <td>6</td>--}}
{{--            <td>7</td>--}}
{{--        </tr>--}}
{{--        <tr>--}}
{{--            <td style="width: 20px; text-align: center">-</td>--}}
{{--            <td>Menirukan gerakan binatang, pohon tertiup angin,--}}
{{--                pesawat terbang, dsb</td>--}}
{{--            <td>5</td>--}}
{{--            <td>6</td>--}}
{{--            <td>7</td>--}}
{{--        </tr>--}}
        @foreach($data as $category => $child)
            <tr>
                <td style="width: 20px; text-align: center">{{ App\Helpers\Helper::numberToRomanRepresentation($loop->iteration) }}</td>
                <td colspan="3">{{ $category }}</td>
                <td></td>
                <td></td>
                <td></td>
            </tr>

            @php
              $total_child2 = 0;
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

    </table>
</body>
</html>
