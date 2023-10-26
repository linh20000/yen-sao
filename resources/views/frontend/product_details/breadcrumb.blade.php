<div class="breadcrumb_background margin-bottom-40">
	<div class="title_full">
		<div class="container a-center">
			<p class="title_page">{{ $name }}</p>
		</div>
	</div>
	<section class="bread-crumb">
	<span class="crumb-border"></span>
	<div class="container">
		<div class="row">
			<div class="col-xs-12 a-center">
				<ul class="breadcrumb">					
					<li class="home">
						<a href="/"><span>Trang chủ</span></a>						
						<span class="mr_lr">&nbsp;<i class="fa fa-angle-right"></i>&nbsp;</span>
					</li>

                    <li><a href=""><span>{{ $category_id }}</span></a>
						<span class="mr_lr">&nbsp;<i class="fa fa-angle-right"></i>&nbsp;</span>
                    </li>
				
					<li><strong><span>{{ $name }}</span></strong></li>
					
				</ul>
			</div>
		</div>
	</div>
</section> 
</div>