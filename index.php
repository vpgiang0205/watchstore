<?php 
	session_start();
 	include('include/ketnoi.php'); 
	//kiem Tra Dang Nhap
	$thongbaoTK="";
	if(isset($_POST['txttendangnhap']) && isset($_POST['txtpass']))
	{	
		$tendangnhap=$_POST['txttendangnhap'];
		$pass=$_POST['txtpass'];
		
		$strSQL="SELECT *  FROM khach_hang WHERE ten_dn = '{$tendangnhap}' AND mat_khau = '{$pass}'";
		$khachhang=mysqli_query($ung,$strSQL);
		
		//Kiem Tra Du Lieu-Neu Co Luu Vao SS-Neu Khong Bao Loi//
		if(mysqli_num_rows($khachhang)>0)
		{
			//lay ten luu vao SS//
			$rowDN=mysqli_fetch_array($khachhang);
			$_SESSION['hovaten']=$rowDN['ho_kh']." ".$rowDN['ten_kh'];
			$_SESSION['makhachhang']=$rowDN['ma_kh'];
		}
		else
			$thongbaoTK="Sai Tên Đăng Nhập Hoặc Mật Khẩu";
	}
	
?>
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="style.css">
<title>Website ban dong ho</title>
<link rel="stylesheet" type="text/css" href="css/demo.css" />

<title>
<?php 
$view="trang chu";
if(isset($_REQUEST['view']))
{$view=$_REQUEST['view'];
if($view==""){
echo "Trang Chủ";
}
else
	echo $view; 
}
?>
</title>
<script language="javascript" src="include/giohang/Calendar.js">
</script>
<link href="include/giohang/Calendar.css" rel="stylesheet" type="text/css" />
</head>
<style type="text/css">
body{
	width: 100%;
	background: url(./images/wb.jpg);
	height: auto;
	background-size: cover;
	background-position: center; 

}
</style>
<body>
<div class="wrapper">

		<div class="box" style="border:#CCCCCC 1px solid; margin-top:3px;">
			
				<div class="banner">
					<?php include('banner.php'); ?>
					
				</div>
			
					<table width="813" cellpadding="0" cellspacing="0" border="0"style="border:#CCCCCC 1px solid; margin-top:3px;">
						<tr>
						<td valign="top">
							<div>
							<?php include('menuleft.php');?>
							</div>
							</td>
							<td width="593" valign="top">
							<?php 
								if(isset($_REQUEST['view']))
								{
									$manhinh=$_REQUEST['view'];
									
									if($manhinh=='trangchu')	
										include_once('include/main.php');
									else if($manhinh=='gioithieu')
										include_once('include/dichvu/gioithieu.php');
									else if($manhinh=='dichvu')
										include_once('include/dichvu/dichvu.php');
									else if($manhinh=='dathang')
										include_once('include/giohang/giohang.php');
									else if($manhinh=='lienhe')
										include_once('include/dichvu/lienhe.php');
									else if($manhinh=='sanpham')
										include_once('include/sanpham/sanpham.php');
									else if($manhinh=='tintuc')
										include_once('include/tintuc/danhmuctin.php');
									else if($manhinh=='chitiet')
										include_once('include/sanpham/sanphamchitiet.php');
									else if($manhinh=='chitiettintuc')
										include_once('include/tintuc/chitiet.php');
										
									//////////////////////////////////////////////////////	
									else if($manhinh=='dangky')
										include_once('include/taikhoan/dangky.php');
									else if($manhinh=='thongtintaikhoan')
										include_once('include/taikhoan/thongtin.php');		
									// else if($manhinh=='timmatkhau')
									// 	include_once('include/taikhoan/timmatkhau.php');	
									/////////////////////////////////////////////////////	
									else if($manhinh=='xltaikhoan')
										include_once('include/taikhoan/xl_taikhoan.php');	
									else if($manhinh=='xllienhe')
										include_once('include/dichvu/xl_lienhe.php');	
									/////////////////////////////////////////////////////	
									else if($manhinh=='manhinhtimkiem')
										include_once('include/timkiem/ketquatim.php');
									else if($manhinh=='timnangcao')
										include_once('include/timkiem/ketquatimkiemnangcao.php');
										
									else echo"<center>Không Có Dữ Liệu</center>";
									}
								else
									include_once('include/main.php');
							?>
							
							</td>
							
							<td width="220" valign="top">
							<?php include("menuright.php");?>
							
							</td>
						</tr>
					</table>
					<div>
									<?php include("bottom.php") ?>
									</div>
	</div>
	
</div>
	
</body>
</html>
