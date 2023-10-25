CREATE TABLE `playerdata` (
  `PlayerID` int NOT NULL,
  `PlayerName` varchar(245) NOT NULL,
  `PlayerRank` varchar(45) DEFAULT NULL,
  `Banned` tinyint(1) NOT NULL,
  `Temp Bans` int DEFAULT NULL,
  PRIMARY KEY (`PlayerID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
CREATE TABLE `transaction` (
  `PlayerID` int NOT NULL,
  `ItemNr` int DEFAULT NULL,
  `Price` int DEFAULT NULL,
  `OrderNr` int NOT NULL,
  `Date` date NOT NULL,
  PRIMARY KEY (`PlayerID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
CREATE TABLE `items` (
  `ItemNr` int NOT NULL,
  `Price` int DEFAULT NULL,
  `Item` varchar(45) DEFAULT NULL,
  `Sold` int DEFAULT NULL,
  `Profit` int DEFAULT NULL,
  PRIMARY KEY (`ItemNr`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
CREATE TABLE `logininfo` (
  `PlayerID` INT NOT NULL,
  `Username` VARCHAR(45) NOT NULL,
  `Password` VARCHAR(45) NOT NULL,
  `Email` VARCHAR(45) NOT NULL,
  `PhoneNumber` INT NULL,
  PRIMARY KEY (`PlayerID`));