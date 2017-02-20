<?php

if ( empty( $_POST['name'] ) || empty( $_POST['email'] || empty( $_POST['message'] ) ) {
	die( 0 );
}

mail( $_POST['to'], $_POST['subject'], $_POST['message'] );

if ( $_POST['copy'] ) {
	mail( $_POST['name'] . '<' . $_POST['email'] . '>', $_POST['subject'], $_POST['message'] );
}