<?php
/*
 *      view.class
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
class View {
	
	public function __construct() {
		
	}
	
	public function load($page, $data = array()) {
		if( !empty( $data ) ) {
			foreach( $data as $k => $v ) {
				$this->{$k} = $v;
			}
		}
		require( 'lib/views/header.php' );
		require( 'lib/views/' . $page . '.php' );
		require( 'lib/views/footer.php' );
	}
	
}
