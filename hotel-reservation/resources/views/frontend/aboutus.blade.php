@extends('master')
@section('content')
<div class="container-sm" style="font-family: Avenir, 'Century Gothic', sans-serif;">
    <h3>About Us</h3>
    <hr>
    <div class="row">
        <div class="col-4 column8">
            <img src="{{asset('admin/img/profile.jpg')}}" alt="" style="width: 100%;">
        </div>
    <div class="col-8" > 
            <h3 >One of the most preferred stay In Nepal</h3>
            <hr>
            <p style="font-size: 1.2rem;text-align:justify;">Annapurna Hotel is a five-star luxury hotel and resort in Kathmandu,  set on 37 acres of landscaped grounds and created in the traditional Newari style of Nepalese architecture. This beautiful hotel and resort is located on the road to the Boudhanath Stupa: the most holy of all Tibetan Buddhist shrines outside of Tibet and a UNESCO World Heritage Site located within a five-minute walk from the hotel. The hotel is just four kilometres (2.4 miles) from the Tribhuvan International Airport and six kilometres (3.7 miles) from the city center of Kathmandu.</p>
      </div>  
  </div>
  <br>
  <div class="row">
      <h4 style="text-align: center;">Our Services</h4>
      <hr>
      <div class="col-2"></div>
      <div class="col-8 column8" style="margin: 0 22%;">
        <i class="fas fa-wifi fa-3x"></i>
        <i class="fa fal fa-parking fa-3x"></i>
        <i class="fa fal fa-concierge-bell fa-3x"  ></i>
        <i class="fa fal fa-dumbbell fa-3x"></i>
        <i class="fa fal fa-swimmer fa-3x" ></i>
        <i class="fa fal fa-id-card fa-3x" ></i>
       
      </div>
      <div class="col-2"></div>
      
  </div>
</div>
    
@endsection