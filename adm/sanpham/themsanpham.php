<?php 
	$strSQL="SELECT * FROM loai_sanpham";
	$loaisanpham=mysqli_query($ung,$strSQL);

?>
<form action="" method="post" name="themsanpham">
  <table width="750" height="132" border="0" cellpadding="2" cellspacing="0" class="admintable" style="border-right:#E9E9E9 1px solid; border-top:#E9E9E9 1px solid;" align="right">
    <tr>
		<th colspan="2" align="center">
		Thêm Sản Phẩm Mới		
	</th>
	</tr>
	<tr>
      <td colspan="2" align="left">
	  		&nbsp;&nbsp;Tên Sản Phẩm:
        		<input name="tensanpham" type="text" id="tensanpham" maxlength="30" style="width:180px;" />
        	&nbsp;&nbsp;Loại Sản Phẩm:
				<select name="loaisanpham">
					<?php while($row=mysqli_fetch_array($loaisanpham)) { ?>
					<option value="<?php echo $row['ma_loai']; ?>"><?php echo $row['ten_loai']; ?></option>
					<?php } ?>
        		</select>
			&nbsp;&nbsp;Giá:
          	  	<input name="giasp" type="text" id="giasp" maxlength="30" style="width:100px;" />
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
	  	<textarea name="mota" cols="104" rows="4"></textarea></td>
    </tr>
    <tr>
      <td>&nbsp;&nbsp;Hình Ảnh </td>
      <td>
	  	<input name="hinhanh" type="text" id="hinhanh" maxlength="50" style="width:400px;" >
  		<input type="button" name="Button" value="Upload" onClick="window.open('sanpham/Upload.php','','width=500,height=150, status=false')">	  </td>
    </tr>
    <tr>
      <td colspan="2" align="center">
	  	<input name="trangchuyen" type="hidden" value="xlsanpham" />
		<input name="goihamxuly" type="hidden" value="themsanpham" />
		
		<input type="reset" name="Submit2" value="Làm Lại" />
        <input type="submit" name="Submit" value="Thêm Mới" />    
	  </td>
    </tr>
  </table>
</form>