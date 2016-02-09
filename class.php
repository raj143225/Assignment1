<?php
	require 'dbinfo.php';
	class All_operaions {
		public function viewRoles() {
			require 'dbinfo.php';
			$query = "SELECT type FROM user_types";
			$result = mysqli_query($connection,$query);
			$val = array();
			while($row = mysqli_fetch_array($result))
			{
				$val[] = $row['type'];
			}
			if($val)
			{
				return $val;
			}
			return false;
			//return "kokok";
		}
		public function addRole($type) {
			require 'dbinfo.php';
			$query="INSERT INTO user_types(type) VALUES('$type')";
			$result = mysqli_query($connection,$query);
			if($result)
			{
				return true;
			}
			return false;
		}
		public function deleteRole($type) {
			require 'dbinfo.php';
			$query="DELETE FROM user_types WHERE type = '$type'";
			$result = mysqli_query($connection,$query);
			if($result)
			{
				return true;
			}
			return false;
		}
		public function viewOperation() {
			require 'dbinfo.php';
			$query = "SELECT action FROM operations";
			$result = mysqli_query($connection,$query);
			$val = array();
			while($row = mysqli_fetch_array($result))
			{
				$val[] = $row['action'];
			}
			if($val)
			{
				return $val;
			}
			return false;
		}
		public function addOperation($action) {
			require 'dbinfo.php';
			$query="INSERT INTO operations(action) VALUES('$action')";
			$result = mysqli_query($connection,$query);
			if($result)
			{
				return true;
			}
			return false;
		}
		public function deleteOperation($action) {
			require 'dbinfo.php';
			$query="DELETE FROM operations WHERE action = '$action'";
			$result = mysqli_query($connection,$query);
			if($result)
			{
				return true;
			}
			return false;
		}
		public function viewResource() {
			require 'dbinfo.php';
			$query = "SELECT name FROM resources";
			$result = mysqli_query($connection,$query);
			$val = array();
			while($row = mysqli_fetch_array($result))
			{
				$val[] = $row['name'];
			}
			if($val)
			{
				return $val;
			}
			return false;
		}
		public function addResource($name) {
			require 'dbinfo.php';
			$query="INSERT INTO resources(name) VALUES('$name')";
			$result = mysqli_query($connection,$query);
			if($result)
			{
				return true;
			}
			return false;
		}
		public function deleteResource($name) {
			require 'dbinfo.php';
			$query="DELETE FROM resources WHERE name = '$name'";
			$result = mysqli_query($connection,$query);
			if($result)
			{
				return true;
			}
			return false;
		}
		public function privilageView($user) {
			require 'dbinfo.php';
			$query ="";
		}
		/*public function editRole($id,$type) {
			$query="UPDATE user_types SET type='$type' WHERE id='$id'";
			$result = mysqli_query($query);
			if($$row = mysqli_fecth_assoc($result))
			{
				return true;
			}
			return false;
		}
		public function addResource($name) {
			$query="INSERT INTO resources('name') VALUES('$name')";
			$result = mysqli_query($query);
			if($$row = mysqli_fecth_assoc($result))
			{
				return true;
			}
			return false;
		}
		public function editResource($id,$name) {
			$query="UPDATE resources SET name='$name' WHERE id='$id'";
			$result = mysqli_query($query);
			if($$row = mysqli_fecth_assoc($result))
			{
				return true;
			}
			return false;
		}*/

	}
?>