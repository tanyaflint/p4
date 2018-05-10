# Practice work - Project 4
+ By: *Tatiana Flint*
+ Production URL: <http://p4.idreamcode.me>

## Database
*The following is example info taken from Foobooks; delete and replace with your own info.*

Primary tables:
  + `activities`
  + `teammates`
  
Pivot table(s):
  + `activity_teammate`


## CRUD
*All the CRUD operations are done in the Team editor <http://p4.idreamcode.me/team>*

__Create__
  + Visit <http://p4.idreamcode.me/team>
  + Fill out form
  + Click *Add*
  + Observe confirmation message
  
__Read__
  + Visit <http://p4.idreamcode.me/team> see a listing of all books
  
__Update__
  + Visit <http://p4.idreamcode.me/team>; click name of a teammate you want to edit
  + Make some edit to form
  + Click *Update*
  + Observe confirmation message
  
__Delete__
  + Visit <http://p4.idreamcode.me/team>; click name of a teammate you want to delete
  + Click "Delete" button
  + Confirm deletion
  + Observe confirmation message

## Outside resources
+ Stack overflow - [Get only records created today in laravel](https://stackoverflow.com/questions/33247908/get-only-records-created-today-in-laravel)
+ [Carbon date and time](https://carbon.nesbot.com/docs/)

## Code style divergences
*None*

## Notes for instructor
This application allows sending timeframes to the team for each teammate to select convenient time to complete an activity. Useful if there are QA or other activities that need to be complete by individuals, but you want to reserve time on their calendars ahead of time, and if there is a certain deadline or timeframe by when it needs to be started and complete.

Please note, that I still need to complete the email and calendar sends, since it is not a requirement for the project I'll complete it at a later time. Right now emails can be previewed when you click "Send Now".
