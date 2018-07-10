
//standard insert functions for all tables//

INSERT INTO `users` (`userID`, `userName`, `userEmail`, `userPass`) VALUES ('', '', '', '');

INSERT INTO `projects` (`projectID`, `projectGroup`, `projectPeriode`, `projectYear`, `ProjectName`) VALUES (NULL, '', '', '', '');

INSERT INTO `documents` (`documentID`, `documentName`) VALUES (NULL, '');

INSERT INTO `advice` (`adviceID`, `documentID`, `adviceType`, `adviceTekst`) VALUES (NULL, '', '', '');

INSERT INTO `projectdocuments` (`projectDocumentID`, `projectID`, `documentID`, `documentDeadline`, `documentLink`, `documentUpload`) VALUES (NULL, '', '', '', '', NULL);

INSERT INTO `userproject` (`userID`, `projectID`, `WarningCount`) VALUES ('', '', '0');

//Master SELECT to select all from one user//
SELECT `users`.`userID`, `userName`, `userEmail`, `projectYear`, `projectGroup`, `projectPeriode`, `projectName`, documentName 
FROM `users` 
JOIN `userproject` ON `users`.`userID` = `userproject`.`userID` 
JOIN `projects` ON `userproject`.`projectID` = `projects`.`projectID` 
JOIN `projectdocuments` ON projects.projectID = projectdocuments.projectID 
JOIN documents ON projectdocuments.documentID = documents.documentID 
WHERE `users`.`userID` = '587842'

//sql ment to check for user and if user is correct, retrieve missing information//
SELECT `userName`, `userEmail` FROM `users` WHERE `userID` = '' AND `userPass` = '';

//sql ment to gain all project from user//
SELECT * FROM `projects` JOIN `userproject` ON `userproject`.`projectID` = `projects`.`projectID` WHERE `userID` = '';

//sql ment to gain all document belonging to project//
SELECT * FROM `documents` JOIN `projectdocuments` ON `documents`.`documentID` = `projectdocuments`.`documentID` WHERE `projectID` = ''

//