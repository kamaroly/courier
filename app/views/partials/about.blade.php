@extends('layouts.default')
@section('title')
Urugendo - Abo turibo
@stop
@section('content')
<section id="about" class="about section">
        <div class="container">
            <h4 class="title text-center">What is Urugendo.rw</h4>
            <p class="intro text-center">Urugendo.rw is transforming the way bus tickets are purchased and the way local goods move across Rwanda by enabling anyone to get any product delivered to them without having to move from the comfort of their homes or offices. </p>
            <div class="row">
                <div class="item col-md-6 col-sm-6 col-xs-12">
                    <div class="content">
                        <h3 class="sub-title">Ticket booking</h3>
                        
                          <img src="{{ Url() }}//assets/images/ticket_booking.png"  align="left">
                        <p>We help our customers travelling to various destinations across Rwanda to easily choose between 20 agencies, book and pay their bus tickets from the convenience of their homes and offices</p>
                    </div><!--//content-->
                </div><!--//item-->
                <div class="item col-md-6 col-sm-6 col-xs-12">
                    <div class="content">
                        <h3 class="sub-title">Shopping</h3>
                        
                    <img src="{{ Url() }}//assets/images/shopping.png" class="fa fa-clock-o" align="left">
                        <p>We can shop anything for you; from groceries to birthday cakes passing by kitchen appliances and deliver and deliver it to you at your prefered location.</p>
                    </div><!--//content-->
                </div><!--//item-->
                <div class="item col-md-6 col-sm-6 col-xs-12">
                   
                    <div class="content">
                        <h3 class="sub-title">Documents</h3>
                          <img src="{{ Url() }}//assets/images/documents.png"  align="left">
                        <p>We let businesses and individuals focus on their core businesses while we handle their documents delivery.</p>
                    </div><!--//content-->
                </div><!--//item-->           
                   
                <div class="item col-md-6 col-sm-6 col-xs-12">
                    <div class="content">
                        <h3 class="sub-title">Instant Courier</h3>
                    <img src="{{ Url() }}//assets/images/instant_courier.png"  align="left">
                        <p>We pick up and deliver any type of courier ranging from electronics devices to clothing, inventory and many more depending on our customer's request! This in a timeline of 90 Minutes within Kigali and 24Hours to the rest of the country!</p>
                    </div><!--//content-->
                </div><!--//item-->                
                         
            </div><!--//row-->            
        </div><!--//container-->
    </section>
    @stop