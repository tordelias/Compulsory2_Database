CREATE TABLE `player data` (
  `Player ID` int NOT NULL,
  `Player Name` varchar(245) NOT NULL,
  `Rank` varchar(45) DEFAULT NULL,
  `Banned` tinyint(1) NOT NULL,
  `Temp Bans` int DEFAULT NULL,
  PRIMARY KEY (`Player ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
CREATE TABLE `transaction` (
  `Player ID` int NOT NULL,
  `Item Nr` int DEFAULT NULL,
  `Price` int DEFAULT NULL,
  `Order Nr` int NOT NULL,
  `Date` date NOT NULL,
  PRIMARY KEY (`Player ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
CREATE TABLE `items` (
  `Item Nr` int NOT NULL,
  `Price` int DEFAULT NULL,
  `Item` varchar(45) DEFAULT NULL,
  `Sold` int DEFAULT NULL,
  `Profit` int DEFAULT NULL,
  PRIMARY KEY (`Item Nr`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;