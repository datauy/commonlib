<?php
/* 
 * THIS FILE WAS AUTOMATICALLY GENERATED BY ./rabxtophp.pl, DO NOT EDIT DIRECTLY
 * 
 * news.php:
 * Client interface for NeWs
 *
 * Copyright (c) 2005 UK Citizens Online Democracy. All rights reserved.
 * WWW: http://www.mysociety.org
 *
 * $Id: news.php,v 1.8 2007-02-01 18:22:50 francis Exp $
 *
 */

require_once('rabx.php');

/* news_get_error R
 * Return FALSE if R indicates success, or an error string otherwise. */
function news_get_error($e) {
    if (!rabx_is_error($e))
        return FALSE;
    else
        return $e->text;
}

/* news_check_error R
 * If R indicates failure, displays error message and stops procesing. */
function news_check_error($data) {
    if ($error_message = news_get_error($data))
        err($error_message);
}

if (defined('OPTION_NEWS_URL'))
    $news_client = new RABX_Client(OPTION_NEWS_URL, 
        defined('OPTION_NEWS_USERPWD') ? OPTION_NEWS_USERPWD : null);

/* news_get_newspaper ID

  Given a newspaper ID, returns information about that newspaper */
function news_get_newspaper($id) {
    global $news_client;
    $params = func_get_args();
    $result = $news_client->call('NeWs.get_newspaper', $params);
    return $result;
}

/* news_get_newspapers

  Get a list of all the newspapers in the DB */
function news_get_newspapers() {
    global $news_client;
    $params = func_get_args();
    $result = $news_client->call('NeWs.get_newspapers', $params);
    return $result;
}

/* news_get_newspapers_by_name

  Get a reference to an array of hashes of newspapers in the DB matching a
  partial name string =cut 

  sub news_get_newspapers_by_name($){ my ($partial_name) = @_; $partial_name =
  lc $partial_name; my @ret;

      my $rows = dbh()->selectall_arrayref("select distinct id, name
                                         from newspaper 
                                         where isdeleted = false
                                         and lower(name) like ?
                                         order by name asc", {}, '%' . $partial_name . '%');
        
      foreach (@$rows){

          my ($id, $name) = @$_;
  	push( @ret, {'id' => $id,
                       'name' => $name });
      }

      return \@ret;
  } */
function news_get_newspapers_by_name() {
    global $news_client;
    $params = func_get_args();
    $result = $news_client->call('NeWs.get_newspapers_by_name', $params);
    return $result;
}

/* news_publish_newspaper_update ID EDITOR HASH

  Update the newspaper with the ID using the attribute values in the hash
  and assigning the update to the username EDITOR. */
function news_publish_newspaper_update($id, $editor, $hash) {
    global $news_client;
    $params = func_get_args();
    $result = $news_client->call('NeWs.publish_newspaper_update', $params);
    return $result;
}

/* news_get_newspaper_history ID

  Given a newspaper ID, returns the history of edits to that newspaper's
  record in the database  */
function news_get_newspaper_history($id) {
    global $news_client;
    $params = func_get_args();
    $result = $news_client->call('NeWs.get_newspaper_history', $params);
    return $result;
}

/* news_get_newspaper_coverage ID

  Given a newspaper ID, returns a reference to an array of hashes
  containing the coverage information related to that newspaper */
function news_get_newspaper_coverage($id) {
    global $news_client;
    $params = func_get_args();
    $result = $news_client->call('NeWs.get_newspaper_coverage', $params);
    return $result;
}

/* news_get_newspaper_journalists ID

  Given a newspaper ID, returns a reference to an array of hashes
  containing the journalist information associated with that newspaper */
function news_get_newspaper_journalists($id) {
    global $news_client;
    $params = func_get_args();
    $result = $news_client->call('NeWs.get_newspaper_journalists', $params);
    return $result;
}

/* news_get_locations_by_location LON LAT RADIUS

  Given a longitude, latitude and radius, returns a reference to an array
  of hashes containing information on locations within that radius from the
  point defined by the latitude and longitude */
function news_get_locations_by_location($lon, $lat, $radius) {
    global $news_client;
    $params = func_get_args();
    $result = $news_client->call('NeWs.get_locations_by_location', $params);
    return $result;
}

/* news_get_newspapers_by_location LON LAT RADIUS

  Given a longitude, latitude and radius, returns a reference to an array
  of hashes containing information on newspapers that have coverage of
  locations within that radius from the point defined by the latitude and
  longitude */
function news_get_newspapers_by_location($lon, $lat, $radius) {
    global $news_client;
    $params = func_get_args();
    $result = $news_client->call('NeWs.get_newspapers_by_location', $params);
    return $result;
}

/* news_get_journalist ID

  Given a journalist ID, return a hash of information about that journalist */
function news_get_journalist($id) {
    global $news_client;
    $params = func_get_args();
    $result = $news_client->call('NeWs.get_journalist', $params);
    return $result;
}

/* news_publish_journalist_update EDITOR HASH

  Publish a journalist record created from the attributes in the HASH to
  the newspaper indicated by ID This can either be a new record or an edit
  to an existing record. The edit is attributed to EDITOR =cut

  sub news_publish_journalist_update($$){ my ($editor, $fields) = @_;

      my $journalist = NeWs::Journalist->new($fields);
      # records are not deleted using this API function
      $journalist->{'isdeleted'} = 'f';
      my $journalist_id = $journalist->publish($editor);
      return $journalist->id(); 
  } */
function news_publish_journalist_update($editor, $hash) {
    global $news_client;
    $params = func_get_args();
    $result = $news_client->call('NeWs.publish_journalist_update', $params);
    return $result;
}

/* news_get_journalist_history ID

  Given a journalist ID, returns the history of edits to that journalist's
  record in the database */
function news_get_journalist_history($id) {
    global $news_client;
    $params = func_get_args();
    $result = $news_client->call('NeWs.get_journalist_history', $params);
    return $result;
}


?>
