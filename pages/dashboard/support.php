<?php
session_start();
if (!isset($_SESSION['AccNo'])) {
    header('Location: ../login.php?msg=Please login to continue');
    exit;
}
require('../../configs/db.php');
require('pp_check.php'); // PP Check
require('../../scripts/get_userinfo.php'); // $name

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
    <title>Support - Sawongam Bank </title>
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
                    <li class="nav-item ">
                        <a class="nav-link" href="profile.php">
                            <i class="fas fa-user"></i><span>Profile</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="settings.php">
                            <i class="fas fa-adjust"></i><span>Settings</span>
                        </a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="support.php">
                            <i class="fas fa-envelope"></i><span class="active-db">Support</span>
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
                        Support
                    </h3>
                </div>



                <div class="overview-row row d-flex">

                    <!--Contact Form-->

                    <div class="form-set-row">
                        <div class="form-padding-row">
                            <div class="from-setting-container shadow-edit">
                                <!--Header-->
                                <div class="project-head earning-header d-flex justify-between">
                                    <h6 class="earning-header-text">Contact Form</h6>
                                </div>
                                <!--body-->
                                <div class="user-setting-body project-body">
                                    <form action="../../scripts/send_email.php" method="POST">
                                        <!--row1-->
                                        <div style="margin-bottom: 0px;"
                                            class="form-row form-row-col2 d-flex justify-between">
                                            <div
                                                class="form-row-textarea d-flex flex-direction-column margin-column-form">
                                                <label class="form-label" for="signature"><strong>Share any
                                                        issues, feedback, or thoughts about your banking
                                                        experience.</strong></label>
                                                <textarea class="form-control-prof" name="signature" id="signature"
                                                    cols="30" rows="10"></textarea>
                                                <br>
                                                <small style="text-align: left; margin-bottom: 0px;" id="error-code"
                                                    class="error-font">
                                                    <?php echo $error ?>
                                                </small>
                                            </div>
                                        </div>
                                        <!--row2-->
                                        <div class="form-row margin-row-prof d-flex justify-between">
                                            <div class="switch form-row-col d-flex ">
                                                <input id="switch-1" type="checkbox" class="switch-input" />
                                                <label for="switch-1" class="switch-label">Notify me about reply</label>
                                                <label for="switch-1" class="switch-label2">Notify me about
                                                    reply</label>
                                            </div>
                                        </div>
                                        <!--row3-->
                                        <div class="form-row">
                                            <div class="form-row-button">
                                                <button class="button-profile" type="submit" name="send"
                                                    id="send">Send</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>


                    </div>
                </div>
            </div>
        </div>
</body>

</html>