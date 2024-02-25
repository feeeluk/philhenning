SET foreign_key_checks = 0;

DROP TABLE IF EXISTS `philhenning_post`;
DROP TABLE IF EXISTS `philhenning_users`;
DROP TABLE IF EXISTS `philhenning_topics`;

SET foreign_key_checks = 1;


CREATE TABLE `philhenning_users` (
`id` INT NOT NULL AUTO_INCREMENT,
`userName` VARCHAR(60) NOT NULL,
`firstName` VARCHAR(60),
`lastName` VARCHAR(60),
`passWord` VARCHAR(20) NOT NULL,
`isAdmin` VARCHAR(3) NOT NULL DEFAULT 'no',
PRIMARY KEY (`userName`),
UNIQUE (`id`, `userName`)
);

INSERT INTO `philhenning_users` (`id`, `userName`, `firstName`, `lastName`, `passWord`, `isAdmin`)
VALUES
	(1,'philiphenning@outlook.com', 'Phil', 'Henning', 'phil', 'yes');

CREATE TABLE `philhenning_topics` (
`id` INT NOT NULL AUTO_INCREMENT,
`name` VARCHAR(80) NOT NULL,
PRIMARY KEY (`id`),
UNIQUE (`id`)
);

INSERT INTO `philhenning_topics` (`id`, `name`)
VALUES
	(1,'General'),
	(2,'To_do'),
	(3,'C#'),
	(4,'Done'),	
	(5,'GIT'),
	(6,'Entity Framework'),
	(7,'WPF'),
	(8,'.NET'),
	(9,'Dev'),
	(10,'SCRUM'),
	(12, 'Questions');

CREATE TABLE `philhenning_posts` (
`id` INT NOT NULL AUTO_INCREMENT,
`username` VARCHAR(60) NOT NULL,
`post_time` DATETIME NOT NULL,
`topic_id` INT NOT NULL,
`comment` TEXT NOT NULL,
PRIMARY KEY (`id`),
FOREIGN KEY (`username`) REFERENCES `philhenning_users` (`userName`),
FOREIGN KEY (`topic_id`) REFERENCES `philhenning_topics` (`id`),
UNIQUE (`id`)
);

