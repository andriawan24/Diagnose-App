@extends('layouts.admin')
@section('title', 'Dashboard')

@section('content')
<div class="row">
    <div class="col-sm-3 col-xs-6">
		
        <div class="tile-stats tile-red">
            <div class="icon"><i class="entypo-users"></i></div>
            <div class="num" data-start="0" data-end="{{ $users->count() }}" data-postfix="" data-duration="1000" data-delay="0">{{ $users->count() }}</div>
    
            <h3>Pengguna</h3>
            <p>so far in our blog, and our website.</p>
        </div>
    
    </div>
    
    <div class="col-sm-3 col-xs-6">
    
        <div class="tile-stats tile-green">
            <div class="icon"><i class="entypo-chart-bar"></i></div>
            <div class="num" data-start="0" data-end="135" data-postfix="" data-duration="1000" data-delay="600">0</div>
    
            <h3>Gejala</h3>
            <p>this is the average value.</p>
        </div>
    
    </div>
    
    <div class="clear visible-xs"></div>
    
    <div class="col-sm-3 col-xs-6">
    
        <div class="tile-stats tile-aqua">
            <div class="icon"><i class="entypo-mail"></i></div>
            <div class="num" data-start="0" data-end="23" data-postfix="" data-duration="1000" data-delay="1200">0</div>
    
            <h3>Gangguan</h3>
            <p>messages per day.</p>
        </div>
    
    </div>
    
    <div class="col-sm-3 col-xs-6">
    
        <div class="tile-stats tile-blue">
            <div class="icon"><i class="entypo-rss"></i></div>
            <div class="num" data-start="0" data-end="52" data-postfix="" data-duration="1000" data-delay="1800">0</div>
    
            <h3>Artikel</h3>
            <p>on our site right now.</p>
        </div>
    
    </div>
</div>
@endsection 