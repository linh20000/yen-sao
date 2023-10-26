@extends('frontend.components.index')

@section('content')
@include('frontend.components.breadcrumb', ['name'=>'Giới thiệu'])

<section class="page section">
	<div class="container card py-3 px-3">
		<div class="wrap_background_aside margin-bottom-40">
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-12">
					<div class="heading-bar">
							<h1 class="title_page"><a href="#">{{$aboutUs->name}}</a></h1>
					</div>

					<div class="content-page rte py-3">
						<p>{!! $aboutUs->description !!}</p>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>


@endsection
