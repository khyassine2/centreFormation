<!DOCTYPE html>
<html lang="en">

  <head>
    @include('header')
    <link rel="stylesheet" href="{{asset('input-file.css')}}">
    <script src="{{asset('input-file.min.js')}}"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.4.1/css/bootstrap.min.css" rel="stylesheet" />
    <link href="{{asset('assets2/css/fresh-bootstrap-table.css')}}" rel="stylesheet" />
    <link href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" rel="stylesheet">
    <link href="http://fonts.googleapis.com/css?family=Roboto:400,700,300" rel="stylesheet" type="text/css">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="TemplateMo">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900" rel="stylesheet">

    <title>AL KORB</title>

    <!-- Bootstrap core CSS -->
    <link href="{{asset('vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">


    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="{{asset('assets/css/fontawesome.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/templatemo-edu-meeting.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/owl.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/lightbox.css')}}">
<style>
  #contact select{
    width: 100%;
    height: 40px;
    border-radius: 20px;
    background-color: #f7f7f7;
    outline: none;
    border: none;
    box-shadow: none;
    font-size: 13px;
    font-weight: 500;
    color: #7a7a7a;
    padding: 0px 15px;
    margin-bottom: 30px;
  }
  .no-records-found td{
    color: aliceblue !important;
  }
  .nav>li>a:hover{
    background: none;
  }
</style>
  </head>

  <body style="background-image: url('../storage/bgus.jpg') !important;background-color: #1f262c !important;">
  @include('nav')
  @yield('main')
  @include('../fouter')
  @include('script')
</body>

</html>