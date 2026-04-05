# Activity Reflection

What is the difference between GET and POST?
GET is used to request information from a page and it does not change any data. POST sends the form data to the server and is used when something needs to be stored or updated.

Why do we use @csrf in forms?
`@csrf` adds a security token to the form so Laravel can confirm the request is coming from the app and not from a third party trying to submit the form illegally.

What is session used for in this activity?
The session keeps the email list on the server so the page can show the saved emails after each form submission.

What happens if session is cleared?
If the session is cleared, the saved emails are deleted, and the list on the page will become empty again.
