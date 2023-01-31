<?php
$ung= mysqli_connect("localhost","root","","csdldongho") or die('Khong The Ket Noi Voi May Chu');
	if(isset($_POST['maadmin']))
		$maadmin=$_POST['maadmin'];
		
		$strSQL="SELECT * FROM adm WHERE ma_adm={$maadmin}";
		$hitietadmin=mysqli_query($ung,$strSQL);
		$rowCTAD=mysqli_fetch_array($hitietadmin);
?>
<form action="" method="post" name="suaadmin">
  <table width="750" border="0" cellpadding="2" cellspacing="0" class="admintable" style="border-right:#E9E9E9 1px solid; border-top:#E9E9E9 1px solid;" align="right">
    <tr>
		<th colspan="2">
		Sửa Thông Tin Quản Trị Viên		</th>
	</tr>
	<tr>
		<td width="150">&nbsp;&nbsp;&nbsp;&nbsp;Tên Đăng Nhập:</td>
		<td width="600">
		<?php echo $rowCTAD['ten_dn']; ?>
		</td>
	</tr>
	<tr>
		<td>&nbsp;&nbsp;&nbsp;&nbsp;Mật Khẩu:</td>
		<td>
		<input name="matkhau" type="password" value="<?php echo $rowCTAD['mat_khau']; ?>" maxlength="30" style="width:200px;">		</td>
	</tr>
	<tr>
		<td colspan="2">
			&nbsp;&nbsp;Họ:&nbsp;&nbsp;<input name="ho" type="text" value="" maxlength="30" style="width:150px;">
			&nbsp;&nbsp;&nbsp;&nbsp;Tên:&nbsp;&nbsp;<input name="tenadmin" type="text" value="" maxlength="30" style="width:150px;">
			&nbsp;&nbsp;&nbsp;&nbsp;Giới Tính:  <select name="gioitinh">
													<option value="1">Không Xác Định</option>
													<option value="2" selected="selected">Nam</option>
													<option value="3">Nữ</option>
                              					  </select>		</td>
	</tr>
	<tr>
	  <td>
	    <input name="goiham" type="hidden" value="suaadmin" />
		<input name="trangchuyen" type="hidden" value="xladmin" />
		<input name="maadmin" type="hidden" value="<?php echo $rowCTAD['ma_adm']; ?>" />
		
	    <input type="submit" name="Submit" value="Hoàn Tất">
	  </td>
    </tr>
</table>
</form>
