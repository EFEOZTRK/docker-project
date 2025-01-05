# Project Title: SHOP Website

## Project Description:

A shopping platform where users can log in, register, manage their profile information (name,surname,address). The project uses PHP, litterally one line of JavaScript, MySQL, and Docker.

## Project Owner:

Name: Efe Ozturk
Student number: 47477

## Steps to Run the Project:

1. Clone the repository: ` git clone https://github.com/EFEOZTRK/docker-project`

2. Navigate to the project folder : `cd SHOP` which is inside the docker-project folder

3. Build and run the containers using Docker:
   docker-compose build
   docker-compose up

4. Once project is build up and running head to `localhost:8080`
   You will find yourself on the login page . click the button I dont have an account.
   and you will be redirected to the register page. (YOU NEED TO PRESS THE REGISTER/LOGIN BUTTON INSTEAD OF KEY `ENTER` )
   once registered successfully you will be back to login page automatically
   from there after loging in successfully you will be on the main page.

From the main page you can click the user icon.
and after that you can see some options on the left.

After clicking the `Personal information` a form will appear.
Since you are registering for the first time you will have no information.
By clicking the edit button you will be redirected to a page with a form.

Submitting that form you can add or edit information if form is submitted empty you will
delete all your information from the database.

After submitting the form you need to click the personal information text again to see your
information there.

You can also logout by clicking the button log out below the username.

If after logout you come back to the last page you will be logged in as in the name of `Guest`.
You wont be able to add any information if you do that and the form will be blank by default
