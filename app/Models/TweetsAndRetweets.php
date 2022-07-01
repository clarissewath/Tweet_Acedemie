<?php
require_once 'DB.php';

DB::connection()->exec('CREATE OR REPLACE VIEW tweets_and_retweets AS

SELECT NULL            AS "retweet_id",
       t.id            AS "tweet_id",
       NULL            AS "retweet_user_id",
       t.user_id       AS "tweet_user_id",
       t.tweet_date    AS "tweet_date",
       NULL            AS "retweet_tweet_id",
       NULL            AS "retweet_content",
       t.content       AS "tweet_content",
       t.media         AS "tweet_media",
       NULL            AS "retweet_visibility",
       t.visibility    AS "tweet_visibility",
       NULL            AS "retweet_accessibility",
       t.accessibility AS "tweet_accessibility",
       NULL            AS "retweet_message",
       t.tag           AS "tweet_tag",
       u.username      AS "tweet_username"
FROM tweet t
         INNER JOIN user u ON t.user_id = u.id
UNION ALL
SELECT r.id,
       NULL,
       r.user_id,
       NULL,
       r.date_retweet,
       r.tweet_id,
       r.content,

       t2.content,
       NULL,

       NULL,
       r.visibility,
       NULL,
       r.accessibility,
       NULL,
       r.message,
       u2.username
FROM retweet r
         INNER JOIN tweet t2 ON r.tweet_id = t2.id
         INNER JOIN user u2 ON r.user_id = u2.id;
SELECT *
FROM tweets_and_retweets t
ORDER BY tweet_date DESC
');
