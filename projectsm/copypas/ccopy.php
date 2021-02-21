<?php
require_once("db_connect.php");


// GET DATA
if (empty($_GET["page"])) {
    $page = 1;
} else {
    $page = $_GET["page"];
}


if (empty($_GET["searchdata"])) {
    $searchdata = "";
} else {
    $searchdata = $_GET["searchdata"];
}




// 分頁導航
if(empty($_GET["searchdata"])){
    $sql = "SELECT * FROM authority WHERE valid=1";
}else{
    $sql = "SELECT * FROM authority WHERE valid=1 AND (admin_id LIKE '%$searchdata%' OR admin_name LIKE '%$searchdata%' OR admin_account LIKE '%$searchdata%' OR admin_password LIKE '%$searchdata%' OR admin_email LIKE '%$searchdata%' OR admin_authority LIKE '%$searchdata%' OR admin_create_date LIKE '%$searchdata%' OR admin_edit_date LIKE '%$searchdata%')  
    ";
}

$result = $conn->query($sql);
$total_item = $result->num_rows;


var_dump($total_item);


//設定分頁
$item_per_page = 7;
$start = ($page - 1) * $item_per_page;

//page總頁數
$total_page = floor($total_item / $item_per_page) + 1;
if ($total_item % $item_per_page == 0) $total_page = $total_page - 1;

$first_item = ($page - 1) * $item_per_page + 1;
$last_item = $page * $item_per_page;
if ($last_item >= $total_item) $last_item = $total_item;

$sql_page = "SELECT * FROM authority WHERE valid=1 AND (admin_id LIKE '%$searchdata%' OR admin_name LIKE '%$searchdata%' OR admin_account LIKE '%$searchdata%' OR admin_password LIKE '%$searchdata%' OR admin_email LIKE '%$searchdata%' OR admin_authority LIKE '%$searchdata%' OR admin_create_date LIKE '%$searchdata%' OR admin_edit_date LIKE '%$searchdata%')  
ORDER BY admin_id DESC LIMIT $start, $item_per_page";
$result_page = $conn->query($sql_page);

// var_dump($result_page);


// 單項id搜尋
// $sql_id = "SELECT * FROM authority WHERE admin_id = 19";
// $result_id = $conn->query($sql_id);
// var_dump($result_id);



?>


