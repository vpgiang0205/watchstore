<?php
	$thongbao="";
	if(isset($_POST['goihamxuly']))
	{
		$lenhxuly=$_POST['goihamxuly'];
		if($lenhxuly=='xoaloaihang')
			$thongbao=xoa_loai_sanpham();
		else if($lenhxuly=='themloaihang')
			$thongbao=them_loai_sanpham();
		else if($lenhxuly=='sualoaisanpham')
			$thongbao=sua_loai_sanpham();
	}
// ham xoa loai sản phẩm
function xoa_loai_sanpham()
{
	global $ung;
	if(isset($_POST['maloaisanpham']))
		$maloaisanpham=$_POST['maloaisanpham'];
	//kiem tra xem loai sản phẩm co lien sanphamn den 
	$strSQL="SELECT COUNT(*) from sanpham WHERE ma_loai={$maloaisanpham}";
	$sanpham=mysqli_query($ung,$strSQL);
	$row=mysqli_fetch_array($sanpham);
	
	if($row[0]>0)
		return "Không Thể Xóa Loại Đồng Hồ Đã Có Sản Phẩm";
	//neu khong co sanpham lien quan thi co the xoa
	$strSQL="DELETE FROM loai_sanpham WHERE ma_loai={$maloaisanpham}";
	mysqli_query($ung,$strSQL);
	return "Xóa Thành Công Loại Đồng Hồ";
}
// ham them loai sanpham
function them_loai_sanpham()
{
	global $ung;
	if(isset($_POST['tenloaisanpham']))
		$tenloaisanpham=$_POST['tenloaisanpham'];
	//kiem tra loai sanpham co trung ten voi loai sanpham da co hay ko
		$strSQL="SELECT COUNT(*) FROM loai_sanpham WHERE ten_loai ='{$tenloaisanpham}'";
		$loaisanpham=mysqli_query($ung,$strSQL);
		$row=mysqli_fetch_array($loaisanpham);
		if($row[0]>0)
			return "Loại sản phẩm Này Đã Tồn Tại! Bạn Hãy Chon Tên Khác";
	//neu khong trung ten luu vao csdl
		$strSQL="INSERT INTO loai_sanpham(ten_loai) VALUES('{$tenloaisanpham}')";
		mysqli_query($ung,$strSQL);
	return "Thêm Thành Công Loai sản phẩm: {$tenloaisanpham} Vào Cơ Sở Dữ Liệu!";
}
// ham sua loai sản phẩm
function sua_loai_sanpham()
{	
	global $ung;
	if(isset($_POST['maloaisanpham']))
		$maloaisanpham=$_POST['maloaisanpham'];
	if(isset($_POST['tenloaisanpham']))
		$tenloaisanpham=$_POST['tenloaisanpham'];
	//kiem tra loai sản phẩm co trung ten voi loai sản phẩm da co hay ko
		$strSQL="SELECT COUNT(*) FROM loai_sanpham WHERE ten_loai ='{$tenloaisanpham}'";
		$loaisanpham=mysqli_query($ung,$strSQL);
		$row=mysqli_fetch_array($loaisanpham);
		if($row[0]>0)
			return "Loại Sản Phẩm Này Đã Tồn Tại! Bạn Hãy Chon Tên Khác";
	//neu khong trung ten luu vao csdl
		
		$strSQL="UPDATE loai_sanpham SET ten_loai='{$tenloaisanpham}' WHERE ma_loai={$maloaisanpham}";
		mysqli_query($ung,$strSQL);
		
		return "Sửa Thành Công!";
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
<center><a href="#" onclick="adm_chuyentrang('quanlyloaisanpham')">Bấm Vào Đây Để Về Trang Quản Lý Loại Sản Phẩm</a></center>
<?php
echo "</p>";
echo "</td>";
echo "</tr>";
echo "</table>";
echo "</div>";
}

?>
