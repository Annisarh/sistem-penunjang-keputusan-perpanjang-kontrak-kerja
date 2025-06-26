<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Hasil Perhitungan SPK Salesman TOPSIS</title>
    <style>
      .header{
        /* padding: 5px; */
        text-align: center;
        display: flex;
        /* border: 1px solid black; */
        justify-content: center;
        position: relative;
      }

      .header img{
        /* margin-right: 20px; */
        /* border: 1px solid black; */
        float: left;
      }

      .header h5{
        
      }

      .header .isi {
        text-align: left;
        line-height: 2px;
        /* border: 1px solid black; */
        width: 464px;
        float: right;
      }

      .content{
        margin-top: 125px;
      }
    </style>
</head>
<body>
  <div class="header">
    <img src="{{public_path('Assets\images\Logo-Wuling-MMG-1024x267.webp')}}" width="400" alt="" />
    <div class="isi">
      <h5>DEALER RESMI WULING</h5>
      <h2>PT. MAJU GLOBAL MOTOR</h2>
      <h5>Palembang, Padang, Jambi, Linggau, Pondok Gede, Karawaci, Ciputat</h5>
      <p>Jl. Prof. Dr. Hamka No.137A, Parupuk Tabing-Padang, Sumatera Barat</p>
      <p>TELP:0751-89722 11 / 0816-355 00 3</p>
    </div>
  </div>
  <div class="content">
    <p style="text-align: right;">Tanggal : {{\Carbon\Carbon::now()->translatedFormat('d F Y')}}</p>
    <hr style="border: 0px; height: 3px; color: #333; background-color:#333;">
      <h3 style="text-align: center">Laporan Alternatif</h3>
        <table style="width: 100%; margin-right: auto; margin-left: auto; margin-top: 25px" border="1" cellpadding="1" cellspacing="0">
          <thead style="text-align: center; font-weight: bold; font-size: 18px">
            <tr>
              <td>No</td>
              <td>
                Kode Alternatif
              </td>
              <td>
                Nama
              </td>
              <td>
                Posisi
              </td>
              <td>
                Tanggal Awal Kontrak
              </td>
              <td>
                Tanggal Akhir Kontrak
              </td>
            </tr>
          </thead>
          <tbody>
            @foreach ($alternatives as $alternative)
            <tr>
              <td align="center">{{$loop->iteration}}</td>
              <td style="text-align: center;">{{$alternative->kode}}</td>
              <td style="text-align: center;">{{$alternative->nama}}</td>
              <td style="text-align: center;">{{$alternative->posisi}}</td>
              <td style="text-align: center;">{{\Carbon\Carbon::parse($alternative->tglawal)->translatedFormat('d F Y')}}</td>
              <td style="text-align: center;">{{\Carbon\Carbon::parse($alternative->tglakhir)->translatedFormat('d F Y')}}</td>
            </tr>
            @endforeach
          </tbody>
        </table>
      <div class="footer" style="display: flex; justify-content: space-between">
        {{-- <div style="margin-top: 20px; text-align:center; margin-left:100px;"><a href="{{route('dowexportPdfAlternatives')}}">ExportPDF</a></div> --}}
        <div class="sign" style="">
          <p style="text-align: right;">Padang, {{\Carbon\Carbon::now()->translatedFormat('d F Y')}} </p>
          <p style="text-align: right;">Kepala Cabang</p>
          <br>
          {{-- <p style="text-align: right;">{{Auth()->user()->nama}}</p> --}}
          <p style="text-align: right;">{{$nama}}</p>
        </div>
      </div>
  </div>
  
    
   
</body>
</html>
