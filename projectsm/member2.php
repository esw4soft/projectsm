<?php
require_once ("db_connect.php");
session_start();
empty($_GET["page"])? ($page=1):($page=$_GET["page"]);

if(empty($_GET["search"])){
    $search_word = "";
    $sql_member="SELECT * FROM member WHERE valid=1";
}else{
    $search_word = $_GET["search"];
    $sql_member = "SELECT * FROM member WHERE valid=1 AND (member_name LIKE '%$search_word%' OR member_account LIKE '%$search_word%' OR member_email LIKE '%$search_word%' OR member_password LIKE '%$search_word%' OR member_phone LIKE '%$search_word%' )";
}

//總個數
$result_member=$conn->query($sql_member);
$total_member=$result_member->num_rows;

//每頁個數
$member_per_page=10;
$start=($page-1)*$member_per_page;

//產生項目
$sql = "SELECT member.*,experience.ex_name AS experience FROM member 
JOIN experience ON member_ex = experience.ex_value 
WHERE valid=1 AND (member_name LIKE '%$search_word%' OR member_account LIKE '%$search_word%' OR member_email LIKE '%$search_word%' OR member_password LIKE '%$search_word%' OR member_phone LIKE '%$search_word%' ) 
LIMIT $start,$member_per_page";
$result=$conn->query($sql);


