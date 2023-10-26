@extends('frontend.components.index')

@section('content')

<main id="main" class="">
    <div class="row category-page-row">
      <div class="col large-12">
        <div class="shop-container">
  
        </div>
      </div>
    </div>
    
    @include('frontend.components.breadcrumb', ['name'=>'Liên hệ'])

    @include('frontend.contact.content')
    
  </main>


@endsection
