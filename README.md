# API Spec

## Add Product

Request :

- Method : POST
- Endpoint : `/api/product`
- Header :
    - Content-Type: application/json
    - Accept: application/json
- Body :

![Img 1](Ssapi/addproduct.png)

Response :

![Img 2](Ssapi/resultaddproduct.png)

## Get All Products

Request :
- Method : GET
- Endpoint : `/api/products`
- Header :
    - Accept: application/json

Response :

![Img 3](Ssapi/getallproducts.png)

![Img 4](Ssapi/getallproducts2.png)

## Edit Product

Request :
- Method : PUT
- Endpoint : `/api/product/{id}`
- Header :
    - Content-Type: application/json
    - Accept: application/json
- Body :

![Img 5](Ssapi/editproduct.png)

Response :

![Img 6](Ssapi/resulteditproduct.png)

## Delete Product

Request :
- Method : DELETE
- Endpoint : `/api/product/{id}`
- Header :
    - Accept: application/json

Response :

![Img 7](Ssapi/deleteproduct.png)

# Authentication

Request :
- Header :
    - Accept: application/json
- Authorization :
    - Type : Bearer Token

## Register
Request :

- Method : POST
- Endpoint : `/api/register`
- Header :
    - Accept: application/json
- Body :

![Img 8](Ssapi/register.png)


Response :

![Img 9](Ssapi/registerresult.png)

## Login
Request :

- Method : POST
- Endpoint : `/api/login`
- Header :
    - Accept: application/json
- Body :

![Img 10](Ssapi/login.png)

Response :

![Img 11](Ssapi/loginresult.png)

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).