<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>揪影後台</title>

    <!-- Custom fonts for this template -->
    <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="../css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="../vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
    <style>
        .box {
            width: 100%;
            height: 30px;
        }
    </style>

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="../index.html">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>
                <div class="sidebar-brand-text mx-3">揪影</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>會員管理</span>
                </a>
                <div id="collapseOne" class="collapse" aria-labelledby="headingone" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <!-- <h6 class="collapse-header">Custom Components:</h6> -->
                        <a class="collapse-item" href="temp.html">會員管理</a>
                        <a class="collapse-item" href="create_member.html">新增會員</a>
                    </div>
                </div>
            </li>

            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>活動管理</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <!-- <h6 class="collapse-header">Custom Components:</h6> -->
                        <a class="collapse-item" href="temp.html">會員管理</a>
                        <a class="collapse-item" href="temp.html">新增會員</a>
                    </div>
                </div>
            </li>

            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseThree" aria-expanded="true" aria-controls="collapseThree">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>課程管理</span>
                </a>
                <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <!-- <h6 class="collapse-header">Custom Components:</h6> -->
                        <a class="collapse-item" href="temp.html">會員管理</a>
                        <a class="collapse-item" href="temp.html">新增會員</a>
                    </div>
                </div>
            </li>

            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseFour" aria-expanded="true" aria-controls="collapseFour">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>訂單管理</span>
                </a>
                <div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <!-- <h6 class="collapse-header">Custom Components:</h6> -->
                        <a class="collapse-item" href="temp.html">會員管理</a>
                        <a class="collapse-item" href="temp.html">新增會員</a>
                    </div>
                </div>
            </li>

            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseFive" aria-expanded="true" aria-controls="collapseFive">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>權限管理</span>
                </a>
                <div id="collapseFive" class="collapse" aria-labelledby="headingFive" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <!-- <h6 class="collapse-header">Custom Components:</h6> -->
                        <a class="collapse-item" href="tempauth.php">權限管理列表</a>
                        <a class="collapse-item" href="tempauthadd.html">新增權限管理</a>
                    </div>
                </div>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <form class="form-inline">
                        <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                            <i class="fa fa-bars"></i>
                        </button>
                    </form>


                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>


                            <div class="topbar-divider d-none d-sm-block"></div>

                            <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">Douglas McGee</span>
                                <img class="img-profile rounded-circle" src="../img/undraw_profile.svg">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profile
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Settings
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Activity Log
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">權限管理列表</h1>

                    <form class="form-inline my-2 my-lg-0" method="GET">
                        <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" id="search" name="searchdata">
                        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                    </form>
                    <div class="mt-3">
                        篩選條件
                    </div>
                    <!-- <div class="ml-2 mt-1 d-flex justify-content-start"> -->
                    <form>
                        <div class="form-check form-check-inline mb-4">
                            <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="member_id">
                            <label class="form-check-label" for="inlineCheckbox1">會員序號</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="member_name">
                            <label class="form-check-label" for="inlineCheckbox2">會員名字</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="member_account">
                            <label class="form-check-label" for="inlineCheckbox2">帳號</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="member_email">
                            <label class="form-check-label" for="inlineCheckbox2">信箱</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="member_password">
                            <label class="form-check-label" for="inlineCheckbox2">密碼</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="member_phone">
                            <label class="form-check-label" for="inlineCheckbox2">電話</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="member_birthday">
                            <label class="form-check-label" for="inlineCheckbox2">生日</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="member_gender">
                            <label class="form-check-label" for="inlineCheckbox2">性別</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="member_ptex">
                            <label class="form-check-label" for="inlineCheckbox2">攝影經驗</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="member_create_date">
                            <label class="form-check-label" for="inlineCheckbox2">建立日期</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="member_edit_date">
                            <label class="form-check-label" for="inlineCheckbox2">修改日期</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="member_valid">
                            <label class="form-check-label" for="inlineCheckbox2">valid</label>
                        </div>
                        <button class="btn btn-primary my-2 my-sm-0 py-0 mr-1 align-top" type="submit">enter</button>
                    </form>


                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3 d-flex align-content-center justify-content-between">
                            <h6 class="m-0 font-weight-bold text-primary">權限管理列表</h6>
                            <button class="btn btn-outline-primary my-2 my-sm-0 py-0" type="button" data-toggle="modal" data-target="#create_member">+ 新增權限管理</button>
                        </div>
                        <div class="modal fade" id="create_member" tabindex="-1" role="dialog" aria-labelledby="create_memberTitle" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLongTitle">新增權限管理</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="container-fluid" style="padding-bottom: 3rem">

                                            <!-- Page Heading -->
                                            <form action="authority_add.php" method="post">
                                                <div class="form-group col-6">
                                                    <label for="authority_name">管理員名字</label>
                                                    <input type="text" class="form-control" id="authority_name" placeholder="Name" name="authname" required>
                                                </div>
                                                <div class="form-group col-8">
                                                    <label for="authority_account">管理員帳號</label>
                                                    <input type="text" class="form-control" id="authority_account" placeholder="Account" name="authaccount" required>
                                                </div>
                                                <div class="form-group col-8">
                                                    <label for="authority_password">管理員密碼</label>
                                                    <input type="password" class="form-control" id="authority_password" placeholder="Password" name="authpass" required>
                                                </div>
                                                <div class="form-group col-10">
                                                    <label for="authority_email">管理員信箱</label>
                                                    <input type="email" class="form-control" id="authority_email" aria-describedby="emailHelp" placeholder="Enter email" name="authemail" required>
                                                </div>
                                                <div class="form-group col-6">
                                                    <label for="authority">權限等級(1~3)</label>
                                                    <input type="text" pattern="[1-3]{1}" class="form-control" id="authority" placeholder="Level" name="authlevel" required>
                                                </div>
                                                <div class="form-group col-6">
                                                    <label for="authority_createdate">建立日期</label>
                                                    <input type="date" class="form-control" id="authority_createdate" name="authcdate" required>
                                                </div>

                                                <div class="form-group col-6">
                                                    <label for="authority_editdate">修改日期</label>
                                                    <input type="date" class="form-control" id="authority_editdate" name="authedate" required>
                                                </div>


                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">取消</button>
                                                    <button type="submit" class="btn btn-primary">新增</button>
                                                </div>
                                            </form>


                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>


                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" width="100%" cellspacing="0">
                                    <thead class="text-center">
                                        <th scope="col" class="text-nowrap">管理員序號</th>
                                        <th scope="col" class="text-nowrap">管理員名字</th>
                                        <th scope="col" class="text-nowrap">管理員帳號</th>
                                        <th scope="col" class="text-nowrap">管理員密碼</th>
                                        <th scope="col" class="text-nowrap">管理員信箱</th>
                                        <th scope="col" class="text-nowrap">權限等級</th>
                                        <th scope="col" class="text-nowrap">建立日期</th>
                                        <th scope="col" class="text-nowrap">修改日期</th>


                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php while ($row = $result_page->fetch_assoc()) {
                                            $test1 = $row["admin_id"];  ?>
                                            <tr>
                                                <td id="<?=$test1?>" scope="row" class="text-center"><?= $row["admin_id"] ?></td>
                                                <td class="text-nowrap text-center"><?= $row["admin_name"] ?></td>
                                                <td scope="col" class="text-nowrap text-left"><?= $row["admin_account"] ?></td>
                                                <td scope="col" class="text-nowrap text-left"><?= $row["admin_password"] ?></td>
                                                <td scope="col" class="text-nowrap text-left"><?= $row["admin_email"] ?></td>
                                                <td scope="col" class="text-nowrap text-center"><?= $row["admin_authority"] ?></td>
                                                <td scope="col" class="text-nowrap text-center"><?= $row["admin_create_date"] ?></td>
                                                <td scope="col" class="text-nowrap text-center"><?= $row["admin_edit_date"] ?></td>
                                                <td scope="col d-flex edit" class="text-nowrap text-center">

                                                    <button class="btn btn-info my-2 my-sm-0 py-0 mr-1" type="button" data-toggle="modal" data-target="#edit_authority" onclick="doupdate(<?php echo $test1;?>)">修改</button>

                                                    <button class="btn btn-warning my-2 my-sm-0 py-0" type="submit" data-toggle="modal" data-target="#delete" onclick="dodelete(<?php echo $test1;?>)">刪除</button>
                                                </td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.container-fluid -->

                        </div>
                        <!-- End of Main Content -->

                        <nav aria-label="Page navigation">
                            <ul class="pagination justify-content-center">
                                <li class="page-item">
                                    <a class="page-link" href="#" aria-label="Previous">
                                        <span aria-hidden="true">&laquo;</span>
                                        <span class="sr-only">Previous</span>
                                    </a>
                                </li>
                                <?php for ($i = 1; $i <= $total_page; $i++) { ?>

                                    <li class="page-item <?php if ($page == $i) {
                                                                echo "active";
                                                            } ?>">
                                        <a class="page-link" href="tempauth.php?page=<?= $i ?>&searchdata=<?= $searchdata?>"><?= $i ?></a>
                                    </li>


                                <?php

                                } ?>

                                <li class="page-item">
                                    <a class="page-link" href="tempauth.php?page=<?= ($i + 1) ?>" aria-label="Next">
                                        <span aria-hidden="true">&raquo;</span>
                                        <span class="sr-only">Next</span>
                                    </a>
                                </li>
                            </ul>
                        </nav>

                        <!-- Footer -->
                        <footer class="sticky-footer bg-white">
                            <div class="container my-auto">
                                <div class="copyright text-center my-auto">
                                    <span>Copyright &copy; Join In 2020</span>
                                </div>
                            </div>
                        </footer>
                        <!-- End of Footer -->

                    </div>
                    <!-- End of Content Wrapper -->

                </div>
                <!-- End of Page Wrapper -->

                <!-- Scroll to Top Button-->
                <a class="scroll-to-top rounded" href="#page-top">
                    <i class="fas fa-angle-up"></i>
                </a>

                <!-- Logout Modal-->
                <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                            </div>
                            <div class="modal-body">Select "Logout" below if you are ready to end your current session.
                            </div>
                            <div class="modal-footer">
                                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                                <a class="btn btn-primary" href="login.html">Logout</a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Bootstrap core JavaScript-->
                <script src="../vendor/jquery/jquery.min.js"></script>
                <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

                <!-- Core plugin JavaScript-->
                <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>

                <!-- Custom scripts for all pages-->
                <script src="../js/sb-admin-2.min.js"></script>

                <!-- Page level plugins -->
                <script src="../vendor/datatables/jquery.dataTables.min.js"></script>
                <script src="../vendor/datatables/dataTables.bootstrap4.min.js"></script>

                <!-- Page level custom scripts -->
                <script src="../js/demo/datatables-demo.js"></script>

                <!--修改-->
                <div class="modal fade" id="edit_authority" tabindex="-1" role="dialog" aria-labelledby="edit_authorityTitle" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLongTitle">修改權限</h5>
                                <button type="button" class="close" aria-label="Close" data-dismiss="modal">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="container-fluid" style="padding-bottom: 3rem">

                                   
                                        <!-- Page Heading -->
                                        <form action="authority_update.php" method="post">
                                         <div class="form-group col-6">
                                                <label for="authority_name">管理員序號</label>
                                                <input type="text" class="form-control" id="authority_id2" value="" name="authidd" readonly>
                                            </div>
                                            <div class="form-group col-6">
                                                <label for="authority_name">管理員名字</label>
                                                <input type="text" class="form-control" id="authority_name2" name="authname" required>
                                            </div>
                                            <div class="form-group col-8">
                                                <label for="authority_account">管理員帳號</label>
                                                <input type="text" class="form-control" id="authority_account2" value="" name="authaccount" required>
                                            </div>
                                            <div class="form-group col-8">
                                                <label for="authority_password">管理員密碼</label>
                                                <input type="text" class="form-control" id="authority_password2" value="" name="authpass" required>
                                            </div>
                                            <div class="form-group col-10">
                                                <label for="authority_email">管理員信箱</label>
                                                <input type="email" class="form-control" id="authority_email2" aria-describedby="emailHelp" value="" name="authemail" required>
                                            </div>
                                            <div class="form-group col-6">
                                                <label for="authority">權限等級(1~3)</label>
                                                <input type="text" pattern="[1-3]{1}" class="form-control" id="authority2" value="" name="authlevel" required>
                                            </div>

                                            <div class="form-group col-8">
                                                <label for="authority_editdate">修改日期 </label>
                                                <input type="date" class="form-control" id="authority_editdate2" value="" name="authedate" required>
                                            </div>

                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">取消</button>
                                                <button type="submit" class="btn btn-primary">修改</button>
                                            </div>

            
                                        </form>
                                 

                                </div>
                            </div>

                        </div>
                    </div>
                </div>

                <div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="delete" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">確定要刪除嗎?</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <!-- <div class="modal-body">
                                  
                                </div> -->
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">取消</button>
                                <button type="button" class="btn btn-warning" onclick="comfdelete()">刪除</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>    
    </div>



    <script>
        
        function doupdate(test1){
            console.log(test1);
            let strtest1 = test1.toString();
            let auth_id = document.getElementById(strtest1).innerHTML;
            console.log(auth_id);
            
            
            var test;
            $.ajax({
                method: "POST",
                url: "ajaxupdate.php",
                dataType: "json",
                data: { auth_id: auth_id
                       
                }
            })
                .done(function( response ) {

                    console.log(response);

                    test = response;
                    console.log(test["name"]);
                    document.getElementById("authority_id2").value = test["id"];
                    document.getElementById("authority_name2").value = test["name"];
                    document.getElementById("authority_account2").value = test["account"];
                    document.getElementById("authority_password2").value = test["password"];
                    document.getElementById("authority_email2").value = test["email"];
                    document.getElementById("authority2").value = test["level"];
                    document.getElementById("authority_editdate2").value = test["edate"];

                    



                }).fail(function( jqXHR, textStatus ) {
                console.log( "Request failed: " + textStatus );
            });

        }

        var del_idbox;
        function dodelete(test1){
                console.log(test1);
                let del_id = test1.toString();
                del_idbox = document.getElementById(del_id).innerHTML;
                console.log(del_idbox);
            }


        function comfdelete(){
            console.log(del_idbox);


            $.ajax({
                method: "POST",
                url: "ajaxdelete.php",
                dataType: "json",
                data: { del_idbox: del_idbox }
            })
                .done(function( response ) {

                    console.log(response);
                    window.location.replace(location.href);

                }).fail(function( jqXHR, textStatus ) {
                console.log( "Request failed: " + textStatus );


                
            });

            alert("資料刪除成功");
        }

        

    </script>

    <?php
    $conn -> close();

    ?>

</body>

</html>