
<?php
	//tim kiem nhanh
	$dieukien="";
	$tukhoa="";
	$strSQL="SELECT * FROM loai_sanpham";
	$loaisanpham=mysqli_query($ung,$strSQL);

	//kiem tra xem ten sanpham co duoc nhap vao hay khong
	if(isset($_POST['txttukhoa']))
		{
			$tukqua=$_POST['txttukhoa'];
			if($tukhoa!="")
			$dieukien="ten_sp Like '%{$tukhoa}%'";
		}	
	//kiem tra ma loai sanpham co duoc nhap vao hay khong
		if(isset($_POST['loaisanpham']))
		{
			$maloaisanpham=$_POST['loaisanpham'];
			if($maloaisanpham!="0")
				{
					if($dieukien!="")
						$dieukien=$dieukien."AND ma_loai = {$maloaisanpham}";
					else
						$dieukien="ma_loai = {$maloaisanpham}";	
				}
			
		}
		if($dieukien!="")
		$dieukien="WHERE ".$dieukien;
	//phan hien thi trang them va sua
	if(isset($_POST['chentrang']))
	{
		$chucnang=$_POST['chentrang'];
		if($chucnang=='themsanpham')
			include_once('themsanpham.php');
		else if($chucnang=='suasanpham')
			include_once('suasanpham.php');
	}

//phan trang
$strSQL="SELECT count(*) from sanpham {$dieukien}";
	$sanpham=mysqli_query($ung,$strSQL);
	$row=mysqli_fetch_array($sanpham);
	$sodong=$row[0];
	
	$kichthuoctrang=10;
		if(($sodong%$kichthuoctrang)==0)
				$tongsotrang=$sodong/$kichthuoctrang;
		else
				$tongsotrang=($sodong/$kichthuoctrang)+1;
			
			
	if(!isset($_POST['tranghienhanh']) || $_POST['tranghienhanh']=="1")
		{
			$dongbatdau=0;
			$tranghienhanh=1;
		}
	else
		{
			$dongbatdau=($_POST['tranghienhanh']-1)*$kichthuoctrang;
			$tranghienhanh=$_POST['tranghienhanh'];
		}
	
	$strSQL="SELECT * from sanpham {$dieukien} ORDER BY ma_sp desc Limit {$dongbatdau},{$kichthuoctrang}";
	$sanpham=mysqli_query($ung,$strSQL);
?>
<form name="timsp" action="" method="post">
<table width="450" cellpadding="2" cellspacing="0" border="0" align="right" bgcolor="#66A111" style="color:#FFFFCC"> 
<tr><td>
Tìm Kiếm:&nbsp;&nbsp;
</td>

<td>
<td>
							<select name="loaisanpham">
                              <option value="0">----Tên loại sản phẩm----</option>
							 <?php while($row=mysqli_fetch_array($loaisanpham)) { ?>
								<?php if($row['ma_loai']==$maloaisanpham) { ?>
							  	<option value="<?php echo $row['ma_loai']; ?>" selected="selected" ><?php echo $row['ten_loai']; ?></option>
								<?php } else { ?>
								<option value="<?php echo $row['ma_loai']; ?>"><?php echo $row['ten_loai']; ?></option>
							  <?php } ?>
							 <?php } ?>
                            </select>					
</td>
</td>


<td>
<input name="trangchuyen" type="hidden" value="quanlyqua" />
<input type="submit" value="Tìm" name="submit" />
</td></tr></table>
</form>

