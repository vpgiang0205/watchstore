<?php

	$thongbao="";
		if(isset($_POST['goihamxuly']))
		{
			$lenhsuly=$_POST['goihamxuly'];		
			if($lenhsuly=='themsanpham')
				$thongbao=them_qua();	
			else if($lenhsuly=='xoasanpham')
				$thongbao=xoa_sp();	
			else if($lenhsuly=='suasanpham')
				$thongbao=sua_sp();				
		}
//ham xoa sanpham
function xoa_sp()
{
	
	global $ung;
		if(isset($_POST['masp']))
		$masp=$_POST['masp'];
		
		//kiem tra loai sanpham co ton tai trong chi tiet don dat hang nao khong
		$strSQL="SELECT COUNT(*) FROM ct_dondathang WHERE ma_sp ='{$masp}'";
		$ctdathang=mysqli_query($ung,$strSQL);
		$row=mysqli_fetch_assoc($ctdathang);
		if(@$row[0]>0)
			return "Bạn Không Thể Xóa Sản Phẩm Đã Có Trong Chi Tiết Hóa Đơn!";
		//neu khong co the xoa
		
		$strSQL="DELETE from sanpham WHERE ma_sp={$masp}";
		mysqli_query($ung,$strSQL);
		
		return "Đã Xóa Thành Công";
		
}		
//ham them sanpham
function them_qua()
{
	global $ung;
		if(isset($_POST['tensanpham']))
			$tensanpham=$_POST['tensanpham'];
			
		if(isset($_POST['loaisanpham']))
			$loaisanpham=$_POST['loaisanpham'];	
		
		if(isset($_POST['giasp']))
			$giasp=$_POST['giasp'];
			
		if(isset($_POST['mota']))
			$mota=$_POST['mota'];
			
		if(isset($_POST['hinhanh']))
			$hinhanh=$_POST['hinhanh'];
		
		if(isset($_POST['trangthai']))
			$trangthai=$_POST['trangthai'];
			
		//kiem tra xem ten sanpham co bi trung hay khong
		$strSQL="SELECT COUNT(*) from sanpham WHERE ten_sp='{$tensanpham}'";
		$sanpham=mysqli_query($ung,$strSQL);
		$row=mysqli_fetch_array($sanpham);
		
		if($row[0]>0)
			return "Tên Sản Phẩm Đã Tồn Tại, Bạn Hãy Chọn Tên Khác";
		//neu khong trung ten luu vao csdl
		
		$strSQL="INSERT INTO sanpham(ten_sp,ma_loai,gia,mo_ta,hinh_anh,trang_thai) 
			VALUES ('{$tensanpham}',{$loaisanpham},'{$giasp}','{$mota}','{$hinhanh}','{$trangthai}')";
		mysqli_query($ung,$strSQL);
			
			return "Đã Thêm Thành Công Sản Phẩm Váo Cơ Sở Dữ Liệu";
		
}
function sua_sp()
{
	global $ung;
		if(isset($_POST['masp']))
			$masp=$_POST['masp'];
			
		if(isset($_POST['tensanpham']))
			$tensanpham=$_POST['tensanpham'];
			
		if(isset($_POST['loaisanpham']))
			$loaisanpham=$_POST['loaisanpham'];	
		
		if(isset($_POST['giasp']))
			$giasp=$_POST['giasp'];
			
		if(isset($_POST['mota']))
			$mota=$_POST['mota'];
			
		if(isset($_POST['hinhanh']))
			$hinhanh=$_POST['hinhanh'];
			
		if(isset($_POST['trangthai']))
			$trangthai=$_POST['trangthai'];
			
		//kiem tra xem ten sanpham co bi trung hay khong
		//$strSQL="SELECT COUNT(*) from sanpham WHERE ten_sp='{$tensanpham}'";
		//$sanpham=mysqli_query($ung,$strSQL);
		//$row=mysqli_fetch_array($sanpham);
		//if($row[0]>0)
			//return "Tên sanpham Đã Tồn Tại, Bạn Hãy Chọn Tên Khác";
		
		//neu khong trung ten luu thong tin da thay  vao csdl
		
		$strSQL="UPDATE sanpham SET ten_sp='{$tensanpham}',ma_loai={$loaisanpham},gia='{$giasp}',mo_ta='{$mota}',hinh_anh='{$hinhanh}',trang_thai='{$trangthai}'
			WHERE ma_sp={$masp}";
		mysqli_query($ung,$strSQL);
			
			return "Đã Lưu Thành Công Thay Đỗi Của Bạn";
		
}

//in thong bao

if($thongbao !="")
{
echo "<div style='width:587px; margin-left:3px; margin-right:3px;'>";
echo "<table width='587' cellpadding='0' cellspacing='0' border='0' style='border:#E9E9E9 1px solid; margin-top:3px;'>";
echo "<tr>";
echo "<td>";

echo "<p class='pp'><center><span style='color:#FF9900;'>{$thongbao}</span>"; 
echo "<br />";
echo "<br />";
?>
<center><a href="#" onclick="adm_chuyentrang('quanlyqua')">Bấm Vào Đây Để Về Trang Quản Lý Sản Phẩm</a></center>
<?php
echo "</p>";
echo "</td>";
echo "</tr>";
echo "</table>";
echo "</div>";
}
?>