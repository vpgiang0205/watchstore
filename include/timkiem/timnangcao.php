<?php
	$strSQL="SELECT * FROM loai_sanpham";
	$loaisanpham=mysqli_query($ung,$strSQL);
	
	$strSQL="SELECT * from sanpham";
	$qua=mysqli_query($ung,$strSQL);
	
	if(isset($_POST['txttim']))
		$tukqua=$_POST['txttim'];
		
	if(isset($_POST['txtmota']))
		$mota=$_POST['txtmota'];
		
	if(isset($_POST['loaisanpham']))
		$maloaisanpham=$_POST['loaisanpham'];
	
	
?>
<div style="width:587px; margin-left:3px; margin-right:3px;">
	<table width="587" border="0" cellpadding="0" cellspacing="0">
		<tr>
			<td style="height:25px; background:black; color:white;" align="center" class="ht" colspan="3">
				Tìm Kiếm Nâng Cao
			</td>
		</tr>
		<tr>
			<td>
				<form action="" method="post" name="timkiem_nangcao">
					<input name="view" type="hidden" value="timnangcao" />
					<table width="587" height="120" cellpadding="0" cellspacing="0" border="0" style="border:#CCCCCC 1px solid; margin-top:3px;">
					<tr>
					  <td height="30" width="30%" align="center">
					  	Tên Sản Phẩm
						</td>
						 <td height="30" width="70%">
							<input name="txttim" type="text" id="txttim" style="width:300px;" value="">
						</td>
				</tr>
				<tr>
					<td align="center">
						Mô Tả
						</td>
						<td>		
							<input name="txtmota" type="text" id="txtmota" style="width:300px;" value="">
					</td>
				</tr>
				<tr>
					<td align="center">		
						Loại Sản Phẩm
					</td>
					<td>
							<select name="loaisanpham">
                              <option value="0">----Tên Loại Sản Phẩm----</option>
							 <?php while($row=mysqli_fetch_array($loaisanpham)) { ?>
								<?php if($row['ma_loai']==$maloaisanpham) { ?>
							  	<option value="<?php echo $row['ma_loai']; ?>" selected="selected" ><?php echo $row['ten_loai']; ?></option>
								<?php } else { ?>
								<option value="<?php echo $row['ma_loai']; ?>"><?= $row['ten_loai']; ?></option>
							  <?php } ?>
							 <?php } ?>
                            </select>						
							</td>
				</tr>
				<tr>	
					<td colspan="2" align="center">		
							<input name="Button" type="button" style="background:#FFFFFF; width:100px;" value="Tìm" 
							onClick="timkiemnangcao_onsubmit()">
					</td>

					</tr>
					</table>
				</form>
			</td>
		</tr>
	</table>
</div>
	<script>
		function timkiemnangcao_onsubmit()
		{
		timkiem_nangcao.submit()
		}
	</script>
