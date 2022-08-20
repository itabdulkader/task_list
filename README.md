TASK:
Create an application where the admin can create a task(title, description,
assigned_to_id, assigned_by_id) and assign it to any non-admin user. The Statistics
table should hold the number of tasks assigned to each user.
The application should contain three pages according to the following
1. Page 1: Task creation page contains the following input fields
1. Admin Name (dropdown)
2. title (text)
3. description (text area)
4. Assigned User (dropdown)
   After submitting the task creation form, redirect the user to the Task List page.
2. Page 2: Task List page contains (title, description, assigned name, admin
   name) paginated as 10 tasks per view
3. Page 3: Statistics page holds user task count statistics (top 10 users with
   highest tasks count)
   Required:
   • Create database using artisan command
   • Create seed for 10000 users, 100 admins
   • Write tests (minimum 3)
   Bonus:
   •Update Statistics table using a background job.
   • Confirm the test run in the github actions after each commit.
   • Cache user list for displaying in the Task creation page.
