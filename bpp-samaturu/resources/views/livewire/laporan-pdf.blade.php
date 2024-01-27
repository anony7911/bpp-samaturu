<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>
        Laporan {{ $tanggal_mulai }} - {{ $tanggal_selesai }}
    </title>


    <style>
        @page {
            margin-top: 30px;
            margin-left: 30px;
            margin-right: 30px;
            margin-bottom: 30px;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif, Helvetica, Arial, sans-serif;
        }

        table.bordered {
            border-collapse: collapse;
        }

        table.bordered thead,
        table.bordered body,
        table.bordered tr,
        table.bordered td,
        table.bordered th {
            /* border: 1px solid black; */
            border-top: solid 1px black;
            border-left: solid 1px black;
            border-right: solid 1px black;
            border-bottom: solid 1px black;
        }

        th,
        td {
            padding: 5px;
        }

        .row {
            --bs-gutter-x: 1.5rem;
            --bs-gutter-y: 0;
            display: flex;
            flex-wrap: wrap;
            margin-top: calc(-1 * var(--bs-gutter-y));
            margin-right: calc(-0.5 * var(--bs-gutter-x));
            margin-left: calc(-0.5 * var(--bs-gutter-x));
        }

        .row>* {
            flex-shrink: 0;
            width: 100%;
            max-width: 100%;
            padding-right: calc(var(--bs-gutter-x) * 0.5);
            padding-left: calc(var(--bs-gutter-x) * 0.5);
            margin-top: var(--bs-gutter-y);
        }

        .col {
            flex: 1 0 0%;
        }

        .text-center {
            text-align: center;
        }

        .check {
            width: 20px;
            height: 20px;
            display: inline-block;
            position: relative;
        }

        .check:before {
            content: "";
            position: absolute;
            top: 4px;
            left: 6px;
            width: 4px;
            height: 10px;
            border-bottom: 2px solid black;
            border-right: 2px solid black;
            transform: rotate(45deg);
        }
    </style>
</head>

<body>
    <div style="margin-left:70px;margin-right:40px">
        <table style="border-bottom: solid 1px black">
            <th style="vertical-align: middle">
                <!-- <img src="{{ asset('/assets/img/kolaka.png') }}" alt="logo-kolaka" style="width: 80px"> -->
                <img src="{{ asset('/assets/bpp.png') }}" alt="bpp" style="width: 100px">
            </th>
            <th colspan="2" style="text-align: center;vertical-align: middle">
                <h3 style="margin-top:3px;margin-bottom:5px;font-weight:bold;font-size:15px;">PEMERINTAH KABUPATEN KOLAKA</h3>
                <h2 style="margin-top:5px;margin-bottom:5px">BALAI PENYULUHAN PERTANIAN</h2>
                <h2 style="margin-top:5px;margin-bottom:5px">KECAMATAN SAMATURU</h2>
                <p style="margin-top:3px;margin-bottom:5px;font-size:12px;font-weight:normal;"> Desa Kaloloa Kec. Samaturu Kab. Kolaka</p>
                <p style="margin-top:3px;margin-bottom:5px;font-size:12px;font-weight:normal;"> email :bppsamaturu@gmail.com</p>
            </th>
            <th style="vertical-align: middle">
                <img src="{{ asset('/assets/kolaka.png') }}" alt="logo-kolaka" style="width: 90px">
            </th>
        </table>
        <table style="width: 100%;text-align:center">
            <h5 style="margin-top:5px;margin-bottom:5px">DATA PEMILIHAN PESTISIDA</h5>
            <h5 style="margin-top:5px;margin-bottom:5px">{{ Carbon\Carbon::parse($tanggal_mulai)->isoFormat('D MMMM Y') }} - {{ Carbon\Carbon::parse($tanggal_selesai)->isoFormat('D MMMM Y') }}</h5>
        </table>
        <br>

        <table class="bordered" style="width: 100%; margin-top:5px;font-size:11px">
            <thead>
                <tr style="text-align: center; font-weight:bold">
                    <th style="text-align: center">No</th>
                    <th style="text-align: center">Kelompok Tani</th>
                    <th style="text-align: center">Nama Pestisida</th>
                    <th style="text-align: center">Diperbaharui</th>
                </tr>
            </thead>
            <tbody>
                @forelse($laporan as $t)
                <tr>
                    <td style="text-align: center">{{ $loop->iteration }}</td>
                    <td style="text-align: center">{{ $t->nama_petani }}</td>
                    <td style="text-align: center">{{ $t->nama_alternatif }}</td>
                    <td style="text-align: center">{{ Carbon\Carbon::parse($t->created_at)->isoFormat('D MMMM Y') }}</td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" style="text-align: center">Belum ada data.</td>
                </tr>
                @endforelse
            </tbody>
        </table>

        <table style="width: 100%; margin-top:15px;font-size:13px;page-break-inside: avoid;">
            <tr>
                <td></td>
                <td style="text-align: right">Samaturu, {{ Carbon\Carbon::now()->isoFormat('D MMMM Y') }}</td>
            </tr>
            <tr>
                <td style="text-align: center">
                </td>
                <td style="text-align: right">
                    Kepala BPP Kec. Samaturu
                    <br><br>
                    <br><br>
                    <b> Kepala BPP Kec. Samaturu</b>
                </td>
            </tr>
        </table>
    </div>
</body>

</html>
