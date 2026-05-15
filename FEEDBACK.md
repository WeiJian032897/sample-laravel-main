# Feedback

## Candidate Information
- **Name**: Chee Wei Jian 
- **Tasks Chosen**: Task 1,2 ,3 ,and 4

## Approach

For each task, I followed Laravel's MVC pattern — modifying routes, controllers, models, and views in a logical order.

- **Task 1 (Remember Me):** Added `name="remember"` to the login form checkbox, then passed `$request->boolean('remember')` as the second argument to `Auth::guard('admin')->attempt()`. This is Laravel's built-in way to persist sessions via a long-lived cookie.

- **Task 2 (Route Protection):** Added an early-return check inside `AdminLoginController@showLoginForm`. If the admin guard is already authenticated, the user is redirected to the post list instead of rendering the login form. This approach was chosen because the project uses a custom `admin` guard rather than Laravel's default `guest` middleware.

- **Task 3 (Quick Publish Toggle):** Added a `PATCH` route and a `togglePublish` method in `PostController` that flips the `is_published` boolean. The existing placeholder button in `index.blade.php` was replaced with a small form that submits to this route. The button color and icon change based on the current publish status.

- **Task 4 (Featured Image):** Created a new migration to add a nullable `featured_image` column to the posts table. Updated the `Post` model's `$fillable`, added file input fields to the create and edit forms, and handled upload logic in the controller using Laravel's `store()` method. Old images are deleted from storage when replaced.

---

## Assumptions

- File uploads are stored locally using Laravel's `public` disk, not on a cloud service like S3.
- The `featured_image` field is optional — posts without an image show a "No Image" placeholder.
- Route protection for Task 2 only needed to cover the login page, not other guest-only routes.
- The toggle publish button does not require a confirmation dialog for simplicity.

---

## Limitations

- The featured image is not displayed on the public post detail page (`/post/view/{id}`), only on the listing page.
- Task 2 only guards `showLoginForm` against authenticated users. During implementation, I also noticed that the admin post routes were not protected by the existing `RedirectIfNotAdmin` middleware. This was fixed by applying the `admin` middleware to the post route group in `web.php`.

---

## Challenges
- Understanding the relationship between routes, controllers, models, and views took some time as my prior Laravel experience was limited to coursework in Integrative Programming.
- For Task 4, I was unsure of the correct approach for handling file uploads in Laravel. I consulted AI for guidance on the recommended direction, then implemented and tested the solution.

---

## Improvements (If Given More Time)

- Add role-based access control so only administrators can access certain routes.
- Display the featured image on the public post detail page as well.

---

## Additional Notes

I'm still a beginner with the Laravel framework, but I'm actively using AI as a teacher to enhance my understanding and resolve my questions. Each task helped me better understand how the framework's layers connect:
- **Task 1** — how Laravel handles persistent authentication via remember tokens.
- **Task 2** — how guard checks can be used to control page access based on auth state.
- **Task 3** — how a small controller method and a form can update a single field without a full edit flow.
- **Task 4** — how Laravel handles file uploads end-to-end, from migration to storage to display.

I used a local development environment (Laragon) to run the application instead of Docker. This allowed me to quickly set up PHP, MySQL, and Composer.


