
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>UNIVERSITY SOCIAL NETWORKING WEB</title>
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <h1>UNIVERSITY SOCIAL NETWORKING WEB</h1>
        <main>
            <form action="/signup" method="POST">
                <h2>
                    Student sign up
                </h2>
                <form action="connect.php" method="post">
                <div class="form-group">
                    <label for="username">Username</label><br>
                    <input type="text" id="Username=" name="username">
                </div>
                <div >
                    <label for="regNumber">Registration No:</label><br>
                    <input type="text" id="Registration" name="Registration No:" required pattern>
                </div>
                <div>
                    <label for="Schoolname">School Name</label>
                    <input type="text" id="Schoolname" name="Schoolname" required>
                </div>
                <div>
                    <label for="CourseName">Department</label>
                    <input type="text" id="Department" name="Department" required>
                </div>
                <div>
                    <label for="CourseName">Course Name</label>
                    <input type="text" id="CourseName" name="CourseName" required>
                </div>
                <div>
                    <label for="password">password</label><br>
                    <input type="password" id="password" name="password" required>
                </div>
                <div>
                    <label for="year">Year</label>
                    <select id="year" name="Year" required>
                        <option value=""> select Year</option>
                        <option value="1"> 1st Year</option>
                        <option value="2">2nd Year</option>
                        <option value="3">3rd Year</option>
                        <option value="4">4th Year</option>
                        <option value="5">5th Year</option>
                    </select>
                </div>
                <button type="submit" name="insert-user-data"Register</button>
                <p>already have an account?<span><a href="index.php">log in</a></span><p>
            </form>
        </form>
            </main>
        <footer>
            <p>University social networking web @ 2024</p>
        </footer>
    </body>
</html>