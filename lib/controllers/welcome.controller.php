<?php
/*
 *      welcome.controller
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
class Welcome extends Controller {
	
	public function __construct() {
		parent::__construct();
	}

	public function index() {
		$this->view->load('welcome');
	}
	
	public function image($w=200,$h=200) {
		$this->i($w,$h);
	}
	
	public function i($w=200,$h=200) {
		require('lib/libraries/image.class.php');
		if( $w > 1920 ) {
			$w = 1920;
		}
		if( $h > 1080 ) {
			$h = 1080;
		}
		$images = glob('images/*.*');
		$img = array_rand($images);
		$res = new SimpleImage($images[$img]);
		$res->adaptive_resize($w, $h)->output('jpg');
	}
	
}
