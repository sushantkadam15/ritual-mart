<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Meta tags for character encoding, compatibility, and responsiveness -->
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- Title for the webpage -->
  <title>Ritual Mart</title>
  <!-- Importing Tailwind CSS framework and custom styles -->
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="stylesheet" href="style.css">
</head>

<body class=" h-[100vh] ">
  <!-- Section for the main content -->
  <section class="text-gray-600 body-font">
    <!-- Container for centering content -->
    <div class="container mx-auto flex flex-col px-5 pt-4 justify-center items-center">
      <!-- Ritual Mart logo -->
      <img class="lg:w-2/6 md:w-3/6 w-[15rem] mb-10 object-cover object-center rounded md:mt-[5%]" alt="hero" src="../img/Logo.svg ">
      <!-- Information about the upcoming launch -->
      <div class="w-full md:w-2/3 flex flex-col mb-16 items-center text-center">
        <h1 class="title-font sm:text-4xl text-3xl mb-4 font-medium text-gray-900">Hello! 👋 You caught us before we're ready.</h1>
        <p class="mb-8 leading-relaxed">We're working hard to put the finishing touches on Ritual Mart. Things are going well and it should be ready to help you with all your pooja needs soon. <br><br>If you'd like us to send you a reminder when we're ready, just put your email in below:</p>

        <div class="w-full">
          <?php
          // initialize the $errors variable
          $errors = array();

          if (isset($_POST['submit'])) {
            // collect form data
            $email = $_POST['email'];

            // validate email address
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
              $errors[] = "Please enter a valid email address";
            }

            //if no errors carry on
            if (empty($errors)) {

              // Open the CSV file or create it if it does not exist
              $file = fopen("emails.csv", "a");
              if (!$file) {
                $file = fopen("emails.csv", "w");
                fputcsv($file, array("Email"));
              }

              // Add the email address to the CSV file
              fputcsv($file, array($email));
              fclose($file);

              // Display a success message to the user
              echo "<p class='text-[#6822E9] text-3xl'>Thank you for subscribing! 😃 We will reach out to you as soon as we are live.</p>";
            }
          } else {
            // Display the subscription form to the user
          ?>
            <form action="" method="post" class="flex w-full justify-center items-end">
              <div class="relative mr-4 lg:w-full xl:w-1/2 w-2/4 md:w-full text-left">
                <label for="email" class="leading-7 text-sm text-gray-600"></label>
                <input id="email" name="email" type="email" placeholder="name@gmail.com" class="w-full bg-gray-100 bg-opacity-50 rounded focus:ring-2 focus:ring-indigo-200 focus:bg-transparent border border-gray-300 focus:border-indigo-500 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out" required>
              </div>
              <!-- Subscription button -->
              <button type="submit" name="submit" class="inline-flex text-white bg-[#ee316a] border-0 py-2 px-6 focus:outline none hover:bg-[#f1b65b] rounded text-lg">Remind Me</button>
            </form>
          <?php
          }
          ?>
        </div>
      </div>
    </div>
  </section>

  <!-- Footer Section -->
  <footer class="text-gray-600 body-font mt-20">
    <div class="container px-5 py-8 mx-auto flex items-center justify-center sm:flex-row flex-col">
      <!-- Footer logo and copyright information -->
      <a class="flex title-font font-medium items-center md:justify-start justify-center text-gray-900">
        <img src="../img/Logo.svg" alt="Logo" class="h-10">
        </svg>
      </a>
      <!-- Contact email information -->
      <p class="text-sm text-gray-500 sm:ml-4 sm:pl-4 sm:border-l-2 sm:border-gray-200 sm:py-2 sm:mt-0 mt-4">© 2023 Ritual Mart —
        <a href="mailto:ritualmart.store@gmail.com" class="text-gray-600 ml-1" rel="noopener noreferrer">@ritualmart</a>
      </p>
      <!-- Link to developer's LinkedIn profile -->
    </div>
  </footer>
</body>

</html>