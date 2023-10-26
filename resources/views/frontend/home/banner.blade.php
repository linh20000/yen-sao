<section class="awe-section-1">
    @foreach ($banner as $item)
    <div class="home-slider owl-carousel owl-theme not-aweowl section_slider">
        <div class="items">
            <a href="#" class="clearfix">
                <picture>
                    <source media="(max-width: 767px)"
                        srcset="{{asset($item->images)}}">
                    <img src="{{asset($item->images)}}" alt="{{$item->name}}" />
                </picture>
            </a>
        </div>
    </div>
    @endforeach
</section>
