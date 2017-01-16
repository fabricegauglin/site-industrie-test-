
SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;


--
-- Base de données: `smsBase`
--
create database smsBase;
use smsBase;

-- --------------------------------------------------------

--
-- Structure de la table `cp_autocomplete`
--

CREATE TABLE IF NOT EXISTS `client` (
  `CODEPAYS` char(2) NOT NULL,
  `destinataire` varchar(10) NOT NULL,
  `numero` varchar(180) NOT NULL,
  KEY `CODEPAYS` (`CODEPAYS`),
  KEY `destinataire` (`destinataire`),
  KEY `numero` (`numero`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `client`
--

INSERT INTO `client` (`CODEPAYS`, `destinataire`, `numero`) VALUES
('FR', '24000', 'Périgueux'),
('FR', '24001', 'Périgueux'),
('FR', '24002', 'Périgueux'),
('FR', '24003', 'Périgueux'),
('FR', '24004', 'Périgueux'),
('FR', '24005', 'Périgueux'),
('FR', '24007', 'Périgueux'),
('FR', '24009', 'Périgueux'),
('FR', '24010', 'Périgueux'),
('FR', '24011', 'Périgueux'),
('FR', '24012', 'Périgueux'),
('FR', '24013', 'Périgueux'),
('FR', '24014', 'Périgueux'),
('FR', '24015', 'Périgueux'),
('FR', '24016', 'Périgueux'),
('FR', '24017', 'Périgueux'),
('FR', '24019', 'Périgueux'),
('FR', '24020', 'Périgueux'),
('FR', '24022', 'Périgueux'),
('FR', '24024', 'Périgueux'),
('FR', '24029', 'Périgueux'),
('FR', '24050', 'Périgueux'),
('FR', '24051', 'Périgueux'),
('FR', '24052', 'Périgueux'),
('FR', '24055', 'Périgueux'),
('FR', '24059', 'Périgueux'),
('FR', '24060', 'Périgueux'),
('FR', '24100', 'Creysse'),
('FR', '24100', 'Bergerac'),
('FR', '24100', 'Lembras'),
('FR', '24100', 'Saint-Laurent-des-Vignes'),
('FR', '24101', 'Bergerac'),
('FR', '24102', 'Bergerac'),
('FR', '24104', 'Bergerac'),
('FR', '24105', 'Bergerac'),
('FR', '24106', 'Bergerac'),
('FR', '24107', 'Bergerac'),
('FR', '24108', 'Bergerac'),
('FR', '24109', 'Bergerac'),
('FR', '24110', 'Saint-Astier'),
('FR', '24110', 'Montrem'),
('FR', '24110', 'Léguillac-de-l''Auche'),
('FR', '24110', 'Grignols'),
('FR', '24110', 'Manzac-sur-Vern'),
('FR', '24110', 'Saint-Aquilin'),
('FR', '24110', 'Bourrou'),
('FR', '24110', 'Saint-Léon-sur-l''Isle'),
('FR', '24111', 'Bergerac'),
('FR', '24112', 'Bergerac'),
('FR', '24113', 'Bergerac'),
('FR', '24114', 'Bergerac'),
('FR', '24120', 'La Feuillade'),
('FR', '24120', 'La Dornac'),
('FR', '24120', 'Terrasson-Lavilledieu'),
('FR', '24120', 'La Cassagne'),
('FR', '24120', 'Chavagnac'),
('FR', '24120', 'Villac'),
('FR', '24120', 'Grèzes'),
('FR', '24120', 'Châtres'),
('FR', '24120', 'Beauregard-de-Terrasson'),
('FR', '24120', 'Coly');