<?php
require_once ("db_connect.php");
session_start();

// $page=$_GET["page"];

if(empty($_GET["page"])){
    $page = 1;
}else {
    $page = $_GET["page"];
}

if (empty($_GET{"searchdata"})) {
    $searchdata="";
}else {
    $searchdata = $_GET["searchdata"];
}
// echo $searchdata;

//分頁導航
if(empty($_GET["searchdata"])){
    $sql_list="SELECT * FROM s_report WHERE vaild=1";
}else{
    $sql_list="SELECT * FROM s_report WHERE vaild=1 AND (order_id LIKE 
    '%$searchdata%' OR event_name LIKE 
    '%$searchdata%' OR purchaser_id LIKE
    '%$searchdata%' OR purchaser_name LIKE
    '%$searchdata%' OR order_create_time LIKE
    '%$searchdata%' OR order_fee LIKE
    '%$searchdata%' OR order_paid LIKE
    '%$searchdata%' OR payment_date LIKE
    '%$searchdata%' OR order_refunded LIKE
    '%$searchdata%' OR order_refund_amount LIKE
    '%$searchdata%' OR refund_date LIKE
    '%$searchdata%' OR order_edit_date LIKE
    '%$searchdata%')";
}

$result_list=$conn->query($sql_list);
$total_item=$result_list->num_rows;


//設定分頁
// $page=1;
$item_per_page=5;
$start=($page-1)*$item_per_page;

//page總頁數
$total_page=floor($total_item/$item_per_page)+1;
if ($total_item%$item_per_page==0)$total_page=$total_page-1;

$first_item=($page-1)*$item_per_page+1;

$last_item=$page*$item_per_page;
if ($last_item>=$total_item)$last_item=$total_item;

// $sql="SELECT products.*, category.name AS category_name FROM products
// JOIN category ON products.category_id = category.id ORDER BY category_name DESC 
//  LIMIT $start, $item_per_page";

$sql_list="SELECT * FROM s_report WHERE vaild=1
AND (order_id LIKE 
    '%$searchdata%' OR event_name LIKE 
    '%$searchdata%' OR purchaser_id LIKE
    '%$searchdata%' OR purchaser_name LIKE
    '%$searchdata%' OR order_create_time LIKE
    '%$searchdata%' OR order_fee LIKE
    '%$searchdata%' OR order_paid LIKE
    '%$searchdata%' OR payment_date LIKE
    '%$searchdata%' OR order_refunded LIKE
    '%$searchdata%' OR order_refund_amount LIKE
    '%$searchdata%' OR refund_date LIKE
    '%$searchdata%' OR order_edit_date LIKE
    '%$searchdata%')
 ORDER BY order_id ASC LIMIT $start, $item_per_page";
