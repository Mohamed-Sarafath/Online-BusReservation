# Online-BusReservation

Requirements
-> xampp server
-> vs code or other code editor
-> database mysql

system running
-> download all files.
-> move all the file to c/: -> xampp -> htdocs (inside the htdocs  paste).
-> then open xampp and start 'apache server' & 'mysql'.
-> open your database and create database name called same as 'bus'.
-> now import the 'bus.sql' to the created bus database.
-> open your browser and type localhost/: 'folder thst you stored in the htdocs'.

#thas all you can use the system....


User Interface Fuctions
-> UI Designs are stored in the folder "Src".
-> This src folder contains four php files such as index, Available, booking, help.
-> 1st user select departure & destination place then select date after click searchbus button.
-> if the bus available for the route and the selected date the page will move on to the next page called booking if it not the bus availabe in the date the page will show "bus is not available for the selected route".
-> after that in the booking page user need to fill the form and select their seats then request to the admin.

Admin Function Folders
-> in here admin will handle the reques from the customer. he can decide whether he can accept or decline the request.
-> if the request was accept or declined by the admin the user will get a notification from the email.
-> after that admin got the payment and print the ticket for the customer.

