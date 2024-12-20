<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>@yield('title', 'Ruchi Doctor')</title>
    <meta name="description" content="">
    <meta name="keywords" content="">   
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Favicons -->
    <link href="{{ asset('images/favicon.ico') }}" rel="icon">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">
    <!-- Vendor CSS Files -->
    <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <!-- Main CSS File -->
    <link href="{{ asset('assets/css/main.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">
    <style>
        /* Remove the navbar's default margin-bottom and rounded borders */ 
        .navbar {
        margin-bottom: 0;
        border-radius: 0;
        }

    </style>
</head>

<body class="index-page">

    <main class="main">
        @yield('content')
    </main>

    @include('partials.footer')

     <!-- Scroll Top -->
    <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
    <!-- Preloader -->
    <div id="preloader"></div>
     <!-- Vendor JS -->
    <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
     <!-- jQuery (required for validation) -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/jquery.validate.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <script src="{{ asset('assets/js/main.js') }}"></script>
    <script>
    $(document).ready(function () {
        $("#contactForm").validate({
            rules: {
                name: {
                    required: true,
                    minlength: 3
                },
                email: {
                    required: true,
                    email: true
                },
                contact: {
                    required: true,
                    digits: true,
                    minlength: 10,
                    maxlength: 15
                },
                country: {
                    required: true
                },
                countryCode: {
                    required: true
                }
            },
            messages: {
                name: {
                    required: "Please enter your name.",
                    minlength: "Name must be at least 3 characters long."
                },
                email: {
                    required: "Please enter your email.",
                    email: "Please enter a valid email address."
                },
                contact: {
                    required: "Please enter your contact number.",
                    digits: "Please enter only digits.",
                    minlength: "Contact number must be at least 10 digits long.",
                    maxlength: "Contact number must not exceed 15 digits."
                },
                country: {
                    required: "Please select your country."
                },
                countryCode: {
                    required: "Please select your country code."
                }
            },
            errorPlacement: function(error, element) {
                // Adjust for specific containers like input-group
                if (element.parent('.input-group').length) {
                    error.insertAfter(element.parent('.input-group'));
                } else {
                    error.insertAfter(element); // Default placement
                }
            },
            highlight: function(element) {
                $(element).addClass("is-invalid");
            },
            unhighlight: function(element) {
                $(element).removeClass("is-invalid");
            }
        });
        var questions = {{ isset($questions)?count($questions):0 }};
        if(questions!=0){
            let currentQuestion = 1;

            function showQuestion(questionId) {
                // Hide all questions
                document.querySelectorAll('.question-container').forEach(function (el) {
                    el.classList.remove('active');
                });

                // Show the specific question
                document.getElementById('question-' + questionId).classList.add('active');
            }

            function nextQuestion(questionId) {
                if (questionId < questions) {
                    showQuestion(questionId + 1);
                } else {
                    // Show the finish message
                    document.getElementById('finish-message').style.display = 'block';
                }
            }

            function previousQuestion(questionId) {
                if (questionId > 1) {
                    showQuestion(questionId - 1);
                }
            }

            // Initialize the first question
            showQuestion(currentQuestion);
        }
        //Timer Related Code.
        var minutesLabel = document.getElementById("minutes");
        var secondsLabel = document.getElementById("seconds");
        var totalSeconds = 0;
        var timerInterval;
        if(secondsLabel != null && minutesLabel!= null){
            // Automatically start the timer when the page loads
            window.onload = function() {
                startTimer();
            };

            function startTimer() {
                timerInterval = setInterval(setTime, 1000); // Runs every second
            }

            function setTime() {
                ++totalSeconds;
                secondsLabel.innerHTML = pad(totalSeconds % 60);
                minutesLabel.innerHTML = pad(parseInt(totalSeconds / 60));

                // Show alert if timer reaches 60 minutes (3600 seconds)
                if (totalSeconds === 3600) {
                    clearInterval(timerInterval); // Stop the timer
                    alert("60 minutes have passed!");  // Show alert at 1 hour
                }
            }

            function pad(val) {
                var valString = val + "";
                if (valString.length < 2) {
                    return "0" + valString;
                } else {
                    return valString;
                }
            }
        }
        
        // When a radio button is selected
        $(document).on("click", ".options li", function () {
            // Find the radio button within the clicked <li> and select it
            const $radio = $(this).find("input[type='radio']");

            if ($radio.length) {
                // Select the radio button
                $radio.prop("checked", true).trigger("change");
            }
        });

        // Initialize an array to store answers
        let answers = [];

        // Event listener for when a radio button is selected
        $(document).on("change", ".options input[type='radio']", function () {
            // Get the closest question container
            const $questionContainer = $(this).closest(".question-container");
            const questionId = $questionContainer.attr("id").split('-')[1]; // Extract question ID from the container
            const selectedAnswer = $(this).val(); // Get the selected value
            // Remove the 'selected' class from all <li> elements within the current question
            $questionContainer.find("li").removeClass("selected");

            // Add the 'selected' class to the parent <li> of the selected radio button
            $(this).closest("li").addClass("selected");

            // Update the answers array
            const existingAnswerIndex = answers.findIndex(answer => answer.questionId == questionId);

            if (existingAnswerIndex !== -1) {
                answers[existingAnswerIndex].answer = selectedAnswer;
            } else {
                answers.push({
                    questionId: questionId,
                    answer: selectedAnswer
                });
            }               
        }); 
        
        // Event listener for submitting answers (example)
        $("#submit-answers").on('click', function () {
            const answerCounts = {
                A: 0,
                B: 0,
                C: 0,
                D: 0,
                E: 0,
                F: 0,
                G: 0,
                H: 0,
                I: 0
            };

            // Count the answers selected by the user
            $.each(answers, function (questionNumber, answer) {
                if (answerCounts.hasOwnProperty(answer)) {
                    answerCounts[answer]++;
                }
            });

            // Update the count on the UI (e.g., display the counts for A, B, C, etc.)
            $("#CountA").html(answerCounts.A);
            $("#CountB").html(answerCounts.B);
            $("#CountC").html(answerCounts.C);
            $("#CountD").html(answerCounts.D);
            $("#CountE").html(answerCounts.E);
            $("#CountF").html(answerCounts.F);
            $("#CountG").html(answerCounts.G);
            $("#CountH").html(answerCounts.H);
            $("#CountI").html(answerCounts.I);
            // Calculate the total count
            const totalCount = answerCounts.A + answerCounts.B + answerCounts.C + answerCounts.D+ answerCounts.E+ answerCounts.F+ answerCounts.G+ answerCounts.H+ answerCounts.I;
            $("#Total").html(totalCount);

            const mostPopularAnswer = Object.keys(answerCounts).reduce((a, b) => {
                return answerCounts[a] > answerCounts[b] ? a : b;
            });
            
            let mostPopularAnswerNo = "";
            switch(mostPopularAnswer){
                case "A":
                    mostPopularAnswerNo=9;
                    break;
                case "B":
                    mostPopularAnswerNo=6;
                    break;
                case "C":
                    mostPopularAnswerNo=3;
                    break;
                case "D":
                    mostPopularAnswerNo=1;
                    break;
                case "E":
                    mostPopularAnswerNo=4;
                    break;
                case "F":
                    mostPopularAnswerNo=2;
                    break;
                case "G":
                    mostPopularAnswerNo=8;
                    break;
                case "H":
                    mostPopularAnswerNo=5;
                    break;
                case "I":
                    mostPopularAnswerNo=7;
                    break;
                default:
                    break;
            }
            
            // Send the answers to the Laravel controller using AJAX
            $.ajax({
                url: '/submit-answers',  // Your Laravel route
                method: 'POST',
                data: {
                    _token: $('meta[name="csrf-token"]').attr('content'), // CSRF token
                    answers: answers,
                    userId:$("#userId").val(),
                    answerCounts:answerCounts,
                    mostPopularAnswer:mostPopularAnswer,
                    mostPopularAnswerNo:mostPopularAnswerNo
                },
                success: function (response) {
                    window.location.href = response.redirect_url;
                },
                error: function (xhr, status, error) {
                    console.error(xhr, status, error);
                    // Handle error
                }
            });
            
        });
    });
    $(document).ready(function () {
        // Disable the left arrow on the first question
        $(".question-container").each(function () {
            var questionId = $(this).attr('id').split('-')[1]; // Extract the question id
            if (questionId == 1) {
                $(this).find(".question-icon-left i").addClass("disabled").attr("onclick", "return false;");
            } else {
                $(this).find(".question-icon-left i").removeClass("disabled").attr("onclick", function () {
                    return "previousQuestion(" + questionId + ")";
                });
            }
        });

        // Bind the next question navigation
        $(".question-icon-right i").on('click', function () {
            var currentQuestionId = $(this).closest('.question-container').attr('id').split('-')[1];
            nextQuestion(currentQuestionId);
        });

        // Bind the previous question navigation
        $(".question-icon-left i").on('click', function () {
            var currentQuestionId = $(this).closest('.question-container').attr('id').split('-')[1];
            if (!$(this).hasClass('disabled')) {
                    previousQuestion(currentQuestionId);
                }
            });
        });

        function nextQuestion(currentQuestionNumber) {
            const currentQuestion = $("#question-" + currentQuestionNumber);
            const errorMessage = $("#error-q" + currentQuestionNumber);
            // Check if an answer is selected
            if (!$("input[name='q" + currentQuestionNumber + "']:checked").length) {
                errorMessage.text("Please select an answer before proceeding!");
                return; // Do not proceed if no answer is selected
            }
            errorMessage.text(""); 
            // Hide the current question
            currentQuestion.removeClass("active");
            // Get the next question
            const nextQuestionNumber = parseInt(currentQuestionNumber) + 1;
            const nextQuestion = $("#question-" + nextQuestionNumber);
            if (nextQuestion.length) {
                nextQuestion.addClass("active");
            } else {
                $("#finish-message").show();
                nextQuestion.addClass("hideClasse");
            }
        }

        function previousQuestion(currentQuestionNumber) {
            const currentQuestion = $("#question-" + currentQuestionNumber);
            // Hide the current question
            currentQuestion.removeClass("active");
            // Get the previous question number
            const prevQuestionNumber = currentQuestionNumber - 1;
            const prevQuestion = $("#question-" + prevQuestionNumber);
            // Show the previous question if it exists
            if (prevQuestion.length) {
                prevQuestion.addClass("active");
            }
            // Update the button states
            const prevButton = $("#question-" + prevQuestionNumber + " .fa-chevron-left");
            const nextButton = $("#question-" + prevQuestionNumber + " .fa-chevron-right");
            // Disable the previous button if it's the first question (question number 1)
            if (prevQuestionNumber === 0) {
                prevButton.addClass("disabled").attr("onclick", "return false;");
            } else {
                prevButton.removeClass("disabled").removeAttr("onclick");
            }
            // Ensure the next button is always enabled when moving backward
            nextButton.removeClass("disabled").removeAttr("onclick");
        }

        

    </script>
</body>

</html>