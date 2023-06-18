<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="assets/style.css">
    <link rel="shortcut icon" href="sushi.png" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            text-decoration: none;
            font-family: 'Poppins', sans-serif;
        }

        body {
            background: #1d232b;
            overflow-x: hidden;
        }

        /* Start Sidebar CSS */

        .sidebar {
            position: fixed;
            top: 0;
            left: 0;
            height: 100vh;
            width: 100px;
            background-color: #12171e;
            transform: all 0.5s ease;

        }

        .logo {

            width: 60px;
            height: auto;
            margin: 20px 10px 0 10px;
        }

        .logo-title {
            font-weight: 700;
            font-size: 17px;
            color: #23832f;
            margin: 5px;
            margin-top: 20px;
            margin-bottom: 0;
            cursor: default;
        }

        .sidebar ul,
        .sidebar ul li {
            list-style-type: none;
            height: 50px;
            font-size: 27px;
            margin: 40px 0 0 2px;
            display: flex;
            align-items: left;
            flex-direction: column;
        }

        .sidebar ul {
            margin-top: 4rem;
        }

        .menu-link {
            color: #23832f;
        }

        .menu-link:hover {
            color: #41ed58;
        }

        .menu-link.active {
            color: #41ed58;
        }

        .logout {
            position: absolute;
            bottom: 0;
            margin-bottom: 10px;
        }

        /* End Sidebar CSS */

        /* Start Content Admin CSS */
        #content {
            width: 93%;
            height: auto;
            margin-left: 100px;
            color: aliceblue;
        }

        .top-pesan {
            background: #1d232b;
            width: 93%;
            position: fixed;
            top: 0;
        }

        .top-pesan p {
            background: #12171e;
            padding: 8px;
            text-align: center;
            margin: 1rem 2rem 1rem 2rem;
            border-radius: 10px;
            height: 50px;
            font-weight: 600;
            font-size: 1.3rem;
            display: block;
        }

        .table-pesan {
            text-align: center;
            width: 95.5%;
            height: 63vh;
            overflow-x: hidden;
            overflow-y: auto;
            background: #12171e;
            display: flex;
            margin: -25px 0 0 2rem;
            border-radius: 15px;
            padding: 15px;
        }

        .table-MenuTable {
            text-align: center;
            width: 95.5%;
            height: auto;
            background: #12171e;
            display: flex;
            margin: 10rem 0 0 2rem;
            border-radius: 15px;
            padding: 15px;
        }

        .table tr,
        .table td {
            color: white;
        }

        .add-btn {
            background: #1d232b;
            width: 93%;
            position: fixed;
            top: 10%;
        }

        .btn-add {
            display: flex;
            float: right;
            border: 2px solid white;
            border-radius: 5px;
            background: #12171e;
            padding: 8px;
            text-decoration: none;
            color: white;
            font-size: 15px;
            font-weight: bolder;
            margin: 1rem 2rem 1rem 1rem;
        }

        .btn-add:hover {
            color: #23832f;
            border: 2px solid #23832f;
            transition: all ease-in 0.2s;
        }

        /* End Content CSS */
    </style>
</head>

<body>
    <div class="sidebar">
        <div class="top">
            <div class="logo">
                <!-- <i class='bx bx-sushi' style='color:#23832f'></i> -->
                <img class='logo' src="fotor_sushi.png" alt="">
                <h3 class="logo-title">SushiGo</h3>
            </div>
        </div>
        <ul>
            <li>
                <a href="/pesan" class="side-link">
                    <i class='bx bx-basket menu-link' data-bs-toggle="tooltip" data-bs-placement="right" title="Pesanan"></i>
                </a>
            </li>
            <li>
                <a href="/menuadmin" class="side-link">
                    <i class='bx bx-food-menu menu-link' data-bs-toggle="tooltip" data-bs-placement="right" title="Menu"></i>
                </a>
            </li>
            <li>
                <a href="/riwayatpembelian" class="side-link">
                    <i class='bx bx-history menu-link' data-bs-toggle="tooltip" data-bs-placement="right" title="Riwayat Pesanan"></i>
                </a>
            </li>
            <li>
                <a href="/table" class="side-link">
                    <i class='bx bx-table menu-link' data-bs-toggle="tooltip" data-bs-placement="right" title="Table"></i>
                </a>
            </li>
            <li>
                <a href="#" class="logout">
                    <i class='bx bx-log-out menu-link' data-bs-toggle="tooltip" data-bs-placement="right" title="Logout"></i>
                </a>
            </li>
        </ul>
    </div>

    <script>
        var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
        var tooltipList = tooltipTriggerList.map(function(tooltipTriggerEl) {
            return new bootstrap.Tooltip(tooltipTriggerEl)
        })
    </script>
</body>

</html>