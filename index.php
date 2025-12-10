<?php
$title = "My PHP skills";
require_once("blocks/header.php");
?>
<link rel="stylesheet" href="css/portfolio.css"/>

<body>
    <div class="container">

        <!-- Intro -->
        <section class="container mt2">
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

            <h2> Welcome to My PHP Portfolio</h2>

            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 30px; margin-bottom: 30px;">
                <div>
                    <h4>PHP Environment</h4>
                    <p style="font-size: 1.1rem;"><strong>Current Version:</strong> <span style="color: var(--success); font-weight: bold;"><?= $phpVersion ?></span></p>
                </div>
                <div>
                    <h4>About This Page</h4>
                    <p><?= introMessage(); ?></p>
                </div>
            </div>

            <h4>What I Use PHP For:</h4>
            <ul>
                <?php foreach ($skills as $item): ?>
                    <li><?= htmlspecialchars($item); ?></li>
                <?php endforeach; ?>
            </ul>
        </section>

        <!-- Demo Form -->
        <section class="container mt2">
            <h2>Interactive Form Example</h2>
            <p>This form demonstrates several key backend concepts:</p>
            <ul style="margin-bottom: 30px;">
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

                <?php if ($success): ?>
                    <div class="success">
                        <strong>✓ Success!</strong> Your message was submitted successfully.
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
                    <label for="name">Name:</label>
                    <input type="text" id="name" name="name" value="<?= $name ?>" placeholder="Enter your name">

                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email" value="<?= $email ?>" placeholder="Enter your email">

                    <label for="message">Message:</label>
                    <textarea id="message" name="message" placeholder="Enter your message"><?= $message ?></textarea>

                    <button type="submit" class="btn btn-success" style="width: 100%;">Send Message</button>
                </form>
            </div>
        </section>

        <!-- OOP, Database and API -->
        <section class="container mt2">
            <h2>OOP & Database Integration</h2>
            <p>These real-world examples demonstrate how I structure code, work with databases, and build APIs.</p>

            <h4>Object-Oriented Design Pattern:</h4>
            <ul>
                <li>OOP basics with dependency injection</li>
                <li>Clean, reusable PHP classes</li>
                <li>Service-oriented architecture</li>
            </ul>

            <pre style="margin: 0; background: transparent; color: inherit; padding: 0; border: none;">
    $service = new UserService(new Logger());
    echo $service->createUser("John");</pre>

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

                echo "<h4 style='margin-top: 20px;'>Sample Database Records:</h4>";
                echo "<div style='background: #f3f4f6; padding: 15px; border-radius: 8px; margin: 15px 0;'>";
                foreach ($users as $user) {
                    echo "<div style='padding: 8px 0; border-bottom: 1px solid #e5e7eb;'>";
                    echo "<strong>" . htmlspecialchars($user["name"]) . "</strong> - " . htmlspecialchars($user["email"]);
                    echo "</div>";
                }
                echo "</div>";
            } 
            catch (PDOException $e) 
            {
                echo "<div style='background: #fee2e2; color: #7f1d1d; padding: 15px; border-radius: 8px; border-left: 4px solid #ef4444;'>";
                echo "Database error: " . $e->getMessage();
                echo "</div>";
            }
            ?>

            <p style="margin-top: 20px;">This example demonstrates secure database connections using PDO with prepared statements, which protect against SQL injection attacks. I also enable error reporting and UTF-8 encoding for reliability and easier debugging.</p>

            <div id="api-demo" style="margin-top: 30px;">
                <h4>API Response Example:</h4>
                <script>
                    fetch("api/example.php")
                        .then(response => response.json())
                        .then(data => {
                            const pre = document.createElement('pre');
                            pre.textContent = JSON.stringify(data, null, 2);
                            document.getElementById("api-demo").appendChild(pre);
                        })
                        .catch(error => {
                            document.getElementById("api-demo").innerHTML += '<p style="color: var(--error);">Could not load API demo</p>';
                        });
                </script>
            </div>
            <a href="http://projects/php-portfolio/api/example.php" target="_blank" class="btn btn-success">View Raw API Response</a>
            <p></br></p>
            
        </section>

        <!-- Simple PHP CRUD App -->
        <section class="container mt2">
            <h2>CRUD Application Project</h2>
            <p>This is a lightweight CRUD (Create, Read, Update, Delete) system written in plain PHP and MySQL. It demonstrates how I work with database queries, input validation, and simple routing logic without using a framework. The interface is intentionally minimal to focus on backend functionality.</p>

            <a href="crud-demo.php" class="btn btn-success" style="margin-top: 20px;">Explore the CRUD Project →</a>
            <p></br></p>
        </section>

        <!-- Security Practices -->
        <section class="container mt2">
            <h2>Security & Best Practices</h2>
            <p>Security is a core part of backend development. These are the practices I follow in every PHP project:</p>

            <h4>🔒 Security Measures:</h4>
            <ul>
                <li>Prepared statements to protect against SQL injection</li>
                <li>Password hashing using password_hash() and password_verify()</li>
                <li>Input sanitization with htmlspecialchars() and filters</li>
                <li>CSRF-safe forms, using tokens when needed</li>
                <li>Limited error visibility, no sensitive info in production</li>
                <li>Session hardening (regenerate IDs, HTTP-only cookies)</li>
            </ul>

            <pre>
    &lt;?php
        $hash = password_hash($password, PASSWORD_DEFAULT);
        if (password_verify($password, $hash)) {
            // Successful login
        }
    ?&gt;
            </pre>

            <!-- Performance -->
            <h4>⚡ Performance & Optimization</h4>
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

            <pre>   
    /app
        /controllers
        /models
        /views
    /config
    /public
    /vendor
            </pre>

            <!-- Tools -->
            <h4>🧰 Tools & Technologies</h4>
            <ul>
                <li>Composer for dependency management</li>
                <li>PDO for secure database access</li>
                <li>PHPUnit for testing</li>
                <li>phpMyAdmin / MySQL Workbench for database management</li>
                <li>Git for version control</li>
            </ul>

            <pre>
    composer init
    composer require vlucas/phpdotenv
            </pre>

            <!-- APIs -->
            <h4>🌐 APIs & Frontend Integration</h4>
            <p>I often build APIs that serve data to JavaScript frontends, fetch/AJAX requests, JSON-based components, or external services.</p>

            <pre>
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
            <h4>👍 My PHP Development Mindset</h4>
            <p>I focus on writing clean, secure, and maintainable PHP code. Even small projects follow professional practices such as validation, separation of logic, and safe database access. My goal is always to build applications that are easy to read, easy to extend, and safe to use.</p>
            <p></br></p>
        </section>

    </div>
</body>

<?php
require_once("blocks/footer.php");
?>