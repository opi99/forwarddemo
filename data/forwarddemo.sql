--
-- Tabellenstruktur für Tabelle `forwarddemo`
--

CREATE TABLE IF NOT EXISTS `forwarddemo` (
  `uid` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `value` varchar(255) NOT NULL,
  PRIMARY KEY (`uid`)
) AUTO_INCREMENT=1 ;


INSERT INTO `forwarddemo` (`uid`, `value`) VALUES
(1, 'Test 1'),
(2, 'Test 2');
