<?php

use function PHPSTORM_META\type;

class Database
{
   private function connect()
   {
        $str = DBDRIVER.":hostname=".DBHOST.";dbname=".DBNAME;
        return new PDO($str,DBUSER,DBPASS);
        
   }

   public function query($query,$data=[],$type='object')
   {
        $con = $this->connect();
        // show($con);
        $stm = $con->prepare($query);
        if($stm)
        {
            $check = $stm->execute($data);
            if($check)
            {
                $type = PDO::FETCH_OBJ;
                if($type != 'object')
                {
                    $type = PDO::FETCH_ASSOC;
                }

                $result = $stm->fetchAll($type);
                if(is_array($result) && count($result)>0)
                {
                    return $result;
                }
            }
        }
        return false;

   }

   // Reason to create Prepared Statements
   /**
    * "select * from users where email = 'hey@gmail.com' and password = 'password'"

    * Sql injection might be take in place in a scenario like this when user want to login.
    * "select * from users where email = 'hey@gmail.com' or '1';--' and password = 'password'"
    *   So as far as the database concerned the statement end at the ;. -- will create the 
    *   rest of the query as a comment.

    * When using the prepared statments It will look like this |

    * "select * from users where email = ? and password = ? "

    * We are separating information from the query. Sending the data as an array of data to the place where the ? resides. the database will recognise all that input have to be considered at the place of ? not as a part of the query.

    * "select * from users where email = :email and password = :password "
    *  'email'=>'hey@gmail.com'
    *  'password'=>'password'
    */
}