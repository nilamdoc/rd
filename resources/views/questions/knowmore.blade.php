@extends('layouts.app') <!-- Assuming you have a layout file -->

@section('content')
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    
  </div>
</nav>   
<section class="section">
    <div class="container">
        <div class="row">
            <div class="col-12 mx-auto text-center" style="font-size:40px;">
                Get Your Full Personality Identification Report Today!!!
            </div>
            <div class="col-12 mx-auto text-center" style="font-size:40px;">
                <h3>Update to your full personality report at 91% Discount!!!</h3>
                
            </div>
            <div id="quiz-container1">
            </div>
        </div>
    </div>
    <hr>
    <div class="container">
        <div class="row">
            <div class="col-sm-4">
                <div class="well">
                    <img src="https://via.placeholder.com/500" alt="Image" class="img-fluid" />
                </div>
                
            </div>
            <div class="col-sm-8">
                <div class="well">
                    <h2>Buy your full personality</h2>
                    <h2>Report Now!!!</h2>
                    <a class="btn btn-primary" href="{{ url('complete/order') }} ">Buy your Full Report Now!!!</a>
                    <h2>At Just $39</h2>
                </div>
            </div>
        </div>
    </div>

    <div class="container1">
        <h1>What’s Inside the Full Report?</h1>

        <div class="section1">
            <p><strong>Clarity on Your Current Life:</strong> It will reveal where you stand right now and the journey that brought you here.</p>
            <p><strong>Deep Relationship Insights:</strong> It will help you understand your relationships, your romantic desires, confusing attractions, and the heartache of your past.</p>
            <p><strong>Career and Financial Understanding:</strong> It will explain the decisions behind your career choices, the reasons for financial challenges, and show you where to focus your energy, time, and resources to attract greater wealth and success.</p>
            <p><strong>A Clear Path Forward:</strong> Most importantly, it will guide you toward your true purpose, offering inspiration and a roadmap for reaching your highest potential, helping you make the most of every moment from today onward.</p>
            <p><strong>And Much More…</strong></p>
        </div>

        <div class="section1">
            <p>If you’re ready, just click the button below. Within moments, we’ll start creating your personalized personality blueprint report, which includes not only a deeper analysis of the insights shared above but also a thorough interpretation of other key aspects of your personality.</p>
            <p>Around a 50-page report is designed to reveal, perhaps for the first time, how all the unique aspects of your personality have come together to make you the powerful, limitless person you are.</p>
            <p>Packed with everything you need to make confident decisions and take control of your destiny—<strong>No fluff, just pure insight for your life.</strong></p>
            <div style="text-align: center;">
                <a href="{{ url('complete/order') }} " class="cta-button">Buy Your Full Report NOW for just $39!</a>
            </div>
            <p><em>The report is regularly priced at $499, but today, you have the opportunity to grab it at an exclusive, discounted price.</em></p>
        </div>

        <div class="section1 custom">
            <h2>Ruchi Doctor’s Exclusive Bonuses – Choose Your Path!</h2>
            <p>When you purchase the full report, you'll unlock one of Ruchi Doctor’s most sought-after bonuses. But here's the catch: you can only select one of these incredible offers.</p>

            <div class="bonus-option">
                <h3>Option 1: Book a Discovery Session</h3>
                <p>Join a Discovery Session with one of Ruchi Doctor’s top coaches, where your submitted responses will be reviewed. You’ll also experience a personalized session with Ruchi, who will explain how this transformative meeting can not only change your life but also help you build wealth and create a lasting legacy.</p>
                <div style="text-align: center;">
                    <a href="{{ url('complete/order') }} " class="cta-button">Buy Your Full Report NOW for just $39!</a>
                </div>
            </div>

            <div class="bonus-option">
                <h3>Option 2: Attend the Extraordinary You Preview</h3>
                <p>Join the Extraordinary You Preview, where one of Ruchi Doctor’s expert coaches will review your responses and give you a tailored experience with Ruchi. You’ll discover how this meeting can transform your life, help you accumulate wealth, and pave the way for you to leave a meaningful legacy.</p>
                <div style="text-align: center;">
                    <a href="{{ url('complete/order') }} " class="cta-button">Buy Your Full Report NOW for just $39!</a>
                </div>
            </div>
        </div>

        <footer>
            <p>All Rights Reserved | <a href="#">Contact</a> | <a href="#">Privacy Policy</a> | <a href="#">Terms & Conditions</a></p>
            <p><small>Disclaimer: Results may vary and are not guaranteed for every individual. This is not a "get rich quick" program. The information provided on this website is based on best practices and intended for educational purposes only. Success depends on factors such as effort, dedication, perseverance, and the ability to follow instructions. &copy; Prowess House @2024</small></p>
        </footer>
    </div>
    <!-- <div class="container">
        <div class="row">
            <div class="col-6 mx-auto text-center" style="font-size:40px;">
                <h3>Watch The Full Video Below</h3>
                <h3>To Know More About Who You Are?</h3>
            </div>
            <div id="quiz-container1" style="font-size:25px">
                <div class="d-flex justify-content-center">
                    <iframe width="560" height="315" src="https://www.youtube.com/embed/YOUR_VIDEO_ID" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                </div>
            </div>
            <div class="col-6 mx-auto text-center" style="font-size:40px;">
                <button type="submit" class="btn btn-primary" id="submit-answers">Know More!!</button>
            </div>
        </div>
    </div> -->
</section>
@endsection
