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


## Api URls:

#### Books List API
```sh
Method:- GET

URL:- `http://127.0.0.1:8000/api/books`
```
#### Books Create API
```sh
Method:- POST

URL:- `http://127.0.0.1:8000/api/books`
```
#### Books Fetch API
```sh
Method:- GET

URL :- `http://127.0.0.1:8000/api/books/{id}`
```
#### Books Update API
```sh
Method:- PUT

URL :- `http://127.0.0.1:8000/api/books/{id}`
```
#### Books Delete API
```sh
Method:- DELETE

URL :- `http://127.0.0.1:8000/api/books/{id}`
```
