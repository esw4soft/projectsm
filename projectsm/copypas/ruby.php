<?php
require_once ("db_connect.php");

empty($_GET["page"])? ($page=1):($page=$_GET["page"]);


$sql_member="SELECT * FROM member WHERE valid=1";
$result_member=$conn->query($sql_member);
$total_member=$result_member->num_rows;


$member_per_page=15;
$start=($page-1)*$member_per_page;

$sql="SELECT member.*,experience.ex_name AS experience FROM member 
JOIN experience ON member_ex = experience.ex_value 
WHERE valid=1 LIMIT $start,$member_per_page";
$result=$conn->query($sql);
if($total_member%$member_per_page==0){
    $total_pages=floor($total_member/$member_per_page);
}else{
    $total_pages=floor($total_member/$member_per_page)+1;
}
//$last_member=$page*$member_per_page;
//if ($last_member>=$total_member)$last_member=$total_member;
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
            height: 480px;
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
                    <i class="fas fa-fw fa-cog"></i>
                    <span>會員管理</span>
                </a>
                <div id="collapseOne" class="collapse" aria-labelledby="headingone" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <!-- <h6 class="collapse-header">Custom Components:</h6> -->
                        <a class="collapse-item" href="member2.php">會員管理</a>
                        <a class="collapse-item" href="create_member2.php">新增會員</a>
                    </div>
                </div>
            </li>

            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                    aria-expanded="true" aria-controls="collapseTwo">
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
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseThree"
                    aria-expanded="true" aria-controls="collapseThree">
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
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseFour"
                    aria-expanded="true" aria-controls="collapseFour">
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
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseFive"
                    aria-expanded="true" aria-controls="collapseFive">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>權限管理</span>
                </a>
                <div id="collapseFive" class="collapse" aria-labelledby="headingFive" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <!-- <h6 class="collapse-header">Custom Components:</h6> -->
                        <a class="collapse-item" href="temp.html">會員管理</a>
                        <a class="collapse-item" href="temp.html">新增會員</a>
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
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">Douglas McGee</span>
                                <img class="img-profile rounded-circle" src="img/undraw_profile.svg">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
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
                    <h1 class="h3 mb-2 text-gray-800">會員管理</h1>


                    <div class="mt-3">
                        顯示欄位
                    </div>
                    <!-- <div class="ml-2 mt-1 d-flex justify-content-start"> -->
                    <form>
                        <div class="form-check form-check-inline mb-4">
                            <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="select_all">
                            <label class="form-check-label" for="inlineCheckbox1">全部</label>
                        </div>
                        <div class="form-check form-check-inline mb-4">
                            <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="select_id">
                            <label class="form-check-label" for="inlineCheckbox1">會員序號</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="select_name">
                            <label class="form-check-label" for="inlineCheckbox2">會員名字</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="select_account">
                            <label class="form-check-label" for="inlineCheckbox2">帳號</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="select_email">
                            <label class="form-check-label" for="inlineCheckbox2">信箱</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="inlineCheckbox2"
                                value="select_password">
                            <label class="form-check-label" for="inlineCheckbox2">密碼</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="select_phone">
                            <label class="form-check-label" for="inlineCheckbox2">電話</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="inlineCheckbox2"
                                value="select_birthday">
                            <label class="form-check-label" for="inlineCheckbox2">生日</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="select_ender">
                            <label class="form-check-label" for="inlineCheckbox2">性別</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="select_ptex">
                            <label class="form-check-label" for="inlineCheckbox2">攝影經驗</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="inlineCheckbox2"
                                value="select_create_date">
                            <label class="form-check-label" for="inlineCheckbox2">建立日期</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="inlineCheckbox2"
                                value="select_edit_date">
                            <label class="form-check-label" for="inlineCheckbox2">修改日期</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="select_valid">
                            <label class="form-check-label" for="inlineCheckbox2">valid</label>
                        </div>
                        <button class="btn btn-primary my-2 my-sm-0 py-0 mr-1 align-top" type="submit">enter</button>
                    </form>


                    <div class="search-box mb-4">
                        <h5>條件篩選</h5>
                    <form class="form-inline my-2 my-lg-0">
                        <input class="form-control mr-sm-2 col-5" type="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                    </form>
                    </div>






                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3 ">
                            <div class="d-flex align-content-center justify-content-between">
                            <h6 class="m-0 font-weight-bold text-primary">會員列表</h6>
                            <button class="btn btn-outline-primary my-2 my-sm-0 py-0" type="button" data-toggle="modal"
                                data-target="#create_member">+ 新增會員</button>
                            </div>
                            <button class="btn btn-danger mt-2 py-0" type="submit" >刪除所選項目</button>
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

                                            <!-- Page Heading -->
                                            <form action="php/do_create_pop.php" method="post">
                                                <div class="d-flex">
                                                <div class="form-group col-6">
                                                    <label for="name">姓名</label>
                                                    <input type="text" class="form-control" name="name" placeholder="name" required>
                                                </div>
                                                <div class="form-group col-6">
                                                    <label for="account">帳號</label>
                                                    <input type="text" class="form-control" name="account" placeholder="account" required>
                                                </div>
                                                </div>
                                                <div class="form-group col-12">
                                                    <label for="email">信箱</label>
                                                    <input type="email" class="form-control" name="email"
                                                           aria-describedby="emailHelp" placeholder="Enter email" required>
                                                    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone
                                                        else.</small>
                                                </div>
                                                <div class="d-flex">
                                                <div class="form-group col-6">
                                                    <label for="Password">密碼</label>
                                                    <input type="password" class="form-control" name="password"
                                                           placeholder="Password" required>
                                                </div>
                                                <div class="form-group col-6">
                                                    <label for="Password">再次輸入密碼</label>
                                                    <input type="password" class="form-control" name="repassword"
                                                           placeholder="Password" required>
                                                </div>
                                                </div>
                                                <div class="form-group col-8">
                                                    <label for="phone">電話</label>
                                                    <input type="tel" class="form-control" name="phone" placeholder="phone" required>
                                                </div>
                                                <div class="d-flex">
                                                <div class="form-group col-6">
                                                    <label for="birthday">生日</label>
                                                    <input type="date" class="form-control" name="birthday" required>
                                                </div>
                                                <div class="form-group col-8">
                                                    <label for="birthday">性別</label>
                                                    <div class="d-flex mt-2">
                                                    <div class="mx-5 d-inline-block">
                                                        <input class="form-check-input" type="radio" name="gender" value="男" id="gender" checked>
                                                        <label class="form-check-label" for="gender">
                                                            男
                                                        </label>
                                                    </div>
                                                    <div class="d-inline-block">
                                                        <input class="form-check-input" type="radio" name="gender" value="女" id="gender" checked>
                                                        <label class="form-check-label" for="gender">
                                                            女
                                                        </label>
                                                    </div>
                                                    </div>
                                                </div>
                                                </div>

                                                <div class="col-auto my-1 col-6 mb-4">
                                                    <label class="mr-sm-2" for="ptex" required>攝影經驗</label>
                                                    <select class="custom-select mr-sm-2" name="ptex">
                                                        <option selected>選擇</option>
                                                        <option value="0">一年以下</option>
                                                        <option value="1">一年</option>
                                                        <option value="2">二年</option>
                                                        <option value="3">三年</option>
                                                        <option value="4">四年</option>
                                                        <option value="5">五年</option>
                                                        <option value="6">六年</option>
                                                        <option value="7">七年</option>
                                                        <option value="8">七年以上</option>
                                                    </select>
                                                </div>

                                                <div class="modal-footer">
                                                    <input type="submit" class="btn btn-success mr-2" value="確認">
                                                    <input type="reset" class="btn btn-secondary" value="取消">
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="card-body">
                            <div class="table-responsive table-wrapper-scroll-y my-custom-scrollbar">
                                <table class="table table-bordered" width="100%" cellspacing="0">
                                    <thead class="text-center header">
                                        <th scope="row" class="text-nowrap">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                                                <label class="form-check-label" for="defaultCheck1">
                                                    全選
                                                </label>
                                            </div>
                                        </th>
                                        <th scope="col" class="text-nowrap">會員序號</th>
                                        <th scope="col" class="text-nowrap">會員名字</th>
                                        <th scope="col" class="text-nowrap">帳號</th>
                                        <th scope="col" class="text-nowrap">信箱</th>
                                        <th scope="col" class="text-nowrap">密碼</th>
                                        <th scope="col" class="text-nowrap">電話</th>
                                        <th scope="col" class="text-nowrap">生日</th>
                                        <th scope="col" class="text-nowrap">性別</th>
                                        <th scope="col" class="text-nowrap">攝影經驗</th>
                                        <th scope="col" class="text-nowrap">建立日期</th>
                                        <th scope="col" class="text-nowrap">修改日期</th>
                                        <th scope="col" class="text-nowrap"></th>
                                        </tr>
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
                                                    <form action="" method="post">
                                                    <input class="form-check-input position-static" type="checkbox" id="blankCheckbox" value="option1" aria-label="...">
                                                    </form>
                                                </div>

                                            </td>
                                            <td id="<?=$id?>" scope="col" class="text-center"><?=$row["member_id"]?></td>
                                            <td scope="col" class="text-nowrap text-center"><?=$row["member_name"]?></td>
                                            <td scope="col" class="text-nowrap text-left"><?=$row["member_account"]?></td>
                                            <td scope="col" class="text-nowrap text-left"><?=$row["member_email"]?></td>
                                            <td scope="col" class="text-nowrap text-left"><?=$row["member_password"]?></td>
                                            <td scope="col" class="text-nowrap text-center"><?=$row["member_phone"]?></td>
                                            <td scope="col" class="text-nowrap text-center"><?=$row["member_birthday"]?></td>
                                            <td scope="col" class="text-center"><?=$row["member_gender"]?></td>
                                            <td scope="col" class="text-nowrap text-center"><?=$row["experience"]?></td>
                                            <td scope="col" class="text-nowrap text-center"><?=$row["member_create_date"]?></td>
                                            <td scope="col" class="text-nowrap text-center"><?=$row["member_edit_date"]?></td>
                                            <td scope="col d-flex edit" class="text-nowrap text-center">
                                                <button class="btn btn-info my-2 my-sm-0 py-0 mr-1"
                                                    type="button" data-toggle="modal"
                                                    data-target="#edit_member" onclick="checkUser(<?php echo $id; ?>)">修改</button>
                                                <button class="btn btn-warning my-2 my-sm-0 py-0"
                                                    type="submit" data-toggle="modal"
                                                    data-target="#delete" onclick="askDelete(<?php echo $id; ?>)">刪除</button>
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
                                        <a class="page-link" href="#" aria-label="Previous">
                                            <span aria-hidden="true">&laquo;</span>
                                            <span class="sr-only">Previous</span>
                                        </a>
                                    </li>

                                    <?php
                                    for ($i=1;$i<=$total_pages;$i++){?>
                                    <li class="page-item
                                    <?php if($page==$i) echo "active" ?>">
                                    <a class="page-link" href="member2.php?page=<?=$i?>"><?=$i?></a>
                                    </li>
                                        <?php
                                    }
                                    ?>

                                    <li class="page-item">
                                        <a class="page-link" href="#" aria-label="Next">
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
                <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
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
                                                <option value="0">一年以下</option>
                                                <option value="1">一年</option>
                                                <option value="3">三年</option>
                                                <option value="4">四年</option>
                                                <option value="5">五年</option>
                                                <option value="6">六年</option>
                                                <option value="7">七年</option>
                                                <option value="8">七年以上</option>
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
                                <button type="button" class="btn btn-secondary mx-2" data-dismiss="modal">取消</button>
                                <button type="submit" class="btn btn-warning" data-dismiss="modal" onclick="deleteMember()">刪除</button>
                            </div>
<!--                            </form>-->
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
                    function checkUser(id){
                        let strId = id.toString();
                        let userID =document.getElementById(strId).innerHTML;
                        console.log(userID)

                        var test;
                        $.ajax({
                            method: "POST",
                            url: "php/doCheckUser2.php",
                            dataType: "json",
                            data: { userID : userID }
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
                                if(test["gender"]!=="女"){

                                }



                            }).fail(function( jqXHR, textStatus ) {
                            console.log( "Request failed: " + textStatus );
                        });
                    }

                    var delID
                    function askDelete(id2){
                        let strId2 = id2.toString();
                        delID =document.getElementById(strId2).innerHTML;
                        console.log(delID)
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

                    function select(){
                        alert(delID)
                    }

                </script>
</body>

</html>
<?php
$conn->close();
?>