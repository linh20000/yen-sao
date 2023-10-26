{{-- <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <div class="container">
            <div class="row">
                <div class="col-12 d-flex">
                    <li class="breadcrumb-item">
                        <a href="/">Trang chủ</a>
                    </li>
                    <li class="breadcrumb-item active">{{ $name }}</li>
                </div>
            </div>
        </div>
    </ol>
</nav> --}}
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
				
					<li><strong><span>{{ $name }}</span></strong></li>
					
				</ul>
			</div>
		</div>
	</div>
</section> 
</div>
@pushonce('component-css')
    <style>
        /* .breadcrumb {
            padding: 10px 0;
        }

        .breadcrumb-item a {
            color: #222222;
            text-decoration: none;
        }

        @media (min-width:319px) and (max-width: 415px) {
            .breadcrumb {
                margin: 0.5rem 1rem 1rem;
            }
        }

        @media (min-width:415px) and (max-width: 821px) {
            .breadcrumb {
                margin: 0.5rem 3rem 1rem;
            }
        } */
    </style>
@endpushonce
