<?php
require_once("db_connect.php");
session_start();

if (!isset($_GET["event_type"])) {
    $event_type = 0;
} else {
    $event_type = $_GET["event_type"];
}


//讀取活動分類
$event_category = "SELECT * FROM event_category";
$result_category = $conn->query($event_category);

if ($event_type == 0) {
    $sql_event = "SELECT * FROM event WHERE event_valid=1";
} else {
    $sql_event = "SELECT * FROM event WHERE event_valid=1 AND
event_type=$event_type";
}

$result_event = $conn->query($sql_event);
$total_item = $result_event->num_rows;

if ($event_type == 0) {
    $sql = "SELECT event.*, event_category.category_name FROM event
    JOIN event_category ON event.event_type=event_category.category_id
    WHERE event.event_valid=1";
} else {
    $sql = "SELECT event.*, event_category.category_name FROM event
    JOIN event_category ON event.event_type=event_category.category_id
    WHERE event.event_valid=1 AND event.event_type=$event_type";
}

$result = $conn->query($sql);

//取出特定成員的資料
$id = 1;
$sql_id = "SELECT * FROM event WHERE event_id=$id";
$result_id = $conn->query($sql_id);
//var_dump($result_id);

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
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
    <style>
        .box {
            width: 100%;
            height: 30px;
        }

        .bg-gradient-primary {
            background-color: #2C2C30;
            background-image: linear-gradient(180deg, #2C2B31 10%, #070608 100%);
            background-size: cover;
        }
        
        #iconn{
            width: 32px;
            height: 32px;;
        }  
    </style>

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->

            <a class="sidebar-brand d-flex align-items-center justify-content-center" href='member2.php'>
                <img id="iconn" src="img/logo.svg" alt="">
                <div class="sidebar-brand-text mx-3">揪影</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                    <i class="fas fa-user col-1"></i>
                    <span class="col-11">會員管理</span>
                </a>
                <div id="collapseOne" class="collapse" aria-labelledby="headingone" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <!-- <h6 class="collapse-header">Custom Components:</h6> -->
                        <a class="collapse-item" href="member2.php">會員管理</a>
                        <a class="collapse-item" href="create_member.php">新增會員</a>
                    </div>
                </div>
            </li>

            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-camera col-1"></i>
                    <span class="col-11">活動管理</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <!-- <h6 class="collapse-header">Custom Components:</h6> -->
                        <a class="collapse-item" href="event_list.php">活動列表管理</a>
                        <a class="collapse-item" href="add_event_page.php">新增活動</a>
                    </div>
                </div>
            </li>

            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseThree" aria-expanded="true" aria-controls="collapseThree">
                <i class="fas fa-chalkboard-teacher col-1"></i>
                <span class="col-11">課程管理</span>
                </a>
                <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <!-- <h6 class="collapse-header">Custom Components:</h6> -->
                        <a class="collapse-item" href="class.php">課程管理</a>
                        <a class="collapse-item" href="create_class.php">新增課程</a>
                    </div>
                </div>
            </li>

            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseFour" aria-expanded="true" aria-controls="collapseFour">
                <i class="fas fa-receipt col-1"></i>
                <span class="col-11">訂單管理</span>
                </a>
                <div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <!-- <h6 class="collapse-header">Custom Components:</h6> -->
                        <a class="collapse-item" href="order/temp_event.php">活動訂單管理</a>
                        <a class="collapse-item" href="order/temp_class.php">課程訂單會員</a>
                    </div>
                </div>
            </li>

            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseFive" aria-expanded="true" aria-controls="collapseFive">
                <i class="fas fa-fw fa-cog col-1"></i>
                <span class="col-11">權限管理</span>
                </a>
                <div id="collapseFive" class="collapse" aria-labelledby="headingFive" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <!-- <h6 class="collapse-header">Custom Components:</h6> -->
                        <a class="collapse-item" href="make/tempauth.php">權限管理列表</a>
                        <a class="collapse-item" href="make/tempauthadd.php">新增權限管理</a>
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
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?= $_SESSION["headdd"]?></span>
                                <img class="img-profile rounded-circle" src="img/undraw_profile.svg">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    最高權限管理者
                                </a>
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
                    <h1 class="h3 mb-2 text-gray-800">活動列表管理</h1>

                    <div class="mt-3"></div>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3 d-flex align-content-center justify-content-between">
                            <h6 class="m-0 font-weight-bold text-primary">活動列表</h6>
                            <button class="btn btn-outline-primary my-2 my-sm-0 py-0" type="button" data-toggle="modal" data-target="#create_member">+ 新增活動</button>
                        </div>
                        <div class="modal fade" id="create_member" tabindex="-1" role="dialog" aria-labelledby="create_memberTitle" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLongTitle">新增活動</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="container-fluid" style="padding-bottom: 3rem">

                                            <!-- Page Heading -->
                                            <form action="add_event.php" method="post">
                                                <div class="form-group col-8">
                                                    <label for="event_name">活動名稱</label>
                                                    <input type="text" class="form-control" name="event_name" required>
                                                </div>
                                                <div class="form-group col-10">
                                                    <label for="event_date">活動日期</label>
                                                    <input type="date" class="form-control" name="event_date" required>
                                                </div>
                                                <div class="form-group col-8">
                                                    <label for="event_time">活動時間</label>
                                                    <input type="time" class="form-control" name="event_time" required>
                                                </div>
                                                <div class="form-group col-6">
                                                    <label for="event_location">活動地點</label>
                                                    <input type="text" class="form-control" name="event_location" required>
                                                </div>
                                                <div class="form-group col-6">
                                                    <label for="event_type">活動類型</label>
                                                    <br>
                                                    <label>
                                                        <input type="radio" name="event_type" value="1" />戶外
                                                    </label>
                                                    <label>
                                                        <input type="radio" name="event_type" value="2" />棚拍
                                                    </label>
                                                </div>

                                                <div class="col-auto my-1 col-4 mb-4">
                                                    <label class="mr-sm-2" for="event_area">活動區域</label>
                                                    <select class="custom-select mr-sm-2" name="event_area" required>
                                                        <option selected>選擇</option>
                                                        <option value="北部">北部</option>
                                                        <option value="中部">中部</option>
                                                        <option value="南部">南部</option>
                                                        <option value="東部">東部</option>
                                                        <option value="離島">離島</option>
                                                    </select>
                                                </div>
                                                <div class="form-group col-6">
                                                    <label for="event_host">主辦人</label>
                                                    <input type="text" class="form-control" name="event_host">
                                                </div>
                                                <div class="form-group col-6">
                                                    <label for="event_fees">費用</label>
                                                    <input type="number" class="form-control" name="event_fees">
                                                </div>
                                                <div>
                                                    <button type="submit" class="btn btn-success mr-2">確認</button>
                                                    <button type="reset" class="btn btn-secondary" data-dismiss="modal">取消</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <ul class="nav nav-tabs">
                            <li class="nav-item">
                                <a class="nav-link <?php
                                                    if ($event_type == 0) echo "active" ?>" href="event_list.php?page=1&event_type=0">全部</a>
                            </li>
                            <?php while ($row = $result_category->fetch_assoc()) { ?>
                                <li class="nav-item">
                                    <a class="nav-link<?php
                                                        if ($event_type == $row["category_id"]) echo "active"; ?>" href="event_list.php?page=1&
            event_type=<?= $row["category_id"] ?>"><?= $row["category_name"] ?></a>
                                </li>
                            <?php } ?>
                        </ul>
                        <div class="mt-3"></div>
                        <div class="d-flex align-content-center justify-content-between"><button class="btn btn-danger my-sm-0 py-0 ml-3 col-0" type="submit" data-toggle="modal" data-target="#deleteAll">刪除所選項目</button></div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped" width="100%" cellspacing="0" id="table1">
                                    <thead class="text-center thead-light">
                                    <th scope="col" class="text-nowrap">
                                            <input type="checkbox" id="selected_all" class="text-nowrap" onclick="select_all(this,'select_event')"> 全選

