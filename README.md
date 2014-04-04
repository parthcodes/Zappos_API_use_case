Zappos_API_use_case
===================

1. Zappos_Database.php : This file has simple HTML form that accepts Email and Product ID from the user, and save it to the database for record.


2. Scheduled_Check.php : This file is deployed on the server that has CronJob function & Email send function. Which will check the database at set interval and notify the user via email.
This file have following functions.

- cron job on the database.
- Zappos search API.
- JSON data parsing.
- Send Email to users.



** More information is added as comments in the codes.