<table width="750" cellpadding="2" cellspacing="0" border="0" class="admintable" style="border-right:#E9E9E9 1px solid; border-top:#E9E9E9 1px solid;" align="right">
	<tr>
		<th width="40" align="center" style="border-left:#66A111 solid 1px;">
			STT
		</th>
		<th width="90" align="center">
			Mã sản phẩm
		</th>
		<th width="220">
			Tên sản phẩm
		</th>
		<th width="200">
			Thuộc Loại
		</th>
		<th width="200" colspan="2" style="background:#FFFFFF;" align="center">
			<a href="#" onclick="them_suasanpham('themsanpham')">Thêm sản phẩm</a>
		</th>
	</tr>
	<?php $i=$dongbatdau; ?>
		<?php while($row=mysqli_fetch_array($sanpham)) { $i+=1; ?>
	<tr>
	<?php 
		//xu ly mau cho dong
			if($i%2==0) 
				$mausac="style='background:#F8F8F8;'";
			 else 
			 	$mausac="style='background:#FFFFFF;'";
	?> 
		<td <?php echo $mausac; ?> >
			<?php echo $i; ?>
		</td>
		<td <?php echo $mausac; ?> >
			<?php echo $row['ma_sp']; ?>
		</td>
		<td <?php echo $mausac; ?> >
			<a href="#" onclick="them_suasanpham('suasanpham',<?php echo $row['ma_sp']; ?>)">
			<?php echo $row['ten_sp']; ?></a>
			
			<?php
				// hien trang thai cua sanpham
				if($row['trang_thai']==1)
					echo "<img src='../images/hot.gif' border='0'>";
			?>
		</td>
		<td <?php echo $mausac; ?> >
			<?php
				$strSQL="SELECT * FROM loai_sanpham WHERE ma_loai=$row[ma_loai]";
				$loaisanpham=mysqli_query($ung,$strSQL);
				$rowloai=mysqli_fetch_array($loaisanpham);
				echo $rowloai['ten_loai'];
			?>
		</td>
		<td width="100" align="center" <?php echo $mausac; ?>>
			<a href="#" onclick="them_suasanpham('suasanpham',<?php echo $row['ma_sp']; ?>)">Sửa</a>
		</td>
		<td width="100" align="center" <?php echo $mausac; ?>>
			<a href="#" onclick="xoa_sp(<?php echo $row['ma_sp']; ?>)">Xóa</a>
		</td>
	</tr>
		<?php } ?>
	<tr>
		<td colspan="6" height="30" align="center">
			<?php if((int)$tongsotrang>1) { ?>
				<?php 
					//xu ly review trang
					if((int)$tranghienhanh!=1)
					{
				?>
					<a href="#" class="page" onclick="sotrang(<?php echo $tranghienhanh-1 ?>) "> <img src="../images/review.jpg" border="0" /></a> 
					<?php } ?>
			
			<?php for($i=1; $i<=$tongsotrang; $i++ ) { ?>
				<?php if ((int)$tranghienhanh==$i) { ?>
					<a href="#" class="tranghientai" onclick="sotrang(<?php echo $i; ?>)"> <?php echo $i; ?></a>
					<?php } else  {?>	
					<a href="#" class="phantrang" onclick="sotrang(<?php echo $i; ?>)"> <?php echo $i; ?></a>
				<?php } ?>	
			<?php } ?>
				<?php 
					//xu ly next trang
					if((int)$tranghienhanh!=(int)$tongsotrang)
					{
					?>
				<a href="#" class="page" onclick="sotrang(<?php echo $tranghienhanh+1 ?>) "> <img src="../images/next.jpg" border="0" /></a>		
					<?php } ?>
		<?php } ?>		
			
		<?php if((int)$tongsotrang>1) { ?>
		  <select name="select" onchange="sotrang(this.value)" >
	   	   	<?php for($i=1; $i<=$tongsotrang; $i++ ) { ?>
					<?php if ($tranghienhanh==$i) { ?>
						<option value="<?php echo $i; ?>" selected="selected">Trang  <?php echo $i; ?></option>
					<?php } else  {?>
						<option value="<?php echo $i; ?>" >Đến Trang  <?php echo $i; ?></option>
					<?php } ?>			
			<?php } ?>			   
	   	</select> 
		<?php } ?>	
		</td>
	</tr>
</table>
<form action="" method="post" name="themvssua">
	<input name="chentrang" type="hidden" value="" />
	<input name="masp" type="hidden" value="" />
	<input name="trangchuyen" type="hidden" value="quanlyqua" />
</form>

<form action="" method="post" name="xoasanpham">
	<input name="masp" type="hidden" value="" />
	<input name="goihamxuly" type="hidden" value="xoasanpham" />
	<input name="trangchuyen" type="hidden" value="xlsanpham" />
</form>

<script>

	function them_suasanpham(trangthem,mah)
	{
		themvssua.chentrang.value=trangthem
		themvssua.masp.value=mah
		themvssua.submit()
	}
	function xoa_sp(mah)
	{
		xoasanpham.masp.value=mah
		if(confirm('bạn có thực sự muốn xóa không!'))
		xoasanpham.submit()
	}
</script>


<form name="giang" method="post" action="">
	<input type="hidden" name="tranghienhanh" value="" />
	<input type="hidden" name="trangchuyen" value="quanlyqua" />
</form>
<script>
	function sotrang(trang,masp)
	{
		giang.tranghienhanh.value=trang
		giang.submit()
	}
</script>