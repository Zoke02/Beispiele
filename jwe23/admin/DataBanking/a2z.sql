-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 25, 2024 at 06:20 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `a2z`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `categorie_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `categorie_name`) VALUES
(1, 'Logistics, warehouse & international commerce'),
(2, 'Accounting & auditing'),
(3, 'Secretarial, clerical & administrative assistants'),
(4, 'Marketing, advertising & PR'),
(26, 'Medicine'),
(27, 'Administration & middle manegemant'),
(28, 'Agriculture & agribusiness'),
(29, 'Beauty, fitness & sport'),
(30, 'Design & creativity'),
(31, 'Education & science'),
(32, 'Finance & banking'),
(33, 'Hotels, restaurants & tourism'),
(34, 'Insuarance'),
(35, 'IT,computers & Internet'),
(36, 'HR & personnel management'),
(37, 'Journalism, publishing & printing'),
(38, 'Real estate'),
(39, 'Retail'),
(40, 'Sales & procurement'),
(41, 'Security & guarding'),
(42, 'Service sector'),
(43, 'Skilled trades & manufacturing'),
(44, 'Telecommunications'),
(45, 'Transportation & auto industry'),
(46, 'Upper & Senior Management'),
(47, 'Seasonal work');

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `job_title` varchar(255) NOT NULL,
  `qualification_id` int(10) NOT NULL,
  `description` text NOT NULL,
  `categorie_id` int(10) NOT NULL,
  `place_of_work` varchar(255) NOT NULL,
  `hours` varchar(50) NOT NULL,
  `salary` varchar(50) NOT NULL,
  `created_on` date NOT NULL,
  `modified_on` date DEFAULT NULL,
  `status` varchar(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `jobs`
--

INSERT INTO `jobs` (`id`, `user_id`, `job_title`, `qualification_id`, `description`, `categorie_id`, `place_of_work`, `hours`, `salary`, `created_on`, `modified_on`, `status`) VALUES
(21, 2, 'Kelner', 1, 'asdasd', 1, 'Salzburg', '20', '1000€', '2024-05-21', '2024-05-22', 'Visible'),
(24, 2, ' Verkaufsberater_in', 2, 'Die Österreichische Post ist der landesweit führende Logistik- und Postdienstleister. Zu den Hauptgeschäftsbereichen zählen die Beförderung von Briefen, Werbesendungen, Printmedien und Paketen. Das Filialnetz der Österreichischen Post zählt zu den größten Privatkundennetzen des Landes und bietet seinen Kunden in ganz Österreich hochwertige Produkte und Services in den Bereichen Post, Bank, Telekommunikation und Energie. Die Österreichische Post ist zudem durch Tochterunternehmen auch in elf europäischen Ländern in den Bereichen Paket & Logistik tätig.\r\n', 1, 'Mondsee', '20', '1045,00', '2024-05-22', '2024-05-22', 'Visible'),
(25, 2, ' Pflegeassistent/in', 1, 'Aufgaben:\r\n- Aktive Beziehungsgestaltung\r\n- Professionelle und liebevolle Pflege und Betreuung von Menschen \r\n- Beobachtung und Dokumentation der durchgeführten Pflegemaßnahmen\r\n- Ihr Aufgabenbereich je nach Ausbildung richtet sich nach den gesetzlichen Bestimmungen (GUKG) und\r\n  der jeweiligen Gesundheitseinrichtung\r\n\r\nAnforderungen:\r\n- Registrierung im Gesundheitsberuferegister\r\n- Ausbildungs- und Qualifikationsnachweis (gemäß GUKG)\r\n- Aktueller Impfstatus\r\n- Führerschein B\r\n- Ausreichende Deutschkenntnisse (Niveau B2)\r\n\r\nIhre Vorteile bei R&S Medical:\r\n- Wertschätzende Betreuung und Unterstützung auf Ihrem Karriereweg\r\n- Sicherer Arbeitsplatz\r\n- Flexible Dienstzeiten (nach Möglichkeit)\r\n- Familienfreundlich\r\n- Voll- und Teilzeitbeschäftigung möglich\r\n- Vollversicherung und soziale Absicherung\r\n- Langfristige Anstellung\r\n- Auf Wunsch wechselnde Einsatzorte\r\n- Aus- und Weiterbildungsmöglichkeiten\r\n- Überdurchschnittliche Verdienstmöglichkeiten\r\n- Bei Bedarf Unterstützung bei einem notwendigen Nostrifikationsprozess\r\n\r\nGemeinsam besprechen wir Ihre Arbeitsvorstellungen, Arbeitsaufgaben und das tatsächliche Gehalt gerne bei einem persönlichen Gespräch!\r\n\r\nMit R&S haben Sie ein innovatives Unternehmen als Partner! R&S Medical ist ein modernes Unternehmen, welches die Veränderungen und Herausforderungen im Gesundheits- und Pflegebereich kennt und diese auch verändern will.\r\nWir begleiten Sie gerne auf Ihrem persönlichen Karriereweg im Pflegearbeitsbereich.', 1, 'Eugendorf', '40', '2600', '2024-05-22', '2024-05-22', 'Visible'),
(26, 2, 'Tischler/in', 1, 'Dies sind Ihre Aufgaben:\r\n* Anfertigung von Möbelstücken und Inneneinrichtungen nach Maß und Zeichnung\r\n* Bedienung von Maschinen und handgeführten Werkzeugen zur Holzbearbeitung\r\n* Montage von Möbeln\r\n* Durchführung von Reparaturen und Restaurierungsarbeiten an bestehenden Möbeln\r\n* Einhaltung von Qualitätsstandards und Sicherheitsvorschriften\r\n\r\nDas bringen Sie mit:\r\n* Abgeschlossene Ausbildung als Tischler_in\r\n* Fundierte Kenntnisse und praktische Erfahrung im Möbel- und Innenausbau\r\n* Sicherer Umgang mit handgeführten Werkzeugen sowie Maschinen und Anlagen\r\n* Kreativität, Sorgfalt und präzises Arbeiten nach Zeichnung\r\n* Teamfähigkeit, Zuverlässigkeit und Flexibilität\r\n* Bereitschaft zur Schichtarbeit\r\n\r\nWir garantieren Ihnen:\r\n* Einen Brutto-Stundenlohn von EUR 17,00 zzgl. etwaiger anfallender Zulagen (Überzahlung je nach Qualifikation und Berufserfahrung vorgesehen)\r\n* Vielseitige und anspruchsvolle Aufgaben\r\n* Individuelle und persönliche Betreuung durch Ihr Team der expertum GmbH\r\n* Hochwertige und kostenlose Arbeitskleidung\r\n* Teilnahme an unserem Programm \"Mitarbeiter_innen werben Mitarbeiter_innen\"\r\n\r\nWir freuen uns auf Ihre Bewerbung!', 43, 'Salzburg', '38,5', '2600', '2024-05-22', '2024-05-24', 'Visible'),
(27, 2, 'Sommerpostler_innen', 1, 'HOL DIR DEN BESTEN SOMMERJOB ÖSTERREICHS!\r\n\r\nGenieße deinen Sommer mit viel Abwechslung und noch mehr Zeit an der frischen Luft! Dein verantwortungsvoller und sicherer Job ist außerdem fair bezahlt und bietet dir genug Freizeit, um mehr aus deinem Sommer rauszuholen.\r\n\r\nGEHALT\r\n \r\n- Du erhältst ein Bruttomonatsgehalt von mindestens 1.300,- EUR inkl. Überstundenpauschale für 20 Arbeitstage (= 4 Wochen)\r\nzusätzliche Prämie (Nettozahlung) ab der 5.Woche (bis zu 2.825,- EUR bei 40 Arbeitstage = 8 Wochen Arbeitsdauer möglich)\r\n- Du warst schon als Sommerpostler_in bei uns aktiv? Dann gibt es eine Wiederkehrprämie von zusätzlich netto 140,- EUR on top!\r\n\r\nAUFGABEN\r\n \r\n- Du sortierst die Sendungen für dein Zustellgebiet\r\n- Du stellst Briefe, Pakete und Werbepost an unsere Kund_innen zu\r\n- Du übernimmst Verwaltungsarbeiten, wie das Abrechnen einkassierter Geldbeträge\r\n- Du unterstützt von Montag bis Freitag ab ca. 06:00 Uhr\r\n \r\n Qualifikation\r\n \r\n- Mindestalter 18 Jahre \r\n- verlässliche und selbstständige Arbeitsweise\r\n- Freude und Umgang mit Menschen\r\n- gute Deutschkenntnisse und Führerschein B von Vorteil\r\n ', 47, 'Mondsee', '40', '1300', '2024-05-22', NULL, 'Visible'),
(29, 2, 'Pädagogische Assistenzkräfte für die Nachmittagsbetreuung (m/w/d)', 2, 'Ihre Aufgaben:\r\n\r\n- Gewissenhafte Führung, Erziehung, Bildung und Betreuung der anvertrauten Kinder\r\n- Eigenständige Gestaltung und Durchführung der Bildungsarbeit inkl. Dokumentation\r\n- Allgemeine Organisation und Planung der Nachmittagsbetreuung \r\n- Zusammenarbeit und Kooperation mit dem Rechtsträger, der Gemeinde, den \r\nMitarbeiterInnen sowie den Eltern\r\n\r\nIhr Profil:\r\n\r\n- Abgeschlossene Ausbildung zur päd. Assistenzkraft oder Studenten/innen für Lehramt bzw. \r\nFreizeitpädagogin/en oder ähnliche pädagogische Ausbildung bzw. Bereitschaft die \r\nAusbildung zur päd. Assistenzkraft zu absolvieren\r\n- Einfühlungsvermögen und Geduld im Umgang mit Kindern\r\n- Organisationstalent und gewöhnliche PC-Kenntnisse\r\n- Flexibilität und Belastbarkeit\r\n- Kommunikations- und Teamfähigkeit\r\n\r\nWir bieten:\r\n\r\n- Mitarbeit in einer dynamischen Non-Profit Organisation mit sozialer Verantwortung\r\n- Hohe Familienfreundlichkeit\r\n- Das Mindestentgelt beträgt lt. geltendem MLT für päd. Assistenzkräfte je nach \r\nBerufserfahrung und Anrechnung der Vordienstzeiten mind. 2.049 € brutto sowie einen \r\nGehaltszuschlag von 164 € brutto pro Monat als päd. Assistenzkraft\r\n- 10 zusätzliche Urlaubstage pro Jahr (bei einer 5-Tage-Woche), freie Tage analog zu \r\nSchulferien, befristet bis Schulende oder mit Durchrechnung möglich\r\n- Arbeitszeit: 4 Nachmittage von 12:30-16:00 Uhr', 31, 'Linz', '18', '900', '2024-05-22', '2024-05-22', 'Visible'),
(30, 1, 'BACKBOX & Regalbetreuer_in', 1, 'Aufgaben, die mich erwarten \r\n\r\n* Backen und Bereitstellen der Backware\r\n* Organisieren und Bewirtschaften der Regale \r\n* Präsentieren von Obst und Gemüse\r\n* Beantworten von Kund_innenanfragen\r\n* Durchführen von Qualitätskontrollen\r\n* Reinigen der Filiale\r\n\r\nQualifikationen, die ich mitbringe \r\n\r\n* Begeisterung für den Handel\r\n* zuverlässige und selbständige Arbeitsweise\r\n* Bereitschaft im Team anzupacken\r\n\r\nAngebote, die mich überzeugen\r\n\r\n* attraktive Teilzeitoptionen, auch als Student_innenjob geeignet\r\n* vielseitiges Tätigkeitsfeld\r\n* umfangreiche Einarbeitung\r\n* top ausgestattet mit Headset und immer verbunden mit dem Team\r\n* zielgerichtete E-Learning Module zur fachlichen Weiterbildung\r\n* kostenlose Verpflegung in Form von täglich frischem Obst und Gemüse, Kaffee sowie Tee\r\n* sicherer und verlässlicher Arbeitgeber mit österreichweitem Filialnetz\r\n* DU-Kultur im ganzen Unternehmen\r\n* vergünstigte Tarife bei Krankenzusatzversicherungen\r\n* Leasingprogramm für Fahrräder und E-Bikes\r\n\r\nEntgelt\r\nattraktives Brutto-Monatseinstiegsgehalt ab € 950,- für 15 Stunden/Woche, € 1.140,- für 18 Stunden/Woche und € 1.330,- für 21 Stunden/Woche, auf Vollzeitbasis entspricht dies € 2.439,- für 38,5 Stunden/Woche (bis € 2.630,- auf Vollzeitbasis in der Endstufe)', 3, 'Mondsee', '15', 'ab € 950', '2024-05-22', NULL, 'Visible'),
(31, 1, 'Produktionsmitarbeiter/in', 2, 'JAHRESSTELLE\r\n\r\nAnforderung:\r\n* Interesse an Arbeit überwiegend im Freien\r\n* Flexible Arbeitszeit während der Hauptsaison\r\n* Ehrlichkeit und Gewissenhaftigkeit\r\n* Kundenfreundlichkeit\r\n* entsprechende Deutschkenntnisse (Kundenkontakt)\r\n\r\nWir bieten:\r\n* Vollzeitbeschäftigung - oder Teilzeit ab 20 Wochenstunden\r\n* Jahresstelle\r\n* Familiäres Betriebsklima an einem der schönsten Badeseen in Österreich\r\n* Bademöglichkeit direkt am Arbeitsplatz\r\n* Mitarbeiter/Innen - Vergünstigungen im Bootsverleih und in der Schifffahrt', 1, 'Eugendorf', '21', '1800', '2024-05-22', '2024-05-23', 'Visible'),
(32, 1, 'Reinigungskräfte (m/w/d)', 1, 'ANFORDERUNGSPROFIL:\r\n\r\n  Qualifikation/Praxis\r\n\r\n- Praxis wäre von Vorteil\r\n- Führerschein B erwünscht\r\n\r\n  Aufgabengebiet:\r\n\r\n- Büroreinigung\r\n\r\n  Arbeitszeit/Ausmaß/Dauer\r\n\r\n- Voll- oder Teilzeitbeschäftigung ab 20 Wochenstunden möglich\r\n- Arbeitszeit ab 14:00 Uhr\r\n\r\n\r\n\r\nArbeitsort: Mondsee und Thalgau und in Salzburg', 42, 'Salzburg', '40', '1700', '2024-05-22', NULL, 'Visible'),
(33, 2, 'Bilanzbuchhalter:in (m/w/d)', 1, 'Innovationen voranbringen - Ihr Aufgabengebiet:\r\n\r\n* Erstellen von Monats- und Jahresabschlüssen nach UGB\r\n* Durchführen der monatlichen UVA (AT-CH-D) und ZM\r\n* Laufende Abstimmung der Konten\r\n* Ansprechpartner für Steuerberater und Behörden\r\n* Führen der Anlagenbuchhaltung\r\n\r\nAls Familienunternehmen denken wir langfristig - Sie auch? Wir bieten:\r\n\r\n* Wir bieten einen sicheren Arbeitsplatz und ein gutes Arbeitsklima in einem\r\n  namhaften und international tätigen Familienunternehmen\r\n* Flexible Arbeitszeiten und ein modernes Arbeitsumfeld\r\n* Weiterbildungsmöglichkeiten im Tätigkeitsbereich sowie ein umfangreiches\r\n  Schulungsangebot über die Hörmann-Akademie\r\n* Gesundheitsmaßnahmen und diverse Sozialleistungen wie Essenszulage, regionales\r\n  und saisonales Bio Obst/Gemüse zur freien Entnahme, gratis Kaffee und Tee,\r\n  Leasingbike, firmeneigener Hörmann Kraftstoffzuschuss\r\n* Als Einstiegsgehalt ist ein kollektivvertragliches Bruttomonatsgehalt von € 2.950,-\r\n  auf Vollzeitbasis vorgesehen.\r\n  Eine leistungsbezogene Überzahlung ist möglich', 2, 'Mondsee', '40', 'von € 2.950', '2024-05-23', '2024-05-24', 'Visible'),
(35, 1, 'Bilanzbuchhalter:in (m/w/d)', 1, 'Innovationen voranbringen - Ihr Aufgabengebiet:\r\n\r\n* Erstellen von Monats- und Jahresabschlüssen nach UGB\r\n* Durchführen der monatlichen UVA (AT-CH-D) und ZM\r\n* Laufende Abstimmung der Konten\r\n* Ansprechpartner für Steuerberater und Behörden\r\n* Führen der Anlagenbuchhaltung\r\n\r\nAls Familienunternehmen denken wir langfristig - Sie auch? Wir bieten:\r\n\r\n* Wir bieten einen sicheren Arbeitsplatz und ein gutes Arbeitsklima in einem\r\n  namhaften und international tätigen Familienunternehmen\r\n* Flexible Arbeitszeiten und ein modernes Arbeitsumfeld\r\n* Weiterbildungsmöglichkeiten im Tätigkeitsbereich sowie ein umfangreiches\r\n  Schulungsangebot über die Hörmann-Akademie\r\n* Gesundheitsmaßnahmen und diverse Sozialleistungen wie Essenszulage, regionales\r\n  und saisonales Bio Obst/Gemüse zur freien Entnahme, gratis Kaffee und Tee,\r\n  Leasingbike, firmeneigener Hörmann Kraftstoffzuschuss\r\n* Als Einstiegsgehalt ist ein kollektivvertragliches Bruttomonatsgehalt von € 2.950,-\r\n  auf Vollzeitbasis vorgesehen.\r\n  Eine leistungsbezogene Überzahlung ist möglich', 2, 'Mondsee', '40', 'von € 2.950', '2024-05-23', '2024-05-24', 'Visible'),
(36, 1, ' Busfahrer (m/w/d)', 1, 'für Reiseverkehr in Europa und auch Schülertransporte in der Umgebung.\r\n(Busse der Marke Setra und Mercedes von 20 bis 58 Sitzer sind vorhanden)\r\n\r\nAnforderungen:\r\n\r\n* Führerschein D und E sowie entsprechende Praxis\r\n* entsprechende Deutschkenntnisse für die Kommunikation mit Fahrgästen.\r\n\r\nEntlohnung: \r\n\r\n- Euro 2591,-- brutto - Überzahlung je nach Qualifikation und Praxis. \r\n\r\n\r\nWir bieten:\r\n\r\n- ein abwechslungsreiches Aufgabengebiet\r\n- ein familäres Arbeitsklima\r\n\r\n \r\nHaben wir Ihr Interesse für diese Stelle geweckt?\r\n', 1, 'Linz', '40', ' 2591', '2024-05-23', NULL, 'Visible'),
(41, 1, 'Rezeptionist/in', 3, 'Anforderung: \r\n* Praxis/Berufserfahrung im Bereich Rezeption oder Büro\r\n* ausreichende Kenntnisse der deutschen Sprache\r\n* Englischkenntnisse sind erforderlich\r\n\r\nAufgaben/Kompetenzen:\r\n* check in, check out\r\n* Administrative Bürotätigkeiten\r\n* Freizeitberatung\r\n* Gästebetreuung\r\n* sowie alle weiteren im Aufgabenbereich anfallenden Arbeiten\r\n\r\nWIR BIETEN:\r\n* Jahresstelle\r\n* Vollzeit- oder Teilzeitbeschäftigung im Ausmaß zwischen 25 und 40 Stunden pro Woche\r\n* die Gestaltung der Arbeitszeit erfolgt nach Absprache\r\n\r\n* Bei Vollzeitbeschäftigung kann bei Bedarf eine Unterkunft geboten werden.\r\n\r\n\r\nWir freuen uns auf Ihre Bewerbung! \r\n\r\n', 2, 'Eugendorf', '40', '2390', '2024-05-24', NULL, 'Visible'),
(42, 1, 'Rezeptionist/in', 1, 'Anforderung: \r\n* Praxis/Berufserfahrung im Bereich Rezeption oder Büro\r\n* ausreichende Kenntnisse der deutschen Sprache\r\n* Englischkenntnisse sind erforderlich\r\n\r\nAufgaben/Kompetenzen:\r\n* check in, check out\r\n* Administrative Bürotätigkeiten\r\n* Freizeitberatung\r\n* Gästebetreuung\r\n* sowie alle weiteren im Aufgabenbereich anfallenden Arbeiten\r\n\r\nWIR BIETEN:\r\n* Jahresstelle\r\n* Vollzeit- oder Teilzeitbeschäftigung im Ausmaß zwischen 25 und 40 Stunden pro Woche\r\n* die Gestaltung der Arbeitszeit erfolgt nach Absprache\r\n\r\n* Bei Vollzeitbeschäftigung kann bei Bedarf eine Unterkunft geboten werden.\r\n\r\n\r\nWir freuen uns auf Ihre Bewerbung! \r\n\r\n', 2, 'Eugendorf', '40', '2390', '2024-05-24', '2024-05-24', 'Hidden');

-- --------------------------------------------------------

--
-- Table structure for table `job_categories`
--

CREATE TABLE `job_categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `job_id` int(10) UNSIGNED NOT NULL,
  `categories_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `qualifications`
--

CREATE TABLE `qualifications` (
  `id` int(10) UNSIGNED NOT NULL,
  `qualification_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `qualifications`
