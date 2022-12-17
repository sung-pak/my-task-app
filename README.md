Deployment instructions on cloud server:

After your files have been pushed to the main branch in github.

1) Verify you have the following services installed on server: Laravel, Git.
2) Verify the .env file has updated values for dev/live environment.
3) Verify values inside config/app.php
4) Verify .htaccess and public/index.php has correct values, .htaccess should point public directory for the live site.
5) Update database on server with `php artisan migrate`
6) From server pull files from GitHub `git pull origin main`