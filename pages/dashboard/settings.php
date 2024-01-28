<?php
session_start();
if (!isset($_SESSION['AccNo'])) {
    header('Location: ../login.php?msg=Please login to continue');
    exit;
}

require('../../configs/db.php');
require('../../scripts/get_userinfo.php'); // All user info
require('pp_check.php'); // PP Check

// Check if there is an GET message
$error = '';
if (isset($_GET['msg'])) {
    $error = $_GET['msg'];
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../../assets/img/logo.png" type="image/x-icon">
    <title>Settings - Sawongam Bank </title>
    <link href="./css/index/mainMobile.css" rel="stylesheet">
    <link href="./css/index/table.css" media="(min-width: 600px)" rel="stylesheet">
    <link href="./css/index/desktop.css" media="(min-width: 900px)" rel="stylesheet">
    <link href="./css/profile/mainMobile.css" rel="stylesheet">
    <link href="./css/table/mainMobile.css" rel="stylesheet">
    <link href="./css/table/tablet.css" media="(min-width: 600px)" rel="stylesheet">
    <link href="./css/table/desktop.css" media="(min-width: 900px)" rel="stylesheet">
    <link rel="stylesheet" href="./css/all.min.css" />
    <link rel="stylesheet" href="./css/common.css" />
</head>

<body>
    <div id="wrapper">
        <!-- Navbar Side-->
        <nav class="navbar-side sidebar">
            <div class="nav-container">
                <a class="navbar-brand" href="./index.php">
                    <div class="sidebar-brand-icon rotate-n-15">
                        <img src="../../assets/img/logo.png" height="50px">
                    </div>
                    <div class="sidebar-brand-text"><span>Sawongam Bank</span></div>
                </a>
                <hr class="sidebar-divider">
                <ul class="navbar-nav" id="sidebar-ul">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">
                            <i class="fas fa-tachometer-alt"></i>
                            <span>Dashboard</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./transfer.php">
                            <i class="fas fa-money-bill-alt"></i>
                            <span>Transfer</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="transactions.php">
                            <i class="fas fa-exchange-alt"></i>
                            <span>Transactions</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="analytics.php">
                            <i class="fas fa-industry"></i>
                            <span>Analytics</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="profile.php">
                            <i class="fas fa-user"></i><span>Profile</span>
                        </a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="settings.php">
                            <i class="fas fa-adjust"></i><span class="active-db">Settings</span>
                        </a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link" href="support.php">
                            <i class="fas fa-envelope"></i><span>Support</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../../scripts/logout.php">
                            <i class="fas fa-sign-out-alt"></i><span>Log out</span>
                        </a>
                    </li>
                </ul>
            </div>
        </nav>

        <div id="content-wrapper">
            <!--!Navbar Top-->
            <div class="navbar-top d-flex" id="page-top">
                <div class="container-fluid d-flex"></div>
                <ul class="navbar-nav-ul d-flex">
                    <li class="nav-item">
                        <a class="dropdown-toggle nav-link search-icon-nav" href="#"><i class="fas fa-search"></i></a>
                    </li>
                    <li class="nav-item">
                        <a class="dropdown-toggle nav-link" href="#"><i class="fas fa-bell fa-fw"></i></a>
                    </li>
                    <li class="nav-item">
                        <a class="dropdown-toggle nav-link" href="#"><i class="fas fa-envelope fa-fw"></i></a>
                    </li>
                    <div class="topbar-divider"></div>
                    <li class="nav-item avatar-n">
                        <p><span class="avatar-text">
                                <?php echo $name ?>
                            </span></p>
                        <div class="avatar-nav" style="background-image: url(<?php echo $pp ?>);"></div>
                    </li>
                </ul>
            </div>

            <!--!Index's Main contents start here-->
            <div class="index-content container-main">
                <div class="dashboard-header  d-flex justify-between">
                    <!--!Dashboard header-->
                    <h3>
                        Edit Profile
                    </h3>
                </div>

                <div class="overview-row row d-flex">
                    <!--Profile Info-->
                    <div class="earnings profile">
                        <div class="col-profile prof-col1 margin-row-prof shadow-edit">
                            <div class="prof-body pr-body2">
                                <img id="profilePic" src="<?php echo $pp ?>" alt="Profile Picture">
                                <div>
                                    <input type="file" id="fileInput" style="display: none;" accept="image/*">
                                    <button class="button-profile" type="button"
                                        onclick="document.getElementById('fileInput').click();">Change Photo</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!--Account Info-->
                    <div class="revenue profileInfo">
                        <div class="revenue-container row2-bgEdit">
                            <div class="user-setting-head project-head">
                                <h6>Change Account Info</h6>
                            </div>
                            <div class="user-setting-body project-body">
                                <form action="../../scripts/change_accinfo.php" method="POST">
                                    <!--row1-->
                                    <div class="form-row d-flex justify-between">
                                        <div class="form-row-col d-flex flex-direction-column">
                                            <label class="form-label" for="name"><strong>Name</strong></label>
                                            <input class="form-control-prof" type="text" id="name"
                                                value="<?php echo $name ?>" name="name">
                                        </div>
                                        <div class="form-row-col d-flex flex-direction-column">
                                            <label class="form-label" for="email"><strong>Email Address</strong></label>
                                            <input class="form-control-prof" type="email" id="email"
                                                value="<?php echo $email ?>" name="email">
                                        </div>
                                    </div>
                                    <!--row2-->
                                    <div class="form-row d-flex justify-between">
                                        <div style="margin-bottom: 10px;"
                                            class="form-row-col d-flex flex-direction-column">
                                            <label class="form-label" for="address"><strong>Address</strong></label>
                                            <input class="form-control-prof" type="text" id="address"
                                                value="<?php echo $address ?>" name="address">
                                        </div>
                                    </div>
                                    <small style="text-align: left; margin-bottom: 10px;" id="error-code"
                                        class="error-font">
                                        <?php echo $error ?>
                                    </small>
                                    <!--row3-->
                                    <div class="form-row">
                                        <div class="form-row-button">
                                            <button class="button-profile" type="submit" name="change">Save
                                                Settings</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script src="../../assets/js/file_handle.js"></script>
</body>

</html>