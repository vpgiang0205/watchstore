<?php 
	if(isset($_POST['masp']))
		$masp=$_POST['masp'];
		
	$strSQL="SELECT * from sanpham WHERE ma_sp={$masp}";
	$quasua=mysqli_query($ung,$strSQL);
	$rowsua=mysqli_fetch_array($quasua);
	
?>
<form action="" method="post" name="themsanpham">
 <table width="750" height="132" border="0" cellpadding="2" cellspacing="0" class="admintable" style="border-right:#E9E9E9 1px solid; border-top:#E9E9E9 1px solid;" align="right">
    <tr>
		<th colspan="2" align="center">
		Thay Đổi Thông Tin sản phẩm		</th>
	</tr>
	<tr>
      <td colspan="2" align="left">
	  		&nbsp;&nbsp;Tên sản phẩm:
        		<input name="tensanpham" type="text" id="tensanpham" maxlength="30" style="width:180px;" value="<?php echo $rowsua['ten_sp']; ?>" />
        	&nbsp;&nbsp;Loại sản phẩm:
		<select name="loaisanpham">
			<?php 
			$strSQL="SELECT * FROM loai_sanpham";
			$loaisanpham=mysqli_query($ung,$strSQL);
			while($rowloai=mysqli_fetch_array($loaisanpham)) { ?>
			<option value="<?php echo $rowloai['ma_loai']; ?>"><?php echo $rowloai['ten_loai']; ?></option>
			<?php } ?>
        </select>   
			&nbsp;&nbsp;Giá:
          	  	<input name="giasp" type="text" id="giasp" maxlength="30" style="width:100px;" value="<?php echo $rowsua['gia']; ?>"/>
			&nbsp;&nbsp;&nbsp;Trạng Thái: 
				<select name="trangthai">
					<option value="0">Bình Thường</option>
					<option value="1">Đặc Biệt</option>
        		</select>
		</td>
    </tr>
    <tr>
      <td width="100">&nbsp;&nbsp;Mô Tả </td>
      <td width="650">
	  	<textarea name="mota" cols="104" rows="4" style="border-right:none;"><?php echo $rowsua['mo_ta']; ?></textarea></td>
    </tr>
    <tr>
      <td>&nbsp;&nbsp;Hình Ảnh </td>
      <td>
	  	<input name="hinhanh" type="text" id="hinhanh" maxlength="50" style="width:400px;" value="<?php echo $rowsua['hinh_anh']; ?>" >
  		<input type="button" name="Button" value="Upload" onClick="window.open('sanpham/Upload.php','','width=500,height=150, status=false')">	  </td>
    </tr>
    <tr>
      <td colspan="2" align="center">
		<input name="trangchuyen" type="hidden" value="xlsanpham" />
		<input name="goihamxuly" type="hidden" value="suasanpham" />
		<input name="masp" type="hidden" value="<?php echo $rowsua['ma_sp']; ?>" />
		
        <input type="submit" name="Submit" value="Cập Nhật" />    
	  </td>
    </tr>
  </table>
</form>































 