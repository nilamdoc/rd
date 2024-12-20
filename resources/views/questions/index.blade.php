@extends('layouts.app') <!-- Assuming you have a layout file -->

@section('content')
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
                        @if($question['id'] == 1)
                            <div class="question-icon">
                                <i class="fas fa-chevron-left nav-icon disabled" onclick="return false;"></i>
                            </div>
                        @else
                            <div class="question-icon" id="questions-{{ $question['id'] }}">
                                <i class="fas fa-chevron-left nav-icon" onclick="previousQuestion({{ $question['id'] }})"></i>
                            </div>
                        @endif
                        
                        <div class="question">
                            <p>{{ $question['question'] }}</p>
                            <ul class="options">
                                <li><input type="radio" name="q{{ $question['id'] }}" value="{{$question['AA']}}"> {{ $question['QA'] }}</li>
                                <li><input type="radio" name="q{{ $question['id'] }}" value="{{$question['AB']}}"> {{ $question['QB'] }}</li>
                            </ul>
                            <span class="error" id="error-q{{ $question['id'] }}"></span>
                        </div>
                        <div class="question-icon">
                            <i class="fas fa-chevron-right nav-icon" onclick="nextQuestion({{ $question['id'] }})"></i>
                        </div>
                    </div>
                @endforeach

                <div id="finish-message" style="display:none;">
                    <p>Thank you for completing the quiz!</p>
                </div>
            </div>
        </div>
    </div>
</div>


<script>
    // Function to move to the next question
    function nextQuestion(currentQuestionNumber) {
        const currentQuestion = document.getElementById("question-" + currentQuestionNumber);
        const errorMessage = document.getElementById("error-q" + currentQuestionNumber);
        
        // Check if an answer is selected
        if (!document.querySelector(`input[name="q${currentQuestionNumber}"]:checked`)) {
            errorMessage.textContent = "Please select an answer before proceeding!";
            return; // Do not proceed if no answer is selected
        }
        
        errorMessage.textContent = ""; // Clear error message

        // Hide the current question
        currentQuestion.classList.remove("active");

        // Get the next question
        const nextQuestionNumber = currentQuestionNumber + 1;
        const nextQuestion = document.getElementById("question-" + nextQuestionNumber);

        if (nextQuestion) {
            // Show the next question
            nextQuestion.classList.add("active");
        } else {
            // If no more questions, show the finish message
            document.getElementById("finish-message").style.display = "block";
        }
    }

    // Function to move to the previous question
    function previousQuestion(currentQuestionNumber) {
        const currentQuestion = document.getElementById("question-" + currentQuestionNumber);

        // Hide the current question
        currentQuestion.classList.remove("active");

        // Get the previous question number
        const prevQuestionNumber = currentQuestionNumber - 1;
        const prevQuestion = document.getElementById("question-" + prevQuestionNumber);

        // Show the previous question if it exists
        if (prevQuestion) {
            prevQuestion.classList.add("active");
        }

        // Disable the previous button if it's the first question
        const prevButton = document.querySelector(`#question-${prevQuestionNumber} .fa-chevron-left`);
        const nextButton = document.querySelector(`#question-${prevQuestionNumber} .fa-chevron-right`);

        if (prevQuestionNumber === 0) {
            prevButton.classList.add("disabled");
            prevButton.setAttribute("onclick", "return false;"); // Disable action
        } else if (prevButton) {
            prevButton.classList.remove("disabled");
            prevButton.removeAttribute("onclick"); // Enable action
        }

        // Ensure the next button is always enabled when moving backward
        if (nextButton) {
            nextButton.classList.remove("disabled");
            nextButton.removeAttribute("onclick");
        }
    }


</script>
@endsection
