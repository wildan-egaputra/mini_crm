<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Navbar Example</title>
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #2c2c2c;
            min-height: 100vh;
            justify-content: center;
            align-items: center;
            cursor: none;
            overflow: hidden;
        }
        .navbar {
            background-color: #bcbcbc;
            overflow: hidden;
            width: 700px;
            border-radius: 100px;
            margin-top: 250px;
            z-index: 9999;
            cursor: none;
            display: flex;
            justify-content: center;
            transition: scale 0.2s linear;
        }
        .navbar:hover {
            scale: 1.05;
        }
        .navbar a {
            float: left;
            display: block;
            color: rgb(0, 0, 0);
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
            cursor: none;
            z-index: 9999;
            transition: color 0.3s linear, transform 0.3s linear;
        }
        .navbar a:hover {
            transform: translateY(-5px);
            color: yellow;
        }
        .navbar a.active {
            background-color: #4CAF50;
            color: white;
        }
        .navbar a.logo {
            font-size: 16px;
        }
        .navbar-right {
            float: right;
            margin-left: 50px;
        }
        @media screen and (max-width: 600px) {
            .navbar a {
                float: none;
                display: block;
                text-align: left;
            }
            .navbar-right {
                float: none;
            }
        }
        .cursor-light {
            position: absolute;
            background-color: rgba(255, 255, 255, 0.171);
            width: 30px;
            height: 30px;
            border-radius: 50%;
            pointer-events: none;
            z-index: 9999;
            transition: transform 0.2s ease-out, opacity 0.2s ease-out;
            transform: translate(-50%, -50%);
            left: 0;
            top: 0;
            box-shadow: 0px 0px 10px 10px rgba(255, 255, 255, 0.171);
        }
        .tam {
            width: 80%;
            background-color: #ffffff;
            border-radius: 10px;
            height: 650px;
            margin-top: 30px;
            background-color: rgba(255, 255, 255, 0);
        }
        #text {
            font-size: 10em;
            margin-top: 30px;
            position: relative;
            color: #000000;
            cursor: default;
            z-index: -9999;
        }
        #light {
            position: absolute;
            transform: translate(-50%, -50%);
            width: 50px;
            height: 50px;
            background: linear-gradient(to bottom, yellow 0%, white 100%);
            z-index: -999;
            border-radius: 50%;
            box-shadow: 0px 0px 10px 10px rgba(255, 255, 255, 0.171),
                        0 0 50px #fff,
                        0 0 100px #fff,
                        0 0 200px #fff,
                        0 0 300px #fff;
        }
    </style>
</head>
<body>
    <center>
        <div class="tam">
            <div class="cursor-light"></div>
            <div style="padding: 20px;" class="text"></div>
            <div id="text">WELCOME</div>
            <div id="light"></div>
            <div class="navbar">
                <a href="employe/">Daftar Pegawai</a>
                <a href="companies/">Daftar Company</a>
                <a href="divisi/">Divisi</a>
                
                <div class="navbar-right">
                    <a href="#" id="logoutButton" class="logot"><i class='bx bx-log-out'></i></a>
                </div>
            </div>
        </div>
    </center>
    <script>
        document.addEventListener('mousemove', function(e) {
            const cursorLight = document.querySelector('.cursor-light');
            cursorLight.style.left = e.pageX + 'px';
            cursorLight.style.top = e.pageY + 'px';

            const light = document.getElementById('light');
            const text = document.getElementById('text');

            const mouseX = e.clientX;
            const mouseY = e.clientY;

            light.style.left = mouseX + 'px';
            light.style.top = mouseY + 'px';

            const distanceX = mouseX - text.offsetLeft - text.offsetWidth / 2;
            const distanceY = mouseY - text.offsetTop - text.offsetHeight / 2;

            let newShadow = '';
            for (let i = 0; i < 200; i++) {
                const shadowX = -distanceX * (i / 1000);
                const shadowY = -distanceY * (i / 1000);
                let opacity = 1 - (i / 100);
                newShadow += (newShadow ? ',' : '') + shadowX + 'px ' + shadowY + 'px 0 rgba(33, 33, 33,'+opacity+')';
            }
            text.style.textShadow = newShadow;
        });

        document.getElementById('logoutButton').addEventListener('click', function(event) {
            event.preventDefault();
            Swal.fire({
                title: 'Apakah Anda yakin?',
                text: "Anda akan Logout",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, logout!',
                cancelButtonText: 'Ngga jadi'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = '{{ url("logout") }}';
                }
            });
        });
    </script>
</body>
</html>
