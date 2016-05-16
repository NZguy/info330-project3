<?php
namespace common\mysql;
use Exception;
use mysqli;
use mysqli_sql_exception;
use ReflectionClass;

/**
 * Provides convenience methods to create and prepare MySQLi statements
 * @version 0.1
 */
class QueryBuilder {
	const PARAM_TYPE_STRING = "s";
	const PARAM_TYPE_INT = "i";
	const PARAM_TYPE_DOUBLE = "d";
	const PARAM_TYPE_BLOB = "b";

	const PARAM_STORE_VALUE = 0;
	const PARAM_STORE_TYPE = 1;

	private $queryString;
	private $queryParams;
	private $sqlConnectionReference;

	/**
	 * Creates a new instance of a QueryBuilder using a provided MySQLI instance
	 *
	 * @param mysqli $conn
	 */
	public function __construct(mysqli $conn) {
		$this->queryString = null;
		$this->queryParams = array();
		$this->sqlConnectionReference = $conn;
	}

	/**
	 * Specifies the text to use as the query
	 *
	 * @param string $queryString
	 * @return self
	 */
	public function withQuery(string $queryString): self {
		$this->queryString = $queryString;
		return $this;
	}

	/**
	 * Specifies a parameter. These must come in the order they appear
	 * in the text query.
	 *
	 * @param mixed $paramValue
	 * @param string $paramType Use QueryBuilder::PARAM_TYPE_*
	 * @return self
	 */
	public function withParam($paramValue, string $paramType): self {
		$this->queryParams[] = array(
				self::PARAM_STORE_VALUE => $paramValue,
				self::PARAM_STORE_TYPE => $paramType
		);
		return $this;
	}

	/**
	 * Prepares the query, bind the parameters, and spits out a QueryResult
	 *
	 * @throws Exception If the query string was not set
	 * @throws mysqli_sql_exception If the statement could not prepared
	 * @return QueryResult
	 */
	public function build(): QueryResult {
		if (is_null($this->queryString) || trim($this->queryString) === '') {
			throw new Exception("The query string was never set");
		}

		$stmt = $this->sqlConnectionReference->prepare($this->queryString);
		if (!$stmt) {
			throw new mysqli_sql_exception("Could not prepare statement: "
					. $this->sqlConnectionReference->error);
		}

		if (count($this->queryParams) > 0) {
			// Store what would be the arguments of #bind_param in an array where the
			// first element is the string of the types the parameters will be.
			$paramArray = array("");
			for ($i = 0; $i < count($this->queryParams); $i++) {
				$paramArray[0] .= $this->queryParams[$i][QueryBuilder::PARAM_STORE_TYPE];
				$paramArray[] = &$this->queryParams[$i][QueryBuilder::PARAM_STORE_VALUE];
			}

			// Create a reflection class to dynamically invoke #bind_param as
			// it does not natively support being passed an array of parameters
			// 'nor does it allow binding 1 parameter at a time.
			$mysqliReflectionClass = new ReflectionClass("mysqli_stmt");
			$bindParamMethod = $mysqliReflectionClass->getMethod("bind_param");
			$bindParamMethod->invokeArgs($stmt, $paramArray);
		}

		$stmt->execute();
		return new QueryResult($stmt);
	}
}
