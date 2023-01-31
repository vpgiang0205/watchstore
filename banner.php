<style type="text/css">
    .paging{
    	background-color: black;
    	height: 35px;
    }
	ul.hihi li{
		float: left;
	}
	.paging ul.hihi li a:visited{
		color: white;
	}
	ul.hihi li a{
		display: inline-block;
		margin: 0px 10px 0px 0px;
		padding:0px 30px;
		line-height: 35px;
		text-transform: uppercase;
		color: white;
	}
	ul.hihi li:hover a{
	    background:#f26522;
	    text-decoration:none;
	}
	.slider-img{
		height: 800px;
		width: 100%;
	}
</style>
 <body>
<div class="paging" >
		<ul class="hihi">
			<li><a href="#" onclick="dentrang_onsubmit('trangchu')">Trang Chủ</a></li>
			<li><a href="#" onclick="dentrang_onsubmit('gioithieu')">Giới Thiệu</a></li>
			<li><a href="#" onclick="dentrang_onsubmit('sanpham')">Sản Phẩm</a></li>
			<li><a href="#" onclick="dentrang_onsubmit('tintuc')">Tin Tức</a></li>
			<li><a href="#" onclick="dentrang_onsubmit('dichvu')">Dịch Vụ</a></li>
			<li><a href="#" onclick="dentrang_onsubmit('dathang')">Giỏ Hàng</a></li>
			<li><a href="#" onclick="dentrang_onsubmit('lienhe')">Liên Hệ</a></li>
		</ul>
	
</div>

	<form action="" method="post" name="trang">
	<input name="view" type="hidden" value="" />
	</form>
	<script>
		function dentrang_onsubmit(thamso)
		{
		trang.view.value=thamso
		trang.submit()
		}
	</script>
	<div id = "hinh" style="width: 100%; height:267px">
    <img id = "img" onclick="hidden()" src="./images/banner6.png"  style="width: 100%; height:100%">
</div>
<script>
    var index = 0;
    function hidden(){
        
        var imgs =["banner2.jpg","banner3.png","banner6.png"];
        document.getElementById('img').src=imgs[index];
        index++;
        if(index == 2){
            index = 0;
        }
    }
    setInterval(hidden,2000);
</script>
    </body>
    </html>
	<!-- Slide chay anh -->
  
    <!-- <div class="slider" >
      
      <div>
        <img src="images/banner2.jpg" alt="" />
      </div>
      
      <div>
        <img src="images/banner6.png" alt=""/>
      </div>
      
      <div>
        <img src="images/banner1.jpg" alt=""/>
      </div>
    </div> -->