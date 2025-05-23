<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Algoman CRM</title>
    <link rel="stylesheet" href="{{ asset('adminui/css/styles.min.css') }}" />
        <link rel="shortcut icon" type="image/png" href="{{ asset('admin/images/logo.png') }}" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet" />

    <style>
        body {
            background: linear-gradient(135deg, #1e3c72, #2a5298);
            font-family: 'Poppins', sans-serif;
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
            margin: 0;
            padding: 20px;
        }

        .login-container {
            background-color: #ffffff;
            border-radius: 12px;
            box-shadow: 0 8px 30px rgba(0, 0, 0, 0.15);
            padding: 40px;
            max-width: 400px;
            width: 100%;
            color: #333;
            animation: fadeInUp 0.8s ease-in-out;
        }

        .text-center p {
            font-size: 24px;
            color: #2a5298;
            font-weight: 600;
            margin-bottom: 20px;
        }

        .form-container {
            margin-top: 20px;
        }

        .password-container {
            position: relative;
        }

        .password-container input[type="password"],
        .password-container input[type="text"] {
            padding-right: 45px;
        }

        .toggle-password {
            position: absolute;
            top: 67%;
            right: 10px;
            transform: translateY(-50%);
            cursor: pointer;
            color: #007bff;
            transition: color 0.3s;
        }

        .toggle-password:hover {
            color: #0056b3;
        }

        .form-label {
            font-weight: 600;
            color: #495057;
            font-size: 14px;
        }

        .form-control {
            border-radius: 8px;
            border: 1px solid #ced4da;
            padding: 12px;
            font-size: 14px;
            transition: border-color 0.3s, box-shadow 0.3s;
        }

        .form-control:focus {
            border-color: #00b4db;
            box-shadow: 0 0 0 0.2rem rgba(0, 180, 219, 0.25);
        }

        .btn-primary {
            background-color: #00b4db;
            border-color: #00b4db;
            padding: 12px;
            font-size: 16px;
            font-weight: bold;
            border-radius: 8px;
            transition: background-color 0.3s, border-color 0.3s;
            width: 100%;
        }

        .btn-primary:hover {
            background-color: #0083b0;
            border-color: #007bff;
        }

        .tech-quote {
            text-align: center;
            font-size: 14px;
            color: #666;
            margin-top: 20px;
            font-style: italic;
        }

        .error-message {
            color: red;
            font-size: 13px;
            margin-bottom: 10px;
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .quote-container {
            text-align: center;
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 8px 30px rgba(0, 0, 0, 0.15);
            width: 80%;
            max-width: 600px;
        }

        .quote-text {
            font-size: 20px;
            color: #333;
            margin-bottom: 15px;
        }

        .quote-author {
            font-size: 16px;
            color: #666;
            font-style: italic;
        }
    </style>
</head>

<body>

    <div class="quote-container " style="
    margin-right: 25px;
">
        <p class="quote-text" id="quote"></p>
        <p class="quote-author" id="author"></p>
    </div>
    <div class="login-container">
        <div class="text-center">
            <!-- <a href="#" class="logo-img">
               <img src="{{ asset('admin/images/logo.png') }}" alt="Logo" width="120">
            </a> -->
            <p>THE ALGOMAN </p>
        </div>

        <div class="form-container">
            <div class="card mb-0 ">
                <div class="card-body">
                    <form method="post" action="{{route('validateUser')}}" id="loginauth">
                        @csrf
                        <!-- Email Input -->
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" name="email" id="email" placeholder="Enter Email">
                            <div class="error-message" id="email-error"></div>
                        </div>

                        <!-- Password Input -->
                        <div class="mb-4 password-container">
                            <label for="typepassword" class="form-label">Password</label>
                            <input type="password" id="typepassword" class="form-control" name="password" placeholder="Enter Password">
                            <i class="fas fa-eye toggle-password" id="viewpassword"></i>
                            <div class="error-message" id="password-error"></div>
                        </div>

                        <!-- Authentication Code -->
                        <div class="mb-3" id="authcode" style="display: none;">
                            <label for="authcodeinput" class="form-label">Authentication Code</label>
                            <input type="text" class="form-control" name="code" id="authcodeinput" placeholder="Enter Authentication Code">
                            <div class="error-message" id="authcode-error"></div>
                        </div>

                        <!-- Submit Button -->
                        <div class="d-flex justify-content-center">
                            <input type="submit" class="btn btn-primary" id="processing" value="Sign In">
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Tech Quote -->




    </div>

    <script src="{{ asset('adminui/libs/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ asset('adminui/libs/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('admin/js/ajax/authvalidation.js') }}"></script>
    <script>
        document.getElementById('viewpassword').addEventListener('click', function() {
            let passwordInput = document.getElementById('typepassword');
            let type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
            passwordInput.setAttribute('type', type);
            this.classList.toggle('fa-eye');
            this.classList.toggle('fa-eye-slash');
        });
    </script>

    <script>
        const quotes = [{
                text: "Trading doesn't just reveal your character; it also builds it if you stay in the game long enough.",
                author: "Yvan Byeajee"
            },
            {
                text: "Confidence is not 'I will profit on this trade.' Confidence is 'I will be fine if I don't profit from this trade.'",
                author: "Yvan Byeajee"
            },
            {
                text: "The goal of a successful trader is to make the best trades. Money is secondary.",
                author: "Alexander Elder"
            },
            {
                text: "Amateurs think about how much money they can make. Professionals think about how much money they could lose.",
                author: "Jack Schwager"
            },
            {
                text: "Where you want to be is always in control, never wishing, always trading, and always, first and foremost, protecting your butt.",
                author: "Paul Tudor Jones"
            },
            {
                text: "If you personalize losses, you can't trade.",
                author: "Bruce Kovner"
            },
            {
                text: "The key to trading success is emotional discipline. If intelligence were the key, there would be a lot more people making money trading.",
                author: "Victor Sperandeo"
            },
            {
                text: "It’s only when the tide goes out that you learn who has been swimming naked.",
                author: "Warren Buffett"
            },
            {
                text: "Hope is a bogus emotion that only costs you money.",
                author: "Jim Cramer"
            },
            {
                text: "Trading is simple, but it's not easy.",
                author: "Van K. Tharp"
            },
            {
                text: "Being a successful trader also takes courage: the courage to try, the courage to fail, the courage to succeed, and the courage to keep on going when the going gets tough.",
                author: "Yvan Byeajee"
            },
            {
                text: "The biggest risk of all is not taking one.",
                author: "Mellody Hobson"
            },
            {
                text: "An investor without investment objectives is like a traveler without a destination.",
                author: "Ralph Seger"
            },
            {
                text: "The four most dangerous words in investing are: 'This time it's different.'",
                author: "Sir John Templeton"
            },
            {
                text: "You must have a backup plan for every situation. And you must do this before you enter your every trade.",
                author: "Brian Shannon"
            },
            {
                text: "Letting your emotions override your plan or system is the biggest cause of failure.",
                author: "J. Welles Wilder Jr."
            },
            {
                text: "Discipline is the bridge between poor trading and pro trading.",
                author: "Meghana V. Malkan"
            },
            {
                text: "Trade what you see, not what you hope.",
                author: "Unknown"
            },
            {
                text: "The trend is your friend – until it stabs you in the back with a chopstick.",
                author: "@StockCats"
            },
            {
                text: "Every single day was hard. Even when I was at the top of my game, there was never an easy day.",
                author: "Lance Breitstein"
            }
        ];


        // Function to randomly select a quote
        function showRandomQuote() {
            const randomIndex = Math.floor(Math.random() * quotes.length);
            const quote = quotes[randomIndex];

            document.getElementById('quote').textContent = quote.text;
            document.getElementById('author').textContent = `— ${quote.author}`;
        }

        // Show a new quote on page load
        window.onload = showRandomQuote;
        $(document).ready(function() {
            toastr.options = {
                timeOut: 5000, // Duration before the toast disappears
                closeButton: true, // Show close button
                progressBar: true, // Show progress bar
                preventDuplicates: true, // Prevent duplicate toasts
            };
        });
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

</body>

</html>