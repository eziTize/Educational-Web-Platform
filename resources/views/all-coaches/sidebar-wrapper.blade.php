<?php
$langs = App\Models\ProfileLanguage::get();
$countries = App\Models\Country::take(10)->get();
?>

<!--<div class="widget-1 widget-banner">
    <div class="widget-1-body">
        <a href="#0">
            <img src="{{url('custom-theme/assets/images/sidebar/banner/banner01.jpg')}}" alt="banner">
        </a>
    </div>
</div>-->
<div class="widget-1 widget-check">
    <div class="widget-header">
        <h5 class="m-title">Filter By</h5> <a href="#0" class="clear-check">Clear All</a>
    </div>
    <div class="widget-1-body">
        <h6 class="subtitle">Languages</h6>
        <div class="check-area" style="color: white;">
            @foreach($langs as $lang)
            <div class="form-group">
                <input type="checkbox" name="lang" id="lang1"><label for="lang1">{{$lang->name}}</label>
            </div>
            @endforeach
        </div>
    </div>
</div>
<div class="widget-1 widget-check">
    <div class="widget-1-body">
        <h6 class="subtitle">Countries</h6>
        <div class="check-area" style="color: white;">
            @foreach($countries as $country)
            <div class="form-group">
                <input type="checkbox" name="genre" id="genre1"><label for="genre1">{{$country->country_name}}</label>
            </div>
            @endforeach
        </div>
        <div class="add-check-area">
            <a href="#0">view more <i class="plus"></i></a>
        </div>
    </div>
</div>
<!-- <div class="widget-1 widget-banner">
    <div class="widget-1-body">
        <a href="#0">
            <img src="{{url('custom-theme/assets/images/sidebar/banner/banner02.jpg')}}" alt="banner">
        </a>
    </div>
</div> -->