INSERT INTO `philhenning_posts` (`id`, `username`, `post_time`, `topic_id`, `comment`)
VALUES
(1, 'philiphenning@outlook.com', '2024-01-02 12:00:00', 1, 'I have spent the last week building this site to showcase my various projects.'),
(2, 'philiphenning@outlook.com', '2024-01-03 12:00:00', 1, 'Last night I started my coding journey with a chat with a good friend about some potential directions to take. He pointed me towards wwww.codeacademy.com and he also sent me a YouTube link to a video of a \"learning C#\" tutorial. I joined codeacademy, and I also started watching the video. However, whilst doing those things, I happened to notice a couple of errors on the SnowCompare site. Fundamental errors - none of the \"Admin\" sections were working (I assume this will also be the case with SnowCompareShop, too - I shall investigate further). The errors were due to the code being a complete mess. Probably as a result of years of copy / pasting, so I have had to refactor a lot of code, which has been difficult given I am not trying to pick PHP back up. However, re-structuring / re-organising the code was definitely a good thing, and no doubt will be good experience for future coding.                            I also noticed a difference between coding / naming conventions between SnowCompare and SnowCompareShop. As SnowCompare was the parent project of SnowCompareShop, it naturally came first and thus the Db tables and things like sessions were not created with a prefix e.g. \"project_1_name\".. however I noticed that I started doing that when I started the second project, and I did this because I was re-using a lot of the same code, and doing so was causing a lot of issues as I was accidentally referencing the wrong code. That was definitely the right thing to do, but it now means that the original code is a bit more delicate and if I copy anything from new projects to the original project I have to remember to remove any prefix entirely. I have to regress to bad habits when working on the old code.'),
(4, 'philiphenning@outlook.com', '2024-01-04 11:51:08', 2, 'I want to add one new feature to this portfolio page.. The ability to dynamically leave these blog entries.'),
(7, 'philiphenning@outlook.com', '2024-01-04 12:42:41', 2, 'Add:\r\n- a login section (including philiphenning@outlook.comhenning specific user table in the db)\r\n\r\n- the ability to filter by topics by choosing a drop down\r\n\r\n- a topics table\r\n\r\n- the ability to choose a topic from a drop down when creating a post\r\n\r\n- the ability to edit comments\r\n\r\n- the ability to enter different formatting in the text box\r\n\r\n- the ability to sort by date (desc or asc) or topic INCLUDING SOME FORM OF UI FEEDBACK \r\n\r\n'),
(12, 'philiphenning@outlook.com', '2024-01-05 02:14:34', 4, 'Done - the ability to sort by date (desc or asc) or topic. It took me a few hours, but it was really good! I feel like I knew what I was doing most of the time. I played around a lot and figured things out myself.. really positive! I also included a visual element so that you know which column it is sorted by and whether it is sorted ascending or descending.\r\nThere are probably much simpler ways of doing this, but I did this without following any tutorials.. I just had to read and understand existing code. Granted I did use Google to check a few things, but only how to do things like \'$_GET[]\''),
(13, 'philiphenning@outlook.com', '2024-01-05 11:22:20', 1, 'I\'m going to visit a good friend this morning (who happens to be a developer). Hopefully he will give me some encouragement, guidance and support.'),
(15, 'philiphenning@outlook.com', '2024-01-06 20:07:52', 3, 'I\'ve been following along to the YouTube video my friend recommended.\r\nIt\'s actually pretty nice as it is done in Visual Studio and it is pretty easy to follow along with.\r\n\r\nI\'ve been writing my code so that I can see what I did in each or the lessons, but I think I\'m going to look at how I can share the project with other people.. GIT possibly?'),
(18, 'philiphenning@outlook.com', '2024-01-06 23:05:35', 4, 'Done = drop down Topic selector for when adding comments. I used Stack Overflow and found something that would work and chopped it into my code. It\'s ugly, but it works ;-)'),
(19, 'philiphenning@outlook.com', '2024-01-06 23:57:12', 3, 'I did a bit more - but stopped at the end of lesson 6/50'),
(20, 'philiphenning@outlook.com', '2024-01-06 23:59:40', 6, 'I had a super quick read.. will definitely need to look into this. Not right now, though, I\'ll carry on with the C# videos for now. Although I am going to see my mate again in the week, and he\'s the one that advised me to look into it, so it would be cool to be able to talk about it..'),
(21, 'philiphenning@outlook.com', '2024-01-07 12:40:08', 3, 'I have just completed tutorial 7/50\r\n\r\nthe topics so far have been:\r\nLesson 2 - output\r\nLesson 3 - variables\r\nLesson 4 - constants\r\nLesson 5 - type casting\r\nLesson 6 - user input\r\nLesson 7 - arithmetic operators'),
(22, 'philiphenning@outlook.com', '2024-01-07 12:46:03', 3, 'I have also started saving my code in a text file as the text generated in each lesson is getting longer and longer.. The only reason I have done this is that I don\'t want to lose code, even though I know it\'s probably not the best practice?'),
(23, 'philiphenning@outlook.com', '2024-01-07 18:21:31', 1, 'My next challenge on my website will be to introduce some kind of filtering on the topics so that you can see all the topics relating to the same subject, etc. I made a start on this, but also moved the testing to a separate page.'),
(24, 'philiphenning@outlook.com', '2024-01-07 20:47:44', 4, 'I have added the ability to filter by topic, BUT filtering by topic and sorting are currently done independently. This is a big fix.. I\'m reaching the limit of what I can do on my own.\r\nI have managed to add the ability of the drop box to retain the filtered value, and also REMOVE all filters!'),
(25, 'philiphenning@outlook.com', '2024-01-07 22:08:54', 3, 'I have just completed lesson 8/50.\r\nI\'m tired now.. I\'ve done a lot today.'),
(26, 'philiphenning@outlook.com', '2024-01-08 00:23:04', 3, 'I\'ve just finished 10/50'),
(27, 'philiphenning@outlook.com', '2024-01-08 00:23:59', 1, 'Tomorrow I need to speak to Pete, and also reach out to Gav, Whitey and my cousin Simon.'),
(28, 'philiphenning@outlook.com', '2024-01-08 21:09:15', 4, 'I have finally managed to tie together the Sorting functionality and the filtering... my god that was hard!! That was about 5 hours of straight coding.\r\n\r\nA few things to learn from this:\r\n- getting distracted by phone calls or dogs is very... DISTRACTING\r\n- not eating makes concentrating hard\r\n- concentrating hard = headaches\r\n- need to drink\r\n- need to take walks to clear head and keep dog alive!!'),
(29, 'philiphenning@outlook.com', '2024-01-08 21:38:29', 1, 'Rather than use this page to store \'To-Do\' items, I am going to use a simple Trello board for backlog management.\r\n\r\nI have also added a git link.'),
(34, 'philiphenning@outlook.com', '2024-01-09 01:34:40', 4, 'I have updated the DB so that the Topics table and the Comments table are now linked.'),
(37, 'philiphenning@outlook.com', '2024-01-09 12:03:23', 4, 'Fixed bugs introduced by changing the DB'),
(40, 'philiphenning@outlook.com', '2024-01-09 20:48:28', 1, 'There were a substantial number of bugs introduced by updating the DB. I didn\'t notice them all at first, but as soon as I fixed 1 I noticed the next, etc.\r\n\r\nI spent a lot of time doing this, and now I\'m exhausted at the expense of doing C# coding etc.\r\n\r\nI can at least now share this site with potential employers and not feel like it is buggy. However the last bug (hopefully) is dealing with special characters. This might be an easy fix but as I have no knowledge of how to deal with it I am going to have to do some reading.'),
(41, 'philiphenning@outlook.com', '2024-01-09 20:50:49', 1, 'I\'ve spoken to my old tutor today.. he gave me some great advice and was an advocate of the Codeacademy route.\r\n\r\nI am totally exhausted today and I have do no C# work.. I\'m going to try and get a (relatively) early night after walking the dog.'),
(42, 'philiphenning@outlook.com', '2024-01-10 16:54:24', 12, 'Where should I put my .text file in the VS project that I\'m using to store my C# code?'),
(43, 'philiphenning@outlook.com', '2024-01-10 16:55:19', 12, 'What should I learn?\r\n\r\nAnswered\r\n\r\nC#\r\n.NET\r\nEntity Framework\r\nWeb API\r\n\r\nsee N-Layer diagram'),
(44, 'philiphenning@outlook.com', '2024-01-10 22:11:42', 4, 'Included the ability to filter by unanswered questions, so that I can use this blog as a basis for asking questions to the people that help me. I will of course then have to add the keyword \'answered\' into the posts once the question has been answered, otherwise the post will still appear in the query.\r\n\r\nI have also made a few tweaks to the appearance.'),
(45, 'philiphenning@outlook.com', '2024-01-11 00:37:39', 4, 'I have updated the homepage.'),
(46, 'philiphenning@outlook.com', '2024-01-11 10:03:48', 3, '14/50 done'),
(47, 'philiphenning@outlook.com', '2024-01-10 22:13:42', 3, 'I have also done another C# lesson (11/50)\r\n\r\nI have also refined my working / living schedule, so I hope to be able to at least get to 20/50 by the weekend, and hopefully by the end of the weekend be at 30/50.'),
(48, 'philiphenning@outlook.com', '2024-01-11 11:01:41', 3, '16/50'),
(49, 'philiphenning@outlook.com', '2024-01-11 11:21:30', 4, 'I have added a public link to my \'Dev Notes\' in OneNote online.'),
(50, 'philiphenning@outlook.com', '2024-01-11 11:27:23', 4, 'I added the ability to check for \'Answered questions\', too'),
(51, 'philiphenning@outlook.com', '2024-01-11 14:51:50', 4, 'I adjusted the SQL query for the topics filter at the top of the Blog page so that it only shows topics where there are posts.'),
(66, 'philiphenning@outlook.com', '2024-01-11 18:49:18', 4, 'Adjusted the form submission so that if a new comment is submitted the entire page re-loads, so that you will always be able to see your last comment (basically removes all filters and sorting options)'),
(67, 'philiphenning@outlook.com', '2024-01-11 18:58:45', 3, 'I have started to save my C# code in OneNote and have now published that as a publicly available link, so you can see my code by clicking on the \"Notes\" link on the navigation bar, and then navigating to the appropriate section in the OneNote project.'),
(70, 'philiphenning@outlook.com', '2024-01-11 20:31:55', 1, 'I have just registered a new domain - www.philiphenning@outlook.comhenning.uk'),
(72, 'philiphenning@outlook.com', '2024-01-11 22:16:05', 12, 'What is best practice for when working on existing code?\r\n\r\nFor example, I can make small changes to this very page but might not notice that I have undone a fix for a bug until after I have done some other work, which might mean that Ctrl + Z won\'t help? Fortunately I\'ve managed to catch most things, but as the code is getting more complex I feel like I\'m going to start undoing things..'),
(73, 'philiphenning@outlook.com', '2024-01-12 01:04:00', 3, 'Done 18/50\r\n\r\ntomorrow will be a couple of exercises and then moving onto new territory for me!'),
(74, 'philiphenning@outlook.com', '2024-01-12 09:18:41', 1, 'I registered two domains last night (philiphenning@outlook.comhenning.uk and philiphenning@outlook.comhenning.co.uk)\r\n\r\nI was going to use philhenning.uk as my main site and have the other forward to it, but I think I\'m going to use .co.uk instead as it\'s just more well known at this point in time (so more memorable) and that\'s all I\'m after. No one is going to refuse to offer me a job because I didn\'t use .uk\r\n\r\nThere are a few more things that I\'d like to get working on this site before I move domains.\r\n\r\nI also looked at getting some business cards that match the website.'),
(76, 'philiphenning@outlook.com', '2024-01-12 11:26:53', 3, 'Done 19/50'),
(77, 'philiphenning@outlook.com', '2024-01-12 20:33:48', 3, 'Done 20/50'),
(78, 'philiphenning@outlook.com', '2024-01-12 23:33:50', 3, 'done 21/50');

	