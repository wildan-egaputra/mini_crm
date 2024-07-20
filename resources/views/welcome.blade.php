<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Login Permission</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

  <style>
    html, body {
      height: 100%;
      margin: 0;
      display: flex;
      justify-content: center;
      align-items: center;
      font-family: Arial, sans-serif;
      background-color: #7a7a7a;
      background-repeat: no-repeat;
      background-attachment: fixed;
    }

    .container {
      max-width: 500px;
      width: 80%;
      background: #ffffff45;
      border-radius: 10px;
      box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
      padding: 2rem;
      border: 2px solid gray;
      animation: fadeIn 1.2s ease;
    }

    @keyframes fadeIn {
      from {
        scale: 0;
      }

      to {
        opacity: 1;
      }
    }

    .logo {
      display: flex;
      align-items: center;
      justify-content: center;
      margin-bottom: 2rem;
    }

    .logo img {
      max-width: 50px;
    }

    .logo span {
      font-size: 1.5rem;
      font-weight: bold;
      color: #333;
      margin-left: 10px;
    }

    .card-title {
      font-size: 1.25rem;
      margin-bottom: 1rem;
    }

    .form-label {
      font-weight: bold;
      display: block;
      margin-bottom: 5px;
    }

    .form-check {
      display: flex;
      align-items: center;
    }

    .form-check input[type="checkbox"] {
      margin-right: 10px;
      width: 18px;
      height: 18px;
      cursor: pointer;
    }

    .btn-primary {
      background-color: #0069d9;
      border: none;
      transition: background-color 0.3s ease;
      width: 100%;
      margin-top: 5px;
      padding: 10px;
      border-radius: 100px;
    }

    .btn-primary:hover {
      background-color: #eeeeee;
      box-shadow: 0px 0px 5px 1px black;
      transition: box-shadow 0.2s ease, color 0.2s ease;
      color: #0069d9;
    }

    .form-check-label {
      font-size: 0.875rem;
    }

    .small {
      font-size: 0.875rem;
    }

    .credits {
      text-align: center;
      font-size: 0.875rem;
      margin-top: 1rem;
    }

    .credits a {
      color: #0069d9;
      text-decoration: none;
    }

    .credits a:hover {
      text-decoration: underline;
    }

    .back-to-top {
      position: fixed;
      bottom: 15px;
      right: 15px;
      background: #0069d9;
      color: #fff;
      border-radius: 50%;
      width: 40px;
      height: 40px;
      display: flex;
      align-items: center;
      justify-content: center;
      text-decoration: none;
      transition: background-color 0.3s ease;
    }

    .back-to-top:hover {
      background: #0056b3;
    }

    .back-to-top i {
      font-size: 1.25rem;
    }

    input {
      width: 100%;
      background-color: #eeeeee6b;
      border-radius: 100px;
      border: none;
      padding: 4px;
      margin-bottom: 10px;
    }

    input[type="submit"] {
      margin: 5px;
      border-radius: 100%;
      width: 100%;
    }

    .form-group {
      margin-bottom: 15px;
    }

    .form-group.center-text label {
      text-align: center;
      display: block;
      width: 100%;
    }

    .navbar {
      display: flex;
      justify-content: center;
      gap: 10px;
      margin-top: 20px;
    }

    .navbar a {
      display: inline-block;
      padding: 10px 20px;
      border-radius: 5px;
      background-color: #272727;
      color: white;
      text-align: center;
      text-decoration: none;
      transition: all 0.3s ease;
      animation: fadeInAnimation 0.9s ease;
    }

    .navbar a:hover {
      background-color: #ff9500;
      color: white;
      box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
    }

    .navbar a {
      text-transform: uppercase;
      letter-spacing: 1px;
      font-weight: bold;
    }

    .judul {
      font-size: 70px;
      color: rgb(255, 166, 0);
      font-weight: bold;
      animation: fadeInAnimation 0.9s ease;
    }

    @keyframes fadeInAnimation {
      from {
        scale: 0;
      }

      to {
        scale: 1;
      }
    }

    /* Tambahan untuk memperbagus border iframe */
    .iframe-container {
      position: relative;
      overflow: hidden;
      padding-top: 56.25%; /* 16:9 Aspect Ratio */
      margin-top: 20px;
    }

    .iframe-container iframe {
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      border: 5px solid #272727;
      border-radius: 10px;
      box-shadow: 0 4px 10px rgba(0, 0, 0, 0.3);
    }
  </style>
</head>

<body>
  <center>
    <p class="judul">MINI CRM</p>
    <main>
      <!-- Konten lain di sini -->
    </main>
    <!-- End #main -->
    @if (Route::has('login'))

    <nav class="navbar">
      @auth
      <a href="{{ route('dashboard') }}" class="nav-link">Masuk</a>
      @else
      <a href="{{ route('login') }}" class="nav-link">Log in</a>
      <a href="{{ route('register') }}" class="nav-link">Register</a>
      @endauth
    </nav>
    @endif

    <!-- Iframe container -->
  </center>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>
</body>

</html>
