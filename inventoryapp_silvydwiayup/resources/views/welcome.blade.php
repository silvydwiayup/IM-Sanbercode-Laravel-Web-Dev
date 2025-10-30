@extends('/home')
@section('header', 'welcome')
@section('bodyContent')

<h1>Selamat Datang, {{ $firstname }} {{ $lastname }}!</h1>
<h2>Terimakasih telah bergabung di Sanberbook. Social Media kita bersama!</h2>
@endsection