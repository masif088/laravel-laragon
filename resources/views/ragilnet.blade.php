<!doctype html>
<html lang="en" xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1" name="viewport">
    <title>Ragil.net</title>
    <link crossorigin="anonymous" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
          integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" rel="stylesheet">
    <link href="{{ asset('frontpage/style.css') }}" rel="stylesheet" type="text/css">
</head>
<body>
<nav class="navbar navbar-expand-lg fixed-top bg-body-tertiary">
    <div class="container-fluid ms-lg-5 me-lg-5">
        <button aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation" class="navbar-toggler"
                data-bs-target="#navbarTogglerDemo01" data-bs-toggle="collapse" type="button">
            <span class="navbar-toggler-icon"></span>
        </button>
        <a class="navbar-brand" href="#">
            <img alt="Bootstrap" style="width: 10rem" src="{{ asset('frontpage/Assets/RAGILNET%201.png') }}" >
        </a>

        <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <li class="nav-item ms-lg-5" style="font-size: 18px; color: dimgray">
                    <a class="nav-link" href="#paketlayanan">Paket</a>
                </li>
                <li class="nav-item ms-lg-5" style="font-size: 18px; color: dimgray">
                    <a class="nav-link" href="#bantuandandukungan">Bantuan & Dukungan</a>
                </li>
                <li class="nav-item ms-lg-5" style="font-size: 18px; color: dimgray">
                    <a class="nav-link" href="#lokasi">Lokasi</a>
                </li>
                <li class="nav-item ms-lg-5" style="font-size: 18px; color: dimgray">
                    <a href="{{ route('login') }}" style="background: darkred; " class="px-4 btn text-white">LOGIN</a>
                </li>
            </ul>
        </div>
    </div>
    </div>
</nav>
<br>
<br>

<h1 style="text-align: center; font-size:50px; margin-top: 100px"><b>Dapatkan Internet Terbaik di Rumahmu</b></h1>
<h1 style="text-align: center; color: darkred; font-size:50px"><b>Kami Memberikan Layanan Terbaik Untuk Anda</b></h1>
<div class="container">
    <div class="row">
        <div class="col align-middle">
            <div
                    class="row align-items-center "
                    style="min-height: 100%">
                <div ; class="col-md-12" style="font-family:.AppleSystemUIFont; font-size: 23px">
                    Era digital memberikan banyak kemudahan dalam beraktivitas sehari-hari, seperti meeting online,
                    upload download, tayangan live atau streaming.
                    <br>
                    <br>
                    Kualitas Internet yang baik di rumah menjadikan kenyamanan yang anda butuhkan untuk segala kegiatan
                    digital. Hal ini membuat kami memberikan layanan terbaik untuk anda.
                </div>
            </div>


        </div>
        <div class="col">
            <img alt="imageawal" src="{{asset('frontpage/Assets/Whats_App_Image_2022_03_21_at_15_55_18_7eedb3d357%201.png')}}"
                 style="float: right; width: 700px;">
        </div>
    </div>
</div>


<div class="container text-center">
    <h2 style="font-size:40px;">
        <b>Keunggulan Layanan Kami</b>
    </h2>
    <div class="row">
        <div class="col">
            <div class="box mx-auto">
                <img src="{{asset('frontpage/Assets/Reliable.png')}}">
                <div ; class="superiority" style="margin-top: 20px">Reliable</div>
                <div class="information">Ragil.net memiliki kecepatan internet yang stabil karena menggunakan
                    jaringan fiber
                </div>
            </div>
        </div>
        <div class="col">
            <div class="box mx-auto">
                <img src="{{asset('frontpage/Assets/insignia%202.png')}}">
                <div class="superiority">Avordable</div>
                <div class="information">Ragil.net menawarkan harga yang terjangkau dan kualitas yang stabil
                </div>
            </div>
        </div>
        <div class="col">
            <div class="box mx-auto">
                <img src="{{asset('frontpage/Assets/endless%201.png')}}">
                <div class="superiority">Unlimited</div>
                <div class="information">Ragil.net memberikan jaringan unlimited ke pengguna setiap bulannya
                </div>
            </div>
        </div>
    </div>
</div>

