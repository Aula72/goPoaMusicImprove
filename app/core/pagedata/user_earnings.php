<?php

if ( !defined( "root" ) ) die;

$req_user_id   = !empty( $loader->ui->page_hook ) ? $loader->ui->page_hook : $loader->visitor->user()->ID;
$req_user_data = $loader->user->set( $req_user_id )->get_data( ["group_data"] );
$owner = empty( $loader->visitor->user()->ID ) ? false : $loader->visitor->user()->ID == $req_user_id;

$this->page_data = [
	"owner"           => $owner,
	"links"           => array(array('rss', 'Your earnings', 'user_earnings')),
	"user_data"       => $req_user_data,
	"user_group_data" => $loader->user->set( $req_user_id )->get_group_data( $req_user_data["GID"] ),
	"user_earnings"  => $loader->pay->get_shared_song_earnings()
];

$loader->ui->set_title();

?>