<?php
$title = "My PHP skills";
require_once("blocks/header.php");
?>

<body>
    <div class="container mt2">

        <!-- Intro -->
        <div class="php-intro">
            <?php
            //check to show the server is running PHP
            $phpVersion = phpversion();

            //function that returns a message
            function introMessage()
            {
                return "This page is powered by PHP and demonstrates how I use it in real projects.";
            }

            //array that could represent modules/features
            $skills = [
                "Backend logic & APIs",
                "Working with databases (MySQL/PDO)",
                "Object-oriented programming",
                "Form handling & validation",
                "Security best practices"
            ];
            ?>

            <h3>PHP Environment</h3>
            <p><strong>PHP Version:</strong> <?= $phpVersion ?></p>

            <h3>About This Page</h3>
            <p><?= introMessage(); ?></p>

            <h3>What I Use PHP For:</h3>
            <ul>
                <?php foreach ($skills as $item): ?>
                    <li><?= htmlspecialchars($item); ?></li>
                <?php endforeach; ?>
            </ul>
        </div>

        <!-- Demo Form -->
        <div class="container mt2">
            <h3>This form example demonstrates:</h3>
            <ul>
                <li>Server-side validation</li>
                <li>Safe handling of user input</li>
                <li>Clean separation of logic and output</li>
                <li>Real PHP in action</li>
            </ul>
            <?php
            // Initialize variables
            $name = $email = $message = "";
            $errors = [];
            $success = false;

            // Handle form submission
            if ($_SERVER["REQUEST_METHOD"] === "POST") {

                // Name validation
                if (empty($_POST["name"])) {
                    $errors[] = "Name is required.";
                } else {
                    $name = htmlspecialchars(trim($_POST["name"]));
                }

                // Email validation
                if (empty($_POST["email"])) {
                    $errors[] = "Email is required.";
                } elseif (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
                    $errors[] = "Invalid email format.";
                } else {
                    $email = htmlspecialchars(trim($_POST["email"]));
                }

                // Message validation
                if (empty($_POST["message"])) {
                    $errors[] = "Message cannot be empty.";
                } else {
                    $message = htmlspecialchars(trim($_POST["message"]));
                }

                // If no errors -> form was validated successfully
                if (empty($errors)) {
                    $success = true;

                    // In real projects you would send an email or store it in a database.
                    // For a portfolio demo we just simulate success.
                }
            }
            ?>

            <div class="php-demo">

                <h4>Interactive form Demo</h4>
                <p>This contact form runs on PHP and shows server-side validation in action.</p>

                <?php if ($success): ?>
                    <div class="success">
                        <strong>Thank you!</strong> Your message was submitted successfully.
                    </div>
                <?php endif; ?>

                <?php if (!empty($errors)): ?>
                    <div class="errors">
                        <strong>Please fix the following:</strong>
                        <ul>
                            <?php foreach ($errors as $err): ?>
                                <li><?= $err; ?></li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                <?php endif; ?>

                <form method="POST">
                    <label>Name:</label>
                    <input type="text" name="name" value="<?= $name ?>">

                    <label>Email:</label>
                    <input type="text" name="email" value="<?= $email ?>">

                    <label>Message:</label>
                    <textarea name="message"><?= $message ?></textarea>

                    <button type="submit" class="btn btn-success">Send</button>
                </form>
            </div>
        </div>

        <!-- Database and API -->
        <div class="container mt2">
            <h3>Below are small, real-world PHP examples showing how I structure code,
                work with databases, and build simple APIs.</h3>
            <h4>This snippet shows:</h4>
            <ul>
                <li>OOP basics</li>
                <li>Constructor dependency injection</li>
                <li>Clean, reusable PHP classes</li>
            </ul>
            <?php
            // A simple Logger class
            class Logger
            {
                public function log($message)
                {
                    echo "[LOG] " . $message . "<br>";
                }
            }

            // A service that depends on Logger
            class UserService
            {
                private $logger;

                public function __construct(Logger $logger)
                {
                    $this->logger = $logger;
                }

                public function createUser($name)
                {
                    // Simulate creating a user
                    $this->logger->log("Creating user: {$name}");
                    return "User '{$name}' created." . "<br>";
                }
            }

            // Usage
            $service = new UserService(new Logger());
            echo $service->createUser("John");
            // Example: secure query to fetch products from a database
            try {
                $pdo = new PDO(
                    "mysql:host=localhost;dbname=phplearn;charset=utf8",
                    "root",
                    ""
                );
                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                $statement = $pdo->prepare("SELECT name, email FROM users");
                $statement->execute();

                $users = $statement->fetchAll(PDO::FETCH_ASSOC);

                foreach ($users as $user) {
                    echo $user["name"] . " - " . $user["email"] . "<br>";
                }
            } catch (PDOException $e) {
                echo "Database error: " . $e->getMessage();
            }
            ?>
            <p></p>
            <p>This example shows how I connect to a MySQL database using PDO and run secure queries using prepared statements.
                Prepared statements ensure that user input is always treated as data, not SQL code, which protects the application from SQL injection attacks.
                I also enable error reporting and UTF-8 encoding for reliability and easier debugging.
            </p>


            <div id="api-demo">
                <script>
                    fetch("api/example.php")
                        .then(response => response.json())
                        .then(data => {
                            document.getElementById("api-demo").innerHTML =
                                "<pre>" + JSON.stringify(data, null, 2) + "</pre>";
                        });
                </script>
            </div>
            <a href="api/example.php" target="_blank" class="btn btn-success">View Raw API Response</a>
        </div>

        <!-- Simple PHP CRUD App -->
        <div class="container mt2">
            <p></p>
            <h3>Mini Project: Simple PHP CRUD App</h3>
            <p>This is a lightweight CRUD (Create, Read, Update, Delete)
                system written in plain PHP and MySQL. It demonstrates how I work with database queries,
                input validation, and simple routing logic without using a framework.
                The interface is intentionally minimal to focus on backend functionality.
            </p>
            <p></p>
            <a href="crud-demo.php" target="_blank" class="btn btn-success">Navigate to project page</a>
            <p></p>
        </div>

        <!-- Security Practices -->
        <div class="container mt2">
            <h3>Security Practices I Always Use</h3>
            <p>Security is a core part of backend development.
                These are the practices I follow in every PHP project:</p>
            <ul>
                <li>Prepared statements to protect against SQL injection</li>
                <li>Password hashing using password_hash() and password_verify()</li>
                <li>Input sanitization with htmlspecialchars() and filters</li>
                <li>CSRF-safe forms, using tokens when needed</li>
                <li>Limited error visibility, no sensitive info in production</li>
                <li>Session hardening (regenerate IDs, HTTP-only cookies)</li>
            </ul>
            <pre style="background:#eee; padding:10px; border-radius:5px;">
                &lt;?php
                $hash = password_hash($password, PASSWORD_DEFAULT);

                if (password_verify($password, $hash)) {
                    // Successful login
                }
                ?&gt;
            </pre>

            <!-- Performance -->
            <h4>⚡ Performance & Optimization Techniques</h4>
            <ul>
                <li>Use PDO prepared statements (cached & optimized)</li>
                <li>Reduce unnecessary database queries</li>
                <li>Avoid loading large arrays into memory</li>
                <li>Cache static data when possible</li>
                <li>Use JSON responses for lightweight APIs</li>
                <li>Compress output on the server when applicable</li>
            </ul>

            <!-- Clean Code -->
            <h4>🧱 Clean Code & Project Structure</h4>
            <ul>
                <li>Separate logic from templates</li>
                <li>Use classes and namespaces for organization</li>
                <li>Split code into clear files (config, model, view, routing)</li>
                <li>Keep functions short and focused</li>
                <li>Use meaningful variable and method names</li>
            </ul>
            <pre style="background:#eee; padding:10px; border-radius:5px;">
                /app
                    /controllers
                    /models
                    /views
                /config
                /public
                /vendor
            </pre>

            <!-- Tools -->
            <h4>🧰 Tools I Use in PHP Projects</h4>
            <ul>
                <li>Composer for dependency management</li>
                <li>PDO for secure database access</li>
                <li>PHPUnit for testing</li>
                <li>phpMyAdmin / MySQL Workbench for MySQL management</li>
                <li>Git for version control</li>
            </ul>
            <pre style="background:#eee; padding:10px; border-radius:5px;">
                composer init
                composer require vlucas/phpdotenv
            </pre>

            <!-- APIs -->
            <h4>🌐 APIs & Frontend Integration</h4>
            <p>I often build APIs that serve data to JavaScript frontends, fetch/AJAX requests, JSON-based components, or external services.</p>
            <pre style="background:#eee; padding:10px; border-radius:5px;">
                &lt;?php
                header("Content-Type: application/json");
                echo json_encode(["success" =&gt; true, "data" =&gt; $items]);
                ?&gt;
            </pre>

            <!-- Deployment -->
            <h4>🛠️ Deployment & Hosting</h4>
            <ul>
                <li>Shared hosting (cPanel, FTP, MySQL setups)</li>
                <li>Apache or Nginx environments</li>
                <li>PHP 8+ settings and php.ini modifications</li>
                <li>Managing environment variables (dotenv)</li>
            </ul>

            <!-- Mindset -->
            <h4>👍 My PHP Mindset</h4>
            <p>I focus on writing clean, secure, and maintainable PHP code. Even small projects follow professional practices such as validation, separation of logic, and safe database access. My goal is always to build applications that are easy to read, easy to extend, and safe to use.</p>
        </div>

    </div>
</body>

<?php
require_once("blocks/footer.php");
?>