<!--                                            <input type="checkbox" id="selected_no"   onclick="reverse(this,'classes_class')" >反選-->
                                        </th>
                                        <th scope="col" class="text-nowrap">活動id</th>
                                        <th scope="col" class="text-nowrap">活動名稱</th>
                                        <th scope="col" class="text-nowrap">活動日期</th>
                                        <!-- <th scope="col" class="text-nowrap">活動時間</th> -->
                                        <th scope="col" class="text-nowrap">活動地點</th>
                                        <th scope="col" class="text-nowrap">活動類型</th>
                                        <th scope="col" class="text-nowrap">活動區域</th>
                                        <th scope="col" class="text-nowrap">主辦人</th>
                                        <th scope="col" class="text-nowrap">費用</th>
                                        <!-- <th scope="col" class="text-nowrap">上傳日期</th>
                                        <th scope="col" class="text-nowrap">更新日期</th> -->
                                        <th scope="col" class="text-nowrap">查看/編輯/刪除</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        if ($result->num_rows > 0) {
                                            while ($row = $result->fetch_assoc()) {
                                                $id = $row["event_id"];
                                        ?>
                                                <tr>
                                                    <td scope="row" class="text-nowrap text-center">
                                                        <div class="form-check" onclick="select(<?php echo $id ?>)">
                                                            <input class="form-check-input position-static" type="checkbox" name="select_event" id="<?php echo $row["event_id"] ?>">
                                                        </div>
                                                    <td scope="col" class="text-center"><?= $row["event_id"] ?></td>
                                                    <td class="text-nowrap text-center"><?= $row["event_name"] ?></td>
                                                    <td scope="col" class="text-nowrap text-left"><?= $row["event_date"] ?></td>
                                                    <!-- <td scope="col" class="text-nowrap text-left"><?//= $row["event_time"] ?></td> -->
                                                    <td scope="col" class="text-nowrap text-left"><?= $row["event_location"] ?></td>
                                                    <td scope="col" class="text-nowrap text-center"><?= $row["category_name"] ?></td>
                                                    <td scope="col" class="text-nowrap text-center"><?= $row["event_area"] ?></td>
                                                    <td scope="col" class="text-center"><?= $row["event_host"] ?></td>
                                                    <td scope="col" class="text-nowrap text-center"><?= $row["event_fees"] ?></td>
                                                    <!-- <td scope="col" class="text-nowrap text-center"><?= $row["event_upload_date"] ?></td>
                                                    <td scope="col" class="text-nowrap text-center"><?= $row["event_update_date"] ?></td> -->
                                                    <td scope="col d-flex edit" class="text-nowrap text-center">
                                                        <button class="btn btn-success my-2 my-sm-0 py-1 mr-1" type="button" data-toggle="modal" data-target="#inspect_event" onclick="inspect(<?php echo $row["event_id"]; ?>)"><i class="fas fa-eye"></i></button>
                                                        <button class="btn btn-info my-2 my-sm-0 py-1 mr-1" type="button" data-toggle="modal" data-target="#edit_member" onclick="doLogin(<?php echo $id ?>)"><i class="far fa-edit"></i></button>
                                                        <button class="btn btn-warning my-2 my-sm- py-1" type="submit" data-toggle="modal" data-target="#delete" onclick="delete1(<?php echo $row["event_id"]; ?>)"><i class="fas fa-user-minus"></i></button>
                                                    </td>
                                                </tr>
                                        <?php  }
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.container-fluid -->

                        </div>
                        <!-- End of Main Content -->

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
                                <h5 class="modal-title" id="exampleModalLabel">確定要登出嗎?</h5>
                                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                            </div>

                            <div class="modal-footer">
                                <button class="btn btn-secondary" type="button" data-dismiss="modal">取消</button>
                                <a class="btn btn-primary" href="logout.php">登出</a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Bootstrap core JavaScript-->
                <script src="vendor/jquery/jquery.min.js"></script>
                <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

                <!-- Core plugin JavaScript-->
                <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

                <!-- Custom scripts for all pages-->
                <script src="js/sb-admin-2.min.js"></script>

                <!-- Page level plugins -->
                <script src="vendor/datatables/jquery.dataTables.min.js"></script>
                <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

                <!-- Page level custom scripts -->
                <script src="js/demo/datatables-demo.js"></script>
                <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js" charset="utf-8"></script>
                <script src="https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap4.min.js" charset="utf-8"></script>

                <!--修改-->
                <div class="modal fade" id="edit_member" tabindex="-1" role="dialog" aria-labelledby="edit_memberTitle" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLongTitle">編輯活動</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="container-fluid" style="padding-bottom: 3rem">
                                    <?php ?>
                                    <!-- Page Heading -->
                                    <form action="edit_event.php" method="post">
                                        <!--                                    --><?php
                                                                                    //                                    if($result_id->num_rows>0){
                                                                                    //                                        while($row_id=$result_id->fetch_assoc()){
                                                                                    ?>
                                        <div class="form-group col-8">
                                            <label for="event_id">活動序號</label>
                                            <input type="text" class="form-control" name="event_id" id="event_id" value="" readonly>
                                        </div>
                                        <div class="form-group col-8">
                                            <label for="event_name">活動名稱</label>
                                            <input type="text" class="form-control" name="event_name" id="event_name" value="">
                                        </div>
                                        <div class="form-group col-10">
                                            <label for="event_date">活動日期</label>
                                            <input type="date" class="form-control" name="event_date" id="event_date" value="">
                                        </div>
                                        <div class="form-group col-8">
                                            <label for="event_time">活動時間</label>
                                            <input type="time" class="form-control" name="event_time" id="event_time" value="">
                                        </div>
                                        <div class="form-group col-6">
                                            <label for="event_location">活動地點</label>
                                            <input type="text" class="form-control" name="event_location" id="event_location" value="">
                                        </div>
                                        <div class="form-group col-6">
                                            <label for="event_type">活動類型</label>
                                            <br>
                                            <label>
                                                <input type="radio" name="event_type" value="1" />戶外
                                            </label>
                                            <label>
                                                <input type="radio" name="event_type" value="2" />棚拍
                                            </label>
                                        </div>

                                        <div class="col-auto my-1 col-4 mb-4">
                                            <label class="mr-sm-2" for="event_area">活動區域</label>
                                            <select class="custom-select mr-sm-2" name="event_area" id="event_area">
                                                <option selected>選擇</option>
                                                <option value="北部">北部</option>
                                                <option value="中部">中部</option>
                                                <option value="南部">南部</option>
                                                <option value="東部">東部</option>
                                                <option value="離島">離島</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-6">
                                            <label for="event_host">主辦人</label>
                                            <input type="text" class="form-control" name="event_host" id="event_host" value="">
                                        </div>
                                        <div class="form-group col-6">
                                            <label for="event_fees">費用</label>
                                            <input type="number" class="form-control" name="event_fees" id="event_fees" value="">
                                        </div>
                                        <div>
                                            <button type="submit" class="btn btn-success mr-2">確認</button>
                                            <button type="reset" class="btn btn-secondary">重置</button>
                                        </div>
                                        <!--                                    --><?php // }
                                                                                    //                                    }
                                                                                    //                                    
                                                                                    ?>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--            刪除跳出視窗-->
                <div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="delete" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">確定要刪除嗎?</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-warning" onclick="deleteEvent()">刪除</button>
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">取消</button>
                            </div>
                        </div>
                    </div>
                </div>

                <!--            刪除全部跳出視窗-->
                <div class="modal fade" id="deleteAll" tabindex="-1" role="dialog" aria-labelledby="deleteAll" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="">確定要刪除嗎?</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>

                            <div class="m-4 justify-content-end d-flex">
                                <button type="button" class="btn btn-secondary mx-2" data-dismiss="modal">取消</button>
                                <button type="submit" class="btn btn-danger" data-dismiss="modal" onclick="deleteAllMember()">刪除</button>
                            </div>
                        </div>
                    </div>
                </div>

                <!--            檢視會員資訊-->
                <div class="modal fade" id="inspect_event" tabindex="-1" role="dialog" aria-labelledby="inspect_event" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="">檢視活動資訊</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="container-fluid" style="padding-bottom: 3rem">
                                    <div id="inspect_id"></div>
                                    <div id="inspect_name"></div>
                                    <div id="inspect_date"></div>
                                    <div id="inspect_time"></div>
                                    <div id="inspect_location"></div>
                                    <div id="inspect_type"></div>
                                    <div id="inspect_area"></div>
                                    <div id="inspect_host"></div>
                                    <div id="inspect_fees"></div>
                                    <div id="inspect_upload_date"></div>
                                    <div id="inspect_update_date"></div>
                                </div>
                            </div>

                            <div class="m-4 justify-content-end d-flex">
                                <button type="button" class="btn btn-secondary mx-2" data-dismiss="modal">取消</button>


                            </div>
                        </div>
                    </div>
                </div>



                <script>
                    // table的搜尋
                    $(document).ready(function() {
                        $('#table1').DataTable();
                    });

                    // 修改的ajax
                    function doLogin(id) {
                        let strid = id.toString();
                        // let event_id=document.getElementById(strid).innerHTML;
                        // console.log(event_id);
                        var test;
                        $.ajax({
                                method: "POST",
                                url: "backend.php",
                                dataType: "json",
                                data: {
                                    event_id: strid
                                }
                            })
                            .done(function(response) {
                                // console.log(response);
                                test = response;
                                // console.log(test["date"]);
                                document.getElementById("event_id").value = test["id"];
                                document.getElementById("event_name").value = test["name"];
                                document.getElementById("event_date").value = test["date"];
                                document.getElementById("event_time").value = test["time"];
                                document.getElementById("event_location").value = test["location"];
                                // document.getElementById("event_type").value=test["category_name"];
                                document.getElementById("event_area").value = test["area"];
                                document.getElementById("event_host").value = test["host"];
                                document.getElementById("event_fees").value = test["fees"];
                            }).fail(function(jqXHR, textStatus) {
                                console.log("Request failed: " + textStatus);
                            });
                    }

                    // 刪除的ajax
                    var stri

                    function delete1(i) {
                        stri = i.toString();
                        console.log(stri);
                        // delete_id=document.getElementById(stri).innerHTML;
                        // console.log(delete_id);
                    }

                    function deleteEvent() {
                        console.log(stri);
                        $.ajax({
                                method: "POST",
                                url: "delete_event.php",
                                // dataType: "json",
                                data: {
                                    delete_id: stri
                                }
                            })
                            .done(function(response) {
                                window.location.replace(location.href);
                                alert("刪除資料成功");
                            }).fail(function(jqXHR, textStatus) {
                                console.log("Request failed: " + textStatus);
                            });
                    }

                    var selected = [];
                    var total;

                    function select_all(event, select_event) {
                        var checkboxs = document.getElementsByName(select_event);
                        var all = document.getElementById("selected_all");
                        if (all.checked) {
                            for (var i = 0; i < checkboxs.length; i++) {
                                checkboxs[i].checked = event.checked;
                                // console.log(checkboxs[i].id)
                                if (selected.includes(checkboxs[i].id)) {
                                    selected = selected.filter(function(item) {
                                        return item != checkboxs[i].id
                                    });
                                } else {
                                    selected[i] = checkboxs[i].id;
                                }
                            }
                        } else {
                            for (var i = 0; i < checkboxs.length; i++) {
                                checkboxs[i].checked = event.checked;
                                if (selected.includes(checkboxs[i].id)) {
                                    selected = selected.filter(function(item) {
                                        return item != checkboxs[i].id
                                    });
                                }
                            }
                        }
                        console.log(selected)
                    }

                    function select(selectedId) {
                        // console.log(selectedId);
                        let selectedEvent = document.getElementById(selectedId);
                        // console.log(selectedEvent)
                        if (selectedEvent.checked) {
                            selected.push(selectedId);
                        } else {
                            var index = selected.indexOf(selectedId);
                            selected = selected.filter(function(item) {
                                return item != selectedId
                            });
                        }
                        console.log(selected)
                    }


                    function deleteAllMember() {
                        // console.log(selected)
                        $.ajax({
                                method: "POST",
                                url: "delete_all.php",
                                // dataType: "json",
                                data: {
                                    deleteAllID: selected
                                }
                            })
                            .done(function(response) {
                                // console.log(response);
                                window.location.replace(location.href);


                            }).fail(function(jqXHR, textStatus) {
                                console.log("Request failed: " + textStatus);
                            });
                    }

                    // 檢視資料Ajax
                    var inspectId

                    function inspect(id) {
                        inspectId = id.toString();
                        console.log(inspectId)

                        var ins;
                        $.ajax({
                                method: "POST",
                                url: "backend.php",
                                dataType: "json",
                                data: {
                                    event_id: inspectId
                                }
                            })
                            .done(function(response) {
                                console.log(response);
                                ins = response;
                                console.log(ins["name"]);
                                document.getElementById("inspect_id").innerHTML = "活動id : " + ins['id'];
                                document.getElementById("inspect_name").innerHTML = "活動名稱 : " + ins['name'];
                                document.getElementById("inspect_date").innerHTML = "活動日期 : " + ins['date'];
                                document.getElementById("inspect_time").innerHTML = "活動時間 : " + ins['time'];
                                document.getElementById("inspect_location").innerHTML = "活動地點 : " + ins['location'];
                                document.getElementById("inspect_type").innerHTML = "活動類型 : " + ins['category_name'];
                                document.getElementById("inspect_area").innerHTML = "活動區域 : " + ins['area'];
                                document.getElementById("inspect_host").innerHTML = "主辦人 : " + ins['host'];
                                document.getElementById("inspect_fees").innerHTML = "費用 : " + ins['fees'];
                                document.getElementById("inspect_upload_date").innerHTML = "上傳日期 : " + ins['upload_date'];
                                document.getElementById("inspect_update_date").innerHTML = "更新日期 : " + ins['update_date'];




                            }).fail(function(jqXHR, textStatus) {
                                console.log("Request failed: " + textStatus);
                            });

                    }
                </script>

</body>

</html>





<?php      $conn->close();
?>