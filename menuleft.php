<?php
	$ung= mysqli_connect("localhost","root","","csdldongho");
	$strSQL="SELECT * FROM loai_sanpham";
	$loaisanpham= mysqli_query($ung,$strSQL);
?>
<style type="text/css">
	tr td{
		text-align: left;
	}
		#left
		{
			
		width:148px;
		}

		#left h1
		{
		background:black;
		color:#FFFFFF;
		font-size:14px;
		text-align:center;
		padding: 10px;
		}

		#left ul
		{
		list-style-type:none;
		margin:0px;
		padding:0px;
		}

		#left ul a
		{

		text-decoration:none;
		line-height:25px;
		color:#f26522;
		background-color: white;
		display:block;
		width:auto;
		border-right:1px solid black;
		border-top:1px solid black ;
		border-bottom:1px solid black;
		border-left:1px solid black;
		font-size: 14px;
		}

		#left ul a:hover
		{
		background:black;
		color: white;
		}
		.menuleft a:hover{
			color: white;
			background: black;
		}
</style>
<div id="left">
    <h1>DANH MỤC</h1>
	<ul>
		<?php while($row=mysqli_fetch_array($loaisanpham)) { ?> 
		    <li><a href="#" onclick="loaisanpham_onsubmit('<?php echo $row['ma_loai']; ?>')"><?php echo $row['ten_loai']; ?></a></li>
		<?php } ?>
    </ul>
</div>

	<form action="" method="post" name="loaisanpham">
	<input name="MaLH" type="hidden" value="" />
	<input name="gia" type="hidden" value="" />
	<input name="view" type="hidden" value="sanpham" />
	</form>
	<script>
		function loaisanpham_onsubmit(thamso)
		{
		loaisanpham.MaLH.value=thamso
		loaisanpham.view.value="sanpham"
		loaisanpham.submit()
		}
		
		function timgia_onsubmit(gia)
		{
		loaisanpham.gia.value=gia
		loaisanpham.view.value="sanpham"
		loaisanpham.submit()	
		}
	</script>
<?php include('include/thongke.php'); ?>
<table width="148" style="padding-top:5px;">
		<tr>
			<td style="height:25px; background:black; color:white">
				
				&nbsp;&nbsp;Thống Kê
			</td>
		</tr>
		<tr>
			<td style="margin-top:4px; width:147px;font-size:14px ;padding:10px; background:white; color:black;">
		
			Tổng Số Loại: <?php echo $soloaisanpham; ?>
			<br />
			Tổng Số Sản Phẩm: <?php echo $soqua; ?>	
			<br />
			Số Khách Hàng: <?php echo $khachhang; ?>
	
			</td>
		</tr>
		
</table>
