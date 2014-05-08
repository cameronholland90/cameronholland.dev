@extends('layouts.master')

@section('tab-title')
	<title>Resume</title>

@stop

@section('carousel')
	<!-- Carousel
    ================================================== -->
    <div id="myCarousel" class="carousel slide" data-ride="carousel">
      <!-- Indicators -->
      <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="1"></li>
        <li data-target="#myCarousel" data-slide-to="2"></li>
      </ol>
      <div class="carousel-inner">
        <div class="item active">
          <img src="img/programming-carousel-image.jpg" alt="First slide">
          <div class="container">
            <div class="carousel-caption">
              <h1>My Code</h1>
              <p>If you would like to take a look at all of my code, click the button below to go to my GitHub account</p>
              <p><a class="btn btn-lg btn-primary" href="https://github.com/cameronholland90" role="button">GitHub</a></p>
            </div>
          </div>
        </div>
        <div class="item">
          <img src="img/Screen Shot 2014-03-07 at 12.50.47 PM.png" alt="Second slide">
          <div class="container">
            <div class="carousel-caption">
              <h1>About me</h1>
              <p>I became passionate about programming because I get to solve problems, whether it be large or small.</p>
            </div>
          </div>
        </div>
        <div class="item">
          <img src="img/Screen Shot 2014-03-07 at 12.51.08 PM.png" alt="Third slide">
          <div class="container">
            <div class="carousel-caption">
              <h1>LinkedIn</h1>
              <p>If you would like to connect with me on LinkedIn, click the button below.</p>
              <p><a class="btn btn-lg btn-primary" href="www.linkedin.com/in/cameronholland90/" role="button">LinkedIn</a></p>
            </div>
          </div>
        </div>
      </div>
      <a class="left carousel-control" href="#myCarousel" data-slide="prev"><span class="glyphicon glyphicon-chevron-left"></span></a>
      <a class="right carousel-control" href="#myCarousel" data-slide="next"><span class="glyphicon glyphicon-chevron-right"></span></a>
    </div><!-- /.carousel -->

@stop

@section('content')
		<div class="page-header">
			<h1><img src="img/Arches v2-6.jpg" alt="Head Shot" class="img-circle" style="vertical-align: baseline;">Cameron Holland <small>Junior Software Developer</small></h1>
		</div>
		<div class='row'>
			<div class='col-md-2'><strong>CONTACT</strong></div>
			<div class='col-md-8'><strong>Cameron Holland</strong><br><a href="mailto:cameron@thenearsky.com">cameron@thenearsky.com</a></div>
			<div class='col-md-2'><a href="www.linkedin.com/in/cameronholland90/">LinkedIn</a><br><a href="https://github.com/cameronholland90">GitHub</a></div>
		</div>
		<hr>
		<div class='row'>
			<div class='col-md-2'><strong>WORK EXPERIENCE</strong></div>
			<div class='col-md-8'>
				<strong>Great Southern Coins</strong><br>
				Online auction responsibilities include preparing coins, photographing coins, editing photos and online posting. Direct sales responsibilities include locating coins requested by customers and processing orders.  Additional duties include packaging, shipping and tracking merchandise shipments.
			</div>
			<div class='col-md-2'>
				February 2013 - February 2014
			</div>
		</div>
		<br>
		<div class='row'>
			<div class='col-md-2'></div>
			<div class='col-md-8'>
				<strong>Saltgrass Steakhouse</strong><br>
				Worked as server, host, and busser.  Additional responsibilities included assisting in training new servers.
			</div>
			<div class='col-md-2'>
				April 2011 – January 2013
			</div>
		</div>
		<hr>
		<div class='row'>
			<div class='col-md-2'><strong>EDUCATION</strong></div>
			<div class='col-md-8'>
				<strong>LAMP+J Software Development Bootcamp</strong><br>
				<a href="http://www.codeup.com/">Codeup</a><br>
				<em>San Antonio, TX</em>
			</div>
			<div class='col-md-2'>
				Graduating in April 2014<br>
				<button type='button' class='btn btn-xs btn-success' disabled='disabled'>IN PROGRESS</button>
			</div>
		</div>
		<br>
		<div class='row'>
			<div class='col-md-2'></div>
			<div class='col-md-8'>
				<strong>Northwest Vista Community College</strong><br>
				<a href="https://www.alamo.edu/nvc/">NWVCC</a><br>
				<em>San Antonio, TX</em>
			</div>
			<div class='col-md-2'>January 2009 – May 2010</div>
		</div>
		<br>
		<div class='row'>
			<div class='col-md-2'></div>
			<div class='col-md-8'>
				<strong>Abilene Christian University</strong><br>
				<a href="http://www.acu.edu/">ACU</a><br>
				<em>Abilene, TX</em>
			</div>
			<div class='col-md-2'>August 2008 – December 2008</div>
		</div>
		<br>
		<div class='row'>
			<div class='col-md-2'></div>
			<div class='col-md-8'>
				<strong>Sandra Day O’Connor High School</strong><br>
				<a href="http://www.nisd.net/oconnor/">OHS</a><br>
				<em>Helotes, TX</em>
			</div>
			<div class='col-md-2'>August 2004 – May 2008</div>
		</div>
	
	
@stop