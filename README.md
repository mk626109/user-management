## Project Setup

- Run `composer install` inside the project.
- Now, Set up a .env file, copy the data from .env.example, and fill in the database details.
- Generate the encryption key `php artisan key:generate`.
- Run migrations `php artisan migrate`.
- Run seeder command `php artisan db:seed`.
- Serve the project and open `http://localhost:8000`
- Now, You can login and register. To login as admin, use `admin@example.com/password`
- You are able to use the project.
- Now, For social logins, you need to create the App on both the facebook and google.
- For Google, Go to this link (https://console.cloud.google.com), create project with credentials and OAuth consent screen, and Fill in the client ID and secret in the env file.
- For Facebook, Go to this link (https://developers.facebook.com) and create an app. Make sure the Redirect Uri is correct.
- After this, you'll be able to login via facebook and google.
