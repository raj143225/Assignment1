<?php
	require 'dbinfo.php';
	class All_operaions {
		/**
		 * It is method that retrives the all the roles from the user_types table
		 *
		 * 
		 * 
		 * @return array of values 
		 */
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
		/**
		 * It is method adds a new type in the user_types table
		 *
		 * @param string $type role name
		 * 
		 * @return boolean
		 */
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
		/**
		 * It is method deletes an existing role in the user_types table
		 *
		 * @param string $type role name
		 * 
		 * @return boolean
		 */
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
		/**
		 * It is method that retrives the all the operation from the operations table
		 *
		 * 
		 * 
		 * @return array of values 
		 */
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
		/**
		 * It is method adds a new operation in the operations table
		 *
		 * @param string $action operation
		 * 
		 * @return boolean
		 */
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
		/**
		 * It is method deletes an existing operation in the operations table
		 *
		 * @param string $action operation
		 * 
		 * @return boolean
		 */
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
		/**
		 * It is method that retrives the all the resources from the resources table
		 *
		 * 
		 * 
		 * @return array of values 
		 */
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
		/**
		 * It is method adds a new resource in the resources table
		 *
		 * @param string $name resource name
		 * 
		 * @return boolean
		 */
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
		/**
		 * It is method deletes an existing resource in the resources table
		 *
		 * @param string $name resource name
		 * 
		 * @return boolean
		 */
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
	}
?>