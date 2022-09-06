## Steps for Running the Api:
- Run the server wamp/xampp
- Clone the repository https://github.com/Chinmay1903/E-Book-Store-Api.git.
- Rename .env.example file to .env 
- Create a database.
- Update database details in .env file.
- Run `composer install`.
- Run `php artisan migrate`
- Run `php artisan serve`

##### You can now access your project at localhost:8000 :)
book
##### Api URls:

Books List API
Method:- GET
URL:- http://127.0.0.1:8000/api/products
Books Create API
Method:- POST
URL:- http://127.0.0.1:8000/api/products
Books Fetch API
Method:- GET
URL :- http://127.0.0.1:8000/api/products/{id}
Books Update API
Method:- PUT
URL :- http://127.0.0.1:8000/api/products/{id}
Books Delete API
Method:- DELETE
URL :- http://127.0.0.1:8000/api/products/{id}