--

INSERT INTO `qualifications` (`id`, `qualification_name`) VALUES
(1, 'Full-Time'),
(2, 'Part-Time'),
(3, 'Contract'),
(4, 'Temporary');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(10) UNSIGNED NOT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `firm` varchar(255) NOT NULL,
  `admin` int(1) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `first_name`, `last_name`, `email`, `password`, `firm`, `admin`) VALUES
(1, 'Alin', 'Nedelcu', 'nedelcu.alin@gmail.com', '$2y$10$X3fcTRXus/r8DOoEQ61ZE.KPk.Qgp7LtWvsgJy7pg/VZ/uyO0ztNu', 'Administrator', 1),
(2, 'Yana', 'Sushko', 'sushko.yana@gmail.com', '$2y$10$X3fcTRXus/r8DOoEQ61ZE.KPk.Qgp7LtWvsgJy7pg/VZ/uyO0ztNu', 'Hörmann', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `job_categories`
--
ALTER TABLE `job_categories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `job_id` (`job_id`),
  ADD KEY `categories_id` (`categories_id`);

--
-- Indexes for table `qualifications`
--
ALTER TABLE `qualifications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `job_categories`
--
ALTER TABLE `job_categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `qualifications`
--
ALTER TABLE `qualifications`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `jobs`
--
ALTER TABLE `jobs`
  ADD CONSTRAINT `cascade_user_id` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `job_categories`
--
ALTER TABLE `job_categories`
  ADD CONSTRAINT `cascade_categories_id` FOREIGN KEY (`categories_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `cascade_job_id` FOREIGN KEY (`job_id`) REFERENCES `jobs` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
