<?php
/*
 *      bootstrap.class
 *      
 *      Copyright 2012 Robert Lemon <rob.lemon@gmail.com>
 *      
 *      This program is free software; you can redistribute it and/or modify
 *      it under the terms of the GNU General Public License as published by
 *      the Free Software Foundation; either version 2 of the License, or
 *      (at your option) any later version.
 *      
 *      This program is distributed in the hope that it will be useful,
 *      but WITHOUT ANY WARRANTY; without even the implied warranty of
 *      MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *      GNU General Public License for more details.
 *      
 *      You should have received a copy of the GNU General Public License
 *      along with this program; if not, write to the Free Software
 *      Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston,
 *      MA 02110-1301, USA.
 *      
 *      
 */
class Bootstrap {
	
	public function __construct() {
		try {
			$url = isset( $_GET[ 'url' ] ) ? explode( '/', rtrim( $_GET[ 'url' ], '/' ) ) : null;
			if ( empty( $url[ 0 ] ) ) {
				$url[ 0 ] = 'index';
			} else if( ctype_digit(strval($url[ 0 ])) ) {
				$tmp = $url[ 0 ];
				$url[ 0 ] = 'welcome';
				$url[ 2 ] = $url[ 1 ];
				$url[ 1 ] = $tmp;
			}
			require( 'lib/controllers/welcome.controller.php' );
			$controller = new Welcome();
			
			if( !method_exists( $controller, $url[ 0 ] ) ) {
				throw new Exception('Invalid method', 404);
			}
			$params = array_slice( $url, 1 );
				call_user_func_array( array(
					 $controller,
					$url[ 0 ] 
				), $params );
		} catch( Exception $e ) {
			$this->error( $e );
		}
	}
	
	public function error($exception) {
		
		require( 'lib/controllers/error.controller.php' );
		$error = new Error();
		$error->show($exception->getMessage() . '<br />Code: ' . $exception->getCode());
		exit;
	}
	
}
