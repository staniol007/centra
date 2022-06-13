<?php
namespace KanbanBoard;

class Utilities
{
	private function __construct() {
	}

	public static function env($name, $default = NULL) {
		$value = getenv($name);
		if($default !== NULL) {
			if(!empty($value))
				return $value;
			return $default;
		}
		return (empty($value) && $default === NULL) ? die('Environment variable ' . $name . ' not found or has no value') : $value;
	}

    /**
     * @param string $name
     * @param string $value
     * @return bool
     */
    public static function putenv(string $name, string $value): bool {
        return \putenv(\sprintf('%s=%s', $name, $value));
    }

	public static function hasValue($array, $key) {
		return is_array($array) && array_key_exists($key, $array) && !empty($array[$key]);
	}

	public static function dump($data) {
		echo '<pre>';
		var_dump($data);
		echo '</pre>';
	}
}