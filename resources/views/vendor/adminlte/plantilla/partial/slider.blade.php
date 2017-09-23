<div class="container">
    <div class="nivoSlider" data-controlNav="true" data-pauseOnHover="false">
        <!-- Slide 1 -->
        @foreach($sliders as $slider)
        <a href="{{$slider->link}}">
            <img src='{{asset("img/slider/$slider->foto")}}' alt="" title="{{$slider->titulo}}"/>
        </a>
        @endforeach
    </div>
</div>