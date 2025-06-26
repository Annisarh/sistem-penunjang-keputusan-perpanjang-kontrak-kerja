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
              <h4>Nilai</h4>
            </th>
            <th>
                <h4>Ranking</h4>
            </th>
            <th>
              <h4>Ranking</h4>
          </th>
          </tr>
        </thead>
        <tbody>
          @foreach ($sortedResults as $sortedResult)
          <tr>
            <td align="center">{{$sortedResult->code}}</td>
            <td>{{$sortedResult->name}}</td>
            <td align="center">{{$sortedResult->grade}}</td>
            <td align="center">{{$sortedResult->rank}}</td>
            <td align="center">{{$sortedResult->kondisi}}</td>
          </tr>
          @endforeach
        </tbody>
      </table>
      <div class="sign" style="margin-right: 70px; margin-top:20px;">
        <p style="text-align: right;">Mengetahui,</p>
        <br>
        <p style="text-align: right;">{{Auth()->user()->nama}}</p>
      </div>
    
   
</body>
</html>
