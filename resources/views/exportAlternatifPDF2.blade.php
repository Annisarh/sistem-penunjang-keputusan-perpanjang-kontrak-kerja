<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Hasil Perhitungan SPK Salesman TOPSIS</title>
    <style>
      .header{
        padding: 5px;
        text-align: center;
        display: flex;
        /* border: 1px solid black; */
        justify-content: center;
        position: relative;
      }

      .header img{
        margin-right: 20px;
        /* border: 1px solid black; */
      }

      .header h5{
        
      }

      .header .isi {
        text-align: left;
        line-height: 5px;
        /* border: 1px solid black; */
      }
    </style>
</head>
<body>
  <div class="header">
    <img src="{{asset('Assets/images/logo-wuling1.jpg')}}" width="300" alt="" />
    <div class="isi">
      <h5>DEALER RESMI WULING</h5>
      <h2>PT. MAJU GLOBAL MOTOR</h2>
      <h5>Palembang, Padang, Jambi, Linggau, Pondok Gede, Karawaci, Ciputat</h5>
      <p>Jl. Prof. Dr. Hamka No.137A, Parupuk Tabing-Padang, Sumatera Barat</p>
      <p>TELP:0751-89722 11 / 0816-355 00 3</p>
    </div>
  </div>
  <p style="text-align: right; margin-right: 70px;">Tanggal : {{date('d-M-Y')}}</p>
  <hr style="border: 0px; height: 3px; color: #333; background-color:#333;">
    <h3 style="text-align: center">Data Hasil Perhitungan</h3>
      <table style="width: 90%; margin-right: auto; margin-left: auto; margin-top: 25px" border="1" cellpadding="2" cellspacing="0">
        <thead>
          <tr>
            <th>
              <h4>Kode Alternatif</h4>
            </th>
            <th>
              <h4>Nama Alternatif</h4>
            </th>
            <th>
              <h4>Posisi</h4>
            </th>
            <th>
                <h4>Tanggal Awal Kontrak</h4>
            </th>
            <th>
              <h4>Tanggal Akhir Kontrak</h4>
            </th>
          </tr>
        </thead>
        <tbody>
          @foreach ($alternatives as $alternative)
          <tr>
            <td>{{$alternative->kode}}</td>
            <td>{{$alternative->nama}}</td>
            <td>{{$alternative->posisi}}</td>
            <td>{{\Carbon\Carbon::parse($alternative->tglawal)->toFormattedDateString()}}</td>
            <td>{{\Carbon\Carbon::parse($alternative->tglakhir)->toFormattedDateString()}}</td>
          </tr>
          @endforeach
        </tbody>
      </table>
    <div class="footer" style="display: flex; justify-content: space-between">
      {{-- <div style="margin-top: 20px; text-align:center; margin-left:70px;"><a href="{{route('dowexportPdfAlternatives')}}">ExportPDF</a></div> --}}
      <div class="sign" style="margin-right: 70px; margin-top:20px;">
        <p style="text-align: right;">Padang, {{date('d-M-Y')}} </p>
        <br>
        <p style="text-align: right;">{{Auth()->user()->nama}}</p>
        {{-- <p style="text-align: right;">{{$nama}}</p> --}}
      </div>
    </div>
    
   
</body>
</html>
