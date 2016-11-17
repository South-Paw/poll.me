```
University of Canterbury
SENG365 Assignment 2
3rd June 2016
```

# poll.me
This is another Code Igniter application focused more around implementing APIs
and the using AngularJs for the front end app.

## Assignment Specifications
The `/doc` folder contains the [assignment specifications](https://github.com/South-Paw/poll.me/blob/master/doc/assignment_readme.md)
and the `.sql` file for creating the database tables.

## Running it
To run this app, you'll need a web server with PHP 5+ and a MySQL database.
Create the database tables using the `.sql` in the `/doc` folder.

Then you'll need to...

* Edit the `/application/config/config.php` file and add a `base_url`.
* Edit the `/application/config/database.php` file and add the default database details.

## About
Part of this assignment required us to write an 'about' page. I've copied the
contents of mine here so you don't need to dig around for it.

### What it does
The poll.me site is polling site that allows a user to vote on polls that are
currently running.

The front end of the application is an AngularJS app with RESTful services
provided in the back end.

The application is built with the Code Igniter PHP library but this is mostly
for the ease of use regarding routing and database queries.

The front page of the application shows all active polls, clicking on one loads
the view for that poll with the question and answer(s) shown. Clicking on an
answer will vote for that choice and take the user to the results page (which
will have recorded their answer).

I have provided a 'Reset Votes' button on the results page which resets all
votes for this poll. Ideally this would only be displayed to the admin of the
website however I did not implement login/session functionality.

### Usage Notes
The front end of the site is available at the expected studweb route. From
there, all routing is through the AngularJS routing library.

The RESTful services are available one the `/services/...` route and are
implemented as per the documentation.

### Design Choices
* **Again, Bootstrap (specifically [Bootswatch Superhero](https://bootswatch.com/superhero/)) was used for the site layout.** It was easier than writing my own styling from the ground up however I did write 51 lines of extra CSS.
* **The `/services/polls/:id` service returns doesn't return just a list of answer strings; instead it returns an object with each answer identified by it's id.** By doing this, it meant that there was no assumptions when submitting an answer back to the server and I could check to see if the submitted answer id actually was a valid answer id for the poll.
* **The code and layout is clean.** I tried really hard to ensure that the code completed is extensible and not all over the place (like some others I saw). It's documented, clean and there's no more present than there needs to be to get the job done. Each route to the services controller goes to one function and each function points to one other in the model.

### Known bugs
* None that I know of.
