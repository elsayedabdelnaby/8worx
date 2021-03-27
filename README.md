# REST API with Passport Auth

Create an API using Passport Authentication to Register, Login and execute CRUD functionality on Leads Module:

## Installation

- Clone Project From github: `git clone https://github.com/elsayedabdelnaby/8worx.git`
- Go to Project Folder and Run This Command: `composer install`
- Create Your Database by Run This Command: `php artisan migrate`
- Create Passport Client by Run This Command: `php artisan passport:install`
- Now Project is Ready to Use by Run `php artisan serve`


## API Links
### Register
- Can Register by send POST request to `http://localhost:8000/api/register` <br>
By This Json
`{
    "name" : "admin",
    "email" : "admin@gmail.com",
    "password": "admin",
    "confirm_password" : "admin"
}`
<br>
<a href="https://ibb.co/PwS1CLK"><img src="https://i.ibb.co/f4cr0gf/API-Register-1.png" alt="API-Register-1" border="0"></a>
<a href="https://ibb.co/82Bkjb3"><img src="https://i.ibb.co/Dkbd7YX/Api-register-2.png" alt="Api-register-2" border="0"></a>

### Login
- Can Login by send POST request to `http://localhost:8000/api/login` <br>
By This Json and System will return token which i use to execute CURD functions on Leads Module
`{
	"email" : "admin@gmail.com",
	"password": "admin"
}`

### CRUD
- to send any request to execute CRUD functions on Lead module must set token in header as authAuthorization parameter, add Bearer + token
<a href="https://ibb.co/V2jjtpQ"><img src="https://i.ibb.co/Ch11zsM/create-lead.png" alt="create-lead" border="0"></a> 
#### Create Lead
- Can Create Lead by Send POST request to `http://localhost:8000/api/leads`
- Send Data in Json Format
<a href="https://ibb.co/NLqsZfv"><img src="https://i.ibb.co/P5yNwJL/create-lead-2.png" alt="create-lead-2" border="0"></a>

### Read Leads
- to read all leads or specific lead send get request to <br>
<ol>
<li>all leads `http://localhost:8000/api/leads` <br>
<a href="https://ibb.co/BK63thn"><img src="https://i.ibb.co/mFyTGnN/get-all-leads.png" alt="get-all-leads" border="0"></a>
<br>
<li>specific lead `http://localhost:8000/api/leads/id` <br>
<a href="https://ibb.co/Y01Fcgc"><img src="https://i.ibb.co/6XT7HQH/get-specific-lead.png" alt="get-specific-lead" border="0"></li> </a>


</li> <br>
</ol>
and data will return on json array


#### Update Lead
- Can Update Existing Lead by Send PUT request to `http://localhost:8000/api/leads/id`
- Send Data in Json Format
<a href="https://ibb.co/NLqsZfv"><img src="https://i.ibb.co/P5yNwJL/create-lead-2.png" alt="create-lead-2" border="0"></a>

#### Delete Lead
- Can Delete a specific lead by send DELETE request to `http://localhost:8000/api/leads/id` replace id by lead id which you want to delete it
<br>
<a href="https://ibb.co/PgxDjVS"><img src="https://i.ibb.co/89MYsQh/delete-id.png" alt="delete-id" border="0"></a>
