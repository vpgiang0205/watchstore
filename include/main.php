<style type="text/css">
	.product{
		float: left;
		width: 162px;
		margin-top:20px;
		text-align: center;
		margin-left: 25px;
		margin-bottom: 30px;
	}
	.spm{
		background:black;
		height: 25px;
		color: white;
		border:#CCCCCC 1px solid;
		margin-left:3px;
		margin-right: 3px;
	}
	.spm h3{
		padding: 3px;
		padding-left: 15px;
	}
	.item{
		background-color: white;
	}
	.chung{
		background-color: white;
		height: auto;
	}
	a:visited{
		color: blue;
	}
	a:hover{
		color: red;
	}

</style>
<div id="manu">
<div class="spm">
	<h3>Tin tức mới</h3>
</div>
<div style="width:587px;margin-left:3px; margin-right:3px;">
  <table width="560" border="0" cellpadding="0" cellspacing="0" style="margin-bottom:8px;">
		<tr>
			<td>
				
				<?php 
					//hien thi 1 tin tuc moi nhat
					$strSQL="SELECT * FROM tin_tuc ORDER BY ma_tt desc";
					$tintucmoinhat=mysqli_query($ung,$strSQL);
					$rowTINMOI=mysqli_fetch_array($tintucmoinhat);
				?>
					<table width="550" cellpadding="0" cellspacing="0" border="0" style="border:#CCCCCC 1px solid; margin-top:3px;margin-bottom:5px;margin-left:20px;">
					<tr>
					<td>
					<a href="#" onclick="chitiet_tt('<?php echo $rowTINMOI['ma_tt']; ?>')">
						<img src="images/tintuc/<?php echo $rowTINMOI['hinh_anh'] ?>" width="150" height="90" 
						style="border: 1px solid; margin:10px;" align="left" />
					</a>
					<p class="pp">	

					<a href="#" onclick="chitiet_tt('<?php echo $rowTINMOI['ma_tt']; ?>')"><b><?php echo $rowTINMOI['tieu_de'] ?></b></a>
					<br />
					<?php if(strlen($rowTINMOI['noi_dung']) > 120) { ?>
					<?php echo substr($rowTINMOI['noi_dung'], 0, 110)?>...
					<?php } else { ?><?php echo $rowTINMOI['noi_dung']; } ?>
					<br />
					<a href="#" onclick="chitiet_tt('<?php echo $rowTINMOI['ma_tt']; ?>')">
					<img src="images/next.jpg" border="0" align="bottom" />&nbsp;&nbsp;Xem Chi Tiết...</a>&nbsp;&nbsp;&nbsp;
					</p>
					<form name="chitiettin" method="post" action="">
					<input type="hidden" name="matintuc" value="" />
					<input name="view" type="hidden" value="chitiettintuc" />
					</form>
<script>
	function chitiet_tt(matt)
	{
		chitiettin.matintuc.value=matt
		chitiettin.submit()
	}
	function chonhang(mahang,tenhang,gia)
	{
		nhanthongtin.txtmasp.value=mahang
		nhanthongtin.txttensp.value=tenhang
		nhanthongtin.txtdongia.value=gia
		nhanthongtin.submit()
		
	}
</script>


  <form name="nhanthongtin" method="post" action="">
    <input name="txtmasp" type="hidden" value="" />
	<input name="txttensp" type="hidden" id="txttensp">
	<input name="txtdongia" type="hidden" id="txtdongia" >
	<input type="hidden" name="view" value="dathang" />
	<input type="hidden" name="hanhdong" value="them" />
  </form>
					</td>
			</tr>
			</table>
			</td>
		</tr>
		<tr>
			<td align="right">
				<a href="#" onclick="dentrang_onsubmit('tintuc')"><img src="images/next.jpg" border="0" align="bottom" />
				&nbsp;&nbsp;Xem Thêm Các Tin Khác...</a>
			</td>
		</tr>
  </table>
</div>

<div class="spm">
	<h3>Sản phẩm mới</h3>
</div>
				<?php
					$strSQL="SELECT * from sanpham ORDER BY ma_sp desc";
					$sp=mysqli_query($ung,$strSQL);
					while ($row=mysqli_fetch_assoc($sp)) {
				?>

<div class="item clearfix">				
<div class="product" style="border:#CCCCCC 1px solid; margin-top:3px;">
	        <div class="image">
				<a href="#" onclick="chitiet('<?php echo $row['ma_sp']; ?>')">
				    <img src="images/sp/<?php echo $row['hinh_anh']; ?>" border="0" height="103" width="120" />
				</a>
			</div>
			<div class="item">
				<div class="name_pd">Tên sản phẩm : <span class="ten"><a href="#" onclick="chitiet('<?php echo $row['ma_sp']; ?>')"><b><?php echo $row['ten_sp']; ?></b></a>												<?php
												// hien trang thai cua qua
													if($row['trang_thai']==1)
													echo "<img src='images/hot.gif' border='0'>";
												?></span>

				</div>		
				<div class="name_pd">Giá bán:<span class="ten"><a href="#" onclick="chitiet('<?php echo $row['ma_sp']; ?>')"><b><?php echo number_format($row['gia'],0,'.','.'); ?> VNĐ</b></a></span>

				</div>
				<div class="detail">
					<a href="#" onclick="chitiet('<?php echo $row['ma_sp']; ?>')">Chi Tiết </a>
					<img src="images/icon.png" border="0" width="14" height="14" align="bottom" />
					<a href="#" onclick="chonhang('<?php echo $row['ma_sp']; ?>','<?php echo $row['ten_sp']; ?>','<?php echo $row['gia']; ?>')">Đặt Mua</a>
				</div>									
										
	        </div>
</div>
<?php } ?>
</div>
</div>
			<div style="margin-bottom:20px;"><a href="#" onclick="dentrang_onsubmit('sanpham')"><img src="images/next.jpg" border="0" align="bottom" />
			&nbsp;&nbsp;
			Xem Thêm Các Sản Phẩm Khác...</a></div>