<?php
$langs = App\Models\ProfileLanguage::get();
$cats = App\Models\ProfileCategory::get();
$countries = App\Models\Country::get();
?>
<form class="ticket-search-form">
    <div class="form-group large">
        <input type="text" placeholder="Search fo coaches">
        <button type="submit"><i class="fas fa-search"></i></button>
    </div>
    <div class="form-group">
       <!-- <div class="thumb">
            <img src="{{url('custom-theme/assets/images/ticket/city.png')}}" alt="ticket">
        </div> -->
        <span class="type">Country</span>
        <select class="select-bar">
            @foreach($countries as $country)
            <option value="">{{$country->country_name}}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
       <!-- <div class="thumb">
            <img src="{{url('custom-theme/assets/images/ticket/cinema.png')}}" alt="ticket">
        </div> -->
        <span class="type">Language</span>
        <select class="select-bar">
            @foreach($langs as $lang)
            <option value="">{{$lang->name}}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
       <!-- <div class="thumb">
            <img src="{{url('custom-theme/assets/images/ticket/date.png')}}" alt="ticket">
        </div> -->
        <span class="type">Category</span>
        <select class="select-bar">
            @foreach($cats as $cat)
                <option value="">{{$cat->name}}</option>
            @endforeach
        </select>
    </div>
</form>