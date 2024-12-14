<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>@yield('title', 'Ruchi Doctor')</title>
    <meta name="description" content="">
    <meta name="keywords" content="">

    <!-- Favicons -->
    <link href="{{ asset('images/favicon.ico') }}" rel="icon">
    <!-- Vendor CSS Files -->
    <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <!-- Main CSS File -->
    <link href="{{ asset('assets/css/main.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">

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
    <script src="{{ asset('assets/js/main.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
     <!-- jQuery (required for validation) -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/jquery.validate.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
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
        
    });
    </script>
</body>

</html>