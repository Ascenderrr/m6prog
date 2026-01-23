<?php
 
class User
{
    public string $username;
    public string $password;
    public string $displayname;
 

 
public function __construct(string $username, string $password, string $displayname)
{
    $this->username = $username;
    $this->password = $password;
    $this->displayname = $displayname;
}
 
    public static function GetUserByName($connection,   string $username): ?User
    {
        $query = "SELECT * FROM users WHERE username = ?";
        $stmt = $connection->prepare($query);
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();
 
       
        while ($row = $result->fetch_assoc()) {
           return  User::FromResultRow($row);
 
        }
 
 
        return null;
    }
 
 
 
        public static function FromResultRow($row){
          $user = new User(
                    $row['username'],
                    $row['passwordhash'],
                    $row['displayname'],
                );
            return $user;
           
               
    }
public function VerifyPassword(string $password) : bool{
    return password_verify($password, $this->password);
}
}