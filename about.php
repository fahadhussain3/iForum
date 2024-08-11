<?php
include 'dbconnect.php';
include 'partials.php';
?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.rtl.min.css"
        integrity="sha384-dpuaG1suU0eT09tx5plTaGMLBsfDLzUCCUXOY2j/LSvXYuG6Bqs43ALlhIqAJVRb" crossorigin="anonymous">

    <title>iForum - About Us</title>
</head>

<body>
    <div class="container my-5">
        <div class="jumbotron" style="background-color: #e2e6ea;">
            <h1 class="display-4">About Us</h1>
            <p class="lead">Welcome to iForum, your go-to platform for discussions and information exchange.</p>
        </div>

        <section class="my-5">
            <h2>Our Mission</h2>
            <p>At iForum, our mission is to provide a space where users can share knowledge, ask questions, and engage in meaningful conversations. We aim to foster a community of learners and enthusiasts who support each other through the exchange of information and ideas.</p>
        </section>

        <section class="my-5">
            <h2>Our History</h2>
            <p>iForum was founded in 2024 by <strong>Faisal Noman</strong> with the vision of creating a user-friendly and informative platform. Over the years, we have grown and evolved, continually improving our features to better serve our community.</p>
        </section>

        <section class="my-5">
            <h2>Our Values</h2>
            <p>We believe in openness, respect, and the power of collective knowledge. Our core values are:</p>
            <ul>
                <li><strong>Inclusivity:</strong> We welcome users from all backgrounds and perspectives.</li>
                <li><strong>Respect:</strong> We promote respectful and constructive discussions.</li>
                <li><strong>Learning:</strong> We believe in the continuous pursuit of knowledge and personal growth.</li>
            </ul>
        </section>

        <section class="my-5">
            <h2>Our Team</h2>
            <p>Our team is dedicated to maintaining a platform that is both informative and user-friendly. Meet some of our key team members:</p>
            <ul>
                <li><strong>Faisal Noman:</strong> Founder & CEO - The visionary behind the platform, responsible for overall strategy and leadership.</li>
                <li><strong>Fahad Hussain:</strong> Chief Technology Officer (CTO) - Oversees the technical aspects and ensures the platform is running smoothly and securely.</li>
                <!-- Add more team members as needed -->
            </ul>
        </section>

        <section class="my-5">
            <h2>Contact Us</h2>
            <p>If you have any questions, feedback, or need support, feel free to reach out to us:</p>
            <ul>
                <li>Email: support@iforum.com</li>
                <li>Phone: (+92) 303-9185241</li>
                <li>Address: 123 iForum Lane, Discussion City, DC 45678</li>
            </ul>
        </section>
    </div>

    <footer>
        <?php
        include 'footer.php';
        ?>
    </footer>
    <!-- Optional JavaScript; choose one of the two! -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>
