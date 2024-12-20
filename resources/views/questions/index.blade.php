@extends('layouts.app') <!-- Assuming you have a layout file -->

@section('content')
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    
  </div>
</nav>   
<section class="section">
	<section class="about section">
		<div class="container">
			<div class="timer-container">
				<!-- Clock Icon -->
				<div>
					<i class="bi bi-clock-fill clock-icon"></i>
				</div>

				<!-- Timer Display -->
				<div class="timer">
					<span id="minutes">00</span>:<span id="seconds">00</span>
				</div>
			</div>
		</div>
	</section>
	<div class="container quiz-center" style="    justify-content: center !important;">
		<div class="row">

			<!-- Left Side - Form -->
			<div class="col-md-12 form-container">
				@if(session('success'))
					<div class="bg-green-500 text-white p-4 rounded-md mb-4">
						<p class="font-semibold">{{ session('success') }}</p>
					</div>
				@endif
				<div id="quiz-container">
					@foreach($questions as $question)
					<div class="question-container" id="question-{{ $question['id'] }}">
						<div class="question-icon-left">
							<i class="fas fa-chevron-left nav-icon" id="prev-{{ $question['id'] }}"></i>
						</div>

						<div class="question">
							<p>{{ $question['question'] }}</p>
							<ul class="options">
								<li>
									<input type="radio" id="optionA" name="q{{ $question['id'] }}" value="{{ $question['AA'] }}">
									<label for="optionA">{{ $question['QA'] }}</label>
								</li>
								<li>
									<input type="radio" id="optionB" name="q{{ $question['id'] }}" value="{{ $question['AB'] }}">
									<label for="optionB">{{ $question['QB'] }}</label>
								</li>
							</ul>
							<span class="error" id="error-q{{ $question['id'] }}"></span>
						</div>

						<div class="question-icon-right">
							<i class="fas fa-chevron-right nav-icon" id="next-{{ $question['id'] }}"></i>
						</div>
					</div>
					<input type="hidden" id="answers" name="answers">
					<input type="hidden" id="userId" name="userId" value="{{$userId}}">
					@endforeach

					<div id="finish-message" style="display:none;">
						<button type="submit" class="btn btn-primary" id="submit-answers">Submit Answers</button>
					</div>
				</div>	
				
			</div>
		</div>
	</div>
</section>

@endsection