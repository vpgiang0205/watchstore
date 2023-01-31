
<div style="width:587px; margin-left:3px; margin-right:3px;">
	<table width="587" border="0" cellpadding="0" cellspacing="0">
		<tr>
			<td style="height:25px; background:black; color:white;">
					&nbsp;&nbsp;Liên Hệ
			</td>
		</tr>
		<tr>
				<td>
				<table width="587" height="120" cellpadding="0" cellspacing="0" border="0" style="border:#CCCCCC 1px solid; margin-top:3px;
						">
					<tr>
					<td>
<script language="JavaScript" type="text/javascript">
	function kiemtra()
	{
		var ten=frm.txtten.value;
		var dien=frm.txtsdt.value;
		var mail=frm.txtemail.value;
		var dia=frm.txtdc.value;
		var cm=frm.txttquai.value;
		
		if(ten=="")
		{
			document.all('loihoten').innerHTML="Họ Tên bat buoc phai nhap !"
			frm.txtten.style.backgroundColor='#FFFFCC'
			frm.txtten.focus()
			return false
		}
		else
		{
			document.all('loihoten').innerHTML=""
			frm.txtten.style.backgroundColor='#FFFFFF'
			
		}
		
		kiem=/^[0-9]{10,11}$/
		lt=kiem.test(dien)
		if(dien=="")
		{
			document.all('loidientquai').innerHTML="Bạn Chưa Nhập Số Điện Thoại !"
			frm.txtsdt.style.backgroundColor='#FFFFCC'
			frm.txtsdt.focus()
			return false
		}
		else
		{	
			if(lt==false)
			{
				document.all('loidientquai').innerHTML="Bạn Phải Nhập Bằng Số Và Có Từ 10 Đến 11 Chữ Số!"
				frm.txtsdt.style.backgroundColor='#FFFFCC'
				frm.txtsdt.focus()
				return false
			}
			else
			{
			document.all('loidientquai').innerHTML=""
			frm.txtsdt.style.backgroundColor="#FFFFFF"
			}
			
		}
		
		dangmail= /^[\w.-]+@[\w.-]+\.[A-Za-z]{2,4}$/
		kq=dangmail.test(mail)
		if(mail=="")
		{
			document.all('loimail').innerHTML="Bạn Chưa Nhập Email !"
			frm.txtemail.style.backgroundColor="#FFFFCC"
			frm.txtemail.focus()
			return false
		}
		else
		{	
			if(kq==true)
			{
			document.all('loimail').innerHTML=""
			frm.txtemail.style.backgroundColor="#FFFFFF"
			}
			else
			{
			document.all('loimail').innerHTML="Bạn Nhập Sai Dạng Email - Email Có Dạng Ví Dụ Như: tenban@yahoo.com"
			frm.txtemail.style.backgroundColor="#FFFFCC"
			frm.txtemail.focus()
			return false
			}
			
		}
		
		if(dia=="")
		{
			document.all('loidiachi').innerHTML="Bạn Chưa Nhập Địa Chỉ !"
			frm.txtdc.style.backgroundColor="#FFFFCC"
			frm.txtdc.focus()
			return false
		}
		else
		{	

			document.all('loidiachi').innerHTML=""
			frm.txtdc.style.backgroundColor="#FFFFFF"
		}
		if(cm=="")
		{
			document.all('loitquai').innerHTML="Bạn Chưa Gửi Yêu Cầu !"
			frm.txttquai.style.backgroundColor="#FFFFCC"
			frm.txttquai.focus()
			return false
		}
		else
		{	

			document.all('loitquai').innerHTML=""
			frm.txttquai.style.backgroundColor="#FFFFFF"
		}
		
		return true
	}

</script>


			
  <form id="frm" name="frm" method="post" action="" onsubmit="return kiemtra()">
 <?php include_once('xl_lienhe.php'); ?>
    <table border="3" align="center" width="500">
      <tr>
	  	<td colspan="2" height="40" align="center">
			&nbsp;&nbsp;Mọi thắc mắc yêu cầu vui lòng điền đầy đủ thông tin ở bên dưới
		</td>
		</tr>
		<tr>
	 
       		<td width="120" >Họ Tên:</td>
        	<td width="330"><input name="txtten" type="text" id="txtten" size="40" value="" />
      			  &nbsp;&nbsp;<font color="#FF6600">*</font><br />
			<span id="loihoten" style="color:#FF6600;"></span>		
			</td>
      </tr>
      <tr>
        	<td>Số Điện Thoại:</td>
       		 <td><input name="txtsdt" type="text" id="txtsdt" size="40" value="" />
      				  &nbsp;&nbsp;<font color="#FF6600">*</font><br />
			<span id="loidientquai" style="color:#FF6600;"></span>		
			</td>
      </tr>
      <tr>
        	<td align="left">Email:</td>
       		 <td><input name="txtemail" type="text" id="txtemail" size="40" value="" />
      			  &nbsp;&nbsp;<font color="#FF6600">*</font><br />
		<span id="loimail" style="color:#FF0000;"></span>		</td>
      </tr>
      <tr>
       		 <td>Giới Tính:</td>
      	 	 <td>
			<select name="gioitinh">
				<option value="1">Chưa Xác Định</option>
				<option value="2" selected="selected">Nam</option>
				<option value="3">Nữ</option>
				
			</select>		
			</td>
      </tr>
	   <tr>
        	<td>Địa Chỉ</td>
       		 <td><textarea name="txtdc" cols="43" rows="2" id="txtdc" style="border: right 1px;" ></textarea>
				 &nbsp;&nbsp;<font color="#FF6600">*</font>
		<br />
		<span id="loidiachi" style="color:#FF6600;"></span>		</td>
      </tr>
      <tr>
        	<td align="left">Nội Dung:</td>
       		 <td><textarea name="txttquai" cols="43" rows="5" id="txttquai" style="border: right 1px;"></textarea>
       		 &nbsp;&nbsp;<font color="#FF6600">*</font><br />
				<span id="loitquai" style="color:#FF6600;"></span>		
			</td>
      </tr>
        <td colspan="2" align="center">
		 	<input name="goiham" type="hidden" value="lienhe" />
			<input name="view" type="hidden" value="xllienhe" />

			 <input type="submit" name="Submit" value="Gửi" style="background:#FFFFFF" onclick="kiemtra()"/>	
			</td>     
      </tr>
    </table>
  </form>

				</td>
			</tr>
		</table>
		
				</td>
		</tr>
  </table>
</div>
