<?php


class userDB {
	
	public static function getuserdb () {
		$db = Database::getDB();
		$sql = 'SELECT * FROM accounts';
		$statement = $db->prepare($sql);
		$statement->execute(array());
		$results = $statement->fetchAll();

			return $results;
		
	}


	public static function addnewuser($users){
		$db = Database::getDB();

		$user_db = $users->getUsers()->getID();
		$id = $users->getId();
		$email = $users->getEmail();
		$fname = $users->getFname();
		$lname = $users->getLname();
		$phone = $users->getPhone();
		$birthday = $users->getBirthday();
		$gender = $users->getGender();
		$password = $users->getPassword();

		$query = "INSERT INTO accounts
					(id,email,fname,lname,phone,birthday,gender,password)
					VALUES 
					(:user_db, :id, :email, :fname, :lname, :phone, :birthday, :gender, :password)";
		$result =$db->prepare($query);
		$result->bindValue(':user_db', $user_db);
		$result->bindValue(':id', $id);
		$result->bindValue(':email', $email);
		$result->bindValue(':fname', $fname);
		$result->bindValue(':lname', $lname);
		$result->bindValue(':phone', $phone);
		$result->bindValue(':birthday', $birthday);
		$result->bindValue(':gender', $gender);
		$result->bindValue(':password', $password);
		$result->execute();
		$result->closeCursor();
	}

	public static function deleteuser ($user_db){
		$db = Database::getDB();
		$query = 'DELETE FROM accounts
					WHERE id = :id';
		$result = $db->prepare($query);
		$result = bindValue(':id', $user_db);
		$result->execute();
		$result=closeCursor();	

	}
	public static function updateuser ($id,$pass){
		$db = Database::getDB();

		$query = "UPDATE accounts SET password=:password WHERE id=:id";
		$result = $db->prepare($query);
		$result = bindValue(':id', $user_db);
		$result->execute();
		$result=closeCursor();	
	}


}
?>

