# TODO List

## Statistics Queries
- User with most badges
- % of students with badge
- Total number of users
- Active users per duration of time
- Badges earned per department
- Time spent on app
- Most frequently awarded badges

## QR Code Generation
https://phpqrcode.sourceforge.net/

Generating QR Codes: 
- User scans QR code for badge A
  - On scan, frontent application appends userID to end of url text string
- Redirect to cs.sfasu.edu/.../api/earnBadge.php/apicalls?eventID=example&userID=example
- earnBadge.php assigns badge from event to user
- Display badgeEarned page, ex: "You earned the Squirrel badge!"

## Stat Chart Generation
https://www.chartjs.org/docs/latest/


## New EventBadge Table
### DONE
EventBadgeID - int
BadgeID - int NULL
DepartmentID - int NULL
EventName - varchar(100)
EventDescription - varchar(250)
QRSVG - blob
DateCreated - datetime
ActiveEvent - boolean
