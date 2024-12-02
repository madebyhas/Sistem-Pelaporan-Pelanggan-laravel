<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"
        integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

    <title>Laporan Pelaporan Keluhan Layanan</title>

    <style>
        .report-box {
            max-width: auto;
            margin: auto;
            padding: 20px;
            font-size: 15px;
            line-height: 20px;
            color: black;
        }

        .report-box table {
            width: 100%;
            line-height: inherit;
            text-align: left;
        }

        .report-box table tr td:nth-child(2) {
            text-align: right;
        }
        
        .ttd {
            text-align: right;
        }

        .container {
            max-width: auto;
            margin: auto;
        }

        .container table {
            width: 100%;
            line-height: inherit;
            text-align: left;
            min-height: 200px;
        }
    </style>
</head>

<body>
    <div class="report-box">
        <div class="top">
            <table>
                <tr>
                    <td colspan="2">
                        <img src="{{ asset('images/logolokajayasm.png') }}" style="width: 65%;" />
                    </td>

                    <td>
                        <u>http://lokajaya-sm.co.id</u><br>
                        Kudus, Jawa Tengah,<br>
                        Indonesia.<br>
                    </td>
                </tr>
            </table>
            <hr style="size: 5px; color:black">
        </div>
    </div>


    <div class="text-center">
        <h4><u>Laporan Pelaporan Keluhan Layanan</u></h4>
    </div>
    <br>
    <br>
    <div class="container">
        <table class="table">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Instansi</th>
                    <th>Proyek</th>
                    <th>Tanggal</th>
                    <th>Isi Pelaporan</th>
                    <th>Petugas</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach($penindakan as $key => $value)
                <tr>
                    <td>{{ $key += 1 }}</td>
                    <td>{{ $value->keluhan->proyek->pelanggan->nama_instansi }}</td>
                    <td>{{ $value->keluhan->proyek->nama_proyek }}</td>
                    <td>{{ $value->keluhan->tgl_keluhan->format('d-M-Y') }}</td>
                    <td>{{ $value->keluhan->isi_keluhan }}</td>
                    <td>{{ $value->petugas->nama_petugas }}</td> 
                    <td>{{ $value->keluhan->status == '0' ? 'Selesai' : ucwords($value->keluhan->status) }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <br>
    <br>
    <br>
    <div class="ttd">
        <div class="kiri"></div>
        <div class="main">
            <div class="atas">
                <p>Kudus, {{ date('d-m-Y')}}</p>
                <p>Direktur</p>
            </div>
            <div class="sign mb-5">
            <br>
            </div>

            <div class="bawah">
                <p class="mb-4"><b>Soma Setiawan PN, S.Kom., M.Kom, MTA</b></p>
            </div>
        </div>
    </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous">
    </script>

</body>

</html>