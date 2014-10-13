<?php

namespace application;

function loading($namespace) {
    echo "cpt0\n";
    echo __NAMESPACE__;
    $namespace = __NAMESPACE__
	$splitpath = explode('\\', $namespace);
	$path = '';
	$name = '';
	$firstword = true;
	for ($i = 0; $i < count($splitpath); $i++) {
		if ($splitpath[$i] && !$firstword) {
			if ($i == count($splitpath) - 1) {
                            $name = $splitpath[$i];
                        } else {
                            $path .= DIRECTORY_SEPARATOR . $splitpath[$i];
                        }
		}
		if ($splitpath[$i] && $firstword) {
			if ($splitpath[$i] != __NAMESPACE__)
				break;
			$firstword = false;
		}
	}
	if (!$firstword) {
		$fullpath = __DIR__ . $path . DIRECTORY_SEPARATOR . $name . '.php';
                echo $fullpath;
                die;
		return include_once($fullpath);
	}else {
            echo "cpt000\n";
        }
	return false;
}

function loadPath($absPath) {
	return include_once($absPath);
}

spl_autoload_register(__NAMESPACE__ . '\loading');