//總頁數
if($total_member%$member_per_page==0){
    $total_pages=floor($total_member/$member_per_page);
}else{
    $total_pages=floor($total_member/$member_per_page)+1;
}
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
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
    <style>
        .my-custom-scrollbar {
            position: relative;
            /*height: 700px;*/
            overflow: auto;
        }
        .table-wrapper-scroll-y {
            display: block;
        }
        .search-box{
            background: #ffffff;
            border-radius: 15px;
            padding: 20px 10px;
        }
        .order{
            background: transparent;
            border: transparent 1px solid;
        }
        .bg-gradient-primary{
            background-color: #2C2C30;
            background-image: linear-gradient(180deg, #2C2B31  10%, #070608 100%);
            background-size: cover;
        }
    </style>

    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="vendor/datatables/jquery.dataTables.min.js"></script>

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion " id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>
                <div class="sidebar-brand-text mx-3">揪影</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseOne"
                    aria-expanded="true" aria-controls="collapseOne">
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
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                    aria-expanded="true" aria-controls="collapseTwo">
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
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseThree"
                    aria-expanded="true" aria-controls="collapseThree">
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
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseFour"
                    aria-expanded="true" aria-controls="collapseFour">
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
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseFive"
                    aria-expanded="true" aria-controls="collapseFive">
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
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
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
                    <h1 class="h3 mb-2 text-gray-800">會員管理</h1>


                    <div class="search-box mb-4">
<!--                        <h5>條件篩選</h5>-->
                    <form class="form-inline my-2 my-lg-0 flex-wrap mb-3"  method="GET">
                        <div class="form-group col-12">
                        <label class="mr-2">關鍵字搜尋 :</label>
                        <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search" name="search">
                        <button class="btn btn-secondary my-2 my-sm-0" type="submit">搜尋</button>
                        </div>
                    </form>



<!--                    </form class="form-inline my-3 my-lg-0 flex-wrap"  method="GET">-->
<!--                        <div class="d-flex">-->
<!--                        <div class="form-inline d-flex">-->
<!--                            <label class="mr-4 text-nowrap">條件篩選 :</label>-->
<!--                            <label class="mr-2 text-nowrap">性別</label>-->
<!--                            <select class="custom-select mr-sm-2 flex-nowrap">-->
<!--                                <option value="10">全部</option>-->
<!--                                <option value="25">男</option>-->
<!--                                <option value="50">女</option>-->
<!--                            </select>-->
<!--                        </div>-->
<!--                        <div class="form-inline col-3 d-flex">-->
<!--                            <label class="mr-sm-2 text-nowrap" for="ptex" required>攝影經驗</label>-->
<!--                            <select class="custom-select mr-sm-2" name="ptex" id="select_ex">-->
<!--                                <option selected>選擇</option>-->
<!--                                <option name="create_ex" value="0">一年以下</option>-->
<!--                                <option name="create_ex" value="1">一年</option>-->
<!--                                <option name="create_ex" value="2">二年</option>-->
<!--                                <option name="create_ex" value="3">三年</option>-->
<!--                                <option name="create_ex" value="4">四年</option>-->
<!--                                <option name="create_ex" value="5">五年</option>-->
<!--                                <option name="create_ex" value="6">六年</option>-->
<!--                                <option name="create_ex" value="7">七年</option>-->
<!--                                <option name="create_ex" value="8">七年以上</option>-->
<!--                            </select>-->
<!--                        </div>-->
<!--                        </div>-->
<!--                    </form>-->


                    </div>






                    <!-- DataTales Example -->
                    <div class="card shadow mb-4 my-4">
                        <div class="card-header py-3 ">
                            <div class="d-flex align-content-center justify-content-between my-2 mx-4">
                            <h6 class="m-0 font-weight-bold text-primary">會員列表</h6>
                            <button class="btn btn-outline-primary my-2 my-sm-0 py-0" type="button" data-toggle="modal"
                                data-target="#create_member">+ 新增會員</button>
                            </div>

                            <div class="d-flex align-content-center justify-content-between">

                                <button class="btn btn-danger mb-sm-1 p-0 px-1 ml-sm-4"
                                        type="submit" data-toggle="modal"
                                        data-target="#deleteAll" >刪除所選項目</button>
                                <div class="d-flex">
<!---->
<!--                                <label class="mr-sm-2 text-nowrap align-bottom pt-2" for="ptex" required>顯示</label>-->
<!--                                <select class="custom-select mr-sm-2" name="ptex" id="perpage" onchange="perPage()">-->
<!--                                    <option value="10">10</option>-->
<!--                                    <option value="25">25</option>-->
<!--                                    <option value="50">50</option>-->
<!--                                    <option value="100">100</option>-->
<!--                                </select>-->
<!--                                <label class="mr-sm-2 text-nowrap align-bottom pt-2 " for="ptex" required>筆</label>-->
<!--                                </div>-->


                            </div>
                        </div>


                        <div class="modal fade" id="create_member" tabindex="-1" role="dialog"
                            aria-labelledby="create_memberTitle" aria-hidden="true">
                            <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLongTitle">新增會員</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="container-fluid" style="padding-bottom: 3rem">

                                            <div class='text-danger' id="error"></div>
                                            <div class='text-danger' id="errorpassword"></div>
                                            <!-- Page Heading -->
                                            <form id="create_list">
                                                <div class="d-flex">
                                                <div class="form-group col-6">
                                                    <label for="name">姓名</label>
                                                    <input type="text" class="form-control" name="name" placeholder="name" id="create_name" required>
                                                </div>
                                                <div class="form-group col-6">
                                                    <label for="account">帳號</label>
                                                    <input type="text" class="form-control" name="account" placeholder="account" id="create_account" required>
                                                </div>
                                                </div>
                                                <div class="form-group col-12">
                                                    <label for="email">信箱</label>
                                                    <input type="email" class="form-control" name="email"
                                                           aria-describedby="emailHelp" placeholder="Enter email" id="create_email" required>
                                                    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone
                                                        else.</small>
                                                </div>
                                                <div class="d-flex">
                                                <div class="form-group col-6">
                                                    <label for="Password">密碼</label>
                                                    <input type="password" class="form-control" id="create_password" name="password"
                                                           placeholder="Password" required>
                                                </div>
                                                <div class="form-group col-6">
                                                    <label for="Password">再次輸入密碼</label>
                                                    <input type="password" class="form-control" name="repassword" id="create_repassword"
                                                           placeholder="Password" required>
                                                </div>
                                                </div>
                                                <div class="form-group col-8">
                                                    <label for="phone">電話</label>
                                                    <input type="tel" class="form-control" name="phone" placeholder="phone" id="create_phone" required>
                                                </div>
                                                <div class="d-flex">
                                                <div class="form-group col-6">
                                                    <label for="birthday">生日</label>
                                                    <input type="date" class="form-control" name="birthday" id="create_birthday" required>
                                                </div>
                                                <div class="form-group col-8">
                                                    <label for="birthday">性別</label>
                                                    <div class="d-flex mt-2">
                                                    <div class="mx-5 d-inline-block">
                                                        <input class="form-check-input" type="radio" name="create_gender" value="男" checked>
                                                        <label class="form-check-label" for="gender">
                                                            男
                                                        </label>
                                                    </div>
                                                    <div class="d-inline-block">
                                                        <input class="form-check-input" type="radio" name="create_gender" value="女" id="gender" checked>
                                                        <label class="form-check-label" for="gender">
                                                            女
                                                        </label>
                                                    </div>
                                                    </div>
                                                </div>
                                                </div>

                                                <div class="col-auto my-1 col-6 mb-4">
                                                    <label class="mr-sm-2" for="ptex" required>攝影經驗</label>
                                                    <select class="custom-select mr-sm-2" name="ptex" id="select_ex">
                                                        <option selected>選擇</option>
                                                        <option name="create_ex" value="0">一年以下</option>
                                                        <option name="create_ex" value="1">一年</option>
                                                        <option name="create_ex" value="2">二年</option>
                                                        <option name="create_ex" value="3">三年</option>
                                                        <option name="create_ex" value="4">四年</option>
                                                        <option name="create_ex" value="5">五年</option>
                                                        <option name="create_ex" value="6">六年</option>
                                                        <option name="create_ex" value="7">七年</option>
                                                        <option name="create_ex" value="8">七年以上</option>
                                                    </select>
                                                </div>

                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-success mr-2" onclick="doCreate()">確認</button>
                                                    <input type="reset" class="btn btn-secondary" value="重新填寫">
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="card-body">
                            <div class="table-responsive table-wrapper-scroll-y my-custom-scrollbar">
                                <table class="table table-bordered table-striped" width="100%" cellspacing="0">
                                    <thead class="text-center header thead-light">
                                        <th scope="row" class="text-nowrap">
                                            <div class="form-check justify-content-center">
                                                <input class="form-check-input " type="checkbox" value="" id="selected_all" onclick="select_all(this,'select_member')">
                                                <label class="form-check-label" for="defaultCheck1">
                                                    全選
                                                </label>
                                            </div>
                                            <div class="form-check justify-content-center">
                                                <input class="form-check-input " type="checkbox" value="" id="selected_all" onclick="reverse(this,'select_member')">
                                                <label class="form-check-label" for="defaultCheck1">
                                                    反選
                                                </label>
                                                <!--                                                <button class="btn btn-outline-dark p-0 px-2 mt-1" onclick="(this,'select_member')">反選</button>-->
                                            </div>
                                        </th>
<!--                                        <form method="get">-->
                                        <th scope="col" class="text-nowrap">序號
<!--                                            <button type="submit" class="order" value=""><i class="fas fa-sort"></i></button>-->
                                        </th>
                                        <th scope="col" class="text-nowrap">姓名</th>
                                        <th scope="col" class="text-nowrap">帳號</th>
                                        <th scope="col" class="text-nowrap">信箱</th>
                                        <th scope="col" class="text-nowrap">密碼</th>
                                        <th scope="col" class="text-nowrap">電話</th>
                                        <th scope="col" class="text-nowrap">生日</th>
<!--                                        <th scope="col" class="text-nowrap">性別</th>-->
<!--                                        <th scope="col" class="text-nowrap">攝影經驗</th>-->
<!--                                        <th scope="col" class="text-nowrap">建立日期</th>-->
<!--                                        <th scope="col" class="text-nowrap">修改日期</th>-->
                                        <th scope="col" class="text-nowrap">查看/編輯/刪除</th>
                                        </tr>
<!--                                        </form>-->
                                    </thead>
                                    <tbody>
                                    <?php

                                    if ($result->num_rows>0){
                                        while ($row = $result->fetch_assoc()) {
                                            $id = $row["member_id"];
                                    ?>
                                        <tr>
                                            <td scope="col" class="text-center">
                                                <div class="form-check" onclick="select(<?php echo $id; ?>)">
                                                    <input class="form-check-input position-static" type="checkbox" value="option1" name="select_member" id="<?php echo $row["member_id"]?>" >
                                                </div>


                                            </td>
                                            <td scope="col" class="text-center"><?=$row["member_id"]?></td>
                                            <td scope="col" class="text-nowrap text-center"><?=$row["member_name"]?></td>
                                            <td scope="col" class="text-nowrap text-left"><?=$row["member_account"]?></td>
                                            <td scope="col" class="text-nowrap text-left"><?=$row["member_email"]?></td>
                                            <td scope="col" class="text-nowrap text-left"><?=$row["member_password"]?></td>
                                            <td scope="col" class="text-nowrap text-center"><?=$row["member_phone"]?></td>
                                            <td scope="col" class="text-nowrap text-center"><?=$row["member_birthday"]?></td>
<!--                                            <td scope="col" class="text-center">--><?//=$row["member_gender"]?><!--</td>-->
<!--                                            <td scope="col" class="text-nowrap text-center">--><?//=$row["experience"]?><!--</td>-->
<!--                                            <td scope="col" class="text-nowrap text-center">--><?//=$row["member_create_date"]?><!--</td> -->
<!--                                            <td scope="col" class="text-nowrap text-center">--><?//=$row["member_edit_date"]?><!--</td>-->
                                            <td scope="col d-flex edit" class="text-nowrap text-center">
                                                <button class="btn btn-success my-2 my-sm-0 py-1 mr-1"
                                                        type="button" data-toggle="modal"
                                                        data-target="#inspect_member" onclick="inspect(<?php echo $row["member_id"]; ?>)"><i class="fas fa-eye"></i></button>
                                                <button class="btn btn-info my-2 my-sm-0 py-1 mr-1"
                                                    type="button" data-toggle="modal"
                                                    data-target="#edit_member" onclick="checkUser(<?php echo $row["member_id"]; ?>)"><i class="far fa-edit"></i></button>
                                                <button class="btn btn-warning my-2 my-sm-0 py-1"
                                                    type="button" data-toggle="modal"
                                                    data-target="#delete" onclick="askDelete(<?php echo $row["member_id"]; ?>)"><i class="fas fa-user-minus"></i></button>
                                            </td>
                                        </tr>

                                        <?php   }
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.container-fluid -->





                        </div>
                        <!-- End of Main Content -->

                        <div class="d-flex justify-content-center ml-4">
                            <nav aria-label="Page navigation example">
                                <ul class="pagination">
                                    <li class="page-item">
                                        <a class="page-link" href="member2.php?page=<?php if ($page != 1){
                                            echo ($page-1);
                                        }else{
                                            echo $page=1;
                                        } ?>&search=<?=$search_word?>" aria-label="Previous">
                                            <span aria-hidden="true">&laquo;</span>
                                            <span class="sr-only">Previous</span>
                                        </a>
                                    </li>

                                    <?php
                                    for ($i=1;$i<=$total_pages;$i++){?>
                                    <li class="page-item
                                    <?php if($page==$i) echo "active" ?>">
                                    <a class="page-link" href="member2.php?page=<?=$i?>&search=<?=$search_word?>"><?=$i?></a>
                                    </li>
                                        <?php
                                    }
                                    ?>

                                    <li class="page-item">
                                        <a class="page-link" href="member2.php?page=<?php if ($page < $total_pages){
                                            echo ($page+1);
                                        }else{
                                            echo $page=$total_pages;
                                        } ?>&search=<?=$search_word?>" aria-label="Next">
                                            <span aria-hidden="true">&raquo;</span>
                                            <span class="sr-only">Next</span>
                                        </a>
                                    </li>

                                </ul>
                            </nav>
                        </div>

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


                <!--修改-->
                <div class="modal fade" id="edit_member" tabindex="-1" role="dialog"
                     aria-labelledby="edit_memberTitle" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="update">編輯會員</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>


                            <div class="modal-body">
                                <div class="container-fluid" style="padding-bottom: 3rem">



                                    <form action="php/do_update.php" method="post">
                                        <div class="form-group col-2">
                                            <label for="member_name">會員序號</label>
                                            <input type="text" class="form-control" id="member_id" name="edit_id"
                                                   value="" readonly>
                                        </div>
                                        <div class="d-flex">
                                        <div class="form-group col-6">
                                            <label for="member_name">姓名</label>
                                            <input type="text" class="form-control" id="member_name" name="edit_name"
                                                   value="">
                                        </div>
                                        <div class="form-group col-6">
                                            <label for="member_account">帳號</label>
                                            <input type="text" class="form-control" id="member_account" name="edit_account"
                                                   value="">
                                        </div>
                                        </div>
                                        <div class="form-group col-12">
                                            <label for="member_email">信箱</label>
                                            <input type="email" class="form-control" id="member_email" name="edit_email"
                                                   aria-describedby="emailHelp" value="">
                                            <small id="emailHelp" class="form-text text-muted">We'll never share
                                                your email with anyone
                                                else.</small>
                                        </div>
                                        <div class="d-flex">
                                        <div class="form-group col-6">
                                            <label for="member_Password">密碼</label>
                                            <input type="text" class="form-control" id="member_password" name="edit_password"
                                                   value="">
                                        </div>

                                        <div class="form-group col-6">
                                            <label for="member_phone">電話</label>
                                            <input type="tel" class="form-control" id="member_phone" name="edit_phone"
                                                   value="">
                                        </div>
                                        </div>
                                        <div class="d-flex">
                                        <div class="form-group col-6">
                                            <label for="member_birthday">生日</label>
                                            <input type="date" class="form-control" id="member_birthday" name="edit_birthday" value="">
                                        </div>

                                        <div class="form-group col-8">
                                            <label for="birthday">性別</label>
                                            <div class="d-flex mt-2">
                                            <div class="mx-5 d-inline-block">
                                                <input class="form-check-input" type="radio" name="edit_gender" value="男" id="male">
                                                <label class="form-check-label" for="gender">
                                                    男
                                                </label>
                                            </div>
                                            <div class="d-inline-block">
                                                <input class="form-check-input" type="radio" name="edit_gender" value="女" id="female" checked>
                                                <label class="form-check-label" for="gender">
                                                    女
                                                </label>
                                            </div>
                                            </div>
                                        </div>
                                        </div>


                                        <div class="col-auto my-1 col-4 mb-4">
                                            <label class="mr-sm-2" for="member_ptex">攝影經驗</label>
                                            <select class="custom-select mr-sm-2" id="member_ptex" name="edit_ptex">
                                                <option selected id="select"></option>
                                                <option  value="0">一年以下</option>
                                                <option  value="1">一年</option>
                                                <option  value="3">三年</option>
                                                <option  value="4">四年</option>
                                                <option  value="5">五年</option>
                                                <option  value="6">六年</option>
                                                <option  value="7">七年</option>
                                                <option  value="8">七年以上</option>
                                            </select>
                                        </div>
                                        <div class="modal-footer">
                                            <input type="submit" class="btn btn-primary" value="儲存">
                                            <input type="button" class="btn btn-secondary" data-dismiss="modal" value="取消">
                                        </div>
                                    </form>

                                </div>
                            </div>

                        </div>
                    </div>
                </div>







                <!--刪除-->
                <div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="delete" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">確定要刪除嗎?</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>

                            <div class="m-4 justify-content-end d-flex">
                                <button type="submit" class="btn btn-warning" data-dismiss="modal" onclick="deleteMember()">刪除</button>
                                <button type="button" class="btn btn-secondary mx-2" data-dismiss="modal">取消</button>
                            </div>
                        </div>
                    </div>
                </div>

                <!--刪除全部-->
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
                                <button type="submit" class="btn btn-danger" data-dismiss="modal" onclick="deleteAllMember()">刪除</button>
                                <button type="button" class="btn btn-secondary mx-2" data-dismiss="modal">取消</button>
                            </div>
                        </div>
                    </div>
                </div>

                <!--檢視會員資訊-->
                <div class="modal fade" id="inspect_member" tabindex="-1" role="dialog" aria-labelledby="inspect_member" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="">檢視會員資訊</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="container-fluid" style="padding-bottom: 3rem">
                                    <div id="inspect_id"></div>
                                    <div id="inspect_name"></div>
                                    <div id="inspect_account"></div>
                                    <div id="inspect_email"></div>
                                    <div id="inspect_password"></div>
                                    <div id="inspect_phone"></div>
                                    <div id="inspect_birthday"></div>
                                    <div id="inspect_gender"></div>
                                    <div id="inspect_ex"></div>
                                    <div id="inspect_create"></div>
                                    <div id="inspect_edit"></div>
                                </div>
                            </div>

                            <div class="m-4 justify-content-end d-flex">
                                <button type="submit" class="btn btn-info mx-2" data-dismiss="modal" data-toggle="modal"
                                        data-target="#edit_member" onclick="smCheck()">編輯</button>
                                <button type="submit" class="btn btn-warning mx-2" data-dismiss="modal" data-toggle="modal"
                                        data-target="#delete" onclick="smDelete()">刪除</button>
                                <button type="button" class="btn btn-secondary mx-2" data-dismiss="modal" >取消</button>


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


                <script>



                    function doCreate(){
                        document.getElementById("errorpassword").innerHTML="";
                        document.getElementById("error").innerHTML="";
                        let createName = document.getElementById("create_name").value;
                        let createEmail = document.getElementById("create_email").value;
                        let createAccount = document.getElementById("create_account").value;
                        let createPassword = document.getElementById("create_password").value;
                        let createRepassword = document.getElementById("create_repassword").value;
                        let createPhone = document.getElementById("create_phone").value;
                        let createBirthday = document.getElementById("create_birthday").value;
                        let createGender = document.getElementById("create_list").create_gender.value;
                        let createPtex = document.getElementById("select_ex").value;
                        console.log(createAccount)
                        if(createPassword != createRepassword){
                            document.getElementById("errorpassword").innerHTML="*新增會員失敗，密碼不一致";
                        }else{
                            document.getElementById("errorpassword").innerHTML="";
                        }

                        $.ajax({
                            method: "POST",
                            url: "php/do_create_pop.php",
                            dataType: "json",
                            data: { name : createName,
                                email : createEmail,
                                account : createAccount,
                                password : createPassword,
                                repassword : createRepassword,
                                phone : createPhone,
                                birthday : createBirthday,
                                gender : createGender,
                                experience : createPtex
                            }
                        })
                            .done(function( response ) {
                                console.log(response)
                                console.log(response.status)
                                if(response.status==0){
                                    document.getElementById("error").innerHTML=response.message;
                                }else{
                                    alert("新會員建立成功");
                                    window.location.replace(location.href);
                                }



                            }).fail(function( jqXHR, textStatus ) {
                            console.log( "Request failed: " + textStatus );
                        });
                    }

                    var inspectId
                    function inspect(id){
                        inspectId = id.toString();
                        console.log(inspectId)

                        var ins;
                        $.ajax({
                            method: "POST",
                            url: "php/doCheckUser2.php",
                            dataType: "json",
                            data: { userID : inspectId }
                        })
                            .done(function(response) {
                                console.log(response);
                                ins = response;
                                console.log(ins["name"]);
                                document.getElementById("inspect_id").innerHTML="會員序號 : "+ins['id'];
                                document.getElementById("inspect_name").innerHTML="姓名 : "+ins['name'];
                                document.getElementById("inspect_account").innerHTML="帳號 : "+ins['account'];
                                document.getElementById("inspect_email").innerHTML="信箱 : "+ins['email'];
                                document.getElementById("inspect_password").innerHTML="密碼 : "+ins['password'];
                                document.getElementById("inspect_phone").innerHTML="電話 : "+ins['phone'];
                                document.getElementById("inspect_birthday").innerHTML="生日 : "+ins['birthday'];
                                document.getElementById("inspect_ex").innerHTML="攝影經驗 : "+ins['ex'];
                                document.getElementById("inspect_gender").innerHTML="性別 : "+ins['gender'];
                                document.getElementById("inspect_create").innerHTML="建立日期 : "+ins['create'];
                                document.getElementById("inspect_edit").innerHTML="最後修改日期 : "+ins['edit'];




                            }).fail(function( jqXHR, textStatus ) {
                            console.log( "Request failed: " + textStatus );
                        });

                    }






                    function checkUser(id){
                        console.log(id)
                        let strId = id.toString();
                        console.log(strId)

                        var test;
                        $.ajax({
                            method: "POST",
                            url: "php/doCheckUser2.php",
                            dataType: "json",
                            data: { userID : strId }
                        })
                            .done(function(response) {
                                console.log(response);
                                test = response;
                                console.log(test["name"]);
                                document.getElementById("member_id").value=test['id'];
                                document.getElementById("member_name").value=test['name'];
                                document.getElementById("member_account").value=test['account'];
                                document.getElementById("member_email").value=test['email'];
                                document.getElementById("member_password").value=test['password'];
                                document.getElementById("member_phone").value=test['phone'];
                                document.getElementById("member_birthday").value=test['birthday'];
                                document.getElementById("select").innerHTML=test['ex'];
                                switch (test["gender"]){
                                    case "男":
                                        document.getElementById("male").checked=true;
                                        break;
                                    case "女":
                                        document.getElementById("female").checked=true;
                                        break;
                                }



                            }).fail(function( jqXHR, textStatus ) {
                            console.log( "Request failed: " + textStatus );
                        });
                    }

                    var delID
                    function askDelete(id2){
                        delID = id2.toString();
                        console.log(delID);
                    }

                    function smCheck(){
                        console.log(inspectId);
                        checkUser(inspectId);
                    }

                    function smDelete(){
                        console.log(inspectId);
                        delID=inspectId
                        // console.log(delID);
                    }

                    function deleteMember(){
                        console.log(delID)
                        $.ajax({
                                method: "POST",
                                url: "php/go_delete.php",
                                // dataType: "json",
                                data: { deleteID : delID
                                }
                            })
                                .done(function(response) {
                                    alert('刪除會員成功');
                                    window.location.replace(location.href);

                                }).fail(function( jqXHR, textStatus ) {
                                console.log( "Request failed: " + textStatus );
                            });
                    }



                    var selected = [];
                    var total;
                    function select_all(member,select_member){
                        var checkboxs = document.getElementsByName(select_member);
                        var all = document.getElementById("selected_all");
                        if (all.checked){
                            for(var i=0;i<checkboxs.length;i++){
                                checkboxs[i].checked = member.checked;
                                    selected[i] = checkboxs[i].id;
                            }
                        }else{
                            for(var i=0;i<checkboxs.length;i++){
                                checkboxs[i].checked = member.checked;
                                if(selected.includes(checkboxs[i].id)){
                                    selected = selected.filter(function(item) {
                                        return item != checkboxs[i].id
                                    });
                                }}
                        }

                        console.log("selected:"+selected)
                    }


                    function select(selectedId){
                        var selectedID = selectedId.toString()
                        let selectedMember = document.getElementById(selectedId);
                        if (selectedMember.checked){
                            selected.push(selectedID);
                        }else{
                            selected = selected.filter(function(item) {
                                return item != selectedID
                            });
                        }
                        console.log("selected:"+selected)
                    }

                    function reverse (rev,select_member){
                        var beforeReverse = document.getElementsByName(select_member);
                        var total_array = [];
                        var origin_array = selected.map(x=>x); //被選擇的選項存成的陣列
                        // console.log(beforeReverse)
                        for(var i=0;i<beforeReverse.length;i++){
                            total_array[i]=beforeReverse[i].id
                        }
                        console.log("整頁總數:"+total_array)
                        console.log("複製的selected:"+origin_array) //i是origin的index
                        var result=[]
                        if(rev.checked){
                            for(let i=0;i<origin_array.length;i++){
                                document.getElementById(origin_array[i]).checked=false;
                            }
                             result = total_array.filter((e)=>{
                                return origin_array.indexOf(e) == -1
                            });
                            // console.log(result)
                            for(let i=0;i<result.length;i++){
                                document.getElementById(result[i]).checked=true;
                                selected[i]=result[i];
                            }
                        }else{
                            // alert("QQ")
                            for(let i=0;i<origin_array.length;i++){
                                document.getElementById(origin_array[i]).checked=false;
                                selected = selected.filter(function(item) {
                                    return item != origin_array[i]
                                });
                            }
                            result = total_array.filter((e)=>{
                                return origin_array.indexOf(e) == -1
                            });
                            for(let i=0;i<result.length;i++){
                                document.getElementById(result[i]).checked=true;
                                selected[i]=result[i];
                            }

                            console.log("result: "+result)
                        }



                        console.log("selected:"+selected)


                    }


                    function deleteAllMember(){
                        // console.log(selected)
                        $.ajax({
                            method: "POST",
                            url: "php/go_delete_all.php",
                            // dataType: "json",
                            data: { deleteAllID : selected
                            }
                        })
                            .done(function(response) {
                                window.location.replace(location.href);

                            }).fail(function( jqXHR, textStatus ) {
                            console.log( "Request failed: " + textStatus );
                        });
                    }

                </script>
</body>

</html>
<?php
$conn->close();
?>