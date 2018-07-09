INSERT INTO `users` (`userID`, `userName`, `userEmail`, `userPass`) VALUES ('', '', '', '');
SELECT * FROM `users`


INSERT INTO `projects` (`projectID`, `projectGroup`, `projectPeriode`, `projectYear`, `ProjectName`) VALUES (NULL, '', '', '', '');



INSERT INTO `documents` (`documentID`, `documentName`) VALUES (NULL, '');



INSERT INTO `advice` (`adviceID`, `documentID`, `adviceType`, `adviceTekst`) VALUES (NULL, '', '', '');



INSERT INTO `projectdocuments` (`projectDocumentID`, `projectID`, `documentID`, `documentDeadline`, `documentLink`, `documentUpload`) VALUES (NULL, '', '', '', '', NULL);



INSERT INTO `userproject` (`userID`, `projectID`, `WarningCount`) VALUES ('', '', '0');