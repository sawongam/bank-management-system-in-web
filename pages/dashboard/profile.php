<?php
session_start();
if (!isset($_SESSION['AccNo'])) {
    header('Location: ../login.php?msg=Please login to continue');
    exit;
}

require('../../configs/db.php');
require('../../scripts/get_userinfo.php'); // $All user info
require('pp_check.php'); // PP Check
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../../assets/img/logo.png" type="image/x-icon">
    <title>Profile - Sawongam Bank </title>
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
                    <li class="nav-item active">
                        <a class="nav-link" href="profile.php">
                            <i class="fas fa-user"></i><span class="active-db">Profile</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="settings.php">
                            <i class="fas fa-adjust"></i><span>Settings</span>
                        </a>
                    </li>
                    <li class="nav-item">
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
                        Your Profile
                    </h3>
                    <a href="settings.php" class="generate-dash-btn"><i class="fas fa-edit fa-sm text-white-50"></i>Edit
                        Profile</a>
                </div>

                <div class="overview-row row d-flex">
                    <!--Profile Info-->
                    <div class="earnings profile">
                        <div class="col-profile prof-col1 margin-row-prof shadow-edit">
                            <div class="prof-body pr-body2">
                                <img src="<?php echo $pp ?>" alt="Profile Picture">
                                <div>
                                    <p class="form-label text-center">
                                        <span>
                                            <?php echo $accNo ?>
                                        </span> <br>
                                        <span>Saving Account</span> <br>
                                        <span>Sawongam Bank Ltd</span>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!--Account Info-->
                    <div class="revenue profileInfo">
                        <div class="revenue-container row2-bgEdit">
                            <!--head of transfer chart-->
                            <div class="revenue-header d-flex justify-between">
                                <h6 class="revenue-header-text">Account Info</h6>
                                <button class="button-nobg" type="button"><i class="fas fa-ellipsis-v "></i></button>
                            </div>
                            <!--body of transfer chart-->
                            <div class="user-setting-body project-body">
                                <p class="form-label" for="receiver_accNo"><strong>Account Number:</strong> <br>
                                    <span class="form-label">
                                        <?php echo $accNo ?>
                                    </span>
                                </p>
                                <p class="form-label" for="receiver_accNo"><strong>Account Type:</strong> <br>
                                    <span class="form-label">Saving</span>
                                </p>
                                <p class="form-label" for="receiver_accNo"><strong>Full Name:</strong> <br>
                                    <span class="form-label">
                                        <?php echo $name ?>
                                    </span>
                                </p>
                                </p>
                                <p class="form-label" for="receiver_accNo"><strong>Address:</strong> <br>
                                    <span class="form-label">
                                        <?php echo $address ?>
                                    </span>
                                </p>
                                </p>
                                <p class="form-label" for="receiver_accNo"><strong>Email:</strong> <br>
                                    <span class="form-label">
                                        <?php echo $email ?>
                                    </span>
                                </p>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>