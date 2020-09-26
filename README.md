<p align="center">
    <a href="https://github.com/yiisoft" target="_blank">
        <!-- <img src="https://avatars0.githubusercontent.com/u/993323" height="100px"> -->
    </a>
    <h1 align="center">Shopping Cart REST Api</h1>
    <br>
</p> 


<h2>Add Products</h2>
<strong>URL = http://localhost/cart-restapi/web/backend/create</strong>    
<p>Paste this URL in the browser. It will take you to Add Product page</p>

<h2>List all Products Api</h2>
<strong>URL = http://localhost/cart-restapi/web/api/listproducts</strong>
<pre>
  <code>
  BODY = RAW
  CONTENT TYPE = JSON
  METHOD = GET
  REQUEST =
  {

  }
  RESPONSE =
  {
      "statusCode": 200,
      "message": "Data retrieval successful",
      "data": [
          {
              "id": "1",
              "product_name": "product1",
              "product_price": "500",
              "image_path": [
                  "http://localhost/cart_restapi/web/uploads/1203_suzi_bo_fondo_1601027177.jpg",
                  "http://localhost/cart_restapi/web/uploads/1203_victor_bo_fondo_1601027177.jpg"
              ]
          },
          {
              "id": "2",
              "product_name": "product2",
              "product_price": "200",
              "image_path": [
                  "http://localhost/cart_restapi/web/uploads/2_1601029164.jpg",
                  "http://localhost/cart_restapi/web/uploads/03gd_1601029164.jpg"
              ]
          }
      ]
  }
  </code>
</pre>
<p></p>

<h2>Add to Cart Api</h2>
<strong>URL = http://localhost/cart_restapi/web/api/addtocart</strong>
<pre>
  <code>
  BODY = RAW
  CONTENT TYPE = JSON
  METHOD = POST
  REQUEST =
  {
    "user_id" : "1",
    "products":[
        {
            "product_id":"1",
            "quantity":"500"
        },
        {
            "product_id":"2",
            "quantity":"280"
        }
    ]
  }
  RESPONSE =
  {
      "statusCode": 200,
      "message": "Product updated in cart",
      "data": []
  }
  </code>
</pre>
<p></p>

<h2>Get cart items Api</h2>
<strong>URL = http://localhost/cart-restapi/web/api/getcartitems?userid=1</strong>
<pre>
  <code>
  BODY = RAW
  CONTENT TYPE = JSON
  METHOD = GET
  REQUEST =
  {

  }
  RESPONSE =
  {
      "statusCode": 200,
      "message": "Data retrieval successful",
      "data": [
          {
              "id": 1,
              "product_id": 1,
              "user_id": 1,
              "quantity": 500
          },
          {
              "id": 2,
              "product_id": 2,
              "user_id": 1,
              "quantity": 280
          }
      ]
  }
  </code>
</pre>
<p></p>


<h2>API document</h2>
<strong>URL = https://documenter.getpostman.com/view/3372648/TVKHTut3</strong>   