<div id="paketlayanan" style="width: 100%; margin: 0">
    <p style="text-align: center; font-size:40px; margin-top: 50px">
        <br>
        <b style="color: aliceblue">Paket Layanan yang Kami Tawarkan</b>
    </p>
    <div class="container text-center">


        <div class="row text-center">
            @foreach(\App\Models\Package::get() as $package)
            <div class="col">
                <div class="box1 mx-auto">
                    <p style="font-size: 25px; margin-top: 40px">Up To</p>
                    <div class="quota">{{ $package->title }}</div>
                    <div class="description">Download/Upload <br> Unlimited Quota</div>
                    <div class="prize">Rp. {{ thousand_format($package->price) }}</div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>

<div class="text-center" id="bantuandandukungan">
    <p style="text-align: center; color: black; text-align: center; font-size:60px; margin-top: 15rem"><b>Membutuhkan
        Layanan Kami?</b></p>
    <p style="text-align: center; color: black; text-align: center; font-size:30px; font-family: .AppleSystemUIFont; margin-top: 50px">
        Untuk mendapatkan respon cepat dari kami langsung saja menghubungi</p>
    <br>
    <div class="button">
        <a ; class="btn text-white" style="font-size: 30px"> <b>Hubungi Kami</b></a>
    </div>
    <div style="margin-bottom: 15rem">
    </div>
</div>

<div id="location">
    <div class="row">
        <div class="col-md-5 align-middle mb-4">
            <div class="row align-items-center "
                 style="min-height: 100%">
                <div class="col-md-12"
                     style="font-size: 60px; color: black; text-align: right; padding-right: 70px">
                    <b>Jangkauan</b>
                    <b>Area</b>
                    <b>Lokasi</b>
                    <br>
                    <img alt="Bootstrap" height="80" src="{{('frontpage/Assets/RAGILNET%201.png')}}" width="240">
                </div>
            </div>
        </div>
        <div class="col-md-7 box2">
            <div class="col mx-auto">
                <div class="box3"> Desa Wringinagung, Kecamatan kencong, Kabupaten Jember, Jawa Timur
                </div>
                <div class="box3"> Desa Wringinagung, Kecamatan kencong, Kabupaten Jember, Jawa Timur
                </div>
            </div>
        </div>
    </div>
</div>

<div class="footer" style="width: 100%; margin-top: 100px; padding: 50px">
    <div>
        <div class="row">
            <div class="col-md-6 align-middle">
                <iframe allowfullscreen=""
                         loading="lazy" referrerpolicy="no-referrer-when-downgrade" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15798.874529863344!2d113.72758165!3d-8.130101699999999!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd695720d02ed21%3A0xffc5ca507ca2b8a4!2sSEVENDREAM%20CITY!5e0!3m2!1sid!2sid!4v1695183164586!5m2!1sid!2sid"
                        style="border:0; width: 100%; height: 300px"
                        >
                </iframe>
                <p style="font-size: 25px"><b>Alamat Kami</b></p>
                <p style="margin-top: -10px; font-size: 20px">Dusun Pondok waluh, Desa Wringinagung, kencong, Jember, Jawa Timur</p>
            </div>
            <div class="col-md-3">
                <p style="font-size: 25px"><b>Butuh Bantuan</b></p>
                <p style="font-size: 22px"><b>Ragil.net</b></p>
                <br>
                <p style="font-size: 22px"><b>Hubungi Kami</b></p>
                <p style="margin-top: -10px; font-size: 20px">+62 812-3456-7890</p>
                <br>
                <p style="font-size: 22px"><b>Email</b></p>
                <p style="margin-top: -10px; font-size: 20px">abcdefgh@gmail.com</p>
            </div>
            <div class="col-md-3">
                <p style="font-size: 25px"><b>Ikuti Kami</b></p>
                <img src="{{ asset('frontpage/Assets/new-Instagram-logo-white-glyph%201.png') }}" style="float: left">

                <p style="padding-left: 10px"> &nbsp abcdefgh@gmail.com</p>
                <img src="{{ asset('frontpage/Assets/facebook-logo-png-white-facebook-logo-png-white-facebook-icon-png--32%201.png') }}"  style="float: left">
                <p>abcdefgh@gmail.com</p>
            </div>
        </div>
    </div>
</div>
<script crossorigin="anonymous"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
