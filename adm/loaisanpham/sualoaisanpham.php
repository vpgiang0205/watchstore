<?php
	if(isset($_POST['maloaisanpham']))
		$maloaisanpham=$_POST['maloaisanpham'];
		
	$strSQL="SELECT * FROM loai_sanpham WHERE ma_loai={$maloaisanpham}";
	$loaisanpham=mysqli_query($ung,$strSQL);
	$row=mysqli_fetch_array($loaisanpham);
?>
<form action="" method="post" name="themloaisanpham">
<table cellpadding="0" cellspacing="0" border="0" align="center">
	<tr>
		<td align="center" colspan="2" height="35">
		Sửa Tên Loại Sản Phẩm
		</td>
	</tr>
	<tr>
		<td align="right"  height="30">
				<input name="tenloaisanpham" type="text" value="<?php echo $row['ten_loai']; ?>" style="width:200px;" maxlength="30">
		</td>
		<td align="left"  height="30">
				<input name="trangchuyen" type="hidden" value="xlloaisanpham" />
				<input name="goihamxuly" type="hidden" value="sualoaisanpham" />
				<input name="maloaisanpham" type="hidden" value="<?php echo $row['ma_loai']; ?>" />
				
		  		<input type="submit" name="Submit" value="Sửa" style="background:#FFFFFF; width:100px;">
		 </td>
	</tr>
</table>
				
</form>
