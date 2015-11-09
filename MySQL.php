<?php
require 'settings.php';
	mysqli_connect($host, $user, $pass);
	mysqli_select_db($db);
	$password = md5($salt . 'password');
	mysqli_query("
-- --------------------------------------------------------

--
-- Table structure for table `members`
--
-- DO NOT CHANGE THE USERNAME! IT MUST REMAIN AS Administrator!
CREATE TABLE IF NOT EXISTS `members` (
  `id` int(11) NOT NULL DEFAULT '1',
  `username` text NOT NULL,
  `password` text NOT NULL,
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;# mysqli returned an empty result set (i.e. zero rows).
 

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`id`, `username`, `password`) VALUES
(1, 'Administrator', ''.$password.'');

-- --------------------------------------------------------

--
-- Table structure for table `homepage`
--
-- FOR EDITING TO WORK THE ID COLLUM MUST NOT BE CHANGED. OR THE EDITS WONT TAKE PLACE.
CREATE TABLE IF NOT EXISTS `homepage` (
  `id` int(11) NOT NULL,
  `title` text NOT NULL,
  `content` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;# mysqli returned an empty result set (i.e. zero rows).

INSERT INTO `homepage` (`id`, `title`, `content`) VALUES
(1, 'Title', 'Content');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE IF NOT EXISTS `messages` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `message` varchar(500) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `date` text,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;# mysqli returned an empty result set (i.e. zero rows).


--
-- Dumping data for table `messages`
--

-- --------------------------------------------------------# mysqli returned an empty result set (i.e. zero rows).

");
?>