$result_list=$conn->query($sql_list);




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
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="../css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="../vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
    <style>
        .box {
            width: 100%;
            height: 30px;
        }
        
        .bg-gradient-primary{
            background-color: #2C2C30;
            background-image: linear-gradient(180deg, #2C2B31  10%, #070608 100%);
            background-size: cover;
        }

    </style>

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

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
                        <a class="collapse-item" href="../member2.php">會員管理</a>
                        <a class="collapse-item" href="../create_member.php">新增會員</a>
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
                        <a class="collapse-item" href="../event_list.php">活動列表管理</a>
                        <a class="collapse-item" href="../add_event_page.php">新增活動</a>
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
                        <a class="collapse-item" href="../class.php">課程管理</a>
                        <a class="collapse-item" href="../create_class.php">新增課程</a>
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
                        <a class="collapse-item" href="temp_event.php">活動訂單管理</a>
                        <a class="collapse-item" href="temp_class.php">課程訂單管理</a>
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
                        <a class="collapse-item" href="../make/tempauth.php">權限管理列表</a>
                        <a class="collapse-item" href="../make/tempauthadd.php">新增權限管理</a>
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
                                <img class="img-profile rounded-circle" src="../img/undraw_profile.svg">
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
                    <h1 class="h3 mb-2 text-gray-800">活動訂單管理</h1>

                    <form class="form-inline my-2 my-lg-0">
                        <label class="mr-2">關鍵字搜尋 :</label>
                        <input class="form-control mr-sm-2 col-3" type="text" placeholder="Search" aria-label="Search" name="searchdata">
                        <button class="btn btn-secondary my-2 my-sm-0" type="submit">搜尋</button>
                    </form>
                    <h4 class="text-danger my-lg-1 pl-4 ml-4" id="alert1"><?php
                                                                                if (isset($_SESSION["user_error"])) {
                                                                                    echo $_SESSION["user_error"];
                                                                                    unset($_SESSION["user_error"]);
                                                                                } elseif (isset($_SESSION["user_succ"])) {
                                                                                    echo $_SESSION["user_succ"];
                                                                                    unset($_SESSION["user_succ"]);
                                                                                }
                                                                                ?></h4>
                    <!-- <div class="ml-2 mt-1 d-flex justify-content-start"> -->
                    <!-- <form>
                        <div class="form-check form-check-inline mb-4">
                            <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="order_id">
                            <label class="form-check-label" for="inlineCheckbox1">訂單編號</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="event_name">
                            <label class="form-check-label" for="inlineCheckbox2">活動名稱</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="inlineCheckbox3" value="purchaser_id">
                            <label class="form-check-label" for="inlineCheckbox3">訂購人id</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="inlineCheckbox4" value="purchaser_name">
                            <label class="form-check-label" for="inlineCheckbox4">訂購人名字</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="inlineCheckbox5" value="order_create_time">
                            <label class="form-check-label" for="inlineCheckbox5">訂單成立時間</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="inlineCheckbox6" value="order_fee">
                            <label class="form-check-label" for="inlineCheckbox6">訂單費用</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="inlineCheckbox7" value="order_paid">
                            <label class="form-check-label" for="inlineCheckbox7">已付款</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="inlineCheckbox8" value="payment_date">
                            <label class="form-check-label" for="inlineCheckbox8">付款日期</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="inlineCheckbox9" value="order_refunded">
                            <label class="form-check-label" for="inlineCheckbox9">已退款</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="inlineCheckbox10" value="order_refund_amount">
                            <label class="form-check-label" for="inlineCheckbox10">退款金額</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="inlineCheckbox11" value="refund_date">
                            <label class="form-check-label" for="inlineCheckbox11">退款日期</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="inlineCheckbox12" value="order_edit_date">
                            <label class="form-check-label" for="inlineCheckbox12">修改日期</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="inlineCheckbox13" value="member_valid">
                            <label class="form-check-label" for="inlineCheckbox13">valid</label>
                        </div>
                        <button class="btn btn-primary my-2 my-sm-0 py-0 mr-1 align-top" type="submit">搜尋</button>
                    </form> -->


                    <!-- DataTales Example -->
                    <div class="card shadow mb-4 my-4">
                        <div class="card-header py-3 d-flex align-content-center justify-content-between">
                            <h6 class="m-0 font-weight-bold text-primary">會員列表</h6>
                            <button class="btn btn-outline-primary my-2 my-sm-0 py-0" type="button" data-toggle="modal"
                                data-target="#create_member">+ 新增活動訂單</button>
                        </div>

                        <div class="d-flex align-content-center justify-content-between">

                                <button class="btn btn-danger my-sm-0 p-0 px-1"
                                        type="submit" data-toggle="modal"
                                        data-target="#deleteAll" >刪除所選項目</button>
                                <div class="d-flex">
                                

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
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLongTitle">新增活動訂單</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="container-fluid" style="padding-bottom: 3rem">

                                            <!-- Page Heading -->
                                            <form action="new_event.php" method="post">
                                            <!-- <div class="form-group col-10">
                                                    <label for="e_order_id">訂單編號</label>
                                                    <input id="order_id" type="number" class="form-control" name="e_order_id" required
                                                        placeholder="">
                                                </div> -->
                                                <div class="form-group col-10">
                                                    <label for="e_event_name">活動名稱</label>
                                                    <input type="text" class="form-control" name="event_name" required
                                                        placeholder="">
                                                </div>
                                                <div class="form-group col-6">
                                                    <label for="e_purchaser_id">訂購人id</label>
                                                    <input type="number" class="form-control" name="purchaser_id" required
                                                        placeholder="">
                                                </div>
                                                <div class="form-group col-6">
                                                    <label for="e_purchaser_name">訂購人名字</label>
                                                    <input type="text" class="form-control" name="purchaser_name" required
                                                        placeholder="">
                                                </div>
                                                <div class="form-group col-6">
                                                    <label for="e_order_create_time">訂單成立時間</label>
                                                    <input type="date" class="form-control" name="order_create_time" required
                                                        placeholder="">
                                                    <!-- <small id="emailHelp" class="form-text text-muted"></small> -->
                                                </div>
                                                <div class="form-group col-6">
                                                    <label for="e_order_fee">訂單費用</label>
                                                    <input type="number" class="form-control" name="order_fee" required
                                                        placeholder="">
                                                </div>
                                                <div class="form-group col-6">
                                                    <label for="e_order_paid" class="mr-sm-2" for="member_ptex">已付款: </label>
                                                    <select class="custom-select mr-sm-2" name="order_paid">
                                                        <option selected></option>
                                                        <option value="Yes">yes</option>
                                                        <option value="No">no</option>
                                                    </select>
                                                </div>
                                                <div class="form-group col-6">
                                                    <label for="e_payment_date">付款日期</label>
                                                    <input type="date" class="form-control" name="payment_date" 
                                                        placeholder="">
                                                </div>
                                                <div class="form-group col-6">
                                                <label for="e_order_refunded" class="mr-sm-2" for="member_ptex">已退款: </label>
                                                <select class="custom-select mr-sm-2" name="order_refunded">
                                                        <option selected></option>
                                                        <option value="Yes">yes</option>
                                                        <option value="No">no</option>
                                                    </select>
                                                </div>
                                                <div class="form-group col-6">
                                                    <label for="e_order_refund_amount">退款金額</label>
                                                    <input type="number" class="form-control" name="order_refund_amount" 
                                                        placeholder="">
                                                </div>
                                                <div class="form-group col-6">
                                                    <label for="e_refund_date">退款日期</label>
                                                    <input type="date" class="form-control" name="refund_date" 
                                                        placeholder="">
                                                </div>
                                                <div class="form-group col-6">
                                                    <label for="e_order_edit_date">修改日期</label>
                                                    <input type="date" class="form-control" name="order_edit_date"
                                                        placeholder="">
                                                </div>
                                                <!-- <div class="form-group col-6">
                                                    <label for="member_name">valid</label>
                                                    <input type="text" class="form-control" name="valid" required
                                                        placeholder="">
                                                </div> -->
                                                <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal" >取消</button>
                                        <input type="submit" class="btn btn-info"  value="新增" >
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
                                    <th scope="row" class="text-nowrap">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="" id="selected_all" onclick="select_all(this,'select_event')">
                                                <label class="form-check-label" for="defaultCheck1">
                                                    全選
                                                </label>
                                            </div>
                                        </th>
                                        <th scope="col" class="text-nowrap">訂單編號</th>
                                        <th scope="col" class="text-nowrap">活動名稱</th>
                                        <th scope="col" class="text-nowrap">訂購人id</th>
                                        <th scope="col" class="text-nowrap">訂購人名字</th>
                                        <th scope="col" class="text-nowrap">訂單成立時間</th>
                                        <th scope="col" class="text-nowrap">訂單費用</th>
                                        <th scope="col" class="text-nowrap">已付款</th>
                                        <th scope="col" class="text-nowrap">付款日期</th>
                                        <th scope="col" class="text-nowrap">已退款</th>
                                        <th scope="col" class="text-nowrap">退款金額</th>
                                        <th scope="col" class="text-nowrap">退款日期</th>
                                        <th scope="col" class="text-nowrap">修改日期</th>
                                        <!-- <th scope="col" class="text-nowrap">valid</th> -->
                                        <th scope="col" class="text-nowrap">修改/刪除</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        if ($result_list->num_rows>0){
                                            while ($row=$result_list->fetch_assoc()) { 
                                            $test = $row["order_id"];  ?>

                                        <tr>
                                            <td scope="col" class="text-center">
                                                    <div class="form-check" onclick="select(<?php echo $id; ?>)">
                                                       
                                                            <input class="form-check-input position-static" type="checkbox" name="select_event"  id="<?php echo $row["event_id"]?>">
                                                        
                                                    </div>

                                            </td>                                            
                                            <td id="<?=$test?>" scope="row" class="text-center"><?=$row["order_id"] ?></td>
                                            <td scope="col" class="text-nowrap text-left"><?=$row["event_name"] ?></td>
                                            <td scope="col" class="text-center"><?=$row["purchaser_id"]?></td>
                                            <td scope="col" class="text-nowrap text-center"><?=$row["purchaser_name"]?></td>
                                            <td scope="col" class="text-nowrap text-left"><?=$row["order_create_time"]?></td>
                                            <td scope="col" class="text-nowrap text-center"><?=$row["order_fee"]?></td>
                                            <td scope="col" class="text-nowrap text-center"><?=$row["order_paid"]?></td>
                                            <td scope="col" class="text-nowrap text-center"><?=$row["payment_date"]?></td>
                                            <td scope="col" class="text-nowrap text-center"><?=$row["order_refunded"]?></td>
                                            <td scope="col" class="text-nowrap text-center"><?=$row["order_refund_amount"]?></td>
                                            <td scope="col" class="text-nowrap text-center"><?=$row["refund_date"]?></td>
                                            <td scope="col" class="text-nowrap text-center"><?=$row["order_edit_date"]?></td>
                                            <!-- <th scope="col" class="text-center"><?=$row["vaild"]?></th> -->
                                            <th scope="col d-flex edit" class="text-nowrap text-center">
                                                <button class="btn btn-info my-2 my-sm-0 py-1 mr-1" type="button" data-toggle="modal"
                                                    data-target="#edit_s_report" onclick="edit_event(<?php echo $test; ?>)"><i class="far fa-edit"></i></button>
                                                <button class="btn btn-warning my-2 my-sm-0 py-1" data-toggle="modal" 
                                                     data-target="#delete" onclick="doDelete(<?php echo $test; ?>)"><i class="fas fa-user-minus"></i></button>
                                            </th>
                                        </tr>
                                            <?php  
                                        }}?>
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
                                        <a class="page-link" href="temp_event.php?page=<?php if ($page != 1) {
                                                                                        echo ($page - 1);
                                                                                    } else {
                                                                                        echo $page = 1;
                                                                                    } ?>&searchdata=<?= $searchdata ?>" aria-label="Previous">
                                            <span aria-hidden="true">&laquo;</span>
                                            <span class="sr-only">Previous</span>
                                        </a>
                                    </li>
                                    <?php for ($i=1; $i<=$total_page; $i++){?>
                                        
                                        <li class="page-item <?php if ($page == $i) {
                                                                echo "active";
                                                            } ?>">
                                        <a class="page-link" href="temp_event.php?page=<?=$i?>&searchdata=<?= $searchdata ?>"><?=$i?></a></li>
                                        <?php  } ?>                

                                    <li class="page-item ">
                                        <a class="page-link" href="temp_event.php?page=<?php if ($page < $total_page) {
                                                                                        echo ($page + 1);
                                                                                    } else {
                                                                                        echo $page = 1;
                                                                                    }  ?>&searchdata=<?= $searchdata ?>" aria-label="Next">
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
                                <a class="btn btn-primary" href="../logout.php">登出</a>
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
                <div class="modal fade" id="edit_s_report" tabindex="-1" role="dialog"
                            aria-labelledby="edit_s_reportTitle" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLongTitle">編輯活動訂單</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="container-fluid" style="padding-bottom: 3rem">

                                            <!-- Page Heading -->
                                            <form action="revise_event.php" method="post">
                                            <div class="form-group col-4">
                                                    <label for="order_id">訂單編號</label>
                                                    <input id="a" type="text" class="form-control" name="a" required
                                                         value="">
                                                </div>
                                                <div class="form-group col-10">
                                                    <label for="event_name">活動名稱</label>
                                                    <input id="event_name2" type="text" class="form-control" name="event_name2" required
                                                        placeholder="">
                                                </div>
                                                <div class="form-group col-6">
                                                    <label for="purchaser_id">訂購人id</label>
                                                    <input id="purchaser_id" type="text" class="form-control" name="purchaser_id" required
                                                        placeholder="">
                                                </div>
                                                <div class="form-group col-6">
                                                    <label for="purchaser_name">訂購人名字</label>
                                                    <input id="purchaser_name" type="text" class="form-control" name="purchaser_name" required
                                                        placeholder="">
                                                </div>
                                                <div class="form-group col-6">
                                                    <label for="order_create_time">訂單成立時間</label>
                                                    <input id="order_create_time" type="date" class="form-control" name="order_create_time" required
                                                        placeholder="">
                                                </div>
                                                <div class="form-group col-6">
                                                    <label for="order_fee">訂單費用</label>
                                                    <input id="order_fee" type="number" class="form-control" name="order_fee" required
                                                        placeholder="">                                                   
                                                </div>
                                                <div class="form-group col-6">
                                                    <label for="order_paid">已付款</label>
                                                    <input id="order_paid" type="text" class="form-control" name="order_paid" 
                                                        placeholder="">
                                                </div>
                                                <div class="form-group col-6">
                                                    <label for="payment_date">付款日期</label>
                                                    <input id="payment_date" type="date" class="form-control" name="payment_date"
                                                        placeholder="">
                                                </div>
                                                <div class="form-group col-6">
                                                    <label for="order_refunded">已退款</label>
                                                    <input id="order_refunded" type="text" class="form-control" name="order_refunded"
                                                        placeholder="">
                                                </div>
                                                <div class="form-group col-6">
                                                    <label for="order_refund_amount">退款金額</label>
                                                    <input id="order_refund_amount" type="number" class="form-control" name="order_refund_amount">
                                                </div>
                                                <div class="form-group col-6">
                                                    <label for="refund_date">退款日期</label>
                                                    <input id="refund_date" type="date" class="form-control" name="refund_date">
                                                </div>
                                                <div class="form-group col-6">
                                                    <label for="order_edit_date">修改日期</label>
                                                    <input id="order_edit_date" type="date" class="form-control" name="order_edit_date" 
                                                    placeholder="">
                                                </div>                    
                                            
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">取消</button>
                                        <input type="submit" class="btn btn-primary" value="儲存">
                                            </form>
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
<script>
    function edit_event(test){
        // console.log(test1);
        let strtest = test.toString();
        let o_id = document.getElementById(strtest).innerHTML;
        // console.log(o_id);

        var test;
        $.ajax({
            method: "POST",
            url: "edit_event.php",
            dataType: "json",
            data: { o_id: o_id
            
            }

        })

        .done(function(response){

            // console.log(response);

        test = response;
        // console.log(test);
        //    console.log(typeof(test)) 
        
        // console.log (test['e_order_id']);

        // document.getElementById("order_id").getAttribute("value");
        // document.getElementById("a").setAttribute("value","");
        document.getElementById("a").value= test['e_order_id']
        // console.log( document.getElementById("a"));
        document.getElementById("event_name2").value = test["e_event_name"];
        document.getElementById("purchaser_id").value = test["e_purchaser_id"];
        document.getElementById("purchaser_name").value = test["e_purchaser_name"];
        document.getElementById("order_create_time").value = test["e_order_create_time"];
        document.getElementById("order_fee").value = test["e_order_fee"];
        document.getElementById("order_paid").value = test["e_order_paid"];
        document.getElementById("payment_date").value = test["e_payment_date"];
        document.getElementById("order_refunded").value = test["e_order_refunded"];
        document.getElementById("order_refund_amount").value = test["e_order_refund_amount"];
        document.getElementById("refund_date").value = test["e_refund_date"];
        document.getElementById("order_edit_date").value = test["e_order_edit_date"];

        }).fail(function(jqXHR, textStatus) {
            console.log("Request failed: " + textStatus);
        });
    }

        var delete_id;

        function doDelete(test) {
            delete_id = test.toString();
            
        }
      

        function comfdelete() {
            console.log(delete_id);

            $.ajax({
            method: "POST",
            url: "delete_event.php",
            dataType: "json",
            data: { delete_id: delete_id
            
            }

        })
        .done(function(response){

            console.log(response);
            window.location.replace(location.href);
        }).fail(function(jqXHR, textStatus){
            console.log("Request failed: " +  textStatus);
        });
        }
        

        var selected = [];
        var total;
                    function select_all(member,select_event){
                        var checkboxs = document.getElementsByName(select_event); //抓列表中的每一個框框
                        var all = document.getElementById("selected_all");
                        if (all.checked){
                            for(var i=0;i<checkboxs.length;i++){
                                checkboxs[i].checked = member.checked; //把每一個方塊打勾
                                    selected[i] = checkboxs[i].id; //把每一個id的值傳入selected[]
                            }
                        }else{
                            for(var i=0;i<checkboxs.length;i++){
                                checkboxs[i].checked = member.checked;
                                if(selected.includes(checkboxs[i].id)){ //檢查checkboxs[i]有沒有在selected[]裡
                                    selected = selected.filter(function(item) {
                                        return item != checkboxs[i].id
                                    }); //刪掉有在selected裡的項目
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





















        // $.ajax({
        //     method: "POST",
        //     url: "edit_event.php",
        //     dataType: "json",
        //     data: {
        //         event_name: event_name,
        //         purchaser_id: purchaser_id,
        //         purchaser_name: purchaser_name,
        //         order_create_time: order_create_time,
        //         order_fee: order_fee,
        //         order_paid: order_paid,
        //         payment_date: payment_date,
        //         order_refunded: order_refunded,
        //         order_refund_amount: order_refund_amount,
        //         refund_date: refund_date,
        //         order_edit_date: order_edit_date
        //     }
        // })
        //     .done(function( response ) {
        //         console.log(response)
        //         if (response.status==0){
        //             alert(response.message);
        //         }else {
        //             location.href="loginSuccess.php"
        //         }

        //     }).fail(function( jqXHR, textStatus ) {
        //     console.log( "Request failed: " + textStatus );
        // });

    // }
</script>
</body>


</html>
<?php
$conn->close();
?>