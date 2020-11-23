# DBMS-Train-Reservation

Tables:

Train (Future/Current & History)
Unique number (PK)
Date (PK)
Number of AC coaches (x18 seats)
Number of Sleeper coaches (x24 seats)
Remaining AC seats
Remaining Sleeper seats
Price (AC)
Price (Sleeper)


Ticket (Future/History)
PNR number (PK)
Date (FK to Train)
Train number (FK to Train)
Booking Agent
// Timestamp
Number of passengers
Coach Type


Passenger (Future/History):
Name
Age
Gender 
PNR (FK to Ticket PNR Num)
Berth Number 
Berth Type
Coach number


Booking agents (AUTH):
ID(PK)
Name
Card
Address
Password

Admin:
Name
ID
Password

// Log:
// Event
// Timestamp
// Agent

Coach Compositions (From Appendix)
Berth number
Berth Type

Stuff:
To generate PNR:
    - Consider Train ID, Date of Travel, Coach number and berth number of 1st passenger.

First AC coaches and then sleeper coaches.
Berth allocation is done serially
Number of booking agents is predetermined.
Error if remaining seats < number of requested seats
Use trigger to update availability of seats
Stored procedure to check available trains