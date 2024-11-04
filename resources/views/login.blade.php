<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LaravelPro1</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #272727; /* Dark background */
            margin: 0;
            padding: 20px;
            display: flex;
            justify-content: top;
            align-items: center;
            flex-direction: column; /* Center content vertically */
            height: 100vh;
        }

        h1 {
            color: #ffffff; /* White text for header */
            margin-bottom: 20px; /* Space below the header */
        }

        .container {
            max-width: 400px;
            width: 100%;
            padding: 20px;
            background: #444; /* Darker background for the container */
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.3);
        }

        .form-section {
            margin: 20px 0;
        }

        .form-section h2 {
            margin-top: 0;
            color: #fff; /* White color for subheadings */
        }

        input[type="text"],
        input[type="password"] {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ddd;
            border-radius: 5px;
            box-sizing: border-box;
            background: #c5c5c5; /* Darker input field background */
            color: white; /* White text for input fields */
        }

        button {
            background-color: #0d7ec9; /* Button color */
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
            width: 100%;
        }

        button:hover {
            background-color: #2980b9; /* Hover effect */
        }

        .hidden {
            display: none;
        }

        p {
            text-align: center;
            color: #ccc; /* Light gray text for paragraphs */
        }

        a {
            color: #1a8ad4; /* Link color */
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }
    </style>

    <script>
        function toggleForms() {
            const loginForm = document.getElementById('loginForm');
            const registerForm = document.getElementById('registerForm');
            loginForm.classList.toggle('hidden');
            registerForm.classList.toggle('hidden');
        }
    </script>
</head>
<body>
    <header>
        <h1>Hello WOrld</h1>
    </header>
<br>
<br>
    <div class="container-fluid">
        <div class="form-section" id="loginForm">
            <h2>Login</h2>
            <form action="/login" method="post">
                @csrf
                <input type="text" name="loginname" placeholder="Name" required>
                <input type="password" name="loginpassword" placeholder="Password" required>
                <button>Login</button>
            </form>
            <p>Don't have an account? <a href="javascript:void(0);" onclick="toggleForms()">Register here</a>.</p>
        </div>  

        <div class="form-section hidden" id="registerForm">
            <h2>Register</h2>
            <form action="/register" method="post">
                @csrf
                <input type="text" name="name" placeholder="Name" required>
                <input type="text" name="email" placeholder="Email" required>
                <input type="password" name="password" placeholder="Password" required>
                <button>Register</button>
            </form>
            <p>Already have an account? <a href="javascript:void(0);" onclick="toggleForms()">Login here</a>.</p>
        </div>    
    </div>
</body>
</html>
