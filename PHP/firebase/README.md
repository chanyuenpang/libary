#firebase.php#
======
###About###

  This libary implements the REST api of firebase in PHP.
  
###About firebase###

  Firebase is a really easy-mastering non-relational database.
  
  Their slogan :
  
  <em>Scalable real-time backend</em>  
  <em>Build apps fast without managing servers</em>
  
  Website : https://www.firebase.com/
  
###How to use###
  ```PHP
        $ref = new firebase('https://demo.firebaseio.com/message');
        $response = $ref->push( array(
                          'user-name' : 'Yop',
                          'content' : 'Hello firebase'
                        ));
  ```                      
###Including###

  class rest
    A simple RESTful request maker usring curl.
  class firebase
    Class implements firebase REST api.
    
###Functions###

<strong>constructor</strong>( [string] $firebase_uri )  
Example: 
  ```PHP
        $ref = new firebase('https://demo.firebaseio.com/message');
  ```

<strong>child</strong>( [string] $child_name )  
returns a firebase instance refering to child of current uri      
Example: 
  ```PHP
        $ref = new firebase('https://demo.firebaseio.com/message');
        $child_ref = $ref->('user-name');
  ```        
<strong>val</strong>()
returns a asoc array of current ref;      
Example:
  ```PHP
        $ref = new firebase('https://demo.firebaseio.com/message');
        $ref->val();
        // $ref = ['user-name' : 'Yop', 'content' : 'Hello firebase'];
  ```
<strong>set</strong>( [array] $data )
create / replacing ref data to $data;
returns a json string of $data
      
<strong>push</strong>( [array] $data ) 
create a new object of ref list;
returns the new of new object created      
Example:
  ```PHP
        $ref = new firebase('https://demo.firebaseio.com/message');
        $response = $ref->push( array(
                          'user-name' : 'Yop',
                          'content' : 'Hello firebase'
                        ));
        
        // $response = '{"name":"-INOQPH-aV_psbk3ZXEX"}';
  ```
<strong>update</strong>( [array] $data )
updates ref data to $data;
returns the data written
      
<strong>delete</strong>()  
delete the data of current ref;
    
###More###

  Auth: 
    [Yop Chan](http://www.yop.hk/ "Yop.hk")
    
  Firebase REST api Reference:
    https://www.firebase.com/docs/rest-api.html
    
      
  
  
  

