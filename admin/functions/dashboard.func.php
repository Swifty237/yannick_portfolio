<?php

function inTable($table) 
{
  global $db;

  $query = $db->query('SELECT COUNT(id) FROM '.$table);
  return $number = $query->fetch();
}

function getColor($table, $colors) 
{
  if (isset($colors[$table])) {
    return $colors[$table];
  }
  else {
    return 'warning';
  }
}

function get_comments() 
{
  global $db;

  $req = $db->query("
  
    SELECT  comments.id,
            comments.name,
            comments.email,
            comments.date,
            comments.post_id,
            comments.comment,
            posts.title

    FROM  comments
    JOIN  posts
    ON    comments.post_id = posts.id
    WHERE comments.seen = 0
    ORDER BY comments.date ASC

  ");

  $results = [];

  while ($rows = $req->fetchObject()) {
    $results[] = $rows;
  }
  return $results;
}