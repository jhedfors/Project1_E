-- users
SELECT * from users;
 -- create user
INSERT INTO users (name, alias, email, password, dob, created_at, modified_at) VALUES('Jeff Hedfors','Jeff', 'jeff@hedfors.net', '11111111', '1967-11-30',NOW(),NOW());
INSERT INTO users (name, alias, email, password, dob, created_at, modified_at) VALUES('Kazu Hedfors','Kazu', 'kazu@hedfors.net', '11111111', '1967-11-30',NOW(),NOW());
INSERT INTO users (name, alias, email, password, dob, created_at, modified_at) VALUES('Jayden Hedfors','Jayden', 'jayden@hedfors.net', '11111111', '1967-11-30',NOW(),NOW());
INSERT INTO users (name, alias, email, password, dob, created_at, modified_at) VALUES('Keefer Hedfors','Keefer', 'keefer@hedfors.net', '11111111', '1967-11-30',NOW(),NOW());
INSERT INTO users (name, alias, email, password, dob, created_at, modified_at) VALUES('Linda Goebel','Linda', 'linda@goebel.com', '11111111', '1967-11-30',NOW(),NOW());
INSERT INTO users (name, alias, email, password, dob, created_at, modified_at) VALUES('Jim Hedford','Jim', 'jim@hedford.com', '11111111', '1967-11-30',NOW(),NOW());
INSERT INTO users (name, alias, email, password, dob, created_at, modified_at) VALUES('Julie Hedford','Julie', 'julie@hedford.com', '11111111', '1967-11-30',NOW(),NOW());


SELECT * from friendships;

-- insert friends
INSERT into friendships (user_id,friend_id,created_at,modified_at) values (2,3,now(),now());
INSERT into friendships (user_id,friend_id,created_at,modified_at) values (3,2,now(),now());
INSERT into friendships (user_id,friend_id,created_at,modified_at) values (2,4,now(),now());
INSERT into friendships (user_id,friend_id,created_at,modified_at) values (4,2,now(),now());
INSERT into friendships (user_id,friend_id,created_at,modified_at) values (2,5,now(),now());
INSERT into friendships (user_id,friend_id,created_at,modified_at) values (5,2,now(),now());

 -- remove friends
 DELETE FROM friendships WHERE user_id= 2 AND friend_id = 5;
 DELETE FROM friendships WHERE user_id= 5 AND friend_id = 2;

-- display friends from friends
SELECT friends.id as friend_id, friends.alias as friend_alias from users AS friends
LEFT JOIN friendships ON friends.id = friendships.friend_id
LEFT JOIN users ON users.id = friendships.user_id
WHERE users.id = 2;

-- display non-friends
SELECT friends.id as friend_id, friends.alias as friend_alias from users AS friends
LEFT JOIN friendships ON friends.id = friendships.friend_id
LEFT JOIN users ON users.id = friendships.user_id
WHERE NOT friends.id IN 
(SELECT friends.id as friend_id from users AS friends
LEFT JOIN friendships ON friends.id = friendships.friend_id
LEFT JOIN users ON users.id = friendships.user_id
WHERE users.id = 2 OR friends.id = 2);


